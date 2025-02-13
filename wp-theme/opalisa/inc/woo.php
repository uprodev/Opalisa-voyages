<?php


/* Fragments */

function add_points_widget_to_fragment($fragments)
{

    $fragments['.count-product'] = '<span class="count-product">' . WC()->cart->get_cart_contents_count() . '</span>';


    ob_start();
    woocommerce_mini_cart();
    $fragments['.side-basket__container'] = ob_get_clean();

    return $fragments;
}

add_filter('add_to_cart_fragments', 'add_points_widget_to_fragment');
