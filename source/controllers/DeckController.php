<?php

namespace Source\controllers;

use Source\models\Deck;
use Source\ORM\DecksRepo;
use Source\Request;
use Source\services\Authorization;

class DeckController
{
    private Authorization $auth;

    private DecksRepo $decksRepo;

//    public function __construct(Authorization $auth, DecksRepo $decksRepo)
//    {
//        $this->auth = $auth;
//        $this->decksRepo = $decksRepo;
//    }


    public function show(Request $request)
    {
        $this->auth->requireRole($request, ['admin', 'premium']);

        require 'view/decks.php';
    }


    public function create_deck(Request $request)
    {
        $this->auth->requireRole($request, ['admin', 'premium']);
        $postData = $request->getSuperglobal('POST');

        // Get the deck name and creator from the form


// Prepare an SQL statement
        $deck = new Deck($postData['deck_name'], $postData['creator']);

// Execute the statement with the deck name and creator
       $this->decksRepo->createDeck($deck);

// Redirect back to the decks page
        header("Location: decks.php");
    }



}
