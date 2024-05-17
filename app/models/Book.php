<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Book extends Model
{
    protected string $table = 'books';
    private int $id;
}