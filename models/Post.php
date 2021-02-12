<?php

namespace app\models;
use app\core\Database;
use app\core\Application;

class Post
{


    public function getPosts(){
        Application::$app->db->query("SELECT * FROM posts");

        return Application::$app->db->resultSet();
    }

}