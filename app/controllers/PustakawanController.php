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

	public function show($data)
	{
		$pustakawan = new User();
		$pustakawan = $pustakawan->find($data['id']);
		if ($pustakawan) {
			$this->view('pages/pustakawan/edit', [
				'pustakawan' => $pustakawan
			]);
		} else {
			echo "pustakawan tidak ditemukan!";
		}
	}

	public function registerForm()
	{
		$this->view('/pages/pustakawan/register');
	}

	public function update($data)
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];

		$pustakawan = new User();
		$pustakawan = $pustakawan->find($data['id']);

		if ($pustakawan) {
			if (empty($name) || empty($email) || empty($telepon)) {
				$_SESSION['error'] = 'Attribute must be filled';
				return $this->view('pages/pustakawan/index', $_SESSION);
			}
			$pustakawan = new User();
			$pustakawan->update([
				'name' => $name,
				'email' => $email,
				'telepon' => $telepon,
			], $data['id']);
			$_SESSION['success'] = 'Success update data pustakawan';
			header('Location: /pustakawans');
			exit();
		} else {
			echo "pustakawan tidak ditemukan!";
		}
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
