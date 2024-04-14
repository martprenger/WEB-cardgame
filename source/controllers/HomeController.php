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
        $userRole = $this->auth->get;

        if ($userRole === 'admin' || $userRole === 'premium') {
            echo '
            <div class="container_decks">
                <div class="row">
                    <h4 class="tiles_home">decks</h4>
                </div>
            </div>
            ';
        }

        require 'view/home.php';
    }

   public function get()
   {

   }
}
