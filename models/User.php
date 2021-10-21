<?php


namespace framework\models;
use framework\core\Database;
use framework\core\Application;
use \Google_Client;
use \Google_Service_Oauth2;


class User extends Model
{


    public string $id;
    public string $name;
    public string $email;
    public string $password;
    public string $password_confirm;
    public string $created_at;
    public string $name_err;
    public string $email_err;
    public string $pass_err;
    public string $pass_confirm_err;
    public Google_Client $client;

    public function __construct()
    {

    }


    public function validation_register()
    {
        // Validate Name
        if(empty($this->name)) {
            $this->name_err = 'Please enter your name';
        }
        // Validate Email
        if(empty($this->email)) {
            $this->email_err = 'Please enter your email';
        }
        // Check for existing email
         else {
             if($this->findUserByEmail($this->email)){
                 $this->email_err = 'Email is already in use';
            }
         }

        // Validate Password
        if(empty($this->password)) {
            $this->pass_err = 'Please enter the password';
        } elseif(strlen($this->password) < 6){
                    $this->pass_err = 'Password must be at least 6 characters';
                  }
        // Validate Confirm Password
        if(empty($this->password_confirm)) {
            $this->pass_confirm_err = 'Please confirm the password';
        } else {
                if($this->password != $this->password_confirm){
                      $this->pass_confirm_err = 'Passwords do not match';
                    }
                  }
        // Make sure there are no errors
        if(empty($this->name_err) && empty($this->email_err) && empty($this->pass_err) && empty($this->pass_confirm_err)) {
            return true;
            //$this->password = password_hash($this->password, PASSWORD_DEFAULT);

        } else {
            return false;
        }

    }

    public function validation_login()
    {
        if(empty($this->email)) {
            $this->email_err = 'Please enter your Email';
                }

        if(empty($this->password)) {
                $this->pass_err = 'Please enter your password';
                }

        if(empty(!$this->email) && $this->findUserByEmail($this->email) === false) {
            $this->email_err = 'User not found';
        }

        if(empty($this->email_err) && empty($this->pass_err)) {

            $loggedInUser = ($this->login($this->email, $this->password));
            if($loggedInUser) {
            // create session
            $this->createUserSession($loggedInUser);
                } else {
               $this->pass_err = 'User/Pass combination is wrong';
                }
        }
    }


        public function login($email, $password)
        {
            Application::$app->db->query('SELECT * FROM users WHERE email = :email');
            Application::$app->db->bind(':email', $email);
            $singleUser = Application::$app->db->single();

            $hashedPassword = $singleUser->password;
            if(password_verify($password, $hashedPassword)) {
                return $singleUser;
            } else {
                return false;
            }


        }


    public function findUserByEmail($email)
    {
        Application::$app->db->query('SELECT * FROM users WHERE email = :email');
        Application::$app->db->bind(':email', $email);

        $row = Application::$app->db->single();
        //Check row for the email
            if(Application::$app->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function register()
    {
        Application::$app->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        Application::$app->db->bind(':name', $this->name);
        Application::$app->db->bind(':email', $this->email);
        Application::$app->db->bind(':password', $this->password);

        if(Application::$app->db->execute()) {
            return true;
        } else {
            return false;
        }



    }

    public function createUserSession($user)
    {
              $_SESSION['user_id'] = $user->id;
              $_SESSION['user_email'] = $user->email;
              $_SESSION['user_name'] = $user->name;
              Application::$app->response->redirect('/');
    }

    public function generatePassword($length){
    		$chars = "vwxyzABCD02789";
    		$code = "";
    		$clen = strlen($chars) - 1;
    		while (strlen($code) < $length){
    			$code .= $chars[mt_rand(0,$clen)];
    		}
    		return $code;
        }










// ZURA 3
//
//    public function register()
//{
//    echo "Creating new user";
//}
//
//    public function rules(): array
//{
//    return [
//        'name' => [self::RULE_REQUIRED],
//        'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
//        'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
//        'password_confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match'=> 'password']],
//    ];
//}




} // class end