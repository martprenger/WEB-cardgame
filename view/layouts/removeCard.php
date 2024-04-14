<a href="removeCard?deck_id=<?= $request->getGet('deck_id') ?>&card_id=<?= $card->getId() ?>">
    <div class='card'>
        <?php $attributes = $card->getAttributes()[0]; ?>

        <?= $card->getArt() ?>

        <h8> <?= $card->getName() ?></h8>
    </div>
</a>
