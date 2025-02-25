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


});


    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector(".form-banner");

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