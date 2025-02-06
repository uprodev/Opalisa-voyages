<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>

    <style>
        .global-wrapper.page-landing{opacity:0}.preloader{position:fixed;left:0;top:0;width:100vw;height:100vh;background-color:#111;z-index:9999;display:flex;flex-direction:column;align-items:center;justify-content:center;transform-origin:center}.preloader .preloader-logo{margin:0 0 20px;opacity:0}
    </style>

		<?php wp_head();?>
</head>

<?php

$logo = get_field('logo', 'options');
$show_preloader = get_field('show_preloader', 'options');
$preloader_logo = get_field('preloader_logo', 'options');

if(is_front_page()){
    $style = ' page-landing bg-dark';
}else{
    $style_type = get_field('style' , get_the_ID());
    if($style_type){
        $style = ' bg-dark';
    }else{
        $style = ' bg-white text-dark';
    }
}

?>

<body <?php body_class() ?>>
<header class="header">
    <div class="container-fluid">
        <div class="header-logo">
            <a href="<?= get_home_url();?>">
                <?php if($logo):?>
                    <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>" />
                <?php endif;?>
            </a>
        </div>
        <nav class="header-navigation">
            <?php wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
            ]);?>
        </nav>
    </div>
</header>

<?php if( $show_preloader):?>
    <div id="preloader" class="preloader">
        <div class="preloader-logo">
            <?php if($preloader_logo):?>
                <img src="<?= $preloader_logo['url'];?>" alt="<?= $preloader_logo['alt'];?>" />
            <?php endif;?>
        </div>
    </div>
<?php endif;?>

<div class="global-wrapper<?= $style;?>">
    <main class="content">