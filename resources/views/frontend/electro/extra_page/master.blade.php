<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<head>
    <!-- Title -->
    <title>Home | Electro - Responsive Website Template</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.png">
    <meta name="base_url" content="<?= env('APP_URL') ?>"/>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap"
        rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('frontend/electro/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/electro/css/font-electro.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/electro/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/electro/vendor/hs-megamenu/src/hs.megamenu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/electro/vendor/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet"
          href="{{asset('frontend/electro/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/electro/vendor/fancybox/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/electro/vendor/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet"
          href="{{asset('frontend/electro/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">

    <!-- CSS Electro Template -->
    <link rel="stylesheet" href="{{asset('frontend/electro/css/theme.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
</head>

<body>
<!-- ========== Language ========== -->
<?php
$url = env('APP_URL') . 'api/deflan';
$cSession = curl_init();
curl_setopt($cSession, CURLOPT_URL, $url);
curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cSession, CURLOPT_HEADER, false);
$result = curl_exec($cSession);
$lang = json_decode($result);
curl_close($cSession);
?>

@php
if (isset($lang))
    $default = $lang->lang_id;
    $lan = $default;
    if(\Session::has('lan'))
    {
    $lan = Session::get('lan');
    }
@endphp
<!-- ========== Language ========== -->
<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <div class="u-header-topbar py-2 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a href="{{route('/')}}" class="text-gray-110 font-size-13 hover-on-dark">Welcome to Worldwide
                            Electronics
                            Store</a>
                    </div>
                    <div class="topbar-right ml-auto">
                        <ul class="list-inline mb-0">
                            @php
                                $default_branch = 0;
                                $allBranch= $default_branch;
                                if(\Session::has('branch'))
                                {
                                $allBranch = Session::get('branch');
                                }
                            @endphp
                            <?php
                            $url = env('APP_URL') . 'api/branch';
                            $cSession = curl_init();
                            curl_setopt($cSession, CURLOPT_URL, $url);
                            curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($cSession, CURLOPT_HEADER, false);
                            $result = curl_exec($cSession);
                            $branchs = json_decode($result);
                            curl_close($cSession);
                            //dd($branchs);
                            ?>

                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                {{-- branch               --}}
                                <div class="position-relative">
                                    <a id="languageDropdownInvoker"
                                       class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal"
                                       href="javascript:;" role="button" aria-controls="store" aria-haspopup="true"
                                       aria-expanded="false" data-unfold-event="hover" data-unfold-target="#store"
                                       data-unfold-type="css-animation" data-unfold-duration="300"
                                       data-unfold-delay="300" data-unfold-hide-on-scroll="true"
                                       data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">

                                            <span class="d-none d-sm-inline-flex align-items-center">
                                                {{front_ln('branch',$lan)}} {{front_ln('location',$lan)}}
                                                (

                                                <?php
                                                if ($allBranch == 0) {

                                                    echo "All Branch";
                                                } else {

                                                    if ($branchs) {
                                                        foreach ($branchs as $V_as) {
                                                            if ($V_as->branch_id == $allBranch) {
                                                                echo $V_as->branch_name;
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>)
                                                <!-- -->
                                            </span>
                                    </a>
                                    <div id="store" class="dropdown-menu dropdown-unfold"
                                         aria-labelledby="languageDropdownInvoker">
                                        <a class="dropdown-item active"
                                           href=""
                                           style="cursor: pointer;">All Branch </a>

                                        @if(isset($branchs))
                                            @foreach($branchs as $V_as)
                                                    <a class="dropdown-item active"
                                                       href="{{route('branchs',$V_as->branch_id)}}"
                                                       style="cursor: pointer;">{{$V_as->branch_name}} <?php if($V_as->branch_id == Session()->get('branch'))
                                                        {echo "<button style='width: 10px; height: 10px; padding: 1px;' type='button' class='btn btn-danger'></button>";} ?></a>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>

                                {{-- branch --}}

                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="{{route('track_order')}}" class="u-header-topbar__nav-link"><i
                                        class="ec ec-transport mr-1"></i> {{front_ln('trackyourorder',$lan)}}</a>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                <div class="d-flex align-items-center">
                                    <!-- Language -->

                                    <div class="position-relative">
                                        <a id="languageDropdownInvoker"
                                           class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal"
                                           href="javascript:;" role="button" aria-controls="languageDropdown"
                                           aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                           data-unfold-target="#languageDropdown" data-unfold-type="css-animation"
                                           data-unfold-duration="300" data-unfold-delay="300"
                                           data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                           data-unfold-animation-out="fadeOut">
                                            {{--                                                <span class="d-inline-block d-sm-none">US</span>--}}
                                            <span class="d-none d-sm-inline-flex align-items-center">
                                                    <?php
                                                $url = env('APP_URL') . 'api/language';
                                                $cSession = curl_init();
                                                curl_setopt($cSession, CURLOPT_URL, $url);
                                                curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($cSession, CURLOPT_HEADER, false);
                                                $result = curl_exec($cSession);
                                                $data = json_decode($result);
                                                curl_close($cSession);
                                                ?>
                                                @if($data)
                                                    @foreach ($data as $x)
                                                        @if ($x->lang_id == $lan)
                                                            <?php echo $x->language_name;
                                                            break; ?>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </span>
                                        </a>

                                        <div id="languageDropdown" class="dropdown-menu dropdown-unfold"
                                             aria-labelledby="languageDropdownInvoker">

                                            @if(isset($data))
                                                @foreach($data as $language)
                                                    <a class="dropdown-item active"
                                                       href="{{route('language_change',$language->lang_id)}}"
                                                       style="cursor: pointer;">{{$language->language_name}}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Language -->
                                </div>
                            </li>
                            @if(!Session::has('user'))
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <!-- Account Sidebar Toggle Button -->

                                    <a id="sidebarNavToggler" href="javascript:;" role="button"
                                       class="u-header-topbar__nav-link" aria-controls="sidebarContent"
                                       aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                       data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent"
                                       data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight"
                                       data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                        <i class="ec ec-user mr-1"></i> {{front_ln('register',$lan)}} <span
                                            class="text-gray-50">{{front_ln('or',$lan)}}</span> {{front_ln('signin',$lan)}}
                                    </a>
{{--                                @else--}}
{{--                                    <a href="{{route('customer.logout')}}">--}}
{{--                                        <i class="ec ec-user mr-1"></i> Log Out</a>--}}

                            </li>
                            @else
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                <div class="d-flex align-items-center">

                                    <div class="position-relative">
                                        <a id="aboutDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                           aria-controls="aboutDropdown"
                                           aria-haspopup="true"
                                           aria-expanded="false"
                                           data-unfold-event="hover"
                                           data-unfold-target="#aboutDropdown"
                                           data-unfold-type="css-animation"
                                           data-unfold-duration="300"
                                           data-unfold-delay="300"
                                           data-unfold-hide-on-scroll="true"
                                           data-unfold-animation-in="slideInUp"
                                           data-unfold-animation-out="fadeOut">
                                            <span class="d-none d-sm-inline-flex align-items-center">
                                                @if(Session::has('user'))
                                                {{Session::get('user')->customer_name}}
                                                @endif
                                            </span>
                                        </a>
                                        <div id="aboutDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="aboutDropdownInvoker">
{{--                                            <a class="dropdown-item active" href="#">English</a>--}}
<?php 
$name =  Session::get('user')->customer_name;
$name = Str::slug($name);
?>
                                            <a class="dropdown-item" href="{{URL::to('account/'.$name )}}">Dashboard</a>
                                            <a class="dropdown-item" href="{{route('customer.logout')}}">Log Out</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

    <?php
    $url = env('APP_URL') . 'api/home_page_sattings';
    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_HEADER, false);
    $result = curl_exec($cSession);
    $logo = json_decode($result);
    curl_close($cSession);



    //dd($data);
    ?>

    <!-- Logo-Search-header-icons -->
        <div class="py-2 py-xl-5 bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav
                            class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                               href="{{route('/')}}" aria-label="Electro">
                                @if(isset($logo))
                                <img class="img-fluid" src="{{URL::to($logo->logo)}}" alt="Image Description">
                                @endif
                            </a>
                            <!-- End Logo -->

                            <!-- Fullscreen Toggle Button -->
                            <button id="sidebarHeaderInvokerMenu" type="button"
                                    class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                    aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
                                    data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                    data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                    data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                    data-unfold-duration="500">
                                    <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                        <span class="u-hamburger__inner"></span>
                                    </span>
                            </button>
                            <!-- End Fullscreen Toggle Button -->
                        </nav>
                        <!-- End Nav -->

                        <!-- ========== HEADER SIDEBAR ========== -->
                        <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left"
                               aria-labelledby="sidebarHeaderInvoker">
                            <div class="u-sidebar__scroller">
                                <div class="u-sidebar__container">
                                    <div class="u-header-sidebar__footer-offset">
                                        <!-- Toggle Button -->
                                        <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                                            <button type="button" class="close ml-auto" aria-controls="sidebarHeader"
                                                    aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                                    data-unfold-hide-on-scroll="false"
                                                    data-unfold-target="#sidebarHeader1"
                                                    data-unfold-type="css-animation"
                                                    data-unfold-animation-in="fadeInLeft"
                                                    data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                                <span aria-hidden="true"><i
                                                        class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                            </button>
                                        </div>
                                        <!-- End Toggle Button -->

                                        <!-- Content -->
                                        <div class="js-scrollbar u-sidebar__body">
                                            <div id="headerSidebarContent"
                                                 class="u-sidebar__content u-header-sidebar__content">
                                                <!-- Logo -->
                                                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mb-3"
                                                   href="{{route('/')}}" aria-label="Electro">
                                                    @if(isset($logo->logo))
                                                    <img class="img-fluid" src="{{URL::to($logo->logo)}}"
                                                         alt="Image Description">
                                                    @endif
                                                </a>
                                                <!-- End Logo -->

                                                <!-- List -->
                                                <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                    <!-- Computers & Accessories -->
                                                    <?php
                                                    $obj = new _Menu;
                                                    $data = $obj->main_manu();
                                                    ?>
                                                    @if(isset($data))

                                                    @foreach($data as $category)

                                                        <li class="u-has-submenu u-header-collapse__submenu">
                                                            <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                               href="{{URL::to('cat/'.$category->id."/".$category->slug)}}"
                                                               data-target="#headerSidebar{{$category->slug}}Collapse"
                                                               role="button" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="headerSidebar{{$category->slug}}Collapse">
                                                                {{$category->name}}
                                                            </a>
                                                            <div id="headerSidebar{{$category->slug}}Collapse"
                                                                 class="collapse" data-parent="#headerSidebarContent">
                                                                @foreach($category->sub_categoris as $Subcategory)
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li>
                                                                            <a href="{{URL::to('sub/'.$Subcategory->id."/".$Subcategory->slug)}}">
                                                                                <span
                                                                                    class="u-header-sidebar__sub-menu-title">{{$Subcategory->name}}</span>
                                                                            </a>

                                                                        </li>
                                                                        @foreach($Subcategory->chield_categoris as $Childcategory)
                                                                            <li>
                                                                                <a class="u-header-collapse__submenu-nav-link"
                                                                                   href="{{URL::to('child/'.$Childcategory->id."/".$Childcategory->slug)}}">{{$Childcategory->name}}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                @endforeach
                                                @endif


                                                <!-- End Computers & Accessories -->
                                                </ul>
                                                <!-- End List -->
                                            </div>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!-- Footer -->
                                    <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-3">
                                                <a class="u-header-sidebar__footer-link text-gray-90"
                                                   href="#">Privacy</a>
                                            </li>
                                            <li class="list-inline-item pr-3">
                                                <a class="u-header-sidebar__footer-link text-gray-90"
                                                   href="{{route('terms')}}">Terms</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="u-header-sidebar__footer-link text-gray-90"
                                                   href="{{route('faq')}}">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- SVG Background Shape -->
                                        <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                                            <img class="js-svg-injector"
                                                 src="https://transvelo.github.io/electro-html/2.0/assets/svg/components/wave-bottom-with-dots.svg"
                                                 alt="Image Description" data-parent="#SVGwaveWithDots">
                                        </div>
                                        <!-- End SVG Background Shape -->
                                    </footer>
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </aside>
                        <!-- ========== END HEADER SIDEBAR ========== -->
                    </div>
                    <!-- End Logo-offcanvas-menu -->
                    <!-- Search Bar -->
                    <div class="col d-none d-xl-block">
                        <form class="js-focus-state">
                            <label class="sr-only" for="searchproduct">Search</label>
                            <div class="input-group">
                                <input type="email"
                                       class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary"
                                       name="email" id="searchproduct-item"
                                       placeholder="{{front_ln('searchforproduct',$lan)}}"
                                       aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <!-- Select -->
                                    <select
                                        class="js-select selectpicker dropdown-select custom-search-categories-select"
                                        data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                        <option value="one"
                                                selected>{{front_ln('all',$lan)}} {{front_ln('categories',$lan)}}</option>
                                        @if(isset($data))
                                            @foreach($data as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>

                                            @endforeach
                                        @endif
                                    </select>
                                    <!-- End Select -->
                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="button"
                                            id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->
                    <!-- Header Icons -->
                    <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <!-- Search -->
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker"
                                       class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary"
                                       href="javascript:;" role="button" data-toggle="tooltip" data-placement="top"
                                       title="Search" aria-controls="searchClassic" aria-haspopup="true"
                                       aria-expanded="false" data-unfold-target="#searchClassic"
                                       data-unfold-type="css-animation" data-unfold-duration="300"
                                       data-unfold-delay="300" data-unfold-hide-on-scroll="true"
                                       data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>

                                    <!-- Input -->
                                    <div id="searchClassic"
                                         class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2"
                                         aria-labelledby="searchClassicInvoker">
                                        <form class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Search Product">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="button"><i
                                                        class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Input -->
                                </li>
                                <!-- End Search -->
                                <li class="col d-none d-xl-block"><a href="{{route('compare')}}" class="text-gray-90"
                                                                     data-toggle="tooltip" data-placement="top"
                                                                     title="Compare"><i
                                            class="font-size-22 ec ec-compare"></i></a></li>
                                <li class="col d-none d-xl-block"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                        class="text-gray-90" data-toggle="tooltip" data-placement="top"
                                        title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                <li class="col d-xl-none px-2 px-sm-3"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/my-account.html"
                                        class="text-gray-90" data-toggle="tooltip" data-placement="top"
                                        title="My Account"><i class="font-size-22 ec ec-user"></i></a></li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-xl-none">
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/cart.html"
                                       class="text-gray-90 position-relative d-flex " data-toggle="tooltip"
                                       data-placement="top" title="Cart">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>
                                        <span
                                            class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">2</span>
                                        <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">0</span>
                                    </a>
                                </li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">
                                    <div id="basicDropdownHoverInvoker" class="text-gray-90 position-relative d-flex "
                                         data-toggle="tooltip" data-placement="top" title="Cart"
                                         aria-controls="basicDropdownHover" aria-haspopup="true" aria-expanded="false"
                                         data-unfold-event="click" data-unfold-target="#basicDropdownHover"
                                         data-unfold-type="css-animation" data-unfold-duration="300"
                                         data-unfold-delay="300" data-unfold-hide-on-scroll="true"
                                         data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>
                                        <span
                                            class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12"
                                            id="header_mobile_cart">0</span>
                                        <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3"
                                              id="lblsubtotal">0</span>
                                    </div>
                                    <div id="basicDropdownHover"
                                         class="cart-dropdown dropdown-menu dropdown-unfold border-top border-top-primary mt-3 border-width-2 border-left-0 border-right-0 border-bottom-0 left-auto right-0"
                                         aria-labelledby="basicDropdownHoverInvoker">
                                        <ul class="list-unstyled px-3 pt-3">
                                            <li class="border-bottom pb-3 mb-3">
                                                <div class="" id="show_card_body">
                                                    {{-- <ul class="list-unstyled row mx-n2">
                                                    <li class="px-2 col-auto">
                                                        <img class="img-fluid" src="{{asset('frontend/electro/img/75X75/img1.jpg')}}"
                                                    alt="Image Description">
                                            </li>
                                            <li class="px-2 col">
                                                <h5 class="text-blue font-size-14 font-weight-bold">Ultra
                                                    Wireless S50 Headphones S50 with Bluetooth</h5>
                                                <span class="font-size-14">1 × $1,100.00</span>
                                            </li>
                                            <li class="px-2 col-auto">
                                                <a href="#" class="text-gray-90"><i class="ec ec-close-remove"></i></a>
                                            </li>
                                        </ul> --}}
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="flex-center-between px-4 pt-2">
                                            <a href="{{route('cart')}}"
                                               class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">View
                                                cart</a>
                                            <a href="" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5">Checkout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>


        <?php
        $obj = new _Menu;
        $data = $obj->main_manu();
        ?>

        <div class="d-none d-xl-block container">
            <div class="row">
                <!-- Vertical Menu -->
                <div class="col-md-auto d-none d-xl-block">
                    <div class="max-width-270 min-width-270">
                        <!-- Basics Accordion -->
                        <div id="basicsAccordion">
                            <!-- Card -->
                            <div class="card border-0">
                                <div class="card-header card-collapse border-0" id="basicsHeadingOne">
                                    <button type="button"
                                            class="btn-link btn-remove-focus btn-block d-flex card-btn py-3 text-lh-1 px-4 shadow-none btn-primary rounded-top-lg border-0 font-weight-bold text-gray-90"
                                            data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                            aria-controls="basicsCollapseOne">
                                        <span class="ml-0 text-gray-90 mr-2">
                                            <span class="fa fa-list-ul"></span>
                                        </span>
                                        <span
                                            class="pl-1 text-gray-90">{{front_ln('all',$lan)}} {{front_ln('departments',$lan)}}</span>
                                    </button>
                                </div>
                                <div id="basicsCollapseOne" class="collapse vertical-menu"
                                     aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                    <div class="card-body p-0">
                                        <nav
                                            class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                                <ul class="navbar-nav u-header__navbar-nav">
                                                @if(isset($data))
                                                    @foreach($data as $category)
                                                        <!-- Nav Item MegaMenu -->
                                                            <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                                data-event="hover" data-position="left">
                                                                <a id="basicMegaMenu3"
                                                                   class="nav-link u-header__nav-link u-header__nav-link-toggle"
                                                                   href="{{URL::to('cat/'.$category->id."/".$category->slug)}}"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false">{{$category->name}}</a>

                                                                <!-- Nav Item - Mega Menu -->
                                                                <div
                                                                    class="hs-mega-menu vmm-tfw u-header__sub-menu animated hs-position-left"
                                                                    aria-labelledby="basicMegaMenu3"
                                                                    style="display: none;">
                                                                    <div class="vmm-bg">
                                                                        @if(isset($category->image))
                                                                        <img class="img-fluid" style="height: 400px; width: 100%;"
                                                                             src="{{URL::to($category->image)}}"
                                                                             alt="Image Description">
                                                                        @endif

                                                                    </div>
                                                                    <div class="row u-header__mega-menu-wrapper">
                                                                        @foreach($category->sub_categoris as $Subcategory)
                                                                            <div class="col mb-3 mb-sm-0">
                                                                                <a href="{{URL::to('sub/'.$Subcategory->id."/".$Subcategory->slug)}}"><span
                                                                                        class="u-header__sub-menu-title">{{$Subcategory->name}}</span></a>
                                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                                    @foreach($Subcategory->chield_categoris as $Childcategory)
                                                                                        <li>
                                                                                            <a class="nav-link u-header__sub-menu-nav-link"
                                                                                               href="{{URL::to('child/'.$Childcategory->id."/".$Childcategory->slug)}}">{{$Childcategory->name}}</a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif

                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Basics Accordion -->
                    </div>
                </div>
                <!-- End Vertical Menu -->
                <!-- Secondary Menu -->
                <div class="col">
                    <!-- Nav -->
                    <nav
                        class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                        <!-- Navigation -->
                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                            <ul class="navbar-nav u-header__navbar-nav">
                                <!-- Home -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="{{route('about')}}"
                                       aria-haspopup="true" aria-expanded="false"
                                       aria-labelledby="aboutSubMenu">{{front_ln('about',$lan)}} {{front_ln('us',$lan)}}</a>
                                </li>
                                <!-- End Home -->

                                <!-- Featured Brands -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="{{route('contact')}}"
                                       aria-haspopup="true" aria-expanded="false"
                                       aria-labelledby="contackSubMenu">{{front_ln('contact',$lan)}}</a>
                                </li>
                                <!-- End Featured Brands -->

                                <!-- Trending Styles -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="{{route('faq')}}" aria-haspopup="true"
                                       aria-expanded="false" aria-labelledby="blogSubMenu">{{front_ln('faq',$lan)}}</a>
                                </li>
                                <!-- End Trending Styles -->

                                <!-- Gift Cards -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="{{route('wishlist')}}"
                                       aria-haspopup="true" aria-expanded="false">{{front_ln('wishlist',$lan)}}</a>
                                </li>
                                <!-- End Gift Cards -->

                                <!-- Button -->
                                <li class="nav-item u-header__nav-last-item">
                                    <a class="text-gray-90" href="#" target="_blank">
                                        Free Shipping on Orders $50+
                                    </a>
                                </li>
                                <!-- End Button -->
                            </ul>
                        </div>
                        <!-- End Navigation -->
                    </nav>
                    <!-- End Nav -->
                </div>
                <!-- End Secondary Menu -->
            </div>
        </div>


        {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}


    </div>
    <div id="basicsCollapseOne" class="collapse vertical-menu show " aria-labelledby="basicsHeadingOne"
         data-parent="#basicsAccordion">

    </div>

    </div>


    <!-- End Card -->
    </div>
    <!-- End Basics Accordion -->
    </div>
    </div>

    <!-- End Secondary Menu -->
    </div>
    </div>
    <!-- End Vertical-and-secondary-menu -->
    </div>
</header>
<!-- ========== END HEADER ========== -->


<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
<?php
$url = env('APP_URL') . 'api/partners';
$cSession = curl_init();
curl_setopt($cSession, CURLOPT_URL, $url);
curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cSession, CURLOPT_HEADER, false);
$result = curl_exec($cSession);
$partner = json_decode($result);
curl_close($cSession);
//dd($data);
?>

@if(getsettings('Partner'))
    <div class="mb-8">
        <div class="py-2 border-top border-bottom">
            <div class="js-slick-carousel u-slick my-1" data-slides-show="5" data-slides-scroll="1"
                 data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                 data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                 data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right" data-responsive='[{
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 2
                                }
                            }, {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }, {
                                "breakpoint": 554,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }]'>
                @if(isset($partner))
                    @foreach($partner as $v_partner)
                        <div class="js-slide">
                            <a href="{{$v_partner->link}}" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="{{URL::to($v_partner->image)}}"
                                     alt="Image Description">
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endif


