@extends('backend.master')
@section('content')
    <div class="card">
        <div class="card-body">
{{--            <h4 class="mb-4">--}}
{{--                <strong>Select Language </strong>--}}
{{--            </h4>--}}

            <form action="{{URL::to('components/language/update/'.$language_id)}}" method="POST">
                @csrf

@php
$components = DB::table('language_components')->orderBy('comp_name','asc')->get();
$components_value = DB::table('language_changed')->where('language_id',$language_id)->get();
@endphp
                @php $number = 0; @endphp
                @foreach($components as $key)
                    <div class="form-group row">
                        <div>
                            {{ $number+1 }}
                            @php $number++; @endphp
                        </div>
                        <div class="col-md-3">
                            <strong>{{$key->comp_name}}</strong> <br>
                            <small>{{$key->comp_desc}}</small>
                        </div>
                        <div class="col-md-6">
@php
    $value = '';
        if(DB::table('language_changed')->where('language_id',$language_id)
    ->where('component_id',$key->comp_id)->count()==1)
        {
            $v = DB::table('language_changed')->where('language_id',$language_id)
            ->where('component_id',$key->comp_id)->first();
            $value =($v->component_value);
        }
@endphp
                            <input type="text" class="form-control" value="{{$value}}" placeholder="{{$key->comp_place}}" name="data[{{$key->comp_id}}]" required/>
                        </div>
                    </div>
                @endforeach

                <input type="hidden" name="language_id" value="{{$language_id}}">
                <button type="submit" class="btn btn-success px-5">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
