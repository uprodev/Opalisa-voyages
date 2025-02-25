<?php

$title = get_field('title');
$text = get_field('text');
$image = get_field('image');

?>

<section class="home-banner">
    <?php if($image){ ?>
        <div class="bg">
            <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
        </div>
    <?php } ?>
    <div class="content-width">
        <div class="title">
            <div class="left">
                <?php if($title){ ?>
                    <h1><?= $title;?></h1>
                <?php } ?>
            </div>
            <div class="right">
                <?php if($text){ ?>
                    <p><?= $text;?></p>
                <?php } ?>
            </div>
        </div>
        <div class="form-wrap">
            <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="GET" class="form-banner">
                <div class="input-wrap input-wrap-1">
                    <label for="origin"><?= __('Origine', 'opalisa');?></label>
                    <input type="text" id="origin" name="cpm_ticket_from" placeholder="<?= __('D’où partez vous ?', 'opalisa');?>" value="<?php echo esc_attr($_GET['origin'] ?? ''); ?>">
                </div>
                <div class="input-wrap input-wrap-2">
                    <label for="destination"><?= __('Destination', 'opalisa');?></label>
                    <input type="text" id="destination" name="cpm_ticket_to" placeholder="<?= __('Où allez vous ?', 'opalisa');?>" value="<?php echo esc_attr($_GET['destination'] ?? ''); ?>">
                </div>
                <div class="input-wrap select-block input-wrap-3">
                    <label for="select-1"><?= __('Voyage durant les vacances scolaires ?', 'opalisa');?></label>
                    <?php
                    $vacations = get_terms([
                        'taxonomy'   => 'pa_vacation',
                        'hide_empty' => false,
                    ]);

                    if (!empty($vacations) && !is_wp_error($vacations)): ?>
                        <select id="select-1" name="vacation">
                            <option value="" disabled selected><?= __('Sélectionnez la période scolaire', 'opalisa'); ?></option>
                            <?php foreach ($vacations as $vacation): ?>
                                <option value="<?= esc_attr($vacation->term_id); ?>"
                                    <?php selected($_GET['holiday'] ?? '', $vacation->term_id); ?>>
                                    <?= esc_html($vacation->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>

                </div>
                <div class="input-wrap select-block input-wrap-4">
                    <label for="select-2"><?= __('Passager(s)', 'opalisa');?></label>
                    <select id="select-2" name="passengers">
                        <option value="1" <?php selected($_GET['passengers'] ?? '', '1'); ?>>1</option>
                        <option value="2" <?php selected($_GET['passengers'] ?? '', '2'); ?>>2</option>
                        <option value="3" <?php selected($_GET['passengers'] ?? '', '3'); ?>>3</option>
                    </select>
                </div>
                <div class="bottom">
                    <h6><?= __('Filtres :', 'opalisa');?></h6>
                    <?php
                    $classes = get_terms([
                        'taxonomy'   => 'pa_class',
                        'hide_empty' => false,
                    ]);

                    if (!empty($classes) && !is_wp_error($classes)): ?>
                        <ul>
                            <?php foreach ($classes as $class): ?>
                                <li>
                                    <input type="checkbox" name="class[]" id="type_<?= esc_attr($class->term_id); ?>" value="<?= esc_attr($class->term_id); ?>" <?php checked(in_array($class->term_id, $_GET['class'] ?? [])); ?>>
                                    <label for="type_<?= esc_attr($class->term_id); ?>">
                                        <?= esc_html($class->name); ?>
                                    </label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </div>
                <div class="input-wrap-submit">
                    <button type="submit" class="btn-arrow"><?= __('Rechercher', 'opalisa');?> <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </form>

        </div>
    </div>
</section>

