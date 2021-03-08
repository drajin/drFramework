<?php


namespace app\models;


use app\core\Application;

class Tweeter extends Model
{
    public string $post_id;
    public string $user_name;
    public string $status;
    public string $status_err;

    public function create()
    {
        Application::$app->db->query('INSERT INTO comments (post_id, first_name, last_name, email, body ) VALUES (:post_id, :first_name, :last_name, :email, :body)');
        Application::$app->db->bind('post_id', $this->post_id);
        Application::$app->db->bind(':first_name', 'Tweeter');
        Application::$app->db->bind(':last_name', 'User');
        Application::$app->db->bind(':email', 'ask@tweeter.com');
        Application::$app->db->bind(':body', $this->status);


        if(Application::$app->db->execute()) {
            return true;
        } else {
            return false;
        }


    }

    public function validateTweet()
    {
        // Validate Message
        if(!isset($this->status) || trim($this->status) === '') {
            $this->status_err = 'Tweet can\'t be empty.';
        }
        // Make sure there are no errors
        if(empty($this->status_err)) {
            return true;
        } else {
            return false;
        }

    }
}