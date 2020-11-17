<h1><?= sprintf(__('Settings <span class="sfxmuted">%1$s</span>', sfxdonate_plugin_id), __($GLOBALS["CONFIGS"]["MENUS"][0]["menu_title"], sfxdonate_plugin_id)) ?></h1>

<hr>


<div id="sfxplugin-wrap" class="wrap">
    <form method="post" action="options.php">
        <?php
        settings_fields(sfxdonate_plugin_id . '-group');
        do_settings_sections(sfxdonate_plugin_id . '-group');
        ?>

        <div class="row">
            <div class="col-6">


                <div class="row">
                    <div class="col-12">
                        <label for="wanttoforgive"><?= __('I want to forgive', sfxdonate_plugin_id) ?></label>
                        <input type="text" id="wanttoforgive" class="postform" name="wanttoforgive" value="<?= get_option("wanttoforgive", "I want to forgive") ?>" />
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <label for="donationplace"><?= __('Please select donation place', sfxdonate_plugin_id) ?></label>
                        <input type="text" id="donationplace" class="postform" name="donationplace" value="<?= get_option("donationplace", "Please select donation place") ?>" />
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <label for="buttontitle"><?= __('Donate button', sfxdonate_plugin_id) ?></label>
                        <input type="text" id="buttontitle" class="postform" name="buttontitle" value="<?= get_option("buttontitle", "Donate") ?>" />
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">


                        <label for="popupimage"><?= __('Popup image', sfxdonate_plugin_id) ?></label>

                        <div class="row">

                            <input type="hidden" name="popupimage" value="">

                            <div id="popupimage">
                                <?php
                                // print_r(get_option("images"));
                                sfxpluginImageGenerate("popupimage", function ($v, $image) {
                                    // print_r($image);
                                ?>
                                    <div id="sfxplugin-image-<?= $v ?>" class="sfxplugin-image col-4">
                                        <a href="#" class="sfxplugin-remove-closest" data-remove-closest=".sfxplugin-image"></a>
                                        <img src="<?= $image[0] ?>">
                                        <input type="hidden" name="popupimage" value="<?= $v ?>">
                                    </div>
                                <?php
                                });
                                ?>
                            </div>


                        </div>


                        <button class="sfxplugin-select-image button-primary" data-title="<?= __("Select Image", sfxdonate_plugin_id) ?>" data-button-text="<?= __("Add", sfxdonate_plugin_id) ?>" data-multiple="0" data-target="#popupimage" data-name="popupimage"><?= __('Add Image', sfxdonate_plugin_id) ?></button>

                    </div>
                </div>






            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php submit_button() ?>
                <?php submit_button(__('Reset', sfxdonate_plugin_id), 'secondary', 'reset', false) ?>
            </div>
        </div>

    </form>