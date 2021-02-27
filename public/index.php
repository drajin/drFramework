<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require(__DIR__ . '/../config/config.php');

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;
use app\controllers\AboutController;
use app\controllers\UserController;

//App root
define('ROOT', dirname(dirname(__FILE__)));
//URL root
define('URLROOT', 'http://localhost/mvcblog2');
//Sitename
define('SITENAME', 'Dejan\'s blog');


$app = new Application(dirname(__DIR__), $config); // setting new App obj and root path;

$app->router->get('/users', function (){
    echo 'Helloggg!';
});

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('/register', [UserController::class, 'register']);
$app->router->post('/register', [UserController::class, 'register_sbm']);

$app->router->get('/login', [UserController::class, 'login']);
$app->router->post('/login', [UserController::class, 'login_sbm']);

$app->router->get('/logout', [UserController::class, 'logout']);


$app->router->get('/about', [AboutController::class, 'about']);

$app->router->get('/contact', [ContactController::class, 'contact']);


$app->run();


