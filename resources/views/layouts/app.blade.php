
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'انجاز') }}</title>
    <link href="{{ asset('assets/img/logos/icons8-fast-forward-100.png') }}" rel="icon" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

    @yield('css')

    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">

    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('layouts.header')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('layouts.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            @yield('content')
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2022 © <b>Group 2</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ asset('assets/js/scripts/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    @yield('js')

</body>

</html>
