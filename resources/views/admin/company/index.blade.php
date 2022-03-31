@extends('layouts.admin.index')

@section('title', 'List of Companies')

@section('content_header', 'List of Companies')

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="widget-box">
          <div class="widget-header">
            @include('admin.company.partial.addButton')
          </div>
        </div>
        <div class="widget-body">
          <div class="widget-main">
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
    <script>
      var companyUrl = "{{ route('admin.load-companies') }}";
    <script>
    <script src="{{ asset('/admin_assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/admin_assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
    
    <script src="{{ asset('/admin_assets/js/company.index.js')}}"></script>
    @endsection