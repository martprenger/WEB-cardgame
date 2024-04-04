<?php

require_once 'view/layouts/header.php';
?>


<body style="background-image : url('../../view/image/11360000_-_Kayran.webp')";>
<h1 class="title">SIGNUP</h1>
<div class="container">
    <div class="profile-image-login">
        <img src="https://via.placeholder.com/150" alt="profile picture">
    </div>

    <form class="form" method="POST" action="signup">
        <div class="input-group">
            <label for="username" class="label">Username</label>
            <input type="text" id="username" class="input-field" name="username" placeholder="Username">
        </div>
        <div class="input-group">
            <label for="password" class="label">email</label>
            <input type="text" id="password" class="input-field" name="email" placeholder="Password">
        </div>
        <div class="input-group">
            <label for="password" class="label">Password</label>
            <input type="password" id="password" class="input-field" name="password" placeholder="Password">
        </div>
        <div class="input-group">
            <label for="confirm-password" class="label">Redo Password</label>
            <input type="password" id="confirm-password" class="input-field" name="password-redo" placeholder="Redo Password">
        </div>
        <button type="submit" class="button">Signup</button>
    </form>
</div>

</body>
