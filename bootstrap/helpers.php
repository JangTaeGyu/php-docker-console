<?php

use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dump')) {
    function dump(...$vars): void
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

if (!function_exists('isView')) {
    function isView(string $view = ''): string|bool
    {
        $path = VIEW_PATH . '/' . $view . '.php';
        if (is_file($path)) {
            return $path;
        }

        return false;
    }
}

if (!function_exists('view')) {
    function view(string $path = '', array $data = []): string|false
    {
        if (isView($path)) {
            ob_start();

            if (count($data) > 0) extract($data);

            include isView($path);

            return ob_get_clean();
        }

        return new \RuntimeException("view 폴더에서 {$path} 파일을 찾을 수 없습니다.");
    }
}