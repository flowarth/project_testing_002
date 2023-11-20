<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{ Storage::url('logo_unri.svg') }}">

    <!-- App css -->
    <link href="{{ url('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary">

    <div id="app">
        @yield('content')
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="{{ url('backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/js/metismenu.min.js') }}"></script>
    <script src="{{ url('backend/js/waves.js') }}"></script>
    <script src="{{ url('backend/js/simplebar.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('backend/js/theme.js') }}"></script>

</body>

</html>
