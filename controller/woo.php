<?php



add_action('woocommerce_admin_order_data_after_shipping_address', function ($order) {
    if (!$donate_areas = get_option("donate_areas")) return;
    global $post_id;
    $order = new WC_Order($post_id);
    $donated = get_post_meta($order->get_id(), 'donate', true);
    // if (!isset($donate_areas[$donated])) return;
    if (!$donated) return;
    echo '<p><strong>' . __('Donated', sfxdonate_plugin_id) . ':</strong> ' . $donated . '</p>';
}, 10, 1);






add_action('woocommerce_thankyou', function ($order_id) {
    if (!$donate_areas = get_option("donate_areas")) return;
    $donated = get_post_meta($order_id, 'donate', true);
    // if (!isset($donate_areas[$donated])) return;
    if (!$donated) return;
    echo '<p><strong>' . __('Thank you for your donation', sfxdonate_plugin_id) . ':</strong> ' . $donated . '</p>';
}, 10, 1);





add_action('woocommerce_before_checkout_billing_form', function ($checkout) {
    if (!$donate_areas = get_option("donate_areas")) return;
    $selected = "";

    if (!session_id()) {
        session_start();
    }

    if (isset($_SESSION["donate"]))
        $selected = intval($_SESSION["donate"]);

    $donate_areas = array_merge([
        "" => __("NO", sfxdonate_plugin_id)
    ], $donate_areas);

    woocommerce_form_field(
        'donate',
        array(
            'type' => 'select',
            'class' => array(
                'my-field-class form-row-wide'
            ),
            'label' => get_option("wanttoforgive", "I want to forgive"),
            'options' => $donate_areas,
        ),
        $selected
    );
});




add_action('woocommerce_checkout_process', function () {
    if (!isset($_POST['donate'])) unset($_POST['donate']);
    unset($_SESSION["donate"]);
});



add_action('woocommerce_checkout_create_order', function ($order, $data) {
    if (!isset($_POST['donate'])) return;
    if (!$donate_areas = get_option("donate_areas")) return;
    $order->update_meta_data('donate', $donate_areas[sanitize_post($_POST['donate'])]);
}, 20, 2);






// add_action('woocommerce_product_meta_start', function () {
add_action(get_option("buttonlocation", "woocommerce_product_meta_start"), function () {
    if (!$donate_areas = get_option("donate_areas")) return;
    $current_product_id = get_the_ID();
    $product = wc_get_product($current_product_id);
    $checkout_url = wc_get_checkout_url();

    if (get_post_type($current_product_id) == "product") {
?>

        <div class="sfxmodal-wrap" data-sfxmodalclose=".sfxmodal-wrap, .sfxmodal"></div>
        <div class="sfxmodal">

            <?php if ($image = $GLOBALS["SFX"]["FRONT"]->get_image_option("popupimage", "", "full")) { ?>
                <img id="sfx-popup-image" src="<?= $image ?>" alt="">
            <?php } ?>

            <div class="sfx-p20">

                <div id="sfx-donationplace"><?= get_option("donationplace", "Please select donation place") ?></div>

                <?php
                woocommerce_form_field(
                    'donate',
                    array(
                        'type' => 'select',
                        'class' => array(
                            'my-field-class form-row-wide'
                        ),

                        // 'label' => __('Bağrınak Seçin'),
                        'label' => false,
                        // 'placeholder' => __('New Custom Field'),
                        'options' => $donate_areas,

                    ),

                    ""
                );
                ?>

                <a href="<?php echo $checkout_url ?>?add-to-cart=<?php echo $current_product_id ?>&quantity=1" class="single_add_to_cart_button button alt sfxbutton" id="<?php echo sfxdonate_plugin_id ?>add-button"><?= get_option("buttontitle", "Donate") ?></a>

            </div>


        </div>

        <div>
            <a class="donate_add_button button alt sfxbutton" href="#" data-sfxmodal=".sfxmodal-wrap, .sfxmodal">
                <?= get_option("buttontitle", "Donate") ?>
            </a>
        </div>

<?php
    }
});
