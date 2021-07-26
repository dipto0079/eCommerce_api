<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;
class LanguageController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedUser')) {
            $language = DB::table('language')->orderBy('lang_id', 'asc')->get();
            return view('backend.language.index', compact('language'));
        }
        else{
            return redirect('login');
        }
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'language_name' => 'required|unique:language|max:255',
            'short_form' => 'required|max:255',
            'language_code' => 'required|max:255',
        ]);
        $status = $request->status;
        if ($status == "active") {
            $statuss= '1';
        } else {
            $statuss = '0';
        }
        $data=array();
        $data['language_name']=$request->language_name;
        $data['short_form']=$request->short_form;
        $data['language_code']=$request->language_code;
        $data['text_direction']=$request->text_direction;
        $data['status']=$statuss;
        $insert=DB::table('language')->insert($data);
        if ($insert) {
            $notification=array(
                'messege'=>'Successfully Language Added',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
            );
        }
        $select = DB::table('language')->where('language_name',$request->language_name)->first();
        $language_id = $select->lang_id;
        $components=DB::table('language_components')->get();
        foreach ($components as $single)
        {
            $insert_two = array(
                'component_id'=> $single->comp_id,
                'component_value'=> $single->comp_name,
                'language_id'=> $language_id
            );
           DB::table('language_changed')->insert($insert_two);
        }

        return redirect()->back()->with($notification);
    }
    public function view()
    {
        $language = DB::table('language')->get();
        $comp = DB::table('language_components')->get();
        return view('backend.language.view',compact('language','comp'));
    }

    public function delete($lang_id)
    {
        $delete=DB::table('language')->where('lang_id',$lang_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Language Deleted!',
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
    public function edit($lang_id)
    {
        $language=DB::table('language')->where('lang_id',$lang_id)->first();
        return view('backend.language.edit',compact('language'));
    }
    public function update(Request $request, $lang_id)
    {
        $validated = $request->validate([
            'language_name' => 'required|max:255',
            'short_form' => 'required|max:255',
            'language_code' => 'required|max:255',
        ]);
        $status = $request->status;
        if ($status == "active") {
            $statuss= '1';
        } else {
            $statuss = '0';
        }
        $data=array();
        $data['language_name']=$request->language_name;
        $data['short_form']=$request->short_form;
        $data['language_code']=$request->language_code;
        $data['text_direction']=$request->text_direction;
        $data['status']=$statuss;
        $update=DB::table('language')->where('lang_id',$lang_id)->update($data);
        if ($update) {
            $notification=array(
                'messege'=>'Successfully Language Updated!',
                'alert-type'=>'success'
            );
            return redirect()->route('language.add')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

//    public function change($comp_id)
//    {
//        $language = DB::table('language')->get();
//        $compname = DB::table('components')->where('comp_id',$comp_id)->first();
//        return view('backend.language.change',compact('language','compname'));
//    }

    public function componentslanguage(Request $request)
    {
        $data = $request->data;
        $component = DB::table('language_components')->get();
        //$output=array();
        foreach ($component as $single)
        {
            $insert = array(
                'language_name'=> $data[$single->comp_id],
                'component_id'=> $id = $single->comp_id
            );
            $insertt=DB::table('language_changed')->insert($insert);
        }
//        return response()->json($output);

        if ($insertt) {
            $notification=array(
                'messege'=>'Successfully Language Added',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function defaultlanguagechange(Request $request)
    {
        $user_id = Session::get('LoggedUser');
        $data=array();
        $data['language_id']=$request->Language_id;
        DB::table('users')->where('id',$user_id)->update($data);
        $language_name = DB::table('language')->where('lang_id',$request->Language_id)->first()->language_name;
        $return = array(
            'return'=>true,
            'language_name'=> $language_name
        );
        return response()->json($return);

    }
//    public function english()
//    {
//        Session::get('language');
//        session()->forget('language');
//        Session::put('language','english');
//        return redirect()->back();
//    }
//    public function bangla()
//    {
//        Session::get('language');
//        session()->forget('language');
//        Session::put('language','bangla');
//        return redirect()->back();
//    }
}
