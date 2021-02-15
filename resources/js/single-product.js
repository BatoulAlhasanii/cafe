$(document).ready(function() {

    $('.tab-link').on('click', function(e) {
        e.preventDefault();


        $('.tab-link').removeClass('is-active');
        $(this).addClass('is-active');
        $('.tab-content').removeClass('is-open');
        $($(this).attr('href')).addClass('is-open');
    });


    $("#add-to-cart-btn").click(function(e) {
        e.preventDefault();

        $('.messages').empty();
        var $qtyField = $("input[name='qty']");

        var _token = $("input[name='_token']").val();
        var productId = $("input[name='product-id']").val();
        var qty = parseInt($qtyField.val());

        if ( parseInt($qtyField.attr('max')) > 0 && parseInt($qtyField.val()) > 0 ) {
            $.ajax({
                url: "/product/add-to-cart",
                type: "POST",
                data: { _token: _token, productId: productId, quantity: qty },
                beforeSend: function() {
                    $("#add-to-cart-btn .submitting").addClass("show");
                    $("#add-to-cart-btn .submit").addClass("hide");
                    $("#add-to-cart-btn").attr("disabled", true);
                    $("#add-to-cart-btn").addClass("cursor-wait");
                },
                success: function(data) {
                    $("#add-to-cart-btn .submitting").removeClass("show");
                    $("#add-to-cart-btn .submit").removeClass("hide");
                    $("#add-to-cart-btn").attr("disabled", false);
                    $("#add-to-cart-btn").removeClass("cursor-wait");

                    if ( data.status ) {
                        $('.messages').html(
                        `<li class="success-msg">
                            <ul>
                                <li> ${data.message} </li>
                            </ul>
                        </li>`);

                        $('#header-cart-container').html(
                        `<div class="cart-qtd">
                            <p class="amount">${data.cart_count}</p>
                        </div>`);

                        var inputMin,inputMax,inputVal;



                        inputMin = parseInt($qtyField.attr('min'));
                        inputMax = parseInt($qtyField.attr('max'));
                        inputVal = parseInt($qtyField.val());

                        if (inputMax >= inputVal) {
                            inputMax = inputMax - inputVal;
                            if (inputMax > 0) {
                                inputMin = 1;
                                if(inputVal > inputMax) {
                                    if(inputMax > 0) {
                                        inputVal = 1;
                                    } else {
                                        inputVal = 0;
                                    }
                                }
                            } else {
                                inputMin = 0;
                                inputVal = 0;
                                $("#add-to-cart-btn").attr("disabled", true);
                            }

                            $qtyField.attr('min', inputMin);
                            $qtyField.attr('max', inputMax);
                            $qtyField.val(inputVal);

                            var warningMessageField;
                            $warningMessageField = $('.warning-msg');
                            var warningMessage = $warningMessageField.text();
                            warningMessage = warningMessage.trim().split(' ');
                            warningMessage[0] = "" + inputMax;
                            $warningMessageField.text(warningMessage .join(' '));

                        }
                    }

                },
                error: function (reject) {
                    $("#add-to-cart-btn .submitting").removeClass("show");
                    $("#add-to-cart-btn .submit").removeClass("hide");
                    $("#add-to-cart-btn").attr("disabled", false);
                    $("#add-to-cart-btn").removeClass("cursor-wait");

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
        }
    });

});
