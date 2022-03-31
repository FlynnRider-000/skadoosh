$(document).ready(function(){
  $('input[name=jobLocation]').on('change', function() {
      if ($(this).is(':checked') && $(this).val() == 'office') {
          $('.jobOfficeLocationDiv').removeClass('d-none');
          $('.jobRegionalRestrictionDiv').addClass('d-none');
      } else if ($(this).is(':checked') && $(this).val() == 'remote_region') {
          $('.jobOfficeLocationDiv').addClass('d-none');
          $('.jobRegionalRestrictionDiv').removeClass('d-none');
      } else {
          $('.jobOfficeLocationDiv').addClass('d-none');
          $('.jobRegionalRestrictionDiv').addClass('d-none');
      }
  });

  $('input[name=jobPostType]').on('change', function() {
      var initialPrice = parseFloat($('.intialJobPrice').val());
      var finalPrice = 0;
  
      if ($(this).is(':checked') && $(this).val() == 'premium') {
          finalPrice = initialPrice + parseFloat($('.additionalJobPrice').val())
      } else {
          finalPrice = initialPrice;
      }
      
      $('.totalJobPrice').text("{{ \CustomHelper::printCurrency() }}" + parseFloat(finalPrice));
  });        
})