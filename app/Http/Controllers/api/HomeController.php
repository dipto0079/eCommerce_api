<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
require_once 'src/BeforeValidException.php';
require_once 'src/ExpiredException.php';
require_once 'src/SignatureInvalidException.php';
require_once 'src/JWT.php';
use \Firebase\JWT\JWT;

class HomeController extends Controller
{
    public function maincategories()
    {
        $all = DB::table('categories')->where('categories_status', 1)->get();
        $data = array();
        foreach ($all as $cat) {
            $all_sub_cat = DB::table('categories_subcategory')->where('subcategory_status', 1)->where('categories_id', $cat->categories_id)->get();
            $sub_cat_array = array();
            foreach ($all_sub_cat as $subcat) {
                $chield_categoris = DB::table('categories_childcategory')->where('childcategory_status', 1)->where('subcategory_id', $subcat->subcategory_id)->get();

                $chi_array = array();
                foreach ($chield_categoris as $ch_sub) {
                    $c_array = array(
                        "id" => $ch_sub->childcategory_id,
                        "name" => $ch_sub->childcategory_name,
                        "slug" => Str::slug($ch_sub->childcategory_name),
                        "image" => $ch_sub->childcategory_image,
                    );
                    array_push($chi_array, $c_array);
                }

                $_array = array(
                    "id" => $subcat->subcategory_id,
                    "name" => $subcat->subcategory_name,
                    "slug" => Str::slug($subcat->subcategory_name),
                    "image" => $subcat->subcategory_image,
                    "chield_categoris" => $chi_array
                );
                array_push($sub_cat_array, $_array);
            }

            $cat_array = array(
                "id" => $cat->categories_id,
                "name" => $cat->categories_name,
                "slug" => Str::slug($cat->categories_name),
                "image" => $cat->category_image,
                "sub_categoris" => $sub_cat_array

            );

            array_push($data, $cat_array);

        }
        return response()->json($data);
    }

    public function partners()
    {
        $partners = DB::table('themes_partner')->get();
        $partners_data = array();
        foreach ($partners as $v_part) {
            $cat_array = array(
                "id" => $v_part->partner_id,
                "link" => $v_part->partner_link,
                "image" => $v_part->partner_image,
            );
            array_push($partners_data, $cat_array);
        }

        return response()->json($partners_data);
    }

    public function sliders()
    {
        $sliders = DB::table('themes_slider')->get();
        $sliders_data = array();
        foreach ($sliders as $v_sliders) {
            $sli_array = array(
                "id" => $v_sliders->slider_id,
                "title" => $v_sliders->title,
                "title_font_size" => $v_sliders->title_font,
                "title_font_color" => $v_sliders->title_color,
                "sub_title" => $v_sliders->subtitle,
                "sub_title_font" => $v_sliders->subtitle_font,
                "sub_title_color" => $v_sliders->subtitle_color,
                "sli_description" => $v_sliders->description,
                "sli_description_font" => $v_sliders->description_font,
                "sli_description_color" => $v_sliders->description_color,
                "sliderimage" => $v_sliders->slider_image,
                "sliderprice" => $v_sliders->slider_price,
                "sliderbuttonname" => $v_sliders->slider_button_name,
                "sliderbuttonlink" => $v_sliders->slider_button_link,

            );
            array_push($sliders_data, $sli_array);
        }
        return response()->json($sliders_data);
    }

    public function faq()
    {
        $faq = DB::table('settings_faq')->where('faq_status', 1)->get();

        $faq_array = array();
        foreach ($faq as $v_faq) {
            $_array = array(
                "id" => $v_faq->faq_id,
                "title" => $v_faq->faq_title,
                "description" => $v_faq->faq_description,


            );
            array_push($faq_array, $_array);
        }
        return response()->json($faq_array);
    }

    public function terms()
    {

        $_array = array(
            "title" => getsettings('Terms_Title'),
            "descriptions" => getsettings('Terms_conditions_descriptions'),
            "meta" => getsettings('Meta_Description'),
        );

        return response()->json($_array);
    }

    public function homePageSattings()
    {
        $_array = array(
            "logo" => getsettings('Header_Logo'),
            "background_Image" => getsettings('Background_Image'),
            "footerLogo" => getsettings('Footer_Logo'),
        );

        return response()->json($_array);
    }

