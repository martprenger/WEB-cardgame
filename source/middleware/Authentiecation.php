<?php

namespace Source\middleware;

use Source\ORM\CheckUser;
use Source\Request;
use Source\services\DatabaseService;

class Authentiecation implements Middleware
{


    public function handle(Request $request)
    {
        $token = $request->getCookie('remember_me');

        if ($token) {
            $dbService = new DatabaseService();
            $db = $dbService->getDb();
            $userGetter = new CheckUser();
            $user = $userGetter->checkCookie($db, $token);

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