<?php

$logo = get_field('footer_logo', 'option');
$slogan = get_field('slogan', 'option');
$title_menu = get_field('title_menu', 'option');
$title_menu_social = get_field('title_menu_social', 'option');
$title_form = get_field('title_form', 'option');
$social_networks = get_field('social_networks', 'option');
$form = get_field('form_id', 'option');
$copyright = get_field('copyright', 'option');

?>

</main>

<footer>
    <div class="content-width">
        <div class="item item-1">
            <div class="logo-wrap">
                <a href="<?= get_home_url();?>">
                    <?php if($logo):?>
                        <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>">
                    <?php endif; ?>
                </a>
            </div>
            <?php if($slogan):?>
                <div class="text">
                    <p><?= $slogan;?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="item item-2">
            <?= $title_menu?'<h6>'.$title_menu.'</h6>':'';?>
            <?php wp_nav_menu([
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => '',
            ]);?>
        </div>
        <div class="item item-3">
            <?= $title_menu_social?'<h6>'.$title_menu_social.'</h6>':'';?>
            <?php if($social_networks):?>
                <ul class="soc">
                    <?php foreach($social_networks as $network):?>
                        <li><a href="<?= $network['url'];?>" target="_blank"><i class="fa-brands fa-<?= $network['fa-class'];?>"></i></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="item item-4">
            <?= $title_form?'<h6>'.$title_form.'</h6>':'';?>
            <?php if($form) {
                echo do_shortcode('[contact-form-7 id="'.$form->ID.'"]');
            }?>

        </div>

        <div class="bottom">
            <div class="left">
                <?php wp_nav_menu([
                    'theme_location' => 'footer-bottom-menu',
                    'container' => false,
                    'menu_class' => '',
                ]);?>
            </div>
            <div class="right">
                <?php if($copyright):?>
                    <p><?= $copyright;?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<div id="default-popup " style="display:none;">
    <div class="popup-main">
    </div>
</div>


  <?php wp_footer(); ?>
	</body>
</html>
