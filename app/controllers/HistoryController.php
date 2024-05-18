<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Checkout;
use core\Controller;
use app\models\User;

class HistoryController extends Controller
{
    public function __construct()
    {
        if (!$this->checkRole('PENGUNJUNG')) {
            header('Location: /dashboard');
            exit();
        }
    }

    public function index()
    {
        $history = new Checkout;
        $history = $history->getCheckoutsByUserId();
        $this->view('pages/history/index', [
            'history' => $history
        ]);
    }
}