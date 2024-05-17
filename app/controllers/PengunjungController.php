<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use core\Controller;
use app\models\User;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = new User;
        $pengunjung = $pengunjung->where(['role' => 'PENGUNJUNG']);
        $this->view('pages/pengunjung/index', [
        'getDataPengunjung' => $pengunjung
        ]);

    }

    public function show($data)
    {
        $pengunjung = new User();
        $pengunjung = $pengunjung->find($data['id']);
        if ($pengunjung) {
            $this->view('pages/pengunjung/edit', [
                'pengunjung' => $pengunjung
            ]);
        } else {
            echo "Pengunjung tidak ditemukan!";
        }
    }

    public function update($data)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        $pengunjung = new User();
        $pengunjung = $pengunjung->find($data['id']);
        
        if ($pengunjung) {
            if (empty($name) || empty($email) || empty($telepon)) {
                $_SESSION['error'] = 'Attribute must be filled';
                return $this->view('pages/pengunjung/index', $_SESSION);
            }
            $pengunjung = new User();
            $pengunjung->update([
                'name' => $name,
                'email' => $email,
                'telepon' => $telepon,
            ], $data['id']);
            $_SESSION['success'] = 'Success update data pengunjung';
            header('Location: /pengunjung');
            exit();
        } else {
            echo "Pengunjung tidak ditemukan!";
        }        
    }

    public function delete($data)
    {
        $pengunjung = new User();
        $pengunjung = $pengunjung->delete($data['id']);
        if ($pengunjung) {
            $_SESSION['success'] = 'Success delete data pengunjung';
            header('Location: /pengunjung');
            exit();
        } else {
            echo "Pengunjung tidak ditemukan!";
        }
    }
}