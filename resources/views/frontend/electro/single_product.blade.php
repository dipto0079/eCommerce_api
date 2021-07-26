@extends('frontend.electro.extra_page.master')
@include('Develop.develop')
@section('content')
    <?php
    $url = env('APP_URL') . 'api/product/' . $id;
    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_HEADER, false);
    $result = curl_exec($cSession);
    $data = json_decode($result);
    curl_close($cSession);
    //dd($data);
    ?>

    @if(isset($data))
        <div style="background-color: white;
position: fixed;
left: 50%;
bottom: 40%;
height: 500px;
width: 500px;  opacity: 0.0;" id="demo-container">
            <div style="opacity:1;color: black;"> This container is to show that the zoom can be positioned into any on
                screen element
            </div>
        </div>
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="shop.html">
                                    @if (isset($data->subcategory))
                                        {{$data->subcategory}}
                                    @else
                                        Data Not Found
                                    @endif
                                </a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="shop.html">
                                    @if(isset($data->childcategory))
                                        {{$data->childcategory}}
                                    @endif

                                </a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                @if(isset($data->name))
                                    {{$data->name}}
                                @endif
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <!-- Single Product Body -->
            <div class="mb-14">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">

                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" style="display: block"
                             data-infinite="true"
                             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                             data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                             data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                             data-nav-for="#sliderSyncingThumb">
                            <?php $i = 0; ?>
                            @if(isset($data->gallery ))
                                @foreach ($data->gallery as $item)

                                    <div class="js-slide">
                                        <img class="img-fluid" id="zoom_<?php echo $i; ?>" src="{{URL::to($item)}}"
                                             data-zoom-image="{{URL::to($item)}}" alt="Image Description"
                                             style="width: 500px;height:450px; padding:5px">
                                    </div>
                                    <?php $i++; ?>
                                @endforeach

                            @endif
                        </div>


                        <div id="sliderSyncingNav1" class="js-slick-carousel u-slick mb-1"
                             style="display: none; visibility: hidden;"
                             data-infinite="true"
                             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                             data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                             data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                             data-nav-for="#sliderSyncingThumb1">
                            <?php $i = 0; ?>

                            @if(isset($data->color_image))
                                @foreach ($data->color_image as $item)

                                    <div class="js-slide">
                                        <img class="img-fluid" id="zoomcolor<?php echo $i; ?>" src="{{URL::to($item)}}"
                                             data-zoom-image="{{URL::to($item)}}" alt="Image Description"
                                             style="width: 500px;height:450px; padding:5px">
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            @endif

                        </div>

                        <div id="sliderSyncingThumb" id=""
                             class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                             data-infinite="true"
                             data-slides-show="5"
                             data-is-thumbs="true"
                             data-nav-for="#sliderSyncingNav">
                            @if(isset($data->gallery))
                                @foreach ($data->gallery as $item)

                                    <div class="js-slide" onclick="gallery()" style="cursor: pointer;">
                                        <img class="img-fluid" src="{{URL::to($item)}}" alt="Image Description"
                                             style="height: 45px; width:56px;">
                                    </div>
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                        <div class="mb-2">

                            <a href="#"
                               class="font-size-12 text-gray-5 mb-2 d-inline-block">{{$data->childcategory}}</a>

                            <h2 class="font-size-25 text-lh-1dot2">{{($data->name)}}</h2>

                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="text-warning mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>
                                    <span class="text-secondary font-size-13">(3 customer reviews)</span>
                                </a>
                            </div>
                            <div class="mb-2">

                                <?php echo $data->short_description; ?>

                            </div>
                            <br>
                            <br>

                            <p><strong>SKU</strong>: {{($data->code)}} </p>

                            <div class="mb-2">


                                <div id="sliderSyncingThumb1"
                                     class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                                     data-infinite="true"
                                     data-slides-show="5"
                                     data-is-thumbs="true"
                                     data-nav-for="#sliderSyncingNav1">
                                    <?php
                                    $i = 0;
                                    foreach ($data->color_name as $keys) {
                                    ?>

                                    <div class="js-slide" onclick="color()" style="cursor: pointer;"
                                         data-toggle="tooltip" data-placement="top" title="<?php echo $keys; ?>">
                                        <div class="d-flex justify-content-center">
                                            <div
                                                style="background-color:{{($data->color[$i])}}; cursor: pointer; border-radius:30px;
                                                    height: 30px; width:30px;  border: 5px solid rgb(181, 236, 234); padding:0">
                                            <!-- <img src="{{$data->color_image[$i]}}" style="height: 0;width:0" alt=""> -->
                                            </div>
                                        </div>


                                        {{-- <strong style="color: rgb(181, 236, 234); text-align:center"> </strong> --}}
                                    </div>

                                    <?php   $i = $i + 1;   } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                        <div class="mb-2">
                            <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                                <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
                                    Availability: <span class="text-green font-weight-bold">26 in stock</span></div>
                                <div class="mb-3">
                                    <div class="font-size-36">{{$data->Currency}} {{$data->selling_price}}</div>
                                </div>

                                {{-- <div class="mb-3" >
                                    <h6 class="font-size-14">Quantity</h6>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center" id="iquantity">
                                            <div class="col" >
                                                <input
                                                    class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                    type="text" value="0">
                                            </div>
                                            <div class="col-auto pr-1">
                                                <a onclick="add_to_card('{{$data->id}}', '{{$data->name }}','{{$data->image }}','{{$data->selling_price }}' );"
                                                    class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"

                                                    href="javascript:;">
                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                </a>
                                                <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                   href="javascript:;">
                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Quantity -->
                                </div> --}}

                                {{-- <div class="mb-3">
                                    <h6 class="font-size-14">Color</h6>
                                    <!-- extra popup -->

                                    <!-- Select -->

                                    <select class="js-select selectpicker dropdown-select btn-block col-12 px-0"
                                            data-style="btn-sm bg-white font-weight-normal py-2 border">
                                            @foreach ($data->color_name as $item)
                                            <option value="{{$item}}" selected>{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <!-- End Select -->
                                </div> --}}
                                <div class="mb-2 pb-0dot5">
                                    <a
                                        onclick="add_to_card('{{$data->id}}', '{{$data->name }}','{{$data->image }}','{{$data->selling_price }}' );"
                                        class="btn btn-block btn-primary"><i
                                            class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{URL::to('dashboard/checkout/'.$data->id)}}"
                                       class="btn btn-block btn-dark">Buy Now</a>
                                </div>
                                <div class="flex-content-center flex-wrap">
                                    <a href="#"  onclick="add_to_wish('{{$data->id}}' )" class="text-gray-6 font-size-13 mr-2"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    <a href="#" class="text-gray-6 font-size-13 ml-2"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product Body -->
        </div>



        <div class="bg-gray-7 pt-6 pb-3 mb-6">
            <div class="container">
                <div class="js-scroll-nav">
                    <div class="bg-white pt-4 pb-6 px-xl-11 px-md-5 px-4 mb-6">
                        <div class="mb-8">
                            <div class="position-relative position-md-static px-md-6">
                                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                                    id="pills-tab-8" role="tablist">

                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link active" id="Jpills-one-example1-tab" data-toggle="pill"
                                           href="#Jpills-one-example1" role="tab" aria-controls="Jpills-one-example1"
                                           aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill"
                                           href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1"
                                           aria-selected="false">Specification</a>
                                    </li>
                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill"
                                           href="#Jpills-three-example1" role="tab"
                                           aria-controls="Jpills-three-example1" aria-selected="false">Reviews</a>
                                    </li>
                                    {{-- <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                    <a class="nav-link " id="Jpills-four-example1-tab" data-toggle="pill" href="#Jpills-four-example1" role="tab" aria-controls="Jpills-foure-example1" aria-selected="false">Accessories</a>
                                </li> --}}
                                </ul>
                            </div>
                            <!-- Tab Content -->
                            <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                                <div class="tab-content" id="Jpills-tabContent">

                                    <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel"
                                         aria-labelledby="Jpills-one-example1-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="pt-lg-8 pt-xl-10">
                                                    <?php echo $data->long_description;?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <img class="img-fluid mr-n4 mr-lg-n10" src="{{URL::to($data->image)}}"
                                                     alt="Image Description" style="height: 500px; width:600px">
                                            </div>
                                            {{-- <div class="col-md-6 text-left">
                                                <img class="img-fluid ml-n4 ml-lg-n10" src="../../assets/img/580X580/img2.jpg" alt="Image Description">
                                            </div> --}}
                                            {{-- <div class="col-md-6 align-self-center">
                                                <div class="pt-lg-8 pt-xl-10 text-right">
                                                    <h3 class="font-size-24 mb-3">Inteligent Bass</h3>
                                                    <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                                    <h3 class="font-size-24 mb-3">Battery Life</h3>
                                                    <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong>
                                                <span class="sku">{{$data->code}}</span></li>
                                            <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/
                                            </li>
                                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Category:</strong>
                                                <a href="#" class="text-blue">{{$data->childcategory}}</a></li>
                                            {{-- <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li> --}}
                                            {{-- <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Tags:</strong> <a href="#" class="text-blue">Fast</a>, <a href="#" class="text-blue">Gaming</a>, <a href="#" class="text-blue">Strong</a></li> --}}
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel"
                                         aria-labelledby="Jpills-two-example1-tab">
                                        <div class="mx-md-5 pt-1">
                                            <div class="table-responsive mb-4">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($data->specification as $keys) {
                                                    ?>
                                                    <tr>
                                                        <th class="px-4 px-xl-5 border-top-0"><?php echo $keys; ?></th>
                                                        <td class="border-top-0">{{$data->specification_value[$i]}}</td>
                                                    </tr>
                                                    <?php
                                                    $i = $i + 1;
                                                    } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                                         aria-labelledby="Jpills-three-example1-tab">
                                        <div class="row mb-8">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <h3 class="font-size-18 mb-6">Based on 3 reviews</h3>
                                                    <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                                                    <div class="text-lh-1">overall</div>
                                                </div>

                                                <!-- Ratings -->
                                                <ul class="list-unstyled">
                                                    <li class="py-1">
                                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                                           href="javascript:;">
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="text-warning text-ls-n2 font-size-16"
                                                                     style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="progress ml-xl-5"
                                                                     style="height: 10px; width: 200px;">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: 100%;" aria-valuenow="100"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <span class="text-gray-90">205</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                                           href="javascript:;">
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="text-warning text-ls-n2 font-size-16"
                                                                     style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="progress ml-xl-5"
                                                                     style="height: 10px; width: 200px;">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: 53%;" aria-valuenow="53"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <span class="text-gray-90">55</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                                           href="javascript:;">
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="text-warning text-ls-n2 font-size-16"
                                                                     style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="progress ml-xl-5"
                                                                     style="height: 10px; width: 200px;">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: 20%;" aria-valuenow="20"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <span class="text-gray-90">23</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                                           href="javascript:;">
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="text-warning text-ls-n2 font-size-16"
                                                                     style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="progress ml-xl-5"
                                                                     style="height: 10px; width: 200px;">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: 0%;" aria-valuenow="0"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <span class="text-muted">0</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                                           href="javascript:;">
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="text-warning text-ls-n2 font-size-16"
                                                                     style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-md-0">
                                                                <div class="progress ml-xl-5"
                                                                     style="height: 10px; width: 200px;">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: 1%;" aria-valuenow="1"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <span class="text-gray-90">4</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- End Ratings -->
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="font-size-18 mb-5">Add a review</h3>
                                                <!-- Form -->
                                                <form class="js-validate">
                                                    <div class="row align-items-center mb-4">
                                                        <div class="col-md-4 col-lg-3">
                                                            <label for="rating" class="form-label mb-0">Your
                                                                Review</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                            <a href="#" class="d-block">
                                                                <div class="text-warning text-ls-n2 font-size-16">
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="js-form-message form-group mb-3 row">
                                                        <div class="col-md-4 col-lg-3">
                                                            <label for="descriptionTextarea" class="form-label">Your
                                                                Review</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                        <textarea class="form-control" rows="3" id="descriptionTextarea"
                                                                  data-msg="Please enter your message."
                                                                  data-error-class="u-has-error"
                                                                  data-success-class="u-has-success"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="js-form-message form-group mb-3 row">
                                                        <div class="col-md-4 col-lg-3">
                                                            <label for="inputName" class="form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input type="text" class="form-control" name="name"
                                                                   id="inputName" aria-label="Alex Hecker" required
                                                                   data-msg="Please enter your name."
                                                                   data-error-class="u-has-error"
                                                                   data-success-class="u-has-success">
                                                        </div>
                                                    </div>
                                                    <div class="js-form-message form-group mb-3 row">
                                                        <div class="col-md-4 col-lg-3">
                                                            <label for="emailAddress" class="form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input type="email" class="form-control" name="emailAddress"
                                                                   id="emailAddress" aria-label="alexhecker@pixeel.com"
                                                                   required
                                                                   data-msg="Please enter a valid email address."
                                                                   data-error-class="u-has-error"
                                                                   data-success-class="u-has-success">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="offset-md-4 offset-lg-3 col-auto">
                                                            <button type="submit"
                                                                    class="btn btn-primary-dark btn-wide transition-3d-hover">
                                                                Add Review
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- End Form -->
                                            </div>
                                        </div>
                                        <!-- Review -->
                                        <div class="border-bottom border-color-1 pb-4 mb-4">
                                            <!-- Review Rating -->
                                            <div
                                                class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <!-- End Review Rating -->

                                            <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et
                                                ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien
                                                nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum
                                                ante et euismod.</p>

                                            <!-- Reviewer -->
                                            <div class="mb-2">
                                                <strong>John Doe</strong>
                                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                            </div>
                                            <!-- End Reviewer -->
                                        </div>
                                        <!-- End Review -->
                                        <!-- Review -->
                                        <div class="border-bottom border-color-1 pb-4 mb-4">
                                            <!-- Review Rating -->
                                            <div
                                                class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                </div>
                                            </div>
                                            <!-- End Review Rating -->

                                            <p class="text-gray-90">Pellentesque habitant morbi tristique senectus et
                                                netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis
                                                odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula,
                                                placerat ac augue id, volutpat porta dui.</p>

                                            <!-- Reviewer -->
                                            <div class="mb-2">
                                                <strong>Anna Kowalsky</strong>
                                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                            </div>
                                            <!-- End Reviewer -->
                                        </div>
                                        <!-- End Review -->
                                        <!-- Review -->
                                        <div class="pb-4">
                                            <!-- Review Rating -->
                                            <div
                                                class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <!-- End Review Rating -->

                                            <p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus
                                                accumsan tellus, nec ultricies nulla sollicitudin eget. Donec feugiat
                                                orci vestibulum porttitor sagittis.</p>

                                            <!-- Reviewer -->
                                            <div class="mb-2">
                                                <strong>Peter Wargner</strong>
                                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                            </div>
                                            <!-- End Reviewer -->
                                        </div>
                                        <!-- End Review -->
                                    </div>

                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script>
        // window.onload = (event) => { count_wishlist_data();}


        function add_to_wish(id) {
            $.ajax({
                type: "GET",
                url: "add_to_wish_ajax/" + id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert("Login and make Wishlist: " + errorMessage);
                },
                success: function(data) {
                    if (data.result == true) {
                        alert('data  insert successfully');
                    } else {
                        alert('data already insert');
                    }
                    //alert('not');

                    count_wishlist_data();
                }
            });
        }
        // *
        // *
        // *
        // wishList_count kora asa only show korta hoba
        //

        function count_wishlist_data() {
            $.ajax({
                type: "GET",
                url: "count_wish_ajax",
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert(errorMessage);
                },
                success: function(data) {
                    document.getElementById("count_wishlist").innerHTML = data.result;

                    //alert('show');
                }
            });
        }

        // function add_to_quick(id)
        // {
        // 	$.ajax({
        // 		type: "GET",
        // 		url: "add_to_quick_ajax/" + id,
        // 		dataType: 'JSON',
        // 		error: function(xhr, status, error) {
        // 			var errorMessage = xhr.status + ': ' + xhr.statusText;
        // 			alert(errorMessage);
        // 		},
        // 		success: function(data) {

        // 			document.getElementById("name").innerHTML = data.product_name;
        // 			document.getElementById("price").innerHTML = data.total_price;
        // 			document.getElementById("brand_name").innerHTML = data.brand_name;
        // 			document.getElementById("description").innerHTML = data.short_description;
        // 			document.getElementById("img").src ="{{asset('/frontend_upload_asset/product/product_image')}}/"+ data.product_image;


        // 		}
        // 	});
        // }
    </script>

    <script>
        function color() {

            var e = $('#sliderSyncingNav');
            if (e.css('display') == 'block') {
                e.css('display', 'none');
                $('div[id="sliderSyncingNav1"]').css('display', 'block');
            }


        }

        function gallery() {
            if ($('#sliderSyncingNav').css('display') == 'none') {
                $('div[id="sliderSyncingNav1"]').css('display', 'none');
                $('#sliderSyncingNav').css('display', 'block');
            }

        }
    </script>
    <script src="{{asset('frontend/electro/js/components/jquery.ez-plus.js')}}"></script>
    <script>

        <?php
        $i = 0;
        foreach($data->gallery as $item)
        { ?>
        $("#zoom_<?php echo $i; ?>").ezPlus({
            scrollZoom: true,
            zoomWindowPosition: "demo-container",
            zoomWindowHeight: 500,
            zoomWindowWidth: 500,
            borderSize: 0,
            easing: true
        });
        <?php $i++; }  ?>
    </script>

    <script>
        <?php
        $i = 0;
        foreach($data->color_image as $item)
        { ?>
        $("#zoomcolor<?php echo $i; ?>").ezPlus({
            scrollZoom: true,
            zoomWindowPosition: "demo-container",
            zoomWindowHeight: 500,
            zoomWindowWidth: 500,
            borderSize: 0,
            easing: true
        });
        <?php $i++; }  ?>
    </script>
@endsection
