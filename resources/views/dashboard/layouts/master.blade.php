<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBook - Catatan Digital</title>

    <link rel="stylesheet" href="{{ asset('assets') }}/mazer/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/mazer/css/main/app-dark.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap/icons/bootstrap-icons.css">
    <script src="{{ asset('assets') }}/swal/sweetalert2.js"></script>

    <link rel="stylesheet" href="{{ asset('assets') }}/mazer/css/pages/toastify.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/mazer/css/shared/iconly.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/trix/trix.css">

</head>

<body>
    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading d-flex justify-content-between pe-3">
                <h3>Dashboard</h3>
                <h5>Halo, {{ auth()->user()->nama }}</h5>
            </div>
            <div class="page-content">
                @yield('dashboard')
            </div>

            @include('dashboard.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('assets') }}/mazer/js/app.js"></script>

    <script src="{{ asset('assets') }}/swal/sweetalert2.js"></script>
    <script src="{{ asset('assets') }}/mazer/js/pages/dashboard.js"></script>
    <script src="{{ asset('assets') }}/mazer/js/extensions/toastify.js"></script>

    <script src="{{ asset('assets') }}/trix/trix.js"></script>

    
    
</body>

</html>
