<?php

namespace Source\controllers;

use Source\models\User;
use Source\ORM\UserRepo;
use Source\Request;
use Source\services\DatabaseService;

class RegisterController
{

    private UserRepo $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

     public function get(){
        require 'view/authentication/registration.php';
    }

    public function post(Request $request)
    {
        // Retrieve data from the request
        $postData = $request->getSuperglobal('POST');

        // Create a new instance of the User model and set its properties
        $hashedPassword = password_hash($postData['password'], PASSWORD_DEFAULT);

        $user = new User($postData['username'], $postData['email'],$hashedPassword);
        if ($postData['password'] !== $postData['password-redo']) {
            // Passwords don't match, handle the error (e.g., redirect back with error message)
            echo 'Passwords do not match';
            return;
        }

        $this->userRepo->createUser($user);
        // Redirect to the home
        header('Location: /');
    }
}
