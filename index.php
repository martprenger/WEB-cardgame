<?php

use Source\controllers\HomeController;
use Source\controllers\LoginController;
use Source\Router;

require __DIR__ . '/vendor/autoload.php';

$routes = [

    'test' => 'view/test.php',
    'register' => 'source/controllers/RegisterController.php',
    'login' => 'source/controllers/LoginController.php',


    'home' => 'source/controllers/HomeController.php',
    'decks' => 'source/controllers/DeckController.php',
    'cards' => 'source/controllers/CardController.php',
    'account' => 'source/controllers/AccountController.php',


    '404' => 'view/404.php',
    'database' => 'source/controllers/DatabaseController.php',
    '' => 'source/controllers/DatabaseController.php'
    // Add more routes here
];

$router = new Router();
$router->addRoute('GET', '/login', function () {
    $controller = new LoginController();
    $controller->get();
});

$router->addRoute('POST', '/login', function () {
    $controller = new LoginController();
    $controller->post();
});

$router->matchRoute();