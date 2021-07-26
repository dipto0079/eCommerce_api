@extends('backend.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="mb-4">
                        <strong>
                            {{ ln('branch') }}
                        </strong>
                    </h5>
                </div>
                <div class="col-lg-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
                        data-target=".bd-example-modal-lg">
                        {{ ln('add') }} {{ ln('new') }} {{ ln('branch') }}
                    </button>
                </div>
            </div>
        </div>
       
        <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                                <h5 class="modal-title" style="color: white">{{ ln('add') }} {{ ln('branch') }}</h5>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span  aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body" style="background-color: rgb(235, 241, 241)">
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('name') }}</label>
                                        <input type="text" name="branch_name" value="" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('name') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('email') }}</label>
                                        <input type="email" name="branch_email" value="" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('email') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('address') }}</label>
                                        <textarea type="text" name="branch_address" value="" rows="3" id=""
                                            class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('address') }}"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('phone') }}</label>
                                        <input type="text" name="branch_phone" value="" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('phone') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('API') }}</label>
                                        <input type="text" name="branch_API" value=" {{$id}}" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('API') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('branch') }}* &nbsp;&nbsp;</strong>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-outline-primary active">
                                                <input name="branch_type" type="radio" value="1" required />
                                                {{ ln('main') }}</label>
                                            <label class="btn btn-outline-danger ">
                                                <input name="branch_type" type="radio" value="0" required />
                                                {{ ln('sub') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-outline-primary active">
                                                <input name="branch_status" type="radio" value="1" required />
                                                {{ ln('Active') }}</label>
                                            <label class="btn btn-outline-danger ">
                                                <input name="branch_type" type="radio" value="0" required />
                                                {{ ln('Inactive') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('image') }}</label>
                                        <input type="file" name="branch_logo" value="" id="" class="dropify"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('image') }}"
                                             />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"
                                style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                                <button type="submit" class="btn btn-success">{{ ln('create') }}
                                    {{ ln('branch') }}</button>
                                <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">{{ ln('close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <table class="table table-hover nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>{{ ln('sl') }}.</th>
                                    <th>{{ ln('branch') }} {{ ln('name') }}</th>
                                    <th>{{ ln('branch') }} {{ ln('email') }}</th>
                                    <th>{{ ln('branch') }} {{ ln('address') }}</th>
                                    <th>{{ ln('branch') }} {{ ln('phone') }}</th>
                                    <th style="width: 20px">{{ ln('branch') }} {{ ln('API') }}</th>
                                    <th>{{ ln('branch') }}</th>
                                    <th>{{ ln('status') }}</th>
                                    <th>{{ ln('image') }}</th>
                                    <th>{{ ln('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 0; ?>
                                @foreach ($view as $item)
                                    <tr>
                                        <td>{{ $number + 1 }}</td>
                                        <?php $number++; ?>
                                        <td>{{ $item->branch_name }}</td>
                                        <td>{{ $item->branch_email }}</td>
                                        <td>{{ $item->branch_address }}</td>
                                        <td>{{ $item->branch_phone}}</td>
                                        <td style="width: 20px">{{ $item->branch_API }}</td>
                                        <td>
                                            @if ($item->branch_type == '1')
                                                <button
                                                    class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('main') }}&nbsp;&nbsp;</button>
                                            @else
                                                <button class="btn btn-sm btn-danger">{{ ln('sub') }}</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->branch_status == '1')
                                                <button
                                                    class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>
                                            @else
                                                <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->branch_logo)
                                                <img src="{{ URL::to($item->branch_logo) }}"
                                                    style="width:80px;height: 50px;">
                                            @else
                                                <img src="{{ asset('default_image/noimage.png') }}"
                                                    style="width:80px;height: 50px;">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a type="button" onclick="upadte_branch({{ $item->branch_id  }})"
                                                    class="btn btn-primary" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg1">
                                                    {{ ln('edit') }}
                                                </a>
                                                <a onclick="confirm('{{ URL::to('branch/delete/' . $item->branch_id ) }}')"
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
        <div class="card-body">
           
            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="false">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('branch.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            
                            <div class="modal-header"
                                style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                                <h5 class="modal-name" style="color: white">{{ ln('edit') }} {{ ln('branch') }}</h5>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body" style="background-color: rgb(235, 241, 241)">
                                    <div class="form-group">
                                        <input type="hidden" id="b_id" name="branch_id">
                                        <label for="">{{ ln('branch') }} {{ ln('name') }}</label>
                                        <input type="text" name="branch_name" value="" id="b_name" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('name') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('email') }}</label>
                                        <input type="email" name="branch_email" value="" id="b_email" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('email') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('address') }}</label>
                                        <textarea type="text" name="branch_address" value="" rows="3" id="b_address"
                                            class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('address') }}"
                                            ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('phone') }}</label>
                                        <input type="text" name="branch_phone" value="" id="b_phone" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('amount') }}"
                                             />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('branch') }} {{ ln('API') }}</label>
                                        <input type="text" name="branch_API" value="" id="b_branch_API" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('branch') }} {{ ln('API') }}"
                                             />
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('branch') }}* &nbsp;&nbsp;</strong>
                                        <input name="branch_type" type="radio" value="1" id="main" />
                                        <label for="main"> {{ ln('main') }}</label>
                                        <input name="branch_type" type="radio" value="0" id="sub" />
                                        <label for="sub"> {{ ln('sub') }}</label>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <input name="branch_status" type="radio" value="1" id="active" />
                                        <label for="active"> {{ ln('active') }}</label>
                                        <input name="branch_status" type="radio" value="0" id="inactive" />
                                        <label for="inactive"> {{ ln('inactive') }}</label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>{{ ln('branch') }} {{ ln('image') }}</b></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img id="old_image" style="width:100px;">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" class="dropify" name="branch_logo" />
                                            </div>
                                        </div>
                                    </div>
                            
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                            <button type="submit" class="btn btn-success">{{ ln('update') }} {{ ln('branch') }}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
       
        </div>
    </div>
    
    

