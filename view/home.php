<?php

require_once 'view/layouts/nav.php';
?>



<body style="background-image : url('../view/image/Factions.webp')">
<div class="container_body">

<div class="container_newcards">
    <div class="row">
    <h4 class="tiles_home">new cards</h4>

    </div>
</div>
    <div class="container_news">
        <div class="row">
            <h4 class="tiles_home">news</h4>
            <div class="news-item">
                <h2 class="tiles_home">Breaking News</h2>
                <p class="tiles_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et accumsan nunc, sit amet consequat dolor.</p>
            </div>

            <div class="news-item">
                <h2 class="tiles_home">Latest Updates</h2>
                <p class="tiles_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et accumsan nunc, sit amet consequat dolor.</p>
            </div>

            <div class="news-item">
                <h2 class="tiles_home">Exclusive Interview</h2>
                <p class="tiles_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et accumsan nunc, sit amet consequat dolor.</p>
            </div>

            <div class="news-item">
                <h2 class="tiles_home">In-depth Analysis</h2>
                <p class="tiles_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et accumsan nunc, sit amet consequat dolor.</p>
            </div>

            <div class="news-item">
                <h2 class="tiles_home">Market Trends</h2>
                <p class="tiles_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et accumsan nunc, sit amet consequat dolor.</p>
            </div>

        </div>
    </div>
    <?php
    // Assuming you have access to the user's role through the Authorization service
    // Assuming $auth->getUserRole() returns the user's role
    $userRole = $request->getUser()->getRole();

    // Check if the user's role is 'admin' or 'premium'
    if ($userRole === 'admin' || $userRole === 'premium') {
        echo '
            <div class="container_decks">
                <div class="row">
                    <h4 class="tiles_home">decks</h4>
                </div>
            </div>
            ';
    }
    ?>

</div>





</body>


