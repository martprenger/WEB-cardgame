<?php

namespace Source\controllers;

use Source\services\DatabaseService;

class DatabaseController
{
    private $databaseModel;

    public function __construct()
    {
        $this->databaseModel = new DatabaseService();
    }

    public function index()
    {
        $lines = $this->getUsers();
        require 'view/database.php';
    }

    private function getUsers()
    {
        return $this->databaseModel->getUsers();
    }
}
