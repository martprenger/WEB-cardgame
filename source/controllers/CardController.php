<?php

namespace Source\controllers;

use Source\ORM\CardsRepo;
use Source\Request;

class CardController
{
    private CardsRepo $cardsRepo;

    public function __construct($cardsRepo)
    {
        $this->cardsRepo = $cardsRepo;
    }

    public function index(Request $request)
    {
        $user = $request->getUser();

        if ($user === null) {
            setcookie('last_path', $request->getPath(), time() + 3600, "/"); // 3600 seconds = 1 hour
            header('Location: /login');

            exit();
        }

        $cards = $this->cardsRepo->getCardsAndAttributes();

        require 'view/cards.php';
    }


}
