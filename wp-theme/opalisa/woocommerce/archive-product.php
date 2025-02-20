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
                <form action="#" class="form-delivery">
                    <div class="input-wrap">
                        <label for="city1">Ville de départ</label>
                        <input type="text" id="city1" name="city1" placeholder="D’où partez vous ?">
                    </div>
                    <div class="input-wrap">
                        <label for="city2">Ville d’arrivée</label>
                        <input type="text" id="city2" name="city2" placeholder="Où allez vous ?">
                    </div>
                    <p>Quelles vacances scolaires ?</p>
                    <div class="input-wrap-check">
                        <div class="item-wrap">
                            <input type="checkbox" id="check1" name="check1">
                            <label for="check1">Vacances de la Toussaint</label>
                        </div>
                        <div class="item-wrap">
                            <input type="checkbox" id="check2" name="check1">
                            <label for="check2">Vacances de Noël</label>
                        </div>
                        <div class="item-wrap">
                            <input type="checkbox" id="check3" name="check1">
                            <label for="check3">Vacances d’hiver</label>
                        </div>
                        <div class="item-wrap">
                            <input type="checkbox" id="check4" name="check1">
                            <label for="check4">Vacances de printemps</label>
                        </div>
                        <div class="item-wrap">
                            <input type="checkbox" id="check5" name="check1">
                            <label for="check5">Vacances d’été</label>
                        </div>
                    </div>
                </form>
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
                    <p><span>9</span> résultats sur 68</p>
                </div>
                <div class="select">

                    <div class="nice-select">
                        <span class="current">Prix croissant</span>
                        <ul class="list">
                            <li data-value="0" class="option selected"><a href="#">Prix croissant</a></li>
                            <li data-value="1" class="option"><a href="#">Prix croissant 1</a></li>
                            <li data-value="2" class="option"><a href="#">Prix croissant 2</a></li>
                            <li data-value="3" class="option"><a href="#">Prix croissant 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-main">
                <?php if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

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

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
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