    public function horizontalBanner()
    {
        $themes_banner = DB::table('themes_banner')->get();
        $all_array = array();
        foreach ($themes_banner as $v_all) {
            $_array = array(
                "id" => $v_all->banner_id,
                "title" => $v_all->banner_title,
                "description" => $v_all->banner_description,
                "link" => $v_all->banner_link,
                "image" => $v_all->banner_image,

            );
            array_push($all_array, $_array);
        }

        return response()->json($all_array);
    }

    public function product()
    {
        $product = DB::table('product')->where('product_status', 1)->get();
        $all = array();

        foreach ($product as $v_all) {
            $id = json_decode($v_all->product_specification);
            $specification = array();
            foreach ($id as $v_id) {
                $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                array_push($specification, $spl);
            }
            $cat = $v_all->categories_id;
            $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

            $sub = $v_all->subcategory_id;
            $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

            $chi = $v_all->childcategory_id;
            $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

            $br = $v_all->brand_id;
            $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

            $_array = array(
                "id" => $v_all->product_id,
                "categories" => $categories,
                "subcategory" => $subcategory,
                "childcategory" => $childcategory,
                "brand" => $brand,
                "name" => $v_all->product_name,
                "code" => $v_all->product_code,
                "short_description" => $v_all->product_short_description,
                "long_description" => $v_all->product_long_description,
                "buying_price" => $v_all->product_buying_price,
                "selling_price" => $v_all->product_selling_price,
                "discount_type" => $v_all->product_discount_type,
                "image" => $v_all->product_image,
                "gallery" => json_decode($v_all->product_gallery),
                "specification" => $specification,
                "specification_value" => json_decode($v_all->product_specification_value),
                "discount_value" => $v_all->product_discount_value,
                "color" => json_decode($v_all->product_color),
                "color_name" => json_decode($v_all->product_color_name),
                "color_image" => json_decode($v_all->product_color_image),
                "size" => json_decode($v_all->product_size),
                "Currency" => getsettings('Currency'),


//                "specification" => $a,
//                "product_specification_value" =>json_decode($v_all->product_specification_value),

            );
            array_push($all, $_array);
        }

        return response()->json($all);
    }

    public function categories($id,$branch){
        if ($branch >0){
            $all_cat=DB::table('categories')->where('categories_id',$id)->where('categories_status',1)->first();
            $pro = DB::table('product')->where('categories_id', $id)->where('branch_id',$branch)->where('product_status', 1)->get();
            $all = array();
            foreach ($pro as $v_all) {
                $id = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($id as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                    "Currency" => getsettings('Currency'),

                );
                array_push($all, $_array);
            }
        }else{
            $all_cat=DB::table('categories')->where('categories_id',$id)->where('categories_status',1)->first();
            $pro = DB::table('product')->where('categories_id', $id)->where('product_status', 1)->get();
            $all = array();
            foreach ($pro as $v_all) {
                $id = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($id as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                    "Currency" => getsettings('Currency'),

                );
                array_push($all, $_array);
            }
        }



        return response()->json(["sub"=>$all_cat,"all"=>$all,]);
    }

