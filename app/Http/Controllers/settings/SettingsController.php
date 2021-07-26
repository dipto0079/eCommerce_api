<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function componentsIndex()
    {
        return view('backend.components.index');
    }
    public function componentsstore(Request $request)
    {

        $validated = $request->validate([
            'comp_name' => 'required|max:255',
            'comp_desc' => 'required|max:255',
            'comp_place' => 'required|max:255',
        ]);
        $data = array();
        $data['comp_name'] = $request->comp_name;
        $data['comp_desc'] = $request->comp_desc;
        $data['comp_place'] = $request->comp_place;
        $component = DB::table('language_components')->insert($data);
        if ($component) {
            $notification = array(
                'messege' => 'Successfully Component Added',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    /*------------------- Header Logo--------------*/
    public function logo()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.logo.logo');
    }
    public function headerlogoupdate(Request $request)
    {
        $data = array();
        $image = $request->file('settings_value');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/upload/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['settings_value'] = $image_url;

            if (updatesettings('Header_Logo', $image_url)) {
                $notification = array(
                    'messege' => 'Successfully Header Logo Updated',
                    'alert-type' => 'success'
                );
            }
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong! ',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }
    /*------------------- Footer Logo--------------*/
    public function footerlogoupdate(Request $request)
    {
        $data = array();
        $image = $request->file('settings_value');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/upload/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['settings_value'] = $image_url;

            if (updatesettings('Footer_Logo', $image_url)) {
                $notification = array(
                    'messege' => 'Successfully Footer Logo Updated',
                    'alert-type' => 'success'
                );
            }
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong! ',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }
    public function invoicelogoupdate(Request $request)
    {
        $data = array();
        $image = $request->file('settings_value');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/upload/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['settings_value'] = $image_url;

            if (updatesettings('Invoice_Logo', $image_url)) {
                $notification = array(
                    'messege' => 'Successfully Footer Logo Updated',
                    'alert-type' => 'success'
                );
            }
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong! ',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }
    /*------------------- Invoice Logo--------------*/
    /*-------------------Favicon--------------*/
    public function favicon()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.favicon.favicon');
    }
    public function faviconupdate(Request $request)
    {
        $image = $request->file('settings_value');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/upload/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['settings_value'] = $image_url;

            if (updatesettings('Favicon', $image_url)) {
                $notification = array(
                    'messege' => 'Successfully Favicon Updated',
                    'alert-type' => 'success'
                );
            }
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong! ',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }

    /*-------------------Background--------------*/
    public function background()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.background.image');
    }
    public function backgroundupdate(Request $request)
    {
        $image = $request->file('settings_value');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/upload/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['settings_value'] = $image_url;

            if (updatesettings('Background_Image', $image_url)) {
                $notification = array(
                    'messege' => 'Successfully Background Image Updated',
                    'alert-type' => 'success'
                );
            }
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong! ',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }
    /*-------------------Order--------------*/
    public function orderall()
    {
        return view('backend.order.all');
    }
    public function orderpending()
    {
        return view('backend.order.pending');
    }
    public function orderprocessing()
    {
        return view('backend.order.processing');
    }
    public function ordercomplete()
    {
        return view('backend.order.complete');
    }
    public function ordercancel()
    {
        return view('backend.order.cancel');
    }
    /*-------------------Report--------------*/
    public function productreport()
    {
        return view('backend.report.product_report');
    }
    public function paymentreport()
    {
        return view('backend.report.payment_report');
    }
    public function orderreport()
    {
        return view('backend.report.order_report');
    }
    public function stockreport()
    {
        return view('backend.report.stock_report');
    }
    /*-------------------General Settings--------------*/

//    public function packagings()
//    {
//        return view('backend.general_settings.packagings');
//    }
    public function footer()
    {
        return view('backend.settings.footer');
    }
//    public function reviews()
//    {
//        return view('backend.general_settings.reviews');
//    }

    /*------------ Customers-----------------*/
    public function customers_list()
    {
        return view('backend.customers.customers_list');
    }
    public function customers_default_img()
    {
        return view('backend.customers.customer_default_image');
    }

    /*-------------Email Settings ----------------*/
    public function email_templates()
    {
        return view('backend.email_settings.email_templates');
    }
    public function email_configurations()
    {
        return view('backend.email_settings.email_configurations');
    }
    public function email_group()
    {
        return view('backend.email_settings.email_group');
    }

    /*----------------- Menu Page Settings------------------*/
        /*----------------------Faq------------------*/
    public function faq_page()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        $faq = DB::table('settings_faq')->get();
        return view('backend.settings.faq.faq_page',compact('faq'));
    }
    public function faq_store(Request $request)
    {
        $validated = $request->validate([
            'faq_title' => 'required|max:255',
            'faq_description' => 'required',
            'faq_status' => 'required',
        ]);
        $user_id = Session::get('LoggedUser');
        $data = array();
        $data['faq_title'] = $request->faq_title;
        $data['faq_description'] = $request->faq_description;
        $data['faq_status'] = $request->faq_status;
        $data['user_id'] = $user_id;
        $faq = DB::table('settings_faq')->insert($data);
        if ($faq) {
            $notification = array(
                'messege' => 'Successfully FAQ Added',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }
    public function faq_delete($faq_id)
    {
        $delete=DB::table('settings_faq')->where('faq_id',$faq_id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully FAQ Deleted!',
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
    public function faq_edit($faq_id)
    {
        $faq_edit = DB::table('settings_faq')->where('faq_id',$faq_id)->first();
        return response()->json($faq_edit);
    }
    public function faq_update(Request $request)
    {
        $id=$request->faq_id;
        $validated = $request->validate([
            'faq_title' => 'required|max:255',
            'faq_description' => 'required',
            'faq_status' => 'required',
        ]);
        $user_id = Session::get('LoggedUser');
        $data = array();
        $data['faq_title'] = $request->faq_title;
        $data['faq_description'] = $request->faq_description;
        $data['faq_status'] = $request->faq_status;
        $data['update_user_id'] = $user_id;
        $update = DB::table('settings_faq')->where('faq_id',$id)->update($data);
        if ($update) {
            $notification = array(
                'messege' => 'Successfully FAQ Updated',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);

    }
    public function contact_us_page()
    {

        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }


        return view('backend.settings.contact_us_page');
    }
    public function contact_us_page_update(Request $request)
    {
        if (
            updatesettings('Contact_Title', $request->Contact_Title) &&
            updatesettings('Contact_Text', $request->Contact_Text) &&
            updatesettings('Contact_Us_Email_Address', $request->Contact_Us_Email_Address) &&
            updatesettings('Contact_Website', $request->Contact_Website) &&
            updatesettings('Contact_Phone', $request->Contact_Phone) &&
            updatesettings('ContactStreet_Address', $request->ContactStreet_Address)
            ) {
                $notification = array(
                    'messege' => 'Successfully Contact Us Updated',
                    'alert-type' => 'success'
                );
            }else{
                $notification=array(
                    'messege'=>'Something went wrong !',
                    'alert-type'=>'error'
                );
            }
            return back()->with($notification);
    }


    public function terms_condition()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.terms_condition');
    }
    public function terms_condition_update(Request $request)
    {
        if (
        updatesettings('Terms_Title', $request->terms_title) &&
        updatesettings('Terms_conditions_descriptions', $request->terms_description) &&
        updatesettings('Meta_Description', $request->meta_description)
        ) {
            $notification = array(
                'messege' => 'Successfully Terms & Condition Updated',
                'alert-type' => 'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return back()->with($notification);
    }


    public function privacy_policy()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.privacy_policy');
    }
    public function privacy_policy_update(Request $request)
    {

        if (
            updatesettings('Privacy_Policy_Title', $request->privacy_policy_title) &&
            updatesettings('Privacy_Policy_descriptions', $request->privacy_policy_description) &&
            updatesettings('Privacy_Policy_Meta_Description', $request->privacy_policy_meta_description)
            ) {
                $notification = array(
                    'messege' => 'Successfully Privacy Policy Updated',
                    'alert-type' => 'success'
                );
            }else{
                $notification=array(
                    'messege'=>'Something went wrong !',
                    'alert-type'=>'error'
                );
            }
            return back()->with($notification);
    }


    /*------------------ Manage Role ------------------*/

    public function manage_role()
    {
        return view('backend.manage_role');
    }
    /*------------------ Get Settings ------------------*/

    public function getsettings($sett)
    {
        $settings = DB::table('settings')->where('settings_name', $sett)->first();
        dd($settings);
    }
    public function query_test()
    {
        $view = DB::table('categories')->where('categories_status', 1)->get();
        echo json_encode($view);
    }
    public function error()
    {
        return view('not_found.index');
    }
    /*------------------ Currency ------------------*/
    public function currencyindex()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.currency.index');
    }
    public function currencyupdate(Request $request)
    {
        $currency = $request->settings_value;
        if (updatesettings('Currency', $currency))
         {
            $notification = array(
                'messege' => 'Successfully Currency Updated',
                'alert-type' => 'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return back()->with($notification);
    }

    public function home_customization()
    {
        if (!Session::has('LoggedUser')) {
            return redirect()->route('login');
        }
        return view('backend.settings.home_page_customization.index');
    }
    public function hpc_update(Request $request)
    {
        if (updatesettings('Partner', $request->partner) && updatesettings('Slider', $request->slider) &&
            updatesettings('Footer', $request->footer) && updatesettings('Recently_Viewed', $request->recently_viewed) &&
            updatesettings('Secret_Key', $request->Secret_Key))
        {
            $notification = array(
                'messege' => 'Successfully Updated',
                'alert-type' => 'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
        }
        return back()->with($notification);
    }
}
