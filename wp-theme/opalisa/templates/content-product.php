<?php

$id = $args['product'];

$depart = get_field('ticket_from', $id);
$arret = get_field('ticket_to', $id);
$date_departure = get_field('date_departure', $id);
$date_back = get_field('date_back', $id);
$company = get_field('company', $id);
$numero_de_vol_retour = get_field('numero_de_vol_retour', $id);
$numero_de_vol = get_field('numero_de_vol', $id);
$bagage = get_field('bagage', $id);
$escales = get_field('escales_fly', $id);
$escales2 = get_field('escales_fly_retour', $id);
$time = get_field('time_departure_arrival', $id);
$time_back = get_field('time_departure_arrival_back', $id);
$duree_vol_aller = get_field('duree_vol_aller', $id);
$timer = get_field('time_departure_arrival_retour', $id);
$time_backr = get_field('time_departure_arrival_back_retour', $id);
$duree_vol_retour = get_field('duree_vol_retour', $id);

?>
<div class="item-content">
    <div class="left-item">
        <h6 class="name"><?= __('ALLER', 'opalisa');?> <?php if($company):?><img src="<?= $company['url'];?>" alt="<?= $company['alt'];
            ?>"><?php endif;?> <?= $numero_de_vol;?></h6>
        <div class="fly-wrap">
            <div class="city-block-1 city-block">
                <h6 class="city"><?= $depart;?></h6>
                <p><?= $date_departure;?></p>
                <p><?= $time;?></p>
            </div>
            <div class="fly">
                <div class="line"></div>
                <div class="fly-content">
                    <p><?= $duree_vol_aller;?></p>
                    <figure>
                        <img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt="">
                    </figure>
                    <p><?= $escales?count($escales). __(' escales', 'opalisa'):__('Direct', 'opalisa');?></p>
                    <?php if($escales):?>
                        <span class="tooltip">
                            <i class="fa-solid fa-circle-info"></i>
                            <span class="tooltip-text">
                                <?php foreach ($escales as $esl):?>
                                    <span class="text"><?= $esl['escale'];?></span>
                                <?php endforeach;?>
                            </span>
                        </span>
                    <?php endif;?>
                </div>
            </div>
            <div class="city-block-2 city-block">
                <h6 class="city"><?= $arret;?></h6>
                <p><?= $date_departure;?></p>
                <p><?= $time_back;?></p>
            </div>
        </div>
        <div class="full-line"></div>
        <h6 class="name"><?= __('retour', 'opalisa');?> <?php if($company):?><img src="<?= $company['url'];?>" alt="<?= $company['alt'];
            ?>"><?php endif;?> <?= $numero_de_vol_retour;?></h6>
        <div class="fly-wrap">
            <div class="city-block-1 city-block">
                <h6 class="city"><?= $arret;?></h6>
                <p><?= $date_back;?></p>
                <p><?= $timer;?></p>
            </div>
            <div class="fly">
                <div class="line"></div>
                <div class="fly-content">
                    <p><?= $duree_vol_retour;?></p>
                    <figure>
                        <img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt="">
                    </figure>
                    <p><?= $escales2?count($escales2). __(' escales', 'opalisa'):__('Direct', 'opalisa');?></p>
                    <?php if($escales2):?>
                        <span class="tooltip">
                            <i class="fa-solid fa-circle-info"></i>
                            <span class="tooltip-text">
                                <?php foreach ($escales2 as $esl):?>
                                    <span class="text"><?= $esl['escale'];?></span>
                                <?php endforeach;?>
                            </span>
                        </span>
                    <?php endif;?>
                </div>
            </div>
            <div class="city-block-2 city-block">
                <h6 class="city"><?= $depart;?></h6>
                <p><?= $date_back;?></p>
                <p><?= $time_backr;?></p>
            </div>
        </div>
    </div>
</div>