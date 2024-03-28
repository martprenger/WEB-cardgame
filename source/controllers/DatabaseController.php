<?php

namespace Source\controllers;

use Source\Request;
use Source\services\DatabaseService;

class DatabaseController implements ControllerInterface
{
    private $databaseModel;

    public function __construct()
    {
        $this->databaseModel = new DatabaseService();
    }

    public function handle(Request $request): void
    {
        echo 'test';
        $users = $this->getUsers();
        require 'view/database.php';
    }

    private function getUsers()
    {

        return $this->databaseModel->getUsers();
    }
}
