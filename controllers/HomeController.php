<?php

    namespace app\controllers;

    use app\core\Application;
    use app\core\Request;
    use app\models\Post;

    class HomeController extends Controller
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

            return $this->render('index', $params);
            //return 'Hellou!';
        }

    }