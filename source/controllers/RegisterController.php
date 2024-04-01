<?php

namespace Source\controllers;

use Source\Request;

class RegisterController implements ControllerInterface
{


    #[\Override] public function handle(Request $request)
    {
        // TODO: Implement handle() method.
        $method = $request->getMethod();
        if ($method === 'GET') {
            $this->get();
        } else {
            $this->post($request);
        }
    }


     public function get(){
        require 'view/authentication/registration.php';
    }
}
