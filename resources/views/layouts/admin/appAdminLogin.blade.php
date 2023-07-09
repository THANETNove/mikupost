<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.admin.head')

<head>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-gradient-primary">


    <main>
        @yield('content')
    </main>
    @include('layouts.admin.footer')
</body>

</html>