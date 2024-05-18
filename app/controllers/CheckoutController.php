<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Book;
use app\models\CheckoutDetail;
use app\models\User;
use core\Controller;
use app\models\Checkout;

class CheckoutController extends Controller
{
    public function __construct()
    {
        if (!$this->checkRole('PUSTAKAWAN')) {
            header('Location: /dashboard');
            exit();
        }
    }
    public function index()
    {
        $checkouts = new Checkout;
        $checkouts = $checkouts->getCheckouts();
        $this->view('pages/checkouts/index', [
            'checkouts' => $checkouts
        ]);
    }
    public function create()
    {
        $users = new User;
        $users = $users->where(['role' => 'PENGUNJUNG']);

        $books = new Book;
        $books = $books->all();
        $this->view('pages/checkouts/create', [
            'users' => $users,
            'books' => $books
        ]);
    }
    public function store()
    {
        try {
            $userId = $_POST['user'];
            $bookId = $_POST['book'];
    
            $checkout = new Checkout;
            $checkoutId = $checkout->insertGetId([
                'user_id' => $userId,
                'pustakawan_id' => $_SESSION['user']['id'],
                'taken_date' => date('Y-m-d'),
            ]);
    
            for ($i=0; $i < count($bookId); $i++) { 
                $checkoutDetails = new CheckoutDetail;
                $checkoutDetails->create([
                    'checkout_id' => $checkoutId,
                    'book_id' => $bookId[$i]
                ]);
            }
    
            $_SESSION['success'] = 'Success added checkout.';
            header('Location: /checkouts');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /checkouts');      
            exit();
        }
    }

    public function return($data){
        try {
            $checkoutDetails = new CheckoutDetail();
            $checkoutDetails->update([
                'return_date' => date('Y-m-d H:i:s')
            ], $data['id']);
    
            $_SESSION['success'] = 'Success returned book.';
            header('Location: /checkouts');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /checkouts');      
            exit();
        }
    }
}