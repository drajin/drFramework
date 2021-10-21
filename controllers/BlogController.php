<?php


namespace framework\controllers;
use framework\models\Post;
use framework\models\User;  //accessing method thought Post?
use framework\core\Application;
use framework\models\Comment;


class BlogController extends Controller
{

    public Post $postModel;
    public User $userModel;

    public function __construct()
    {
        $this->postModel = new Post();
        $this->userModel = new User();
        $this->commentModel = new Comment();
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


        if( isset($_GET['id']))
        {
            $id = $_GET['id'];
        } else {
            Application::$app->response->setStatusCode(404);
            Application::$app->response->redirect('not_found');
        }

        $post = $this->postModel->find_by_id('posts', $id);
        if(empty($post)) {
            Application::$app->response->setStatusCode(404);
            Application::$app->response->redirect('not_found');

        }
        $user = $this->userModel->find_by_id('users', $post->user_id);
        $comments = $this->commentModel->getCommentsPost($id);

        $params = [
            'post' => $post,
            'user' => $user,
            'comments' => $comments
        ];

        return $this->render('blog/show', $params);
    }






}