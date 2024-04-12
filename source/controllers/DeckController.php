<?php

namespace Source\controllers;

use Source\Request;
use Source\services\Authorization;

class DeckController
{
    private Authorization $auth;
    public function __construct(Authorization $auth)
    {
        $this->auth = $auth;
    }

    public function show(Request $request)
    {
        $this->auth->requireRole($request, ['admin', 'premium']);

        require 'view/decks.php';
    }



}
