<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class HomePageController extends Controller
{
    public function logocreate(Request $request)
    {
        $validated = $request->validate([
            'logo_image' => 'required|mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $image=$request->file('logo_image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['logo_image']=$image_url;
            DB::table('themes_logo')->insert($data);
            $notification=array(
                'messege'=>'Successfully Logo Added',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong !',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function logoedit($logo_id)
    {
        $logo_edit = DB::table('themes_logo')->where('logo_id',$logo_id)->first();
        return response()->json($logo_edit);
    }
    public function logoupdate(Request $request)
    {
        $id = $request->logo_id;
        $data=array();
        $image=$request->file('logo_image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['logo_image']=$image_url;
            DB::table('themes_logo')->where('logo_id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Logo Updated',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong !',
                'alert-type'=>'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    /*-------------------Slider--------------*/
    public function slider()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }

        $slider = DB::table('themes_slider')->get();
        return view('backend.home_page_settings.slider.slider',compact('slider'));
    }
    public function sliderindex()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.home_page_settings.slider.index');
    }
    public function slidercreate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'title_font' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'subtitle_font' => 'required|max:255',
            'description' => 'required|max:255',
            'description_font' => 'required|max:255',
            'slider_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['title_font']=$request->title_font;
        $data['title_color']=$request->title_color;
        $data['subtitle']=$request->subtitle;
        $data['subtitle_font']=$request->subtitle_font;
        $data['subtitle_color']=$request->subtitle_color;
        $data['description']=$request->description;
        $data['description_font']=$request->description_font;
        $data['description_color']=$request->description_color;
        $data['slider_price']=$request->slider_price;
        $data['slider_button_name']=$request->slider_button_name;
        $data['slider_button_link']=$request->slider_button_link;
        $image=$request->file('slider_image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['slider_image']=$image_url;
            DB::table('themes_slider')->insert($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('themes_slider')->insert($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('home.slider')->with($notification);
    }
    public function slideredit($slider_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $slider_edit = DB::table('themes_slider')->where('slider_id',$slider_id)->first();
        return view('backend.home_page_settings.slider.edit',compact('slider_edit'));
    }
    public function sliderupdate(Request $request,$slider_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'title' => 'required|max:255',
            'title_font' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'subtitle_font' => 'required|max:255',
            'description' => 'required|max:255',
            'description_font' => 'required|max:255',
            'slider_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['title_font']=$request->title_font;
//        $data['title_color']=$request->title_color;
        $data['subtitle']=$request->subtitle;
        $data['subtitle_font']=$request->subtitle_font;
//        $data['subtitle_color']=$request->subtitle_color;
        $data['description']=$request->description;
        $data['description_font']=$request->description_font;
//        $data['description_color']=$request->description_color;
        $data['slider_price']=$request->slider_price;
        $data['slider_button_name']=$request->slider_button_name;
        $data['slider_button_link']=$request->slider_button_link;
        $image=$request->file('slider_image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['slider_image']=$image_url;
            DB::table('themes_slider')->where('slider_id',$slider_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('themes_slider')->where('slider_id',$slider_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('home.slider')->with($notification);
    }
    public function sliderdelete($slider_id)
    {
        $delete=DB::table('themes_slider')->where('slider_id',$slider_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Slider Deleted!',
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
    /*-------------------Service--------------*/
    public function service()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }

        $service = DB::table('themes_service')->get();
        return view('backend.home_page_settings.service.service',compact('service'));
    }
    public function serviceedit($service_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $service_edit = DB::table('themes_service')->where('service_id',$service_id)->first();
        return view('backend.home_page_settings.service.edit',compact('service_edit'));
    }
    public function servicecreate(Request $request)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'service_title' => 'required|max:255',
            'service_description' => 'required',
            'service_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['service_title']=$request->service_title;
        $data['service_description']=$request->service_description;
        $image=$request->file('service_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['service_image']=$image_url;
            DB::table('themes_service')->insert($data);
            $notification=array(
                'messege'=>'Successfully Service Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('themes_service')->insert($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function serviceupdate(Request $request,$service_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'service_title' => 'required|max:255',
            'service_description' => 'required',
            'service_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['service_title']=$request->service_title;
        $data['service_description']=$request->service_description;
        $image=$request->file('service_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['service_image']=$image_url;
            DB::table('themes_service')->where('service_id',$service_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Service Updated',
                'alert-type'=>'success'
            );
        }else{
            $data['service_image']=$request->old_image;
            DB::table('themes_service')->where('service_id',$service_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Slider Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('theme.service')->with($notification);
    }
    public function servicedelete($service_id)
    {
        $delete=DB::table('themes_service')->where('service_id',$service_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Service Deleted!',
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
    /*-------------------Banner--------------*/
    public function banner()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $banner = DB::table('themes_banner')->get();
        return view('backend.home_page_settings.banner.banner',compact('banner'));
    }
    public function bannercreate(Request $request)
    {
        $validated = $request->validate([
            'banner_title' => 'required|max:255',
            'service_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['banner_title']=$request->banner_title;
        $data['banner_description']=$request->banner_description;
        $data['banner_link']=$request->banner_link;
        $image=$request->file('banner_image');

        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['banner_image']=$image_url;

            DB::table('themes_banner')->insert($data);
            $notification=array(
                'messege'=>'Successfully Banner Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('themes_banner')->insert($data);
            $notification=array(
                'messege'=>'Successfully Banner Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function bannerdelete($banner_id)
    {
        $delete=DB::table('themes_banner')->where('banner_id',$banner_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Banner Deleted!',
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
    public function banneredit($banner_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $banner_edit = DB::table('themes_banner')->where('banner_id',$banner_id)->first();
        return view('backend.home_page_settings.banner.edit',compact('banner_edit'));
    }
    public function bannerupdate(Request $request,$banner_id)
    {
        $validated = $request->validate([
            'banner_title' => 'required|max:255',
            'service_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['banner_title']=$request->banner_title;
        $data['banner_description']=$request->banner_description;
        $data['banner_link']=$request->banner_link;
        $image=$request->file('banner_image');

        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['banner_image']=$image_url;
            DB::table('themes_banner')->where('banner_id',$banner_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Banner Updated',
                'alert-type'=>'success'
            );
        }else{
            $data['banner_image']=$request->old_image;
            DB::table('themes_banner')->where('banner_id',$banner_id)->update($data);
            $notification=array(
                'messege'=>'Successfully Banner Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('theme.banner')->with($notification);
    }
    /*-------------------Right Banner--------------*/
    public function rigth_side_banner()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $right_banner = DB::table('theme_rigth_side_banner')->get();
        return view('backend.home_page_settings.right_side_banner.rigth_side_banner',compact('right_banner'));
    }
    public function rightbannercreate(Request $request)
    {
        $validated = $request->validate([
            'rigth_banner_title' => 'max:255',
            'right_banner_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['rigth_banner_title']=$request->rigth_banner_title;
        $data['right_banner_description']=$request->right_banner_description;
        $data['right_banner_link']=$request->right_banner_link;
        $image=$request->file('right_banner_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['right_banner_image']=$image_url;
            DB::table('theme_rigth_side_banner')->insert($data);
            $notification=array(
                'messege'=>'Successfully Banner Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('theme_rigth_side_banner')->insert($data);
            $notification=array(
                'messege'=>'Successfully Banner Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function rightbanneredit($rigth_banner_id)
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $right_banner_edit = DB::table('theme_rigth_side_banner')->where('rigth_banner_id',$rigth_banner_id)->first();
        return view('backend.home_page_settings.right_side_banner.edit',compact('right_banner_edit'));
    }
    public function rightbannerupdate(Request $request)
    {
        $id = $request->rigth_banner_id;
        $validated = $request->validate([
            'rigth_banner_title' => 'max:255',
            'right_banner_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['rigth_banner_title']=$request->rigth_banner_title;
        $data['right_banner_description']=$request->right_banner_description;
        $data['right_banner_link']=$request->right_banner_link;
        $image=$request->file('right_banner_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['right_banner_image']=$image_url;
            DB::table('theme_rigth_side_banner')->where('rigth_banner_id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Right Banner Updated',
                'alert-type'=>'success'
            );
        }else {
            $data['right_banner_image'] = $request->old_image;
            DB::table('theme_rigth_side_banner')->where('rigth_banner_id', $id)->update($data);
            $notification = array(
                'messege' => 'Successfully Right Banner Added',
                'alert-type' => 'success'
            );
        }
            return redirect()->route('theme.rigth_side_banner')->with($notification);
    }
    public function rightbannerdelete($rigth_banner_id)
    {
        $delete=DB::table('theme_rigth_side_banner')->where('rigth_banner_id',$rigth_banner_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Banner Deleted!',
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
/*-------------------Reviews--------------*/
    public function reviews()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $review = DB::table('themes_review')->get();
        return view('backend.home_page_settings.reviews.reviews',compact('review'));
    }
    public function reviewscreate(Request $request)
    {
        $validated = $request->validate([
            'review_title' => 'required|max:255',
            'review_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['review_title']=$request->review_title;
        $data['review_subtitle']=$request->review_subtitle;
        $data['review_description']=$request->review_description;
        $image=$request->file('review_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['review_image']=$image_url;
            DB::table('themes_review')->insert($data);
            $notification=array(
                'messege'=>'Successfully Review Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('themes_review')->insert($data);
            $notification=array(
                'messege'=>'Successfully Review Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function reviewedit($review_id)
    {
        $review_edit = DB::table('themes_review')->where('review_id',$review_id)->first();
        return response()->json($review_edit);
    }
    public function reviewupdate(Request $request)
    {
        $id = $request->review_id;
        $validated = $request->validate([
            'review_title' => 'required|max:255',
            'review_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['review_title']=$request->review_title;
        $data['review_subtitle']=$request->review_subtitle;
        $data['review_description']=$request->review_description;
        $image=$request->file('review_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['review_image']=$image_url;
            DB::table('themes_review')->where('review_id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Review Updated',
                'alert-type'=>'success'
            );
        }else {
            DB::table('themes_review')->where('review_id',$id)->update($data);
            $notification = array(
                'messege' => 'Successfully Review Updated',
                'alert-type' => 'success'
            );
        }
            return redirect()->route('theme.reviews')->with($notification);
    }
    public function reviewdelete($review_id)
    {
        $delete=DB::table('themes_review')->where('review_id',$review_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Review Deleted!',
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

    /*-------------------Partner--------------*/
    public function partner()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $partner= DB::table('themes_partner')->get();
        return view('backend.home_page_settings.partner.partner',compact('partner'));
    }
    public function partnercreate(Request $request)
    {
        $validated = $request->validate([
            'partner_image' => 'required|mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['partner_link']=$request->partner_link;
        $image=$request->file('partner_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['partner_image']=$image_url;
            DB::table('themes_partner')->insert($data);
            $notification=array(
                'messege'=>'Successfully Partner Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('themes_review')->insert($data);
            $notification=array(
                'messege'=>'Successfully Partner Added',
                'alert-type'=>'success'
            );
        }
        return back()->with($notification);
    }
    public function partneredit($partner_id)
    {
        $partner_edit=DB::table('themes_partner')->where('partner_id',$partner_id)->first();
        return response()->json($partner_edit);
    }
    public function partnerupdate(Request $request)
    {
        $id = $request->partner_id;
        $validated = $request->validate([
            'partner_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['partner_link']=$request->partner_link;
        $image=$request->file('partner_image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['partner_image']=$image_url;
            DB::table('themes_partner')->where('partner_id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Review Updated',
                'alert-type'=>'success'
            );
        }else {
            DB::table('themes_partner')->where('partner_id',$id)->update($data);
            $notification = array(
                'messege' => 'Successfully Review Updated',
                'alert-type' => 'success'
            );
        }
        return back()->with($notification);
    }
    public function partnerdelete($partner_id)
    {
        $delete=DB::table('themes_partner')->where('partner_id',$partner_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Partner Deleted!',
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

    /*-------------------Social--------------*/
    public function social()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
//        $partner= DB::table('themes_partner')->get();
        return view('backend.home_page_settings.social.social');
    }
    public function home_page_customization()
    {
        return view('backend.home_page_settings.home_page_customization');
    }

    public function query_test()
    {
        // DB::table('categories_subcategory')->where('subcategory_status',1)->orderBy('subcategory_id')->chunk(10, function ($users) {
        //     foreach ($users as $user) {
        //         DB::table('categories')->where('categories_id',$user->categories_id)->orderBy('categories_id')->chunk(10, function ($data) {

        //         foreach ($data as $data) {

        //         }
        //     });
        //     echo json_encode($user);
        //     }
        // });
        //$cat_id=$view->categories_id;
        $bettings = DB::table('categories_subcategory')
            ->select('*')
            ->where('subcategory_status', 1)
            ->join('categories', function( $join) {
                $join->on('categories_subcategory.categories_id', '=', 'categories.categories_id ')
                        ->where('categories_subcategory.categories_id' , '=', 1);
            })
            // ->groupBy('1st', '2nd')
            ->with('categories')
            ->get();

            echo json_encode($bettings);

    }
}
