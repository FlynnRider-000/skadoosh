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
    <script src="{{ asset('/admin_assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/admin_assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
    
    <script type="text/javascript">
      jQuery(function ($) {
        // DataTable
        $('#list-table').DataTable({
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

      $(document).on("ready", function() {
        $("list-table").on("click", ".deleteCompanyButton", function() {
          if (window.confirm("Are you sure?")) {
            var id = $(this).data("jobid");
            var token = $("meta[name='csrf-token']").attr("content");
            var url = "{{ URL('admin/job') }}";
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
                      companyDataTable.ajax.reload();
                  }else{
                      toastr["error"](result.message);
                  }
              }
            });
          }
        })
      })  
    })
    </script>
    @endsection