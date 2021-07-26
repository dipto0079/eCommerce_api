<!DOCTYPE html>
<html lang="en" data-vb-theme="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        Visual Builder Html
    </title>
    <link rel="icon" type="image/png" href="{{asset('backend/components/css/img/favicon.png')}}" />
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700,800&amp;display=swap" rel="stylesheet">



    @extends('backend.layout.header')
    <script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendors/popper.js/dist/umd/popper.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('backend/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('backend/vendors/spin.js/spin.js')}}"></script>
    <script src="{{asset('backend/vendors/ladda/dist/ladda.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('backend/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/vendors/html5-form-validation/dist/jquery.validation.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-typeahead/dist/jquery.typeahead.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('backend/vendors/autosize/dist/autosize.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap-show-password/dist/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('backend/vendors/tempus-dominus-bs4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('backend/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap-sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('backend/vendors/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{asset('backend/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('backend/vendors/ionrangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('backend/vendors/nestable/jquery.nestable.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('backend/cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/editable-table/mindmup-editabletable.js')}}"></script>
    <script src="{{asset('backend/vendors/d3/d3.min.js')}}"></script>
    <script src="{{asset('backend/vendors/c3/c3.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('backend/vendors/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chartist-plugin-tooltips-updated/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-countTo/jquery.countTo.js')}}"></script>
    <script src="{{asset('backend/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('backend/vendors/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('backend/vendors/d3-dsv/dist/d3-dsv.js')}}"></script>
    <script src="{{asset('backend/vendors/d3-time-format/dist/d3-time-format.js')}}"></script>
    <script src="{{asset('backend/vendors/techan/dist/techan.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.usa.js')}}" charset="utf-8"></script>

    <script src="{{asset('backend/components/css/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/menu-left/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/menu-top/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/sidebar/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/support-chat/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/topbar/index.js')}}"></script>
@extends('backend.layout.toaster')

    <!-- PRELOADER STYLES-->
    <style>
        .initial__loading {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDFweCIgIGhlaWdodD0iNDFweCIgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIiBjbGFzcz0ibGRzLXJvbGxpbmciPiAgICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBuZy1hdHRyLXN0cm9rZT0ie3tjb25maWcuY29sb3J9fSIgbmctYXR0ci1zdHJva2Utd2lkdGg9Int7Y29uZmlnLndpZHRofX0iIG5nLWF0dHItcj0ie3tjb25maWcucmFkaXVzfX0iIG5nLWF0dHItc3Ryb2tlLWRhc2hhcnJheT0ie3tjb25maWcuZGFzaGFycmF5fX0iIHN0cm9rZT0iIzAxOTBmZSIgc3Ryb2tlLXdpZHRoPSIxMCIgcj0iMzUiIHN0cm9rZS1kYXNoYXJyYXk9IjE2NC45MzM2MTQzMTM0NjQxNSA1Ni45Nzc4NzE0Mzc4MjEzOCIgdHJhbnNmb3JtPSJyb3RhdGUoODQgNTAgNTApIj4gICAgICA8YW5pbWF0ZVRyYW5zZm9ybSBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgY2FsY01vZGU9ImxpbmVhciIgdmFsdWVzPSIwIDUwIDUwOzM2MCA1MCA1MCIga2V5VGltZXM9IjA7MSIgZHVyPSIxcyIgYmVnaW49IjBzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSI+PC9hbmltYXRlVHJhbnNmb3JtPiAgICA8L2NpcmNsZT4gIDwvc3ZnPg==);
            background-color: #fff;
        }

        [data-vb-theme='dark'] .initial__loading {
            background-color: #0c0c1b;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('.initial__loading').delay(200).fadeOut(400)
        })
    </script>
</head>

<body class="vb__layout--cardsShadow vb__menuLeft--dark">
<div class="initial__loading"></div>
<div class="vb__layout vb__layout--hasSider">
    <div class="vb__layout">
        <div class="vb__layout__content">
            <div class="vb__utils__content">
                <div class="vb__auth__authContainer">
                    <div class="vb__auth__containerInner">
                        <div class="card vb__auth__boxContainer">
                            <div class="text-dark font-size-24 mb-4">
                                <strong>Create your account</strong>
                            </div>
                            <form action="{{route('auth.create')}}" method="POST" class="mb-4" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Full Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password" />
                                </div>
                                <div class="form-group mb-4">
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" name="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary text-center w-100">
                                    <strong>Sign Up</strong>
                                </button>
                            </form>
                        </div>
                        <div class="text-center pt-2 mb-auto">
                            <span class="mr-2">Already have an account?</span>
                            <a href="{{route('login')}}" class="vb__utils__link font-size-16">
                                Sign in
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
