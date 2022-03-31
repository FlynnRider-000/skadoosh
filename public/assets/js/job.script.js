$(document).ready(function(){
    if(session('payment_done'))
        $('#success_modal').modal('toggle');
    else if(session('free_post'))
        $('#success_modal_nonpay').modal('toggle');

    $('input[name=jobCategory]:checked').parent().addClass("active");
    $('input:radio').click(function () {
        $('input:not(:checked)').parent().removeClass("active");
        $('input:checked').parent().addClass("active");
    });

    $('input[name=jobType]:checked').parent().addClass("active");
    $('input:radio').click(function () {
        $('input:not(:checked)').parent().removeClass("active");
        $('input:checked').parent().addClass("active");
    });

    initializeTinyMceEditor('textarea.jobDescriptionEditor');
    initializeTinyMceEditor('textarea.companyDescriptionEditor');

    $('input[name=jobLocation]').on('change', function() {
        if ($(this).is(':checked') && $(this).val() == 'office') {
            $('.jobOfficeLocationDiv').show();
            $('.jobRegionalRestrictionDiv').hide();
        } else if ($(this).is(':checked') && $(this).val() == 'remote_region') {
            $('.jobOfficeLocationDiv').hide();
            $('.jobRegionalRestrictionDiv').show();
        } else {
            $('.jobOfficeLocationDiv').hide();
            $('.jobRegionalRestrictionDiv').hide();
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

        $('.totalJobPrice').text("{{ CustomHelper::printCurrency() }}" + parseFloat(finalPrice));
    });
    var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                console.log(form);
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
});