<?php

use Source\Router;

require __DIR__ . '/vendor/autoload.php';

$routes = [
    'test' => 'view/test.php',
    'home' => 'view/home.php',
    '404' => 'view/404.php'
    // Add more routes here
];

$router = new Router($routes);
$router->route($_SERVER['REQUEST_URI']);
