@extends('backend.master')
@section('content')

<div class="container-fluid">
  <br>
      <div class="card">
      <div class="card-body">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-6">
                      <h5>
                          <strong class="mr-3">All products </strong>
                      </h5>
                  </div>
                  <div class="col-md-6">

                  </div>
              </div>
          </div>
          <br>
    <table class="table table-hover nowrap" id="example1">
      <thead class="thead-default">
        <tr>
          <th>{{ln('sl')}}</th>
          <th>{{ln('product')}} {{ln('name')}}</th>
            <th>{{ln('product')}} {{ln('code')}}</th>
            <th>{{ln('product')}} {{ln('image')}}</th>
            <th>{{ln('product')}} {{ln('status')}}</th>
          <th>{{ln('action')}}</th>
        </tr>
      </thead>
      <tbody>
      @php $number=0; @endphp
      @if(isset($product))
          @foreach($product as $key)
              <tr>
                  <td>{{$number+1}}</td>
                  @php $number++; @endphp
                  <td>{{$key->product_name}}</td>
                  <td>{{$key->product_code}}</td>
                  <td>
                      @if($key->product_image)
                          <img src="{{URL::to($key->product_image)}}" style="width:100px;">
                      @else
                          <img src="{{asset('default_image/noimage.png')}}" style="width:100px;">
                      @endif
                  </td>
                  <td>
                      @if ($key->product_status == '1')
                          <button
                              class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                      @else
                          <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                      @endif
                  </td>
                  <td>
                      <a type="button" class="btn btn-primary" href="{{URL::to('products/edit/'.$key->product_id)}}">Edit</a>
                                    <a onclick="confirm('{{ URL::to('products/delete/'.$key->product_id) }}')"
                                       class="btn btn-danger">Delete</a>
                                </td>
              </tr>
          @endforeach
          @endif
      </tbody>
    </table>
    </div>
  </div>
  </div>

@endsection
