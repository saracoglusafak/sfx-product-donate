<?php

//INTERNAL
define('sfxdonate_is_admin', is_admin());
define('sfxdonate_plugin_core', plugin_dir_path(__FILE__));
define('sfxdonate_plugin_dir', str_replace('core/', '', sfxdonate_plugin_core));
define('sfxdonate_plugin_pro', sfxdonate_plugin_dir . "pro/");
// var_dump(is_dir(sfxdonate_plugin_pro));
define('sfxdonate_is_pro', is_dir(sfxdonate_plugin_pro));
// echo sfxdonate_is_pro;
define('sfxdonate_plugin_view', sfxdonate_plugin_dir . "view/");
define('sfxdonate_plugin_libs', sfxdonate_plugin_dir . "libs/");
define('sfxdonate_plugin_controller', sfxdonate_plugin_dir . "controller/");
define('sfxdonate_plugin_functions', sfxdonate_plugin_dir . "functions/");
define('sfxdonate_plugin_widgets', sfxdonate_plugin_dir . "widgets/");
define('sfxdonate_plugin_classes', sfxdonate_plugin_dir . "classes/");




define('sfxdonate_plugin_id', preg_replace('~^.*(\/|\\\)(.*?)(\/|\\\)$~usmi', '$2', sfxdonate_plugin_dir));


// echo __FILE__;
// echo __DIR__;
// echo sfxdonate_plugin_dir_url(__DIR__);

// echo preg_replace('~^.*(\/|\\\)(.*?)(\/|\\\)$~usmi', '$2', sfxdonate_plugin_dir);
// echo sfxdonate_plugin_id;
// exit;

//EXTERAL
// define('sfxdonate_plugin_url',plugins_url( '/sfxplugin/' ));
define('sfxdonate_home_url', home_url());
define('sfxdonate_plugin_url', plugin_dir_url(__DIR__));
// echo sfxdonate_plugin_url;
define('sfxdonate_functions_url', sfxdonate_plugin_url . 'functions/');
// define('sfxdonate_process_admin_url', sfxdonate_functions_url . 'process_admin.php?process=');
define('sfxdonate_process_admin_url', sfxdonate_home_url . 'wp-admin/admin.php?page=process_admin&process=');
// define('sfxdonate_process_front_url', sfxdonate_functions_url . 'process_front.php?process=');
define('sfxdonate_process_front_url', sfxdonate_home_url . '?process_front&process=');
define('sfxdonate_common_url', sfxdonate_plugin_url . 'common/');
define('sfxdonate_css_url', sfxdonate_common_url . 'css/');
define('sfxdonate_js_url', sfxdonate_common_url . 'js/');
// echo sfxdonate_js_url;
define('sfxdonate_libs_url', sfxdonate_common_url . 'libs/');
define('sfxdonate_images_url', sfxdonate_common_url . 'images/');
