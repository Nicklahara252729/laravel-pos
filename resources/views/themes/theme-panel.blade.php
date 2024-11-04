<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ assetAttribute('application name') }} - {{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/' . assetAttribute('logo')) }}" />

    @vite('resources/css/app.css')

    <link rel="stylesheet" type="text/css" href="{{ asset(css()['plugin'] . '.css') }}">

    <link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/vendors/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/vendors/flag-icons/css/flag-icons.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/css/config/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/css/config/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/config/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/daterangepicker/daterangepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/config/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/config/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(css()['css'] . '.css') }}">

</head>

<body data-layout="vertical" data-sidebar="light" data-spy="scroll" data-target=".right-side-nav" data-offset="175">
    <div id="layout-wrapper">

        {{-- header --}}
        <header id="page-topbar" class="isvertical-topbar">
            <div class="navbar-header">
                @include('themes.component.header.outlet')
                <div class="d-flex">
                    <button type="button" onclick="window.location='/dokumentasi'" class="btn header-item noti-icon">
                        <i class="bx bx-book-open icon-sm align-middle"></i>
                    </button>
                    @include('themes.component.header.notification')
                    @include('themes.component.header.profile')
                </div>
            </div>
        </header>

        {{-- sidebar --}}
        <div class="vertical-menu">
            @include('themes.component.sidebar.header')
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="bx bx-menu align-middle"></i>
            </button>
            @include('themes.component.sidebar.menu')
        </div>

        <header class="ishorizontal-topbar">
            <div class="navbar-header">
            </div>

            <div class="topnav">
            </div>
        </header>

        {{-- main content --}}
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include('themes.component.breadcrumb')
                    @yield('content')
                </div>
            </div>
            @include('themes.component.footer')
        </div>
    </div>

    {{-- modal --}}
    @include("themes.component.modal.change-log")
    @yield('modal')
    <script src="{{ asset('assets/js/config/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/metismenujs/metismenujs.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/eva-icons/eva.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/momentjs/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/daterangepicker/daterangepicker.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/vendors/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/config/app.js') }}"></script>
    <script src="{{ asset('assets/js/config/config.js') }}"></script>
    <script src="{{ asset('assets/js/config/custom.js') }}"></script>

    <script src="{{ asset('assets/vendors/js-cookie/dist/js.cookie.min.js') }}"></script>

    <script src="{{ asset(js()['plugin'] . '.js') }} "></script>
    <script src="{{ asset(js()['js'] . '.js') }} " type="module"></script>

</body>

</html>
