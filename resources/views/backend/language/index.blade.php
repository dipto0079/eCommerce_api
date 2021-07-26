@extends('backend.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="rounded-lg">
                        <h4>{{ln('add_language')}}</h4>
                        <form action="{{route('language.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <strong>Language</strong>
                                <input class="form-control @error('language_name') is-invalid @enderror" name="language_name" type="text" value="{{ old('language_name') }}" placeholder="Language Name" required/>
                                <p><small>Ex: English</small></p>
                                @error('language_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Short Form</strong>
                                <input class="form-control @error('short_form') is-invalid @enderror" name="short_form" type="text" value="{{ old('short_form') }}" placeholder="Short Form" required/>
                                <p><small>Ex: en</small></p>
                                @error('short_form')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Language Code</strong>
                                <input class="form-control @error('language_code') is-invalid @enderror" name="language_code" type="text" value="{{ old('language_code') }}" placeholder="Language Code" required/>
                                <p><small>Ex: en_us</small></p>
                                @error('language_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="padding:20px 0;">
                                <strong>Text Direction</strong>
                                <input name="text_direction" type="radio" value="ltr"/>
                                <label>LTR</label>
                                <input name="text_direction" type="radio" value="rtr"/>
                                <label>RTR</label>
                            </div>
                            <div class="form-group" style="padding:20px 0;">
                                <strong>Status</strong>
                                <input name="status" type="radio" value="active"/>
                                <label>Active</label>
                                <input name="status" type="radio" value="inactive"/>
                                <label>Inactive</label>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success mr-2 px-5">Add Language</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>{{ln('view_language')}}</h4>
                    <br>
                    <table class="table table-hover nowrap" id="example1">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $number = 0; ?>
                            @foreach($language as $row)
                                <tr>
                                    <td>{{ $number+1 }}</td>
                                    <?php $number++; ?>
                                    <td>{{$row->language_name}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{URL::to('components/view/'.$row->lang_id)}}">Edit Components</a>
                                        <a class="btn btn-info" href="{{URL::to('language/edit/'.$row->lang_id)}}">Edit Language</a>
                                        @if($row->lang_id==1)
                                        <a class="btn btn-danger" href="{{URL::to('language/delete/'.$row->lang_id)}}" style="display: none">Delete</a>
                                            @else
                                        <a class="btn btn-danger" onclick="confirm('{{URL::to('language/delete/'.$row->lang_id)}}')">Delete</a>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

