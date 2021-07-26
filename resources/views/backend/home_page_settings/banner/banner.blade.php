@extends('backend.master')
@section('content')
<div class="container">
  <br>
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-6">
                      <h5>
                          <strong class="mr-3">{{ ln('banner') }} </strong>
                      </h5>
                  </div>
                  <div class="col-md-6">
                      <button
                          type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
                          <i class="fe fe-plus"></i> {{ ln('add') }}  {{ ln('new') }}  {{ ln('banner') }}
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
                      <h5 class="modal-title" id="exampleModalCenterTitle">{{ ln('add') }}  {{ ln('new') }}  {{ ln('banner') }} </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="row">
                      <div class="col-md-1"></div>
                  <div class="col-md-10">
                      <form action="{{route('theme.banner.create')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <br>
                          <div class="form-group">
                              <label for="inputEmail4"><b>{{ ln('title') }} </b></label>
                              <input type="text" class="form-control" name="banner_title" id="inputEmail4" placeholder="{{ ln('enter') }}  {{ ln('banner') }}  {{ ln('name') }} " required />
                          </div>
                          <div class="form-group">
                              <label class="control-label" for="subtitle_text">{{ ln('description') }} *</label>
                              <textarea class="form-control" name="banner_description" rows="3"  placeholder="{{ ln('enter') }}  {{ ln('description') }} "></textarea>
                          </div>
                      <div class="form-group">
                          <label for="inputEmail4"><b>{{ ln('link') }}  *</b></label>
                          <input type="url" class="form-control" name="banner_link" placeholder="{{ ln('link') }} " />
                      </div>
                      <div class="form-group">
                          <label><b>{{ ln('featured') }} {{ ln('image') }}  *</b></label> <br>
                          <input type="file" class="dropify" name="banner_image" />
                          <small>Prefered Size: (600x600) or Square Sized Image</small>
                      </div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ln('close') }} </button>
                      <button type="submit" class="btn btn-success"> {{ ln('create') }}  {{ ln('banner') }} </button>
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
          <th>{{ ln('sl') }} .</th>
          <th>{{ ln('title') }} </th>
          <th>{{ ln('description') }} </th>
          <th>{{ ln('link') }} </th>
          <th>{{ ln('featured') }}  {{ ln('image') }} </th>
          <th>{{ ln('action') }} </th>
        </tr>
      </thead>
      <tbody>
      @if(isset($banner))
          <?php $number = 0; ?>
          @foreach($banner as $key)
        <tr>
            <td>{{ $number+1 }}</td>
            <?php $number++; ?>
          <td>{{$key->banner_title}}</td>
          <td>{{$key->banner_description}}</td>
          <td>{{$key->banner_link}}</td>
          <td><img src="{{URL::to($key->banner_image)}}" style="width:200px;height: 100px;"></td>
            <td><a href="{{URL::to('theme/banner/edit/'.$key->banner_id)}}">
                    <button class="btn btn-primary">{{ ln('edit') }} </button>
                </a>
                <a onclick="confirm('{{URL::to('theme/banner/delete/'.$key->banner_id)}}')">
                    <button class="btn btn-danger">{{ ln('delete') }} </button>
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

