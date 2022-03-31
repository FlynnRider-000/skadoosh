$(document).ready(function(){
  $(document).on('submit', '.subscribe-form', function(e){
      e.preventDefault();
      $this = this;
      $.ajax({
          url: $(this).attr('action'),
          method: 'POST',
          headers: { 'X-CSRF-Token': $("meta[name='csrf-token']").attr("content") },
          data: $(this).serialize(),
          success: function(res){
              if(res == 'success'){
                  Swal.fire({
                      title: "Please check your email box to verify your email address.",
                      icon: "success",
                      showConfirmButton: !1,
                      timer: 3000
                  });
                  $($this)[0].reset();
              }
          },
          error: function(res){
              Swal.fire({
                  icon: "error",
                  title: res.responseJSON.errors.email,
                  showConfirmButton: !1,
                  timer: 5000
              })
          }
      })
  })
})