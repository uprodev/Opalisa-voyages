jQuery(document).ready(function ($) {


    /* add_to_cart */

    $(document).on('click', '.add-to-cart-btn', function (e) {

        e.preventDefault();

        let product_id = $(this).attr('data-product_id');
        let qty = 1;


        $.ajax({

            url: globals.url,
            data: {
                action: 'add_to_cart',
                product_id: product_id,
                qty: qty
            },
            success: function (data) {

                $(document.body).trigger('wc_fragment_refresh');
                $(document.body).trigger('wc_update_cart');

                window.location.href = '/checkout/';

            }
        });
    })

    // +/- //

    $('.input-number').each(function () {
        var $container = $(this);
        var $input = $container.find('input[name="count-passengers"]');
        var $btnMinus = $container.find('.btn-count-minus');
        var $btnPlus = $container.find('.btn-count-plus');


        $btnMinus.on('click', function () {
            var value = parseInt($input.val(), 10) || 1;
            if (value > 1) {
                $input.val(value - 1).trigger('change');
            }
        });


        $btnPlus.on('click', function () {
            var value = parseInt($input.val(), 10) || 1;
            $input.val(value + 1).trigger('change');
        });


        $input.on('input', function () {
            var value = parseInt($(this).val(), 10);
            if (isNaN(value) || value < 1) {
                $(this).val(1);
            }
        });

    });


    // Change count passangers //

    $('input[name="count-passengers"]').on('change', function() {

        var quantity = $(this).val();

        var cart_item_key = $(this).data('cart-item-key');

        if (!cart_item_key) {
            var name = $(this).attr('name');
            var matches = name.match(/count-passengers\[(.*?)\]/);
            if (matches && matches[1]) {
                cart_item_key = matches[1];
            }
        }

        $.ajax({
            type: 'GET',
            url: globals.url,
            data: {
                'action': 'update_checkout_passengers',
                'cart_item_key': cart_item_key,
                'quantity': quantity,
            },
            success: function(response) {
                $('.qty-pass').text(response.data.qty);
                $(document.body).trigger('wc_fragment_refresh');
                $(document.body).trigger('update_checkout');

                location.reload();
            },
        });
    });

});


    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector(".form-banner");

        if (!form) return;

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            let filters = [];
            const params = new URLSearchParams(new FormData(form));

            params.forEach((value, key) => {
            if (value) {
            filters.push(`${key}[${value}]`);
        }
    });

    let url = form.action + "?filters=" + filters.join("|");
        window.location.href = url;
    });

});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.thwcfe-checkout-file').forEach(input => {
        FilePond.create(input);
    });
});