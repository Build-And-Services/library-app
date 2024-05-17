<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use PDO;
use utils\DBConnection;
use core\Controller;

class DashboardController extends Controller
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = DBConnection::getInstance()->getPdo();
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit();
        }
    }
    public function index()
    {
        $totalPustakawan = $this->getUserCountByRole('PUSTAKAWAN');
        $totalPengunjung = $this->getUserCountByRole('PENGUNJUNG');
        $totalAvailableBooks = $this->getBookCountByStatus('available');
        $totalNotAvailableBooks = $this->getBookCountByStatus('not available');
        $this->view('pages/dashboard', [
            'totalPustakawan' => $totalPustakawan,
            'totalPengunjung' => $totalPengunjung,
            'totalAvailableBooks' => $totalAvailableBooks,
            'totalNotAvailableBooks' => $totalNotAvailableBooks
        ]);    
    }

    private function getUserCountByRole($role)
    {
        $sql = "SELECT COUNT(*) AS total FROM users WHERE role = :role";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    private function getBookCountByStatus($status)
    {
        $sql = "SELECT COUNT(*) AS total FROM books WHERE status = :status";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}