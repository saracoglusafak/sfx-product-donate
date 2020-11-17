<h1><?= sprintf(__('Settings <span class="sfxmuted">%1$s</span>', sfxdonate_plugin_id), $GLOBALS["CONFIGS"]["MENUS"][0]["menu_title"]) ?></h1>

<hr>

<div id="sfxplugin-wrap" class="wrap">
	<form method="post" action="options.php">
		<?php
		settings_fields(sfxdonate_plugin_id . '-group');
		do_settings_sections(sfxdonate_plugin_id . '-group');
		?>


		<p>
			<label for="test"><?= __('Test', sfxdonate_plugin_id) ?></label>
			<input type="text" id="test" class="postform" name="test" value="<?= get_option("test") ?>" />
		</p>








		<?php submit_button() ?>
	</form>



</div>