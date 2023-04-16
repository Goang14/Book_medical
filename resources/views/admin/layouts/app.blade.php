<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    @vite(['resources/js/app.js'])
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    {{-- <script defer type="text/javascript" src="{{ asset ("js/common.js") }}"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- css -->
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet"> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body class="sb-nav-fixed">

    <div id="loader"></div>
    @include('admin.layouts.header')
    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        {{-- {!! cache_sidebar() !!} --}}
        <div id="layoutSidenav_content">
            <main style="padding: 1rem">
                <!-- Content -->
                @yield('content-admin')
            </main>
            <!-- Footer -->
            @include('admin.layouts.footer')
        </div>
    </div>
</body>
</html>

<script>
    function loadPage(isLoad) {
    var loader = document.getElementById("loader");
    if (isLoad == false) {
        loader.classList.remove("loader--hidden");
    } else {
        loader.classList.add("loader--hidden");
    }
    }

    setTimeout(() => {
        loader.classList.add("loader--hidden");
    }, 1000);
</script>

