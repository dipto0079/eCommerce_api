@extends('backend.master')
@section('content')
<div class="container-fluid">
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>
                        <strong class="mr-3">Customer Default Image</strong>
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-sm-8 mx-auto rounded p-4">
                        <div class="d-flex justify-content-center">
                            <div class="card-header">
                                <h5 style="text-align: center;"> <strong class="mr-3">Customer Image *</strong></h5>
                                <small>(This image will be displayed if users do not upload profile photo)
                                    (Preferred Size: 600 X 600 Pixel)</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text"><input type="file"></h5></br>
                            <div class="d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Save &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection