/*
        $(".product-dec-qty").click(function(e) {
            var $qtyField = $('#product-qty-field');
            var $qtyFieldValue = $qtyField.val();
            if ( parseInt($qtyFieldValue) > 1) {
                $qtyField.val(parseInt($qtyFieldValue) - 1);
            } else {
                $qtyField.val($qtyField.attr('min'));
            }
        });
        $(".product-inc-qty").click(function(e) {
            var $qtyField = $('#product-qty-field');
            var $qtyFieldValue = $qtyField.val();
            console.log("&& (parseInt($qtyFieldValue) < parseInt($qtyField.attr('max')) )", (parseInt($qtyFieldValue) , parseInt($qtyField.attr('max')) ))
            if (parseInt($qtyFieldValue) && ( parseInt($qtyFieldValue) < parseInt($qtyField.attr('max')) )) {
                $qtyField.val(parseInt($qtyFieldValue) + 1);
            } else if ( parseInt($qtyFieldValue) === parseInt($qtyField.attr('max'))) {
                $('.warning-msg').addClass('display-msg');
            }
            else if (!parseInt($qtyFieldValue)) {
                $qtyField.val($qtyField.attr('min'));
            }
        });
        $('#product-qty-field').keypress(function(event){
            if (event.which != 8 && event.which != 0 && event.which < 48 || event.which > 57 || event.which == "0".charCodeAt(0) && $(this).val().trim() == "")
            {
                event.preventDefault();
            }
        });
        $('#product-qty-field').on('keyup', function(event){

            if (parseInt($(this).val()) > parseInt($(this).attr('max'))
                && event.keyCode !== 46 // keycode for delete
                && event.keyCode !== 8 // keycode for backspace
            ) {
                event.preventDefault();
                $(this).val( $(this).attr('max') );
                $('.warning-msg').addClass('display-msg');
            }
        });
        $(document).click(function(event) {
            var $target = $(event.target);
            console.log("event.target", $target.closest('#product-qty-field').length);
            if(!$target.closest('#product-qty-field').length) {
                if (!$('#product-qty-field').val()) {
                    $('#product-qty-field').val(1);
                }
            }
        });
    });
*/
