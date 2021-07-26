{{--@extends('backend.master')--}}
{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="mb-5">--}}
{{--                        <form action="{{route('components.language')}}" method="POST">--}}
{{--                            @csrf--}}
{{--                        <h5 class="mb-4"><strong>Select Language</strong></h5>--}}
{{--                        <select class="selectpicker mr-2" data-style="btn-success" name="lang_id">--}}
{{--                            <option>Select</option>--}}
{{--                            @foreach($language as $row)--}}
{{--                            <option value="{{$row->lang_id}}">{{$row->lang_name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="form-label">{{$compname->comp_name}}</label>--}}
{{--                                <input class="form-control" name="conv_lang_name" type="text" placeholder="Enter Language"/>--}}
{{--                                <input name="comp_id" type="hidden" value="{{$compname->comp_id}}"/>--}}
{{--                            </div>--}}
{{--                            <div class="form-actions">--}}
{{--                                <button type="submit" class="btn btn-success mr-2 px-5">Insert</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

