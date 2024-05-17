<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class Checkout extends Model
{
    protected string $table = 'checkouts';

    public function __construct()
    {
        parent::__construct(); // Panggil konstruktor kelas induk
    }

    public function getCheckouts()
    {
        $sql = "
            SELECT 
                c.id,
                b.title as book_title,
                u.name as member, 
                pu.name as pustakawan, 
                c.taken_date, 
                cd.return_date
            FROM
                checkout_details cd
            JOIN
                checkouts c ON cd.checkout_id = c.id
            JOIN
                users u ON c.user_id = u.id
            JOIN
                users pu ON c.pustakawan_id = pu.id
            JOIN
                books b ON cd.book_id = b.id
        ";


        $prepare = $this->pdo->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}