<?php

namespace Source\ORM;

use Source\models\Card;
use Source\models\Attribute;
use SQLite3;

class CardsRepo
{
    private $db;

    public function __construct(SQLite3 $db)
    {
        $this->db = $db;
    }

    private function fetchAttributesByCardId(int $cardId): array
    {
        $attributes = [];

        $stmt = $this->db->prepare("SELECT * FROM Attributes WHERE card_id = :card_id");
        $stmt->bindValue(':card_id', $cardId, SQLITE3_INTEGER);
        $result = $stmt->execute();

        while ($attributeRow = $result->fetchArray(SQLITE3_ASSOC)) {
            $attributes[] = new Attribute(
                $attributeRow['set_name'],
                $attributeRow['type'],
                (int)$attributeRow['armor'],
                $attributeRow['color'],
                (int)$attributeRow['power'],
                (int)$attributeRow['reach'],
                $attributeRow['artist'],
                $attributeRow['rarity'],
                $attributeRow['faction'],
                $attributeRow['related'],
                (int)$attributeRow['provision'],
                $attributeRow['factionSecondary']
            );
        }

        return $attributes;
    }

    public function getCardsAndAttributes(): array
    {
        $cardsAndAttributes = [];

        $results = $this->db->query('SELECT * FROM Cards');
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $cardId = (int)$row['id'];
            $attributes = $this->fetchAttributesByCardId($cardId);

            $card = new Card(
                $cardId,
                $row['name'],
                $row['category'],
                $row['ability'],
                $row['flavor'],
                $row['art'],
                $attributes
            );

            $cardsAndAttributes[] = $card;
        }

        return $cardsAndAttributes;
    }

    public function getCardById(int $cardId): ?Card
    {
        $stmt = $this->db->prepare('SELECT * FROM Cards WHERE id = :id');
        $stmt->bindValue(':id', $cardId, SQLITE3_INTEGER);
        $result = $stmt->execute();

        $row = $result->fetchArray(SQLITE3_ASSOC);

        if (!$row) {
            return null;
        }

        $attributes = $this->fetchAttributesByCardId($cardId);

        $card = new Card(
            $cardId,
            $row['name'],
            $row['category'],
            $row['ability'],
            $row['flavor'],
            $row['art'],
            $attributes
        );

        return $card;
    }
}
