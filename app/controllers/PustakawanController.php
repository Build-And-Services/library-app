<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use core\Controller;
use app\models\User;

class PustakawanController extends Controller
{
	public function index()
	{
		$pustawakan = new User;
		$pustawakan = $pustawakan->where(["role" => "PUSTAKAWAN"]);
		// var_dump($pustawakan);
		$this->view('pages/pustakawan/index', [
			'data' => $pustawakan
		]);

	}

	public function destroy($id)
	{

	}
}