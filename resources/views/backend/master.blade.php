<!DOCTYPE html>
<html lang="en" data-vb-theme="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        E-Commerce Vendor
    </title>
    <link rel="icon" type="image/png" href="{{asset('backend/components/css/img/favicon.png')}}" />
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700,800&amp;display=swap" rel="stylesheet">

{{--    @extends('backend.layout.header')--}}

    <!-- VENDORS -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/ladda/dist/ladda-themeless.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('backend/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/fullcalendar/dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/bootstrap-sweetalert/dist/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/summernote/dist/summernote.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/ionrangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('backend/cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/c3/c3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/chartist/dist/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/nprogress/nprogress.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/jquery-steps/demo/css/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/dropify/dist/css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/font-feathericons/dist/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/font-linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/font-icomoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">

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

    <!-- VISUAL BUILDER MODULES-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/css/vendors/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/css/core.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/css/layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/css/measurements.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/css/utils.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/widgets/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/apps/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/ecommerce/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/dashboards/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/system/auth/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/breadcrumbs/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/footer/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/menu-left/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/menu-top/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/sidebar/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/support-chat/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/components/layout/topbar/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/multiple/fileup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}

    <script src="{{asset('backend/components/css/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/menu-left/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/menu-top/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/sidebar/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/support-chat/index.js')}}"></script>
    <script src="{{asset('backend/components/layout/topbar/index.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
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
{{-------------------------------------------Support Chat Start-------------------------------------------}}
    <div class="vb__chat">
        <button class="vb__chat__toggleButton vb__chat__actionToggle">
            <i class="fe fe-message-square mr-md-2"></i>
            <span class="d-none d-md-inline">Support Chat</span>
        </button>
        <div class="vb__chat__container">
            <div class="d-flex flex-wrap mb-2">
                <div class="text-dark font-size-18 font-weight-bold mr-auto">Support Chat1</div>
                <button class="vb__g14__closeBtn btn btn-link">
                    <i class="fe fe-x-square font-size-21 align-middle text-gray-6"></i>
                </button>
            </div>
            <div class="height-300 d-flex flex-column justify-content-end">
                <div class="vb__g14__contentWrapper vb__customScroll">
                    <div class="vb__g14__message">
                        <div class="vb__g14__messageContent">
                            <div class="text-gray-4 font-size-12 text-uppercase">You, 5 min ago</div>
                            <div>
                                Hi! Anyone here? I want to know how I can buy Clean UI KIT Pro?
                            </div>
                        </div>
                        <div class="vb__g14__messageAvatar vb__utils__avatar">
                            <img src="{{asset('backend/components/css/img/avatars/avatar_2.png')}}" alt="You" />
                        </div>
                    </div>
                    <div class="vb__g14__message vb__g14__message--answer">
                        <div class="vb__g14__messageContent">
                            <div class="text-gray-4 font-size-12 text-uppercase">Mary, 14 sec ago</div>
                            <div>
                                Please call us + 100 295 000
                            </div>
                        </div>
                        <div class="vb__g14__messageAvatar vb__utils__avatar mr-3">
                            <img src="{{asset('backend/components/css/img/avatars/2.jpg')}}" alt="Mary Stanform" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-2 pb-2">
                Mary is typing...
            </div>
            <div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Send message..." aria-label="Recipient's username" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fe fe-send align-middle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-------------------------------------------Support Chat End-------------------------------------------}}
    <div class="vb__sidebar vb__customScroll">
        <div class="vb__sidebar__inner">
            <a href="javascript: void(0);" class="vb__sidebar__close vb__sidebar__actionToggle fe fe-x-circle"></a>
            <h5>
                <strong>Theme Settings</strong>
            </h5>
            <div class="vb__utils__line" style="margin-top: 25px; margin-bottom: 30px"></div>
            <div class="vb__sidebar__type">
                <div class="vb__sidebar__type__title">
                    <span>Application Name</span>
                </div>
                <div class="vb__sidebar__type__items">
                    <input id="appName" class="form-control" value="Visual Builder" />
                </div>
            </div>
            <div class="vb__sidebar__item hideIfMenuTop">
                <div class="vb__sidebar__label">
                    Left Menu: Collapsed
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__menuLeft--toggled" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item hideIfMenuTop">
                <div class="vb__sidebar__label">
                    Left Menu: Unfixed
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__menuLeft--unfixed" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item hideIfMenuTop">
                <div class="vb__sidebar__label">
                    Left Menu: Shadow
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__menuLeft--shadow" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Menu: Color
                </div>
                <div class="vb__sidebar__container">
                    <div class="vb__sidebar__select" to="body">
                        <div class="vb__sidebar__select__item vb__sidebar__select__item--white vb__sidebar__select__item--active">
                        </div>
                        <div class="vb__sidebar__select__item vb__sidebar__select__item--gray"
                             setting="vb__menuLeft--gray vb__menuTop--gray"></div>
                        <div class="vb__sidebar__select__item vb__sidebar__select__item--black"
                             setting="vb__menuLeft--dark vb__menuTop--dark"></div>
                    </div>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Auth: Background
                </div>
                <div class="vb__sidebar__container">
                    <div class="vb__sidebar__select" to="body">
                        <div class="vb__sidebar__select__item vb__sidebar__select__item--white vb__sidebar__select__item--active">
                        </div>
                        <div class="vb__sidebar__select__item vb__sidebar__select__item--gray" setting="vb__auth--gray"></div>
                        <div class="vb__sidebar__select__item vb__sidebar__select__item--img" setting="vb__auth--img"></div>
                    </div>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Topbar: Fixed
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__topbar--fixed" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Topbar: Gray Background
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__topbar--gray" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    App: Content Max-Width
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__layout--contentMaxWidth" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    App: Max-Width
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__layout--appMaxWidth" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    App: Gray background
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__layout--grayBackground" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Cards: Squared Borders
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__layout--squaredBorders" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Cards: Shadow
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__layout--cardsShadow" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
            <div class="vb__sidebar__item">
                <div class="vb__sidebar__label">
                    Cards: Borderless
                </div>
                <div class="vb__sidebar__container">
                    <label class="vb__sidebar__switch">
                        <input type="checkbox" to="body" setting="vb__layout--borderless" />
                        <span class="vb__sidebar__switch__slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="vb__menuLeft">
        <div class="vb__menuLeft__mobileTrigger"><span></span></div>
        <div class="vb__menuLeft__trigger"></div>
        <div class="vb__menuLeft__outer">
            <div class="vb__menuLeft__logo__container">
                <div class="vb__menuLeft__logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" version="1.1" height="24px" width="24px">
                        <g>
                            <path fill="#4b7cf3" strokeWidth="1" stroke="#4b7cf3"
                                  d="M12,10.9c-0.1,0-0.2,0-0.2-0.1L3.5,6.1C3.4,6,3.3,5.8,3.3,5.6c0-0.2,0.1-0.3,0.2-0.4l8.2-4.7c0.2-0.1,0.3-0.1,0.5,0      l8.2,4.7c0.2,0.1,0.2,0.3,0.2,0.4S20.6,6,20.5,6.1l-8.2,4.7C12.2,10.8,12.1,10.9,12,10.9z M4.8,5.6L12,9.8l7.2-4.2L12,1.5      L4.8,5.6z" />
                            <path fill="#4b7cf3" strokeWidth="1" stroke="#4b7cf3"
                                  d="M13.6,23.6c-0.1,0-0.2,0-0.2-0.1c-0.2-0.1-0.2-0.3-0.2-0.4v-9.5c0-0.2,0.1-0.3,0.2-0.4l8.2-4.7c0.2-0.1,0.3-0.1,0.5,0      c0.2,0.1,0.2,0.3,0.2,0.4v9.5c0,0.2-0.1,0.3-0.3,0.4l-8.2,4.7C13.8,23.6,13.7,23.6,13.6,23.6z M14.1,13.9v8.3l7.2-4.2V9.8      L14.1,13.9z" />
                            <path fill="#4b7cf3" strokeWidth="1" stroke="#4b7cf3"
                                  d="M10.4,23.6c-0.1,0-0.2,0-0.2-0.1l-8.2-4.7c-0.2-0.1-0.3-0.3-0.3-0.4V8.9c0-0.2,0.1-0.3,0.2-0.4c0.2-0.1,0.3-0.1,0.5,0      l8.2,4.7c0.2,0.1,0.2,0.3,0.2,0.4v9.5c0,0.2-0.1,0.3-0.2,0.4C10.5,23.6,10.5,23.6,10.4,23.6z M2.7,18.1l7.2,4.2v-8.3L2.7,9.8      V18.1z" />
                        </g>
                    </svg>
                    <div class="vb__menuLeft__logo__name">Visual Builder</div>
                </div>
            </div>
            <div class="vb__menuLeft__scroll vb__customScroll">
                <ul class="vb__menuLeft__navigation">
{{-------------------------------------------Dashboard Start-------------------------------------------}}
                    <li class="vb__menuLeft__item">
          <a class="vb__menuLeft__item__link<?php if (\Request::is('dashboard')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('dashboard')}}">
                Dashboard
            <i class="vb__menuLeft__item__icon fe fe-home"></i>
          </a>
                    </li>
{{-------------------------------------------Dashboard End-------------------------------------------}}

