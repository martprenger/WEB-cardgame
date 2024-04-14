<?php

require_once 'view/layouts/nav.php';

?>
<body style="background-image : url('../view/image/home-background.png')";>

<div class='card-container'>
    <?php
    foreach ($cards as $card) {
        require 'view/layouts/addcard.php';

    }
    ?>

</div>