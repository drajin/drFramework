<?php


namespace app\controllers;
use app\core\Request;
use app\models\Comment;
use app\models\Post;
use app\models\User;
use app\core\Application;


class CommentsController extends Controller
{
    //TODO flash messaging
    //TODO Twitter API
    //TODO Is logged in?
    //TODO Add Content
    //TODO Make more secure

    public Post $postModel;
    public User $userModel;
    public Comment $commentModel;
    public Comment $commentNewModel;



    public function __construct()
    {
        $this->commentModel = new Comment();
        $this->postModel = new Post();
        $this->userModel = new User();
    }

    public function show()
    {
        $comments = $this->commentModel->getComments();

        $params = [
            'comments' => $comments
        ];

        $this->setLayout('index_admin');
        return $this->render('comments/index', $params);
    }

    public function comment_sbm(Request $request)
    {

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        } else {
            Application::$app->response->redirect('not_found');
            Application::$app->response->setStatusCode(404);
        }


        $this->commentNewModel = new Comment();
        $this->commentNewModel->post_id = $id;

        if ($request->isPost()) {
            $this->commentNewModel->loadData($request->getBody());
            $this->commentNewModel->validateComment();
//            var_dump($this->commentNewModel);
//            exit;
            if ($this->commentNewModel->validateComment() === true) {
                    $this->commentNewModel->create();
                    Application::$app->session->setFlashMsg('success', 'Thanks for your comment!');
                    Application::$app->response->redirect('/show?id='.$this->commentNewModel->post_id .'');
                } else {
                    $post = $this->postModel->find_by_id('posts', $this->commentNewModel->post_id);
                    $user = $this->userModel->find_by_id('users', $post->user_id);

                    $params = [
                        'post' => $post,
                        'user' => $user,
                        'comments' => $this->commentModel->getCommentsPost($id),
                        'comment_new' => $this->commentNewModel
                    ];
                    return $this->render('blog/show', $params);
                }
                exit;
        }
    }

    public function delete(Request $request)
    {
//        if(isset($_GET['id']))
//        {
//            $id = $_GET['id'];
//        } else {
//            Application::$app->response->redirect('not_found');
//            Application::$app->response->setStatusCode(404);
//        }
        $id = $_GET['id'];

        if ($request->isPost()) {
            if($this->commentModel->delete($id)){
                Application::$app->session->setFlashMsg('success','Comment removed!');
                Application::$app->response->redirect('/dashboard');
                exit();

            } else Application::$app->session->setFlashMsg('danger','Something went wrong!');


        }



    }



}