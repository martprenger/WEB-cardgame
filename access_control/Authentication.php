<?php

namespace access_control;

class Authentication
{

    private $users;

    public function __construct() {
        // Simulated user data (in a real application, this would come from a database)
        $this->users = [
            'user1' => ['password' => password_hash('password1', PASSWORD_DEFAULT), 'role' => 'user'],
            'user2' => ['password' => password_hash('password2', PASSWORD_DEFAULT), 'role' => 'admin']
        ];
    }

    public function authenticate($username, $password) {
        if (isset($this->users[$username]) && password_verify($password, $this->users[$username]['password'])) {
            return $this->users[$username]['role'];
        }
        return false;
    }



}