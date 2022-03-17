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
@slot('li_1') Companies @endslot
@slot('title') Companies @endslot
@endcomponent
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="companies-datatable" class="table table-bordered dt-responsive table-striped nowrap w-100">
              <thead>
                <tr>
                  <th>No</th>
                  <th>CompanyName</th>
                  <th>Email</th>
                  <th>Website</th>
                  <th>Twitter</th>
                  <th>Location</th>
                  <th>Statement</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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
        var compDataTable = $("#companies-datatable").DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.load-companies') }}",
          columns: [
            { data: 'id' },
            { data: 'companyname' },
            { data: 'email' },
            { data: 'website' },
            { data: 'twitter' },
            { data: 'location' },
            { data: 'statement' },
            { data: 'action' },
          ]
        })
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
      $("#companies-datatable").on('click', '.deleteCompanyButton', function () {
        var id = $(this).data("companyid");
        var token = $("meta[name='csrf-token']").attr("content");
        var url = "{{ URL('admin/company') }}";                
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, delete it!"
        }).then(function (result) {
          console.log("com",result)
            if(result.value){
              console.log("1");
                $.ajax(
                {
                    url: url+"/"+id,
                    type: "DELETE",
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (result) {
                      if(result.status == 1) {
                        $("#companies-datatable").DataTable().ajax.reload();
                        toastr["success"](result.message);
                      }else{
                          toastr["error"](result.message);
                      }
                    }
                });
            }
        })   
      })
    </script>
    @endsection