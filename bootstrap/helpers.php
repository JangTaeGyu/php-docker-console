<?php

use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dump')) {
    function dump(...$vars)
    {
        foreach ($vars as $var) {
            VarDumper::dump($var);
        }
    }
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $var) {
            VarDumper::dump($var);
        }
        die(1);
    }
}