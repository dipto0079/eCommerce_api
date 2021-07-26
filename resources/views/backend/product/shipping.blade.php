@extends('backend.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5>
                        <strong>
                            {{ ln('shipping') }}
                        </strong>
                    </h5>
                </div>
                <div class="col-lg-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
                        data-target=".bd-example-modal-lg">
                        {{ ln('add') }} {{ ln('new') }} {{ ln('shipping') }}
                    </button>
                </div>
            </div>
        </div>
        <form action="{{ route('proucts.shipping.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                                <h5 class="modal-title" style="color: white">{{ ln('edit') }} {{ ln('shipping') }}</h5>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size:20px" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body" style="background-color: rgb(235, 241, 241)">
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('title') }}</label>
                                        <input type="text" name="shipping_title" value="" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('title') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('description') }}</label>
                                        <textarea type="text" name="shipping_description" value="" rows="3" id=""
                                            class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('description') }}"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('amount') }}</label>
                                        <input type="text" name="shipping_amount" value="" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('amount') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('time') }}</label>
                                        <input type="text" name="time" value="" id="" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('time') }}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-outline-primary active">
                                                <input name="shipping_status" type="radio" value="1" required />
                                                {{ ln('active') }}</label>
                                            <label class="btn btn-outline-danger ">
                                                <input name="shipping_status" type="radio" value="0" required />
                                                {{ ln('inactive') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('image') }}</label>
                                        <input type="file" name="shipping_image" value="" id="" class="dropify"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('image') }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"
                                style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                                <button type="submit" class="btn btn-success">{{ ln('create') }}
                                    {{ ln('shipping') }}</button>
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
                        <table class="table table-hover nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>{{ ln('sl') }}.</th>
                                    <th>{{ ln('shipping') }} {{ ln('title') }}</th>
                                    <th>{{ ln('shipping') }} {{ ln('description') }}</th>
                                    <th>{{ ln('shipping') }} {{ ln('amount') }}</th>
                                    <th>{{ ln('shipping') }} {{ ln('time') }}</th>
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
                                        <td>{{ $item->shipping_title }}</td>
                                        <td>
                                            <button type="button" onclick="upadte_description({{ $item->shipping_id }})"
                                                class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                {{ln('view')}}
                                            </button>

                                        </td>
                                        <td>{{ $item->shipping_amount }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>
                                            @if ($item->shipping_status == '1')
                                                <button
                                                    class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                            @else
                                                <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->shipping_image)
                                                <img src="{{ URL::to($item->shipping_image) }}"
                                                    style="width:80px;height: 50px;">
                                            @else
                                                <img src="{{ asset('default_image/noimage.png') }}"
                                                    style="width:80px;height: 50px;">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a type="button" onclick="upadte_shipping({{ $item->shipping_id }})"
                                                    class="btn btn-primary" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg1">
                                                    {{ ln('edit') }}
                                                </a>
                                                <a onclick="confirm('{{ URL::to('products/shipping/delete/' . $item->shipping_id) }}')"
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
        <div class="card-body">

            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="false">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('proucts.shipping.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">

                            <div class="modal-header"
                                style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                                <h5 class="modal-title" style="color: white">{{ ln('edit') }} {{ ln('shipping') }}</h5>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size:20px" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body" style="background-color: rgb(235, 241, 241)">
                                    <div class="form-group">
                                        <input type="hidden" id="s_id" name="shipping_id">
                                        <label for="">{{ ln('shipping') }} {{ ln('title') }}</label>
                                        <input type="text" name="shipping_title" value="" id="s_title" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('title') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('description') }}</label>
                                        <textarea type="text" name="shipping_description" value="" rows="3" id="s_description"
                                            class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('description') }}"
                                            ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('amount') }}</label>
                                        <input type="text" name="shipping_amount" value="" id="s_amount" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('amount') }}"
                                             />
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ ln('shipping') }} {{ ln('start_time') }}</label>
                                        <input type="text" name="time" value="" id="s_time" class="form-control"
                                            placeholder="{{ ln('enter') }} {{ ln('shipping') }} {{ ln('start_time') }}"
                                             />
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <input name="shipping_status" type="radio" value="1" id="active" />
                                        <label for="active"> {{ ln('active') }}</label>
                                        <input name="shipping_status" type="radio" value="0" id="inactive" />
                                        <label for="inactive"> {{ ln('inactive') }}</label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>{{ ln('shipping') }} {{ ln('image') }}</b></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img id="old_image" style="width:100px;">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" class="dropify" name="shipping_image" />
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="modal-footer"
                            style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                            <button type="submit" class="btn btn-success">{{ ln('update') }} {{ ln('shipping') }}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>

        <div class="card-body">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('shipping') }} {{ ln('description') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="v_description"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>
    </div>



</div>
</div>



@endsection
@section('js')
    <script>
        function upadte_shipping(shipping_id) {
            $.ajax({
                type: "GET",
                // url: "../shipping/edit/" + shipping_id,
                url: "<?php echo env('APP_URL'); ?>products/shipping/edit/" +
                    shipping_id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function(data) {
                    console.log(data);
                    var id = "",
                        name = "",
                        status = "",
                        id = data.shipping_id;
                    title = data.shipping_title;
                    description = data.shipping_description;
                    amount = data.shipping_amount;
                    time = data.time;
                    imag = data.shipping_image;
                    status = data.shipping_status;

                    document.getElementById("s_id").value = id;
                    document.getElementById("s_title").value = title;
                    document.getElementById("s_description").value = description;
                    document.getElementById("s_amount").value = amount;
                    document.getElementById("s_time").value = time;

                    $('#old_image').attr('src', '{{ asset('') }}' + imag);

                    if (status == 1) {
                        $('#active').attr('checked', 'true');

                    } else {
                        $('#inactive').attr('checked', 'true');

                    }

                }
            });
        }

    </script>
    <script>
        function upadte_description(shipping_id) {
            $.ajax({
                type: "GET",
                // url: "../shipping/edit/" + shipping_id,
                url: "<?php echo env('APP_URL'); ?>products/shipping/edit/" +
                    shipping_id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function(data) {
                    console.log(data);
                    var id = "",
                        description = data.shipping_description;
                    document.getElementById("v_description").innerHTML = description;
                }
            });
        }

    </script>
@endsection
