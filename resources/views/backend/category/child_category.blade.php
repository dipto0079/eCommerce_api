@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ ln('child') }} {{ ln('categrory') }} </strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            style="float: right;">
                            {{ ln('add_new_childcategory') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    <div class="modal-dialog modal modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('add_new_childcategory') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="container-fluid ">
                                    <form action="{{ route('childcategory.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputState"><b>{{ ln('categrory') }}*</b></label>
                                                    <select id="categories_idd" name="categories_id" class="form-control"
                                                        required>
                                                        <option value="">{{ ln('select') }} {{ ln('categrory') }}</option>
                                                        @if (isset($category))
                                                            @foreach ($category as $item)
                                                                <option value="{{ $item->categories_id }}">
                                                                    {{ $item->categories_name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputState"><b>{{ ln('sub') }} {{ ln('categrory') }}*</b></label>
                                                    <select id="subcategory_idd" name="subcategory_id" class="form-control"
                                                        required>
                                                        <option selected="">{{ ln('select') }} {{ ln('sub') }} {{ ln('categrory') }}</option>
                                                        {{-- @if (isset($subcategory))
                                                            @foreach ($subcategory as $item)
                                                                <option value="{{ $item->subcategory_id }}">
                                                                    {{ $item->subcategory_name }}</option>
                                                            @endforeach
                                                        @endif --}}

                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for=""><b>{{ ln('child') }} {{ ln('categrory_name') }} *</b></label>
                                            <small>(In Any Language)</small>
                                            <input type="Product Name" class="form-control" id=""
                                                name="childcategory_name" placeholder="{{ ln('enter') }} {{ ln('child') }} {{ ln('categrory_name') }}"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>{{ ln('slug') }}*</b></label>
                                            <input type="Product Name" class="form-control" id=""
                                                name="childcategory_slug" placeholder="{{ ln('enter') }} {{ ln('slug') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary active">
                                                    <input name="childcategory_status" type="radio" value="1" required />
                                                    {{ ln('active') }}</label>
                                                   <label class="btn btn-outline-primary">
                                                    <input name="childcategory_status" type="radio" value="0" required />
                                                    {{ ln('inactive') }}</label>
                                                </div>
                                            </div>
                                                <div class="col-sm-6">
                                                    <label><b>{{ ln('image') }}</b></label>
                                                    <input type="file" class="dropify"  name="childcategory_image" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                                        <button type="submit" class="btn btn-success"> {{ ln('create') }} {{ ln('child') }} {{ ln('categrory') }}</button>
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
                                        <th>{{ ln('categrory_name') }} </th>
                                        <th>{{ ln('sub') }} {{ ln('categrory_name') }} </th>
                                        <th>{{ ln('child') }} {{ ln('categrory_name') }}</th>
                                        <th>{{ ln('slug') }}</th>
                                        <th>{{ ln('child') }} {{ ln('categrory') }} {{ ln('image') }}</th>
                                        <th>{{ ln('status') }}</th>
                                        <th>{{ ln('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 0; ?>
                                    @foreach ($childcategory as $sub)
                                        <tr>
                                            <td>{{ $number + 1 }}</td>
                                            <?php $number++; ?>
                                            <td>{{ $sub->categories_name }}</td>
                                            <td>{{ $sub->subcategory_name }}</td>
                                            <td>{{ $sub->childcategory_name }}</td>
                                            <td>{{ $sub->childcategory_slug }}</td>
                                            <td>
                                                @if($sub->childcategory_image)
                                                <img src="{{URL::to($sub->childcategory_image)}}" style="width:80px;height: 50px;">
                                            @else
                                                <img src="{{asset('default_image/noimage.png')}}" style="width:80px;height: 50px;">
                                                @endif
                                            </td>

                                            <td>
                                                @if ($sub->childcategory_status == '1')
                                                    <button
                                                        class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                                @else
                                                    <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a type="button"
                                                        onclick="upadte_childcategory({{ $sub->childcategory_id }})"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalLong">
                                                        {{ ln('edit') }}
                                                    </a>
                                                    <a onclick="confirm('{{ URL::to('childcategory/delete/' . $sub->childcategory_id) }}')"
                                                        class="btn btn-danger">{{ ln('delete') }}</a>
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
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('update') }} {{ ln('child') }} {{ ln('categrory') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="container-fluid">
                        <form action="{{ route('childcategory.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="forn-group">
                                        <label for="categories_idds"><b>{{ ln('categrory') }}*</b></label>
                                        <input type="hidden" name="childcategory_id" id="childs_id">
                                        <select name="categories_id" id="categories_idds" class="form-control" required>
                                            <option value="0" alt="" >{{ ln('select') }} {{ ln('categrory') }}</option>
                                            @if (isset($category))
                                                @foreach ($category as $key)
                                                    <option value="{{ $key->categories_id }}">{{ $key->categories_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputState"><b>{{ ln('sub') }} {{ ln('categrory') }}*</b></label>
                                        <select id="subcategory_idds" name="subcategory_id" class="form-control" required>
                                            <option value="">{{ ln('select') }} {{ ln('sub') }} {{ ln('categrory') }}</option>
                                            @if (isset($subcategory))
                                                @foreach ($subcategory as $item)
                                                    <option value="{{ $item->subcategory_id }}">
                                                        {{ $item->subcategory_name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <label for=""><b>{{ ln('child') }} {{ ln('categrory_name') }} *</b></label>
                                <small>(In Any Language)</small>
                                <input type="text" class="form-control" name="childcategory_name" id="childcategroy_name"
                                  placeholder="{{ ln('enter') }} {{ ln('child') }} {{ ln('categrory_name') }}"  required />
                            </div>
                            <div class="form-group">
                                <label for=""><b>{{ ln('slug') }}*</b></label>
                                <input type="text" class="form-control" name="childcategory_slug" id="childcategroy_slug"
                                    placeholder="{{ ln('enter') }} {{ ln('slug') }}" required />
                            </div>
                            <div class="form-group">
                                <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                <input name="childcategory_status" type="radio" value="1" id="active" required />
                                <label>{{ ln('active') }}</label>
                                <input name="childcategory_status" type="radio" value="0" id="inactive" required />
                                <label>{{ ln('inactive') }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>{{ ln('image') }}</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img id="old_image" style="width:100px;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" class="dropify"
                                            name="childcategory_image" />
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                            <button type="submit" class="btn btn-success">{{ ln('update') }} {{ ln('child') }} {{ ln('categrory') }}</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
    $sub = DB::table('categories_subcategory')->get();
    @endphp
@endsection
@section('js')
    <script>
        function upadte_childcategory(childcategory_id) {

            $.ajax({
                type: "GET",
                url: "<?php echo env('APP_URL'); ?>childcategory/edit/" + childcategory_id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function(data) {
                    // console.log(data);
                    var child_id = "",
                        sub_id = "",
                        cid = "",
                        name = "",
                        slug = "",
                        status = "",
                        imag = "";

                    child_id = data.childcategory_id;
                    cid = data.categories_id;
                    sub_id = data.subcategory_id;
                    name = data.childcategory_name;
                    slug = data.childcategory_slug;
                    status = data.childcategory_status;
                    imag = data.childcategory_image;

                    document.getElementById("childs_id").value = child_id;
                    document.getElementById("childcategroy_name").value = name;
                    document.getElementById("childcategroy_slug").value = slug;

                    $('#old_image').attr('src', '{{ asset('') }}' + imag);
                    $('#categories_idds').val(cid);
                    $('option[alt="' + cid + '"]').attr('selected', 'true');
                    $('option[value="' + sub_id + '"]').attr('selected', 'true');

                    if (status == 1) {
                        $('#active').attr('checked', 'true');

                    } else {
                        $('#inactive').attr('checked', 'true');

                    }

                }
            });
        }
        var a = <?php echo json_encode($sub, true); ?>;   $('select[id="categories_idd"]').change(function() {
            var val = $(this).val();
            $('select[id="subcategory_idd"]').html('<option value="">Select Sub Category</option>');
            a.forEach(function(data) {
                if (data.categories_id == val) {
                    var html = '<option value="';
                    html += data.subcategory_id;
                    html += '">';
                    html += data.subcategory_name;
                    html += '</option>';
                    $('select[id="subcategory_idd"]').append(html);
                }
            });
        });

        $('select[id="categories_idds"]').change(function() {
            var val = $(this).val();
            $('select[id="subcategory_idds"]').html('<option value="">Select Sub Category</option>');
            a.forEach(function(data) {
                if (data.categories_id == val) {
                    var html = '<option value="';
                    html += data.subcategory_id;
                    html += '">';
                    html += data.subcategory_name;
                    html += '</option>';
                    $('select[id="subcategory_idds"]').append(html);
                }
            });
        });

    </script>
@endsection
