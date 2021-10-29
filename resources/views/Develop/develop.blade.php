<?php

class _Menu
{

    function __branch()
    {
        $branch = 0;
        if(\Session::has('branch'))
        {
            $branch = \Session::get('branch');
        }
        return $branch;
    }
    function main_manu()
    {
        $url = env('APP_URL') . 'api/main_categories';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $test = json_decode($result);
        curl_close($cSession);
        return $test;
    }

    function slider()
    {
        $url = env('APP_URL') . 'api/sliders';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $slider = json_decode($result);
        curl_close($cSession);
        return $slider;
    }
    function homePageSattings()
    {
        $url = env('APP_URL') . 'api/home_page_sattings';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $logo = json_decode($result);
        curl_close($cSession);
        return $logo;
    }

    function Prodcut(){
        $url = env('APP_URL') . 'api/product';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $product = json_decode($result);
        curl_close($cSession);
        return $product;
    }


    function partners(){
        $url = env('APP_URL') . 'api/product';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $product = json_decode($result);
        curl_close($cSession);
        return $product;
    }

    function categoriesProduct(){
        $url = env('APP_URL') . 'api/categoriesProduct';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $categoriesProduct = json_decode($result);
        curl_close($cSession);
        return $categoriesProduct;
    }




    function branch(){

        $url = env('APP_URL') . 'api/branch';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $ret = json_decode($result);
        curl_close($cSession);
        return $ret;

    }

    function category($id){

        $url = env('APP_URL') . 'api/cat/'.$id.'/' .$this->__branch();
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $cat = json_decode($result);
        curl_close($cSession);
        return $cat;

    }

    function categoriesFilters($id){
        $url = env('APP_URL') . 'api/categoriesFilters/' . $id.'/' .$this->__branch();
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $categoriesProduct = json_decode($result);
        curl_close($cSession);
        return $categoriesProduct;
    }


    function subCategory($id){

        $url = env('APP_URL') .'api/sub/'.$id.'/' .$this->__branch();
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $subCategory = json_decode($result);
        curl_close($cSession);
        return $subCategory;

    }


    function childCategory($id){

        $url = env('APP_URL') . 'api/child/' . $id.'/' .$this->__branch();
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result = curl_exec($cSession);
        $childCategory = json_decode($result);
        curl_close($cSession);
        return $childCategory;

    }







//    function customer_dashboard(){
//        $url = env('APP_URL') . 'api/categoriesFilters';
//    }

}









