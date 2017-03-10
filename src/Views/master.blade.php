<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('head_title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('vendor/becoded/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('vendor/becoded/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('vendor/becoded/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <!-- link href="{{ asset('vendor/becoded/plugins/morrisjs/morris.css') }}" rel="stylesheet" /-->

    <!-- Custom Css -->
    <link href="{{ asset('vendor/becoded/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('vendor/becoded/css/themes/all-themes.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="theme-red">
@include('becoded_view::partials.nav')
<!-- #Top Bar -->
@include('becoded_view::partials.sidebar')

<section class="content">
    <div class="container-fluid">

        @yield('content')

    </div>
</section>

<!-- Jquery Core Js -->
<script src="{{ asset('vendor/becoded/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('vendor/becoded/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('vendor/becoded/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('vendor/becoded/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('vendor/becoded/plugins/node-waves/waves.js') }}"></script>

@yield('scripts')

</body>

</html>