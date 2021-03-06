<?php


namespace app\models;


use app\core\Application;

class Comment extends Model
{
    public string $post_id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $body;
    public string $first_name_err;
    public string $last_name_err;
    public string $email_err;
    public string $body_err;

    public function create()
    {
        Application::$app->db->query('INSERT INTO comments (post_id, first_name, last_name, email, body ) VALUES (:post_id, :first_name, :last_name, :email, :body)');
        Application::$app->db->bind('post_id', $this->post_id);
        Application::$app->db->bind(':first_name', $this->first_name);
        Application::$app->db->bind(':last_name', $this->last_name);
        Application::$app->db->bind(':email', $this->email);
        Application::$app->db->bind(':body', $this->body);


        if(Application::$app->db->execute()) {
            return true;
        } else {
            return false;
        }


    }

    public function getCommentsPost($postId)
    {

        Application::$app->db->query('SELECT * FROM comments WHERE post_id = :post_id');
        Application::$app->db->bind(':post_id', $postId);
        return Application::$app->db->resultSet();

    }

    public function validateComment()
    {
        // Validate First Name
        if(!isset($this->first_name) || trim($this->first_name) === '') {
            $this->first_name_err = 'First Name can\'t be empty';
        }
        // Validate Last Name
        if(!isset($this->last_name) || trim($this->last_name) === '') {
            $this->last_name_err = 'Last Name can\'t be empty.';
        }

        // Validate Email
        if(!isset($this->email) || trim($this->email) === '') {
            $this->email_err = 'Email can\'t be empty.';
        }

        // Validate Message
        if(!isset($this->body) || trim($this->body) === '') {
            $this->body_err = 'Message can\'t be empty.';
        }

        // Make sure there are no errors
        if(empty($this->first_name_err) && empty($this->last_name_err) && empty($this->email_err) && empty($this->body_err)) {
            return true;
        } else {
            return false;
        }
    }

    public function getComments() {
        Application::$app->db->query('SELECT comments.last_name, comments.body, comments.created_at, posts.title,
                                        comments.id as commentId,
                                        posts.id as postId,
                                        comments.created_at as commentCreated,
                                        posts.created_at as postCreated
                                        FROM comments
                                        INNER JOIN posts
                                ON posts.id = comments.post_id
                                        ORDER BY comments.created_at DESC');
        //returns more then one row
        return Application::$app->db->resultSet();
    }

    public function delete($id)
    {
        Application::$app->db->query('DELETE FROM comments WHERE id = :id');
        Application::$app->db->bind(':id', $id);

        if(Application::$app->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

}