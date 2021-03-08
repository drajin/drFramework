<?php


namespace app\controllers;
use app\api\TwitterAPIExchange;
use app\core\Application;
use app\core\Request;
use app\models\Tweet; // ??
use app\models\Tweeter;
use app\models\Post;
use app\models\Comment;
use app\models\User;


require(__DIR__ . '/../config/config_api.php');


class TwitterController extends Controller
{
    private array $settings = array(
    'oauth_access_token' => TWITTWER_ACCESS_TOKEN,
    'oauth_access_token_secret' => TWITTWER_ACCESS_TOKEN_SECRET,
    'consumer_key' => TWITTWER_CONSUMER_KEY,
    'consumer_secret' => TWITTWER_CONSUMER_SECRET
    );

    public Tweeter $tweetModel;
    public Post $postModel;
    public Comment $commentModel;
    public User $userModel;

    public function __construct()
    {
        $this->postModel = new Post();
        $this->commentModel = new Comment();
        $this->userModel = new User();
    }

    public function tweet_sbm(Request $request)
    {


        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        } else {
            Application::$app->response->redirect('not_found');
            Application::$app->response->setStatusCode(404);
        }

        $this->tweetModel = new Tweeter();
        $this->tweetModel->post_id = $id;

        if ($request->isPost()) {

            $this->tweetModel->loadData($request->getBody());
            $this->tweetModel->validateTweet();

            if ($this->tweetModel->validateTweet() === true) {
                $this->tweetModel->create();

                $url = 'https://api.twitter.com/1.1/statuses/update.json';
                $requestMethod = 'POST';
//            $apiData = array(
//                'status' => 'This tweet is coming form an script written using Twitter API! #PHP #TwitterAPI'
//            );
                $apiData = array(
                    'status' => $this->tweetModel->status
                );

                $twitter = new TwitterAPIExchange($this->settings);
                $twitter->buildOauth( $url, $requestMethod);
                $twitter->setPostfields($apiData);
                $response = $twitter->performRequest( true, array( CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYHOST => 0));
                Application::$app->session->setFlashMsg('success','Tweet tweeted!');
                Application::$app->response->redirect('show');
                exit();

            } else {
                $post = $this->postModel->find_by_id('posts', $this->tweetModel->post_id);
                $user = $this->userModel->find_by_id('users', $post->user_id);

                $params = [
                    'post' => $post,
                    'user' => $user,
                    'comments' => $this->commentModel->getCommentsPost($this->tweetModel->post_id),
                    'tweet' => $this->tweetModel
                ];
                return $this->render('blog/show', $params);
            }
            exit;


        }
    }

}