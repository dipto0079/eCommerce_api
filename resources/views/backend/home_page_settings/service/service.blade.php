@extends('backend.master')
@section('content')
  <div class="container-fluid">
  <br>
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-6">
                      <h5>
                          <strong class="mr-3">{{ ln('services') }}</strong>
                      </h5>
                  </div>
                  <div class="col-md-6">

                      <button
                          type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
                          <i class="fe fe-plus"></i> {{ ln('add') }} {{ ln('new') }} {{ ln('service') }}
                      </button>
                  </div>
              </div>
          </div>

      <div class="card-body">

      <div
          class="modal fade"
          id="exampleModalCenter"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
      >

          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('add') }} {{ ln('new') }} {{ ln('service') }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="row">
                      <div class="col-md-1"></div>
                  <div class="col-md-10">
                      <form action="{{route('theme.service.create')}}" method="post" enctype="multipart/form-data">
                          @csrf
                      <div class="form-group">
                          <label for="inputEmail4"><b>{{ ln('title') }} *</b></label>
                          <input type="text" name="service_title" class="form-control" placeholder="{{ ln('enter') }} {{ ln('title') }}" required/>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail4"><b>{{ ln('description') }}</b></label>
                          <textarea class="form-control" name="service_description" rows="5" placeholder="{{ ln('enter') }} {{ ln('description') }}" required></textarea>
                      </div>
                      <div class="form-group">
                          <label><b> {{ ln('image') }} *</b></label>
                          <input type="file" class="dropify" name="service_image" />
                          <small>Prefered Size: (600x600) or Square Sized Image</small>
                      </div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }}</button>
                      <button type="submit" class="btn btn-success"> {{ ln('create') }} {{ ln('service') }}</button>
                      </form>
                      <br>
                  </div>
              </div>
              </div>
          </div>
      </div>
    <table class="table table-hover nowrap" id="example1">
      <thead class="thead-default">
        <tr>
          <th>{{ ln('sl') }}</th>
          <th>{{ ln('title') }}</th>
          <th>{{ ln('description') }}</th>
          <th>{{ ln('featured') }}{{ ln('image') }}</th>
          <th>{{ ln('action') }}</th>
        </tr>
      </thead>
      <tbody>
      @if(isset($service))
          <?php $number = 0; ?>
          @foreach($service as $key)
        <tr>
            <td>{{ $number+1 }}</td>
            <?php $number++; ?>
          <td>{{$key->service_title}}</td>
          <td>{{$key->service_description}}</td>
          <td><img src="{{URL::to($key->service_image)}}" style="width:120px;height: 80px;"></td>
            <td><a href="{{URL::to('theme/service/edit/'.$key->service_id)}}">
                    <button class="btn btn-primary">{{ ln('edit') }}</button>
                </a>
                <a onclick="confirm('{{URL::to('theme/service/delete/'.$key->service_id)}}')">
                    <button class="btn btn-danger">{{ ln('delete') }}</button>
                </a></td>
        </tr>
          @endforeach
      @endif
      </tbody>
    </table>
    </div>
  </div>
  </div>
@endsection

