<?php

$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
$link = get_field('link');

?>

<section class="text-img">
    <div class="content-width">
        <div class="content">
            <div class="text">

                <?php if($title){ ?>
                    <h2><?= $title;?></h2>
                <?php } ?>

                <?php if($image){ ?>
                    <figure>
                        <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
                    </figure>
                <?php } ?>


                <?= $text;?>

                <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="btn-wrap">
                        <a class="btn-arrow" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?> <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                <?php endif; ?>

            </div>

            <?php if($image){ ?>
                <figure>
                    <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
                </figure>
            <?php } ?>
            
        </div>
    </div>
</section>
