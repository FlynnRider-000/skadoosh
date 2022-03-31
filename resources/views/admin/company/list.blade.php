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
    <script>
      var companyUrl = "{{ route('admin.load-companies') }}";
    </script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/admin_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ URL::asset('/admin_assets/libs/toastr/toastr.min.js') }}"></script>

    <!-- Datatable init js -->
    @if (session('message'))
        <script>
            $(document).ready(function () {    
                toastr["success"]("{{ session('message') }}");
            });
        </script>
    @endif
    <script src="{{ asset('/admin_assets/js/company.list.js')}}"></script>
    @endsection