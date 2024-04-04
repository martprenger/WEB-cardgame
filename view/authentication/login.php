<?php

require_once 'view/layouts/header.php';
?>


<body style="background-image : url('../../view/image/Factions.webp')";>
<h1 class="title-login">LOGIN</h1>
<div class="container">
    <div class="profile-image-login">
        <img src="https://via.placeholder.com/150" alt="profile picture">
    </div>

    <form class="form" method="POST" action="signup">
        <div class="input-group-login">
            <label for="username" class="label-login">Username</label>
            <input type="text" id="username" class="input-field" placeholder="Username">
        </div>
        <div class="input-group-login">
            <label for="password" class="label-login">Password</label>
            <input type="password" id="password" class="input-field" placeholder="Password">
        </div>
        <button type="submit" class="button-login">Signup</button>
    </form>
</div>

</body>
