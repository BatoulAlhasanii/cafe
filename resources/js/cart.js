$(document).ready(function() {
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
            success: function(data) {
                if ( data.status ) {
                    $('.messages').html(
                    '<li class="success-msg">'+
                        '<ul>'+
                            '<li>' + data.message + '</li>'+
                        '</ul>'+
                    '</li>');
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

    $('[id^="product-qty-field-"]').focusout(function(event) {
        if (!$(this).val()) {
            $(this).val( $(this).attr('min') );
        }
    });
});
