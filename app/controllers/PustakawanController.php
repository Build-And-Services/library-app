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
		$this->view('pages/pustakawan/index', [
			'pustakawan' => $pustawakan
		]);
	}

	public function registerForm()
	{
		$this->view('/pages/pustakawan/register');
	}


	public function store()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$name = $_POST['name'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$telepon = $_POST['telepon'];
			$role = $_POST['role'];

			$hashed_password = password_hash($password, PASSWORD_BCRYPT);

			if (empty($name) || empty($password) || empty($email) || empty($telepon) || empty($role)) {
				$_SESSION['error'] = 'Attribute must be filled';
				return $this->view('register', $_SESSION);
			}

			$user = new User();
			$user->create([
				'name' => $name,
				'password' => $hashed_password,
				'email' => $email,
				'telepon' => $telepon,
				'role' => $role,
			]);
			$_SESSION['success'] = 'Success register';
			header('Location: /pustakawans');
			exit();
		} else {
			$_SESSION['error'] = 'Register failed, Please try again';
			return $this->view('register', $_SESSION);
		}
	}

	public function destroy($data)
	{
		$pustakawan = new User;
		$pustakawan->delete($data['id']);
		$_SESSION['success'] = 'Success Delete Data';
		header('Location: /pustakawans');
		exit();
	}
}
