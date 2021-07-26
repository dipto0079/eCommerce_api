<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\ThemehomeController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\CustomerController;



Route::get('user', [AuthController::class, 'user'])->name('user');
Route::post('register', [AuthController::class, 'register'])->name('register');

/*------------------------------------------------------------------
This Is For JWT Api Authentication
 *-------------------------------------------------------------------
 */
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('payload', [AuthController::class, 'payload']);
    Route::post('register', [AuthController::class, 'register']);


});

//Route::get('getcategory', [ThemehomeController::class, 'getcategory']);


Route::get('home_page_sattings', [HomeController::class, 'homePageSattings']);
Route::get('main_categories', [HomeController::class, 'maincategories']);
Route::get('categoriesProduct', [HomeController::class, 'categoriesProduct']);
Route::get('partners', [HomeController::class, 'partners']);
Route::get('sliders', [HomeController::class, 'sliders']);
Route::get('faq', [HomeController::class, 'faq']);
Route::get('terms', [HomeController::class, 'terms']);
Route::get('horizontal_banner', [HomeController::class, 'horizontalBanner']); //kora hoi ne
Route::get('product', [HomeController::class, 'product']);  //kora hoi ne
Route::get('cat/{id}/{branch}', [HomeController::class, 'categories']);
Route::get('sub/{id}/{branch}', [HomeController::class, 'subcategories']);
Route::get('child/{id}/{branch}', [HomeController::class, 'childCategory']);
Route::get('categoriesFilters/{id}/{branch}', [HomeController::class, 'categoriesFilters']);
Route::get('subFilters/{id}', [HomeController::class, 'subFilters']);
Route::get('childFilters/{id}', [HomeController::class, 'childFilters']);
Route::get('product/{id}', [HomeController::class, 'single_product']);
Route::get('check/{token}', [HomeController::class, 'token']);
Route::get('def_branch', [HomeController::class, 'defbranch']);
Route::get('branch', [HomeController::class, 'branch']);
Route::get('checkout/{id}', [HomeController::class, 'checkout']);



//---------------------------language----------------------------------------------
Route::get('language', [HomeController::class, 'language']);
Route::get('deflan', [HomeController::class, 'def_lan']);
Route::get('front/lang/{lang_id}', [HomeController::class, 'frontlang']);
//-----------------------------------------------------------------------

/*-------------------------Customer---------------------*/
Route::post('customer/store', [CustomerController::class, 'customerstore']);
Route::post('customer/login', [CustomerController::class, 'customerlogin']);
Route::get('customer/check/{token}', [HomeController::class, 'customer_check']);
Route::post('customer/update', [CustomerController::class, 'customer_update']);
Route::post('customer/address', [CustomerController::class, 'customer_address']);

//Route::get('customer/verify-email/{verification_code}', [CustomerController::class, 'verify_email']);




