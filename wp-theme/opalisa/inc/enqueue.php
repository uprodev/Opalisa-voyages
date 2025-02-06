<?php

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_styles() {
    wp_enqueue_style('styles', get_template_directory_uri().'/css/style.css', array(), rand(1111, 9999));
    wp_enqueue_style( 'theme', get_stylesheet_uri() );

}


function add_scripts() {
    $key_map = get_field('google_map_api_key', 'options');

    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);
    wp_enqueue_script( 'map', 'https://maps.googleapis.com/maps/api/js?key='.$key_map.'&callback=initMap', array('jquery'), false,['in_footer' => true, 'strategy'  => 'defer',]);

}