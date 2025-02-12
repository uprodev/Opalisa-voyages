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
                <?php if($title){ ?>}
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
                    <label for="origin">Origine</label>
                    <input type="text" id="origin" name="origin" placeholder="D’où partez vous ?" value="<?php echo esc_attr($_GET['origin'] ?? ''); ?>">
                </div>
                <div class="input-wrap input-wrap-2">
                    <label for="destination">Destination</label>
                    <input type="text" id="destination" name="destination" placeholder="Où allez vous ?" value="<?php echo esc_attr($_GET['destination'] ?? ''); ?>">
                </div>
                <div class="input-wrap select-block input-wrap-3">
                    <label for="select-1">Voyage durant les vacances scolaires ?</label>
                    <select id="select-1" name="holiday">
                        <option value="" disabled selected>Sélectionnez la période scolaire</option>
                        <option value="1" <?php selected($_GET['holiday'] ?? '', '1'); ?>>Select 1</option>
                        <option value="2" <?php selected($_GET['holiday'] ?? '', '2'); ?>>Select 2</option>
                        <option value="3" <?php selected($_GET['holiday'] ?? '', '3'); ?>>Select 3</option>
                    </select>
                </div>
                <div class="input-wrap select-block input-wrap-4">
                    <label for="select-2">Passager(s)</label>
                    <select id="select-2" name="passengers">
                        <option value="1" <?php selected($_GET['passengers'] ?? '', '1'); ?>>1</option>
                        <option value="2" <?php selected($_GET['passengers'] ?? '', '2'); ?>>2</option>
                        <option value="3" <?php selected($_GET['passengers'] ?? '', '3'); ?>>3</option>
                    </select>
                </div>
                <div class="bottom">
                    <h6>Filtres :</h6>
                    <ul>
                        <li><label for="type_1"><input type="checkbox" name="class[]" id="type_1" value="first" <?php checked(in_array('first', $_GET['class'] ?? [])); ?>>First class</label></li>
                        <li><label for="type_2"><input type="checkbox" name="class[]" id="type_2" value="business" <?php checked(in_array('business', $_GET['class'] ?? [])); ?>>Business class</label></li>
                        <li><label for="type_3"><input type="checkbox" name="class[]" id="type_3" value="economy" <?php checked(in_array('economy', $_GET['class'] ?? [])); ?>>Classe économique</label></li>
                    </ul>
                </div>
                <div class="input-wrap-submit">
                    <button type="submit" class="btn-arrow">Rechercher <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </form>

        </div>
    </div>
</section>

