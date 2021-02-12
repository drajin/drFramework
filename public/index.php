<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require(__DIR__ . '/../config/config.php');

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;
use app\controllers\PostController;



$app = new Application(dirname(__DIR__), $config); // setting new App obj and root path;

$app->router->get('/users', function (){
    echo 'Helloggg!';
});

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/posts', [PostController::class, 'index']);

$app->router->get('/contact', [ContactController::class, 'contact']);


$app->run();


