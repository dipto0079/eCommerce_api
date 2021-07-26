@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ ln('main_Categories') }}</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                            style="float: right;">
                            {{ ln('add_new_category') }}
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

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    <div class="modal-dialog modal modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('add_new_category') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="container-fluid p-4">
                                    <form action="{{ route('categories.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputEmail4"><b>{{ ln('categrory_name') }}*</b></label>
                                            <small>(In Any Language)</small>
                                            <input type="text" class="form-control" name="categories_name" id="inputEmail4"
                                                placeholder="{{ ln('enter') }} {{ ln('categrory_name') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail4"><b>{{ ln('slug') }}*</b></label>

                                            <input type="text" class="form-control" name="categories_slug" id="inputEmail4"
                                                placeholder="{{ ln('enter') }}  {{ ln('slug') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active">
                                                    <input name="categories_status" type="radio" value="active" required />
                                                    {{ ln('active') }}</label>
                                                <label class="btn btn-outline-primary ">
                                                    <input name="categories_status" type="radio" value="inactive"
                                                        required />
                                                        {{ ln('inactive') }}</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><b>{{ ln('image') }}</b></label>
                                            <input type="file" class="dropify" data-default-file=""  name="category_image" />
                                        </div>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                                        <button type="submit" class="btn btn-success">{{ ln('create_category') }}</button>
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
                                        <th>{{ ln('name') }}</th>
                                        <th>{{ ln('slug') }}</th>
                                        <th>{{ ln('category_image') }}</th>
                                        <th>{{ ln('status') }}</th>
                                        <th>{{ ln('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 0; ?>
                                    @foreach ($view as $key)
                                        <tr>
                                            <td>{{ $number + 1 }}</td>
                                            <?php $number++; ?>
                                            <td>{{ $key->categories_name }}</td>
                                            <td>{{ $key->categories_slug }}</td>
                                            <td>
                                                @if ($key->category_image)
                                                    <img src="{{ URL::to($key->category_image) }}"
                                                        style="width:80px;height:50px;">
                                                @else
                                                    <img src="{{ asset('default_image/noimage.png') }}"
                                                        style="width:80px;height: 50px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($key->categories_status == '1')
                                                    <button
                                                        class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                                @else
                                                    <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a type="button" onclick="upadte_category({{ $key->categories_id }})"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter1">
                                                        {{ ln('edit') }}
                                                    </a>
                                                    <a onclick="confirm('{{ URL::to('categories/delete/' . $key->categories_id) }}')"
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

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('update') }} {{ ln('categrory') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="container-fluid p-4">
                        <form action="{{ route('categories.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="categories_id" id="cat_id">
                                <label for="inputEmail4"><b> {{ ln('categrory_name') }}*</b></label>
                                <small>(In Any Language)</small>
                                <input type="text" class="form-control" name="categories_name" id="cat_name" placeholder="{{ ln('enter') }}  {{ ln('category_name') }}" required />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>{{ ln('slug') }}*</b></label>

                                <input type="text" class="form-control" name="categories_slug" id="slug_name"
                                    placeholder="{{ ln('enter') }}  {{ ln('slug') }}" required />
                            </div>
                            <div class="form-group" style="padding:20px 0;">
                                <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                <input name="categories_status" type="radio" value="active" id="active" required />
                                <label>{{ ln('active') }}</label>
                                <input name="categories_status" type="radio" value="inactive" id="inactive" required />
                                <label>{{ ln('inactive') }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>{{ ln('image') }}</b></label>
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                        <img id="old_image" style="width:100px;">
                                    </div> --}}
                                    <div class="col-md-12">
                                        <input type="file" class="dropify" id="old_image" data-height="100"  data-default-file="" name="category_image" />
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                            <button type="submit" class="btn btn-success">{{ ln('update') }} {{ ln('categrory') }}</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function upadte_category(categories_id) {
        $.ajax({
            type: "GET",
            url: "../categories/edit/" + categories_id,
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) {
                console.log(data);
                var id = "",
                    name = "",
                    slug = "",
                    status = "",
                    imag = "";
                id += data.categories_id;
                name += data.categories_name;
                slug += data.categories_slug;
                status += data.categories_status;
                imag = data.category_image;

                document.getElementById("cat_id").value = id;
                document.getElementById("cat_name").value = name;
                document.getElementById("slug_name").value = slug;

                $("#old_image").addClass('dropify');
                  $("#old_image").attr('data-default-file','{{ asset('') }}'+imag);
                  $('.dropify').dropify();


               //$('#old_image').attr('src', '{{ asset('') }}' + imag);
               //$('.dropify').dropify();
                if (status == 1) {
                    $('#active').attr('checked', 'true');

                } else {
                    $('#inactive').attr('checked', 'true');

                }

            }
        });
    }

</script>
@endsection
