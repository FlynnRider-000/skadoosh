$(document).ready(function(){
  var cateDataTable = $("#categories-datatable").DataTable({
      processing: true,
      serverSide: true,
      ajax: categoryUrl,
      columns: [
          { data: 'id' },
          { data: 'name' },
          { data: 'active' },
          { data: 'action' },
      ]
  });

  $("#categories-datatable").on('click', '.categoryDelete', function (e) {
      e.preventDefault();
      var token = $("meta[name='csrf-token']").attr("content");
      var url = $(this).attr('href');                
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
                  url: url,
                  type: "DELETE",
                  data: {
                      "_token": token,
                  },
                  success: function (result) {
                      if(result.status == 1) {
                          cateDataTable.ajax.reload();
                          toastr["success"](result.message);
                      }else{
                          toastr["error"](result.message);
                      }
                  }
              });
          }
      })
  })
})