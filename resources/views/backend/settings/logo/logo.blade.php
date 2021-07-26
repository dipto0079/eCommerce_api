@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('website')}} {{ln('logo')}}</strong>
                        </h5>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-center">
                                    <h5>{{ln('header')}} {{ln('logo')}}</h5>
                                </div>
                            </div>
                            <form action="{{route('theme.headerlogo.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card-body" style="height: 200px;">

                                    <?php if (getsettings('Header_Logo')) {?>
    <input type="file" class="dropify" data-default-file="{{URL::to(getsettings('Header_Logo'))}}" name="settings_value" required/>
{{--<img src="{{URL::to(getsettings('Header_Logo'))}}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">--}}
                  <?php }else{ ?>
<img src="{{ asset('default_image/noimage.png') }}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">
                                        <?php } ?>

{{--                                <input type="file" name="settings_value" required/>--}}
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ln('update')}}</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-center">
                                        <h5>{{ln('footer')}} {{ln('logo')}}</h5>
                                    </div>
                                </div>
                                <form action="{{route('theme.footerlogo.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body" style="height: 200px;">
                                        <?php if (getsettings('Footer_Logo')) {?>
{{--                                        <img src="{{URL::to(getsettings('Footer_Logo'))}}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">--}}
                                            <input type="file" class="dropify" data-default-file="{{URL::to(getsettings('Footer_Logo'))}}" name="settings_value" required/>
                                        <?php }else{ ?>
                                        <img src="{{ asset('default_image/noimage.png') }}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">
                                        <?php } ?>
{{--                                        <input type="file" name="settings_value" required />--}}
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">{{ln('update')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-center">
                                    <h5>{{ln('invoice')}} {{ln('logo')}}</h5>
                                </div>
                            </div>
                            <form action="{{route('theme.invoicelogo.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" style="height: 200px;">

                                    <?php if (getsettings('Invoice_Logo')) {?>
{{--                                    <img src="{{URL::to(getsettings('Invoice_Logo'))}}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">--}}
                                        <input type="file" class="dropify" data-default-file="{{URL::to(getsettings('Invoice_Logo'))}}" name="settings_value" required/>
                                    <?php }else{ ?>
                                    <img src="{{ asset('default_image/noimage.png') }}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">
                                    <?php } ?>
{{--                                    <input type="file" name="settings_value" required />--}}
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">{{ln('update')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
