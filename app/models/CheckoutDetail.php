<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class CheckoutDetail extends Model
{
    protected string $table = 'checkout_details';
}