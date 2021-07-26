@extends('backend.master')
@section('content')
<div class="container-fluid">
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>
                        <strong class="mr-3">{{ ln('sub') }}{{ ln('categrory') }} </strong>
                    </h5>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" style="float: right;">
                        {{ ln('add_new_subcategory') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                <div class="modal-dialog modal modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('add_new_subcategory') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="container-fluid p-4">
                                <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputState"><b>{{ ln('categrory') }}*</b></label>
                                        <select name="categories_id" id="inputState" class="form-control" required>
                                            <option value=""> {{ ln('categrory') }} {{ ln('select') }}</option>
                                            @if(isset($category))
                                            @foreach($category as $key)
                                            <option value="{{$key->categories_id}}">{{$key->categories_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>{{ ln('sub') }}{{ ln('categrory_name') }} *</b></label>
                                        <small>(In Any Language)</small>
                                        <input type="text" name="subcategory_name" class="form-control" id="inputEmail4" placeholder="{{ ln('enter') }} {{ ln('sub') }}{{ ln('categrory_name') }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4"><b>{{ ln('slug') }}*</b></label>

                                        <input type="text" name="subcategory_slug" class="form-control" id="inputEmail4" placeholder="{{ ln('enter') }} {{ ln('slug') }}" required />
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-outline-primary active">
                                                <input name="subcategory_status" type="radio" value="1" required />
                                                {{ ln('active') }}
                                            </label>
                                            <label class="btn btn-outline-primary">
                                                <input name="subcategory_status" type="radio" value="0" required />
                                                {{ ln('inactive') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>{{ ln('image') }}</b></label>
                                        <input type="file" class="dropify" name="subcategory_image" />
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                                    <button type="submit" class="btn btn-success"> {{ ln('create') }} {{ ln('sub') }}{{ ln('categrory') }}</button>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <table class="table table-hover nowrap" id="example1">
                            <thead>

                                <tr>
                                    <th>{{ ln('sl') }}.</th>
                                    <th>{{ ln('categrory_name') }}</th>
                                    <th>{{ ln('sub') }}{{ ln('categrory_name') }}</th>
                                    <th>{{ ln('slug') }}</th>
                                    <th> {{ ln('sub') }}{{ ln('category_image') }}</th>
                                    <th>{{ ln('status') }}</th>
                                    <th>{{ ln('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 0; ?>
                                @foreach ($subcategory as $sub)
                                <tr>
                                    <td>{{ $number+1 }}</td>
                                    <?php $number++; ?>
                                    <td>{{$sub->categories_name}}</td>
                                    <td>{{$sub->subcategory_name}}</td>
                                    <td>{{$sub->subcategory_slug}}</td>
                                    <td>
                                        @if($sub->subcategory_image)
                                        <img src="{{URL::to($sub->subcategory_image)}}" style="width:80px;height: 50px;">
                                        @else
                                        <img src="{{asset('default_image/noimage.png')}}" style="width:80px;height: 50px;">
                                        @endif
                                    </td>

                                    <td>
                                        @if($sub->subcategory_status=='1')
                                        <button class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                        @else
                                        <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <a type="button" onclick="upadte_subcategory({{ $sub->subcategory_id }})" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                                                {{ ln('edit') }}
                                            </a>
                                            <a onclick="confirm('{{ URL::to('subcategory/delete/' . $sub->subcategory_id) }}')" class="btn btn-danger">{{ ln('delete') }}</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('update') }} {{ ln('sub') }}{{ ln('categrory') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="d-flex justify-content-center">
                <div class="container-fluid p-4">
                    <form action="{{ route('subcategory.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="forn-group">
                            <label for="inputStatess"><b>{{ ln('categrory') }}*</b></label>
                            <input type="hidden" name="subcategory_id" id="scat_id">
                            <select name="categories_id" id="inputStatess" class="form-control">
                                <option value="0">{{ ln('categrory') }} {{ ln('select') }}</option>
                                @if(isset($category))
                                @foreach($category as $key)
                                <option value="{{$key->categories_id}}">{{$key->categories_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">

                            <label for="inputEmail4"><b>{{ ln('sub') }} {{ ln('categrory_name') }}*</b></label>
                            <small>(In Any Language)</small>
                            <input type="text" class="form-control" name="subcategory_name" id="subcategroy_name" placeholder="{{ ln('enter') }} {{ ln('sub') }}{{ ln('categrory_name') }}" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4"><b>{{ ln('slug') }}*</b></label>

                            <input type="text" class="form-control" name="subcategory_slug" id="subcategroy_slug" placeholder="{{ ln('enter') }} {{ ln('slug') }}" required />
                        </div>
                        <div class="form-group">
                            <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                            <input name="subcategory_status" type="radio" value="1" id="active" required />
                            <label>{{ ln('active') }}</label>
                            <input name="subcategory_status" type="radio" value="0" id="inactive" required />
                            <label>{{ ln('inactive') }}</label>
                        </div>
                        <div class="form-group">
                            <label><b>{{ ln('sub') }}{{ ln('categrory') }} {{ ln('image') }}</b></label>
                            <div class="row">
                                <div class="col-md-6">
                                    <img id="old_image" style="width:100px;">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="dropify" name="subcategory_image" />
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                        <button type="submit" class="btn btn-success">{{ ln('update') }} {{ ln('sub') }}{{ ln('categrory') }}</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    function upadte_subcategory(subcategory_id) {

        $.ajax({
            type: "GET",
            url: "<?php echo env('APP_URL'); ?>subcategory/edit/" + subcategory_id,
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) {
                console.log(data);
                var sub_id = "",
                    cid = "",
                    c_name = "",
                    name = "",
                    slug = "",
                    status = "",
                    imag = "";

                sub_id = data.subcategory_id;
                cid = data.categories_id;

                name = data.subcategory_name;
                slug = data.subcategory_slug;
                status = data.subcategory_status;
                imag = data.subcategory_image;

                document.getElementById("scat_id").value = sub_id;
                document.getElementById("subcategroy_name").value = name;
                document.getElementById("subcategroy_slug").value = slug;

                $('#old_image').attr('src', '{{asset('')}}' + imag);
                $('#inputStatess').val(cid);
                //$('option[value="' + cid + '"]').attr('selected', 'true');
                //$("#active").addClass("btn btn-outline-primary");
                //$("#inactive").addClass("btn btn-outline-primary");
                if (status == 1) {
                    $('#active').attr('checked', 'true');
                    // $("#active").addClass("btn btn-outline-primary active");
                   // $("#inactive").addClass("btn btn-outline-primary");
                } else {
                    $('#inactive').attr('checked', 'true');
                    // $("#inactive").addClass("btn btn-outline-primary active");
                   // $("#active").addClass("btn btn-outline-primary");
                }

            }
        });
    }
</script>
@endsection
