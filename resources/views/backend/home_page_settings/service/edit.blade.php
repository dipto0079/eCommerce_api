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
                                        <strong class="mr-3 text-center">{{ ln('service') }}</strong>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-5">
                                        <form action="{{URL::to('theme/service/update/'.$service_edit->service_id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                            <label for="inputEmail4"><b>{{ ln('title') }} *</b></label>
                                            <input type="text" name="service_title" value="{{$service_edit->service_title}}" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail4"><b>{{ ln('description') }}</b></label>
                                            <textarea class="form-control" name="service_description" rows="5" placeholder="Type description" required>{{$service_edit->service_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><b>{{ ln('service') }} {{ ln('image') }} *</b></label> <br>
                                            <img src="{{URL::to($service_edit->service_image)}}" style="width:500px; height: 200px;" >
                                            <br>
                                            <input type="file" class="dropify" name="service_image" />
                                            <input type="hidden" name="old_image" value="{{$service_edit->service_image}}">
                                            <p>Prefered Size: (1920x800) or Square Sized Image</p>

                                        </div>
                                        <button type="submit" class="btn btn-success" style="float: right;">{{ ln('update') }} {{ ln('service') }}</button>
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
