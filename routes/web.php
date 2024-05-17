<?php

namespace routes;

require_once '../core/Autoloader.php';

use core\Router;

// Pustakawan
Router::get('/pustakawans', 'PustakawanController', 'index');
Router::get('/register-pustakawan', 'PustakawanController', 'registerForm');
Router::post('/pustakawan-register', 'PustakawanController', 'store');
Router::post('/pustakawan-delete/{id}', 'PustakawanController', 'destroy');

Router::get('/', 'AuthController', 'index');
Router::post('/login', 'AuthController', 'login');
Router::get('/logout', 'AuthController', 'logout');
Router::get('/register', 'AuthController', 'registerView');
Router::post('/register', 'AuthController', 'register');
Router::get('/products', 'ProductController', 'index');
Router::get('/books', 'BookController', 'index');
Router::get('/books/{id}', 'BookController', 'edit');
Router::get('/books/add', 'BookController', 'add');
Router::get('/books-delete/{id}', 'BookController', 'delete');
Router::post('/books/store', 'BookController', 'store');
Router::post('/books/update', 'BookController', 'update');
Router::get('/dashboard', 'DashboardController', 'index');
Router::get('/dashboard', 'DashboardController', 'index');
Router::get('/checkouts', 'CheckoutController', 'index');
Router::get('/pengunjung', 'PengunjungController', 'index');
Router::get('/pengunjung/edit/{id}', 'PengunjungController', 'show');
Router::post('/pengunjung/update/{id}', 'PengunjungController', 'update');
Router::get('/pengunjung/delete/{id}', 'PengunjungController', 'delete');