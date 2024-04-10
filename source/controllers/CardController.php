<?php

namespace Source\controllers;

use Source\ORM\CardsRepo;

class CardController
{
    private CardsRepo $cardsRepo;

    public function __construct($cardsRepo)
    {
        $this->cardsRepo = $cardsRepo;
    }

    public function index()
    {
        $cards = $this->cardsRepo->getCardsAndAttributes();

        require 'view/cards.php';
    }


}
