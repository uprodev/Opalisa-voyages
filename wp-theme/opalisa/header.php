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
                <a href="index.html"><img src="img/logo.svg" alt=""></a>
            </div>
            <div class="right">
                <a href="#">
                    <img src="img/icon-1.svg" alt="">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</header>

<main>
