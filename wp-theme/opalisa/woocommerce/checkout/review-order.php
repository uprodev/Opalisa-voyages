<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

$cart = WC()->cart->get_cart();
if (!empty($cart)) {
    $first_item = reset($cart);
    $product = $first_item['data'];
    $product_id = $first_item['product_id'];
    $norm = get_field('prix_normal', $product_id);
    $regular_price = $product->get_price_html();
}

?>
<div class="shop_table woocommerce-checkout-review-order-table">
    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
        <div class="line-aside fee">
            <h6><?= __('Assurance', 'opalisa');?></h6>
            <div class="flex jc-space">
                <p><?= __('Annulation', 'opalisa');?></p>
                <p><?php wc_cart_totals_fee_html( $fee ); ?>/personne </p>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="line-aside-total">
        <?php if($norm):?>
            <div class="flex jc-space">
                <p><?= __('Prix normal', 'opalisa');?></p>
                <p><?= $norm;?></p>
            </div>
        <?php endif; ?>
        <div class="flex jc-space cart-subtotal">
            <p><?= __('Prix Opalisa', 'opalisa');?></p>
            <p><?= $regular_price; ?>/personne </p>
        </div>
        <div class="flex flex-total jc-space order-total">
            <p><?= __('Prix final', 'opalisa');?></p>
            <p><?php wc_cart_totals_order_total_html(); ?></p>
        </div>
    </div>

    <div class="info">
        <i class="fa-solid fa-circle-info"></i>
        <h6>Formalités administratives & sanitaires</h6>
        <p>Votre passeport doit être valide</p>
    </div>

    <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>


    <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

</div>
