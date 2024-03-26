<?php

namespace Source\controllers;

class CardController
{
    public function index()
    {
        require 'view/cards.php';
    }


}

$content = new CardController();
$content->index();