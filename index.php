<?php

use Source\Controller\Router;

require_once __DIR__ . "/vendor/autoload.php";

$router = new Router();

$router->createRoute('/about', 'about', 'Sobre');
$router->createRoute('/home', 'home', "Página Inicial");

$router->run();