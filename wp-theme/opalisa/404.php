<?php get_header(); ?>

    <section class="block-404">
        <div class="container-fluid text-center fade-in-wrapper">

            <?php if(get_field('title_404', 'options')):?>
                <h1><?php the_field('title_404', 'options');?></h1>
            <?php endif;?>

            <?php $link = get_field('link_404', 'options');

            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-dark" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                    <span data-text="<?= esc_html($link_title); ?>"><?= esc_html($link_title); ?></span>
                </a>
            <?php endif; ?>

        </div>
    </section>

<?php get_footer();