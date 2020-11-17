<?php


/* 
if (function_exists('add_image_size')) {
	// add_image_size('category-thumb', 300, 9999); //300 pixels wide (and unlimited height)
	// add_image_size('homepage-thumb', 220, 180, true); //(cropped)
	// add_image_size('element-thumb', 9999, 70);
}
 */

// /wp-admin/admin.php?page=process_admin&process=test
add_action('admin_menu', function () {
	add_action('load-' . add_submenu_page(
		null,
		null,
		null,
		'administrator',
		'process_admin',
		function () {
		}
	), function () {
		require_once sfxdonate_plugin_functions . "process_admin.php";
		exit;
	});
});






add_action('admin_init', function () {
	require_once sfxdonate_plugin_core . "register_setting.php";
});


add_action(
	'admin_footer',
	function () {
?>
	<script type="text/javascript">
		// var $ = jQuery.noConflict();
		var sfxdonate_plugin_id = "<?= sfxdonate_plugin_id ?>";
		var sfxdonate_plugin_url = "<?= sfxdonate_plugin_url ?>";
		var sfxdonate_process_admin_url = "<?= sfxdonate_process_admin_url ?>";
	</script>
<?php
	}
);


add_action('admin_enqueue_scripts', function () {
	wp_enqueue_media();
	//css
	wp_enqueue_style(
		sfxdonate_plugin_id . '-admin',
		sfxdonate_css_url . 'admin.css'
	);
	//js		
	wp_enqueue_script('jquery');
	// wp_enqueue_script('jquery-ui-core');
	// wp_enqueue_script('jquery-ui-sortable');

	// echo sfxdonate_libs_url . 'vue-2.6.12/vue.js';
	wp_register_script(
		sfxdonate_plugin_id . '-vue',
		sfxdonate_libs_url . 'vue-2.6.12/vue.js',
		array('jquery'),
		null,
		true
	);
	wp_enqueue_script(sfxdonate_plugin_id . '-vue');

	wp_register_script(
		sfxdonate_plugin_id . '-admin-vue',
		sfxdonate_js_url . 'admin-vue.js',
		array('jquery'),
		null,
		true
	);
	wp_enqueue_script(sfxdonate_plugin_id . '-admin-vue');


	//SECONDARY ---------------------------------------
	wp_register_script(
		sfxdonate_plugin_id . '-admin',
		sfxdonate_js_url . 'admin.js',
		array('jquery'),
		null,
		true
	);
	wp_enqueue_script(sfxdonate_plugin_id . '-admin');
	/* 
			wp_register_script('sfxlast',
			TEMPLATE_URL.'sfx/core/common/js/last.js',
			array('jquery'),
			null,
			true );
			wp_enqueue_script('sfxlast');
		*/
});
