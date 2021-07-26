@extends('backend.master')
@section('content')

    <div class="container">
        <br>
        <div class="card" style="background-color: rgb(241, 241, 248);">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('contact_us')}}</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
                            data-target=".bd-example-modal-lg">
                            {{ln('edit')}} {{ln('contact_us')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
            <div class="card">
           
                <div class="card-header">
                    <label for=""><b>{{ln('contact')}} {{ln('title')}} </b></label>
                    <hr>
                    {{getsettings('Contact_Title')}}
                </div>
                <div class="card-body">
                    <label for=""><b>{{ln('contact')}} {{ln('text')}} </b></label>
                    <hr>
                 <?php echo getsettings('Contact_Text'); ?>
                    <hr>
                    <label for=""><b>{{ln('contact_us')}} {{ln('email_address')}} </b></label>
                    <hr>
                   
                    {{getsettings('Contact_Us_Email_Address')}}
                    <hr>
                    <br>
           
                    <label for=""><b> {{ln('website')}} </b></label>
                    <hr>
                    {{getsettings('Contact_Website')}}
                    <hr>
                    <br>
          
                    <label for=""><b>{{ln('contact')}} {{ln('phone')}} </b></label>
                    <hr>
                    {{getsettings('Contact_Phone')}}
                    <hr>
                    <br>
               
                    <label for=""><b>{{ln('street_address')}} </b></label>
                    <hr>
                    {{getsettings('ContactStreet_Address')}}
                    <hr>
                    <br>
                </div>
            </div>
            </div>
            <form action="{{ route('sattings.contact_us_page.update') }}" method="post">
                @csrf
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"
                                style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                                <h4 class="modal-title" style="color: white">
                                    {{ln('edit')}}  {{ln('contact_us')}}
                                </h4>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size:20px" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body" style="background-color: rgb(241, 241, 248);">
                                    <div class="form-group">
                                        <label for=""><b>{{ln('contact')}} {{ln('title')}} *</b></label>
                                        <small>(In Any Language)</small>
                                        <input type="text" class="form-control" id="" name="Contact_Title" value="{{getsettings('Contact_Title')}}" placeholder="Contact Title">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>{{ln('contact')}} {{ln('text')}} *</b></label>
                                        <textarea id="textarea" class="summernote" name="Contact_Text"
                                            placeholder="Type Contact Text">{{getsettings('Contact_Text')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>{{ln('contact_us')}}  {{ln('email_address')}} *</b></label>
                                        <input type="email" class="form-control" id="" name="Contact_Us_Email_Address" value="{{getsettings('Contact_Us_Email_Address')}}" placeholder="Enter Email Address" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>website *</b></label>
                                        <input type="url" class="form-control" id="" name="Contact_Website" value="{{getsettings('Contact_Website')}}" placeholder="Enter Your Website" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>phone *</b></label>
                                        <input type="number" class="form-control" id="" name="Contact_Phone" value="{{getsettings('Contact_Phone')}}" placeholder="00 000 000 000" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity"><b>{{ln('street_address')}} *</b></label>
                                        <textarea type="text" name="ContactStreet_Address" class="form-control" rows="5" id="">{{getsettings('ContactStreet_Address')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"
                                style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                                <button type="submit" class="btn btn-success">{{ln('save_change')}}</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ln('close')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

    <script>
        ;
        (function($) {
            'use strict'
            $(function() {
                $('.summernote').summernote({
                    height: 180,
                })
            })
        })(jQuery)

    </script>
@endsection
