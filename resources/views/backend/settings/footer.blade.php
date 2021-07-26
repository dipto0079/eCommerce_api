@extends('backend.master')
@section('content')
<div class="container-fluid">
    </br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>
                        <strong class="mr-3">Website Favicon</strong>
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 mx-auto rounded p-5 ">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"><b>Footer Text *</b> <small>(In Any Language)</small></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea2" class="form-label"><b>Copyright Text *</b> <small>(In Any Language)</small></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">COPYRIGHT © 2019. All Rights Reserved By GeniusOcean.com</textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection