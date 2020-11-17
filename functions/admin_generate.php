<?php

function sfxpluginOptionLoop(string $option, object $cb)
{
    if (!$loop = get_option($option)) return;
    foreach ($loop as $k => $v) {
        $cb($k, $v);
    }
}

function sfxpluginImagesGenerate(string $option, object $cb)
{
    if (!$images = get_option($option)) return;
    foreach ($images as $k => $v) {
        if (!$image = wp_get_attachment_image_src($v)) continue;
        // print_r($image);
        $cb($k, $v, $image);
    }
}

function sfxpluginImageGenerate(string $option, object $cb)
{
    if (!$v = get_option($option)) return;
    if (!$image = wp_get_attachment_image_src($v)) return;
    return $cb($v, $image);
}
function sfxpluginImageIdGenerate(int $id, object $cb)
{
    if (!$image = wp_get_attachment_image_src($id)) return;
    return $cb($id, $image);
}
