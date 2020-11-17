<?php



add_action('wp_loaded', function () {
	if (!isset($_GET["process_front"])) return;
	require_once sfxdonate_plugin_functions . "process_front.php";
	exit;
});




/* 
add_action('wp_head', function () {
	if (!isset($_GET['room_type'])) return;
	echo "------------------------";

	exit;
});

 */



add_action(
	'wp_enqueue_scripts',
	function () {
		//css
		wp_enqueue_style(
			sfxdonate_plugin_id . '-front',
			sfxdonate_css_url . 'front.css'
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
			sfxdonate_plugin_id . '-front-vue',
			sfxdonate_js_url . 'front-vue.js',
			array('jquery'),
			null,
			true
		);
		wp_enqueue_script(sfxdonate_plugin_id . '-front-vue');


		//SECONDARY ---------------------------------------
		wp_register_script(
			sfxdonate_plugin_id . '-front',
			sfxdonate_js_url . 'front.js',
			array('jquery'),
			null,
			true
		);
		wp_enqueue_script(sfxdonate_plugin_id . '-front');

		/* 
			wp_register_script('sfxlast',
			TEMPLATE_URL.'sfx/core/common/js/last.js',
			array('jquery'),
			null,
			true );
			wp_enqueue_script('sfxlast');
		*/
	}
);



add_action('wp_footer', function () {
?>
	<script type="text/javascript">
		// var $ = jQuery.noConflict();
		var sfxdonate_plugin_id = "<?= sfxdonate_plugin_id ?>";
		var sfxdonate_plugin_url = "<?= sfxdonate_plugin_url ?>";
		var sfxdonate_process_front_url = "<?= sfxdonate_process_front_url ?>";
	</script>
<?php
});








/*
add_filter('wp_nav_menu_items', function ($items, $args) {
	if ($args->theme_location == 'footer_menu') {
		$items .= '<li><a title="Admin" href="' . esc_url(admin_url()) . '">' . __('Admin') . '</a></li>';
	}
	return $items;
}, 10, 2);
*/