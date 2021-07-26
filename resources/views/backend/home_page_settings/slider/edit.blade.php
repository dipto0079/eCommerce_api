@extends('backend.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form action="{{URL::to('theme/slider/update/'.$slider_edit->slider_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($slider_edit))
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>
                                    <strong class="mr-3 text-center">{{ ln('title') }}</strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5">
                                    <div class="form-group">
                                        <label class="control-label">{{ ln('title') }}*</label>
                                        <small>(In Any Language)</small>
                                        <input type="text" name="title" class="form-control" value="{{$slider_edit->title}}" required/>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label" for="subtitle_size"><b>{{ ln('font_size') }} *</b><span> (px)</span></label>
                                                <input class="form-control" type="number" name="title_font" value="{{$slider_edit->title_font}}" min="1" required>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="control-label" for="subtitle_color"><b>Font Color *</b></label>--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input type="color" class="form-control" value="#563d7c" name="title_color">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>
                                    <strong class="mr-3">{{ ln('sub_title') }} </strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5">
                                    <div class="form-group">
                                        <label class="control-label">{{ ln('sub_title') }} *</label>
                                        <small>(In Any Language)</small>
                                        <input type="text" name="subtitle" class="form-control" value="{{$slider_edit->subtitle}}" required/>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label"><b>{{ ln('font_size') }}  *</b><span> (px)</span></label>
                                                <input class="form-control" type="number" name="subtitle_font" value="{{$slider_edit->subtitle_font}}" min="1" required>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="control-label" for="subtitle_color"><b>Font Color *</b></label>--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input type="color" class="form-control" value="#563d7c" name="subtitle_color">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>
                                    <strong class="mr-3">{{ ln('description') }}</strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5">
                                    <div class="form-group">
                                        <label class="control-label" for="subtitle_text">{{ ln('description') }}*</label>
                                        <textarea class="form-control" name="description" rows="5"  placeholder="{{ ln('enter') }} {{ ln('description') }}" required>{{$slider_edit->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label" for="subtitle_size"><b>{{ ln('font_size') }}  *</b><span> (px)</span></label>
                                                <input class="form-control" type="number" name="description_font" min="1" value="{{$slider_edit->description_font}}" required>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="control-label" for="subtitle_color"><b>Font Color *</b></label>--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input type="color" class="form-control" value="#563d7c" name="description_color">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><b>{{ ln('slider') }}  {{ ln('price') }}*</b><span></span></label>
                                        <input class="form-control" type="number" name="slider_price" value="{{$slider_edit->slider_price}}" min="1">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label"><b>{{ ln('button') }} {{ ln('name') }} *</b></label>
                                                <input class="form-control" type="text" name="slider_button_name" value="{{$slider_edit->slider_button_name}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label"><b>{{ ln('button') }} {{ ln('link') }} *</b></label>
                                                <input class="form-control" type="url" name="slider_button_link" value="{{$slider_edit->slider_button_link}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Slider Image</b></label> <br>
                                        <img src="{{URL::to($slider_edit->slider_image)}}" style="width:500px; height: 200px;" >
                                        <br>
                                        <input type="file" class="dropify" name="slider_image"/>
                                        <input type="hidden" name="old_image" value="{{$slider_edit->slider_image}}">
                                        <p>Prefered Size: (1920x800) or Square Sized Image</p>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="float: right;">{{ ln('update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        @endif
            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
