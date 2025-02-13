<?php

$link = get_field('link');
$text = get_field('text');
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
        <?php if( $offers ): ?>
            <div class="content">
                <?php foreach( $offers as $post): setup_postdata($post);
                    $id = $post->ID;
                    $img = get_the_post_thumbnail_url($id);
                    $product = wc_get_product( $id );

                    $vacation = $product->get_attribute( 'vacation' );
                    $class = $product->get_attribute( 'class' );

                    if ( $product->is_on_sale() ) {
                        $price = wc_price( $product->get_sale_price() );
                    } else {
                        $price =  wc_price( $product->get_price() );
                    }?>

                    <div class="item">
                        <figure>
                            <p class="label">offre spéciale</p>
                            <a href="#" class="add-to-cart-btn" data-product_id="<?= $id;?>">
                                <img src="<?= $img;?>" alt="">
                            </a>
                        </figure>
                        <div class="text">
                            <h6><a href="#" class="add-to-cart-btn" data-product_id="<?= $id;?>"><?= get_the_title($id);?></a></h6>
                            <ul>
                                <?php if ( !empty( $vacation ) ) {
                                    echo '<li><img src="'. get_template_directory_uri().'/img/icon-2-1.svg" alt="">' .  esc_html( $vacation ) . '</li>';
                                }

                                if (!empty($class)) {
                                    echo '<li><img src="' . get_template_directory_uri() . '/img/icon-2-2.svg" alt="">' . esc_html($class) . '</li>';
                                }?>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="add-to-cart-btn btn-arrow" data-product_id="<?= $id;?>"><?= __('À partir de ', 'opalisa');?> <?= $price;?> <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; wp_reset_postdata();?>
            </div>
        <?php endif;?>
    </div>
</section>