    public function categoriesFilters($id,$branch)
    {
        if ($branch >0){
            $sub = DB::table('categories_subcategory')->where('categories_id', $id)->where('subcategory_status', 1)->get();
            $all_sub = array();
            foreach ($sub as $sub_a) {
                $q = DB::table('product')->where('subcategory_id', $sub_a->subcategory_id)->where('branch_id',$branch)->where('product_status', 1)->get();
                $count = count($q);
                $subProduct = array();
                foreach ($q as $v_q) {
                    $_b = array(
                        "id" => $v_q->product_id,
                        "categories" => $v_q->categories_id,
                        "subcategory" => $v_q->subcategory_id,
                        "childcategory" => $v_q->childcategory_id,
                        "brand" => $v_q->brand_id,
                        "name" => $v_q->product_name,
                        "code" => $v_q->product_code,
                        "short_description" => $v_q->product_short_description,
                        "long_description" => $v_q->product_long_description,
                        "selling_price" => $v_q->product_selling_price,
                        "discount_type" => $v_q->product_discount_type,
                        "image" => $v_q->product_image,
                        "gallery" => json_decode($v_q->product_gallery),
                        "slug" => Str::slug($v_q->product_name),
                        "Currency" => getsettings('Currency'),
                    );
                    array_push($subProduct, $_b);
                }
                $a = array(
                    "id" => $sub_a->subcategory_id,
                    "name" => $sub_a->subcategory_name,
                    "slug" =>Str::slug($sub_a->subcategory_name),
                    "count" => $count,
                    "subProduct" => $subProduct,


                );
                array_push($all_sub, $a);
            }

            $c = DB::table('categories_childcategory')->where('categories_id', $id)->where('childcategory_status', 1)->get();
            $child = array();
            foreach ($c as $v_c) {
                $w = DB::table('product')->where('childcategory_id', $v_c->childcategory_id)->where('branch_id',$branch)->where('product_status', 1)->get();
                $child_count = count($w);
                $child_pro = array();
                foreach ($w as $w_all) {
                    $_c = array(
                        "id" => $w_all->product_id,
                        "categories" => $w_all->categories_id,
                        "subcategory" => $w_all->subcategory_id,
                        "childcategory" => $w_all->childcategory_id,
                        "brand" => $w_all->brand_id,
                        "name" => $w_all->product_name,
                    );
                    array_push($child_pro, $_c);
                }
                $_a = array(
                    "id" => $v_c->childcategory_id,
                    "name" => $v_c->childcategory_name,
                    "slug" =>Str::slug($v_c->childcategory_name),
                    "count" => $child_count,
                    "childProduct" => $child_pro,

                );
                array_push($child, $_a);
            }

            $b = DB::table('brand')->where('brand_status',1)->get();
            $brand = array();
            foreach ($b as $V_all) {

                $p = DB::table('product')->where('brand_id', $V_all->brand_id)->where('branch_id',$branch)->where('product_status', 1)->get();
                $brand_count = count($p);
                $all_briend = array();
                foreach ($p as $v_allp) {
                    $_p = array(
                        "id" => $v_allp->product_id,
                        "categories" => $v_allp->categories_id,
                        "subcategory" => $v_allp->subcategory_id,
                        "childcategory" => $v_allp->childcategory_id,
                        "brand" => $v_allp->brand_id,
                        "name" => $v_allp->product_name,
                    );
                    array_push($all_briend, $_p);
                }

                $_u = array(
                    "id" => $V_all->brand_id,
                    "name" => $V_all->brand_name,
                    "slug" => Str::slug($V_all->brand_name),
                    "count" => $brand_count,
                    "brandProduct" => $all_briend,
                );
                array_push($brand, $_u);
            }

        }else{
            $sub = DB::table('categories_subcategory')->where('categories_id', $id)->where('subcategory_status', 1)->get();
            $all_sub = array();
            foreach ($sub as $sub_a) {
                $q = DB::table('product')->where('subcategory_id', $sub_a->subcategory_id)->where('product_status', 1)->get();
                $count = count($q);
                $subProduct = array();
                foreach ($q as $v_q) {
                    $_b = array(
                        "id" => $v_q->product_id,
                        "categories" => $v_q->categories_id,
                        "subcategory" => $v_q->subcategory_id,
                        "childcategory" => $v_q->childcategory_id,
                        "brand" => $v_q->brand_id,
                        "name" => $v_q->product_name,
                        "code" => $v_q->product_code,
                        "short_description" => $v_q->product_short_description,
                        "long_description" => $v_q->product_long_description,
                        "selling_price" => $v_q->product_selling_price,
                        "discount_type" => $v_q->product_discount_type,
                        "image" => $v_q->product_image,
                        "gallery" => json_decode($v_q->product_gallery),
                        "slug" => Str::slug($v_q->product_name),
                        "Currency" => getsettings('Currency'),
                    );
                    array_push($subProduct, $_b);
                }
                $a = array(
                    "id" => $sub_a->subcategory_id,
                    "name" => $sub_a->subcategory_name,
                    "slug" =>Str::slug($sub_a->subcategory_name),
                    "count" => $count,
                    "subProduct" => $subProduct,


                );
                array_push($all_sub, $a);
            }

            $c = DB::table('categories_childcategory')->where('categories_id', $id)->where('childcategory_status', 1)->get();
            $child = array();
            foreach ($c as $v_c) {
                $w = DB::table('product')->where('childcategory_id', $v_c->childcategory_id)->where('product_status', 1)->get();
                $child_count = count($w);
                $child_pro = array();
                foreach ($w as $w_all) {
                    $_c = array(
                        "id" => $w_all->product_id,
                        "categories" => $w_all->categories_id,
                        "subcategory" => $w_all->subcategory_id,
                        "childcategory" => $w_all->childcategory_id,
                        "brand" => $w_all->brand_id,
                        "name" => $w_all->product_name,
                    );
                    array_push($child_pro, $_c);
                }
                $_a = array(
                    "id" => $v_c->childcategory_id,
                    "name" => $v_c->childcategory_name,
                    "slug" =>Str::slug($v_c->childcategory_name),
                    "count" => $child_count,
                    "childProduct" => $child_pro,

                );
                array_push($child, $_a);
            }

            $b = DB::table('brand')->where('brand_status',1)->get();
            $brand = array();
            foreach ($b as $V_all) {

                $p = DB::table('product')->where('brand_id', $V_all->brand_id)->where('product_status', 1)->get();
                $brand_count = count($p);
                $all_briend = array();
                foreach ($p as $v_allp) {
                    $_p = array(
                        "id" => $v_allp->product_id,
                        "categories" => $v_allp->categories_id,
                        "subcategory" => $v_allp->subcategory_id,
                        "childcategory" => $v_allp->childcategory_id,
                        "brand" => $v_allp->brand_id,
                        "name" => $v_allp->product_name,
                    );
                    array_push($all_briend, $_p);
                }

                $_u = array(
                    "id" => $V_all->brand_id,
                    "name" => $V_all->brand_name,
                    "slug" => Str::slug($V_all->brand_name),
                    "count" => $brand_count,
                    "brandProduct" => $all_briend,
                );
                array_push($brand, $_u);
            }
        }


        return response()->json(["sub" => $all_sub, "child" => $child, "brand" => $brand]);
    }

