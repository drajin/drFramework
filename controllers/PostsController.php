<?php


namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\models\Post;
use app\models\Comment;

class PostsController extends Controller
{

    public Post $postModel;
    /**
     * @var Comment
     */
    private Comment $commentModel;

    public function __construct()
    {
        if(!Application::$app->session->isUserLoggedIn()) {
            Application::$app->response->redirect('/login');
        }

        $this->postModel = new Post();
        $this->commentModel = new Comment();

    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $comments = $this->commentModel->getComments();

        $params = [
            'posts' => $posts,
            'comments' => $comments
        ];

        $this->setLayout('index_admin');
        return $this->render('posts/index', $params);
    }

    public function create()
    {
        $this->setLayout('index_admin');
        return $this->render('posts/create');
    }

    public function create_sbm(Request $request)
    {
        if ($request->isPost()) {
            $this->postModel->loadData($request->getBody());
            $this->postModel->validatePost();
            if ($this->postModel->validatePost() === true) {
                $this->postModel->create();
                Application::$app->session->setFlashMsg('success','Post published!');
                Application::$app->response->redirect('dashboard');
                exit();

            } else {
                $this->setLayout('index_admin');
                return $this->render('posts/create', $this->postModel);
            }
            //exit; ?? ne znam cemu ovaj exit
        }
    }

    public function edit()
    {


        // sanitize
        $id = $_GET['id'];
        $post = $this->postModel->find_by_id('posts', $id);

        $params = [
            'post' => $post
        ];

        $this->setLayout('index_admin');
        return $this->render('posts/edit', $params);
    }

    public function edit_sbm(Request $request)
    {
        // sanitize what if no id, what if no result
        $this->postModel->id = $_GET['id'];

        if ($request->isPost()) {
            $this->postModel->loadData($request->getBody());
            $this->postModel->validatePost();
            if ($this->postModel->validatePost() === true) {
//                echo("<pre>");
//                var_dump($this->postModel);
//                echo("</pre>");
//                exit;
                if($this->postModel->edit($this->postModel)){
                    Application::$app->session->setFlashMsg('success','Updejted!');
                    Application::$app->response->redirect('/dashboard');
                    exit();
                } else {
                    Application::$app->session->setFlashMsg('success','Error!');
                    Application::$app->response->redirect('/create');
                    exit;
                }

            } else {

                // dali moze da se posalje post[id] = $id ???????

                $params = [
                    'post' => $this->postModel
                ];
                $this->setLayout('index_admin');
                return $this->render('posts/edit', $params);
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
                return $this->index();
                exit();

            } else Application::$app->session->setFlashMsg('success','Delete error!');


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

        $this->setLayout('index_admin');
        return $this->render('posts/show', $params);
    }






}