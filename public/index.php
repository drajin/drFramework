<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require(__DIR__ . '/../config/config.php');
$config_tw = require(__DIR__ . '/../config/config_api.php');

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;
use app\controllers\AboutController;
use app\controllers\UserController;
use app\controllers\BlogController;
use app\controllers\PostsController;
use app\controllers\CommentsController;

//App root
define('ROOT', dirname(dirname(__FILE__)));
//URL root
define('URLROOT', 'http://localhost/mvcblog2');
//Sitename
define('SITENAME', 'Dejan\'s blog');


$app = new Application(dirname(__DIR__), $config); // setting new App obj and root path;



$app->router->get('/', [HomeController::class, 'index']);

//Register
$app->router->get('/register', [UserController::class, 'register']);
$app->router->post('/register', [UserController::class, 'register_sbm']);

//Login
$app->router->get('/login', [UserController::class, 'login']);
$app->router->post('/login', [UserController::class, 'login_sbm']);
$app->router->get('/logout', [UserController::class, 'logout']);

//About
$app->router->get('/about', [AboutController::class, 'about']);

//Blog
$app->router->get('/blog', [BlogController::class, 'index']);
$app->router->get('/show', [BlogController::class, 'show']);

//Comments Frontend
$app->router->post('/show', [CommentsController::class, 'comment_sbm']);

//CRUD Post
$app->router->get('/dashboard', [PostsController::class, 'index']);
$app->router->get('/create', [PostsController::class, 'create']);
$app->router->post('/create', [PostsController::class, 'create_sbm']);
$app->router->get('/edit', [PostsController::class, 'edit']);
$app->router->post('/edit', [PostsController::class, 'edit_sbm']);
$app->router->get('/view', [PostsController::class, 'show']);
$app->router->post('/delete', [PostsController::class, 'delete']);


//Comments Backend
$app->router->get('/comments', [CommentsController::class, 'show']);
$app->router->post('/delete_comment', [CommentsController::class, 'delete']);


$app->router->get('/contact', [ContactController::class, 'contact']);


$app->run();


