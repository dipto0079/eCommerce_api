@extends('backend.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                <strong class="mr-3 text-center">{{ ln('edit') }}  {{ ln('banner') }} </strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5">
                                <form action="{{URL::to('theme/banner/update/'.$banner_edit->banner_id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>{{ ln('title') }} </b></label>
                                        <input type="text" class="form-control" value="{{$banner_edit->banner_title}}" name="banner_title" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="subtitle_text">{{ ln('description') }} </label>
                                        <textarea class="form-control" name="banner_description" rows="3" >{{$banner_edit->banner_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>{{ ln('link') }} </b></label>
                                        <input type="url" class="form-control" name="banner_link" value="{{$banner_edit->banner_link}}" placeholder="{{ ln('link') }} " />
                                    </div>
                                    <div class="form-group">
                                        <label><b>{{ ln('featured') }}  {{ ln('image') }}  *</b></label> <br>
                                        <img src="{{URL::to($banner_edit->banner_image)}}" style="width:500px; height: 200px;" >
                                        <input type="file" class="dropify" name="banner_image" />
                                        <input type="hidden" name="old_image" value="{{$banner_edit->banner_image}}">
                                        <small>Prefered Size: (600x600) or Square Sized Image</small>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="float: right;">{{ ln('update') }}  {{ ln('banner') }} </button>
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
