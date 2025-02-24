<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

woocommerce_output_all_notices();

?>

<section class="product-banner">
    <div class="bg">
        <img src="<?= get_template_directory_uri();?>/img/bg-2.jpeg" alt="">
    </div>
    <div class="content-width">
        <h1>Le bonheur n’est pas une destination à atteindre : c’est une manière de voyager</h1>
    </div>
</section>

<section class="product">
    <div class="content-width">
        <div class="aside">
            <div class="item item-1">
                <div class="form-delivery">
                    <?= do_shortcode('[br_filters_group group_id=183]');?>
                </div>
            </div>
            <div class="item item-2">
                <h5>Autres dates ?</h5>
                <h6>On vous renseigne ! </h6>
                <div class="btn-wrap">
                    <a href="#" class="btn-white">Nous contacter</a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="select-line">
                <div class="left-select">
                    <?php woocommerce_result_count();?>
                </div>
                <div class="select">
                    <?php woocommerce_catalog_ordering();?>
                </div>
            </div>
            <div class="content-main">
                <?php if ( woocommerce_product_loop() ) {

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );
                        }
                    }

                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
