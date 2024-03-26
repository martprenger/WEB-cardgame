<?php

namespace Source\controllers;

class AccountController
{
    public function index()
    {
        require 'view/account.php';
    }
}

$content = new AccountController();
$content->index();