@extends('backend.master')
@section('content')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">Right Side Banner</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
                            <i class="fe fe-plus"></i> Add Right Banner
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div
                    class="modal fade"
                    id="exampleModalCenter"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true"
                >

                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Right Side Banner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <form action="{{route('theme.rigth_banner.create')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <br>
                                        <div class="form-group">
                                            <label for="inputEmail4"><b>Title</b></label>
                                            <input type="text" class="form-control" name="rigth_banner_title" placeholder="Enter Banner Name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="subtitle_text">Description*</label>
                                            <textarea class="form-control" name="right_banner_description" rows="3"  placeholder="Enter Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail4"><b>Link *</b></label>
                                            <input type="url" class="form-control" name="right_banner_link" placeholder="Link" />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Featured Image *</b></label> <br>
                                            <input type="file" class="dropify" name="right_banner_image" />
                                            <small>Prefered Size: (600x600) or Square Sized Image</small>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success"> Create Banner</button>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover nowrap" id="example1">
                    <thead class="thead-default">
                    <tr>
                        <th>SL.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Featured Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($right_banner))
                        <?php $number = 0; ?>
                        @foreach($right_banner as $key)
                            <tr>
                                <td>{{ $number+1 }}</td>
                                <?php $number++; ?>
                                <td>{{$key->rigth_banner_title}}</td>
                                <td>{{$key->right_banner_description}}</td>
                                <td>{{$key->right_banner_link}}</td>
                                <td><img src="{{URL::to($key->right_banner_image)}}" style="width:200px;height: 100px;"></td>
                                <td><a href="{{URL::to('theme/rigth_banner/edit/'.$key->rigth_banner_id)}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a onclick="confirm('{{URL::to('theme/rigth_banner/delete/'.$key->rigth_banner_id)}}')">
                                        <button class="btn btn-danger">Delete</button>
                                    </a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Featured Image</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

