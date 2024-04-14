<?php

namespace Source\ORM;

use Source\models\Deck;

class DecksRepo
{
    private $db;

    public function __construct(SQLite3 $db)
    {
        $this->db = $db;
    }

    public function createDeck(Deck $deck): bool
    {
        $stmt = $this->db->prepare('INSERT INTO decks (deck_name, creator) VALUES (:deck_name, :creator)');
        $stmt->bindValue(':deck_name', $deck->getDeckName(), SQLITE3_TEXT);
        $stmt->bindValue(':creator', $deck->getCreator(), SQLITE3_TEXT);

        $result = $stmt->execute();

        return $result !== false;

    }

}