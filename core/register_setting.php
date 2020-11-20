<?php
/* 
register_setting(sfxdonate_plugin_id . '-group', "text");
register_setting(sfxdonate_plugin_id . '-group', "number");
register_setting(sfxdonate_plugin_id . '-group', "textarea");
register_setting(sfxdonate_plugin_id . '-group', "editor");
register_setting(sfxdonate_plugin_id . '-group', "image");
register_setting(sfxdonate_plugin_id . '-group', "images");
 */


if (isset($_POST["option_page"]) && $_POST["option_page"] == sfxdonate_plugin_id . "-group") {
    // print_r(sanitize_post($_POST));
    // exit;
    // $sanitize_post = sanitize_post($_POST);
    $sanitize_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    
    if (isset($sanitize_post["reset"])) {
        register_setting($sanitize_post["option_page"], "");
        foreach ($sanitize_post as $k => $v) {
            delete_option($k);
        }
        return;
    }
    foreach ($sanitize_post as $k => $v) {
        register_setting($sanitize_post["option_page"], $k);
    }
}
