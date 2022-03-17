<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Job Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Job Finder" name="description" />
    <meta content="JianWang" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    @include('layouts.backend.head-css')
</head>

@section('body')
    <body data-sidebar="dark">
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.backend.topbar')
        @include('layouts.backend.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.backend.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    {{-- @include('layouts.right-sidebar') --}}
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('/admin_assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/admin_assets/js/pages/form-editor.init.js') }}"></script>
    @include('layouts.backend.vendor-scripts')
</body>

</html>
