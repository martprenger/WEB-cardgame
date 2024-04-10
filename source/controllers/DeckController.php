<?php

namespace Source\controllers;

use Source\Request;

class DeckController
{

    public function index(Request $request)
    {
        $user = $request->getUser();
        if ($user) {

        }
        require 'view/decks.php';
    }



}
