<?php
// Check if card data is provided
if (!empty($card)) {
    echo "<div class='card'>";
    echo "<h2>" . $card['card']->getName(). "</h2>";
    echo "<p>Attack: " . $card['attributes'][0]->getPower() . "</p>";
    // Display other attributes as needed
    echo "</div>";
} else {
    echo "<p>No card data available.</p>";
}
?>
