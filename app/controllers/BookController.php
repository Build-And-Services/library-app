<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Book;
use core\Controller;

class BookController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit();
        }
    }
    public function index()
    {
        $books = new Book();
        $books = $books->all();
        $this->view('pages/books/index', [
            'books' => $books
        ]);
    }
}