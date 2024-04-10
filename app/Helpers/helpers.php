<?php

if(!function_exists("hex2rgb")){
    function hex2rgb($hex): Array {
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        return [$r, $g, $b];
    }
}

if(!function_exists("isDark")) {
    function isDark($hex): bool
    {
        $rgb = hex2rgb($hex);

        return array_sum($rgb) < 450;
    }
}
