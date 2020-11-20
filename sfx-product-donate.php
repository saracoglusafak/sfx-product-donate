<?php

/**
 * Plugin Name: SFX Product Donate (WooCommerce)
 * Plugin URI: https://dogruwebtasarim.com
 * Description: WooCommerce donate button.
 * Version: 1.0
 * Author: Şafak Saraçoğlu
 * Author URI: 
 * Text Domain: sfx-product-donate
 * Domain Path: /languages
 */




require_once (__DIR__) . "/core/cons.php";



add_action('plugins_loaded', function () {
	// echo basename(dirname(__FILE__)) . '/languages/';
	load_plugin_textdomain(sfxdonate_plugin_id, FALSE, basename(dirname(__FILE__)) . '/languages/');
});


add_action('init', function () {
	load_plugin_textdomain(sfxdonate_plugin_id);
});



require_once (__DIR__) . "/core/configs.php";
// print_r($GLOBALS["CONFIGS"]["MENUS"]);

// var_dump(is_admin);
// var_dump(sfxdonate_plugin_dir);




// require_once sfxdonate_plugin_core . 'menu_items.php';
// require_once sfxdonate_plugin_core . 'menu_elements.php';

/* 
if ($WIDGETS = glob(sfxdonate_plugin_widgets . '*.php')) {
	// print_r($WIDGETS);
	foreach ($WIDGETS as $k => $v) {
		require_once $v;
	}
}
 */

//GLOBAL FIRST
require_once sfxdonate_plugin_functions . "generate.php";


if (sfxdonate_is_admin) {
	require_once sfxdonate_plugin_core . "menus.php";
	require_once sfxdonate_plugin_functions . "admin_generate.php";
	require_once sfxdonate_plugin_controller . "admin.php";
	// require_once sfxdonate_plugin_controller . "admin-woo.php";
} else {
	require_once sfxdonate_plugin_functions . "front_generate.php";
	require_once sfxdonate_plugin_controller . "front.php";
	// require_once sfxdonate_plugin_controller . "front-woo.php";
	require_once sfxdonate_plugin_classes . "front.php";
}

//GLOBAL LAST
require_once sfxdonate_plugin_controller . "woo.php";




register_activation_hook(__FILE__, 'sfxplugin_activation');
register_deactivation_hook(__FILE__, 'sfxplugin_deactivation');
// register_uninstall_hook( __FILE__, 'sfxplugin_uninstall' );




function sfxplugin_activation()
{
	/* 
			global $wpdb;
			
			$table_name = $wpdb->prefix . "etkinlik";
			$charset_collate = $wpdb->get_charset_collate();
			
			$sql = "CREATE TABLE $table_name (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			zaman timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			adsoyad varchar(100) DEFAULT '' NOT NULL,
			telefon varchar(15) DEFAULT '' NOT NULL,
			eposta varchar(255) DEFAULT '' NOT NULL,
			firma varchar(200) DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
			) $charset_collate;";
			
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql ); 
		*/
}



function sfxplugin_deactivation()
{
	/* 
			global $wpdb;
			$table_name = $wpdb->prefix . 'etkinlik';
			$sql = "DROP TABLE IF EXISTS $table_name";
			$wpdb->query($sql);
			delete_option("my_plugin_db_version");
		*/
}