    //=======================
    public function subFilters($id)
    {
        $c = DB::table('categories_childcategory')->where('categories_id', $id)->where('childcategory_status', 1)->get();
        $child = array();
        foreach ($c as $v_c) {
            $w = DB::table('product')->where('childcategory_id', $v_c->childcategory_id)->where('product_status', 1)->get();
            $child_count = count($w);
            $child_pro = array();
            foreach ($w as $w_all) {
                $_c = array(
                    "id" => $w_all->product_id,
                    "categories" => $w_all->categories_id,
                    "subcategory" => $w_all->subcategory_id,
                    "childcategory" => $w_all->childcategory_id,
                    "brand" => $w_all->brand_id,
                    "name" => $w_all->product_name,
                );
                array_push($child_pro, $_c);
            }
            $_a = array(
                "id" => $v_c->childcategory_id,
                "name" => $v_c->childcategory_name,
                "slug" =>Str::slug($v_c->childcategory_name),
                "count" => $child_count,
                "childProduct" => $child_pro,

            );
            array_push($child, $_a);
        }
        $b = DB::table('brand')->get();
        $brand = array();
        foreach ($b as $V_all) {

            $p = DB::table('product')->where('brand_id', $V_all->brand_id)->where('product_status', 1)->get();
            $brand_count = count($p);
            $all_briend = array();
            foreach ($p as $v_allp) {
                $_p = array(
                    "id" => $v_allp->product_id,
                    "categories" => $v_allp->categories_id,
                    "subcategory" => $v_allp->subcategory_id,
                    "childcategory" => $v_allp->childcategory_id,
                    "brand" => $v_allp->brand_id,
                    "name" => $v_allp->product_name,
                );
                array_push($all_briend, $_p);
            }

            $_u = array(
                "id" => $V_all->brand_id,
                "name" => $V_all->brand_name,
                "slug" => Str::slug($V_all->brand_name),
                "count" => $brand_count,
                "brandProduct" => $all_briend,

            );
            array_push($brand, $_u);
        }

        return response()->json(["child" => $child, "brand" => $brand]);
    }

    //===============
    public function childFilters($id)
    {
        $b = DB::table('brand')->get();
        $brand = array();
        foreach ($b as $V_all) {

            $p = DB::table('product')->where('brand_id', $V_all->brand_id)->where('product_status', 1)->get();
            $brand_count = count($p);
            $all_briend = array();
            foreach ($p as $v_allp) {
                $_p = array(
                    "id" => $v_allp->product_id,
                    "categories" => $v_allp->categories_id,
                    "subcategory" => $v_allp->subcategory_id,
                    "childcategory" => $v_allp->childcategory_id,
                    "brand" => $v_allp->brand_id,
                    "name" => $v_allp->product_name,
                );
                array_push($all_briend, $_p);
            }

            $_u = array(
                "id" => $V_all->brand_id,
                "name" => $V_all->brand_name,
                "slug" => Str::slug($V_all->brand_name),
                "count" => $brand_count,
                "brandProduct" => $all_briend,

            );
            array_push($brand, $_u);
        }

        return response()->json(["brand" => $brand]);
    }
    //=====================

