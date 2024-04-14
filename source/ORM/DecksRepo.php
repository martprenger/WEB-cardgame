<?php

namespace Source\ORM;

use Source\models\Deck;
use Source\Request;
use SQLite3;

class DecksRepo
{
    private $db;

    private $cardsRepo;

    public function __construct(SQLite3 $db, CardsRepo $cardsRepo)
    {
        $this->db = $db;
        $this->cardsRepo = $cardsRepo;
    }

    public function createDeck(Deck $deck): bool
    {
        $stmt = $this->db->prepare('INSERT INTO decks (name, user_id) VALUES (:name, :user_id)');
        $stmt->bindValue(':name', $deck->getDeckName(), SQLITE3_TEXT);
        $stmt->bindValue(':user_id', $deck->getCreator(), SQLITE3_TEXT);

        $result = $stmt->execute();

        return $result !== false;
    }

    public function getDecks(Request $request): array
    {
        $decks = [];

        $user_id = $request->getUser()->getId();

        $stmt = $this->db->prepare("SELECT * FROM decks WHERE user_id = :user_id");
        $stmt->bindValue(':user_id', $user_id, SQLITE3_INTEGER); // Assuming user_id is an integer
        $results = $stmt->execute();

        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $decks[] = new Deck($row['id'], $row['name'], $row['user_id']);
        }

        return $decks;
    }

    public function getDeckCards(int $deckId): array
    {
        $cards = [];

        $stmt = $this->db->prepare("SELECT card_id FROM deck_cards WHERE deck_id = :deck_id");
        $stmt->bindValue(':deck_id', $deckId, SQLITE3_INTEGER);
        $results = $stmt->execute();

        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $cards[] = $this->cardsRepo->getCardById((int) $row['card_id']);
        }

        return $cards;
    }

    public function addCardToDeck(int $deckId, int $cardId): bool
    {
        $stmt = $this->db->prepare('INSERT INTO deck_cards (deck_id, card_id) VALUES (:deck_id, :card_id)');
        $stmt->bindValue(':deck_id', $deckId, SQLITE3_INTEGER);
        $stmt->bindValue(':card_id', $cardId, SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result !== false;
    }

    public function removeCardFromDeck(int $deckId, int $cardId): bool
    {
        $stmt = $this->db->prepare('DELETE FROM deck_cards WHERE deck_id = :deck_id AND card_id = :card_id');
        $stmt->bindValue(':deck_id', $deckId, SQLITE3_INTEGER);
        $stmt->bindValue(':card_id', $cardId, SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result !== false;
    }
}