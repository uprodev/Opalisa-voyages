<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

$cart = WC()->cart->get_cart();
if (!empty($cart)) {
    $first_item = reset($cart);

    $product = $first_item['data'];
    $product_id = $first_item['product_id'];
    $title_page =  esc_html($product->get_name());
    $img = get_the_post_thumbnail_url($product_id);
    $escales = get_field('escales_fly', $product_id);
    $bagage = get_field('bagage', $product_id);
    $class = $product->get_attribute( 'class' );
    $quantity = $first_item['quantity'];
    $item_key = array_key_first($cart);
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<section class="cart-block">
    <div class="content-width">
        <h1><?= __('Votre voyage à ', 'opalisa');?><?= $title_page;?></h1>
        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">
        <div class="content-width">
            <div class="main">

                    <?php get_template_part('templates/content-product', null, ['product' => $product_id]);?>

                    <div class="item">
                        <h6><?= __('Nombre de passagers', 'opalisa');?></h6>
                        <div class="input-number ">
                            <div class="btn-count btn-count-minus"><i class=" fa-regular fa-arrow-left"></i></div>
                            <input type="text" name="count-passengers" data-cart-item-key="<?= $item_key;?>" value="<?= $quantity;?>" class="form-control"/>
                            <div class="btn-count btn-count-plus"><i class="fa-regular fa-arrow-right"></i></div>
                        </div>
                    <?php

                    $qtyp = $product->get_stock_quantity();

                    if( $qtyp > 12 ) {
                        $text_qty = __('Plus que', 'opalisa') . ' <b>12 '. __('billets', 'opalisa') . '</b>';
                    }elseif($qtyp == 1){
                        $text_qty = '<b>1 '. __('billet', 'opalisa') . '</b>';
                    }elseif($qtyp > 1 && $qtyp <= 12){
                        $text_qty = '<b>'. $qtyp .' '. __('billets', 'opalisa') . '</b>';
                    }else{
                        $text_qty = '';
                    }

                    ?>
                    <p><?= $text_qty;?></p>
                </div>

                    <?php if ( $checkout->get_checkout_fields() ) : ?>

                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                            <?php do_action( 'woocommerce_checkout_billing' ); ?>

                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                    <?php endif; ?>
                    <div class="input-wrap-full input-wrap-check-full input-wrap-check">
                        <input type="checkbox" name="check" id="check">
                        <label for="check">Je confirme que Opalisa Voyages n'est pas responsable dans le cas où les informations entrées ne sont pas identiques avec les informations présentes sur mon ou mes document(s) d'identité. <span>*</span> </label>
                    </div>
                    <div class="input-wrap-submit">
                        <button class="btn-arrow" type="submit"><?= __('Continuer ·', 'opalisa');?> <span class="total"><?= WC()->cart->get_total();?></span></button>
<!--                        <a href="#pay-popup" class="btn-arrow fancybox" type="submit">Continuer · <span class="total">--><?php //= WC()->cart->get_total();?><!--</span></a>-->
                    </div>
                    <div class="input-wrap-full text-center">
                        <p>Billet non remboursable, non modifiable</p>
                    </div>

            </div>
            <div class="aside">
                <div class="item-aside">
                    <figure>
                        <img src="<?= $img;?>" alt="">
                    </figure>
                    <div class="line-aside">
                        <h6><?= __('Passagers', 'opalisa');?></h6>
                        <p><span class="qty-pass"><?= $quantity;?></span> <?= __('Adultes', 'opalisa');?></p>
                    </div>
                    <?php if($bagage):?>
                        <div class="line-aside">
                            <h6><?= __('Bagages', 'opalisa');?></h6>
                            <p><img src="<?= get_template_directory_uri();?>/img/icon-5-2.svg" alt="bagage"><?= $bagage; ?> <?= __('(par personne)', 'opalisa');?></p>
                        </div>
                    <?php endif;?>
                    <?php if (!empty($class)):?>
                        <div class="line-aside">
                            <h6><?= __('Classe', 'opalisa');?></h6>
                            <p><img src="<?= get_template_directory_uri();?>/img/icon-5-1.svg" alt=""><?= esc_html($class);?>
                                <?php if($escales):?>
                                    <span class="tooltip">
                            <i class="fa-solid fa-circle-info"></i>
                            <span class="tooltip-text">
                                <?php foreach ($escales as $esl):?>
                                    <span class="text"><?= $esl['escale'];?></span>
                                <?php endforeach;?>
                            </span>
                        </span>
                                <?php endif;?>
                            </p>
                        </div>
                    <?php endif;?>
                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<div id="pay-popup" class="pay-popup" style="display: none">
    <div class="popup-main">
        <h6><img src="<?= get_template_directory_uri();?>/img/icon-7.svg" alt="">Paiement</h6>
        <form action="#" class="popup-form">
            <div class="input-wrap input-wrap-1">
                <label for="cart-number">Numéro de carte</label>
                <input type="text" name="cart-number" id="cart-number" placeholder="1234 1234 1234 1234" class="cart-number">
                <div class="icon">
                    <img src="<?= get_template_directory_uri();?>/img/icon-8.svg" alt="">
                </div>
            </div>
            <div class="input-wrap input-wrap-2">
                <label for="cart-date">Date d’expiration</label>
                <input type="text" name="cart-date" id="cart-date" placeholder="MM/AA" class="cart-date">
            </div>
            <div class="input-wrap input-wrap-3">
                <label for="cart-cvc">CVC</label>
                <input type="text" name="cart-cvc" id="cart-cvc" placeholder="123" class="cart-cvc">
            </div>
            <div class="text">
                <p>Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner au cours de votre visite du site web, et pour d’autres raisons décrites dans notre
                    <a href="#">privacy policy</a>.</p>
            </div>
            <div class="input-wrap-full input-wrap-check-full input-wrap-check">
                <input type="checkbox" name="check" id="check-popup">
                <label for="check-popup">J'ai lu et j'accepte <a href="#">les termes et conditions*</a></label>
            </div>
            <div class="input-wrap-submit">
                <button class="btn-arrow" type="submit">Continuer · 960,00 €</button>
            </div>
        </form>
        <div class="input-wrap-full text-center">
            <p>Billet non remboursable, non modifiable</p>
        </div>
    </div>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>