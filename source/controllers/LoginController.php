<?php

namespace Source\controllers;

class LoginController
{
    public function index()
    {
        require 'view/authentication/login.php';
    }

    public function handle(Request $request):Response
    {
        if $request.method === 'POST' {
            $this->post($request);
        } else {
            $this->get($request);
        }
    }

    private function get(){
        //dingen
    }

    private function post() {
        // ook dingen
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
}

$content = new LoginController();
$content->index();