@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <h5 class="mb-4">
                                <strong>Add New Theme</strong>
                            </h5>
                            <form action="{{route('theme.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control @error('theme_name') is-invalid @enderror" name="theme_name" value="{{ old('theme_name') }}" type="text" placeholder="Enter Theme Name" required/>
                                    @error('theme_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Folder Name</label>
                                    <input class="form-control @error('folder_name') is-invalid @enderror" name="folder_name" value="{{ old('folder_name') }}" type="text" placeholder="Enter Folder Name" required/>
                                    @error('folder_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Update Time</label>
                                    <input class="form-control" name="time" type="datetime-local" required/>
                                </div>
                                <div class="form-group" style="padding:20px 0;">
                                    <label>Status</label>
                                    <input name="status" type="radio" value="1" required/>
                                    <label>Active</label>
                                    <input name="status" type="radio" value="0" required/>
                                    <label>Inactive</label>
                                </div>
                                <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" class="dropify" name="image" />
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success mr-2 px-5">Insert</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
