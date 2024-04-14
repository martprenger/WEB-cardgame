<?php

require_once 'view/layouts/nav.php';
?>



<h1>Decks</h1>
<p>Welcome in my app.</p>

<form action="create_deck.php" method="post">
    <label for="deck_name">Deck Name:</label><br>
    <input type="text" id="deck_name" name="deck_name"><br>
    <input type="submit" value="Create Deck">
</form>