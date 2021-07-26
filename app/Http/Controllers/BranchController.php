<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class BranchController extends Controller
{
    public function branch()
    {

        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $id = (string) Str::uuid();
        $view = DB::table('branch')
        ->orderBy('branch_type','desc')
        ->orderBy('branch_id','DESC')
        ->get();
        return view('backend.branch', compact('view','id') );
    }
    public function branch_store(Request $request)
    {
        $validated = $request->validate([
            'branch_name' => 'required',
            'branch_email' => 'required',
            'branch_address' => 'required',
            'branch_phone' => 'required',
            'branch_API' => 'required',
            'branch_logo' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $data=array();
        $data['branch_name']=$request->branch_name;
        $data['branch_email']=$request->branch_email;
        $data['user_id']=$user_id;
        $data['branch_address']=$request->branch_address;
        $data['branch_phone']=$request->branch_phone;
        $data['branch_API']=$request->branch_API;
        $data['branch_type']=$request->branch_type;
        $data['branch_status']=$request->branch_status;
        $image=$request->file('branch_logo');
        $id = 0;
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['branch_logo']=$image_url;
            $id = DB::table('branch')->insertGetId($data);
            $notification=array(
                'messege'=>'Successfully branch Added',
                'alert-type'=>'success'
            );
        }else{
            $id = DB::table('branch')->insertGetId($data);
            $notification=array(
                'messege'=>'Successfully branch Added',
                'alert-type'=>'success'
            );
        }

        if($id!=0)
        {
            if($request->branch_type == 1 )
            {
                DB::table('branch')->where('branch_id','!=',$id)->update(array('branch_type'=>'0'));
            }
        }




        return redirect()->back()->with($notification);
    }
    public function branch_edit($branch_id)
    {
        $branch_id = DB::table('branch')->where('branch_id', $branch_id)->first();
        return response()->json($branch_id);
    }
    public function branch_update(Request $request)
    {
        $validated = $request->validate([
            'branch_name' => 'required',
            'branch_email' => 'required',
            'branch_address' => 'required',
            'branch_phone' => 'required',
            'branch_API' => 'required',
            'branch_logo' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $user_id = Session::get('LoggedUser');
        $branch_id=$request->branch_id;
        $data=array();
        $data['branch_name']=$request->branch_name;
        $data['branch_email']=$request->branch_email;
        $data['update_user_id']=$user_id;
        $data['branch_address']=$request->branch_address;
        $data['branch_phone']=$request->branch_phone;
        $data['branch_API']=$request->branch_API;
        $data['branch_type']=$request->branch_type;
        $data['branch_status']=$request->branch_status;
        $image=$request->file('branch_logo');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['branch_logo']=$image_url;
            DB::table('branch')->where('branch_id',$branch_id)->update($data);
            $notification=array(
                'messege'=>'  success fully branch Updated',
                'alert-type'=>'success'
            );
        }else{
            // dd($data);
            DB::table('branch')
            ->where('branch_id',$branch_id)->update($data);
            $notification=array(
                'messege'=>'Successfully branch Updated',
                'alert-type'=>'success'
            );
        }
        if($branch_id != 0)
        {
            if($request->branch_type == 1 )
            {
                DB::table('branch')->where('branch_id','!=',$branch_id)->update(array('branch_type'=>'0'));
            }
        }
        return redirect()->back()->with($notification);
    }
    public function branch_delete($branch_id)
    {
        $delete=DB::table('branch')->where('branch_id',$branch_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully branch Deleted!',
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