    public function subcategories($id,$branch)
    {
        if ($branch >0){
            $all_sub=DB::table('categories_subcategory')->where('subcategory_id',$id)->first();
            $pro = DB::table('product')->where('subcategory_id', $id)->where('branch_id',$branch)->where('product_status', 1)->get();
            $all = array();
            foreach ($pro as $v_all) {
                $a = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($a as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                    "Currency" => getsettings('Currency'),

                );
                array_push($all, $_array);
            }

        }else{
            $all_sub=DB::table('categories_subcategory')->where('subcategory_id',$id)->first();
            $pro = DB::table('product')->where('subcategory_id', $id)->where('product_status', 1)->get();
            $all = array();
            foreach ($pro as $v_all) {
                $a = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($a as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                    "Currency" => getsettings('Currency'),

                );
                array_push($all, $_array);
            }
        }


        return response()->json(["sub"=>$all_sub,"all"=>$all]);
    }


    public function childCategory($id,$branch)
    {
        if ($branch >0){
            $all_child=DB::table('categories_childcategory')->where('childcategory_id',$id)->first();
            $pro = DB::table('product')->where('childcategory_id', $id)->where('branch_id',$branch)->where('product_status', 1)->get();
            $all = array();
            foreach ($pro as $v_all) {
                $a = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($a as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                    "Currency" => getsettings('Currency'),
                );
                array_push($all, $_array);
            }
        }else{
            $all_child=DB::table('categories_childcategory')->where('childcategory_id',$id)->first();
            $pro = DB::table('product')->where('childcategory_id', $id)->where('product_status', 1)->get();
            $all = array();
            foreach ($pro as $v_all) {
                $a = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($a as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                    "Currency" => getsettings('Currency'),
                );
                array_push($all, $_array);
            }
        }



        return response()->json(["sub"=>$all_child,"all"=>$all]);
    }


    public function language()
    {
        $language = DB::table('language')->where('status', 1)->get();
        return response()->json($language);
    }

    public function def_lan()
    {
        $f_lang = DB::table('language')->where('lang_id', 1)->first();
        return response()->json($f_lang);
    }

    public function defbranch(){
//        $f_branch = array();
//
//        $_u = array(
//            "branch_id" => 1,
//            "branch_name" => getsettings('Default_Branch'),
//        );
//        array_push($f_branch, $_u);
        $f_lang = DB::table('branch')->where('branch_id', 1)->first();
        return response()->json($f_lang);

//        return response()->json($f_branch);
    }

    public function frontlang($lang_id)
    {
        \Session::forget('lan');
        \Session::put('lan', $lang_id);
        // $f_lag_id = DB::table('language')->where('lang_id',$lang_id)->first();
        return response()->json($lang_id);
    }

    public function single_product($id)
    {
        $product = DB::table('product')->where('product_status', 1)->where('product_id', $id)->first();
        $a = json_decode($product->product_specification);
        $specification = array();
        foreach ($a as $v_id) {
            $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
            array_push($specification, $spl);
        }
        $cat = $product->categories_id;
        $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

        $sub = $product->subcategory_id;
        $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

        $chi = $product->childcategory_id;
        $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

        $br = $product->brand_id;
        $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

        $_array = array(
            "id" => $product->product_id,
            "categories" => $categories,
            "subcategory" => $subcategory,
            "childcategory" => $childcategory,
            "brand" => $brand,
            "name" => $product->product_name,
            "code" => $product->product_code,
            "short_description" => $product->product_short_description,
            "long_description" => $product->product_long_description,
            "selling_price" => $product->product_selling_price,
            "discount_type" => $product->product_discount_type,
            "image" => $product->product_image,
            "gallery" => json_decode($product->product_gallery),
            "specification" => $specification,
            "specification_value" => json_decode($product->product_specification_value),
            "discount_value" => $product->product_discount_value,
            "color" => json_decode($product->product_color),
            "color_name" => json_decode($product->product_color_name),
            "color_image" => json_decode($product->product_color_image),
            "size" => json_decode($product->product_size),
            "Currency" => getsettings('Currency'),
        );
        return response()->json($_array);
    }

