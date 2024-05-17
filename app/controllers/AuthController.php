<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use core\Controller;
use app\models\User;

class AuthController extends Controller
{
    public function index()
    {
        if ($this->isAuthenticated()) {
            header('Location: /dashboard');
            exit();
        }
        $this->view('welcome');
    }
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $user = $user->getByEmail($email);
        if ($user) {
            $hashedPassword = $user->password;
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user'] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                ];
                header('Location: /dashboard');
                exit();
            } else {
                $errorMessage = "Password incorrect.";
            }
        } else {
            $errorMessage = "Email not found.";
        }

        header('Location: /?error=' . urlencode($errorMessage));
        exit();
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
        $this->view('welcome');
    }
}