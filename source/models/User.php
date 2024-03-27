<?php

namespace Source\models;

#[ModelClass]
 class User{
    #[ModelField(name="name")]
    public string $name;
    public string $email;
}