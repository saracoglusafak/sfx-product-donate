<h1><?= sprintf(__('Test <span class="sfxmuted">%1$s</span>', sfxdonate_plugin_id), $GLOBALS["CONFIGS"]["MENUS"][0]["menu_title"]) ?></h1>

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
						<label for="test"><?= __('Text', sfxdonate_plugin_id) ?></label>
						<input type="text" id="text" class="postform" name="text" value="<?= get_option("text") ?>" />
					</div>
				</div>


				<div class="row">
					<div class="col-12">
						<label for="number"><?= __('Number', sfxdonate_plugin_id) ?></label>
						<input type="number" id="number" class="postform" name="number" value="<?= get_option("number") ?>" />
					</div>
				</div>


				<div class="row">
					<div class="col-12">
						<label for="textarea"><?= __('Textarea', sfxdonate_plugin_id) ?></label>
						<textarea id="textarea" class="postform" name="textarea"><?= get_option("textarea") ?></textarea>
					</div>
				</div>



				<div class="row">
					<div class="col-12">
						<label for="select"><?= __('Select', sfxdonate_plugin_id) ?></label>

						<select name="select" id="select" class="postform">
							<?= sfxpluginLoop([
								"aaa" => __("aaa", sfxdonate_plugin_id),
								"bbb" => __("bbb", sfxdonate_plugin_id)
							], function ($k, $v, $args) {
								return '<option value="' . $k . '"' . ($args["selected"] == $k ? ' selected="selected"' : '') . '>' . $v . '</option>';
							}, [
								"selected" => get_option("select")
							]) ?>
						</select>

					</div>
				</div>


				<div class="row">
					<div class="col-12">
						<label for="editor"><?= __('Editor', sfxdonate_plugin_id) ?></label>
						<?= wp_editor(get_option("editor"), "editor") ?>
					</div>
				</div>


				<div class="row">
					<div class="col-12">


						<label for="image"><?= __('Image', sfxdonate_plugin_id) ?></label>

						<div class="row">

							<input type="hidden" name="image" value="">

							<div id="image">
								<?php
								// print_r(get_option("images"));
								sfxpluginImageGenerate("image", function ($v, $image) {
									// print_r($image);
								?>
									<div id="sfxplugin-image-<?= $v ?>" class="sfxplugin-image col-4">
										<a href="#" class="sfxplugin-remove-closest" data-remove-closest=".sfxplugin-image"></a>
										<img src="<?= $image[0] ?>">
										<input type="hidden" name="image" value="<?= $v ?>">
									</div>
								<?php
								});
								?>
							</div>


						</div>


						<button class="sfxplugin-select-image button-primary" data-title="<?= __("Select Image", sfxdonate_plugin_id) ?>" data-button-text="<?= __("Add", sfxdonate_plugin_id) ?>" data-multiple="0" data-target="#image" data-name="image"><?= __('Add Image', sfxdonate_plugin_id) ?></button>

					</div>
				</div>


				<div class="row">
					<div class="col-12">
						<label for="images"><?= __('Images', sfxdonate_plugin_id) ?></label>

						<input type="hidden" name="images" value="">

						<div id="images" class="row sortable">
							<?php
							// print_r(get_option("images"));
							sfxpluginImagesGenerate("images", function ($k, $v, $image) {
								// print_r($image);
							?>
								<div id="sfxplugin-image-<?= $v ?>" class="sfxplugin-image col-4">
									<a href="#" class="sfxplugin-remove-closest" data-remove-closest=".sfxplugin-image"></a>
									<img src="<?= $image[0] ?>">
									<input type="hidden" name="images[]" value="<?= $v ?>">
								</div>
							<?php
							});
							?>
						</div>

						<div class="clearfix"></div>

						<button class="sfxplugin-select-image button-primary" data-title="<?= __("Select Images", sfxdonate_plugin_id) ?>" data-button-text="<?= __("Add", sfxdonate_plugin_id) ?>" data-multiple="1" data-target="#images" data-name="images[]"><?= __('Add Images', sfxdonate_plugin_id) ?></button>

					</div>
				</div>



			</div>
		</div>







		<!-- 

		<div class="row">
			<div class="col-1">1</div>
			<div class="col-2">2</div>
			<div class="col-3">3</div>
			<div class="col-4">4</div>
			<div class="col-5">5</div>
			<div class="col-6">6</div>
			<div class="col-7">7</div>
			<div class="col-8">8</div>
			<div class="col-9">9</div>
			<div class="col-10">10</div>
			<div class="col-11">11</div>
			<div class="col-12">12</div>
		</div>

 -->







		<div class="row">
			<div class="col-12">
				<?php submit_button() ?>				
				<?php submit_button(__('Reset', sfxdonate_plugin_id), 'secondary', 'reset', false) ?>
			</div>
		</div>

	</form>



</div>