{{--------------------------------------branch -------------------------------------------------}}

<li class="vb__menuLeft__item">
    <a class="vb__menuLeft__item__link<?php if (\Request::is('branch')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('branch')}}">
        {{ln('branch')}}
      <i class="vb__menuLeft__item__icon icmn-office"></i>
    </a>
</li>
{{--------------------------------------Stock -------------------------------------------------}}
<li class="vb__menuLeft__item vb__menuLeft__submenu  <?php if (\Request::is('stock/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?> ">
    <span class="vb__menuLeft__item__link">
      <span class="vb__menuLeft__item__title">Stock Settings</span>
      <i class="vb__menuLeft__item__icon icmn-stats-bars"></i>
    </span>
                  <ul class="vb__menuLeft__navigation" <?php if (\Request::is('stock/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
                    <li class="vb__menuLeft__item">
                        <a class="vb__menuLeft__item__link <?php if (\Request::is('stock/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('stock.index')}}">
                            <span class="vb__menuLeft__item__title ">Stock</span>
                        </a>
                    </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('stock/stock')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('stock.view')}}">
                              <span class="vb__menuLeft__item__title ">Add Stock</span>
                          </a>
                      </li>
                  </ul>
</li>

{{---------------------------------------------Customers--------------------------------------------------}}
                    {{-- <li class="vb__menuLeft__item vb__menuLeft__submenu">
          <span class="vb__menuLeft__item__link">
            <span class="vb__menuLeft__item__title">Customers</span>
            <i class="vb__menuLeft__item__icon fe fe-user"></i>
          </span>
                        <ul class="vb__menuLeft__navigation">
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link" href="{{route('customers_list.index')}}">
                                    <span class="vb__menuLeft__item__title">Customers List</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
{{---------------------------------------------Customers-END-------------------------------------------------}}

<!---------------------------------------Home Page Settings------------------------------------------->
<li class="vb__menuLeft__item vb__menuLeft__submenu  <?php if (\Request::is('home/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?> ">
    <span class="vb__menuLeft__item__link">
      <span class="vb__menuLeft__item__title">Home Page Settings</span>
      <i class="vb__menuLeft__item__icon fe fe-edit"></i>
    </span>
                  <ul class="vb__menuLeft__navigation" <?php if (\Request::is('home/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?> >
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('home/slider')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.slider')}}" id="click_setting">
                              <span class="vb__menuLeft__item__title" id="slider">Slider</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('home/service')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.service')}}">
                              <span class="vb__menuLeft__item__title">Services</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('home/banner')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.banner')}}">
                              <span class="vb__menuLeft__item__title">{{ln('horizontal')}} {{ln('banner')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('home/rigth_side_banner')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.rigth_side_banner')}}">
                              <span class="vb__menuLeft__item__title">{{ln('vertical')}} {{ln('banner')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('home/reviews')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.reviews')}}">
                              <span class="vb__menuLeft__item__title">Testimonial</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('home/partner')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.partner')}}">
                              <span class="vb__menuLeft__item__title">Partners</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('theme/social')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('home.social')}}">
                              <span class="vb__menuLeft__item__title">Social Links</span>
                          </a>
                      </li>
                  </ul>
              </li>
<!---------------------------------------Home Page Settings------------------------------------------->
<!--------------------------------------------language------------------------------------------------>
                    <li class="vb__menuLeft__item">
                        <a class="vb__menuLeft__item__link <?php if (\Request::is('language/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('language.add')}}">
            <span class="vb__menuLeft__item__title">
                 Language
            </span>
                            <i class="vb__menuLeft__item__icon fe fe-at-sign"></i>
                        </a>
                    </li>
<!--------------------------------------------language------------------------------------------------>
<!-----------------------------------------Theme Settings--------------------------------------------->
<li class="vb__menuLeft__item vb__menuLeft__submenu  <?php if (\Request::is('theme/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?> ">
          <span class="vb__menuLeft__item__link">
            <span class="vb__menuLeft__item__title">Theme Settings</span>
            <i class="vb__menuLeft__item__icon fe fe-at-sign"></i>
          </span>
                        <ul class="vb__menuLeft__navigation" <?php if (\Request::is('theme/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link <?php if (\Request::is('theme/view')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('theme.view')}}">
                                    <span class="vb__menuLeft__item__title ">View Theme</span>
                                </a>
                            </li>
                        </ul>

<!-----------------------------------------Theme Settings--------------------------------------------->

{{--------------------------------------------Manage Categories--------------------------------------------------}}
<li class="vb__menuLeft__item vb__menuLeft__submenu <?php if (\Request::is('category/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?>">
    <span class="vb__menuLeft__item__link">
      <span class="vb__menuLeft__item__title">Manage Categories</span>
      <i class="vb__menuLeft__item__icon fe fe-cpu"></i>
    </span>
                  <ul class="vb__menuLeft__navigation" <?php if (\Request::is('category/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('category/main')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('category.main')}}">
                              <span class="vb__menuLeft__item__title">{{ln('main_Categories')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('category/subcategory/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('category.subcategory.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('sub')}} {{ln('categrory')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('category/childcategory/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('category.childcategory.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('child')}} {{ln('categrory')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                        <a class="vb__menuLeft__item__link <?php if (\Request::is('category/brand/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('category.brand.index')}}">
                            <span class="vb__menuLeft__item__title">{{ln('brand')}}</span>
                        </a>
                    </li>
                  </ul>
              </li>
{{--------------------------------------------Manage Categories-END-------------------------------------------------}}

{{-------------------------------------------Settings Start-------------------------------------------}}
<li class="vb__menuLeft__item vb__menuLeft__submenu <?php if (\Request::is('sattings/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?> ">
    <span class="vb__menuLeft__item__link">
      <span class="vb__menuLeft__item__title">Settings</span>
      <i class="vb__menuLeft__item__icon fe fe-settings"></i>
    </span>
                  <ul class="vb__menuLeft__navigation" <?php if (\Request::is('sattings/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
                      <li class="vb__menuLeft__item vb__menuLeft__submenu <?php if (\Request::is('sattings/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?>">
{{--        <span class="vb__menuLeft__item__link">--}}
{{--       <span class="vb__menuLeft__item__title">Components</span>--}}
{{--        </span>--}}
{{--                         <ul class="vb__menuLeft__navigation">--}}
{{--                              <li class="vb__menuLeft__item">--}}
{{--           <span class="vb__menuLeft__item__link">--}}
{{--             <span class="vb__menuLeft__item__title">--}}
{{--                 <a href="{{route('components.add')}}">Add</a>--}}
{{--            </span>--}}
{{--           </span>--}}
{{--                             </li>--}}
{{--                         </ul>--}}
                              <li class="vb__menuLeft__item">
                                  <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/logo')) {  echo ' vb__menuLeft__item--active'; } ?>" id="logo" href="{{route('sattings.logo')}}">
                                      <span class="vb__menuLeft__item__title" id="span_logo">{{ln('logo')}}</span>
                                  </a>
                              </li>
                              <li class="vb__menuLeft__item">
                                  <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/favicon/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.favicon.index')}}">
                                      <span class="vb__menuLeft__item__title">{{ln('favicon')}}</span>
                                  </a>
                              </li>

                          <li class="vb__menuLeft__item">
                              <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/background/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.background.index')}}">
                                  <span class="vb__menuLeft__item__title">{{ln('background')}} {{ln('image')}}</span>
                              </a>
                          </li>
                              <li class="vb__menuLeft__item">
                                  <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/footer/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.footer.index')}}">
                                      <span class="vb__menuLeft__item__title">{{ln('footer')}}</span>
                                  </a>
                              </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/currency/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.currency.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('currency')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/faq_page/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.faq_page.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('faq')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/contact_us_page/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.contact_us_page.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('contact_us_page')}} </span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/terms_condition/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.terms_condition.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('terms_&_condition')}}</span>
                          </a>
                      </li>
                      <li class="vb__menuLeft__item">
                        <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/privacy_policy/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.privacy_policy.index')}}">
                            <span class="vb__menuLeft__item__title">{{ln('privacy_policy')}}</span>
                        </a>
                    </li>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('sattings/home_page_customization/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('sattings.home_page_customization.index')}}">
                              <span class="vb__menuLeft__item__title">{{ln('home')}} {{ln('page')}} {{ln('settings')}}</span>
                          </a>
                      </li>
                  </ul>
              </li>
{{-------------------------------------------Settings End-------------------------------------------}}

{{-------------------------------------------Orders Start-------------------------------------------}}
{{--                     <li class="vb__menuLeft__item vb__menuLeft__submenu">--}}
{{--          <span class="vb__menuLeft__item__link">--}}
{{--            <span class="vb__menuLeft__item__title">Orders</span>--}}
{{--            <i class="vb__menuLeft__item__icon fe fe-minimize"></i>--}}
{{--          </span>--}}
{{--                        <ul class="vb__menuLeft__navigation">--}}

{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('order.all')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">All Orders</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('order.pending')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title"> Pending Orders</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('order.processing')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Processing Orders</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('order.complete')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Completed Orders</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('order.cancel')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Cancel Orders</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{-------------------------------------------Orders End-------------------------------------------}}

{{--------------------------------------------Auto Product Upload-------------------------------------------------}}
{{--                     <li class="vb__menuLeft__item">--}}
{{--          <span class="vb__menuLeft__item__link">--}}
{{--            <span class="vb__menuLeft__item__title">Auto Product Upload</span>--}}
{{--            <i class="vb__menuLeft__item__icon fe fe-upload"></i>--}}
{{--          </span>--}}
{{--                    </li>--}}
 {{--------------------------------------------Auto Product Upload-END-------------------------------------------------}}


{{--------------------------------------------Email Settings------------------------------------------------}}
{{--                     <li class="vb__menuLeft__item vb__menuLeft__submenu">--}}
{{--          <span class="vb__menuLeft__item__link">--}}
{{--            <span class="vb__menuLeft__item__title">Email Settings</span>--}}
{{--            <i class="vb__menuLeft__item__icon fe fe-at-sign"></i>--}}
{{--          </span>--}}
{{--                        <ul class="vb__menuLeft__navigation">--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('email_templates.index')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Email Template</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('email_configurations.index')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Email Configurations</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{-------------------------------------------Email Settings-END-------------------------------------------------}}


{{--------------------------------------------Report------------------------------------------------}}
{{--                     <li class="vb__menuLeft__item vb__menuLeft__submenu">--}}
{{--          <span class="vb__menuLeft__item__link">--}}
{{--            <span class="vb__menuLeft__item__title">Report</span>--}}
{{--            <i class="vb__menuLeft__item__icon fe fe-at-sign"></i>--}}
{{--          </span>--}}
{{--                        <ul class="vb__menuLeft__navigation">--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('product.report')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Product Report</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('payment.report')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Payment Report</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('order.report')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Order Report</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="{{route('stock.report')}}">--}}
{{--                                    <span class="vb__menuLeft__item__title">Stock Report</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{-------------------------------------------Report Settings-END-------------------------------------------------}}




{{--------------------------------------------Manage Roles------------------------------------------------}}
{{--                     <li class="vb__menuLeft__item">--}}
{{--          <a class="vb__menuLeft__item__link" href="{{route('manage_role.index')}}">--}}
{{--            Manage Roles--}}
{{--            <i class="vb__menuLeft__item__icon fe fe-file-text"></i>--}}
{{--          </a>--}}
{{--                    </li>--}}


{{-------------------------------------------Manage Roles-END-------------------------------------------------}}

{{--------------------------------------------Payment Settings------------------------------------------------}}
{{--                     <li class="vb__menuLeft__item vb__menuLeft__submenu">--}}
{{--          <span class="vb__menuLeft__item__link">--}}
{{--            <span class="vb__menuLeft__item__title">Payment Settings</span>--}}
{{--            <i class="vb__menuLeft__item__icon fe fe-file-text"></i>--}}
{{--          </span>--}}
{{--                        <ul class="vb__menuLeft__navigation">--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="charts-c3.html">--}}
{{--                                    <span class="vb__menuLeft__item__title">Payment Information</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="charts-chart-js.html">--}}
{{--                                    <span class="vb__menuLeft__item__title">Payment Gateways</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="vb__menuLeft__item">--}}
{{--                                <a class="vb__menuLeft__item__link" href="charts-chart-js.html">--}}
{{--                                    <span class="vb__menuLeft__item__title">Currencies</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{-------------------------------------------Payment Settings-END-------------------------------------------------}}
{{---------------------------------------------Products--------------------------------------------------}}
                     <li class="vb__menuLeft__item vb__menuLeft__submenu <?php if (\Request::is('products/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?>">
          <span class="vb__menuLeft__item__link">
            <span class="vb__menuLeft__item__title">Products</span>
            <i class="vb__menuLeft__item__icon fe fe-shopping-cart"></i>
          </span>
                        <ul class="vb__menuLeft__navigation" <?php if (\Request::is('products/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link <?php if (\Request::is('products/index')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('products.index')}}">
                                    <span class="vb__menuLeft__item__title">Add New Product</span>
                                </a>
                            </li>
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link <?php if (\Request::is('products/all')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('products.all')}}">
                                    <span class="vb__menuLeft__item__title">All Products</span>
                                </a>
                            </li>
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link <?php if (\Request::is('products/cancel')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('products.cancel')}}">
                                    <span class="vb__menuLeft__item__title">Cancel Product</span>
                                </a>
                            </li>
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link <?php if (\Request::is('products/specification/index')) {  echo ' vb__menuLeft__item--active'; } ?>"  href="{{route('products.specification.index')}}">
                                    <span class="vb__menuLeft__item__title">{{ln('specification')}}</span>
                                </a>
                            </li>
                            <li class="vb__menuLeft__item">
                                <a class="vb__menuLeft__item__link <?php if (\Request::is('products/shipping')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('products.shipping')}}">
                                      Shipping
                                </a>
                                          </li>
                        </ul>
                    </li>

{{---------------------------------------------Products-END-------------------------------------------------}}

{{---------------------------------------------Featuers Products--------------------------------------------------}}



<li class="vb__menuLeft__item vb__menuLeft__submenu  <?php if (\Request::is('features/*')) { echo 'vb__menuLeft__submenu--toggled'; } else{echo '';} ?> ">
    <span class="vb__menuLeft__item__link">
      <span class="vb__menuLeft__item__title">Features Product</span>
      <i class="vb__menuLeft__item__icon icmn-stats-bars"></i>
    </span>
                  <ul class="vb__menuLeft__navigation" <?php if (\Request::is('features/*')) { echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
                      <li class="vb__menuLeft__item">
                          <a class="vb__menuLeft__item__link <?php if (\Request::is('features/features/product')) {  echo ' vb__menuLeft__item--active'; } ?>" href="{{route('features.view')}}">
                              <span class="vb__menuLeft__item__title ">Features Product</span>
                          </a>
                      </li>
                  </ul>
</li>

{{--------------------------------------------System Activation------------------------------------------------}}


                </ul>
            </div>
        </div>
    </div>
    <div class="vb__menuLeft__backdrop"></div>
    <div class="vb__layout">



{{-------------------------------------------Navbar Start-------------------------------------------}}
        <div class="vb__layout__header">
            <div class="vb__topbar">
                <div class="mr-4">
                 </div>
                <div class="mr-auto">
                    <div class="vb__topbar__search">
                        <i class="fe fe-search">

                        </i>
                        <input type="text" id="livesearch__input" placeholder="Type to search..." />
{{--                        <button onclick="edit_review()">click</button>--}}
                    </div>
                </div>

@php
$language = DB::table('language')->where('status',1)->get();
@endphp
                <div class="dropdown mr-4 d-none d-sm-block">
                    <a href="#" class="dropdown-toggle text-nowrap" data-toggle="dropdown" data-offset="5,15">
                        <span class="dropdown-toggle-text">{{selected_language()}}</span>
{{--                        <span class="dropdown-toggle-text" id="selected_language"></span>--}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        @if(isset($language))
                            @foreach($language as $key)
                                <a class="dropdown-item" onclick="language_change({{$key->lang_id}})" style="cursor: pointer;"><span class="text-uppercase font-size-12 mr-1">{{$key->short_form}}</span>
                                    {{$key->language_name}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="vb__topbar__actionsDropdown dropdown mr-4 d-none d-sm-block">
                    <a href="#" class="dropdown-toggle text-nowrap" data-toggle="dropdown" aria-expanded="false" data-offset="0,15">
                        <i class="dropdown-toggle-icon fe fe-bell"></i>
                    </a>
                    <div class="vb__topbar__actionsDropdownMenu dropdown-menu dropdown-menu-right" role="menu">
                        <div style="width: 350px;">
                            <div class="card-header card-header-flex">
                                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-bold nav-tabs-noborder nav-tabs-stretched">
                                    <li class="nav-item">
                                        <a href="#tab-alert-content" class="nav-link active" id="tab-alert" role="button" data-toggle="tab">
                                            Alerts
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab-events-content" class="nav-link" id="tab-events" role="button" data-toggle="tab">
                                            Events
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab-actions-content" class="nav-link" id="tab-actions" role="button" data-toggle="tab">
                                            Actions
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-alert-content" role="tabpanel" aria-labelledby="tab-alert-content">
                                        <div class="height-300 vb__customScroll">
                                            <ul class="list-unstyled">
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="vb__l2__title">
                                                            Update Status:
                                                            <strong class="text-black">New</strong>
                                                        </p>
                                                        <span class="vb__l2__span">5 min ago</span>
                                                    </div>
                                                    <p class="vb__l2__content text-muted">
                                                        Mary has approved your quote.
                                                    </p>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="vb__l2__title">
                                                            Update Status:
                                                            <strong class="text-danger">Rejected</strong>
                                                        </p>
                                                        <span class="vb__l2__span">15 min ago</span>
                                                    </div>
                                                    <p class="vb__l2__content text-muted">
                                                        Mary has declined your quote.
                                                    </p>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="vb__l2__title">
                                                            Payment Received:
                                                            <strong class="text-black">$5,467.00</strong>
                                                        </p>
                                                        <span class="vb__l2__span">15 min ago</span>
                                                    </div>
                                                    <p class="vb__l2__content text-muted">
                                                        GOOGLE, LLC AUTOMATED PAYMENTS PAYMENT
                                                    </p>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="vb__l2__title">
                                                            Notification:
                                                            <strong class="text-danger">Access Denied</strong>
                                                        </p>
                                                        <span class="vb__l2__span">5 Hours ago</span>
                                                    </div>
                                                    <p class="vb__l2__content text-muted">
                                                        The system prevent login to your account
                                                    </p>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="vb__l2__title">
                                                            Payment Received:
                                                            <strong class="text-black">$55,829.00</strong>
                                                        </p>
                                                        <span class="vb__l2__span">1 day ago</span>
                                                    </div>
                                                    <p class="vb__l2__content text-muted">
                                                        GOOGLE, LLC AUTOMATED PAYMENTS PAYMENT
                                                    </p>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="vb__l2__title">
                                                            Notification:
                                                            <strong class="text-danger">Access Denied</strong>
                                                        </p>
                                                        <span class="vb__l2__span">5 Hours ago</span>
                                                    </div>
                                                    <p class="vb__l2__content text-muted">
                                                        The system prevent login to your account
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-events-content" role="tabpanel" aria-labelledby="tab-alert-content">
                                        <div class="text-center py-4 bg-light rounded">
                                            No Events Today
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-actions-content" role="tabpanel" aria-labelledby="tab-alert-content">
                                        <div class="text-center py-4 bg-light rounded">
                                            No Actions Today
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-nowrap" data-toggle="dropdown" aria-expanded="false" data-offset="5,15">
                        <img class="dropdown-toggle-avatar" src="{{asset('upload/admin.png')}}" style="width: 40px;height: 30px;" alt="User avatar" />
{{--                        @if($image->image)--}}
{{--                        <img class="dropdown-toggle-avatar" src="{{$image->image}}" style="width: 40px;height: 30px;" alt="User avatar" />--}}
{{--                        @else--}}
{{--                            <img class="dropdown-toggle-avatar" src="{{asset('upload/admin.png')}}" style="width: 40px;height: 30px;" alt="User avatar" />--}}
{{--                            @endif--}}

{{--                      <?php  if (Session()->has('LoggedUser')) {--}}
{{--                            $user_id = Session::get('LoggedUser');--}}
{{--                            $image = DB::table('users')->where('id',$user_id)->first();--}}
{{--                            ?>--}}
{{--                         <?php  if($image->image) { ?>--}}
{{--                                <img class="dropdown-toggle-avatar" src="{{$image->image}}" style="width: 40px;height: 30px;" alt="User avatar" />--}}
{{--                        <?php } else { ?>--}}
{{--                                <img class="dropdown-toggle-avatar" src="{{asset('upload/admin.png')}}" style="width: 40px;height: 30px;" alt="User avatar" />--}}
{{--                          <?php } ?>--}}
{{--                       <?php } else {--}}
{{--                            return redirect()->route('login');--}}
{{--                  } ?>--}}


                    </a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="dropdown-icon fe fe-user"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i class="dropdown-icon fe fe-log-out"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
{{-------------------------------------------Navbar End-------------------------------------------}}
        <div class="vb__layout__content">
{{-------------------------------------------Content Start-------------------------------------------}}
           @yield('content')
{{-------------------------------------------Content End-------------------------------------------}}
        </div>

{{-------------------------------------------Footer Start-------------------------------------------}}
        <div class="vb__layout__footer">
            <div class="vb__footer">
                <div class="vb__footer__inner text-center">
                    <a href="https://apitsoft.com" target="_blank" rel="noopener noreferrer" class="vb__footer__logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" version="1.1" height="24px" width="24px">
                            <g>
                                <path fill="#4b7cf3" strokeWidth="1" stroke="#4b7cf3"
                                      d="M12,10.9c-0.1,0-0.2,0-0.2-0.1L3.5,6.1C3.4,6,3.3,5.8,3.3,5.6c0-0.2,0.1-0.3,0.2-0.4l8.2-4.7c0.2-0.1,0.3-0.1,0.5,0      l8.2,4.7c0.2,0.1,0.2,0.3,0.2,0.4S20.6,6,20.5,6.1l-8.2,4.7C12.2,10.8,12.1,10.9,12,10.9z M4.8,5.6L12,9.8l7.2-4.2L12,1.5      L4.8,5.6z" />
                                <path fill="#4b7cf3" strokeWidth="1" stroke="#4b7cf3"
                                      d="M13.6,23.6c-0.1,0-0.2,0-0.2-0.1c-0.2-0.1-0.2-0.3-0.2-0.4v-9.5c0-0.2,0.1-0.3,0.2-0.4l8.2-4.7c0.2-0.1,0.3-0.1,0.5,0      c0.2,0.1,0.2,0.3,0.2,0.4v9.5c0,0.2-0.1,0.3-0.3,0.4l-8.2,4.7C13.8,23.6,13.7,23.6,13.6,23.6z M14.1,13.9v8.3l7.2-4.2V9.8      L14.1,13.9z" />
                                <path fill="#4b7cf3" strokeWidth="1" stroke="#4b7cf3"
                                      d="M10.4,23.6c-0.1,0-0.2,0-0.2-0.1l-8.2-4.7c-0.2-0.1-0.3-0.3-0.3-0.4V8.9c0-0.2,0.1-0.3,0.2-0.4c0.2-0.1,0.3-0.1,0.5,0      l8.2,4.7c0.2,0.1,0.2,0.3,0.2,0.4v9.5c0,0.2-0.1,0.3-0.2,0.4C10.5,23.6,10.5,23.6,10.4,23.6z M2.7,18.1l7.2,4.2v-8.3L2.7,9.8      V18.1z" />
                            </g>
                        </svg>
                        <strong className="mr-2">APIT Soft</strong>
                    </a>
                    <br />
                    <p class="mb-0">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </p>
                </div>
            </div>
        </div>
{{-------------------------------------------Footer End-------------------------------------------}}
    </div>
</div>

<script>
    function language_change(lang_id)
    {

        $.ajax({
            type: "POST",
            url: "<?php echo route('ajax_langguage_change'); ?>",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                "Language_id": lang_id
            },
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) {
                if(data.return){
                    toastr.success("You Change Language In " + data.language_name);
                }
                else{
                    toastr.error("Something Went Wrong");
                }
                    setTimeout(function(){
                        location.reload();
                    }, 3000);


            }
        });

    }
/*-------------------------------------------Photo-------------------------------------------*/
        (function($) {
        'use strict'
        $(function() {
        $('.dropify').dropify()

        $('#form-validation').validate({
        submit: {
        settings: {
        inputContainer: '.form-group',
        errorListClass: 'form-control-error',
        errorClass: 'has-danger',
    },
    },
    })

        $('#form-validation .remove-error').on('click', function() {
        $('#form-validation').removeError()
    })

        $('#slider-1').ionRangeSlider({
        min: 0,
        max: 100,
        from: 50,
        step: 10,
        grid: true,
        grid_num: 10,
    })
    })
    })(jQuery)
/*-------------------------------------------Photo-------------------------------------------*/
/*----------------------------------------Datatables-----------------------------------------*/

        ; (function ($) {
        'use strict'
        $(function () {
            $('#example1').DataTable({
                responsive: true,
            })

            $('#example2').DataTable({
                autoWidth: true,
                scrollX: true,
                fixedColumns: true,
            })

            $('#example3').DataTable({
                autoWidth: true,
                scrollX: true,
                fixedColumns: true,
            })
        })
    })(jQuery)
/*----------------------------------------Datatables-----------------------------------------*/

    function confirm(link)
    {
        swal({
            title: "Are you sure?",
            text: "Want to Delete this file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e69a2a",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){

            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            window.location.href = link;
        });

}

</script>
@yield('js')

<!-- <script>
$('click_setting').click(function(){
    $('#setting_open_close').css({"display":"block"})
})
</script> -->
 <script src="{{asset('custom/custom.js')}}"></script>
</body>
</html>
