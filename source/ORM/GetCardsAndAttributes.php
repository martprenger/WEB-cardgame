<?php

namespace Source\ORM;

use Source\models\Card;
use Source\models\Attribute;
use SQLite3;

class GetCardsAndAttributes
{
    public function getCardsAndAttributes(SQLite3 $db): array
    {
        $cardsAndAttributes = [];

        // Query to retrieve cards
        $results = $db->query('SELECT * FROM Cards');
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            // Create card object
            $card = new Card($row['name'], $row['category'], $row['ability'], $row['flavor'], []);

            // Query to retrieve attributes for this card
            $attributesResult = $db->query("SELECT * FROM Attributes WHERE card_id = '{$row['id']}'");
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
                    $attributeRow['factionSecondary'],
                    $card
                );
            }

            // Add card and its attributes to the result array
            $cardsAndAttributes[] = ['card' => $card, 'attributes' => $attributes];
        }

        return $cardsAndAttributes;
    }
}
