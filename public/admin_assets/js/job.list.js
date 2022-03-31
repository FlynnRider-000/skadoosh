$(document).ready(function () {
  var jobDataTable = $("#jobs-datatable").DataTable({
      processing: true,
      serverSide: true,
      ajax: jobUrl,
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