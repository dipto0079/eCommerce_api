@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <h5 class="mb-4">
                                <strong>Add New Component</strong>
                            </h5>
                            <form action="{{route('components.store')}}" name="form-validation" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control @error('comp_name') is-invalid @enderror" name="comp_name" value="{{ old('comp_name') }}" type="text" placeholder="Enter Components Name" required/>
                                    @error('comp_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <input class="form-control @error('comp_desc') is-invalid @enderror" name="comp_desc" value="{{ old('comp_desc') }}" type="text" placeholder="Enter Description" required/>
                                    @error('comp_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Placeholder</label>
                                    <input class="form-control @error('comp_place') is-invalid @enderror" name="comp_place" value="{{ old('comp_place') }}" type="text" placeholder="Enter Placeholder" required/>
                                    @error('comp_place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