</div>
</div>



@endsection
@section('js')
    <script>
        function upadte_branch(branch_id) {
            $.ajax({
                type: "GET",
                // url: "../branch/edit/" + branch_id,
                url: "<?php echo env('APP_URL'); ?>branch/edit/" + branch_id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function(data) {
                    console.log(data);
                    var id = "",
                        name = "",
                        address = "",
                        phone = "",
                        branch_API = "",
                        imag = "",
                        branch_type = "",
                       
                    id = data.branch_id;
                    name = data.branch_name;
                    email = data.branch_email;
                    address = data.branch_address;
                    phone = data.branch_phone;
                    branch_API = data.branch_API;
                    imag = data.branch_logo;
                    branch_type = data.branch_type;
                    branch_status = data.branch_status;

                    document.getElementById("b_id").value = id;
                    document.getElementById("b_name").value = name;
                    document.getElementById("b_email").value = email;
                    document.getElementById("b_address").value = address;
                    document.getElementById("b_phone").value = phone;
                    document.getElementById("b_branch_API").value = branch_API;

                    $('#old_image').attr('src', '{{ asset('') }}' + imag);

                    if (branch_type == 1) {
                        $('#main').attr('checked', 'true');

                    } else {
                        $('#sub').attr('checked', 'true');

                    }
                    if (branch_status == 1) {
                        $('#active').attr('checked', 'true');

                    } else {
                        $('#inactive').attr('checked', 'true');

                    }

                }
            });
        }

    </script>
    <script>
        function upadte_description(branch_id) {
            $.ajax({
                type: "GET",
                // url: "../branch/edit/" + branch_id,
                url: "<?php echo env('APP_URL'); ?>branch/edit/" +
                    branch_id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function(data) {
                    console.log(data);
                    var id = "",
                        description = data.branch_address;
                    document.getElementById("v_description").innerHTML = description;
                }
            });
        }

    </script>
@endsection
