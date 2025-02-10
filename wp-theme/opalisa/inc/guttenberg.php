<?php

/* Home Banner Block */

function hb_register_blocks() {
    if( ! function_exists('acf_register_block') )
        return;
    acf_register_block( array(
        'name'          => 'home_banner',
        'title'         => 'Home Banner',
        'render_template'   => 'templates/guttenberg/home_banner.php',
        'category'      => 'custom_blocks',
        'icon'          => 'admin-home',
        'mode'          => 'edit',
        'keywords'      => array( 'profile', 'user', 'author' )
    ));
}
add_action('acf/init', 'hb_register_blocks' );


/* Offers Block */

function offers_register_blocks() {
    if( ! function_exists('acf_register_block') )
        return;
    acf_register_block( array(
        'name'          => 'offers',
        'title'         => 'Offers',
        'render_template'   => 'templates/guttenberg/offers.php',
        'category'      => 'custom_blocks',
        'icon'          => 'editor-table',
        'mode'          => 'edit',
        'keywords'      => array( 'profile', 'user', 'author' )
    ));
}
add_action('acf/init', 'offers_register_blocks' );


/* Offers Block */

function voyager_register_blocks() {
    if( ! function_exists('acf_register_block') )
        return;
    acf_register_block( array(
        'name'          => 'voyager',
        'title'         => 'Voyager',
        'render_template'   => 'templates/guttenberg/voyager.php',
        'category'      => 'custom_blocks',
        'icon'          => 'admin-site-alt2',
        'mode'          => 'edit',
        'keywords'      => array( 'profile', 'user', 'author' )
    ));
}
add_action('acf/init', 'voyager_register_blocks' );