<?php

require_once 'view/layouts/nav.php';

foreach ($cards as $card) {
    echo "<div class='card'>";
    echo "<h2>" . $card['card']->getName(). "</h2>";
    echo "<p>Attack: " . $card['attributes'][0]->getPower() . "</p>";
    echo "</div>";
}