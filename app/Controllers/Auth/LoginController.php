<?php

namespace App\Controllers\Auth;

use App\Core\DB;

class LoginController{

    public function index()
    {
        if(isset($_SESSION['user_id'])) {
            return redirect('./home');
        }
        return view('login', ['title' => 'Login']);
    }

    public function authenticate()
    {
        if (isset($_SESSION['user_id'])) {
            return redirect('./home');
        }
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $erros = [];
        if (empty($email)) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }
        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        } 

        if(!empty($errors)){
            return view('login', ['title' => 'Login', 'errors' => $errors]);
        }

        // login

        $user = DB::getInstance()->query("SELECT * FROM users WHERE email = ?", [$email]);
        if(empty($user)) {
            $errors['email_or_password'] = 'Email or password is incorrect.';
            return view('login', ['title' => 'Login', 'errors' => $errors]);
        }

        if(!password_verify($password, $user[0]['password'])) {
            $errors['email_or_password'] = 'Email or password is incorrect.';
            return view('login', ['title' => 'Login', 'errors' => $errors]);
        }
        $_SESSION['user_id'] = $user[0]['id'];
        $_SESSION['user_name'] = $user[0]['name'];
        $_SESSION['user_email'] = $user[0]['email'];
        $_SESSION['user_password'] = $user[0]['password'];
        return redirect('./home');
    }

    public function logout()
    {
        session_destroy();
        return redirect('./login');
    }
}