<?php

use Source\controllers\AuthController;
use Source\controllers\CardController;
use Source\controllers\DatabaseController;
use Source\controllers\DeckController;
use Source\controllers\ErrorCodesController;
use Source\controllers\HomeController;
use Source\middleware\Authentiecation;
use Source\ORM\CardsRepo;
use Source\ORM\TablesRepo;
use Source\ORM\UserRepo;
use Source\ORM\DecksRepo;
use Source\Router;
use Source\services\Authorization;

$db = new SQLite3('database/database.db');

$creatTables = new TablesRepo($db);
$creatTables->createTables();
//$creatTables->presetData();

$userRepo = new UserRepo($db);
$cardsRepo = new CardsRepo($db);
$deckRepo = new DecksRepo($db, $cardsRepo);

//services
$authorizer = new Authorization();

//controllers
$database = new DatabaseController($userRepo, $cardsRepo);
$auth = new AuthController($userRepo);
$home = new HomeController($authorizer);
$card = new CardController($cardsRepo);
$deck = new DeckController($authorizer, $deckRepo, $cardsRepo);
$error = new ErrorCodesController();

$router = new Router();

$router->addMiddleware(new Authentiecation($userRepo));

$router->addRoute('GET', '/', [$home, 'handle']);
$router->addRoute('GET', '/404', [$error, 'handle']);

$router->addRoute('GET', '/login', [$auth, 'loginView']);
$router->addRoute('POST', '/login', [$auth, 'loginPost']);
$router->addRoute('GET', '/signup', [$auth, 'register']);
$router->addRoute('POST', '/signup', [$auth, 'registerPost']);
$router->addRoute('GET', '/logout', [$auth, 'logout']);

$router->addRoute('GET', '/cards', [$card, 'index']);
$router->addRoute('GET', '/decks', [$deck, 'showDecks']);
$router->addRoute('POST', '/decks', [$deck, 'create_deck']);
$router->addRoute('GET', '/deck', [$deck, 'showDeck']);

$router->addRoute('GET', '/chooseCard', [$deck, 'showChooseCardForDeck']);
$router->addRoute('GET', '/setCard', [$deck, 'setCardToDeck']);
$router->addRoute('GET', '/removeCard', [$deck, 'removeCardFromDeck']);

return $router;