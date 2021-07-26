@extends('backend.master')
@section('content')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">Partners</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
                            <i class="fe fe-plus"></i>Add New Partner
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
                                    <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Add New Prtner</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <form action="{{route('theme.partner.create')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputEmail4"><b>Link</b></label>
                                                <input type="url" class="form-control" name="partner_link" placeholder="Link" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label><b>Image</b></label>
                                                <input type="file" class="dropify" name="partner_image" required/>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"> Create Partner</button>
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
                        <th>{{ln('link')}}</th>
                        <th>{{ln('photo')}}</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $number=0; @endphp
                    @if(isset($partner))
                        @foreach($partner as $key)
                            <tr>
                                <td>{{$number+1}}</td>
                                @php $number++; @endphp
                                <td>{{$key->partner_link}}</td>
                                <td><img src="{{URL::to($key->partner_image)}}" style="width:100px;"></td>
                                <td>
                                    <a type="button" onclick="edit_partner({{ $key->partner_id}})"
                                       class="btn btn-primary" data-toggle="modal"
                                       data-target="#exampleModalCenter1">
                                        Edit
                                    </a>
                                    <a onclick="confirm('{{ URL::to('theme/partner/delete/'.$key->partner_id) }}')"
                                       class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL.</th>
                        <th>{{ln('link')}}</th>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="container-fluid p-4">
                        <form action="{{ route('theme.partner.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail4"><b>Link</b></label>
                                <input type="url" class="form-control" name="partner_link" id="partner_link" />
                                <input type="hidden" class="form-control" name="partner_id" id="partner_id" />
                            </div>
                            <br>

                            <div class="form-group">
                                <label><b>Image</b></label> <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img id="old_image" style="width:100px;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" class="dropify" name="partner_image" />
                                    </div>
                                </div>

                            </div>


                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update Partner</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function edit_partner(partner_id) {
        $.ajax({
            type: "GET",
            url: "<?php echo env('APP_URL'); ?>theme/partner/edit/" + partner_id,
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) {
                console.log(data);
                var id = "", linkk = "", imag = "";

                id = data.partner_id;
                linkk = data.partner_link;
                imag = data.partner_image;

                document.getElementById("partner_id").value = id;
                document.getElementById("partner_link").value = linkk;
                $('#old_image').attr('src','{{asset('')}}'+imag);

            }
        });
    }

</script>
