<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;

//require 'core/bootstrap.php';
//
//require Router::load('routes.php')
//    ->direct(Request::uri());

$app = new Application(dirname(__DIR__)); // setting new App obj and root path;

$app->router->get('/users', function (){
    echo 'Helloggg!';
});

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('/contact', [ContactController::class, 'contact']);


$app->run();


