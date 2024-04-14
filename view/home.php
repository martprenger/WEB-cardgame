<?php

require_once 'view/layouts/nav.php';
?>


<body style="background-image : url('../view/image/home-background.png')";>
<h1>Home</h1>
<p>Welcome in my app.</p>

<?php
foreach ($users as $user) {
    echo "<li>$user</li>";
}
?>
