@extends('backend.master')
@section('content')
    <div class="card">
        <div class="card-body">
                        <h4>Edit Language</h4>
                        <form action="{{URL::to('language/update/'.$language->lang_id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <strong>Language</strong>
                                <input class="form-control @error('language_name') is-invalid @enderror" name="language_name" type="text" value="{{$language->language_name}}" />
                                <p><small>Ex: English</small></p>
                                @error('language_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Short Form</strong>
                                <input class="form-control @error('short_form') is-invalid @enderror" name="short_form" type="text" value="{{$language->short_form}}"/>
                                <p><small>Ex: en</small></p>
                                @error('short_form')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Language Code</strong>
                                <input class="form-control @error('language_code') is-invalid @enderror" name="language_code" type="text" value="{{$language->language_code}}"/>
                                <p><small>Ex: en_us</small></p>
                                @error('language_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="padding:20px 0;">
                                <strong>Text Direction</strong>
                                <input name="text_direction" type="radio" value="ltr" {{$language->text_direction == 'ltr' ? 'checked' : ''}}/>
                                <label>LTR</label>
                                <input name="text_direction" type="radio" value="rtr" {{$language->text_direction == 'rtr' ? 'checked' : ''}}/>
                                <label>RTR</label>
                            </div>
                            <div class="form-group" style="padding:20px 0;">
                                <strong>Status</strong>
                                <input name="status" type="radio" value="active" {{$language->status == '1' ? 'checked' : ''}}/>
                                <label>Active</label>
                                <input name="status" type="radio" value="inactive" {{$language->status == '0' ? 'checked' : ''}}/>
                                <label>Inactive</label>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success mr-2 px-5">Update Language</button>
                            </div>
                        </form>

        </div>
    </div>
@endsection

