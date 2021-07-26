@extends('backend.master')
@section('content')
   <div class="card">
       <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
              <h5 class="mb-4">
                  <strong>
                      {{ln('brand')}}
                  </strong>
              </h5>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
              data-target=".bd-example-modal-lg">
              {{ln('add')}} {{ln('new')}} {{ln('brand')}}
          </button>
            </div>
        </div>
       </div>
       <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                            <h5 class="modal-title" style="color: white">{{ln('edit')}} {{ln('brand')}}</h5>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <span style="font-size:20px" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body" style="background-color: rgb(235, 241, 241)">
                               <div class="form-group">
                                    <label for="">{{ln('brand')}} {{ln('name')}}</label>
                                    <input type="text" name="brand_name" value=""
                                        id="" class="form-control" placeholder="{{ln('enter')}} {{ln('brand')}} {{ln('name')}}" required />
                                </div>
                                <div class="form-group">
                                    <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            <input name="brand_status" type="radio" value="1" required />
                                            {{ ln('active') }}</label>
                                        <label class="btn btn-outline-danger ">
                                            <input name="brand_status" type="radio" value="0"
                                                required />
                                                {{ ln('inactive') }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><b>{{ ln('image') }}</b></label>
                                        <input type="file" class="dropify" name="brand_image" />
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                            <button type="submit" class="btn btn-success">{{ln('create')}} {{ln('brand')}}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ln('close')}}</button>
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
                            <th>{{ln('brand')}} {{ln('name')}}</th>
                            <th>{{ln('brand')}} {{ln('image')}}</th>
                            <th>{{ln('status')}}</th>
                            <th>{{ln('action')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $number = 0; ?>
                            @foreach ($view as $item)
                            <tr>
                                <td>{{ $number + 1 }}</td>
                                            <?php $number++; ?>
                                <td>{{ $item->brand_name}}</td>
                                <td> @if ($item->brand_image)
                                    <img src="{{ URL::to($item->brand_image) }}"
                                        style="width:80px;height:50px;">
                                @else
                                    <img src="{{ asset('default_image/noimage.png') }}"
                                        style="width:80px;height: 50px;">
                                @endif</td>
                                <td>
                                    @if ($item->brand_status == '1')
                                    <button
                                        class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                @else
                                    <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                @endif
                            </td>
                                <td>
                                    <div class="row">
                                        <a type="button" onclick="upadte_brand({{ $item->brand_id }})"
                                            class="btn btn-primary" data-toggle="modal"
                                            data-target=".bd-example-modal-lg1">
                                            {{ ln('edit') }}
                                        </a>
                                        <a onclick="confirm('{{ URL::to('brand/delete/' . $item->brand_id) }}')"
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
   <form action="{{ route('brand.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                        <h5 class="modal-title" style="color: white">{{ln('edit')}} {{ln('terms_&_condition')}}</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span style="font-size:20px" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body" style="background-color: rgb(235, 241, 241)">
                           <div class="form-group">
                               <input type="hidden" name="brand_id" id="b_id">
                                <label for="b_name">{{ln('brand')}} {{ln('name')}}</label>
                                <input type="text" name="brand_name" 
                                    id="b_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                 <input name="brand_status" type="radio" value="1" id="active" required />
                                        <label for="active">{{ ln('active') }}</label>
                                        <input name="brand_status" type="radio" value="0" id="inactive"
                                            required />
                                            <label for="inactive">{{ ln('inactive') }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>{{ ln('image') }}</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img id="old_image" style="width:200px;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" class="dropify" name="brand_image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"
                        style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                        <button type="submit" class="btn btn-success">{{ln('update')}} {{ln('brand')}}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ln('close')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script>
    function upadte_brand(brand_id) {
        $.ajax({
            type: "GET",
            // url: "../brand/edit/" + brand_id,
            url: "<?php echo env('APP_URL'); ?>brand/edit/" + brand_id,
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
                    imag = "";
                id = data.brand_id;
                name = data.brand_name;
                status = data.brand_status;
                imag = data.brand_image;

                document.getElementById("b_id").value = id;
                document.getElementById("b_name").value = name;

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
@endsection