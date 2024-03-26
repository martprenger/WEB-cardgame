<?php

namespace Source\controllers;

class LoginController
{
    public function index()
    {
        require 'view/authentication/login.php';
    }

}

$content = new LoginController();
$content->index();