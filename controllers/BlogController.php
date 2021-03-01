<?php


namespace app\controllers;
use app\models\Post;
use app\models\User;  //accessing method thought Post?
use app\core\Application;


class BlogController extends Controller
{

    public Post $postModel;
    public User $userModel;

    public function __construct()
    {
        $this->postModel = new Post();
        $this->userModel = new User();
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

        // sanitize
        $id = $_GET['id'];
        $post = $this->postModel->find_by_id('posts', $id);

        $user = $this->userModel->find_by_id('users', $post->user_id);

        $params = [
            'post' => $post,
            'user' => $user
        ];

        return $this->render('blog/show', $params);
    }





}