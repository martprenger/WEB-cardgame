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

    #[Role(name: 'role')]
    private string $role;

    public function __construct(string $name, string $email, string $password, string $role) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
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

    // getter for role
    public function getRole(): string {
        return $this->role;
    }
}