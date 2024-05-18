<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class Checkout extends Model
{
    protected string $table = 'checkouts';

    public function getCheckouts()
    {
        $sql = "
            SELECT 
                c.id,
                b.title as book_title,
                u.name as member, 
                pu.name as pustakawan, 
                c.taken_date, 
                cd.return_date,
                cd.id as detail_id
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

    public function getCheckoutsByUserId()
    {
        $userId = $_SESSION['user']['id'];

        $sql = "
            SELECT 
                c.id,
                b.title as book_title,
                b.thumbnail,
                c.taken_date, 
                cd.return_date
            FROM
                checkout_details cd
            JOIN
                checkouts c ON cd.checkout_id = c.id
            JOIN
                users u ON c.user_id = u.id
            JOIN
                books b ON cd.book_id = b.id
            WHERE
                c.user_id = :userId
        ";

        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':userId', $userId, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}