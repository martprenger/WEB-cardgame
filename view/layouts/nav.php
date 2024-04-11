<?php

require_once 'view/layouts/header.php';
?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <!-- Left Side Of Navbar -->
    <div class="navbar-brand">
        <!--        <a class="navbar-brand" href="home">Navbar</a>-->
        <!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--            <span class="navbar-toggler-icon"></span>-->
        <!--        </button>-->
        <div class="collapse navbar-collapse container-fluid" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cards">cards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="decks">decks</a>
                </li>

                <li class="nav-item account ">
                    <a class="nav-link" href="account">account</a>
                </li>

                <div class="profilepic d-flex">
                    <img src="https://via.placeholder.com/50" alt="profile picture">
                </div>

            </ul>
        </div>
    </div>

    <!-- Center Side Of Navbar -->
    <div class="mx-auto order-0">
    </div>

    <!-- Right Side Of Navbar -->
    <div class="navbar-brand dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $request->getUser()->getName() ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="profile">Profile</a>
        <a class="dropdown-item" href="settings">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout">Logout</a>
        </div>
    </div>
</nav>