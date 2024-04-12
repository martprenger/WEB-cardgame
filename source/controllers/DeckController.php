<?php

namespace Source\controllers;

use Source\Request;

class DeckController
{

    public function show(Request $request)
    {
        $user = $request->getUser();

        if ($user === null) {
            setcookie('last_path', $request->getPath(), time() + 3600, "/"); // 3600 seconds = 1 hour
            header('Location: /login');
            exit();
        }

        if ($user->getRole() !== 'premium' && $user->getRole() !== 'admin') {
            header('Location: /');
            exit();
        }

        require 'view/decks.php';
    }



}
