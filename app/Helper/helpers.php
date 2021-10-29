<?php
use Google\Cloud\Storage\StorageClient;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists('selected_language')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function selected_language()
    {
        if (Session::has('LoggedUser')) {
            $user_id = Session::get('LoggedUser');
            $selected = DB::table('users')->where('id', $user_id)->first()->language_id;
            $selected_language = DB::table('language')->where('lang_id', $selected)->first()->language_name;
            return $selected_language;
        } else {
            return "Session Distroy";
//                    return redirect()->route('logout');
        }
    }
}
/*------------------------Default Front Language----------------------*/
//if (!function_exists('front_lang')) {
//    /**
//     * Translate the given message.
//     *
//     * @param string|null $key
//     * @param array $replace
//     * @param string|null $locale
//     * @return string|array|null
//     */
//    function front_lang()
//    {
//            $f_lang = DB::table('language')->where('language_name','English')->first();
//            return $f_lang;
//    }
//}
/*------------------------Default Front Language----------------------*/

/*------------------------Frontend Language----------------------*/
if (!function_exists('front_ln')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function front_ln($key,$language_id)
    {
        if ($key != null && $key != "") {
            $comonent_id = DB::table('language_components')->where('comp_name', $key)->first()->comp_id;
            $lan = DB::table('language_changed')->where('language_id', $language_id)->where('component_id', $comonent_id)->first()->component_value;
            return  $lan;

        }
        else {
            //$frontend_language = DB::table('language')->where('language_name', 'English')->first()->language_name;
            return "Key is not to be Empty.";
        }
    }
}
/*------------------------Frontend Language----------------------*/
if (!function_exists('active_theme')) {
    function active_theme()
    {

    }
}


if (!function_exists('ln')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function ln($key = null)
    {
        if ($key != null) {
            if (DB::table('language_components')->where('comp_name', $key)->count() == 1) {
                if (Session::has('LoggedUser')) {
                    $user_id = Session::get('LoggedUser');
                    $comp_id = DB::table('language_components')->where('comp_name', $key)->first()->comp_id; //component id from user   4
                    $language_id = DB::table('users')->where('id', $user_id)->first()->language_id; //language id From Users   36
                    if (DB::table('language_changed')->where('language_id', $language_id)->where('component_id', $comp_id)->count() == 1) {
                        $language_component = DB::table('language_changed')
                            ->where('language_id', $language_id)
                            ->where('component_id', $comp_id)
                            ->first()->component_value; //Components of That Language Id
                        return $language_component;
                    } else {
                        return $key;
                    }
                } else {
                    return "Session Distroy";
//                    return redirect()->route('logout');
                }
            } else {
                return $key;
            }
        } else {
            //            return "Error Language Defination.";
            return $key;
        }
    }
}
/*-----------------------------Get Settings-------------------------------*/
if (!function_exists('getsettings')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function getsettings($get = null)
    {
        if ($get != null) {
            if (DB::table('settings')->where('settings_name', $get)->count() == 1) {

                $settings_component = DB::table('settings')
                    ->where('settings_name', $get)
                    ->first()->settings_value;
                return $settings_component;

            } else {
                return 'Error: '.$get;
            }
        } else {
            return $get;
        }
    }
}
/*-----------------------------Update Settings-------------------------------*/
if (!function_exists('updatesettings')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function updatesettings($get = null, $value = null)
    {
        if ($get != null) {
            if (DB::table('settings')->where('settings_name', $get)->count() == 1) {
                if (Session::has('LoggedUser')) {
                    DB::table('settings')
                        ->where('settings_name', $get)
                        ->update(array('settings_value' => $value));
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;

        }
    }
}
/*-----------------------------Settings-------------------------------*/
if (!function_exists('settings_status')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function settings_status($set_status = null)
    {
        if ($set_status != null) {
            if (DB::table('settings')->where('settings_name', $set_status)->count() == 1) {
                if (Session::has('LoggedUser')) {
                    $settings_component = DB::table('settings')
                        ->where('settings_name', $set_status)
                        ->first()->settings_value;
                    return $settings_status;
                } else {
                    Session()->pull('LoggedUser');
                    return redirect()->route('logout');
                }
            } else {
                $notification = array(
                    'messege' => $get . ' Has No Value',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        } else {
            return $get;
        }
    }
}

/*-----------------------------Update Settings-------------------------------*/
if (!function_exists('updatesettings')) {
    /**
     * Translate the given message.
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @return string|array|null
     */
    function updatesettings($update = null)
    {
        if ($sett != null) {
            if (DB::table('settings')->where('settings_name', $sett)->count() == 1) {
                $settings_component = DB::table('settings')
                    ->where('settings_name', $sett)
                    ->first()->settings_value;
                return $settings_component;
            } else {
                return toastr()->error('Something Went Wrong !');;
            }
        } else {
//            return $key;
            return toastr()->error('No Value !');
        }
    }
}


