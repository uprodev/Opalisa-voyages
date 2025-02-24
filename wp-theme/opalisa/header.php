<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

		<?php wp_head();?>
</head>

<body <?php body_class() ?>>
<header>
    <div class="top-line">
        <div class="content-width">
            <div class="logo-wrap">
                <?php $logo = get_field('logo', 'option'); ?>
                <a href="<?= get_home_url();?>">
                    <?php if($logo):?>
                        <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
                    <?php endif; ?>
                </a>
            </div>
            <div class="right">
                <a href="<?= wc_get_checkout_url();?>">
                    <img src="<?= get_template_directory_uri();?>/img/icon-1.svg" alt="cart">
                    <span class="count-product"><?= WC()->cart->get_cart_contents_count()==0?'':WC()->cart->get_cart_contents_count();
                    ?></span>
                </a>
            </div>
        </div>
    </div>
</header>

<main>
