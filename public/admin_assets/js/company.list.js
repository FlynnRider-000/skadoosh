$(document).ready(function () {
  var compDataTable = $("#companies-datatable").DataTable({
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