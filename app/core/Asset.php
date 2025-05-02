<?php
require_once __DIR__ . '/../../public/base.php';
if (!function_exists('asset')) {
    function asset(string $path = '')
    {
        global $base_path;
        $path = str_replace('\\', '/', $base_path) . '/' . $path;
        $path = rtrim($path, '/');
        $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path);
        return '/' . ltrim($path, '/');
    }
}