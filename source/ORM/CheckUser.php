<?php

namespace Source\ORM;

use Source\models\User;
use SQLite3;

class CheckUser
{
    public function checkUser(SQLite3 $db, string $username, string $password): bool
    {
        // Prepare the SQL statement
        $stmt = $db->prepare('SELECT * FROM user WHERE name = :name');
        $stmt->bindValue(':name', $username, SQLITE3_TEXT);

        // Execute the prepared statement
        $result = $stmt->execute();

        // Fetch the result
        $user = $result->fetchArray(SQLITE3_ASSOC);

        // If the user exists, verify the password
        if ($user) {
            return password_verify($password, $user['password']);
        }

        // If the user does not exist, return false
        return false;
        }
}