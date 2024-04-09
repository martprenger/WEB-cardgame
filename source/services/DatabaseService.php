<?php

namespace Source\services;

use Source\models\User;
use SQLite3;

class  DatabaseService {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database/database.db');
    }

    public function getDb(): SQLite3
    {
        return $this->db;
    }

    public function __destruct() {
        $this->db->close();
    }
}



