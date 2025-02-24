<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
$id = $product->get_id();

$class = $product->get_attribute( 'class' );

$depart = get_field('ticket_from', $id);
$arret = get_field('ticket_to', $id);
$date_departure = get_field('date_departure', $id);
$date_back = get_field('date_back', $id);
$company = get_field('company', $id);
$numero_de_vol_retour = get_field('numero_de_vol_retour', $id);
$numero_de_vol = get_field('numero_de_vol', $id);
$bagage = get_field('bagage', $id);
$escales = get_field('escales_fly', $id);
$escales2 = get_field('escales_fly_retour', $id);
$time = get_field('time_departure_arrival', $id);
$time_back = get_field('time_departure_arrival_back', $id);
$duree_vol_aller = get_field('duree_vol_aller', $id);
$timer = get_field('time_departure_arrival_retour', $id);
$time_backr = get_field('time_departure_arrival_back_retour', $id);
$duree_vol_retour = get_field('duree_vol_retour', $id);

?>
<div class="item-content">
    <div class="left-item">
        <h6 class="name"><?= __('ALLER', 'opalisa');?> <?php if($company):?><img src="<?= $company['url'];?>" alt="<?= $company['alt'];
        ?>"><?php endif;?> <?= $numero_de_vol;?></h6>
        <div class="fly-wrap">
            <div class="city-block-1 city-block">
                <h6 class="city"><?= $depart;?></h6>
                <p><?= $date_departure;?></p>
                <p><?= $time;?></p>
            </div>
            <div class="fly">
                <div class="line"></div>
                <div class="fly-content">
                    <p><?= $duree_vol_aller;?></p>
                    <figure>
                        <img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt="">
                    </figure>
                    <p><?= $escales?count($escales). __(' escales', 'opalisa'):__('Direct', 'opalisa');?></p>
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
                </div>
            </div>
            <div class="city-block-2 city-block">
                <h6 class="city"><?= $arret;?></h6>
                <p><?= $date_departure;?></p>
                <p><?= $time_back;?></p>
            </div>
        </div>
        <div class="full-line"></div>
        <h6 class="name"><?= __('retour', 'opalisa');?> <?php if($company):?><img src="<?= $company['url'];?>" alt="<?= $company['alt'];
        ?>"><?php endif;?> <?= $numero_de_vol_retour;?></h6>
        <div class="fly-wrap">
            <div class="city-block-1 city-block">
                <h6 class="city"><?= $arret;?></h6>
                <p><?= $date_back;?></p>
                <p><?= $time_backr;?></p>
            </div>
            <div class="fly">
                <div class="line"></div>
                <div class="fly-content">
                    <p><?= $duree_vol_retour;?></p>
                    <figure>
                        <img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt="">
                    </figure>
                    <p><?= $escales2?count($escales2). __(' escales', 'opalisa'):__('Direct', 'opalisa');?></p>
                    <?php if($escales2):?>
                        <span class="tooltip">
                            <i class="fa-solid fa-circle-info"></i>
                            <span class="tooltip-text">
                                <?php foreach ($escales2 as $esl):?>
                                    <span class="text"><?= $esl['escale'];?></span>
                                <?php endforeach;?>
                            </span>
                        </span>
                    <?php endif;?>
                </div>
            </div>
            <div class="city-block-2 city-block">
                <h6 class="city"><?= $depart;?></h6>
                <p><?= $date_back;?></p>
                <p><?= $timer;?></p>
            </div>
        </div>
    </div>
    <div class="right-item">
        <?php if (!empty($class)):?>
            <p class="img"><img src="<?= get_template_directory_uri();?>/img/icon-5-1.svg" alt=""><?= esc_html($class);?>
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
        <?php endif;?>
        <?php if($bagage):?>
            <p class="img"><img src="<?= get_template_directory_uri();?>/img/icon-5-2.svg" alt="bagage"><?= $bagage; ?></p>
        <?php endif;?>

        <div class="price">
            <?php woocommerce_template_loop_price();?>
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
        <p class="info"><?= $text_qty;?></p>
        <div class="btn-wrap">
            <a href="#" class="btn-arrow add-to-cart-btn" data-product_id="<?= $id;?>"><?= __('Réserver', 'opalisa');?><i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
    </div>
</div>