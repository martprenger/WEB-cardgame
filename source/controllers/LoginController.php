<?php

namespace Source\controllers;

use Source\models\User;
use Source\ORM\CheckUser;
use Source\ORM\GetUsers;
use Source\ORM\InsertCookie;
use Source\ORM\MakeUser;
use Source\Request;
use Source\services\DatabaseService;

class LoginController
{
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
        $dbService = new DatabaseService();
        $db = $dbService->getDb();

        // Retrieve the user's data from the database
        $userChecker = new CheckUser();
        $checkUser = $userChecker->checkUser($db, $user->getName(), $user->getPassword());

        if ($checkUser) {
            $token = bin2hex(random_bytes(16));
            setcookie('remember_me', $token, time() + (86400 * 30), "/");
            $cookieSetter = new InsertCookie();
            $cookieSetter->setCookie($db, $user->getName(), $token);
            // if user exits add remember token to db and cookies of user
            echo '\n user exists';
        } else {
            echo '\n user does not exists';
        }

    }
}