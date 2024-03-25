<?php

namespace Source\models;

use SQLite3;

class DatabaseModel {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database/database.db');
        $this->db->exec('CREATE TABLE IF NOT EXISTS user (name STRING, email STRING, password STRING)');
    }

    public function getUsers() {
        $results = $this->db->query('SELECT * FROM user');
        $items = array();
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $items[] = $row;
        }
        return $items;
    }

    public function __destruct() {
        $this->db->close();
    }
}



