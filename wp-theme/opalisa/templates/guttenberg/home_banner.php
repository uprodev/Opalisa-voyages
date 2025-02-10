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
            <form action="#" class="form-banner">
                <div class="input-wrap input-wrap-1">
                    <label for="origin">Origine</label>
                    <input type="text" id="origin" name="origin" placeholder="D’où partez vous ?">
                </div>
                <div class="input-wrap input-wrap-2">
                    <label for="destination">Destination</label>
                    <input type="text" id="destination" name="destination" placeholder="Où allez vous ?">
                </div>
                <div class="input-wrap select-block input-wrap-3">
                    <label for="select-1">Voyage durant les vacances scolaires ?</label>
                    <select id="select-1">
                        <option value="0"  disabled selected>Sélectionnez la période scolaire</option>
                        <option value="1">Select 1</option>
                        <option value="2">Select 2</option>
                        <option value="3">Select 3</option>
                    </select>
                </div>
                <div class="input-wrap select-block input-wrap-4">
                    <label for="select-2">Passager(s)</label>
                    <select id="select-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="input-wrap-submit">
                    <button type="submit" class="btn-arrow">Rechercher <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </form>
            <div class="bottom">
                <h6>Filtres :</h6>
                <ul>
                    <li><a href="#">First classe</a></li>
                    <li><a href="#">Business classe</a></li>
                    <li><a href="#">Classe économique</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

