<?php

namespace Source\controllers;

use Source\models\User;
use Source\ORM\UserRepo;
use Source\Request;

class AuthController
{
    private UserRepo $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function loginView()
    {
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

        // Retrieve the user's data from the database
        $user = $this->userRepo->checkUser($username, $password);

        if ($user) {
            $lastPath = $request->getCookie('lastPath');
            if (!$lastPath) {
                $lastPath = '/';
            }
            $this->setUserCookieAndRedirect($user, $lastPath);
        } else {
            header('Location: /login');
        }
    }

    public function register()
    {
        require 'view/authentication/registration.php';
    }

    public function registerPost(Request $request)
    {
        // Retrieve data from the request
        $postData = $request->getSuperglobal('POST');

        // Create a new instance of the User model and set its properties
        $hashedPassword = password_hash($postData['password'], PASSWORD_DEFAULT);

        $user = new User(0, $postData['username'], $postData['email'], $hashedPassword, 'user');
        if ($postData['password'] !== $postData['password-redo']) {
            // Passwords don't match, handle the error (e.g., redirect back with error message)
            echo 'Passwords do not match';
            return;
        }

        $this->userRepo->createUser($user);
        $this->setUserCookieAndRedirect($user, '/');
    }

    public function logout(Request $request)
    {
        echo 'logout';
        // Unset and delete the 'remember_me' cookie
        $request->setCookie('remember_me', null);
        setcookie('remember_me', '', time() - 3600, '/');
        echo $request->getUser()->getName();

        $this->userRepo->setCookie($request->getUser()->getName(), ' ');
        echo 'logout';

        // Redirect to the login page
        header('Location: /login');
    }

    private function setUserCookieAndRedirect(User $user, string $path): void
    {
        $token = bin2hex(random_bytes(16));
        setcookie('remember_me', $token, time() + (86400 * 30), "/");
        $this->userRepo->setCookie($user->getName(), $token);

        //redirect
        header('Location: ' . $path);
    }
}