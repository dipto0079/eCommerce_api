<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use Illuminate\Contracts\Session\Session;
require_once 'src/BeforeValidException.php';
require_once 'src/ExpiredException.php';
require_once 'src/SignatureInvalidException.php';
require_once 'src/JWT.php';
use \Firebase\JWT\JWT;
class CustomerController extends Controller
{
    public function customerstore(Request $request)
    {
        $cus=array();
        $cus['customer_name'] = $request->customer_name;
        $cus['customer_email'] = $request->customer_email;
        $cus['customer_password'] = Hash::make($request->customer_password);
        $cus['email_verification_code'] = Str::random(40);
        $have="";
        if (DB::table('customers')->where('customer_email',$request->customer_email)->count() == 1)
        {
            $have=['key'=>false];
        }
        else{
            DB::table('customers')->insert($cus);
//            Mail::to($request->customer_email)->send(new EmailVerificationMail($cus));
            $have=['key'=>true];
        }
        return response()->json($have);

    }

    public function customerlogin(Request $request)
    {
        $email = $request->cus_email;
        $pass = $request->cus_pass;
        $customer = DB::table('customers')->where('customer_email',$email)->first();
        $log ="";
        if ($customer)
        {
            if (Hash::check($pass, $customer->customer_password)){

                $sec_key = getsettings('Secret_Key');
                $token = array(
                    "customer_id" => $customer->customer_id,
                    "customer_email" => $customer->customer_email,
                    "customer_name" => $customer->customer_name,
                );

                $user_info=array(
                    "customer_email" => $customer->customer_email,
                    "verification"  => $customer->email_verification_code
                );

                $jwt = JWT::encode($token, $sec_key);
                $log = ['key'=>true,'token'=>$jwt, 'user_info'=>$user_info];
            }
            else{
                $log = ['key'=>false];
            }
        }
        else{
            $log = ['key'=>false];
        }
        return response()->json($log);
    }

//    public function verify_email($verification_code)
//    {
//        $customer = DB::table('customers')->where('email_verification_code',$verification_code)->first();
//        if (!$customer)
//        {
//            $notification=array(
//                'messege'=>'Invalid Url',
//                'alert-type'=>'error'
//            );
//        }
//        else{
//            if($customer->email_verified_at)
//            {
//                $notification=array(
//                    'messege'=>'Email Already Verified',
//                    'alert-type'=>'error'
//                );
//            }
//            else{
//                DB::table('customers')->where('email_verification_code',$verification_code)
//                    ->update(array('email_verified_at'=>Date()));
//                $notification=array(
//                    'messege'=>'Email Successfully Verified',
//                    'alert-type'=>'success'
//                );
//            }
//        }
//        return back()->with($notification);
//    }

    public function customer_update(Request $request)
    {
            $customer=array();
            $id = $request->customer_id;
            $customer['customer_birthday'] = $request->customer_birthday;
            $customer['customer_gender'] = $request->customer_gender;
            $customer['customer_mobile'] = $request->customer_mobile;
            $update = DB::table('customers')->where('customer_id',$id)->update($customer);
            if ($update)
            {
                $status = ['key'=>true];
            }
            else{
                $status = ['key'=>false];
            }
        return response()->json($status);
//            $customer['customer_photo'] = $request->customer_photo;
//        $customer['customer_photo'] = hexdec(uniqid()).'.'.$request->customer_photo->getClientOriginalExtension();
//            $image=$request->customer_photo;
//            if($image) {
////                $image_name=hexdec(uniqid());
////                $ext=strtolower($image->getClientOriginalExtension());
////                $image_full_name=$image_name.'.'.$ext;
//                $upload_path='customer/';
//                $image_url=$upload_path.$image;
//                $success=$image->move($upload_path,$image);
//                $customer['customer_photo']=$image_url;
////                $customer['customer_photo']=$image;
//                DB::table('customers')->where('customer_id',$id)->update($customer);
//            }else{
//                DB::table('customers')->where('customer_id',$id)->update($customer);
//            }
//            $status = ['key'=>true,'customer'=>$customer];

    }

    public function customer_address(Request $request)
    {
        $cust = array();
        $cust['customer_id'] = $request->customer_id;
        $cust['address_name'] = $request->address_name;
        $cust['address_phn'] = $request->address_phn;
        $cust['address_region'] = $request->address_region;
        $cust['address_city'] = $request->address_city;
        $cust['address_zip'] = $request->address_zip;
        $cust['address_details'] = $request->address_details;
        $cust['address_status'] = $request->address_status;
        $insert = DB::table('customers_address')->insert($cust);
        if ($insert)
        {
            $status = ['key'=>true];
        }
        else{
            $status = ['key'=>false];
        }
        return response()->json($status);
    }
}
