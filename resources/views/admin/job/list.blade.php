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
        $(document).ready(function () {
            var jobDataTable = $("#jobs-datatable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.load-jobs') }}",
                columns: [
                    { data: 'id' },
                    { data: 'title' },
                    { data: 'jobType' },
                    { data: 'location' },
                    { data: 'apply' },
                    { data: 'is_premium' },
                    { data: 'category' },
                    { data: 'company' },
                    { data: 'action' }
                ]
            });
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            $("#jobs-datatable").on('click', '.deleteJobButton', function () {
                var id = $(this).data("jobid");
                var token = $("meta[name='csrf-token']").attr("content");
                var url = "{{ URL('admin/job') }}";                
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, delete it!"
                }).then(function (result) {
                    if(result.value){
                        $.ajax({
                            url: url+"/"+id,
                            type: "DELETE",
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (result) {
                                if(result.status == 1) {
                                    jobDataTable.ajax.reload();
                                    toastr["success"](result.message);
                                }else{
                                    toastr["error"](result.message);
                                }
                            }
                        });
                    }
                })
            })

            $("#jobs-datatable").on("click", ".makeJobPremium", function() {
                var id = $(this).data("jobid");
                var token = $("meta[name='csrf-token']").attr("content");
                var url = "{{ URL('admin/make-premium') }}";
                Swal.fire({
                    title: "Are you sure?",
                    icon: "question",
                    showCancelButton: !0,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, it is!"
                }).then(function (result) {
                    if(result.value){
                        $.ajax(
                        {
                            url: url,
                            type: "POST",
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (result) {
                                if(result.status == 1) {
                                    toastr["success"](result.message);
                                    jobDataTable.ajax.reload();
                                }else{
                                    toastr["error"](result.message);
                                }
                            }
                        });
                    }
                })   
            })  
            $("#jobs-datatable").on("click", ".removeJobPremium", function() {
                var id = $(this).data("jobid");
                var token = $("meta[name='csrf-token']").attr("content");
                var url = "{{ URL('admin/remove-premium') }}";                
                Swal.fire({
                    title: "Are you sure?",
                    icon: "question",
                    showCancelButton: !0,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, it is!"
                }).then(function (result) {
                    if(result.value){
                        $.ajax(
                        {
                            url: url,
                            type: "POST",
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (result) {
                                if(result.status == 1) {
                                    toastr["success"](result.message);
                                    jobDataTable.ajax.reload();
                                }else{
                                    toastr["error"](result.message);
                                }
                            }
                        });
                    }
                })   

            });

        });
    </script>
@endsection