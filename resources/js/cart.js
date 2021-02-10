$(document).ready(function() {

    function setProductQty (productId, oldQty, qty) {
        if ( window.location.href.split('/').pop() === 'cart' && oldQty !== qty && qty > 0 ) {

            var _token = $("input[name='_token']").val();

            $.ajax({
                url: "/product/set-quantity",
                type: "POST",
                data: { _token: _token, productId: productId, quantity: qty },
                beforeSend: function() {
                    $("#load-overlay").addClass("display-overlay");
                },
                success: function(data) {

                    $('#header-cart-container').html(
                        `<div class="cart-qtd">
                            <p class="amount">${data.cart_count}</p>
                        </div>`);

                    $('#current-price-'+ productId).html(`${data.product.current_price} ${data.currency}`);
                    $('#total-price-'+ productId).html(`${data.product.total} ${data.currency}`);
                    $('#cart-sub-total').html(`${data.cart_totals.sub_total} ${data.currency}`);
                    $('#cart-total').html(`${data.cart_totals.total} ${data.currency}`);

                    $("#load-overlay").removeClass("display-overlay");
                }
            });
        }
    }

    $(".remove-item-btn").click(function(e) {
        e.preventDefault();

        $('.messages').empty();
        console.log();
        var _token = $("input[name='_token']").val();
        var productId = $(this).attr('data-product-id');

        $.ajax({
            url: "/product/remove-item",
            type: "POST",
            data: { _token: _token, productId: productId },
            beforeSend: function() {
                $("#load-overlay").addClass("display-overlay");
            },
            success: function(data) {
                if ( data.status ) {
                    $('.messages').html(
                    '<li class="success-msg">'+
                        '<ul>'+
                            '<li>' + data.message + '</li>'+
                        '</ul>'+
                    '</li>');

                    $('#header-cart-container').html(
                        `<div class="cart-qtd">
                            <p class="amount">${data.cart_count}</p>
                        </div>`);

                    $('#product-row-' + productId).remove();
                    $('#cart-sub-total').html(`${data.cart_totals.sub_total} ${data.currency}`);
                    $('#cart-total').html(`${data.cart_totals.total} ${data.currency}`);

                    $("#load-overlay").removeClass("display-overlay");
                }

            }
        });
    });

    $('[id^="product-dec-qty-"]').click(function(e) {
        var productId = $(this).attr('id').split('-').pop();
        var $qtyField = $('#product-qty-field-' + productId );
        var $qtyFieldValue = $qtyField.val();

        if ( parseInt($qtyFieldValue) > 1) {
            $qtyField.val(parseInt($qtyFieldValue) - 1);
        } else {
            $qtyField.val($qtyField.attr('min'));
        }


        setProductQty(productId, parseInt($qtyFieldValue) ,parseInt($qtyField.val()));
    });

    $('[id^="product-inc-qty-"]').click(function(e) {
        var productId = $(this).attr('id').split('-').pop();
        var $qtyField = $('#product-qty-field-' + productId );
        var $qtyFieldValue = $qtyField.val();

        if (parseInt($qtyFieldValue) && ( parseInt($qtyFieldValue) < parseInt($qtyField.attr('max')) )) {
            $qtyField.val(parseInt($qtyFieldValue) + 1);
        } else if ( parseInt($qtyFieldValue) === parseInt($qtyField.attr('max'))) {
            $('#warning-msg-' + productId).addClass('display-msg');
        }
        else if (!parseInt($qtyFieldValue)) {
            $qtyField.val($qtyField.attr('min'));
        }

        setProductQty(productId, parseInt($qtyFieldValue) ,parseInt($qtyField.val()));
    });

    $('[id^="product-qty-field-"]').keypress(function(event){
        if (event.which != 8 && event.which != 0 && event.which < 48 || event.which > 57 || event.which == "0".charCodeAt(0) && $(this).val().trim() == "")
        {
            event.preventDefault();
        }
    });

    $('[id^="product-qty-field-"]').on('keyup', function(event){
        var productId = $(this).attr('id').split('-').pop();

        if (parseInt($(this).val()) > parseInt($(this).attr('max'))
            && event.keyCode !== 46 // keycode for delete
            && event.keyCode !== 8 // keycode for backspace
        ) {
            event.preventDefault();
            $(this).val( $(this).attr('max') );
            $('#warning-msg-' + productId).addClass('display-msg');
        }
    });

    var $focusedField = null;
    var $focusedFieldValue = null;

    $('[id^="product-qty-field-"]').focus(function(event) {
        console.log($(this));
        $focusedField = $(this);
        $focusedFieldValue = $(this).val();
    })

    $('[id^="product-qty-field-"]').focusout(function(event) {
        var productId = $(this).attr('id').split('-').pop();

        if (!$(this).val()) {
            $(this).val( $(this).attr('min') );
        }

        setProductQty(productId, parseInt($focusedFieldValue) ,parseInt($(this).val()));

        $focusedField = null;
        $focusedFieldValue = null;
    });
});
