<?php

use Source\controllers\CardController;
use Source\controllers\DatabaseController;
use Source\controllers\HomeController;
use Source\controllers\LoginController;
use Source\controllers\RegisterController;
use Source\middleware\Authentiecation;
use Source\Request;
use Source\Router;

require __DIR__ . '/vendor/autoload.php';

$router = require 'comproot.php';
$request = Request::createFromGlobals();
$router->matchRoute($request);
