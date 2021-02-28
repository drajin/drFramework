<?php


namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\models\Post;

class PostsController extends Controller
{

    public Post $postModel;

    public function __construct()
    {
        if(!Application::$app->session->isUserLoggedIn()) {
            Application::$app->response->redirect('/login');
        }

        $this->postModel = new Post();

    }

    public function dashboard()
    {
        $posts = $this->postModel->getPosts();

        $params = [
            'posts' => $posts,
        ];

        $this->setLayout('dashboard');
        return $this->render('posts/index', $params);
    }

    public function create()
    {
        $this->setLayout('dashboard');
        return $this->render('posts/create');
    }

}