<?php


namespace app\controllers;

use app\models\Post;


class PostController extends Controller
{

    public function __construct()
    {
        $this->postModel = new Post();
    }

    public function index() {

        $posts = $this->postModel->getPosts();

        $params = [
            'posts' => $posts
        ];

        return $this->render('posts/index', $params);
    }
}