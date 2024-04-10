<?php

namespace Source\ORM;

use SQLite3;

class InsertCookie
{
    public function setCookie(SQLite3 $db, string $username, string $rememberToken)
    {
        // Prepare the SQL statement
        $stmt = $db->prepare('UPDATE user SET remember_token = :token WHERE name = :name');
        $stmt->bindValue(':name', $username, SQLITE3_TEXT);
        $stmt->bindValue(':token', $rememberToken, SQLITE3_TEXT);

        // Execute the statement
        $stmt->execute();
    }
}