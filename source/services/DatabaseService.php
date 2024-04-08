<?php

namespace Source\services;

use Source\models\User;
use SQLite3;

class  DatabaseService {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database/database.db');
        $this->db->exec("CREATE TABLE IF NOT EXISTS user (
    name STRING,
    email STRING,
    password STRING,
    role VARCHAR(10) NOT NULL DEFAULT 'user',
    remember_token VARCHAR(30) NULL
)");
        $this->db->exec("INSERT INTO user (name, email, password, role, remember_token) VALUES ('Mart', 'mart@example.com', 'password', 'admin', 'remember_token')");


    }

    public function getDb(): SQLite3
    {
        return $this->db;
    }

    public function __destruct() {
        $this->db->close();
    }
}



