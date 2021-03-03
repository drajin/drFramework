<?php


namespace app\models;


use app\core\Application;

class Comment extends Model
{
    public $comments;

    public function getComments($post_id)
    {

        Application::$app->db->query('SELECT * FROM comments WHERE post_id = :post_id');
        Application::$app->db->bind(':post_id', $post_id);
        $this->comments = Application::$app->db->resultSet();
        return $this->comments;

    }

    public function CommentsNum()
    {
        return array_count_values($this->comments);
    }



}