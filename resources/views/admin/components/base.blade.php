<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lab Amikom</title>
    <link rel="shortcut icon" type="image/x-icon" href="" />
    
    <!--! BEGIN: CSS Files -->
    @yield('css-script')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .nxl-container {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    @include('admin.components.navbar')

    {{-- sidebar / header --}}
    @include('admin.components.header')

    {{-- Main container --}}
    <main class="nxl-container">
        {{-- content --}}
        @yield('dashboard')
        @yield('content')

        {{-- footer --}}
        @include('admin.components.footer')
    </main>

    {{-- theme-customizer --}}
    @include('admin.components.theme-customizer')

    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    @yield('script')

    <!--! BEGIN: Vendors JS -->
    <script src="{{ asset('assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/daterangepicker.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/select2-active.min.js')}}"></script>

    <!--! BEGIN: Apps Init -->
    <script src="{{ asset('assets/js/common-init.min.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard-init.min.js')}}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js')}}"></script>

    <!-- SweetAlert Include -->
    @include('sweetalert::alert')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>

</html>
