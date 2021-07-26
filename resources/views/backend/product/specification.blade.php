@extends('backend.master')
@section('content')
   <div class="card">
       <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
              <h5>
                  <strong>
                      {{ln('specification')}}
                  </strong>
              </h5>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
              data-target=".bd-example-modal-lg">
              {{ln('add')}} {{ln('new')}} {{ln('specification')}}
          </button>
            </div>
        </div>
       </div>
       <form action="{{ route('products.specification.store') }}" method="post" >
        @csrf
        <div class="card-body">
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                            <h5 class="modal-title" style="color: white">{{ln('edit')}} {{ln('specification')}}</h5>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <span style="font-size:20px" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body" style="background-color: rgb(235, 241, 241)">
                               <div class="form-group">
                                    <label for="">{{ln('specification')}} {{ln('name')}}</label>
                                    <input type="text" name="specification_name" value=""
                                        id="" class="form-control" placeholder="{{ln('enter')}} {{ln('specification')}} {{ln('name')}}" required />
                                </div>
                                <div class="form-group">
                                    <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            <input name="specification_status" type="radio" value="1" required />
                                            {{ ln('active') }}</label>
                                        <label class="btn btn-outline-danger ">
                                            <input name="specification_status" type="radio" value="0"
                                                required />
                                                {{ ln('inactive') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                            <button type="submit" class="btn btn-success">{{ln('create')}} {{ln('specification')}}</button>
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
                    <table class="table table-hover nowrap" id="example1">
                        <thead>
                          <tr>
                            <th>{{ ln('sl') }}.</th>
                            <th>{{ln('specification')}} {{ln('name')}}</th>
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
                                <td>{{ $item->specification_name}}</td>
                                <td>
                                    @if ($item->specification_status == '1')
                                    <button
                                        class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                @else
                                    <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                @endif
                            </td>
                                <td>
                                    <div class="row">
                                        <a type="button" onclick="upadte_specification({{ $item->specification_id }})"
                                            class="btn btn-primary" data-toggle="modal"
                                            data-target=".bd-example-modal-lg1">
                                            {{ ln('edit') }}
                                        </a>
                                        <a onclick="confirm('{{ URL::to('products/specification/delete/' . $item->specification_id) }}')"
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
   <form action="{{ route('products.specification.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                        <h5 class="modal-title" style="color: white">{{ln('edit')}} {{ln('specification')}}</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span style="font-size:20px" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body" style="background-color: rgb(235, 241, 241)">
                           <div class="form-group">
                               <input type="hidden" name="specification_id" id="s_id">
                                <label for="">{{ln('specification')}} {{ln('name')}}</label>
                                <input type="text" name="specification_name"
                                    id="s_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                 <input name="specification_status" type="radio" value="1" id="active" required />
                                        <label for="active">{{ ln('active') }}</label>
                                        <input name="specification_status" type="radio" value="0" id="inactive"
                                            required />
                                            <label for="inactive">{{ ln('inactive') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"
                        style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                        <button type="submit" class="btn btn-success">{{ln('update')}} {{ln('specification')}}</button>
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
    function upadte_specification(specification_id) {
        $.ajax({
            type: "GET",
            url: "<?php echo env('APP_URL'); ?>products/specification/edit/" + specification_id,
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
                id = data.specification_id;
                name = data.specification_name;
                status = data.specification_status;

                document.getElementById("s_id").value = id;
                document.getElementById("s_name").value = name;


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
