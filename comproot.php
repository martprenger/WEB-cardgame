<?php

use Source\controllers\AuthController;
use Source\controllers\CardController;
use Source\controllers\DatabaseController;
use Source\controllers\DeckController;
use Source\controllers\HomeController;
use Source\middleware\Authentiecation;
use Source\ORM\CardsRepo;
use Source\ORM\UserRepo;
use Source\Router;
use Source\services\Authorization;

$db = new SQLite3('database/database.db');

$userRepo = new UserRepo($db);
$cardsRepo = new CardsRepo($db);

//services
$authorizer = new Authorization();

//controllers
$database = new DatabaseController($userRepo, $cardsRepo);
$auth = new AuthController($userRepo);
$home = new HomeController($authorizer);
$card = new CardController($cardsRepo);
$deck = new DeckController($authorizer);

$router = new Router();

$router->addMiddleware(new Authentiecation($userRepo));

$router->addRoute('GET', '/', [$home, 'handle']);

$router->addRoute('GET', '/data/{id}', [$database, 'handle']);
$router->addRoute('GET', '/data', [$database, 'handle']);

$router->addRoute('GET', '/login', [$auth, 'loginView']);
$router->addRoute('POST', '/login', [$auth, 'loginPost']);
$router->addRoute('GET', '/signup', [$auth, 'register']);
$router->addRoute('POST', '/signup', [$auth, 'registerPost']);
$router->addRoute('GET', '/logout', [$auth, 'logout']);

$router->addRoute('GET', '/cards', [$card, 'index']);
$router->addRoute('GET', '/decks', [$deck, 'show']);
return $router;