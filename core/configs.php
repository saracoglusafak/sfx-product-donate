<?php

$GLOBALS["CONFIGS"]["MENUS"] = [];

//add_menu_page
$GLOBALS["CONFIGS"]["MENUS"][] = [
	"page_title" => 'Woo Donate',
	"menu_title" => 'Woo Donate',
	"capability" => 'manage_options',
	"menu_slug" => sfxdonate_plugin_id . '/views/admin/index.php',
	"function" => '',
	"icon_url" => sfxdonate_images_url . 'icon.png',
	"position" => 99
];

/* 
//add_submenu_page
$GLOBALS["CONFIGS"]["MENUS"][] = [
	"parent_slug" => $GLOBALS["CONFIGS"]["MENUS"][0]["menu_slug"],
	"page_title" => __('Test', sfxdonate_plugin_id),
	"menu_title" => __('Test', sfxdonate_plugin_id),
	"capability" => $GLOBALS["CONFIGS"]["MENUS"][0]["capability"],
	"menu_slug" => sfxdonate_plugin_id . '/views/admin/test.php',
	"function" => ''
];
 */


//add_submenu_page
$GLOBALS["CONFIGS"]["MENUS"][] = [
	"parent_slug" => $GLOBALS["CONFIGS"]["MENUS"][0]["menu_slug"],
	"page_title" => 'Settings',
	"menu_title" => 'Settings',
	"capability" => $GLOBALS["CONFIGS"]["MENUS"][0]["capability"],
	"menu_slug" => sfxdonate_plugin_id . '/views/admin/settings.php',
	"function" => ''
];


//add_submenu_page
if (sfxdonate_is_pro)
	$GLOBALS["CONFIGS"]["MENUS"][] = [
		"parent_slug" => $GLOBALS["CONFIGS"]["MENUS"][0]["menu_slug"],
		"page_title" => 'Pro',
		"menu_title" => 'Pro',
		"capability" => $GLOBALS["CONFIGS"]["MENUS"][0]["capability"],
		"menu_slug" => sfxdonate_plugin_id . '/pro/views/admin/pro.php',
		"function" => ''
	];