@if(getsettings('Footer'))
    <footer>
        <div class="container d-none d-lg-block mb-3">
            <div class="row">
                <div class="col-wd-3 col-lg-4">
                    <div class="widget-column">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">{{front_ln('featured',$lan)}} {{front_ln('product',$lan)}}</h3>
                        </div>
                        <ul class="list-unstyled products-group">
                            <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                                <div class="col-auto">
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                       class="d-block width-75 text-center"><img class="img-fluid"
                                                                                 src="{{asset('frontend/electro/img/75X75/img1.jpg')}}"
                                                                                 alt="Image Description"></a>
                                </div>
                                <div class="col pl-4 d-flex flex-column">
                                    <h5 class="product-item__title mb-0"><a
                                            href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Purple Wireless Headphones Solo 2 HD</a>
                                    </h5>
                                    <div class="prodcut-price mt-auto">
                                        <div class="font-size-15">$1149.00</div>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                                <div class="col-auto">
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                       class="d-block width-75 text-center"><img class="img-fluid"
                                                                                 src="{{asset('frontend/electro/img/75X75/img2.jpg')}}"
                                                                                 alt="Image Description"></a>
                                </div>
                                <div class="col pl-4 d-flex flex-column">
                                    <h5 class="product-item__title mb-0"><a
                                            href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Powerbank 1130 mAh Blue</a></h5>
                                    <div class="prodcut-price mt-auto">
                                        <div class="font-size-15">$210.00</div>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                                <div class="col-auto">
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                       class="d-block width-75 text-center"><img class="img-fluid"
                                                                                 src="{{asset('frontend/electro/img/75X75/img3.jpg')}}"
                                                                                 alt="Image Description"></a>
                                </div>
                                <div class="col pl-4 d-flex flex-column">
                                    <h5 class="product-item__title mb-0"><a
                                            href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Nerocool EN52377 Dead Silence Gaming Cube
                                            Case</a></h5>
                                    <div class="prodcut-price mt-auto">
                                        <div class="font-size-15">$180.00</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-wd-3 col-lg-4">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">{{front_ln('onsale',$lan)}} {{front_ln('product',$lan)}}</h3>
                    </div>
                    <ul class="list-unstyled products-group">
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('frontend/electro/img/75X75/img4.jpg')}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Yellow Earphones Waterproof with
                                        Bluetooth</a>
                                </h5>
                                <div class="prodcut-price mt-auto flex-horizontal-center">
                                    <ins class="font-size-15 text-decoration-none">$110.00</ins>
                                    <del class="font-size-12 text-gray-9 ml-2">$250.00</del>
                                </div>
                            </div>
                        </li>
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('frontend/electro/img/75X75/img5.jpg')}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                <div class="prodcut-price mt-auto flex-horizontal-center">
                                    <ins class="font-size-15 text-decoration-none">$899.00</ins>
                                    <del class="font-size-12 text-gray-9 ml-2">$1200.00</del>
                                </div>
                            </div>
                        </li>
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('frontend/electro/img/75X75/img6.jpg')}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                <div class="prodcut-price mt-auto flex-horizontal-center">
                                    <ins class="font-size-15 text-decoration-none">$2100.00</ins>
                                    <del class="font-size-12 text-gray-9 ml-2">$3299.00</del>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-wd-3 col-lg-4">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">{{front_ln('top',$lan)}} {{front_ln('rated',$lan)}} {{front_ln('product',$lan)}}</h3>
                    </div>
                    <ul class="list-unstyled products-group">
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('frontend/electro/img/75X75/img7.jpg')}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Smartwatch 2.0 LTE Wifi Waterproof</a></h5>
                                <div class="text-warning mb-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <div class="prodcut-price mt-auto">
                                    <div class="font-size-15">$725.00</div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('frontend/electro/img/75X75/img8.jpg')}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">22Mps Camera 6200U with 500GB SDcard</a></h5>
                                <div class="text-warning mb-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <div class="prodcut-price mt-auto">
                                    <div class="font-size-15">$2999.00</div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                   class="d-block width-75 text-center"><img class="img-fluid"
                                                                             src="{{asset('frontend/electro/img/75X75/img9.jpg')}}"
                                                                             alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                <div class="text-warning mb-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <div class="prodcut-price mt-auto">
                                    <div class="font-size-15">$439.00</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-wd-3 d-none d-wd-block">
                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html" class="d-block"><img
                            class="img-fluid" src="{{asset('frontend/electro/img/330X360/img1.jpg')}}"
                            alt="Image Description"></a>
                </div>
            </div>
        </div>

        <div class="pt-8 pb-4 bg-gray-13">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="mb-6">
                            <a href="{{route('/')}}" class="d-inline-block">
                                @if(isset($logo->logo))
                                <img class="img-fluid" src="{{URL::to($logo->logo)}}" alt="Image Description">
                                @endif

                            </a>
                        </div>
                        <div class="mb-4">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <i class="ec ec-support text-primary font-size-56"></i>
                                </div>
                                <div class="col pl-3">
                                    <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                    <a href="tel:+80080018588" class="font-size-20 text-gray-90">(800) 8001-8588, </a><a
                                        href="tel:+0600874548" class="font-size-20 text-gray-90">(0600) 874 548</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6 class="mb-1 font-weight-bold">Contact info</h6>
                            <address class="">
                                17 Princess Road, London, Greater London NW1 8JR, UK
                            </address>
                        </div>
                        <div class="my-4 my-md-4">
                            <ul class="list-inline mb-0 opacity-7">
                                <li class="list-inline-item mr-0">
                                    <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                       href="#">
                                        <span class="fab fa-facebook-f btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                       href="#">
                                        <span class="fab fa-google btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                       href="#">
                                        <span class="fab fa-twitter btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                       href="#">
                                        <span class="fab fa-github btn-icon__inner"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-12 col-md mb-4 mb-md-0">
                                <h6 class="mb-3 font-weight-bold">Find it Fast</h6>
                                <!-- List Group -->
                                <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Laptops
                                            & Computers</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Cameras
                                            & Photography</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Smart
                                            Phones & Tablets</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Video
                                            Games & Consoles</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">TV
                                            & Audio</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Gadgets</a>
                                    </li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Car
                                            Electronic & GPS</a></li>
                                </ul>
                                <!-- End List Group -->
                            </div>

                            <div class="col-12 col-md mb-4 mb-md-0">
                                <!-- List Group -->
                                <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent mt-md-6">
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Printers
                                            & Ink</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Software</a>
                                    </li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Office
                                            Supplies</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Computer
                                            Components</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">Accesories</a>
                                    </li>
                                </ul>
                                <!-- End List Group -->
                            </div>

                            <div class="col-12 col-md mb-4 mb-md-0">
                                <h6 class="mb-3 font-weight-bold">Customer Care</h6>
                                <!-- List Group -->
                                <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/my-account.html">My
                                            Account</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/track-your-order.html">Order
                                            Tracking</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html">Wish
                                            List</a></li>
                                    <li><a class="list-group-item list-group-item-action" href="{{route('terms')}}">Terms
                                            &
                                            Condition</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="terms-and-conditions.html">Returns
                                            / Exchange</a></li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="{{route('faq')}}">FAQs</a>
                                    </li>
                                    <li><a class="list-group-item list-group-item-action"
                                           href="terms-and-conditions.html">Product
                                            Support</a></li>
                                </ul>
                                <!-- End List Group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-14 py-2">
            <div class="container">
                <div class="flex-center-between d-block d-md-flex">
                    <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">Electro</a> - All
                        rights
                        Reserved
                    </div>

                </div>
            </div>
        </div>

    </footer>
