<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\settings\LanguageController;
use App\Http\Controllers\settings\SettingsController;
use App\Http\Controllers\settings\ComponentsController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\frontend\FrontendController;


//===========================Frontend==================================================
Route::get('/', [UserController::class, 'index'])->name('/');
Route::get('faq', [UserController::class, 'faqs'])->name('faq');
Route::get('about', [UserController::class, 'about'])->name('about');
Route::get('cart', [UserController::class, 'cart'])->name('cart');
Route::get('contact', [UserController::class, 'contact'])->name('contact');
Route::get('tracking/', [UserController::class, 'track_order'])->name('track_order');
Route::get('compare', [UserController::class, 'compare'])->name('compare');
Route::get('wishlist', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('Terms&Condition', [UserController::class, 'terms'])->name('terms');
Route::get('cat/{id}/{slug}', [UserController::class, 'category'])->name('cat');
Route::get('sub/{id}/{slug}', [UserController::class, 'subcategories'])->name('sub');
Route::get('child/{id}/{slug}', [UserController::class, 'childcategories'])->name('child');
Route::get('product/{id}/{name}', [UserController::class, 'single_product'])->name('product');
Route::get('lan/{id}', [UserController::class, 'language_change'])->name('language_change');
Route::get('branchs/{id}', [UserController::class, 'branch'])->name('branchs');

Route::get('account/{token}', [UserController::class, 'customercheck']);

Route::get('customer/logout', [UserController::class, 'customerlogout'])->name('customer.logout');
Route::get('dashboard/checkout/{id}',[UserController::class, 'buy_check'])->name('checkout');


Route::get('test',[UserController::class, 'test']);

//Route::get('customer/dashboard/{customer_name}',[UserController::class, 'customer_dashboard'])->name('customer.dashboard');

//=============================================================================


//===========================Backend==================================================
/*--------------------------Authentication Route-------------------------*/

Route::get('login', [UserController::class, 'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('register', [UserController::class, 'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('create', [UserController::class, 'create'])->name('auth.create');
Route::post('check', [UserController::class, 'check'])->name('auth.check');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('isLogged');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

/*------------------------------------------------------------------
Language Route
-------------------------------------------------------------------
*/
Route::get('language/index', [LanguageController::class, 'index'])->name('language.add');
Route::post('language/store', [LanguageController::class, 'store'])->name('language.store');
Route::get('language/delete/{lang_id}', [LanguageController::class, 'delete']);
Route::get('language/edit/{lang_id}', [LanguageController::class, 'edit']);
Route::post('language/update/{lang_id}', [LanguageController::class, 'update']);

Route::get('components/view/{lang_id}', [ComponentsController::class, 'view']);
Route::post('components/language/update/{language_id}', [ComponentsController::class, 'update']);

Route::get('language/view', [LanguageController::class, 'view'])->name('language.view');
Route::get('language/change/{comp_id}', [LanguageController::class, 'change']);
Route::post('components/language', [LanguageController::class, 'componentslanguage'])->name('components.language');
Route::post('default/language/change', [LanguageController::class, 'defaultlanguagechange'])->name('ajax_langguage_change');

/*------------------------------------------------------------------
Components Route
-------------------------------------------------------------------
*/
Route::get('components/index', [SettingsController::class, 'componentsIndex'])->name('components.add');
Route::post('components/store', [SettingsController::class, 'componentsstore'])->name('components.store');
//Route::get('components/view', [SettingsController::class, 'componentsview'])->name('components.view');


/*------------------------------------------------------------------
Product Route
-------------------------------------------------------------------*/
/*------------------------ Product Add----------------------------*/
Route::get('products/index', [ProductController::class, 'productindex'])->name('products.index');
Route::post('products/store', [ProductController::class, 'product_store'])->name('products.store');
Route::get('products/delete/{product_id}', [ProductController::class, 'product_delete']);
Route::get('products/edit/{product_id}', [ProductController::class, 'product_edit']);
Route::post('products/update/{product_id}', [ProductController::class, 'product_update']);

Route::get('products/all', [ProductController::class, 'productall'])->name('products.all');
Route::get('products/cancel', [ProductController::class, 'productcancel'])->name('products.cancel');

Route::get('products/specification/index', [ProductController::class, 'specification'])->name('products.specification.index');
Route::post('products/specification/store', [ProductController::class, 'specification_store'])->name('products.specification.store');
Route::get('products/specification/edit/{specification_id}', [ProductController::class, 'specification_edit']);
Route::post('products/specification/update', [ProductController::class, 'specification_update'])->name('products.specification.update');
Route::get('products/specification/delete/{specification_id}', [ProductController::class, 'specification_delete']);

Route::get('products/specification/get', [ProductController::class, 'get_specification']);
/*--------------------------- Shipping Method-------------------------------*/
Route::get('products/shipping', [ProductController::class, 'shipping'])->name('products.shipping');
Route::post('products/shipping/store/', [ProductController::class, 'shipping_store'])->name('proucts.shipping.store');
Route::get('products/shipping/edit/{shipping_id}', [ProductController::class, 'shipping_edit']);
Route::post('products/shipping/update', [ProductController::class, 'shippingupdate'])->name('proucts.shipping.update');
Route::get('products/shipping/delete/{shipping_id}', [ProductController::class, 'shipping_delete']);

/*------------------------------------------------------------------
features product Route
-------------------------------------------------------------------*/
Route::get('features/features/product/', [ProductController::class, 'features_product'])->name('features.view');


/*------------------------------------------------------------------
Order Route
-------------------------------------------------------------------*/
Route::get('order/all', [SettingsController::class, 'orderall'])->name('order.all');
Route::get('order/pending', [SettingsController::class, 'orderpending'])->name('order.pending');
Route::get('order/processing', [SettingsController::class, 'orderprocessing'])->name('order.processing');
Route::get('order/complete', [SettingsController::class, 'ordercomplete'])->name('order.complete');
Route::get('order/cancel', [SettingsController::class, 'ordercancel'])->name('order.cancel');


/*------------------------------------------------------------------
Role Route
-------------------------------------------------------------------*/
//Route::get('role/index', [RoleController::class, 'index'])->name('role.index');

/*------------------------------------------------------------------
Theme Route
-------------------------------------------------------------------*/
Route::get('theme/index', [ThemeController::class, 'index'])->name('theme.index');
Route::post('theme/create', [ThemeController::class, 'store'])->name('theme.store');
Route::get('theme/view', [ThemeController::class, 'view'])->name('theme.view');
Route::get('theme/details/{theme_id}', [ThemeController::class, 'details']);
Route::get('theme/change/{theme_id}', [ThemeController::class, 'change']);

/*------------------------------------------------------------------
Settings
-------------------------------------------------------------------*/
/*--------------------------Logo---------------------------------*/
Route::get('sattings/logo', [SettingsController::class, 'logo'])->name('sattings.logo');
Route::post('theme/headerlogo/update', [SettingsController::class, 'headerlogoupdate'])->name('theme.headerlogo.update');
Route::post('theme/footerlogo/update', [SettingsController::class, 'footerlogoupdate'])->name('theme.footerlogo.update');
Route::post('theme/invoicelogo/update', [SettingsController::class, 'invoicelogoupdate'])->name('theme.invoicelogo.update');
Route::get('sattings/favicon/index', [SettingsController::class, 'favicon'])->name('sattings.favicon.index');
Route::post('sattings/favicon/update', [SettingsController::class, 'faviconupdate'])->name('sattings.favicon.update');
Route::get('sattings/background/index', [SettingsController::class, 'background'])->name('sattings.background.index');
Route::post('sattings/background/update', [SettingsController::class, 'backgroundupdate'])->name('sattings.background.update');

Route::get('sattings/faq_page/index', [SettingsController::class, 'faq_page'])->name('sattings.faq_page.index');
Route::post('sattings/faq_page/store', [SettingsController::class, 'faq_store'])->name('sattings.faq_page.store');
Route::get('sattings/faq_page/delete/{faq_id}', [SettingsController::class, 'faq_delete']);
Route::get('sattings/faq_page/edit/{faq_id}', [SettingsController::class, 'faq_edit']);
Route::post('sattings/faq_page/update', [SettingsController::class, 'faq_update'])->name('sattings.faq_page.update');
Route::get('sattings/contact_us_page/index', [SettingsController::class, 'contact_us_page'])->name('sattings.contact_us_page.index');
Route::post('sattings/contact_us_page/update', [SettingsController::class, 'contact_us_page_update'])->name('sattings.contact_us_page.update');

Route::get('sattings/terms_condition/index', [SettingsController::class, 'terms_condition'])->name('sattings.terms_condition.index');
Route::post('sattings/terms_condition/update', [SettingsController::class, 'terms_condition_update'])->name('sattings.terms_condition.update');
Route::get('sattings/privacy_policy/index', [SettingsController::class, 'privacy_policy'])->name('sattings.privacy_policy.index');
Route::post('sattings/privacy_policy/update', [SettingsController::class, 'privacy_policy_update'])->name('sattings.privacy_policy.update');
Route::get('sattings/currency/index', [SettingsController::class, 'currencyindex'])->name('sattings.currency.index');
Route::post('sattings/currency/update', [SettingsController::class, 'currencyupdate'])->name('sattings.currency.update');

/*-------------------------------Home Page Customization-----------------------------*/
Route::get('sattings/home_page_customization/index', [SettingsController::class, 'home_customization'])->name('sattings.home_page_customization.index');
Route::post('sattings/home_page_customization/update', [SettingsController::class, 'hpc_update'])->name('sattings.home_page_customization.update');
/*--------------------------Slider---------------------------------*/
Route::get('home/slider', [HomePageController::class, 'slider'])->name('home.slider');
Route::get('home/slider/index', [HomePageController::class, 'sliderindex'])->name('home.slider.index');
Route::post('theme/slider/create', [HomePageController::class, 'slidercreate'])->name('theme.slider.create');
Route::get('theme/slider/edit/{slider_id}', [HomePageController::class, 'slideredit']);
Route::post('theme/slider/update/{slider_id}', [HomePageController::class, 'sliderupdate']);
Route::get('theme/slider/delete/{slider_id}', [HomePageController::class, 'sliderdelete']);
/*--------------------------Service---------------------------------*/
Route::get('home/service', [HomePageController::class, 'service'])->name('home.service');
Route::post('theme/service/create', [HomePageController::class, 'servicecreate'])->name('theme.service.create');
Route::get('theme/service/edit/{service_id}', [HomePageController::class, 'serviceedit']);
Route::post('theme/service/update/{service_id}', [HomePageController::class, 'serviceupdate']);
Route::get('theme/service/delete/{service_id}', [HomePageController::class, 'servicedelete']);
/*--------------------------Banner---------------------------------*/
Route::get('home/banner', [HomePageController::class, 'banner'])->name('home.banner');
Route::post('theme/banner/create', [HomePageController::class, 'bannercreate'])->name('theme.banner.create');
Route::get('theme/banner/edit/{banner_id}', [HomePageController::class, 'banneredit']);
Route::get('theme/banner/delete/{banner_id}', [HomePageController::class, 'bannerdelete']);
Route::post('theme/banner/update/{banner_id}', [HomePageController::class, 'bannerupdate']);
/*--------------------------Right Banner----------------------------*/
Route::get('home/rigth_side_banner', [HomePageController::class, 'rigth_side_banner'])->name('home.rigth_side_banner');
Route::post('theme/rigth_banner/create', [HomePageController::class, 'rightbannercreate'])->name('theme.rigth_banner.create');
Route::get('theme/rigth_banner/edit/{rigth_banner_id}', [HomePageController::class, 'rightbanneredit']);
Route::post('theme/rigth_banner/update', [HomePageController::class, 'rightbannerupdate'])->name('theme.rigth_banner.update');
Route::get('theme/rigth_banner/delete/{rigth_banner_id}', [HomePageController::class, 'rightbannerdelete']);
/*--------------------------Reviews----------------------------*/
Route::get('home/reviews', [HomePageController::class, 'reviews'])->name('home.reviews');
Route::post('theme/reviews/create', [HomePageController::class, 'reviewscreate'])->name('theme.reviews.create');
Route::get('theme/reviews/edit/{review_id}', [HomePageController::class, 'reviewedit']);
Route::post('theme/reviews/update', [HomePageController::class, 'reviewupdate'])->name('theme.reviews.update');
Route::get('theme/reviews/delete/{review_id}', [HomePageController::class, 'reviewdelete']);
/*--------------------------Partners----------------------------*/
Route::get('home/partner', [HomePageController::class, 'partner'])->name('home.partner');
Route::post('theme/partner/create', [HomePageController::class, 'partnercreate'])->name('theme.partner.create');
Route::get('theme/partner/edit/{partner_id}', [HomePageController::class, 'partneredit']);
Route::post('theme/partner/update', [HomePageController::class, 'partnerupdate'])->name('theme.partner.update');
Route::get('theme/partner/delete/{partner_id}', [HomePageController::class, 'partnerdelete']);

/*--------------------------Social----------------------------*/
Route::get('home/social', [HomePageController::class, 'social'])->name('home.social');
Route::get('home_page_customization/service', [HomePageController::class, 'home_page_customization'])->name('home_page_customization.index');
Route::get('query_test', [HomePageController::class, 'query_test'])->name('query_test.index');

/*------------------------------------------------------------------
Report
-------------------------------------------------------------------*/
Route::get('product/report', [SettingsController::class, 'productreport'])->name('product.report');
Route::get('payment/report', [SettingsController::class, 'paymentreport'])->name('payment.report');
Route::get('order/report', [SettingsController::class, 'orderreport'])->name('order.report');
Route::get('stock/report', [SettingsController::class, 'stockreport'])->name('stock.report');

/*------------------------------------------------------------------
Manage Category
-------------------------------------------------------------------*/
Route::get('category/main', [CategoryController::class, 'maincategory'])->name('category.main');
Route::post('categories/store', [CategoryController::class, 'categories_store'])->name('categories.store');
Route::get('categories/edit/{categories_id}', [CategoryController::class, 'categories_edit']);
Route::post('categories/update', [CategoryController::class, 'categories_update'])->name('categories.update');
Route::get('categories/delete/{categories_id}', [CategoryController::class, 'categories_delete']);

/*----------------- Sub Category-----------------------*/

Route::get('category/subcategory/index', [CategoryController::class, 'subcategory_index'])->name('category.subcategory.index');
Route::post('subcategory/store', [CategoryController::class, 'subcategory_store'])->name('subcategory.store');
Route::get('subcategory/edit/{subcategory_id}', [CategoryController::class, 'subcategory_edit']);
Route::post('subcategory/update', [CategoryController::class, 'subcategory_update'])->name('subcategory.update');
Route::get('subcategory/delete/{categories_id}', [CategoryController::class, 'subcategory_delete']);

/*---------------- child Category---------------------------*/
Route::get('category/childcategory/index', [CategoryController::class, 'childcategory'])->name('category.childcategory.index');
Route::post('childcategory/store', [CategoryController::class, 'childcategory_store'])->name('childcategory.store');
Route::get('childcategory/edit/{childcategory_id}', [CategoryController::class, 'childcategory_edit']);
Route::post('childcategory/update', [CategoryController::class, 'childcategory_update'])->name('childcategory.update');
Route::get('childcategory/delete/{childcategory_id}', [CategoryController::class, 'childcategory_delete']);

/*----------------- Brand----------------------------------*/
Route::get('category/brand/index', [CategoryController::class, 'brand'])->name('category.brand.index');
Route::post('brand/store', [CategoryController::class, 'brand_store'])->name('brand.store');
Route::get('brand/edit/{brand_id}', [CategoryController::class, 'brand_edit']);
Route::post('brand/update', [CategoryController::class, 'brand_update'])->name('brand.update');
Route::get('brand/delete/{brand_id}', [CategoryController::class, 'brand_delete']);

/*------------------------------------------------------------------
General Settings
-------------------------------------------------------------------*/

//Route::get('sattings/shipping/index', [SettingsController::class, 'shipping'])->name('sattings.shipping.index');
//Route::get('packagings/index', [SettingsController::class, 'packagings'])->name('packagings.index');
Route::get('sattings/footer/index', [SettingsController::class, 'footer'])->name('sattings.footer.index');

/*---------------------------------
Customers
----------------------------------*/
Route::get('customers_list/index', [SettingsController::class, 'customers_list'])->name('customers_list.index');
Route::get('customers_default_img/index', [SettingsController::class, 'customers_default_img'])->name('customers_default_img.index');

/*-------------------------------------------------------------------
Email Settings
---------------------------------------------------------------------*/
Route::get('email_templates/index', [SettingsController::class, 'email_templates'])->name('email_templates.index');
Route::get('email_configurations/index', [SettingsController::class, 'email_configurations'])->name('email_configurations.index');
Route::get('email_group/index', [SettingsController::class, 'email_group'])->name('email_group.index');


/*-----------------------------------------
Manage Role
------------------------------------------*/
Route::get('manage_role/', [SettingsController::class, 'manage_role'])->name('manage_role.index');

/*---------------- Branch ------------------*/

Route::get('branch/', [BranchController::class, 'branch'])->name('branch');
Route::post('branch/store/', [BranchController::class, 'branch_store'])->name('branch.store');
Route::get('branch/edit/{branch_id}', [BranchController::class, 'branch_edit']);
Route::post('branch/update/', [BranchController::class, 'branch_update'])->name('branch.update');
Route::get('branch/delete/{branch_id}', [BranchController::class, 'branch_delete']);

/*---------------------- Stock -------------------------------*/
Route::get('stock/index', [StockController::class, 'stock_index'])->name('stock.index');
Route::get('stock/stock', [StockController::class, 'stock'])->name('stock.view');
Route::get('stock/product/edit/{product_id}', [StockController::class, 'product_edit']);
Route::get('stock/products/edit/{stock_id}', [StockController::class, 'stock_product_edit']);
Route::post('stock/product/store/', [StockController::class, 'stock_store'])->name('stock.store');
Route::post('stock/product/update/', [StockController::class, 'stock_update'])->name('stock.update');



Route::post('stock/supplier/store/', [StockController::class, 'supplier'])->name('supplier.store');

/*----------------------------Error-----------------------------*/
Route::get('404/not/found', [SettingsController::class, 'error'])->name('not.found');


///*--------------------------------------------
//Settings
//---------------------------------------------*/
//Route::get('get/settings/{sett}', [SettingsController::class, 'getsettings']);
//
