<?php

namespace Source\controllers;

class LoginController
{
    public function index()
    {
        require 'view/authentication/login.php';
    }

    public function get(){
        require 'view/authentication/login.php';
    }

    public function post() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        echo "Name: $name, Email: $email";
    }
}