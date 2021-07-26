<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    public function index()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.theme.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'theme_name' => 'required|max:255',
            'folder_name' => 'required|unique:themes|max:255',
            'time' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['theme_name']=$request->theme_name;
        $data['time']=$request->time;
        $data['status']=$request->status;
        $image=$request->file('image');

        $foldername = $request->folder_name;
        $path = public_path().'/theme/'.$foldername;

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $data['folder_name']=$path;

        dd($data);
    }

    public function view()
    {
        if (Session::has('LoggedUser')) {
            $themes = DB::table('themes')->get();
            return view('backend.theme.view',compact('themes'));
        }
        else{
            return redirect('login');
        }
    }
    public function details($theme_id)
    {
        $theme = DB::table('themes')->where('theme_id',$theme_id)->first();
        return response()->json($theme);
    }

    public function change($theme_id)
    {
        $status = DB::table('themes')->where('theme_id',$theme_id)->first()->status;
        $data=array();
        $data2=array();
        $data['status']=1;
        $data2['status']=0;
        $update = DB::table('themes')->where('theme_id',$theme_id)->update($data);
        DB::table('themes')->where('theme_id','!=',$theme_id)->update($data2);
        if ($update) {
            $notification=array(
                'messege'=>'Successfully Theme Changed',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
            );
        }

//        $data2=array();
//        if ($status == 1){
//            $new_status = 0;
//            $data['status']=$new_status;
//            $update = DB::table('themes')->where('theme_id',$theme_id)->update($data);
//        }
//        else{
//            $new_status = 1;
//            $data['status']=$new_status;
//            $data2['status']=0;
//            $update = DB::table('themes')->where('theme_id',$theme_id)->update($data);
//            $update = DB::table('themes')->where('theme_id','!=',$theme_id)->update($data2);
//        }
//            $notification=array(
//                'messege'=>'Successfully Theme Changed',
//                'alert-type'=>'success'
//            );
        return back()->with($notification);
    }
}
