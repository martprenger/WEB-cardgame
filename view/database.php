<h1>Database</h1>
<p>Welcome in my database.</p>

<?php
foreach ($users as $usr) {
    #show username and email

    echo "<p>" . $usr->getName() . ": " . $usr->getEmail() . "</p>";
}
?>
