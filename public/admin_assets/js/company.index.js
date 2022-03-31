jQuery(function ($) {
  // DataTable
  $('#list-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: companyUrl,
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

$(document).on("ready", function () {
  $("list-table").on("click", ".deleteCompanyButton", function () {
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
            if (result.status == 1) {
              toastr["success"](result.message);
              companyDataTable.ajax.reload();
            } else {
              toastr["error"](result.message);
            }
          }
        });
    }
  })
})  