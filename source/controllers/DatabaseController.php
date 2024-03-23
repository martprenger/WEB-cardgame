<?php

namespace Source\controllers;

use Source\models\DatabaseModel;

class DatabaseController
{
    private $databaseModel;

    public function __construct()
    {
        $this->databaseModel = new DatabaseModel();
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

$content = new DatabaseController();
$content->index();