<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.user.headWeb')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="100" class="wrapper">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('layouts.user.navbarWelcome')


    <div class="body-dark wrapper">
        @yield('content')
        @include('layouts.user.footer')
    </div>


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