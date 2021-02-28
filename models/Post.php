<?php


namespace app\models;
use app\core\Database;
use app\core\Application;


class Post extends Model
{
    public function getPosts()
    {
        Application::$app->db->query('SELECT *,
                                posts.id as postId,
                                users.id as userId,
                                posts.created_at as postCreated,
                                users.created_at as userCreated
                                FROM posts
                                INNER JOIN users
                                ON posts.user_id = users.id
                                ORDER BY posts.created_at DESC
                                ');

        //returns more then one row
        $results = Application::$app->db->resultSet();
        return $results;
    }

}