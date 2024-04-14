<?php

require_once 'view/layouts/nav.php';
?>

<h2 class="tiles_home">click on the card to remove</h2>
<div class='card-container'>
    <?php
    foreach ($cards as $card) {
        require 'view/layouts/removeCard.php';
    }
    ?>

    <div class="text-center mt-3">
        <a href="chooseCard?deck_id=<?= $request->getGet('deck_id')?>" class="btn btn-primary">get your card for your deck </a>
    </div>




</div>

