<?php

namespace Source\ORM;

use Source\models\User;
use SQLite3;

class GetUsers
{
    public function getUsers(SQLite3 $db): array
    {
        $results = $db->query('SELECT * FROM user');
        $users = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $users[] = new User($row['username'], $row['email'], 'password');
        }
        return $users;
    }
}