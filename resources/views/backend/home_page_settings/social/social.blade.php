@extends('backend.master')
@section('content')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">Social Links</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
                            <i class="fe fe-plus"></i>Add Link
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>

                <div
                    class="modal fade"
                    id="exampleModalCenter"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true"
                >
                    <div class="form">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Add Social Link</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <form action="{{route('theme.reviews.create')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputEmail4"><b>Title *</b></label>
                                                <input type="Text" class="form-control" name="social_title" placeholder="Title"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4"><b>Link</b></label>
                                                <input type="url" class="form-control" name="partner_link" placeholder="Link" />
                                            </div>

                                            <div class="form-group">
                                                <label><b>Image</b></label>
                                                <input type="file" class="dropify" name="review_image" />
                                                <small>Prefered Size: (600x600) or Square Sized Image</small>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"> Create Reviews</button>
                                        </form>
                                        <br>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover nowrap" id="example1">
                    <thead class="thead-default">
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Review</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $number=0; @endphp
{{--                    @if(isset($review))--}}
{{--                        @foreach($review as $key)--}}
{{--                            <tr>--}}
{{--                                <td>{{$number+1}}</td>--}}
{{--                                @php $number++; @endphp--}}
{{--                                <td>{{$key->review_title}}</td>--}}
{{--                                <td>{{$key->review_subtitle}}</td>--}}
{{--                                <td>{{$key->review_description}}</td>--}}
{{--                                <td><img src="{{URL::to($key->review_image)}}" style="width:50px;"></td>--}}
{{--                                <td>--}}
{{--                                    <a type="button" onclick="edit_review({{ $key->review_id}})"--}}
{{--                                       class="btn btn-primary" data-toggle="modal"--}}
{{--                                       data-target="#exampleModalCenter1">--}}
{{--                                        Edit--}}
{{--                                    </a>--}}
{{--                                    <a onclick="confirm('{{ URL::to('theme/reviews/delete/'.$key->review_id) }}')"--}}
{{--                                       class="btn btn-danger">Delete</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Review</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="container-fluid p-4">
                        <form action="{{ route('theme.reviews.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="inputEmail4"><b>Reviewr Name*</b></label>
                                <input type="text" class="form-control" name="review_title" id="review_title" required />
                                <input type="hidden" class="form-control" name="review_id" id="review_id" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>Designation</b></label>
                                <input type="Text" class="form-control" id="review_subtitle" name="review_subtitle" placeholder="Sub Title" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>Description</b></label>
                                <small>(In Any Language)</small>
                                <textarea id="review_description" name="review_description" class="form-control" placeholder="Type Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label><b>Image</b></label> <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img id="old_image" style="width:200px;height: 100px;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" class="dropify" name="review_image" />
                                    </div>
                                </div>

                            </div>


                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update Review</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
{{--<script>--}}
{{--    function edit_review(review_id) {--}}
{{--        $.ajax({--}}
{{--            type: "GET",--}}
{{--            url: "reviews/edit/" + review_id,--}}
{{--            dataType: 'JSON',--}}
{{--            error: function(xhr, status, error) {--}}
{{--                var errorMessage = xhr.status + ': ' + xhr.statusText--}}
{{--                alert(errorMessage);--}}
{{--            },--}}
{{--            success: function(data) {--}}
{{--                console.log(data);--}}
{{--                var id = "", name = "", desig = "", des = "", imga = "";--}}

{{--                id = data.review_id;--}}
{{--                name = data.review_title;--}}
{{--                desig = data.review_subtitle;--}}
{{--                des = data.review_description;--}}
{{--                imga = data.review_image;--}}

{{--                document.getElementById("review_id").value = id;--}}
{{--                document.getElementById("review_title").value = name;--}}
{{--                document.getElementById("review_subtitle").value = desig;--}}
{{--                document.getElementById("review_description").innerHTML = des;--}}
{{--                $('#old_image').attr('src','{{asset('')}}'+imga);--}}

{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--</script>--}}
@endsection
