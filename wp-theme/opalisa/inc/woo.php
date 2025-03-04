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


add_filter('thwcfe_repeat_times', 'th34ed_override_repeat_count', 10, 3);
function th34ed_override_repeat_count($rt, $name, $type){
    global $woocommerce;
    $cart_count = array();
    $cart_object = WC()->cart->get_cart();

    if($cart_object){
        foreach($cart_object as $cart_item ) {
            $qty = $cart_item['quantity'];
            array_push($cart_count,$qty);
        }
    }

    if(empty($cart_count)){
        return $rt;
    }

    if($type == 'text'){

        if($name === 'billing_first_name'){ // update your field name
            $rt = max($cart_count);
        }

    }elseif($type == 'section'){

        if($name === 'test_section'){ // update your section name
            $rt = max($cart_count);
        }

    }

    return $rt;
}


add_filter('thwcfe_email_display_field_html', 'override_thwcfe_email_display_field_html', 4, 10);

function override_thwcfe_email_display_field_html($html, $type, $label, $value){

    if($type == 'heading'){
        $html = '<h3>' . $value . '</h3>';
    }

    return $html;
}
// Keep only last cart item
add_action( 'woocommerce_before_calculate_totals', 'keep_only_last_cart_item', 30, 1 );
function keep_only_last_cart_item( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    $cart_items = $cart->get_cart();

    if( count( $cart_items ) > 1 ){
        $cart_item_keys = array_keys( $cart_items );
        $cart->remove_cart_item( reset($cart_item_keys) );
    }
}
