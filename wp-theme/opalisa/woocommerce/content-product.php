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

$depart = get_field('ticket_from', $id);
$arret = get_field('ticket_to', $id);
$date_departure = get_field('date_departure', $id);
$date_back = get_field('date_back', $id);
$company = get_field('company', $id);
?>
<div class="item-content">
    <div class="left-item">
        <h6 class="name">ALLER <?php if($company):?><img src="<?= $company['url'];?>" alt="<?= $company['alt'];?>"><?php endif;?> AF842</h6>
        <div class="fly-wrap">
            <div class="city-block-1 city-block">
                <h6 class="city"><?= $depart;?></h6>
                <p><?= $date_departure;?></p>
                <p>8h20</p>
            </div>
            <div class="fly">
                <div class="line"></div>
                <div class="fly-content">
                    <p>09h17</p>
                    <figure>
                        <img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt="">
                    </figure>
                    <p>2 escales</p>
                    <span class="tooltip">
												<i class="fa-solid fa-circle-info"></i>
												<span class="tooltip-text">
												<span class="text">Durée de l’escale à Paris : 1h40</span>
												<span class="text">Durée de l’escale à Madrid : 2h10</span>
											</span>
											</span>
                </div>
            </div>
            <div class="city-block-2 city-block">
                <h6 class="city"><?= $arret;?></h6>
                <p><?= $date_back;?></p>
                <p>17h37</p>
            </div>
        </div>
        <div class="full-line"></div>
        <h6 class="name">retour <?php if($company):?><img src="<?= $company['url'];?>" alt="<?= $company['alt'];?>"><?php endif;?> AF738</h6>
        <div class="fly-wrap">
            <div class="city-block-1 city-block">
                <h6 class="city"><?= $arret;?></h6>
                <p>28 janvier 2024</p>
                <p>9h14</p>
            </div>
            <div class="fly">
                <div class="line"></div>
                <div class="fly-content">
                    <p>08h34</p>
                    <figure>
                        <img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt="">
                    </figure>
                    <p>Direct</p>
                </div>
            </div>
            <div class="city-block-2 city-block">
                <h6 class="city"><?= $depart;?></h6>
                <p>28 janvier 2024</p>
                <p>16h32</p>
            </div>
        </div>
    </div>
    <div class="right-item">
        <p class="img"><img src="<?= get_template_directory_uri();?>/img/icon-5-1.svg" alt="">Classe économique
            <span class="tooltip">
									<i class="fa-solid fa-circle-info"></i>
									  <span class="tooltip-text">
												<span class="text">Durée de l’escale à Paris : 1h40</span>
												<span class="text">Durée de l’escale à Madrid : 2h10</span>
									  </span>
									</span>
        </p>
        <p class="img"><img src="<?= get_template_directory_uri();?>/img/icon-5-2.svg" alt="">Bagage en soute + cabine</p>

        <div class="price">
            <?php woocommerce_template_loop_price();?>
        </div>
        <p class="info">Plus que <b>12 billets</b></p>
        <div class="btn-wrap">
            <a href="#" class="btn-arrow">Réserver<i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
    </div>
</div>