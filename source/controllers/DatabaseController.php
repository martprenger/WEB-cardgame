<?php

namespace Source\controllers;


use Source\ORM\CardsRepo;
use Source\ORM\GetUsers;
use Source\Request;
use Source\services\DatabaseService;

class DatabaseController
{
    private $userRepo;
    private $cardRepo;

    public function __construct($userRepo, $cardRepo)
    {
        $this->userRepo = $userRepo;
        $this->cardRepo = $cardRepo;
    }
    public function handle(Request $request): void
    {

        $users = $this->getUsers();
        require 'view/database.php';
    }

    private function getUsers(): array
    {
        return $this->userRepo->getUsers();
    }

    public function getCards(): array
    {
        return $this->cardRepo->getCardsAndAttributes();
    }
}
