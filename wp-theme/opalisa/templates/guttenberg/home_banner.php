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
<section class="best-offers">
    <div class="content-width">
        <div class="title">
            <div class="left">
                <h2>Découvrez les meilleurs offres </h2>
                <p>Le bonheur n’est pas une destination à atteindre : c’est une manière de voyager</p>
            </div>
            <div class="right">
                <a href="#">Découvrir toutes les offres <i class="fa-regular fa-arrow-right"></i></a>
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
