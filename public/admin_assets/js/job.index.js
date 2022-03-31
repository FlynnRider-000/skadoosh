jQuery(function ($) {
  // DataTable
  $('#list-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: jobUrl,
      columns: [
          { data: 'id' },
          { data: 'title' },
          { data: 'jobType' },
          { data: 'location' },
          { data: 'apply' },
          { data: 'premium' },
          { data: 'category' },
          { data: 'company' },
          { data: 'action' }
      ]
  });
})
$(document).on("ready", function() {
  $("#list-table").on("click", ".deleteJobButton", function() {
      if (window.confirm("Are you sure?")) {
          var id = $(this).data("jobid");
          var token = $("meta[name='csrf-token']").attr("content");
          var url = "{{ URL('admin/job') }}";
          $.ajax(
          {
              url: url+"/"+id,
              type: "DELETE",
              data: {
                  "id": id,
                  "_token": token,
              },
              success: function (data) {
                  var dataResult = JSON.parse(data);
                  alert(dataResult.message)
                  if(dataResult.status == 1) {
                      window.location.reload();
                  }
              }
          });
      }
  });

  $("#list-table").on("click", ".makeJobPremium", function() {
      if (window.confirm("Are you sure?")) {
          var id = $(this).data("jobid");
          var token = $("meta[name='csrf-token']").attr("content");
          var url = "{{ URL('admin/make-premium') }}";
          $.ajax(
          {
              url: url,
              type: "POST",
              data: {
                  "id": id,
                  "_token": token,
              },
              success: function (data) {
                  var dataResult = JSON.parse(data);
                  alert(dataResult.message)
                  if(dataResult.status == 1) {
                      window.location.reload();
                  }
              }
          });
      }
  });

  $("#list-table").on("click", ".removeJobPremium", function() {
      if (window.confirm("Are you sure?")) {
          var id = $(this).data("jobid");
          var token = $("meta[name='csrf-token']").attr("content");
          var url = "{{ URL('admin/remove-premium') }}";
          $.ajax(
          {
              url: url,
              type: "POST",
              data: {
                  "id": id,
                  "_token": token,
              },
              success: function (data) {
                  var dataResult = JSON.parse(data);
                  alert(dataResult.message)
                  if(dataResult.status == 1) {
                      window.location.reload();
                  }
              }
          });
      }
  });
});