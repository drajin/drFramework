<?php

    namespace framework\controllers;

    use framework\core\Application;
    use framework\core\Request;

    class HomeController extends Controller
    {
        public function __construct()
        {
            //$this->postModel = new Post();
        }

        public function index() {

           // $posts = $this->postModel->getPosts();
//             $params = [
//                    'poozdraaavv!!!' => $posts
//            ];

            return $this->render('index');

        }

    }