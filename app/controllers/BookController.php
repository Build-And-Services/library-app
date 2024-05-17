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

    public function add()
    {
        $this->view('pages/books/add');
    }

    public function edit($data){
        try {
            $book = new Book();
            $book = $book->find($data['id']);
            if(!$book){
                throw new \Exception("Book is not found");
            }
            $this->view('pages/books/edit', [
                'book' => $book
            ]);
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /books');        
        }
    }

    public function delete($data)
    {
        try {
            $book = new Book();
            $book = $book->find($data['id']);
            if(!$book->id){
                throw new \Exception("Book is not found");
            }
            $book = new Book();
            $book->delete($data['id']);
            $_SESSION['success'] = 'Success deleted book.';
            header('Location: /books');        
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /books');        
        }
    }

    public function store()
    {
        $request = $_POST;
        if($_FILES['thumbnail']){
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/images/books/"; // Direktori tujuan penyimpanan
            $targetFile = $targetDir . basename($_FILES["thumbnail"]["name"]);
            $upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
            if ($upload) {
                $request["thumbnail"] = "/images/books/".basename($_FILES["thumbnail"]["name"]);
            }
        }

        $user = new Book();
        $user->create($request);
        $_SESSION['success'] = 'Success added book.';
        header('Location: /books');
    }

    public function update()
    {
        $request = $_POST;
        if($_FILES['thumbnail']){
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/images/books/"; // Direktori tujuan penyimpanan
            $targetFile = $targetDir . basename($_FILES["thumbnail"]["name"]);
            $upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
            if ($upload) {
                $request["thumbnail"] = "/images/books/".basename($_FILES["thumbnail"]["name"]);
            }
        }
        $id = $request['id'];
        unset($request['id']);
        $user = new Book();
        $user->update($request, $id);
        $_SESSION['success'] = 'Success update book.';
        header('Location: /books');
    }
}