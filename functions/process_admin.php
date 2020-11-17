<?php

if (!isset($_GET["process"]) || trim($_GET["process"]) == "") {
	exit;
}
if (!is_callable($_GET["process"])) {
	exit;
}


// require_once "../../../../wp-load.php";
// require_once "../core/cons.php";
if (!$wp_get_current_user = wp_get_current_user()) {
	exit;
}
// print_r($wp_get_current_user);	
if (!isset($wp_get_current_user->caps["administrator"]) || $wp_get_current_user->caps["administrator"] != 1) exit;


// funtions






















function test()
{
	echo "-----test-----";
}
echo $_GET["process"]();
