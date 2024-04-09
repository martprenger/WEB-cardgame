<?php

namespace Source\controllers;


use Source\ORM\GetCardsAndAttributes;
use Source\ORM\GetUsers;
use Source\Request;
use Source\services\DatabaseService;

class DatabaseController
{

    public function handle(Request $request): void
    {

        $users = $this->getUsers();
        require 'view/database.php';
    }

    private function getUsers(): array
    {
        $dbService = new DatabaseService();
        $db = $dbService->getDb();
        $orm = new GetUsers();
        return $orm->getUsers($db);
    }

    public function getCards(): array
    {
        $dbService = new DatabaseService();
        $db = $dbService->getDb();
        $orm = new GetCardsAndAttributes();
        return $orm->getCardsAndAttributes($db);
    }
}
