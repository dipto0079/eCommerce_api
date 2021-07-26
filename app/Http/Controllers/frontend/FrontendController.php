<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
require_once 'src/BeforeValidException.php';
require_once 'src/ExpiredException.php';
require_once 'src/SignatureInvalidException.php';
require_once 'src/JWT.php';
use \Firebase\JWT\JWT;
class FrontendController extends Controller
{
//    public function customerdashboard($token)
//    {
//        $sec_key = "example_key";
//        $customer = JWT::decode($token,$sec_key, array('HS256'));
//        \Illuminate\Support\Facades\Session::put('customerLogged',$customer);
//        if (Session()->has('customerLogged')) {
//            return view('frontend.electro.customer_dashboard');
//        }
//        else{
//            return redirect()->route('/');
//        }
//    }
//    public function customerlogout()
//    {
//        if (Session()->has('customerLogged')){
//            Session()->pull('customerLogged');
//            $notification=array(
//                'messege'=>'Successfully Log Out!',
//                'alert-type'=>'success'
//            );
//            return redirect()->route('/')->with($notification);
//        }
//    }
}
