<?php

use Source\controllers\CardController;
use Source\controllers\DatabaseController;
use Source\controllers\HomeController;
use Source\controllers\LoginController;
use Source\controllers\RegisterController;
use Source\Request;
use Source\Router;

require __DIR__ . '/vendor/autoload.php';



$router = new Router();
$router->addRoute('GET', '/data/{id}', [DatabaseController::class, 'handle']);
$router->addRoute('GET', '/data', [DatabaseController::class, 'handle']);


$router->addRoute('GET', '/login', [LoginController::class, 'get']);
$router->addRoute('POST', '/login', [LoginController::class, 'post']);
$router->addRoute('GET', '/', [HomeController::class, 'handle']);
$router->addRoute('GET', '/signup', [RegisterController::class, 'get']);
$router->addRoute('POST', '/signup', [RegisterController::class, 'post']);

$router->addRoute('GET', '/cards', [CardController::class, 'index']);

$request = Request::createFromGlobals();
$router->matchRoute($request);
