<?php

namespace Source\controllers;

class RegisterController
{
    public function index()
    {
        require 'view/authentication/registration.php';
    }

}

$content = new RegisterController();
$content->index();