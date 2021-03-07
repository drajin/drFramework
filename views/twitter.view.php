<?php

    include_once '../api/TwitterAPIExchange.php';

$settings = array(
    'oauth_access_token' => TWITTWER_ACCESS_TOKEN,
    'oauth_access_token_secret' => TWITTWER_ACCESS_TOKEN_SECRET,
    'consumer_key' => TWITTWER_CONSUMER_KEY,
    'consumer_secret' => TWITTWER_CONSUMER_SECRET
);


    $url = 'https://api.twitter.com/1.1/statuses/update.json';
    $requestMethod = 'POST';
    $apiData = array(
        'status' => 'This tweet is coming form an script written using Twitter API! #PHP #TwitterAPI'
    );

    $twitter = new TwitterAPIExchange($settings);
    $twitter->buildOauth( $url, $requestMethod);
    $twitter->setPostfields($apiData);
    $response = $twitter->performRequest( true, array( CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYHOST => 0));

    echo '<pre>';
    print_r(json_decode($response, true));