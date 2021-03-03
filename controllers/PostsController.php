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

    public function create_sbm(Request $request)
    {
        if ($request->isPost()) {
            $this->postModel->loadData($request->getBody());
            $this->postModel->validationCreate();
            if ($this->postModel->validationCreate() === true) {
                $this->postModel->create();
                Application::$app->session->setFlashMsg('success','Probno ovdeeee!');

                Application::$app->response->redirect('dashboard');
                exit();

            } else {
                $this->setLayout('dashboard');
                return $this->render('posts/create', $this->postModel);
            }
            //exit; ?? ne znam cemu ovaj exit
        }
    }

    public function edit()
    {

        $this->setLayout('dashboard');
        // sanitize
        $id = $_GET['id'];
        $post = $this->postModel->find_by_id('posts', $id);

        $params = [
            'post' => $post
        ];

        return $this->render('posts/edit', $params);
    }

    public function edit_sbm(Request $request)
    {
        // sanitize what if no id, what if no result
        $id = $_GET['id'];

        if ($request->isPost()) {
            $this->postModel->loadData($request->getBody());
            $this->postModel->validationCreate();
            if ($this->postModel->validationCreate() === true) {

                if($this->postModel->edit($id)){
                    Application::$app->session->setFlashMsg('success','Updejted!');
                    Application::$app->response->redirect('/dashboard');
                    exit();
                } else {
                    Application::$app->session->setFlashMsg('success','Error!');
                    Application::$app->response->redirect('/create');
                    exit;
                }

            } else {
                $this->setLayout('dashboard');
                return $this->render('posts/create', $this->postModel);
            }
            exit;
        }
    }

    public function delete(Request $request)
    {
        // sanitize what if no id, what if no result
        $id = $_GET['id'];

        if ($request->isPost()) {
            if($this->postModel->delete($id)){
                Application::$app->session->setFlashMsg('success','Post removed!');
                Application::$app->response->redirect('/dashboard');
                exit();

            } else Application::$app->session->setFlashMsg('success','Something went wrong!');


        }



    }

    public function show()
    {
        // sanitize what if no id, what if no result
        $id = $_GET['id'];
        $post = $this->postModel->find_by_id('posts', $id);
        $user = $this->postModel->find_by_id('users', $post->user_id);

        $params = [
            'post' => $post,
            'user' => $user
        ];

        $this->setLayout('dashboard');
        return $this->render('posts/show', $params);
    }






}