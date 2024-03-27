<?php

require_once 'view/layouts/header.php';
?>


<div class="container mt-5">
    <div class="row justify-content-center">

    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card">

                <div class="card-body">
                    <div class="profile image login">
                        <img src="https://via.placeholder.com/150" alt="profile picture">
                    </div>
                    <form method="POST" action="login">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
