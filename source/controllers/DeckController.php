<?php

namespace Source\controllers;

use Source\models\Deck;
use Source\ORM\CardsRepo;
use Source\ORM\DecksRepo;
use Source\Request;
use Source\services\Authorization;

class DeckController
{
    private Authorization $auth;

    private DecksRepo $decksRepo;
    private CardsRepo $cardsRepo;

    public function __construct(Authorization $auth, DecksRepo $decksRepo, CardsRepo $cardsRepo)
    {
        $this->auth = $auth;
        $this->decksRepo = $decksRepo;
        $this->cardsRepo = $cardsRepo;
    }


    public function showDecks(Request $request)
    {
        $this->auth->requireRole($request, ['admin', 'premium']);

        $decks = $this->decksRepo->getDecks($request);

        require 'view/decks.php';
    }


    public function create_deck(Request $request)
    {
        $this->auth->requireRole($request, ['admin', 'premium']);
        $postData = $request->getSuperglobal('POST');

        // Get the deck name and creator from the form


        // Prepare an SQL statement
        $deck = new Deck(0, $postData['deck_name'], $request->getUser()->getId());

        // Execute the statement with the deck name and creator
        $this->decksRepo->createDeck($deck);

        // Redirect back to the decks page
        header("Location: decks");
    }

    public function showDeck(Request $request)
    {
        $deckId = $request->getGet('deck_id');
        $this->auth->requireRole($request, ['admin', 'premium']);

        $cards = $this->decksRepo->getDeckCards($deckId);

        require 'view/deck.php';
    }

    public function showChooseCardForDeck(Request $request)
    {
        $deckId = $request->getGet('deck_id');
        $this->auth->requireRole($request, ['admin', 'premium']);

        $cards = $this->cardsRepo->getCardsAndAttributes();

        require 'view/addcard.php';
    }

    public function setCardToDeck(Request $request)
    {
        $deckId = $request->getGet('deck_id');
        $cardId = $request->getGet('card_id');
        $this->auth->requireRole($request, ['admin', 'premium']);

        // add card to deck
        $this->decksRepo->addCardToDeck($deckId, $cardId);

        header("Location: deck?deck_id=" . $deckId);
    }

    public function removeCardFromDeck(Request $request)
    {
        $deckId = $request->getGet('deck_id');
        $cardId = $request->getGet('card_id');
        $this->auth->requireRole($request, ['admin', 'premium']);

        // remove card from deck
        $this->decksRepo->removeCardFromDeck($deckId, $cardId);

        header("Location: deck?deck_id=" . $deckId);
    }
}
