<?php

namespace Source\controllers;

use Source\ORM\GetCardsAndAttributes;

class CardController
{
    public function index()
    {
        $db = new DatabaseController();
        $cards = $db->getCards();

        require 'view/cards.php';
    }


}
