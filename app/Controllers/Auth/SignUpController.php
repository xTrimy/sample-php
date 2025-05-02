<?php

namespace App\Controllers\Auth;

use App\Core\DB;

class SignUpController{

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            return redirect('./home');
        }
        return view('signup', ['title' => 'Sign Up']);
    }

    public function store()
    {
        if (isset($_SESSION['user_id'])) {
            return redirect('./home');
        }
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $confirmPassword = $_POST['confirm_password'] ?? null;
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Name is required.';
        }
        if (empty($email)) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }
        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters long.';
        }
        if (empty($confirmPassword)) {
            $errors['confirm_password'] = 'Confirm password is required.';
        } elseif ($password !== $confirmPassword) {
            $errors['confirm_password'] = 'Passwords do not match.';
        }

        // Check if email already exists
        $existingUser = DB::getInstance()->query("SELECT * FROM users WHERE email = ?", [$email]);
        if (!empty($existingUser)) {
            $errors['email'] = 'Email already exists.';
        }
        if (empty($errors)) {
            
            $x = DB::getInstance()->query("INSERT INTO users (name, email, password) VALUES (?, ?, ?)", [$name, $email, password_hash($password, PASSWORD_BCRYPT)]);
            if ($x) {
                $_SESSION['user_id'] = $x;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_password'] = password_hash($password, PASSWORD_BCRYPT);
            } else {
                $errors['signup'] = 'Failed to create account. Please try again.';
                return view('signup', ['title' => 'Sign Up', 'errors' => $errors]);
            }
            return redirect('./home');
        } else {
            return view('signup', ['title' => 'Sign Up', 'errors' => $errors]);
        }
        
    }
}