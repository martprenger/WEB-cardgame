<h1>Database</h1>
<p>Welcome in my database.</p>

<?php
foreach ($lines as $line) {
    #show username and email
    echo $line['username'] . ' ' . $line['email'] . '<br>';
}
?>
