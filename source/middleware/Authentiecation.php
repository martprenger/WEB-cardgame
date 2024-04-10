<?php

namespace Source\middleware;

use Source\ORM\UserRepo;
use Source\Request;
use Source\services\DatabaseService;

class Authentiecation implements Middleware
{
    private UserRepo $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function handle(Request $request)
    {
        $token = $request->getCookie('remember_me');

        if ($token) {

            $user = $this->userRepo->checkCookie($token);

            if ($user) {
                $request->setUser($user);

            } else {
                $request->setUser(null);
            }
        } else {
            $request->setUser(null);
        }
    }
}