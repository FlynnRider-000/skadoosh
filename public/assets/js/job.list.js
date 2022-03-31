$(document).on('ready', function() {
  $('section.featured-job-area').on('click', '.ajaxJobDetail', function(e) {
      $(".ajaxJobDetail").removeClass('active');
      $( this ).addClass('active');            
      var id = $(this).data('jobid');
      var token = $("meta[name='csrf-token']").attr("content");
      var url = "{{ URL('load-job-detail') }}";
      $.ajax(
      {
          url: url+"/"+id,
          type: "GET",
          success: function (data) {
              var dataResult = JSON.parse(data);
              if(dataResult.status == 1) {
                  $('.singleJobListingDetail').html(dataResult.html)
              } else {
                  alert(dataResult.message)
              }
          }
      });
  });
});