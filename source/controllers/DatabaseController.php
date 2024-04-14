<?php

namespace Source\controllers;


use Source\ORM\CardsRepo;
use Source\ORM\DecksRepo;
use Source\ORM\UserRepo;
use Source\Request;

class DatabaseController
{
    private UserRepo $userRepo;
    private CardsRepo $cardRepo;


    public function __construct(UserRepo $userRepo, CardsRepo $cardRepo)
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
