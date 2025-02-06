<?php

include 'inc/enqueue.php';     // add styles and scripts
include 'inc/acf.php';         // custom acf functions
include 'inc/extras.php';      // custom functions


add_action('after_setup_theme', 'theme_register_nav_menu');


function theme_register_nav_menu(){
	register_nav_menus( array(
        'main-menu' => 'Header',
        'footer-menu'  => 'Footer',
       )
    );
	add_theme_support( 'post-thumbnails'); 
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