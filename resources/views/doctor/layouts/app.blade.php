<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DOCTOR</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    @vite(['resources/js/app.js'])
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/table.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body class="sb-nav-fixed">
    <!-- Header -->
    <div id="loader"></div>
    @include('doctor.layouts.header')
    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('doctor.layouts.sidebar')
        {{-- {!! cache_sidebar() !!} --}}
        <div id="layoutSidenav_content">
            <main style="padding: 1rem">
                <!-- Content -->
                @yield('content-doctor')
            </main>
            <!-- Footer -->
            @include('doctor.layouts.footer')
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
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

    $(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>
