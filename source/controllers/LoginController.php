<?php

namespace Source\controllers;

use Source\models\User;
use Source\ORM\UserRepo;
use Source\ORM\GetUsers;
use Source\ORM\InsertCookie;
use Source\ORM\MakeUser;
use Source\Request;
use Source\services\DatabaseService;

class LoginController
{
    private UserRepo $userRepo;

    public function __construct($userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function loginView(){
        require 'view/authentication/login.php';
    }

    public function loginPost(Request $request)
    {
        // Retrieve data from the request
        $postData = $request->getSuperglobal('POST');

        // Get the username and password from the form
        $username = $postData['username'];
        $password = $postData['password'];

        // Create a new instance of the User model with only username and password
        //TODO remove new word ask bart and ralf
        $user = new User($username,'email', $password);

        // Get the database connection

        // Retrieve the user's data from the database
        $checkUser = $this->userRepo->checkUser($user->getName(), $user->getPassword());

        if ($checkUser) {
            $token = bin2hex(random_bytes(16));
            setcookie('remember_me', $token, time() + (86400 * 30), "/");
            $this->userRepo->setCookie($user->getName(), $token);
            //redirect
            if (isset($_COOKIE['last_path'])) {
                header('Location: ' . $_COOKIE['last_path']);
            } else {
                header('Location: /');
            }
        } else {
            header('Location: /login');
        }
    }
}