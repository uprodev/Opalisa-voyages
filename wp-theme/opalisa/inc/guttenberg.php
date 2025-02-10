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
