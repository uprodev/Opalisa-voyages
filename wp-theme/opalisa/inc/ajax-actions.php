<?php

$actions = [
    'add_to_cart',

];

foreach($actions as $action){
    add_action('wp_ajax_'.$action, $action);
    add_action('wp_ajax_nopriv_'.$action, $action);
}

/**
 * add_to_cart
 */

function add_to_cart() {

    $product_id = (int)$_GET['product_id'];

    $added = WC()->cart->add_to_cart($product_id, 1);

    wp_die();

}
