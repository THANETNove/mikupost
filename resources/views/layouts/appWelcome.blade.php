<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">




    <title>mikupost</title>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="100">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('layouts.navbarWelcome')


    <main class="body-dark">
        @yield('content')
    </main>


    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/aos.js')}}"></script>

    <script src="{{URL::asset('assets/js/custom.js')}}"></script>
</body>

</html>