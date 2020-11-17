<?php

function sfxpluginLoop($array = [], object $cb, $args = [])
{
    if (!$array) return;
    $return = "";
    foreach ($array as $k => $v) {
        $return .= $cb($k, $v, $args);
    }
    return $return;
}
