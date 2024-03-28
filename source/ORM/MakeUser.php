<?php

namespace Source\ORM;

use Source\models\User;
use SQLite3;

class MakeUser
{
    public function addUser(SQLite3 $db, User $user): bool {
        $stmt = $db->prepare('INSERT INTO user (username, email, password) VALUES (:name, :email, :password)');
        $stmt->bindValue(':name', $user->getName(), SQLITE3_TEXT);
        $stmt->bindValue(':email', $user->getEmail(), SQLITE3_TEXT);
        $stmt->bindValue(':password', $user->getPassword(), SQLITE3_TEXT);

        $result = $stmt->execute();

        return $result !== false;
    }


}