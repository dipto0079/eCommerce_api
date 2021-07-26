@extends('backend.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">
                <strong>Select Language </strong>
            </h4>
            <form action="{{route('components.language')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <select class="selectpicker mr-2" name="lang_id">
                        <option>Select</option>
                        @foreach($language as $row)
                            <option value="{{$row->lang_id}}">{{$row->language_name}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach($comp as $key)
                <div class="form-group row">
                    <label class="col-md-3">{{$key->comp_name}}</label>
                    <label class="col-md-3">{{$key->comp_desc}}</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="{{$key->comp_place}}" name="data[{{$key->comp_id}}]" />
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success px-5">Insert</button>
            </form>
        </div>
    </div>
@endsection

