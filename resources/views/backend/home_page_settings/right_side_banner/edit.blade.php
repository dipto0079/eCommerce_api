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
                                <strong class="mr-3 text-center">Edit Right Banner</strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5">
                                <form action="{{route('theme.rigth_banner.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>Title</b></label>
                                        <input type="text" class="form-control" value="{{$right_banner_edit->rigth_banner_title}}" name="rigth_banner_title" />
                                        <input type="hidden" class="form-control" name="rigth_banner_id" value="{{$right_banner_edit->rigth_banner_id}}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="subtitle_text">Description</label>
                                        <textarea class="form-control" name="right_banner_description" rows="3" >{{$right_banner_edit->right_banner_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>Link</b></label>
                                        <input type="url" class="form-control" name="right_banner_link" value="{{$right_banner_edit->right_banner_link}}" placeholder="Link" />
                                    </div>
                                    <div class="form-group">
                                        <label><b>Featured Image *</b></label> <br>
                                        <img src="{{URL::to($right_banner_edit->right_banner_image)}}" style="width:500px; height: 200px;" >
                                        <input type="file" class="dropify" name="right_banner_image" />
                                        <input type="hidden" name="old_image" value="{{$right_banner_edit->right_banner_image}}">
                                        <small>Prefered Size: (600x600) or Square Sized Image</small>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="float: right;">Update Banner</button>
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
