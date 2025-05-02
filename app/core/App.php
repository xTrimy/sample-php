<?php

namespace App\Core;


class App{
    public function __construct()
    {
        
    }

    public function run(string $base_path)
    {
        session_start();
        Router::route($base_path);
    }
}

return new App();