@endif
<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Account Sidebar Navigation -->
<aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                <!-- Toggle Button -->
                <div class="d-flex align-items-center pt-4 px-7">
                    <button type="button" class="close ml-auto" aria-controls="sidebarContent" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                        <i class="ec ec-close-remove"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">

                        <!-- Login -->
                        <div id="login" data-target-group="idForm">
                            <!-- Title -->
                            <header class="text-center mb-7">
                                <h2 class="h4 mb-0">Welcome Back!</h2>
                                <p>Login To Your account.</p>
                            </header>
                            <!-- End Title -->

                            <!-- Form Group -->
                            <form id="login">
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signinEmail">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinEmailLabel">
                                                        <span class="fas fa-user"></span>
                                                    </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="cus_email"
                                                   placeholder="Email" aria-label="Email"
                                                   aria-describedby="signinEmailLabel" required
                                                   data-msg="Please enter a valid email address."
                                                   data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signinPassword" id="">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="cus_pass"
                                                   placeholder="Password" aria-label="Password"
                                                   aria-describedby="signinPasswordLabel" required
                                                   data-msg="Your password is invalid. Please try again."
                                                   data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->


                                <div class="mb-2">
                                    <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <div class="text-center mb-4">
                                <span class="small text-muted">Do not have an account?</span>
                                <a class="js-animation-link small text-dark" href="javascript:;" data-target="#signup"
                                   data-link-group="idForm" data-animation-in="slideInUp">Signup
                                </a>
                            </div>

                            <div class="text-center">
                                <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                            </div>

                            <!-- Login Buttons -->
                            <div class="d-flex">
                                <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                    <span class="fab fa-facebook-square mr-1"></span>
                                    Facebook
                                </a>
                                <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                    <span class="fab fa-google mr-1"></span>
                                    Google
                                </a>
                            </div>
                            <!-- End Login Buttons -->
                        </div>

                        <!--------------------------------- Signup Start --------------------------->


                        <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">

                            <header class="text-center mb-7">
                                <h2 class="h4 mb-0">Welcome to Electro.</h2>
                                <p>Fill out the form to get started.</p>
                            </header>

                            <form class="js-validate" id="contactForm">
                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only">Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupEmailLabel">
                                                        <span class="fas fa-user"></span>
                                                    </span>
                                            </div>
                                            <input type="text" class="form-control" name="customer_name"
                                                   id="customer_name" placeholder="Name" required
                                                   data-msg="Please Enter Your Name" data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                            {{-- @error('customer_name')--}}
                                            {{-- <span class="invalid-feedback" role="alert">--}}
                                            {{-- <strong>{{ $message }}</strong>--}}
                                            {{-- </span>--}}
                                            {{-- @enderror--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signupEmail">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupEmailLabel">
                                                        <span class="fas fa-user"></span>
                                                    </span>
                                            </div>
                                            <input type="email" class="form-control" name="customer_email"
                                                   id="customer_email" placeholder="Email" aria-label="Email"
                                                   aria-describedby="signupEmailLabel" required
                                                   data-msg="Please enter a valid email address."
                                                   data-error-class="u-has-error" data-success-class="u-has-success">

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="js-form-message js-focus-state">
                                        <label class="sr-only" for="signupPassword">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                            </div>
                                            <input type="password" class="form-control" name="customer_password"
                                                   id="customer_password" placeholder="Password" aria-label="Password"
                                                   aria-describedby="signupPasswordLabel" required
                                                   data-msg="Your password is invalid. Please try again."
                                                   data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="form-group">--}}
                                {{-- <div class="js-form-message js-focus-state">--}}
                                {{-- <label class="sr-only" for="signupConfirmPassword">Confirm Password</label>--}}
                                {{-- <div class="input-group">--}}
                                {{-- <div class="input-group-prepend">--}}
                                {{-- <span class="input-group-text" id="signupConfirmPasswordLabel">--}}
                                {{-- <span class="fas fa-key"></span>--}}
                                {{-- </span>--}}
                                {{-- </div>--}}
                                {{-- <input type="password" class="form-control" name="customer_password_confirmation"--}}
                                {{-- id="customer_password_confirmation" placeholder="Confirm Password"--}}
                                {{-- aria-label="Confirm Password"--}}
                                {{-- aria-describedby="signupConfirmPasswordLabel"--}}
                                {{-- data-msg="Password does not match the confirm password."--}}
                                {{-- data-error-class="u-has-error"--}}
                                {{-- data-success-class="u-has-success">--}}
                                {{-- </div>--}}
                                {{-- </div>--}}
                                {{-- </div>--}}


                                <div class="mb-2">
                                    <button id="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">
                                        Get Started
                                    </button>
                                </div>
                            </form>
                            <div class="text-center mb-4">
                                <span class="small text-muted">Already have an account?</span>
                                <a class="js-animation-link small text-dark" href="javascript:;" data-target="#login"
                                   data-link-group="idForm" data-animation-in="slideInUp">Login
                                </a>
                            </div>

                            <div class="text-center">
                                <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                            </div>

                            <!-- Login Buttons -->
                            <div class="d-flex">
                                <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                    <span class="fab fa-facebook-square mr-1"></span>
                                    Facebook
                                </a>
                                <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                    <span class="fab fa-google mr-1"></span>
                                    Google
                                </a>
                            </div>
                            <!-- End Login Buttons -->
                        </div>
                        <!--------------------------------- Signup End --------------------------->

                        <!-- Forgot Password -->
                        <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">

                            <header class="text-center mb-7">
                                <h2 class="h4 mb-0">Recover Password.</h2>
                                <p>Enter your email address and an email with instructions will be sent to you.</p>
                            </header>

                            <div class="form-group">
                                <div class="js-form-message js-focus-state">
                                    <label class="sr-only" for="recoverEmail">Your email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="recoverEmailLabel">
                                                    <span class="fas fa-user"></span>
                                                </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="recoverEmail"
                                               placeholder="Your email" aria-label="Your email"
                                               aria-describedby="recoverEmailLabel" required
                                               data-msg="Please enter a valid email address."
                                               data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="mb-2">
                                <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">
                                    Recover Password
                                </button>
                            </div>

                            <div class="text-center mb-4">
                                <span class="small text-muted">Remember your password?</span>
                                <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                   data-link-group="idForm" data-animation-in="slideInUp">Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>


