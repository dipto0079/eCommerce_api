<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;



class StockController extends Controller
{
    public function stock()
    {
        
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $user_id = Session::get('LoggedUser');

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
       $supplier =DB::table('supplier')->get();
       $product =DB::table('product')->get();
        return view('backend.stock.stock', compact('product','branch_name','supplier'));
    }
    public function stock_index(){
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $user_id = Session::get('LoggedUser');
        $user = DB::table('users')->where('id',$user_id)->first()->branch_id;
        $branch = DB::table('branch')->where('branch_id',$user)->first()->branch_type;
        if($branch == 1)
        {
            $Branch_Type = "Main Branch";
            $branch_name = DB::table('branch')->get();
        }
        else
        {
            $Branch_Type = "Sub Branch";
            $branch_name = DB::table('branch')->where('branch_id',$user)->get();
        }
       $supplier =DB::table('supplier')->get();
       $stock =DB::table('stock')->get();

        return view('backend.stock.view_stock', compact('branch_name','stock','supplier'));
    }

    public function product_edit($product_id)
    {
        $product_id = DB::table('product')->where('product_id', $product_id)->first();
        return response()->json($product_id);
    }

    public function supplier(Request $request)
    {
        
        $validated = $request->validate([
            'supplier_name' => 'required|max:255',
            'supplier_phone' => 'required|max:255',
            'supplier_address' => 'required|max:255',
            'supplier_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

       $user_id = Session::get('LoggedUser');
        $data=array();
        $data['supplier_name']=$request->supplier_name;
        $data['supplier_phone']=$request->supplier_phone;
        $data['supplier_address']=$request->supplier_address;
        $data['user_id']=$user_id;
        $image=$request->file('supplier_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['supplier_image']=$image_url;
            DB::table('supplier')->insert($data);
            $notification=array(
                'messege'=>'Successfully supplier Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('supplier')->insert($data);
            $notification=array(
                'messege'=>'Successfully supplier Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function stock_store(Request $request)
    {
         
        $validated = $request->validate([
            'branch_id' => 'required|max:255',
            'supplier_id' => 'required|max:255',
            'note' => 'required|max:255',
            'stock_status' => 'required|max:255',
        ]);

       $user_id = Session::get('LoggedUser');
        $data=array();      
        $data['branch_id']=$request->branch_id;
        $data['supplier_id']=$request->supplier_id;
        $data['note']=$request->note;
        $data['stock_status']=$request->stock_status;
        $data['stock_product']=json_encode($request->stock_product);
        $data['user_id']=$user_id;
        DB::table('stock')->insert($data);
            $notification=array(
                'messege'=>'Successfully stock Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
      
    
}
