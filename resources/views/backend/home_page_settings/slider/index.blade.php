@extends('backend.master')
@section('content')
    <br>
    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form action="{{route('theme.slider.create')}}" method="post" enctype="multipart/form-data">
            @csrf
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
                                <input type="text" name="title" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="subtitle_size"><b>{{ ln('font_size') }}*</b><span> (px)</span></label>
                                        <input class="form-control" type="number" name="title_font" value="" min="1" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="subtitle_color"><b>{{ ln('font_color') }}*</b></label>
                                        <div class="input-group">
                                            <input type="color" class="form-control" value="#563d7c" name="title_color">
                                        </div>
                                    </div>
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
                            <strong class="mr-3">{{ ln('sub_title') }}</strong>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div class="form-group">
                                <label class="control-label">{{ ln('sub_title') }}*</label>
                                <small>(In Any Language)</small>
                                <input type="text" name="subtitle" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label"><b>{{ ln('font_size') }} *</b><span> (px)</span></label>
                                        <input class="form-control" type="number" name="subtitle_font" value="" min="1" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="subtitle_color"><b>{{ ln('font_color') }} *</b></label>
                                        <div class="input-group">
                                            <input type="color" class="form-control" value="#563d7c" name="subtitle_color">
                                        </div>
                                    </div>
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
                                <textarea class="form-control" name="description" rows="5"  placeholder="{{ ln('enter') }} {{ ln('description') }}" required></textarea>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="subtitle_size"><b>{{ ln('font_size') }} *</b><span> (px)</span></label>
                                        <input class="form-control" type="number" name="description_font" min="1" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="subtitle_color"><b>{{ ln('font_color') }} *</b></label>
                                        <div class="input-group">
                                            <input type="color" class="form-control" value="#563d7c" name="description_color">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><b>{{ ln('slider') }}  {{ ln('price') }}*</b><span></span></label>
                                <input class="form-control" type="number" name="slider_price" value="" min="1" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label"><b>{{ ln('button') }} {{ ln('name') }} *</b></label>
                                        <input class="form-control" type="text" name="slider_button_name" placeholder="Button Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label"><b>{{ ln('button') }} {{ ln('link') }} *</b></label>
                                        <input class="form-control" type="url" name="slider_button_link" placeholder="Button Link" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><b>{{ ln('slider') }} {{ ln('image') }}</b></label>
                                <input type="file" class="dropify" name="slider_image"/>
                                <p>Prefered Size: (1920x800) or Square Sized Image</p>
                            </div>
                            <button type="submit" class="btn btn-success" style="float: right;">{{ ln('create') }} {{ ln('image') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-2"></div>
    </div>
@endsection
