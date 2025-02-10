<?php

$link = get_field('link');
$text = get_field('text');
$image = get_field('image');
$offers = get_field('offers');

?>

<section class="best-offers">
    <div class="content-width">
        <div class="title">
            <div class="left">
                <?php if($text){
                    echo $text;
                } ?>
            </div>
            <div class="right">
                <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?> <i class="fa-regular fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="content">
            <div class="item">
                <figure>
                    <p class="label">offre spéciale</p>
                    <a href="#">
                        <img src="<?= get_template_directory_uri();?>/img/img-1-1.jpg" alt="">
                    </a>
                </figure>
                <div class="text">
                    <h6><a href="#">Mexico</a></h6>
                    <ul>
                        <li><img src="img/icon-2-1.svg" alt="">Vacances d’été</li>
                        <li><img src="img/icon-2-2.svg" alt="">Classe économique</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-arrow">À partir de 490€ <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <p class="label">offre spéciale</p>
                    <a href="#">
                        <img src="img/img-1-2.jpg" alt="">
                    </a>
                </figure>
                <div class="text">
                    <h6><a href="#">Rio</a></h6>
                    <ul>
                        <li><img src="img/icon-2-1.svg" alt="">Vacances de la Toussaint</li>
                        <li><img src="img/icon-2-2.svg" alt="">Classe économique</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-arrow">À partir de 760€ <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <a href="#">
                        <img src="img/img-1-3.jpg" alt="">
                    </a>
                </figure>
                <div class="text">
                    <h6><a href="#">Porto</a></h6>
                    <ul>
                        <li><img src="img/icon-2-1.svg" alt="">Vacances de Pâcques</li>
                        <li><img src="img/icon-2-2.svg" alt="">Classe économique</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-arrow">À partir de 320€ <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <a href="#">
                        <img src="img/img-1-4.jpg" alt="">
                    </a>
                </figure>
                <div class="text">
                    <h6><a href="#">Le Caire</a></h6>
                    <ul>
                        <li><img src="img/icon-2-1.svg" alt="">Vacances d’hiver</li>
                        <li><img src="img/icon-2-2.svg" alt="">Classe économique</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-arrow">À partir de 870€ <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
