<?php

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_styles() {
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), rand(1111, 9999));
    wp_enqueue_style('FA5PRO', get_template_directory_uri().'/fonts/FA5PRO-master/css/all.css', array(), rand(1111, 9999));
    wp_enqueue_style('fancybox', get_template_directory_uri().'/css/jquery.fancybox.min.css', array(), rand(1111, 9999));
    wp_enqueue_style('nice-select', get_template_directory_uri().'/css/nice-select.css', array(), rand(1111, 9999));
    wp_enqueue_style('swiper.min', get_template_directory_uri().'/css/swiper.min.css', array(), rand(1111, 9999));
    wp_enqueue_style('filepond', get_template_directory_uri().'/css/filepond.css', array(), rand(1111, 9999));
    wp_enqueue_style('styles', get_template_directory_uri().'/css/styles.css', array(), rand(1111, 9999));
    wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive.css', array(), rand(1111, 9999));
    wp_enqueue_style( 'theme', get_stylesheet_uri() );

}


function add_scripts() {

    wp_enqueue_script( 'wc-cart-fragments' );

    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.js', array('jquery'), false, true);
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.mask.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'filepond', get_template_directory_uri() . '/js/filepond.js', array('jquery'), false, true);
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), false, true);
    wp_enqueue_script( 'actions', get_template_directory_uri() . '/js/actions.js', array('jquery'), false, true);

    wp_localize_script('actions', 'globals',
        array(
            'url' => admin_url('admin-ajax.php'),
            'template' => get_template_directory_uri(),
        )
    );

}