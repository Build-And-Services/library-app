<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use PDOException;
use app\models\User;
use core\Controller;

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

    public function registerView() {
        if ($this->isAuthenticated()) {
            header('Location: /dashboard');
            exit();
        }
        $this->view('register');    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
        
            if (empty($name) || empty($password) || empty($email) || empty($telepon)) {
                $_SESSION['error'] = 'Attribute must be filled';
                return $this->view('register', $_SESSION);
            }
        
            $user = new User();
            if ($user->register($name, $password, $email, $telepon)) {
                $_SESSION['success'] = 'Success register, Please login';
                return $this->view('welcome', $_SESSION);
            } else {
                $_SESSION['error'] = 'Register failed, Please try again';
                return $this->view('register', $_SESSION);
            }
        } else {
            $_SESSION['error'] = 'Register failed, Please try again';
            return $this->view('register', $_SESSION);
        }
        
    }
}