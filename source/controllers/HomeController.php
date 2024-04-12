<?php

namespace Source\controllers;

use Source\Request;
use Source\services\Authorization;

class HomeController
{
    private Authorization $auth;
    public function __construct(Authorization $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request)
    {
        $this->auth->requireLogin($request);

        require 'view/home.php';
    }

   public function get()
   {

   }
}
