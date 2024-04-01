<?php

require_once 'view/layouts/header.php';
?>


<div class="container">
    <h1 class="title">SIGNUP</h1>
    <form class="form">
        <div class="input-group">
            <label for="username" class="label">Username</label>
            <input type="text" id="username" class="input" placeholder="Username">
        </div>
        <div class="input-group">
            <label for="password" class="label">Password</label>
            <input type="password" id="password" class="input" placeholder="Password">
        </div>
        <div class="input-group">
            <label for="confirm-password" class="label">Redo Password</label>
            <input type="password" id="confirm-password" class="input" placeholder="Redo Password">
        </div>
        <button type="submit" class="button">Signup</button>
    </form>
</div>