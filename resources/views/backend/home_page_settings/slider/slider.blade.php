@extends('backend.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5>
                    <strong class="mr-3">{{ ln('sliders') }}</strong>
                </h5>
            </div>
            <div class="col-md-6">

                <a href="{{route('home.slider.index')}}" class="btn btn-primary" style="float: right;">
                    <i class="fe fe-plus"></i> {{ ln('add') }} {{ ln('new') }} {{ ln('slider') }}
                </a>
            </div>
        </div>
    </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <table class="table table-hover nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>{{ ln('sl') }}</th>
                                <th>{{ ln('title') }}</th>
                                <th> {{ ln('sub_title') }}</th>
                                <th>{{ ln('description') }}</th>
                                <th>{{ ln('image') }}</th>
                                <th>{{ ln('action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($slider))
                            <?php $number = 0; ?>
                            @foreach($slider as $key)
                            <tr>
                                <td>{{ $number+1 }}</td>
                                <?php $number++; ?>
                                <td>{{$key->title}}</td>
                                <td>{{$key->subtitle}}</td>
                                <td>{{$key->subtitle}}</td>
                                <td><img src="{{URL::to($key->slider_image)}}" style="width:120px;height: 80px;"></td>
                                <td><a href="{{URL::to('theme/slider/edit/'.$key->slider_id)}}">
                                        <button class="btn btn-primary">{{ ln('edit') }}</button>
                                    </a>
                                    <a onclick="confirm('{{URL::to('theme/slider/delete/'.$key->slider_id)}}')">
                                        <button class="btn btn-danger">{{ ln('delete') }}</button>
                                    </a></td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
