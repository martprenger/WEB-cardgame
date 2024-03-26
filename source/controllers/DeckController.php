<?php

namespace Source\controllers;

class DeckController
{
    public function index()
    {
        require 'view/decks.php';
    }

}

$content = new DeckController();
$content->index();