<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>404 Not Found !!</title>
    <meta name="author" content="ukieweb" />
    <meta name="keywords" content="404 page, worker, css3, template, html5 template, ukieweb" />
    <meta name="description" content="404 - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="{{asset('not_found/boostrap-files/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="{{asset('not_found/css/style.css')}}" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="{{asset('not_foundassets/css/respons.css')}}" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('not_foundassets/img/favicons/favicon144x144.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('not_found/img/favicons/favicon114x114.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('not_found/img/favicons/favicon72x72.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('not_found/img/favicons/favicon57x57.png')}}" />
    <link rel="shortcut icon" href="{{asset('not_found/img/favicons/favicon.png')}}" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,800italic,800,700italic,700,600italic,600,400italic,300' rel='stylesheet' type='text/css' />

</head>
<body>

<!-- Load page -->
<div class="animationload">
    <div class="loader">
    </div>
</div>
<!-- End load page -->


<!-- Content Wrapper -->
<div id="wrapper">
    <div class="container">

        <!-- brick of wall -->
        <div class="brick"></div>
        <!-- end brick of wall -->

        <!-- Number -->
        <div class="number">
            <div class="four"></div>
            <div class="zero">
                <div class="nail"></div>
            </div>
            <div class="four"></div>
        </div>
        <!-- end Number -->

        <!-- Info -->
        <div class="info">
            <h2>Something is wrong</h2>
            <p>The page you are looking for was moved, removed, renamed or might never existed.</p>
            <a href="{{route('/')}}" class="btn">Go Home</a>
        </div>
        <!-- end Info -->

    </div>
    <!-- end container -->
</div>
<!-- end Content Wrapper -->

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <!-- Worker -->
        <div class="worker"></div>
        <!-- Tools -->
        <div class="tools"></div>
    </div>
    <!-- end container -->
</footer>
<!-- end Footer -->

<!-- Scripts -->
<script src="{{asset('not_found/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('not_found/boostrap-files/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('not_found/js/modernizr.custom.js')}}" type="text/javascript"></script>
<script src="{{asset('not_found/js/scripts.js')}}" type="text/javascript"></script>

</body>
</html>
