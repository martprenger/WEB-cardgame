<?php

namespace Source\models;

#[Entity]
#[Table(name: 'user')]
class User{
    #[Column(name: 'username')]
    private string $name;

    #[Column(name: 'email')]
    private string $email;

    #[Column(name: 'password')]
    private string $password;

    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // getter for name
    public function getName(): string {
        return $this->name;
    }

    // getter for email
    public function getEmail(): string {
        return $this->email;
    }

    // getter for password
    public function getPassword(): string {
        return $this->password;
    }
}