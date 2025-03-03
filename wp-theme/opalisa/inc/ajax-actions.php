<?php

$actions = [
    'add_to_cart',
    'update_checkout_passengers'
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

function update_checkout_passengers() {

    $cart_item_key = isset($_GET['cart_item_key']) ? sanitize_text_field($_GET['cart_item_key']) : '';
    $quantity = isset($_GET['quantity']) ? absint($_GET['quantity']) : 1;

    if (!empty($cart_item_key) && WC()->cart->get_cart_item($cart_item_key)) {

        WC()->cart->set_quantity($cart_item_key, $quantity);

        WC()->cart->calculate_totals();

        wp_send_json_success([
            'cart_hash' => WC()->cart->get_cart_hash(),
            'message' => 'Cart updated successfully',
            'qty' => $quantity,
        ]);
    } else {
        wp_send_json_error([
            'message' => 'Cart item not found'
        ]);
    }

    die();
}