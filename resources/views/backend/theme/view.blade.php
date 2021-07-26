@extends('backend.master')
@section('content')

    <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            @foreach($themes as $key)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-center">
                                            <h5>{{$key->theme_name}}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{URL::to($key->image_1)}}" style="width:250px;height: 100px; text-align: center;"> <br>
                                    </div>
                                    <div class="card-footer">
                                        @if($key->status == 1)
                                        <a href="{{URL::to('theme/change/'.$key->theme_id)}}" class="btn btn-success">
                                            {{ln('active')}}
                                        </a>
                                        @else
                                            <a href="{{URL::to('theme/change/'.$key->theme_id)}}" class="btn btn-secondary">
                                                {{ln('inactive')}}
                                            </a>
                                            @endif
                                            <button style="float: right;" onclick="theme({{$key->theme_id}})"  class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal">{{ln('view')}}</button>
                                    </div>
                                </div>
                            </div>

                                <!-----------Modal------------>
                                    <div
                                        class="modal fade"
                                        id="modal"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="exampleModalCenterTitle"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="themename"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-5">
                                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                                                            </ol>
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img id="image1" style="width:100%;height: 200px;">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img id="image2" style="width:100%;height: 200px;">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img id="image3" style="width:100%;height: 200px;">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img id="image4" style="width:100%;height: 200px;">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img id="image5" style="width:100%;height: 200px;">
                                                                </div>
                                                            </div>
                                                            <a
                                                                class="carousel-control-prev"
                                                                href="#carouselExampleIndicators"
                                                                role="button"
                                                                data-slide="prev"
                                                            >
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a
                                                                class="carousel-control-next"
                                                                href="#carouselExampleIndicators"
                                                                role="button"
                                                                data-slide="next"
                                                            >
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div>

{{--                                                    <table class="table table-hover nowrap" id="example1">--}}
{{--                                                        <thead>--}}
{{--                                                        <tr>--}}
{{--                                                            <th>Folder Name</th>--}}
{{--                                                            <th>Image 1</th>--}}

{{--                                                        </tr>--}}
{{--                                                        </thead>--}}
{{--                                                        <tbody>--}}
{{--                                                        <tr>--}}
{{--                                                            <td id="folder"></td>--}}
{{--                                                            <td><img src="" id="imgaee_1" style="width:70px; height: 70px;"></td>--}}

{{--                                                        </tr>--}}
{{--                                                        </tbody>--}}
{{--                                                    </table>--}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-----------Modal------------>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection

@section('js')
<script>
    function theme(theme_id){
        $.ajax({
            type: "GET",
            url: "../theme/details/" + theme_id,
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) {
                console.log(data);
                var imag_1="", imag_2 ="", imag_3="", imag_4="", imag_5="", name="";

                name = data.theme_name;
                imag_1= data.image_1;
                imag_2= data.image_2;
                imag_3= data.image_3;
                imag_4= data.image_4;
                imag_5= data.image_5;

                document.getElementById("themename").innerHTML = name;
                $('#image1').attr('src','{{asset('')}}'+imag_1);
                $('#image2').attr('src','{{asset('')}}'+imag_2);
                $('#image3').attr('src','{{asset('')}}'+imag_3);
                $('#image4').attr('src','{{asset('')}}'+imag_4);
                $('#image5').attr('src','{{asset('')}}'+imag_5);

            }
        });
    }
</script>
@endsection
