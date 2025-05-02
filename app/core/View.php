<?php

if (!function_exists('view')) {

    function view(string $view, array $data = [])
    {
        extract($data);

        ob_start();
        if (!file_exists(__DIR__. "/../../views/".$view . '.php')) {
            throw new \Exception("View file not found: " . __DIR__ . "/../../views/" . $view . '.php');
        }
        include_once __DIR__ . "/../../views/" . $view . '.php';

        $content = ob_get_clean();
        return $content;
    }
}


if (!function_exists('redirect')) {
    function redirect(string $url, int $status = 302)
    {
        header("Location: $url", true, $status);
        exit;
    }
}