<?php

namespace App\Controllers;

use App\Core\DB;

class HomeController{
    public function index()
    {
        $user_id = $_SESSION['user_id'] ?? null;
        if(!$user_id) {
            header('Location: ./signup');
            exit;
        }
        $user = DB::getInstance()->query("SELECT * FROM users WHERE id = ?", [$user_id]);
        if(empty($user)) {
            session_destroy();
            header('Location: ./signup');
            exit;
        }
        return view('home', ['title' => 'Home', 'user' => $user[0]]);
    }

    public function about()
    {
        echo "This is the About Page!";
    }

    public function contact()
    {
        echo "This is the Contact Page!";
    }
}