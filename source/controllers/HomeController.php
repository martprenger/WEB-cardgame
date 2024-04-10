<?php

namespace Source\controllers;

use Source\Request;

class HomeController
{
    public function handle(Request $request)
    {
        $user = $request->getUser();

        if ($user === null) {
            setcookie('last_path', $request->getPath(), time() + 3600, "/"); // 3600 seconds = 1 hour
            header('Location: /login');

            exit();
        }

        require 'view/home.php';
    }

   public function get()
   {

   }
}
