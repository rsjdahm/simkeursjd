<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Keuangan BLUD RSJD Atma Husada Mahakam">
    <meta name="author" content="Moh. Walid Arkham Sani">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="auth-url" content="{{ route('login') }}" />

    <title>SimKeU RSJD AHM</title>

    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{ asset('assets/@fortawesome/fontawesome-free/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.bootstrap-4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nprogress.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=' . time()) }}" />
    @stack('styles')

</head>

<body>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/material-dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/nprogress.js') }}"></script>
    @include('_script')
    @stack('scripts')

    <div id="app"></div>

</body>

</html>