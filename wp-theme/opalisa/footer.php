<?php

$socs = get_field('social_networks', 'options');
$copyright = get_field('copyright', 'options');

?>

</main>

<footer class="footer">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-2 col-lg-5">
                <?php if(!empty($socs)):?>
                    <div class="socials">
                        <?php foreach($socs as $soc):
                            $svgUrl = $soc['image'];
                            $response = wp_remote_get($svgUrl);
                            if (is_wp_error($response)) {
                                return;
                            }
                            $svgContent = wp_remote_retrieve_body($response);?>
                            <a href="<?= $soc['url']?>" target="_blank">
                                <?php if(!empty($svgContent)) {
                                    echo $svgContent;
                                }?>
                            </a>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-3 col-lg-2 p-lg-0">
                <?php if(!empty($copyright)):?>
                    <div class="copyright">
                        <p><?= $copyright;?></p>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-7 col-lg-5">
                <nav class="footer-menu">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => '',
                    ]);?>
                </nav>
            </div>
        </div>
    </div>
</footer>

</div>
  <?php wp_footer(); ?>
	</body>
</html>
