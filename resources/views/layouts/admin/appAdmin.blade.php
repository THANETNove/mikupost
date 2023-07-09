<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.admin.head')

<head>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.admin.navbar')
                @yield('content')
            </div>
            @include('layouts.admin.footerCopyright')
            @include('layouts.admin.footer')
        </div>
    </div>
</body>

</html>