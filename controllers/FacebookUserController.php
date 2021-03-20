<?php


namespace app\controllers;
use Facebook\Facebook;


class FacebookUserController
{
    public Facebook $facebook;
    public  $facebook_helper;



    public function __construct()
    {
        $this->facebook = new  Facebook([
            'app_id'      => FB_APP_ID,
            'app_secret'     => FB_APP_SECRET,
            'default_graph_version'  => 'v2.10'
        ]);
        $this->facebook_helper = $this->facebook->getRedirectLoginHelper();

    }

    function facebookUser()
    {
        if(isset($_GET['code']))
        {
            if(isset($_SESSION['access_token']))
            {
                $access_token = $_SESSION['access_token'];
            }
            else
            {
                $access_token = $this->facebook_helper->getAccessToken();

                $_SESSION['access_token'] = $access_token;

                $this->facebook->setDefaultAccessToken($_SESSION['access_token']);
            }

            $_SESSION['user_id'] = '';
            $_SESSION['user_name'] = '';
            $_SESSION['user_email'] = '';

            $graph_response = $this->facebook->get("/me?fields=name,email", $access_token);

            $facebook_user_info = $graph_response->getGraphUser();

            if(!empty($facebook_user_info['id']))
            {
                $_SESSION['user_id'] = $facebook_user_info['id'];
            }

            if(!empty($facebook_user_info['name']))
            {
                $_SESSION['user_name'] = $facebook_user_info['name'];
            }

            if(!empty($facebook_user_info['email']))
            {
                $_SESSION['user_email_address'] = $facebook_user_info['email'];
            }

        }
        else
        {
            // Get login url
            $facebook_permissions = ['email']; // Optional permissions


            // Render Facebook login button
            return  $this->facebook_helper->getLoginUrl('http://localhost:8080/login', $facebook_permissions);

        }

    }


}