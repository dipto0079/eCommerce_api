<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
/*---------------- Main Categroy Start-------------------*/
    public function maincategory()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $view = DB::table('categories')->orderBy('categories_id', 'DESC')->get();
        return view('backend.category.main_category',compact('view'));
    }
    public function categories_store(Request $request)
    {
        $validated = $request->validate([
            'categories_name' => 'required|max:255',
            'categories_slug' => 'required|max:255',
            'category_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $categories = $request->categories_status;
        if ($categories == "active") {
            $categories_statuss = '1';
        } else {
            $categories_statuss = '0';
        }
       $user_id = Session::get('LoggedUser');
        $data=array();
        $data['categories_name']=$request->categories_name;
        $data['categories_slug']=$request->categories_slug;
        $data['categories_status']=$categories_statuss;
        $data['authority_id']=$user_id;
        $image=$request->file('category_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['category_image']=$image_url;
            DB::table('categories')->insert($data);
            $notification=array(
                'messege'=>'Successfully Category Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('categories')->insert($data);
            $notification=array(
                'messege'=>'Successfully Category Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }


    public function categories_edit($categories_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $category = DB::table('categories')->where('categories_id', $categories_id)->first();
        return response()->json($category);
    }
    public function categories_update(Request $request )
    {
        $validated = $request->validate([
            'categories_name' => 'required|max:255',
            'categories_slug' => 'required|max:255',
            'category_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $categories = $request->categories_status;
        if ($categories == "active") {
            $categories_statuss = '1';
        } else {
            $categories_statuss = '0';
        }
        $user_id = Session::get('LoggedUser');
        $categories_id =$request->categories_id;
        $data=array();
        $data['categories_name']=$request->categories_name;
        $data['categories_slug']=$request->categories_slug;
        $data['categories_status']=$categories_statuss;
        $data['authority_id']=$user_id;
        $image=$request->file('category_image');

        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['category_image']=$image_url;
            DB::table('categories')->where('categories_id',$categories_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Category Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('categories')->where('categories_id',$categories_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Category Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);


//        $update = DB::table('categories')->where('categories_id',$categories_id)->update($data);
//
//
//        if ($update) {
//            $notification=array(
//                'messege'=>'Successfully Updated',
//                'alert-type'=>'success'
//            );
//        }else{
//            $notification=array(
//                'messege'=>'Something Went Wrong',
//                'alert-type'=>'error'
//            );
//        }
//        return redirect()->route('category.main')->with($notification);

    }
    public function categories_delete($categories_id)
    {
        $delete=DB::table('categories')->where('categories_id',$categories_id)->delete();
        DB::table('categories_subcategory')->where('categories_id',$categories_id)->delete();
        DB::table('categories_childcategory')->where('categories_id',$categories_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully category Deleted!',
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
/*------------------- Main Categroy End---------------------*/
    /*--------------- Sub Category Start--------------------*/
    public function subcategory_index()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $category = DB::table('categories')->where('categories_status',1)->get();
        $subcategory = DB::table('categories_subcategory')
        ->join('categories','categories_subcategory.categories_id','categories.categories_id')
        ->select('categories_subcategory.*','categories.categories_name')->orderBy('subcategory_id', 'DESC')
        ->get();
        return view('backend.category.sub_category',compact('category','subcategory'));
    }


    public function subcategory_store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required',
            'subcategory_slug' => 'required',
            'categories_id' => 'required',
            'subcategory_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $data=array();
        $data['categories_id']=$request->categories_id;
        $data['authority_id']=$user_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcategory_slug']=$request->subcategory_slug;
        $data['subcategory_status']=$request->subcategory_status;
        $image=$request->file('subcategory_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['subcategory_image']=$image_url;
            DB::table('categories_subcategory')->insert($data);
            $notification=array(
                'messege'=>'Successfully Service Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('categories_subcategory')->insert($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }


    public function subcategory_edit($subcategory_id)
    {
        $subcategory = DB::table('categories_subcategory')
        ->join('categories','categories_subcategory.categories_id','categories.categories_id')
        ->select('categories_subcategory.*','categories.categories_name')
        ->where('categories_subcategory.subcategory_id', $subcategory_id)
        ->first();
        // dd($subcategory);

         return response()->json($subcategory);
    }

    public function subcategory_update(Request $request )
    {$validated = $request->validate([
        'subcategory_name' => 'required',
        'subcategory_slug' => 'required',
        'categories_id' => 'required',
        'subcategory_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',

    ]);
    $user_id = Session::get('LoggedUser');
    $subcategory_id=$request->subcategory_id ;
    $data=array();
    $data['categories_id']=$request->categories_id;
    $data['authority_id']=$user_id;
    $data['subcategory_name']=$request->subcategory_name;
    $data['subcategory_slug']=$request->subcategory_slug;
    $data['subcategory_status']=$request->subcategory_status;
    $image=$request->file('subcategory_image');
        if($image) {

                $image_name=hexdec(uniqid());
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/upload/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['subcategory_image']=$image_url;
                DB::table('categories_subcategory')->where('subcategory_id',$subcategory_id)->update($data);
                $notification=array(
                    'messege'=>'Successfully Category Added',
                    'alert-type'=>'success'
                );
            }else{
                DB::table('categories_subcategory')->where('subcategory_id',$subcategory_id)->update($data);
                $notification=array(
                    'messege'=>'Successfully Category Added',
                    'alert-type'=>'success'
                );
        }
        return redirect()->route('category.subcategory.index')->with($notification);

    }
    public function subcategory_delete($subcategory_id)
    {
        $delete=DB::table('categories_subcategory')->where('subcategory_id',$subcategory_id)->delete();
        DB::table('categories_childcategory')->where('subcategory_id',$subcategory_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Subcategory Deleted!',
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
/*------------------------------ end subcategory-------------------------*/
/*------------------------------- Start childcategory---------------------*/
    public function childcategory()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $category = DB::table('categories')->where('categories_status',1)->get();
        $subcategory = DB::table('categories_subcategory')->where('subcategory_status',1)->get();
        $childcategory =DB::table('categories_childcategory')
        ->join('categories_subcategory','categories_childcategory.subcategory_id','categories_subcategory.subcategory_id')
        ->join('categories','categories_childcategory.categories_id','categories.categories_id')
        ->select('categories_childcategory.*','categories_subcategory.subcategory_name','categories_childcategory.*','categories.categories_name')->orderBy('childcategory_id', 'DESC')
        ->get();
        return view('backend.category.child_category',compact('category','subcategory','childcategory'));
    }
    public function childcategory_store(Request $request)
    {
        $validated = $request->validate([
            'categories_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_name' => 'required',
            'childcategory_slug' => 'required',
            'childcategory_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $data=array();
        $data['categories_id']=$request->categories_id;
        $data['authority_id']=$user_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_name']=$request->childcategory_name;
        $data['childcategory_slug']=$request->childcategory_slug;
        $data['childcategory_status']=$request->childcategory_status;
        $image=$request->file('childcategory_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['childcategory_image']=$image_url;
            DB::table('categories_childcategory')->insert($data);
            $notification=array(
                'messege'=>'Successfully Child Category Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('categories_childcategory')->insert($data);
            $notification=array(
                'messege'=>'Successfully Child Category Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function childcategory_edit($childcategory_id)
    {
        $childcategory =DB::table('categories_childcategory')
        ->join('categories_subcategory','categories_childcategory.subcategory_id','categories_subcategory.subcategory_id')
        ->select('categories_childcategory.*','categories_subcategory.subcategory_name')
        ->where('categories_childcategory.childcategory_id', $childcategory_id)
        ->first();
        // dd($subcategory);

         return response()->json($childcategory);

    }
        public function childcategory_update(Request $request)
        {$validated = $request->validate([
            'categories_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_name' => 'required',
            'childcategory_slug' => 'required',
            'childcategory_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',

        ]);
        $user_id = Session::get('LoggedUser');
        $childcategory_id=$request->childcategory_id ;
        $data=array();
        $data['categories_id']=$request->categories_id;
        $data['authority_id']=$user_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_name']=$request->childcategory_name;
        $data['childcategory_slug']=$request->childcategory_slug;
        $data['childcategory_status']=$request->childcategory_status;
        $image=$request->file('childcategory_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['childcategory_image']=$image_url;
                    DB::table('categories_childcategory')->where('childcategory_id',$childcategory_id)->update($data);
                    $notification=array(
                        'messege'=>'Successfully Childcategory Updated',
                        'alert-type'=>'success'
                    );
                }else{
                    DB::table('categories_childcategory')->where('childcategory_id',$childcategory_id)->update($data);
                    $notification=array(
                        'messege'=>'Successfully Childcategory Updated',
                        'alert-type'=>'success'
                    );
            }
            return redirect()->route('category.childcategory.index')->with($notification);

        }
        public function childcategory_delete($childcategory_id)
        {
            $delete=DB::table('categories_childcategory')->where('childcategory_id',$childcategory_id)->delete();
            if ($delete) {
                $notification=array(
                    'messege'=>'Successfully Childcategory Deleted!',
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
        public function brand()
        {
            if (!Session::has('LoggedUser')) {
                return redirect()->route('login');
            }
             $view = DB::table('brand')->orderBy('brand_id', 'DESC')->get();
            return view('backend.category.brand' ,compact('view'));
        }
        public function brand_store(Request $request)
        {
            $validated = $request->validate([
                'brand_name' => 'required|max:255',
                'brand_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
            ]);
           $user_id = Session::get('LoggedUser');
            $data=array();
            $data['brand_name']=$request->brand_name;
            $data['brand_status']=$request->brand_status;
            $data['user_id']=$user_id;
            $image=$request->file('brand_image');
            if($image) {
                $image_name=hexdec(uniqid());
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/upload/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['brand_image']=$image_url;
                DB::table('brand')->insert($data);
                $notification=array(
                    'messege'=>'Successfully Brand Added',
                    'alert-type'=>'success'
                );
            }else{
                DB::table('brand')->insert($data);
                $notification=array(
                    'messege'=>'Successfully Brand Added',
                    'alert-type'=>'success'
                );
            }
            return redirect()->back()->with($notification);
        }
        public function brand_edit($brand_id)
        {
            $brand = DB::table('brand')->where('brand_id', $brand_id)->first();
            return response()->json($brand);
        }
        public function brand_update(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $brand_id=$request->brand_id;
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_status']=$request->brand_status;
        $image=$request->file('brand_image');

        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_image']=$image_url;
            DB::table('brand')->where('brand_id',$brand_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Brand Update',
                'alert-type'=>'success'
            );
        }else{
            DB::table('brand')->where('brand_id',$brand_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Brand Update',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
        }
        public function brand_delete($brand_id)
        {
            $delete=DB::table('brand')->where('brand_id',$brand_id)->delete();
            if ($delete) {
                $notification=array(
                    'messege'=>'Successfully Brand Deleted!',
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
    }

