<?php

namespace core;

class Controller
{
    protected function view($filename = '', $data = [])
    {
        extract($data);
        require_once '../app/views/' . $filename . '.php';
    }

    protected function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public function checkRole($role)
    {
        return $_SESSION['user']['role'] === $role;
    }
}