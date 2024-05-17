<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

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
}