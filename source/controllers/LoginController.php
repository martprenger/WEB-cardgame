<?php

namespace Source\controllers;

use Source\models\User;
use Source\ORM\MakeUser;
use Source\Request;
use Source\services\DatabaseService;

class LoginController implements ControllerInterface
{
    public function handle(Request $request)
    {
        $method = $request->getMethod();
        if ($method === 'GET') {
            $this->get();
        } else {
            $this->post($request);
        }
    }


    public function get(){
        require 'view/authentication/login.php';
    }

    public function post(Request $request)
    {
        // Retrieve data from the request
        $postData = $request->getSuperglobal('POST');

        // Create a new instance of the User model and set its properties

        $user = new User($postData['username'], $postData['email'],'123');

        $dbService = new DatabaseService();
        $db = $dbService->getDb();

        $makeUser = new MakeUser();
        // Save the user to the database
        $makeUser->addUser($db, $user); // Assuming save() method is available in your ORM

    }
}