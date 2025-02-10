<?php

$title = get_field('title');
$faqs = get_field('faqs');

?>

<section class="faq">
    <div class="content-width">
        <div class="content">

            <?php if($title){ ?>
                <h2><?= $title;?></h2>
            <?php } ?>

            <?php if($faqs): ?>
                <ul class="accordion">
                    <?php foreach($faqs as $faq):
                        $faq_post = get_post($faq);
                        ?>
                        <li class="accordion-item">
                            <div class="accordion-thumb">
                                <p><?= get_the_title($faq);?></p><span><i class="fa-regular fa-arrow-right"></i></span>
                            </div>
                            <div class="accordion-panel">
                                <div class="wrap">
                                    <?= apply_filters('the_content', $faq_post->post_content);;?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
        </div>
    </div>
</section>