<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
   data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->


<!-- JS Global Compulsory -->
<script src="{{asset('frontend/electro/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/bootstrap/bootstrap.min.js')}}"></script>

<!-- JS Implementing Plugins -->
<script src="{{asset('frontend/electro/vendor/appear.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/svg-injector/dist/svg-injector.min.js')}}"></script>
<script
    src="{{asset('frontend/electro/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/typed.js/lib/typed.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/slick-carousel/slick/slick.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/electro/vendor/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>


<!-- JS Electro -->
<script src="{{asset('frontend/electro/js/hs.core.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.countdown.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.header.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.hamburgers.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.unfold.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.focus-state.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.malihu-scrollbar.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.validation.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.fancybox.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.onscroll-animation.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.slick-carousel.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.quantity-counter.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.range-slider.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.show-animation.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.svg-injector.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.go-to.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/hs.selectpicker.js')}}"></script>
<script src="{{asset('frontend/electro/js/components/cart.js')}}"></script>
<script src="{{asset('custom/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>

<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'horizontal',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });
        // initialization of svg injector module
        $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });
        // initialization of quantity counter
        $.HSCore.components.HSQantityCounter.init('.js-quantity');

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });
        // initialization of forms
        $.HSCore.components.HSRangeSlider.init('.js-range-slider');

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function () {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function () {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if ($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });
</script>

{{-- ---------------------------------Add to cart --------------------------------------}}
<script>
    // window.onload = (event) => { count_wishlist_data();};
    //__b();
    //count_wishlist_data();
    //onload="count_wishlist_data()"
    function __b() {

        var dt = JSON.parse(_("ADDTOCARD"));
        if (dt.length > 0) {

            document.getElementById("btncheckout").style.visibility = "visible";

        } else {
            document.getElementById("btncheckout").style.visibility = "hidden";

        }

    }

    function _(c) {
        var n = c + "=";
        var d = decodeURIComponent(document.cookie);
        var ca = d.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(n) == 0) {
                return c.substring(n.length, c.length);
            }
        }
        return "";
    }
