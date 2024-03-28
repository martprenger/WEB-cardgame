<?php

namespace Source\services;

use Source\models\User;
use SQLite3;

class DatabaseService {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database/database.db');
        $this->db->exec('CREATE TABLE IF NOT EXISTS user (name STRING, email STRING, password STRING)');
    }

    public function getDb(): SQLite3
    {
        return $this->db;
    }

    public function __destruct() {
        $this->db->close();
    }
}



