<?php


namespace app\core;


class Tweet //TODO why this dont work?
{
    public string $post_id;
    public string $user_name;
    public string $status;
    public string $body_err;

    public function create()
    {
        Application::$app->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');
        Application::$app->db->bind('user_id', $_SESSION['user_id']);
        Application::$app->db->bind(':title', $this->title);
        Application::$app->db->bind(':body', $this->body);


        if(Application::$app->db->execute()) {
            return true;
        } else {
            return false;
        }


    }

}