<?php

$image_text = get_field('image_text');
$title = get_field('title');
$image = get_field('image');
$text = get_field('form_text');
$form = get_field('form_id');

?>

<section class="contact">
    <div class="content-width">
        <div class="text">
            <?php if($title){ ?>
                <h1><?= $title;?></h1>
            <?php } ?>

            <?php if($form) {
                echo do_shortcode('[contact-form-7 id="'.$form->ID.'"]');
            }?>

            <?php if($text){ ?>
                <p><?= $text;?></p>
            <?php } ?>
        </div>
        <figure>
            <?php if($image){ ?>
                <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
            <?php } ?>
            <?php if($image_text){ ?>
                <h2 class="title"><?= $image_text;?></h2>
            <?php } ?>
        </figure>
    </div>
</section>