</script>
{{-- ---------------------------------Add to cart --------------------------------------}}

<!-----------------------Registration -------------------------->
<script type="text/javascript">
    $('#contactForm').on('submit', function (event) {
        event.preventDefault();

        let customer_name = $('#customer_name').val();
        let customer_email = $('#customer_email').val();
        let customer_password = $('#customer_password').val();

        $.ajax({
            type: "POST",
            url: "<?php echo env('APP_URL'); ?>api/customer/store",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "customer_name": customer_name,
                "customer_email": customer_email,
                "customer_password": customer_password,
            },
            dataType: 'JSON',
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function (data) {
                // console.log(data);
                if (!data.key) {
                    toastr.error("Email Already Exists");
                } else {
                    toastr.success("Successfully Registered");
                }
            }
        });
    });

    $('#login').on('submit', function (event) {
        event.preventDefault();

        let cus_email = $('#cus_email').val();
        let cus_pass = $('#cus_pass').val();


        $.ajax({
            type: "POST",
            url: "<?php echo env('APP_URL'); ?>api/customer/login",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "cus_email": cus_email,
                "cus_pass": cus_pass,
            },
            dataType: 'JSON',
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function (data) {
                console.log(data);
                if (data.key) {
                    var token = data.token;
                    var user_info = data.user_info;
                    window.location = "<?php echo env('APP_URL'); ?>account/" + token;
                    toastr.success("Successfully Logged In");
                    console.log(data.token);
                } else {
                    toastr.error("Something Went Wrong");
                }
            }
        });
    });
</script>
@yield('js')
</body>

</html>
