<h1><?= sprintf(__('Admin panel <span class="sfxmuted">%1$s</span>', sfxdonate_plugin_id), __($GLOBALS["CONFIGS"]["MENUS"][0]["menu_title"], sfxdonate_plugin_id)) ?></h1>

<hr>


<div id="sfxplugin-wrap" class="wrap">
    <form method="post" action="options.php">
        <?php
        settings_fields(sfxdonate_plugin_id . '-group');
        do_settings_sections(sfxdonate_plugin_id . '-group');
        ?>

        <div class="row">
            <div class="col-12">




                <?php

                // print_r(get_option("donate_areas"));
                if ($donate_areas = get_option("donate_areas")) {
                    $donate_areas = json_encode($donate_areas);
                ?>
                    <script>
                        var donateAreas = '<?= $donate_areas ?>';
                    </script>
                <?php
                }

                ?>


                <div class="vue-gen">

                    <label for="donate_areas"><?= __("Add donate area;", sfxdonate_plugin_id) ?></label>
                    <br>
                    <vue-element input-id="donate_areas" input-name="donate_areas[]" placeholder="<?= __("Add area...", sfxdonate_plugin_id) ?>" load="donateAreas" add-title="<?= __("+ Add", sfxdonate_plugin_id) ?>"></vue-element>

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