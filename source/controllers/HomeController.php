<?php

namespace Source;

class HomeController
{
    public function index()
    {
        $users = ['Mart', 'Shane', 'Jorn'];
        require 'view/home.php';
    }
}

$content = new HomeController();
$content->index();