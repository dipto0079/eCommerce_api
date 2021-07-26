@extends('backend.master')
@section('content')
    <div class="container">
        <br>
        <div class="card" style="background-color: rgb(240, 240, 255)">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('terms_&_condition')}}</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
                            data-target=".bd-example-modal-lg">
                            {{ln('edit')}} {{ln('terms_&_condition')}}
                        </button>
                    </div>
                </div>
            </div>
            <form action="{{ route('sattings.terms_condition.update') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header"
                                    style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                                    <h5 class="modal-title" style="color: white">{{ln('edit')}} {{ln('terms_&_condition')}}</h5>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span style="font-size:20px" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body" style="background-color: rgb(212, 249, 255)">
                                       <div class="form-group">
                                            <label for="">{{ln('title')}}</label>
                                            <input type="text" name="terms_title" value="{{ getsettings('Terms_Title') }}"
                                                id="" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for=""> {{ln('description')}}</label>
                                            <textarea name="terms_description" id=""
                                                class="summernote" required>{{ getsettings('Terms_conditions_descriptions') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ln('meta')}} {{ln('description')}}</label>
                                            <textarea name="meta_description" id="" cols="10" rows="4"
                                                class="form-control" required>  {{ getsettings('Meta_Description') }}</textarea>
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
                </div>
            </form>
            <div class="card">
                <div class="card-header">
                    <label for="" style="font-weight: bold; font-size:18px">{{ln('title')}} </label>
                    <hr>
                    <h5 class="card-title">{{ getsettings('Terms_Title') }}</h5>
                </div>
                <div class="card-body" style="text-align: justify">
                    <label for="" style="font-weight: bold; font-size:18px">{{ln('description')}}</label>
                    <hr>
                    <?php echo getsettings('Terms_conditions_descriptions'); ?>
                </div>
                <div class="card-footer">
                    <label for="" style="font-weight: bold; font-size:18px">{{ln('meta')}} {{ln('description')}}</label>
                    <hr>
                    {{ getsettings('Meta_Description') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        ;
        (function($) {
            'use strict'
            $(function() {
                $('.summernote').summernote({
                    height: 700,
                })
            })
        })(jQuery)

    </script>
@endsection
