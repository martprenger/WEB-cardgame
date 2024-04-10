<?php

namespace Source\controllers;

use Source\Request;

class HomeController
{
    public function handle(Request $request)
    {
        $user = $request->getUser();
        echo $user->getName();
        require 'view/home.php';
    }

   public function get()
   {

   }
}
