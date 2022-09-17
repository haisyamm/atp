<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATP Login - Panel</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/demo.min.css') }}" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column" style="background-image:url({{ asset('assets/img/gallery/bg-login.png') }}); background-size: 100%; background-position: center; position: relative;">
    <div class="page page-center">
    <h2 class="text-center mb-4 h1"><img class="d-inline-block" src="{{ asset('assets/img/logo.png') }}" alt="logo" width="150"></h2>
        <div class="container-tight py-2">
            @yield('content')
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.min.js') }}"></script>
    <!-- Jquery -->
    <script src="{{ asset('assets/pus_dist/lib/jquery/jquery.min.js') }}"></script>
    @stack('script')
</body>

</html>