<?php


namespace app\controllers;
use app\models\Post;


class BlogController extends Controller
{

    public Post $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }


    public function index()
    {
        $posts = $this->postModel->getPosts();

        $params = [
            'posts' => $posts,
        ];

        return $this->render('blog/index', $params);
    }

    public function show() {

        return $this->render('blog/show');
    }



}