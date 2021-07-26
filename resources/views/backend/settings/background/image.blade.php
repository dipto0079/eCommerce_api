@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('background')}} {{ln('image')}}</strong>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{route('sattings.background.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" style="height: 300px;">

                                    <?php if (getsettings('Background_Image')) {?>
                                        <input type="file" class="dropify" data-default-file="{{URL::to(getsettings('Background_Image'))}}" name="settings_value" style="width:100%;height:100%;" required/>
{{--                                    <img src="{{URL::to(getsettings('Background_Image'))}}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">--}}
                                    <?php }else{ ?>
                                    <img src="{{ asset('default_image/noimage.png') }}" style="width:80%; height: 80%;display:block;margin-left: auto;margin-right: auto;">
                                    <?php } ?>
<!---->
{{--                                    <input type="file" name="settings_value" required/>--}}
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
