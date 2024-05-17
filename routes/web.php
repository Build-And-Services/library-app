<?php

namespace routes;

require_once '../core/Autoloader.php';
use core\Router;

Router::get('/', 'AuthController', 'index');
Router::post('/login', 'AuthController', 'login');
Router::get('/logout', 'AuthController', 'logout');
Router::get('/register', 'AuthController', 'registerView');
Router::post('/register', 'AuthController', 'register');
Router::get('/products', 'ProductController', 'index');
Router::get('/books', 'BookController', 'index');
Router::get('/dashboard', 'DashboardController', 'index');
Router::get('/pustakawans', 'PustakawanController', 'index');
Router::get('/dashboard', 'DashboardController', 'index');
Router::get('/checkouts', 'CheckoutController', 'index');
