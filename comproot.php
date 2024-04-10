<?php

use Source\controllers\CardController;
use Source\controllers\DatabaseController;
use Source\controllers\HomeController;
use Source\controllers\LoginController;
use Source\controllers\RegisterController;
use Source\middleware\Authentiecation;
use Source\ORM\CardsRepo;
use Source\ORM\UserRepo;
use Source\Router;

$db = new SQLite3('database/database.db');

$userRepo = new UserRepo($db);
$cardsRepo = new CardsRepo($db);

$database = new DatabaseController($userRepo, $cardsRepo);
$login = new LoginController($userRepo);
$register = new RegisterController($userRepo);
$home = new HomeController();
$card = new CardController($cardsRepo);

$router = new Router();

$router->addMiddleware(new Authentiecation($userRepo));

$router->addRoute('GET', '/data/{id}', [$database, 'handle']);
$router->addRoute('GET', '/data', [$database, 'handle']);

$router->addRoute('GET', '/login', [$login, 'loginView']);
$router->addRoute('POST', '/login', [$login, 'loginPost']);
$router->addRoute('GET', '/', [$home, 'handle']);
$router->addRoute('GET', '/signup', [$register, 'get']);
$router->addRoute('POST', '/signup', [$register, 'post']);

$router->addRoute('GET', '/cards', [$card, 'index']);
return $router;