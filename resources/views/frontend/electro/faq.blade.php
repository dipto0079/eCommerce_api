@extends('frontend.electro.extra_page.master')
@include('Develop.develop')
@section('content')
    <?php
    $url = env('APP_URL').'api/faq';
    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_HEADER, false);
    $result = curl_exec($cSession);
    $data = json_decode($result);
    curl_close($cSession);
    //dd($data);
    ?>
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <div class="container">
        <div class="mb-12 text-center">
            <h1>Frequently Asked Questions</h1>
            <p class="text-gray-44">This Agreement was last modified on 18th february 2019</p>
        </div>
        <div class="border-bottom border-color-1 mb-8 rounded-0">
            <h3 class="section-title mb-0 pb-2 font-size-25">Shipping Information</h3>
        </div>
{{--        <div class="row mb-8">--}}
{{--            @foreach($data as $v_faq)--}}
{{--            <div class="col-lg-6 mb-5 mb-lg-8">--}}
{{--                <h3 class="font-size-18 font-weight-semi-bold text-gray-39 mb-4">{{$v_faq->title}}</h3>--}}
{{--                <p class="text-gray-90"> <?php echo $v_faq->description?></p>--}}
{{--            </div>--}}

{{--            @endforeach--}}

{{--        </div>--}}
        <div id="basicsAccordion" class="mb-12">
            <!-- Card -->
            @foreach($data as $v_faq)
            <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1 rounded-0">
                <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingOne">
                    <h5 class="mb-0">
                        <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn py-3 font-size-25 border-0"
                                data-toggle="collapse"
                                data-target="#basicsCollapseOner"
                                aria-expanded="true"
                                aria-controls="basicsCollapseOner">
                            {{$v_faq->title}}

                            <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                        </button>
                    </h5>
                </div>
                <div id="basicsCollapseOner" class="collapse show"
                     aria-labelledby="basicsHeadingOne"
                     data-parent="#basicsAccordion">
                    <div class="card-body pl-0 pb-8">
                        <p class="mb-0"><?php echo $v_faq->description ?></p>
                    </div>
                </div>
            </div>
        @endforeach
            <!-- End Card -->
        </div>



        <!-- End Brand Carousel -->
    </div>
@endsection