    public function categoriesProduct()
    {
        $all = DB::table('categories')->where('categories_status', 1)->get();
        $cata = array();
        foreach ($all as $v_categories) {
            $product = DB::table('product')->where('categories_id', $v_categories->categories_id)->where('product_status', 1)->orderBy('product_id', 'DESC')->limit(5)->get();
            $all_pro = array();
            foreach ($product as $v_all) {
                $id = json_decode($v_all->product_specification);
                $specification = array();
                foreach ($id as $v_id) {
                    $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
                    array_push($specification, $spl);
                }
                $cat = $v_all->categories_id;
                $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;
                $sub = $v_all->subcategory_id;
                $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;
                $chi = $v_all->childcategory_id;
                $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;
                $br = $v_all->brand_id;
                $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;
                $_array = array(
                    "id" => $v_all->product_id,
                    "categories" => $categories,
                    "subcategory" => $subcategory,
                    "childcategory" => $childcategory,
                    "brand" => $brand,
                    "name" => $v_all->product_name,
                    "code" => $v_all->product_code,
                    "short_description" => $v_all->product_short_description,
                    "long_description" => $v_all->product_long_description,
                    "selling_price" => $v_all->product_selling_price,
                    "discount_type" => $v_all->product_discount_type,
                    "image" => $v_all->product_image,
                    "gallery" => json_decode($v_all->product_gallery),
                    "specification" => $specification,
                    "specification_value" => json_decode($v_all->product_specification_value),
                    "discount_value" => $v_all->product_discount_value,
                    "color" => json_decode($v_all->product_color),
                    "color_name" => json_decode($v_all->product_color_name),
                    "color_image" => json_decode($v_all->product_color_image),
                    "size" => json_decode($v_all->product_size),
                    "slug" => Str::slug($v_all->product_name),
                );
                array_push($all_pro, $_array);
            }

            $cat_array = array(
                "id" => $v_categories->categories_id,
                "name" => $v_categories->categories_name,
                "slug" => $v_categories->categories_slug,
                "image" => $v_categories->category_image,
                "product" => $all_pro,
            );
            array_push($cata, $cat_array);
        }
        return response()->json($cata);
    }

    public function customer_check($token)
    {
        return response()->json($token);
    }

    public  function token($token){

        $sec_key = getsettings('Secret_Key');
        $customer = null;
        $message = null;
        try {
            $customer = JWT::decode($token, $sec_key, array('HS256'));
            $this->buildXMLHeader();
        }
        catch (\Exception $e)
        {
            $message = $e->getMessage();
        }
       $return_val = array(
           'return' =>  $customer!=null?true:false,
           'userData' =>$customer!=null?$customer:'No data found. Error: '.$message
       );
        return response()->json($return_val);
    }


    public function branch(){
        $a=DB::table('branch')->where('branch_status',1)->get();
        return response()->json($a);
    }

    public function checkout($id){

        $product = DB::table('product')->where('product_status', 1)->where('product_id', $id)->first();
        $a = json_decode($product->product_specification);
        $specification = array();
        foreach ($a as $v_id) {
            $spl = DB::table('specification')->where('specification_id', $v_id)->first()->specification_name;
            array_push($specification, $spl);
        }

        $s = json_decode($product->product_shipping_id);
        $shipping = array();
        foreach ($s as $v_id) {
            $sip = DB::table('shipping')->where('shipping_id', $v_id)->first()->shipping_title;
            array_push($shipping, $sip);
        }


        $cat = $product->categories_id;
        $categories = DB::table('categories')->where('categories_id', $cat)->first()->categories_name;

        $sub = $product->subcategory_id;
        $subcategory = DB::table('categories_subcategory')->where('subcategory_id', $sub)->first()->subcategory_name;

        $chi = $product->childcategory_id;
        $childcategory = DB::table('categories_childcategory')->where('childcategory_id', $chi)->first()->childcategory_name;

        $br = $product->brand_id;
        $brand = DB::table('brand')->where('brand_id', $br)->first()->brand_name;

        $_array = array(
            "id" => $product->product_id,
            "categories" => $categories,
            "subcategory" => $subcategory,
            "childcategory" => $childcategory,
            "brand" => $brand,
            "name" => $product->product_name,
            "code" => $product->product_code,
            "short_description" => $product->product_short_description,
            "long_description" => $product->product_long_description,
            "selling_price" => $product->product_selling_price,
            "discount_type" => $product->product_discount_type,
            "image" => $product->product_image,
            "gallery" => json_decode($product->product_gallery),
            "specification" => $specification,
            "specification_value" => json_decode($product->product_specification_value),
            "discount_value" => $product->product_discount_value,
            "color" => json_decode($product->product_color),
            "color_name" => json_decode($product->product_color_name),
            "shipping" => $shipping,
            "color_image" => json_decode($product->product_color_image),
            "size" => json_decode($product->product_size),
            "Currency" => getsettings('Currency'),

        );


        return response()->json($_array);
    }

}
