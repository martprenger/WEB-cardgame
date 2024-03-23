<?php

use Source\Router;

require __DIR__ . '/vendor/autoload.php';

$routes = [
    'test' => 'view/test.php',
    'home' => 'source/controllers/HomeController.php',
    '404' => 'view/404.php',
    'database' => 'source/controllers/DatabaseController.php',
    '' => 'source/controllers/DatabaseController.php'
    // Add more routes here
];

$router = new Router($routes);
$router->route($_SERVER['REQUEST_URI']);