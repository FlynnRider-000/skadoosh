@extends('layouts.backend.master')
@section('title') Categories @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/admin_assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/admin_assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/admin_assets/libs/toastr/toastr.min.css') }}">
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Jobs @endslot
@slot('title') Jobs @endslot
@endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="jobs-datatable" class="table table-bordered dt-responsive table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Job Type</th>
                                <th>Location</th>
                                <th>Apply</th>
                                <th>Post Type</th>
                                <th>Category</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/admin_assets/libs/datatables/datatables.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('/admin_assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/admin_assets/libs/pdfmake/pdfmake.min.js') }}"></script> --}}
    
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/admin_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ URL::asset('/admin_assets/libs/toastr/toastr.min.js') }}"></script>

    <!-- Datatable init js -->
    {{-- <script src="{{ URL::asset('/admin_assets/js/pages/datatables.init.js') }}"></script> --}}
    @if (session('message'))
        <script>
            $(document).ready(function () {    
                toastr["success"]("{{ session('message') }}");
            });
        </script>
    @endif
    <script>
        var jobUrl = "{{ route('admin.load-jobs') }}";
    </script>
    <script src="{{ URL::asset('/admin_assets/js/job.list.js') }}"></script>
@endsection