<?php

include 'inc/enqueue.php';     // add styles and scripts
include 'inc/acf.php';         // custom acf functions
include 'inc/extras.php';      // custom functions
include 'inc/guttenberg.php';  // custom guttenberg blocks

add_action('after_setup_theme', 'theme_register_nav_menu');


function theme_register_nav_menu(){
	register_nav_menus( array(
        'footer-bottom-menu' => 'Footer Bottom Menu',
        'footer-menu'  => 'Footer',
       )
    );
	add_theme_support( 'post-thumbnails');
    add_theme_support( 'woocommerce');
}



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();

	acf_add_options_sub_page('Theme Settings');
}

/* Support SVG */

add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

/* Custom Guttenberg Category Blocks  */

add_filter( 'block_categories_all', 'custom_block_category' );

function custom_block_category( $cats ) {

    $new = array(
        'literallyanything' => array(
            'slug'  => 'custom_blocks',
            'title' => 'Custom Blocks'
        )
    );

    $position = 0;

    $cats = array_slice( $cats, 0, $position, true ) + $new + array_slice( $cats, $position, null, true );

    $cats = array_values( $cats );

    return $cats;

}

add_filter('wpcf7_autop_or_not', '__return_false');
