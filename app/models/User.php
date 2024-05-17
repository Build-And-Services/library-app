<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class User extends Model
{
    protected string $table = 'users';
    private PDO $pdo;

    public function getByEmail($email)
    {
        $result = $this->where(['email' => $email]);
        return $result ? $result[0] : null;
    }
    public static function isLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    // public function register($name, $password, $email, $telepon) {
    //     $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    //     $default_role = 'PENGUNJUNG';

    //     $sql = "INSERT INTO users (name, password, email, telepon, role) VALUES (:name, :password, :email, :telepon, :role)";
    //     $prepare = $this->pdo->prepare($sql);
        
    //     $prepare->bindParam(':name', $name);
    //     $prepare->bindParam(':password', $hashed_password);
    //     $prepare->bindParam(':email', $email);
    //     $prepare->bindParam(':telepon', $telepon);
    //     $prepare->bindParam(':role', $default_role);

    //     return $prepare->execute();        
    // }
}
