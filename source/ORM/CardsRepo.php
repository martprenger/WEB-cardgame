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

    public function getCardsAndAttributes(): array
    {
        $cardsAndAttributes = [];

        // Query to retrieve cards
        $results = $this->db->query('SELECT * FROM Cards');
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            // Query to retrieve attributes for this card
            $attributesResult = $this->db->query("SELECT * FROM Attributes WHERE card_id = '{$row['id']}'");
            $attributes = [];
            while ($attributeRow = $attributesResult->fetchArray(SQLITE3_ASSOC)) {
                // Create attribute object and add to attributes array
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

            $card = new Card((int)$row['id'], $row['name'], $row['category'], $row['ability'], $row['flavor'], $row['art'], $attributes);

            // Add card and its attributes to the result array

            $cardsAndAttributes[] = $card;
        }

        return $cardsAndAttributes;
    }
}
