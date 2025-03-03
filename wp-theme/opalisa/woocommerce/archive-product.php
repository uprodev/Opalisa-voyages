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

$ids = get_option( 'woocommerce_shop_page_id' );

$title = get_field('title', $ids);
$image = get_field('image', $ids);
$title_contacts = get_field('title_contacts', $ids);
$link = get_field('link', $ids);

woocommerce_output_all_notices();

?>

<section class="product-banner">
    <?php if ( $image ) : ?>
        <div class="bg">
            <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
        </div>
    <?php endif; ?>
    <?php if ( $title ) : ?>
        <div class="content-width">
            <?= $title;?>
        </div>
    <?php endif; ?>
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
                <?= $title_contacts;?>

                <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="btn-wrap">
                        <a class="btn-white" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                    </div>
                <?php endif; ?>

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
