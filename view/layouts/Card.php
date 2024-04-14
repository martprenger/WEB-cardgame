<div class='card'>
    <?php $attributes = $card->getAttributes()[0]; ?>

    <div class="image-stack">
        <img class= "image1" loading="lazy" src="https://gwent.one/image/gwent/assets/card/art/low/<?= $card->getArtId() ?>.jpg">
        <img class= "image2" loading="lazy" src="https://gwent.one/image/gwent/assets/card/other/low/border_<?= strtolower($attributes->getColor()) ?>.png">
        <img class= "image3" loading="lazy" src="https://gwent.one/image/gwent/assets/card/banner/low/default_<?= strtolower($attributes->getFaction()) ?>.png">
        <img class= "image5" loading="lazy" src="https://gwent.one/image/gwent/assets/card/other/low/rarity_<?= strtolower($attributes->getRarity()) ?>.png">
    </div>


    <h2> <?= $card->getName() ?></h2>
    <p> <?= $attributes->getPower() ?></p>
</div>