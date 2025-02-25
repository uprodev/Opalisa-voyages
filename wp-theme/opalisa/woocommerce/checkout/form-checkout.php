<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

$cart = WC()->cart->get_cart();
if (!empty($cart)) {
    $first_item = reset($cart);
    $product_tit = $first_item['data'];
    $title_page =  esc_html($product_tit->get_name());
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<section class="cart-block">
    <div class="content-width">
        <h1><?= __('Votre voyage à ', 'opalisa');?><?= $title_page;?></h1>
        <div class="content-width">
            <div class="main">
                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">
                    <div class="item-content">
                        <div class="left-item">
                            <h6 class="name">ALLER <img src="img/icon-3.svg" alt=""> AF842</h6>
                            <div class="fly-wrap">
                                <div class="city-block-1 city-block">
                                    <h6 class="city">Paris</h6>
                                    <p>13 janvier 2024</p>
                                    <p>8h20</p>
                                </div>
                                <div class="fly">
                                    <div class="line"></div>
                                    <div class="fly-content">
                                        <p>09h17</p>
                                        <figure>
                                            <img src="img/icon-4.svg" alt="">
                                        </figure>
                                        <p>2 escales</p>
                                        <span class="tooltip">
												<i class="fa-solid fa-circle-info"></i>
												<span class="tooltip-text">
												<span class="text">Durée de l’escale à Paris : 1h40</span>
												<span class="text">Durée de l’escale à Madrid : 2h10</span>
											</span>
											</span>
                                    </div>
                                </div>
                                <div class="city-block-2 city-block">
                                    <h6 class="city">Mexico</h6>
                                    <p>13 janvier 2024</p>
                                    <p>17h37</p>
                                </div>
                            </div>
                            <div class="full-line"></div>
                            <h6 class="name">retour <img src="img/icon-3.svg" alt=""> AF738</h6>
                            <div class="fly-wrap">
                                <div class="city-block-1 city-block">
                                    <h6 class="city">Mexico</h6>
                                    <p>28 janvier 2024</p>
                                    <p>9h14</p>
                                </div>
                                <div class="fly">
                                    <div class="line"></div>
                                    <div class="fly-content">
                                        <p>08h34</p>
                                        <figure>
                                            <img src="img/icon-4.svg" alt="">
                                        </figure>
                                        <p>Direct</p>
                                    </div>
                                </div>
                                <div class="city-block-2 city-block">
                                    <h6 class="city">Paris</h6>
                                    <p>28 janvier 2024</p>
                                    <p>16h32</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ( $checkout->get_checkout_fields() ) : ?>

                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                            <?php do_action( 'woocommerce_checkout_billing' ); ?>

                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                    <?php endif; ?>
                    <div class="item">
                        <h6>Nombre de passagers</h6>
                        <div class="input-number ">
                            <div class="btn-count btn-count-minus"><i class=" fa-regular fa-arrow-left"></i></div>
                            <input type="text" name="count" value="2" class="form-control"/>
                            <div class="btn-count btn-count-plus"><i class="fa-regular fa-arrow-right"></i></div>
                        </div>
                        <p>Plus que <b>12 billets</b></p>
                    </div>
                    <div class="item">
                        <h6>Assurance</h6>
                        <div class="input-wrap-check">
                            <input type="radio" name="radio1" id="radio11">
                            <label for="radio11">Aucune assurance</label>
                        </div>
                        <div class="input-wrap-check">
                            <input type="radio" name="radio1" id="radio12" checked>
                            <label for="radio12">Assurance annulation (40€)</label>
                        </div>
                        <div class="input-wrap-check">
                            <input type="radio" name="radio1" id="radio13">
                            <label for="radio13">Assurance multirisque (60€)
                                <span class="tooltip">
												<i class="fa-solid fa-circle-info"></i>
												<span class="tooltip-text">
												<span class="text">Durée de l’escale à Paris : 1h40</span>
												<span class="text">Durée de l’escale à Madrid : 2h10</span>
											</span>
											</span>
                            </label>
                        </div>
                        <p class="grey">Je confirme avoir lu et accepté les <a href="#">conditions générales</a></p>
                    </div>
                    <div class="item">
                        <h6>Information pour le passager 1</h6>
                        <div class="flex mb-23">
                            <p>Sexe :</p>
                            <div class="input-wrap-check">
                                <input type="radio" name="radio2" id="radio21" checked>
                                <label for="radio21">Homme</label>
                            </div>
                            <div class="input-wrap-check">
                                <input type="radio" name="radio2" id="radio22">
                                <label for="radio22">Femme</label>
                            </div>
                        </div>
                        <div class="flex jc-space">
                            <div class="input-wrap">
                                <label for="name">Prénom</label>
                                <input type="text" name="name" id="name" placeholder="Ex : Mathieu" required>
                            </div>
                            <div class="input-wrap">
                                <label for="name2">Nom</label>
                                <input type="text" name="name2" id="name2" placeholder="Ex : Dupont" required>
                            </div>
                            <div class="input-wrap">
                                <label for="email2">Email</label>
                                <input type="email" name="email" id="email2" placeholder="Ex : mathieu.dupont@gmail.com" required>
                            </div>
                            <div class="input-wrap">
                                <label for="number">Téléphone</label>
                                <input type="number" name="number" id="number" placeholder="Ex : 0637467364" required>
                            </div>
                            <div class="input-wrap">
                                <label for="date">Date de naissance</label>
                                <input type="text" name="date" id="date" placeholder="Ex : 10/11/2003" required>
                            </div>
                            <div class="input-wrap"></div>
                            <div class="input-wrap select-block">
                                <label class="form-label" for="select1">Type d’identification</label>
                                <select id="select1">
                                    <option value="0" disabled selected>Passeport</option>
                                    <option value="1">Passeport 1</option>
                                    <option value="2">Passeport 2</option>
                                    <option value="3">Passeport 3</option>
                                </select>
                            </div>
                            <div class="input-wrap">
                                <label for="number2">N° de la pièce d’identité</label>
                                <input type="text" name="number" id="number2" placeholder="N°Passeport ou CNI" required>
                            </div>
                            <div class="input-wrap">
                                <label for="date2">Date d’expiration</label>
                                <input type="text" name="date2" id="date2" placeholder="Ex : 28/13/2032" required>
                            </div>
                            <div class="input-wrap select-block">
                                <label class="form-label" for="select2">Pays émetteur</label>
                                <select id="select2">
                                    <option value="0" selected>France</option>
                                    <option value="1">France 1</option>
                                    <option value="2">France 2</option>
                                    <option value="3">France 3</option>
                                </select>
                            </div>
                            <div class="input-wrap input-wrap-file">
                                <input type="file" name="file1" id="file1">
                                <label for="file1">
                                    <span class="img"><img src="img/icon-6.svg" alt=""></span>
                                    <span class="h5">Passeport</span>
                                    <span class="h6">Déposez votre fichier ici</span>
                                    <span class="file-select"></span>
                                    <span class="delete-file"></span>
                                </label>
                            </div>
                            <div class="line-file"></div>
                            <div class="input-wrap-full flex ai-start">
                                <div class="text-wrap">
                                    <h6>Assignation siège de préférence :</h6>
                                    <p>Soumis à disponibilité lors de la réservation</p>
                                </div>
                                <div class="input-wrap-check">
                                    <input type="radio" name="radio3" id="radio31" checked>
                                    <label for="radio31">Hublot</label>
                                </div>
                                <div class="input-wrap-check">
                                    <input type="radio" name="radio3" id="radio32">
                                    <label for="radio32">Couloir</label>
                                </div>
                            </div>
                            <div class="input-wrap input-wrap-full">
                                <label for="number-cart">Numéro de carte de fidélité <span>(facultatif)</span></label>
                                <input type="number" name="number-cart" id="number-cart" placeholder="Ex : carte de fidélité Air France">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h6>Information pour le passager 2</h6>
                        <div class="flex mb-23">
                            <p>Sexe :</p>
                            <div class="input-wrap-check">
                                <input type="radio" name="radio4" id="radio41">
                                <label for="radio41">Homme</label>
                            </div>
                            <div class="input-wrap-check">
                                <input type="radio" name="radio4" id="radio42">
                                <label for="radio42">Femme</label>
                            </div>
                        </div>
                        <div class="flex jc-space">
                            <div class="input-wrap">
                                <label for="name3">Prénom</label>
                                <input type="text" name="name3" id="name3" placeholder="Ex : Mathieu" required>
                            </div>
                            <div class="input-wrap">
                                <label for="name4">Nom de jeune fille</label>
                                <input type="text" name="name4" id="name4" placeholder="Ex : Dupont" required>
                            </div>
                            <div class="input-wrap">
                                <label for="email3">Email</label>
                                <input type="email" name="email" id="email3" placeholder="Ex : mathieu.dupont@gmail.com" required>
                            </div>
                            <div class="input-wrap">
                                <label for="number3">Téléphone</label>
                                <input type="number" name="number" id="number3" placeholder="Ex : 0637467364" required>
                            </div>
                            <div class="input-wrap">
                                <label for="date4">Date de naissance</label>
                                <input type="text" name="date" id="date4" placeholder="Ex : 10/11/2003" required>
                            </div>
                            <div class="input-wrap"></div>
                            <div class="input-wrap select-block">
                                <label class="form-label" for="select3">Type d’identification</label>
                                <select id="select3">
                                    <option value="0" disabled selected>Passeport</option>
                                    <option value="1">Passeport 1</option>
                                    <option value="2">Passeport 2</option>
                                    <option value="3">Passeport 3</option>
                                </select>
                            </div>
                            <div class="input-wrap">
                                <label for="number4">N° de la pièce d’identité</label>
                                <input type="text" name="number" id="number4" placeholder="N°Passeport ou CNI" required>
                            </div>
                            <div class="input-wrap">
                                <label for="date2">Date d’expiration</label>
                                <input type="text" name="date3" id="date3" placeholder="Ex : 28/13/2032" required>
                            </div>
                            <div class="input-wrap select-block">
                                <label class="form-label" for="select4">Pays émetteur</label>
                                <select id="select4">
                                    <option value="0" selected>France</option>
                                    <option value="1">France 1</option>
                                    <option value="2">France 2</option>
                                    <option value="3">France 3</option>
                                </select>
                            </div>
                            <div class="input-wrap input-wrap-file">
                                <input type="file" name="file1" id="file2">
                                <label for="file2">
                                    <span class="img"><img src="img/icon-6.svg" alt=""></span>
                                    <span>Passeport</span>
                                    <span>Déposez votre fichier ici</span>
                                    <span class="file-select"></span>
                                    <span class="delete-file"></span>
                                </label>
                            </div>
                            <div class="line-file"></div>
                            <div class="input-wrap-full flex">
                                <div class="text-wrap">
                                    <h6>Assignation siège de préférence :</h6>
                                    <p>Soumis à disponibilité lors de la réservation</p>
                                </div>
                                <div class="input-wrap-check">
                                    <input type="radio" name="radio5" id="radio51">
                                    <label for="radio51">Hublot</label>
                                </div>
                                <div class="input-wrap-check">
                                    <input type="radio" name="radio5" id="radio52">
                                    <label for="radio52">Couloir</label>
                                </div>
                            </div>
                            <div class="input-wrap input-wrap-full">
                                <label for="number-cart2">Numéro de carte de fidélité <span>(facultatif)</span></label>
                                <input type="number" name="number-cart" id="number-cart2" placeholder="Ex : carte de fidélité Air France">
                            </div>

                        </div>

                    </div>
                    <div class="input-wrap-full input-wrap-check-full input-wrap-check">
                        <input type="checkbox" name="check" id="check">
                        <label for="check">Je confirme que Opalisa Voyages n'est pas responsable dans le cas où les informations entrées ne sont pas identiques avec les informations présentes sur mon ou mes document(s) d'identité. <span>*</span> </label>
                    </div>
                    <div class="input-wrap-submit">
                        <button class="btn-arrow" type="submit">Continuer · 960,00 €</button>
                    </div>
                    <div class="input-wrap-full text-center">
                        <p>Billet non remboursable, non modifiable</p>
                    </div>

                    <?php if ( $checkout->get_checkout_fields() ) : ?>

                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                        <div class="col2-set" id="customer_details">
                            <div class="col-1">
                                <?php do_action( 'woocommerce_checkout_billing' ); ?>
                            </div>

                            <div class="col-2">
                                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                            </div>
                        </div>

                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                    <?php endif; ?>

                    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                    <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                </form>
                <a href="#pay-popup" class="fancybox">Popup</a>
            </div>
            <div class="aside">
                <div class="item-aside">
                    <figure>
                        <img src="img/img-5.jpg" alt="">
                    </figure>
                    <div class="line-aside">
                        <h6>Passagers</h6>
                        <p>2 Adultes</p>
                    </div>
                    <div class="line-aside">
                        <h6>Bagages</h6>
                        <p><img src="img/icon-5-2.svg" alt="">Bagage en soute + cabine (par personne)</p>
                    </div>
                    <div class="line-aside">
                        <h6>Classe</h6>
                        <p><img src="img/icon-5-1.svg" alt="">Classe économique
                            <span class="tooltip">
												<i class="fa-solid fa-circle-info"></i>
												<span class="tooltip-text">
												<span class="text">Durée de l’escale à Paris : 1h40</span>
												<span class="text">Durée de l’escale à Madrid : 2h10</span>
											</span>
									</span>
                        </p>
                    </div>
                    <div class="line-aside">
                        <h6>Assurance</h6>
                        <div class="flex jc-space">
                            <p>Annulation</p>
                            <p>40,00 €/personne </p>
                        </div>
                    </div>
                    <div class="line-aside-total">
                        <div class="flex jc-space">
                            <p>Prix normal</p>
                            <p>760,00 €/personne</p>
                        </div>
                        <div class="flex jc-space">
                            <p>Prix Opalisa</p>
                            <p>480,00 €/personne </p>
                        </div>
                        <div class="flex flex-total jc-space">
                            <p>Prix final</p>
                            <p>960,00 €</p>
                        </div>
                    </div>
                    <div class="info">
                        <i class="fa-solid fa-circle-info"></i>
                        <h6>Formalités administratives & sanitaires</h6>
                        <p>Votre passeport doit être valide</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
