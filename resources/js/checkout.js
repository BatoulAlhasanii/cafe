$(document).ready(function() {
    $('.submit-checkout-form').click(function () {
        var isValid = true;
        $('.submit-checkout-form').attr('disabled', true);
        $('.required-field').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('error');
            } else if ($(this).hasClass('error')) {
                $(this).removeClass('error');
            }
        });

        if (isValid) {
            $('#checkout-form').submit();
        } else {
            $('.submit-checkout-form').attr('disabled', false);
        }
    });

    $('#checkout_city_id').change(function () {
        var _token = $("input[name='_token']").val();
        var city_id = $(this).val();

        var locale = document.getElementsByTagName('html')[0].lang.trim();

        $.ajax({
            url: "/" + locale + "/cart/set-shipping-fee",
            type: "POST",
            data: { _token: _token, city_id: city_id },
            beforeSend: function() {
                $("#load-overlay").addClass("display-overlay");
            },
            success: function(data) {

                if ($('#checkout-shipping-fee-wrapper').hasClass('display-none')){
                    $('#checkout-shipping-fee-wrapper').removeClass('display-none');
                }


                $('#checkout-sub-total').html(`${data.cart_totals.sub_total} ${data.currency}`);
                $('#checkout-shipping-fee').html(`${data.cart_totals.shipping_fee} ${data.currency}`);
                $('#checkout-total').html(`${data.cart_totals.total} ${data.currency}`);

                $("#load-overlay").removeClass("display-overlay");
            },
            error: function (reject) {

                $("#load-overlay").removeClass("display-overlay");

                if( reject.status === 422 ) {
                    var errors = $.parseJSON(reject.responseText);
                    $messages = null;
                    $.each(errors.errors, function (key, val) {
                        $messages = `<li> ${val} </li>`
                    });

                    $('.messages').html(
                        `<li class="error-msg">
                            <ul>
                                <li> ${errors.message} </li>`
                                + $messages +
                            `</ul>
                        </li>`);
                }
            }
        });

    })
});
