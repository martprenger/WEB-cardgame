<?php

require_once 'view/layouts/nav.php';
?>

<body style="background-image : url('../view/image/home-background.png')";>

<h1>Decks</h1>
<p>Welcome in my app.</p>

<form action="decks" method="post">
    <label for="deck_name">Deck Name:</label><br>
    <input type="text" id="deck_name" name="deck_name"><br>
    <label for="creator">Creator:</label><br>
    <input type="text" id="creator" name="creator"><br>
    <input type="submit" value="Create Deck">
</form>