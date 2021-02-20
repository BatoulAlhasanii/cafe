/*$(document).ready(function() {

    function inputChange(inputElement) {
        inputElement.val()
        if (!inputElement.val() === '' ) {
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
                },
                error: function (reject) {


                    if( reject.status === 422 ) {

                    }
                }
            });
        }
    }

    $('product-search').change(function () {
        inputChange($(this));
    })
});
*/
