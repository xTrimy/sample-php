<?php

namespace App;

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\SignUpController;
use App\Controllers\HomeController;
use App\Core\Route;

final class Routes
{

    public static function init()
    {
        Route::get('/home', HomeController::class, 'index');
        Route::get('/', HomeController::class, 'index');
        Route::get('/signup', SignUpController::class, 'index');
        Route::post('/signup', SignUpController::class, 'store');
        Route::get('/login', LoginController::class, 'index');
        Route::post('/login', LoginController::class, 'authenticate');
        Route::post('/logout', LoginController::class, 'logout');
    }
}