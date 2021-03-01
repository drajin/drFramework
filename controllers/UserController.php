<?php


namespace app\controllers;


use app\core\Application;
use app\core\Request;
use app\models\Model;
use app\models\User;





class UserController extends Controller
{


    public function __construct()
    {
//        $this->postModel = new Post();
    }

    public function register()
    {
        $this->setLayout('register');
        return $this->render('user/register');
    }

    public function register_sbm(Request $request)
    {
        $user_model = new User();
        if ($request->isPost()) {
            $user_model->loadData($request->getBody());
            $user_model->validation_register();
            if ($user_model->validation_register() === true) {
                $user_model->password = password_hash($user_model->password, PASSWORD_DEFAULT);
                if ($user_model->register()) {
                    Application::$app->session->setFlashMsg('success', 'Done, now log in, step inside!');
                    Application::$app->response->redirect('/login');
                } else {
                    return 'Failed!';
                }

            } else {
                $this->setLayout('register');
                return $this->render('user/register', $user_model);
            }
            exit;
        }
    }

    public function login()
    {
        $this->setLayout('login');
        return $this->render('user/login');
    }

    public function login_sbm(Request $request)
    {
        $user_model = new User();
        if ($request->isPost()) {
            $user_model->loadData($request->getBody());
            $user_model->validation_login();
            if ($user_model->validation_login() === true) {
                $user_model->login();

            } else {
                $this->setLayout('login');
                return $this->render('user/login', $user_model);
            }
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        Application::$app->response->redirect('login');
    }











//        $userModel = new User();  ZURA 1
//        if($request->isPost()) {
//
//            $userModel->loadData($request->getBody());
//
//            if($userModel->validate() && $userModel->register()) {
//                return 'Success';
//            }
//            echo '<pre>';
//            var_dump($userModel->errors);
//            echo '</pre>';
//            exit;
//        }   return $this->render('register', [
//            'model' => $userModel
//    ]);






}