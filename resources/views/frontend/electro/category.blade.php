@extends('frontend.electro.extra_page.master')
@include('Develop.develop')
@section('content')
    <?php
    $obj = new _Menu;
    $data = $obj->category($id);
    ?>

    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('/')}}">Home</a>
                        </li>
                        @if(isset($data->sub->categories_name))
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active"
                                aria-current="page">{{$data->sub->categories_name}}
                            </li>
                        @endif

                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <?php
    $obj = new _Menu;
    $allcategory = $obj->main_manu();

    ?>
    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                    <!-- List -->
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                        <li>
                            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;"
                               role="button" data-toggle="collapse" aria-expanded="false"
                               aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                Show All Categories
                            </a>

                            <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    @if(isset($allcategory))
                                        @foreach ($allcategory as $item)
                                            <li><a class="dropdown-item"
                                                   href="{{URL::to('cat/'.$item->id."/".$item->slug)}}">{{ $item->name }}
                                                    {{-- <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span> --}}
                                                </a>
                                            </li>
                                    @endforeach
                                @endif
                                <!-- End Menu List -->
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>


                <?php
                $obj = new _Menu;
                $categoriesFilters = $obj->categoriesFilters($id);
                ?>

                <div class="mb-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                    </div>

                    <?php if(count($categoriesFilters->sub) > 0){ ?>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Sub Category</h4>
                        <!-- Checkboxes -->
                        <?php
                        $_sub_show = 2;
                        $i = 0;
                        foreach ($categoriesFilters->sub as $item) {
                        $i++;
                        if (($_sub_show + 1) == $i) {
                            break;
                        }
                        ?>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                       onchange="getProducts(this.value,'sub');" value="<?= $item->name ?>"
                                       id="<?= $item->slug ?>">
                                <label class="custom-control-label" for="<?= $item->slug ?>"><?php  echo $item->name; ?>
                                    <span
                                        class="text-gray-25 font-size-12 font-weight-normal"> (<?php  echo $item->count; ?>)</span>
                                </label>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseSub">
                            <?php
                            $i = 0;
                            foreach ($categoriesFilters->sub as $item) {
                            $i++;

                            if($i > $_sub_show){
                            ?>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           onchange="getProducts(this.value,'sub');" value="<?= $item->name ?>"
                                           id="<?= $item->slug ?>">
                                    <label class="custom-control-label"
                                           for="<?= $item->slug ?>"><?php  echo $item->name; ?>
                                        <span
                                            class="text-gray-25 font-size-12 font-weight-normal"> (<?php  echo $item->count; ?>)</span>
                                    </label>
                                </div>
                            </div>

                            <?php } } ?>

                        </div>
                        <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                           data-toggle="collapse" href="#collapseSub" role="button" aria-expanded="false"
                           aria-controls="collapseSub">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                            <span class="link-collapse__default">Show more</span>
                            <span class="link-collapse__active">Show less</span>
                        </a>
                        <!-- End Link -->
                    </div>


                    <?php } if (count($categoriesFilters->child) > 0){?>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Child Category</h4>

                        <!-- Checkboxes -->
                        <?php


                        $_child_show = 3;
                        $i = 0;
                        foreach ($categoriesFilters->child as $item) {
                        $i++;
                        if (($_child_show + 1) == $i) {
                            break;
                        }
                        ?>

                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" onchange="getProducts(this.value,'child');"
                                       value="<?= $item->name ?>" class="custom-control-input"
                                       id="<?= $item->slug ?>">
                                <label class="custom-control-label" for="<?= $item->slug ?>"><?php echo $item->name; ?>
                                    <span
                                        class="text-gray-25 font-size-12 font-weight-normal"> (<?php echo $item->count; ?>)</span></label>
                            </div>
                        </div>
                    <?php }?>

                    <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseColor">
                            <?php
                            $i = 0;
                            foreach ($categoriesFilters->child as $item) {
                            $i++;

                            if($i > $_child_show){
                            ?>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           onchange="getProducts(this.value,'child');" value="<?= $item->name ?>"
                                           id="<?= $item->slug ?>">
                                    <label class="custom-control-label"
                                           for="<?= $item->slug ?>"><?php echo $item->name; ?> <span
                                            class="text-gray-25 font-size-12 font-weight-normal"> (<?php echo $item->count; ?>)</span></label>
                                </div>
                            </div>
                            <?php } }    ?>
                        </div>

                        <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                           data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false"
                           aria-controls="collapseColor">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                            <span class="link-collapse__default">Show more</span>
                            <span class="link-collapse__active">Show less</span>
                        </a>
                        <!-- End Link -->
                    </div>
                    <?php }  if(count($categoriesFilters->brand) > 0){ ?>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Brand</h4>

                        <!-- Checkboxes -->
                        <?php
                        $_brand_show = 2;
                        $i = 0;
                        foreach ($categoriesFilters->brand as $item) {
                        $i++;
                        if (($_brand_show + 1) == $i) {
                            break;
                        }
                        ?>

                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                       onchange="getProducts(this.value,'brand');" value="<?= $item->name ?>"
                                       id="<?= $item->slug ?>">
                                <label class="custom-control-label" for="<?= $item->slug ?>"><?php echo $item->name; ?>
                                    <span
                                        class="text-gray-25 font-size-12 font-weight-normal"> (<?php echo $item->count; ?>)</span></label>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseBrand">

                            <?php
                            $i = 0;
                            foreach ($categoriesFilters->brand as $item) {
                            $i++;

                            if($i > $_brand_show){
                            ?>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" onchange="getProducts(this.value,'brand');"
                                           class="custom-control-input" value="<?= $item->name ?>"
                                           id="<?= $item->slug ?>">
                                    <label class="custom-control-label"
                                           for="<?= $item->slug ?>"><?php echo $item->name; ?> <span
                                            class="text-gray-25 font-size-12 font-weight-normal"> (<?php echo $item->count; ?>)</span></label>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                        <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                           data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false"
                           aria-controls="collapseBrand">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                            <span class="link-collapse__default">Show more</span>
                            <span class="link-collapse__active">Show less</span>
                        </a>
                        <!-- End Link -->
                    </div>
                    <?php } ?>

                    {{--                    <div class="range-slider">--}}
                    {{--                        <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>--}}
                    {{--                        <!-- Range Slider -->--}}
                    {{--                        <span class="irs js-irs-0 u-range-slider u-range-slider-indicator u-range-slider-grid"><span--}}
                    {{--                                class="irs"><span class="irs-line" tabindex="0"><span class="irs-line-left"></span><span--}}
                    {{--                                        class="irs-line-mid"></span><span class="irs-line-right"></span></span><span--}}
                    {{--                                    class="irs-min" style="display: none;">0</span><span class="irs-max"--}}
                    {{--                                                                                         style="display: none;">1</span><span--}}
                    {{--                                    class="irs-from" style="display: none; left: 0%;">0</span><span class="irs-to"--}}
                    {{--                                                                                                    style="display: none; left: 0%;">0</span><span--}}
                    {{--                                    class="irs-product" style="display: none; left: 0%;">0</span></span><span--}}
                    {{--                                class="irs-grid"></span><span class="irs-bar"--}}
                    {{--                                                              style="left: 2.96296%; width: 94.0741%;"></span><span--}}
                    {{--                                class="irs-shadow shadow-from" style="display: none;"></span><span--}}
                    {{--                                class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-slider from"--}}
                    {{--                                                                                                 style="left: 0%;"></span><span--}}
                    {{--                                class="irs-slider to" style="left: 94.0741%;"></span></span><input--}}
                    {{--                            class="js-range-slider irs-hidden-input" type="text"--}}
                    {{--                            data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"--}}
                    {{--                            data-type="double" data-grid="false" data-hide-from-to="true" data-prefix="$" data-min="0"--}}
                    {{--                            data-max="3456" data-from="0" data-to="3456" data-result-min="#rangeSliderExample3MinResult"--}}
                    {{--                            data-result-max="#rangeSliderExample3MaxResult" tabindex="-1" readonly="">--}}
                    {{--                        <!-- End Range Slider -->--}}
                    {{--                        <div class="mt-1 text-gray-111 d-flex mb-4">--}}
                    {{--                            <span class="mr-0dot5">Price: </span>--}}
                    {{--                            <span>$</span>--}}
                    {{--                            <span id="rangeSliderExample3MinResult" class="">0</span>--}}
                    {{--                            <span class="mx-0dot5"> — </span>--}}
                    {{--                            <span>$</span>--}}
                    {{--                            <span id="rangeSliderExample3MaxResult" class="">3456</span>--}}
                    {{--                        </div>--}}
                    {{--                        <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Filter</button>--}}
                    {{--                    </div>--}}
                </div>

                @if(isset($data->all))
                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
                        </div>
                        <ul class="list-unstyled">
                            @foreach($data->all as $v_all)
                                <li class="mb-4">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="../shop/product-product-fullwidth.html" class="d-block width-75">
                                                <img class="img-fluid" src="{{URL::to($v_all->image)}}"
                                                     alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                    href="../shop/product-product-fullwidth.html">{{$v_all->name}}</a>
                                            </h3>
                                            <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star text-muted"></small>
                                            </div>
                                            <div class="font-weight-bold">
                                                <del class="font-size-11 text-gray-9 d-block">$2299.00</del>
                                                <ins class="font-size-15 text-red text-decoration-none d-block">$1999.00
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <!-- Shop-control-bar Title -->
                <div class="d-block d-md-flex flex-center-between mb-3">
                    <h3 class="font-size-25 mb-2 mb-md-0">{{$data->sub->categories_name}}</h3>
                    <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>
                </div>
                <!-- End shop-control-bar Title -->
                <!-- Shop-control-bar -->
                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <!-- Account Sidebar Toggle Button -->
                        <a id="sidebarNavToggler1"
                           class="btn btn-sm py-1 font-weight-normal target-of-invoker-has-unfolds" href="javascript:;"
                           role="button" aria-controls="sidebarContent1" aria-haspopup="true" aria-expanded="false"
                           data-unfold-event="click" data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                           data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                        </a>
                        <!-- End Account Sidebar Toggle Button -->
                    </div>
                    <div class="px-3 d-none d-xl-block">
                        <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill"
                                   href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                   aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-two-example1-tab" data-toggle="pill"
                                   href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                   aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-align-justify"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill"
                                   href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                   aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-list"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-four-example1-tab" data-toggle="pill"
                                   href="#pills-four-example1" role="tab" aria-controls="pills-four-example1"
                                   aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th-list"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <form method="get">
                            <!-- Select -->
                            <div
                                class="dropdown bootstrap-select js-select dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0">
                                <select
                                    class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0"
                                    tabindex="-98">
                                    <option value="one" selected="">Default sorting</option>
                                    <option value="two">Sort by popularity</option>
                                    <option value="three">Sort by average rating</option>
                                    <option value="four">Sort by latest</option>
                                    <option value="five">Sort by price: low to high</option>
                                    <option value="six">Sort by price: high to low</option>
                                </select>
                                {{-- <button type="button"
                                        class="btn dropdown-toggle btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0"
                                        data-toggle="dropdown" role="button" title="Default sorting">
                                    <div class="filter-option">
                                        <div class="filter-option-inner">
                                            <div class="filter-option-inner-inner">Default sorting</div>
                                        </div>
                                    </div>
                                </button> --}}
                                <div class="dropdown-menu " role="combobox">
                                    <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                        <ul class="dropdown-menu inner show"></ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Select -->
                        </form>
                        <form method="POST" class="ml-2 d-none d-xl-block">
                            <!-- Select -->
                            <div class="dropdown bootstrap-select js-select dropdown-select max-width-120"><select
                                    class="js-select selectpicker dropdown-select max-width-120"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0"

                                    tabindex="-98">
                                    <option value="one" selected="">Show 20</option>
                                    <option value="two">Show 40</option>
                                    <option value="three">Show All</option>
                                </select>
                                {{-- <button type="button"
                                        class="btn dropdown-toggle btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0"
                                        data-toggle="dropdown" role="button" title="Show 20">
                                    <div class="filter-option">
                                        <div class="filter-option-inner">
                                            <div class="filter-option-inner-inner">Show 20</div>
                                        </div>
                                    </div>
                                </button> --}}
                                <div class="dropdown-menu " role="combobox">
                                    <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                        <ul class="dropdown-menu inner show"></ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Select -->
                        </form>
                    </div>
                    <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">
                        <form method="post" class="min-width-50 mr-1">
                            <input size="2" min="1" max="3" step="1" type="number"
                                   class="form-control text-center px-2 height-35" value="1">
                        </form>
                        of 3
                        <a class="text-gray-30 font-size-20 ml-2" href="#">→</a>
                    </nav>
                </div>
                <!-- End Shop-control-bar -->
                <!-- Shop Body -->
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                         aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul id="product" class="row list-unstyled products-group no-gutters">

                        </ul>
                    </div>

                    <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                         aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                        <ul id="sec_product" class="row list-unstyled products-group no-gutters">

                        </ul>
                    </div>

                    <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                         aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                        <ul id="three_product" class="d-block list-unstyled products-group prodcut-list-view">
                        </ul>
                    </div>

                    <div class="tab-pane fade pt-2" id="pills-four-example1" role="tabpanel"
                         aria-labelledby="pills-four-example1-tab" data-target-group="groups">
                        <ul id="last_product" class="d-block list-unstyled products-group prodcut-list-view-small">

                        </ul>
                    </div>
                </div>
                <!-- End Tab Content -->

                <!-- Shop Pagination -->
                <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                     aria-label="Page navigation example">
                    <div class="text-center text-md-left mb-3 mb-md-0">Showing 1–25 of 56 results</div>
                    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                        <li class="page-item"><a class="page-link current" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
                <!-- End Shop Pagination -->
            </div>
        </div>

    </div>

@endsection
@section('js')
    <script>


        var alldata = [<?php  echo json_encode($data); ?>];

        $(document).on('ready', function () {
            var html = '';
            var html2 = '';
            var html3 = '';
            var html4 = '';
            var base_url = $('meta[name="base_url"]').attr('content');
            //console.log(alldata);
            alldata[0]['all'].forEach(function (data) {

                var activity = data.slug;

                html += '<li data-sub="' + data.subcategory + '" id="thisProduct" data-child="' + data.childcategory + '"' +
                    'data-brand="' + data.brand + '"' +
                    'class="col-6 col-md-3 col-wd-2gdot4 product-item">' +
                    '<div class="product-item__outer h-100">' +
                    '<div class="product-item__inner px-xl-4 p-3">' +
                    '<div class="product-item__body pb-xl-2">' +
                    '<div class="mb-2"><a' +
                    'href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="font-size-12 text-gray-5">' + data.brand + '</a></div>' +
                    '<h5 class="mb-1 product-item__title"><a' +
                    ' href="' + base_url + 'product/' + data.id + '/' + data.slug + '" ' +
                    'class="text-blue font-weight-bold">' + data.name + '</a></h5>' +
                    '<div class="mb-2">' +
                    '  <a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="d-block text-center"><img class="img-fluid"' +
                    ' style="width: 150px;height: 100px;"' +
                    'src="' + base_url + '' + data.image + '"' +
                    'alt="Image Description"></a>' +
                    '</div>' +
                    '<div class="flex-center-between mb-1">' +
                    ' <div class="prodcut-price">' +
                    '  <div class="text-gray-100">' + data.Currency + '' + data.selling_price + '</div>' +
                    ' </div>' +
                    '<div class="d-none d-xl-block prodcut-add-cart">' +
                    ' <a onclick="add_to_card(\'' + data.id + '\',\'' + data.name + '\',\'' + data.image + '\',\'' + data.selling_price + '\')"" ' +
                    'class="btn-add-cart btn-primary transition-3d-hover" ><i class="ec ec-add-to-cart" );"></i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="product-item__footer">' +
                    '<div class="border-top pt-2 flex-center-between flex-wrap">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';

            });
            alldata[0]['all'].forEach(function (data) {
                html2 += '<li data-sub="' + data.subcategory + '"  id="thisProduct"  data-child="' + data.childcategory + '"' +
                    'data-brand="' + data.brand + '"' +
                    'class="col-6 col-md-3 col-wd-2gdot4 product-item">' +
                    '<div class="product-item__outer h-100">' +
                    '<div class="product-item__inner px-xl-4 p-3">' +
                    '<div class="product-item__body pb-xl-2">' +
                    '<div class="mb-2"><a' +
                    'href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="font-size-12 text-gray-5">' + data.brand + '</a></div>' +
                    '<h5 class="mb-1 product-item__title"><a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="text-blue font-weight-bold">' + data.slug + '</a></h5>' +
                    '<div class="mb-2">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="d-block text-center"><img class="img-fluid"' +
                    'src="' + base_url + '' + data.image + '"' +
                    'alt="Image Description"></a>' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<a class="d-inline-flex align-items-center small font-size-14"' +
                    'href="#">' +
                    '<div class="text-warning mr-2">' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="far fa-star text-muted"></small>' +
                    '</div>' +
                    '<span class="text-secondary">(40)</span>' +
                    '</a>' +
                    '</div>' +
                    '<ul class="font-size-12 p-0 text-gray-110 mb-4">' +
                    '</ul>' +
                    '<div class="text-gray-20 mb-2 font-size-12">' +
                    ' SKU:' + data.code + '</div>' +
                    '<div class="flex-center-between mb-1">' +
                    '<div class="prodcut-price">' +
                    '<div class="text-gray-100">' + data.Currency + '' + data.selling_price + '</div>' +
                    '</div>' +
                    '<div class="d-none d-xl-block prodcut-add-cart">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="product-item__footer">' +
                    '<div class="border-top pt-2 flex-center-between flex-wrap">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    'class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                '</li>';
            });
            alldata[0]['all'].forEach(function (data) {
                html3 += '<li data-sub="' + data.subcategory + '" data-child="' + data.childcategory + '"' +
                    'data-brand="' + data.brand + '" id="thisProduct" class="product-item remove-divider">' +
                    '<div class="product-item__outer w-100">' +
                    '<div class="product-item__inner remove-prodcut-hover py-4 row">' +
                    '<div class="product-item__header col-6 col-md-4">' +
                    '<div class="mb-2">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="d-block text-center"><img class="img-fluid"' +
                    'src="' + base_url + '' + data.image + '"' +
                    'alt="Image Description"></a>' +
                    '</div>' +
                    '</div>' +
                    ' <div class="product-item__body col-6 col-md-5">' +
                    '<div class="pr-lg-10">' +
                    '<div class="mb-2"><a' +
                    'href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="font-size-12 text-gray-5">Speakers</a></div>' +
                    '<h5 class="mb-2 product-item__title"><a' +
                    'href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="text-blue font-weight-bold">' + data.name + '</a>' +
                    '</h5>' +
                    '<div class="prodcut-price mb-2 d-md-none">' +
                    '<div ' +
                    '  class="text-gray-100">' + data.Currency + '' + data.selling_price + '</div>' +
                    '</div>' +
                    '<div class="mb-3 d-none d-md-block">' +
                    '<a class="d-inline-flex align-items-center small font-size-14"' +
                    'href="#">' +
                    '<div class="text-warning mr-2">' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="far fa-star text-muted"></small>' +
                    '</div>' +
                    '<span class="text-secondary">(40)</span>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="product-item__footer col-md-3 d-md-block">' +
                    '<div class="mb-3">' +
                    '<div class="prodcut-price mb-2">' +
                    '<div' +
                    ' class="text-gray-100">' + data.Currency + '' + data.selling_price + '</div>' +
                    '</div>' +
                    '<div class="prodcut-add-cart">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add' +
                    'to cart</a>' +
                    '</div>' +
                    '</div>' +
                    '<div' +
                    ' class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="text-gray-6 font-size-13 mx-wd-3"><i' +
                    ' class="ec ec-compare mr-1 font-size-15"></i> Compare</a>' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="text-gray-6 font-size-13 mx-wd-3"><i' +
                    ' class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';
            });
            alldata[0]['all'].forEach(function (data) {
                html4 += '<li data-sub="' + data.subcategory + '" data-child=" ' + data.childcategory + '"' +
                    'data-brand="' + data.brand + '" id="thisProduct"  class="product-item remove-divider">' +
                    '<div class="product-item__outer w-100">' +
                    ' <div class="product-item__inner remove-prodcut-hover py-4 row">' +
                    '<div class="product-item__header col-6 col-md-2">' +
                    '<div class="mb-2">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="d-block text-center"><img class="img-fluid"' +
                    'src="' + base_url + '' + data.image + '"' +
                    'alt="Image Description"></a>' +
                    '</div>' +
                    '</div>' +
                    '<div class="product-item__body col-6 col-md-7">' +
                    '<div class="pr-lg-10">' +
                    '<div class="mb-2"><a' +
                    'href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="font-size-12 text-gray-5">Speakers</a></div>' +
                    '<h5 class="mb-2 product-item__title"><a' +
                    ' href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="text-blue font-weight-bold">' + data.name + '</a>' +
                    '</h5>' +
                    '<div class="prodcut-price d-md-none">' +
                    ' <div' +
                    ' class="text-gray-100">' + data.Currency + '' + data.selling_price + '</div>' +
                    '</div>' +
                    '<div class="mb-3 d-none d-md-block">' +
                    '<a class="d-inline-flex align-items-center small font-size-14"' +
                    'href="#">' +
                    '<div class="text-warning mr-2">' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    '<small class="fas fa-star"></small>' +
                    ' <small class="far fa-star text-muted"></small>' +
                    '</div>' +
                    '<span class="text-secondary">(40)</span>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    ' </div>' +
                    ' <div class="product-item__footer col-md-3 d-md-block">' +
                    '<div class="mb-2 flex-center-between">' +
                    ' <div class="prodcut-price">' +
                    '<div' +
                    ' class="text-gray-100">' + data.Currency + '' + data.selling_price + '</div>' +
                    ' </div>' +
                    '<div class="prodcut-add-cart">' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="btn-add-cart btn-primary transition-3d-hover"><i' +
                    ' class="ec ec-add-to-cart"></i></a>' +
                    '</div>' +
                    '</div>' +
                    '<div' +
                    'class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap border-top pt-3">' +
                    ' <a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="text-gray-6 font-size-13 mx-wd-3"><i' +
                    ' class="ec ec-compare mr-1 font-size-15"></i> Compare</a>' +
                    '<a href="' + base_url + 'product/' + data.id + '/' + data.slug + '"' +
                    ' class="text-gray-6 font-size-13 mx-wd-3"><i' +
                    ' class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>' +
                    '</div>' +
                    '</div>' +
                    ' </div>' +
                    ' </div>' +
                    ' </li>';
            });


            document.getElementById("product").innerHTML = html;
            document.getElementById("sec_product").innerHTML = html2;
            document.getElementById("three_product").innerHTML = html3;
            document.getElementById("last_product").innerHTML = html4;

        });

        var all = [
            [],
            [],
            []
        ];

        function getProducts(v, t) {

            $('body  ul').find('li[id="thisProduct"]').each(function () {
                $(this).css('display', 'none');
            });


            if (t == 'sub') {
                if (all[0].indexOf(v) !== -1) {
                    all[0].splice(all[0].indexOf(v), 1);
                } else {
                    all[0].push(v);
                }
            }
            if (t == 'child') {
                if (all[1].indexOf(v) !== -1) {
                    all[1].splice(all[1].indexOf(v), 1);
                } else {
                    all[1].push(v);
                }
            }
            if (t == 'brand') {
                if (all[2].indexOf(v) !== -1) {
                    all[2].splice(all[2].indexOf(v), 1);
                } else {
                    all[2].push(v);
                }
            }


            if (all[0].length == 1) {
                //console.log('one');
                $('body  ul').find('li[id="thisProduct"]').each(function () {
                    // $(this).css('display', 'none');
                    if ($(this).is(function () {
                        return $(this).data('sub') == all[0][0] ? true : false;
                    })) {
                        $(this).css('display', 'block');
                    }
                });

            } else if (all[0].length > 1) {

                all[0].forEach(function (data) {
                    // console.log('foreac');
                    $('body  ul').find('li[id="thisProduct"]').each(function () {
                        //   $(this).css('display', 'none');
                        if ($(this).is(function () {
                            return $(this).data('sub') == data ? true : false;
                        })) {
                            $(this).css('display', 'block');
                        }
                    });
                })

            }

//------------------------------
            if (all[1].length == 1) {
                //console.log('one');
                $('body  ul').find('li[id="thisProduct"]').each(function () {
                    // $(this).css('display', 'none');
                    if ($(this).is(function () {
                        return $(this).data('child') == all[1][0] ? true : false;
                    })) {
                        $(this).css('display', 'block');
                    }
                });

            } else if (all[1].length > 1) {

                all[1].forEach(function (data) {
                    //console.log('foreac');
                    $('body  ul').find('li[id="thisProduct"]').each(function () {
                        // $(this).css('display', 'none');
                        if ($(this).is(function () {
                            return $(this).data('child') == data ? true : false;
                        })) {
                            $(this).css('display', 'block');
                        }
                    });
                })

            }
            //-------------------------
            if (all[2].length == 1) {
                //console.log('one');
                $('body  ul').find('li[id="thisProduct"]').each(function () {
                    // $(this).css('display', 'none');
                    if ($(this).is(function () {
                        return $(this).data('brand') == all[2][0] ? true : false;
                    })) {
                        $(this).css('display', 'block');
                    }
                });

            } else if (all[2].length > 1) {

                all[1].forEach(function (data) {
                    // console.log('foreac');
                    $('body  ul').find('li[id="thisProduct"]').each(function () {
                        // $(this).css('display', 'none');
                        if ($(this).is(function () {
                            return $(this).data('brand') == data ? true : false;
                        })) {
                            $(this).css('display', 'block');
                        }
                    });
                })

            }


            if (all[0].length == 0 &&
                all[1].length == 0 &&
                all[2].length == 0
            ) {
                $('body  ul').find('li[id="thisProduct"]').each(function () {
                    $(this).css('display', 'block');
                });
            }


        }


    </script>

@endsection
