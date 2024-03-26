<?php

require_once 'view/layouts/nav.php';
?>



<h1>Home</h1>
<p>Welcome in my app.</p>

<?php
foreach ($users as $user) {
    echo "<li>$user</li>";
}
?>
