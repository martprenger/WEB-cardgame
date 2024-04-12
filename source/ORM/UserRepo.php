<?php

namespace Source\ORM;

use Source\models\User;
use SQLite3;

class UserRepo
{
    private $db;

    public function __construct(SQLite3 $db)
    {
        $this->db = $db;
    }

    public function checkUser(string $username, string $password): ?User
    {
        // Prepare the SQL statement
        $stmt = $this->db->prepare('SELECT * FROM user WHERE name = :name');
        $stmt->bindValue(':name', $username, SQLITE3_TEXT);

        // Execute the prepared statement
        $result = $stmt->execute();

        // Fetch the result
        $user = $result->fetchArray(SQLITE3_ASSOC);

        // If the user exists, verify the password
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $userr = new User($user['name'], $user['email'], $user['password'], $user['role']);
                return $userr;
            }
        }

        // If the user does not exist, return false
        return null;
    }

    public function setCookie(string $username, string $rememberToken): void
    {
        // Prepare the SQL statement
        $stmt = $this->db->prepare('UPDATE user SET remember_token = :token WHERE name = :name');
        $stmt->bindValue(':name', $username, SQLITE3_TEXT);
        $stmt->bindValue(':token', $rememberToken, SQLITE3_TEXT);

        // Execute the statement
        $stmt->execute();
    }

    public function checkCookie(string $token): ?User
    {
        // Prepare the SQL statement
        $stmt = $this->db->prepare('SELECT * FROM user WHERE remember_token = :token');
        $stmt->bindValue(':token', $token, SQLITE3_TEXT);

        // Execute the prepared statement
        $result = $stmt->execute();

        // Fetch the result
        $user = $result->fetchArray(SQLITE3_ASSOC);

        // If the user exists, return the User object
        if ($user) {
            return new User($user['name'], $user['password'], $user['remember_token'], $user['role']);
        }

        // If the user does not exist, return null
        return null;
    }
    public function getUsers(): array
    {
        $results = $this->db->query('SELECT * FROM user');
        $users = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $users[] = new User($row['name'], $row['email'], $row['password'], $row['role']);
        }
        return $users;
    }

    public function createUser(User $user): bool {
        $stmt = $this->db->prepare('INSERT INTO user (name, email, password) VALUES (:name, :email, :password)');
        $stmt->bindValue(':name', $user->getName(), SQLITE3_TEXT);
        $stmt->bindValue(':email', $user->getEmail(), SQLITE3_TEXT);
        $stmt->bindValue(':password', $user->getPassword(), SQLITE3_TEXT);

        $result = $stmt->execute();

        return $result !== false;
    }
}