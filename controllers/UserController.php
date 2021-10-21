<?php


namespace framework\controllers;


use framework\core\Application;
use framework\core\Request;
use framework\models\User;






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
        if(isset($_SESSION['user_id'])) {
            Application::$app->response->redirect('/dashboard');
        }
        $user_model = new User();
        $this->setLayout('login');
        $params = [
            'user_model' => $user_model
        ];
        return $this->render('user/login', $params);
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

    function google() {
        $client = new Google_Client();
        $client->setClientId(GOOGLE_CLIENT_ID);
        $client->setClientSecret(GOOGLE_CLIENT_SECRET);
        $client->setRedirectUri('http://localhost:8080/login');
        $client->addScope("email");
        $client->addScope("profile");
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            echo ('<pre>');
            var_dump($google_account_info);
            echo ('</pre>');
//        $email =  $google_account_info->email;
//        $name =  $google_account_info->name;

            // now you can use this profile info to create account in your website and make user logged in.
        } else {
            return $client->createAuthUrl();
        }
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