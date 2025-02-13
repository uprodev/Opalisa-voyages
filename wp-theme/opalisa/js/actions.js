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

            }
        });
    })


});