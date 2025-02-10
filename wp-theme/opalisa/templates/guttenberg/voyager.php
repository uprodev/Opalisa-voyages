<?php

$links = get_field('links');
$title = get_field('title');
$image = get_field('image');

?>

<section class="travel">
    <?php if($image){ ?>
        <div class="bg">
            <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
        </div>
    <?php } ?>
    <div class="content-width">
        <div class="content">
            <?php if($title){ ?>
                <h2><?= $title;?></h2>
            <?php } ?>

            <?php if($links): ?>
                <ul>
                    <?php foreach($links as $link):
                        $link = $link['link'];

                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>

                            <li>
                                <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                            </li>

                        <?php endif;
                    endforeach; ?>
                </ul>
            <?php endif;?>
        </div>
    </div>
</section>
