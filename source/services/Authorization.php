<?php

namespace Source\services;

use Source\Request;

class Authorization
{
    public function requireLogin(Request $request)
    {
        $user = $request->getUser();

        if ($user === null) {
            setcookie('last_path', $request->getPath(), time() + 3600, "/"); // 3600 seconds = 1 hour
            header('Location: /login');
            exit();
        }
    }

    public function requireRole(Request $request, array $roles)
    {
        $user = $request->getUser();

        $this->requireLogin($request);

        if (!in_array($user->getRole(), $roles)) {
            header('Location: /');
            exit();
        }
    }
}