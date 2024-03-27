<?php

namespace Source\models;

use SQLite3;

class DatabaseModel {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database/database.db');
        $this->db->exec('CREATE TABLE IF NOT EXISTS user (name STRING, email STRING, password STRING)');
    }

    public function getUsers():array {
        $results = $this->db->query('SELECT * FROM user');
        $users = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $users[] = new User($row['name'], $row['email']);
        }
        return $users;
    }

    public function __destruct() {
        $this->db->close();
    }
}



