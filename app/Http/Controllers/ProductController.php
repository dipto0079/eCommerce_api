<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function productindex()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $category = DB::table('categories')->where('categories_status',1)->get();
        $subcategory = DB::table('categories_subcategory')->where('subcategory_status',1)->get();
        $childcategory =DB::table('categories_childcategory')->where('childcategory_status',1)->get();
//            ->join('categories_subcategory','categories_childcategory.subcategory_id','categories_subcategory.subcategory_id')
//            ->join('categories','categories_childcategory.categories_id','categories.categories_id')
//            ->select('categories_childcategory.*','categories_subcategory.subcategory_name','categories_childcategory.*','categories.categories_name')->orderBy('childcategory_id', 'DESC')
//            ->get();
        $brand = DB::table('brand')->where('brand_status',1)->get();
        $specification = DB::table('specification')->where('specification_status',1)->get();

        $user_id = Session::get('LoggedUser');

        $user = DB::table('users')->where('id',$user_id)->first()->branch_id;
        $branch = DB::table('branch')->where('branch_id',$user)->first()->branch_type;
        $shipping = DB::table('shipping')->where('shipping_status',1)->get();
        if($branch == 1)
        {
            $Branch_Type = "Main Branch";
            $branch_name = DB::table('branch')->get();
        }
        else{
            $Branch_Type = "Sub Branch";
            $branch_name = DB::table('branch')->where('branch_id',$user)->get();
        }
        return view('backend.product.index',compact('category','subcategory','brand','childcategory','specification','branch_name','Branch_Type','shipping'));
    }
    public function get_specification()
    {
        $specification = DB::table('specification')->where('specification_status',1)->get();
        return response()->json($specification);
    }

    public function product_store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'categories_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_id' => 'required',
            'brand_id' => 'required',
            'product_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $data = array();
        $data['user_id']=$user_id;
        $data['branch_id']=$request->branch_id;
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['categories_id']=$request->categories_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_id']=$request->childcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_buying_price']=$request->product_buying_price;
        $data['product_selling_price']=$request->product_selling_price;
        $data['product_discount_type']=$request->product_discount_type;
        $data['product_discount_value']=$request->product_discount_value;
        $data['product_specification']=json_encode($request->product_specification);
        $data['product_specification_value']=json_encode($request->product_specification_value);
        $data['product_color']=json_encode($request->product_color);
        $data['product_color_name']=json_encode($request->product_color_name);
        $data['product_size']=json_encode($request->product_size);
        $data['product_status']=$request->product_status;
        $data['product_meta_title']=$request->product_meta_title;
        $data['product_meta_keyword']=$request->product_meta_keyword;
        $data['product_meta_description']=$request->product_meta_description;
        $data['product_shipping_id']=json_encode($request->product_shipping_id);
        $product_image=$request->file('product_image');
        $product_gallery=$request->file('product_gallery');
        $product_color_image=$request->file('product_color_image');

        $upload_path='public/upload/';
        $gal_img=[];
        if($product_gallery)
        {
            foreach ($product_gallery as $gallery) {
                $name = hexdec(uniqid()) . '.' . $gallery->extension();
                $gall_img = $upload_path.$name;
                $gallery->move($upload_path, $name);
                $gal_img[] = $gall_img;
            }
        }
        $color_img=[];
        if($product_color_image)
        {
            foreach ($product_color_image as $color_image) {
                $name = hexdec(uniqid()) . '.' . $color_image->extension();
                $col_img = $upload_path.$name;
                $color_image->move($upload_path, $name);
                $color_img[] = $col_img;
            }
        }
        $data['product_color_image']=json_encode($color_img);
        $data['product_gallery']=json_encode($gal_img);
        if($product_image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            $data['product_image']=$image_url;
            DB::table('product')->insert($data);
            $notification=array(
                'messege'=>'Successfully Product Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('product')->insert($data);
            $notification=array(
                'messege'=>'Successfully Product Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('products.all')->with($notification);

    }
    public function productall()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $product = DB::table('product')->get();
        return view('backend.product.all',compact('product'));
    }
    public function product_delete($product_id)
    {
        $delete = DB::table('product')->where('product_id',$product_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Product Deleted!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return back()->with($notification);
    }
    public function product_edit($product_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $user_id = Session::get('LoggedUser');
        $product = DB::table('product')->where('product_id',$product_id)->first();
        $category = DB::table('categories')->where('categories_status',1)->get();
        $subcategory = DB::table('categories_subcategory')->where('subcategory_status',1)->get();
        $childcategory =DB::table('categories_childcategory')->where('childcategory_status',1)->get();
        $brand = DB::table('brand')->where('brand_status',1)->get();
        $specification = DB::table('specification')->where('specification_status',1)->get();
        $shipping = DB::table('shipping')->where('shipping_status',1)->get();
        $user = DB::table('users')->where('id',$user_id)->first()->branch_id;
        $branch = DB::table('branch')->where('branch_id',$user)->first()->branch_type;
        if($branch == 1)
        {
            $Branch_Type = "Main Branch";
            $branch_name = DB::table('branch')->get();
        }
        else{
            $Branch_Type = "Sub Branch";
            $branch_name = DB::table('branch')->where('branch_id',$user)->get();
        }

        return view('backend.product.product_edit',compact('product','category','subcategory','childcategory','brand','specification','branch_name','Branch_Type','shipping'));
    }
    public function product_update(Request $request,$product_id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'categories_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_id' => 'required',
            'brand_id' => 'required',
            'product_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $data = array();
        $data['update_user_id']=$user_id;
        $data['branch_id']=$request->branch_id;
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['categories_id']=$request->categories_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_id']=$request->childcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_buying_price']=$request->product_buying_price;
        $data['product_selling_price']=$request->product_selling_price;
        $data['product_discount_type']=$request->product_discount_type;
        $data['product_discount_value']=$request->product_discount_value;
        $data['product_specification']=json_encode($request->product_specification);
        $data['product_specification_value']=json_encode($request->product_specification_value);
        $data['product_color']=json_encode($request->product_color);
        $data['product_color_name']=json_encode($request->product_color_name);
        $data['product_size']=json_encode($request->product_size);
        $data['product_status']=$request->product_status;
        $data['product_meta_title']=$request->product_meta_title;
        $data['product_meta_keyword']=$request->product_meta_keyword;
        $data['product_meta_description']=$request->product_meta_description;
        $data['product_shipping_id']=json_encode($request->product_shipping_id);
        $product_image=$request->file('product_image');
        $product_gallery=$request->file('product_gallery');
        $product_color_image=$request->file('product_color_image');

        $upload_path='public/upload/';
        $gal_img=[];
        if($product_gallery)
        {
            foreach ($product_gallery as $gallery) {
                $name = hexdec(uniqid()) . '.' . $gallery->extension();
                $gall_img = $upload_path.$name;
                $gallery->move($upload_path, $name);
                $gal_img[] = $gall_img;
            }
            $data['product_gallery']=json_encode($gal_img);
        }
        else{
            $data['product_gallery']=$request->old_product_gallery;
        }
        $color_img=[];
        if($product_color_image)
        {
            foreach ($product_color_image as $color_image) {
                $name = hexdec(uniqid()) . '.' . $color_image->extension();
                $col_img = $upload_path.$name;
                $color_image->move($upload_path, $name);
                $color_img[] = $col_img;
            }
            $data['product_color_image']=json_encode($color_img);
        }
        else{
            $data['product_color_image']=$request->old_product_color_image;
        }

        if($product_image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            $data['product_image']=$image_url;
            DB::table('product')->where('product_id',$product_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Product Updated',
                'alert-type'=>'success'
            );
        }else{
            DB::table('product')->where('product_id',$product_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Product Updated',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('products.all')->with($notification);
    }
    public function productcancel()
    {
        return view('backend.product.cancel');
    }


/*----------------- Specification ------------------*/


    public function specification()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
         $view = DB::table('specification')->orderBy('specification_id', 'DESC')->get();
        return view('backend.product.specification' ,compact('view'));
    }
    public function specification_store(Request $request)
    {
        $validated = $request->validate([
            'specification_name' => 'required|max:255',
        ]);
       $user_id = Session::get('LoggedUser');
        $data=array();
        $data['specification_name']=$request->specification_name;
        $data['specification_status']=$request->specification_status;
        $data['user_id']=$user_id;
        DB::table('specification')->insert($data);
        if ($data) {
            $notification=array(
                'messege'=>'Successfully specification Added!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function specification_edit($specification_id)
    {

        $specification = DB::table('specification')->where('specification_id', $specification_id)->first();
        return response()->json($specification);
    }
    public function specification_update(Request $request)
    {
        $validated = $request->validate([
            'specification_name' => 'required|max:255',
        ]);
       $user_id = Session::get('LoggedUser');
       $specification_id=$request->specification_id;
        $data=array();
        $data['specification_name']=$request->specification_name;
        $data['specification_status']=$request->specification_status;
        $data['update_user_id']=$user_id;
        DB::table('specification')->where('specification_id' ,$specification_id)->update($data);
        if ($data) {
            $notification=array(
                'messege'=>'Successfully specification update!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function specification_delete($specification_id)
    {
        $delete=DB::table('specification')->where('specification_id',$specification_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully specification Deleted!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }


    public function shipping()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $view = DB::table('shipping')->orderBy('shipping_id', 'DESC')->get();
        return view('backend.product.shipping', compact('view') );
    }
    public function shipping_store(Request $request)
    {
        $validated = $request->validate([
            'shipping_title' => 'required',
            'shipping_description' => 'required',
            'shipping_amount' => 'required',
            'time' => 'required',
            'shipping_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $data=array();
        $data['shipping_title']=$request->shipping_title;
        $data['user_id']=$user_id;
        $data['shipping_description']=$request->shipping_description;
        $data['shipping_amount']=$request->shipping_amount;
        $data['time']=$request->time;
        $data['shipping_status']=$request->shipping_status;
        $image=$request->file('shipping_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['shipping_image']=$image_url;
            DB::table('shipping')->insert($data);
            $notification=array(
                'messege'=>'Successfully shipping Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('shipping')->insert($data);
            $notification=array(
                'messege'=>'Successfully shipping Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
public function shipping_edit($shipping_id)
{
    $shipping_id = DB::table('shipping')->where('shipping_id', $shipping_id)->first();
        return response()->json($shipping_id);
}
public function shippingupdate(Request $request)
    {
        $validated = $request->validate([
            'shipping_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $shipping_id=$request->shipping_id;
        $data=array();
        $data['shipping_title']=$request->shipping_title;
        $data['update_user_id']=$user_id;
        $data['shipping_description']=$request->shipping_description;
        $data['shipping_amount']=$request->shipping_amount;
        $data['time']=$request->time;
        $data['shipping_status']=$request->shipping_status;
        $image=$request->file('shipping_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['shipping_image']=$image_url;
            // dd($data);
            DB::table('shipping')->where('shipping_id',$shipping_id)->update($data);
            $notification=array(
                'messege'=>'Successfully shipping Updated',
                'alert-type'=>'success'
            );
        }else{
            // dd($data);
            DB::table('shipping')->where('shipping_id',$shipping_id)->update($data);
            $notification=array(
                'messege'=>'Successfully shipping Updated',
                'alert-type'=>'success'
            );
    }
            return redirect()->back()->with($notification);
    }
    public function shipping_delete($shipping_id)
    {
        $delete=DB::table('shipping')->where('shipping_id',$shipping_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully specification Deleted!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function features_product()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.features.features_product');
    }

}




