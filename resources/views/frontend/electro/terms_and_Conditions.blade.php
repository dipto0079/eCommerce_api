@extends('frontend.electro.extra_page.master')
@include('Develop.develop')
@section('content')
    <?php
    $url = env('APP_URL').'api/terms';
    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_HEADER, false);
    $result = curl_exec($cSession);
    $data = json_decode($result);
    curl_close($cSession);
    //dd($data);
    ?>
    <div class="container">
        <div class="mb-12 text-center">
            <h1>Terms and Conditions</h1>
            <p class="text-gray-44">This Agreement was last modified on 18th february 2019</p>
        </div>
        <div class="mb-10">
            <h3 class="mb-6 pb-2 font-size-25">{{$data->title}}</h3>
            <ol>
               <?php echo $data->descriptions ?>
            </ol>
        </div>
    </div>


@endsection
