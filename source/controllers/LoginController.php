<?php

namespace Source\controllers;

class LoginController
{
    public function index()
    {
        require 'view/authentication/login.php';
    }



    private function get(){
        require 'view/authentication/login.php';
    }

    private function post() {
        // ook dingen
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
}
