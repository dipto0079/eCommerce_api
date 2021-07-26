<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
require_once 'src/BeforeValidException.php';
require_once 'src/ExpiredException.php';
require_once 'src/SignatureInvalidException.php';
require_once 'src/JWT.php';
use \Firebase\JWT\JWT;
class UserController extends Controller
{
    public function index()
    {
        //return view('frontend.electro.master');
        return view('frontend.electro.home');
    }
    public function faqs(){
        //echo 'fasd';
        return view('frontend.electro.faq');
    }
    public function about(){
        //echo 'fasd';
        return view('frontend.electro.about_page');
    }
    public function cart(){
        //echo 'fasd';
        return view('frontend.electro.cart');
    }
    public function compare(){
        //echo 'fasd';
        return view('frontend.electro.compare');
    }
    public function contact(){
        //echo 'fasd';
        return view('frontend.electro.contact_page');
    }
    public function track_order(){
        //echo 'fasd';
        return view('frontend.electro.tracking_page');
    }
    public function wishlist(){
        //echo 'fasd';
        return view('frontend.electro.wishlist');
    }
    public function terms(){
        return view('frontend.electro.terms_and_Conditions');
    }


    public function language_change($id)
    {
        \Session::forget('lan');
        \Session::put('lan',$id);

        $language_name = DB::table('language')->where('lang_id',$id)->first()->language_name;
        $notification = array(
            'messege' => 'You Change Language In '.$language_name,
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function branch($id)
    {
        \Session::forget('branch');
        \Session::put('branch',$id);

        $branch_name = DB::table('branch')->where('branch_id',$id)->first()->branch_name;
        $notification = array(
            'messege' => 'Your Change Branch Is '.$branch_name,
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
    public function category($id){
        return view('frontend.electro.category',compact('id'));
    }

    public function subcategories($id){

        return view('frontend.electro.sub_category',compact('id'));
    }

    public function childcategories($id){

        return view('frontend.electro.child_category',compact('id'));
    }

    public function single_product($id){
        return view('frontend.electro.single_product',compact('id'));
    }

    public function login()
    {
        return view('backend.auth.login');
    }
    public function register()
    {
        return view('backend.auth.register');
    }
    public function customercheck($token)
    {
       return view('frontend.electro.customer_dashboard',compact('token'));
    }

    public function customerlogout()
    {
        if (Session()->has('user')){
            Session()->pull('user');
            $notification=array(
                'messege'=>'Successfully Log Out!',
                'alert-type'=>'success'
            );
            return redirect()->route('/')->with($notification);
        }
    }
    public function buy_check($id)
    {
        return view('frontend.electro.checkout',compact('id'));
    }

    public function test()
    {
        $customer = Session()->get('user');
        return response()->json($customer);
    }


    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
            'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $image=$request->file('image');
        if($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('users')->insert($data);
            $notification=array(
                'messege'=>'Successfully User Added',
                'alert-type'=>'success'
            );
        }else{
            DB::table('users')->insert($data);
            $notification=array(
                'messege'=>'Successfully User Added',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('login')->with($notification);
    }
    public function check(Request $request)
    {
        $user = DB::table('users')->where('email','=',$request->email)->first();
        if ($user)
        {
            if (Hash::check($request->password, $user->password)){
                //$request->Session()->put('LoggedUser',$user->id);
                \Illuminate\Support\Facades\Session::put('LoggedUser',$user->id);
                $notification=array(
                    'messege'=>'Successfully Logged In !',
                    'alert-type'=>'success'
                );
                return redirect()->route('dashboard')->with($notification);
            }
            else{
                $notification=array(
                    'messege'=>'Something went wrong !',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function dashboard()
    {
        if (Session()->has('LoggedUser')){
            $user = DB::table('users')->where('id','=',Session('LoggedUser'))->first();
            return view('backend.dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        if (Session()->has('LoggedUser')){
            Session()->pull('LoggedUser');
//            return redirect('login');
            $notification=array(
                'messege'=>'Successfully Log Out!',
                'alert-type'=>'success'
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
