<?php

require_once 'view/layouts/nav.php';
?>

<body style="background-image : url('../view/image/home-background.png')";>

<div class="container">
    <form action="decks" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="deck_name" class="form-label">Deck Name:</label>
            <input type="text" id="deck_name" name="deck_name" class="tiles_home">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create Deck</button>
        </div>
    </form>


</div>



<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="tiles_home">Decks</h2>
            <table class="table">

                <tbody>
                <?php foreach ($decks as $deck) : ?>


                    <tr>
                        <td><a><?= $deck->getDeckName(); ?></a>
                            <div class="text-center mt-3">
                                <a href="deck?deck_id=<?= $deck->getId()?>" class="btn btn-primary">add cards</a>
                            </div>

                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>


</body>