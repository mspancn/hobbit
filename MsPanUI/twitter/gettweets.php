<?php

$config = array();
$config['social']['twitter'] = '';
$config['social']['tweets_num'] ='1';
$config['social']['consumerkey'] = '';
$config['social']['consumersecret'] = '';
$config['social']['accesstoken'] = '';
$config['social']['accesstokensecret'] = '';

require_once("twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = $config['social']['twitter'];
$notweets = $config['social']['tweets_num'];
$consumerkey = $config['social']['consumerkey'];
$consumersecret = $config['social']['consumersecret'];
$accesstoken = $config['social']['accesstoken'];
$accesstokensecret = $config['social']['accesstokensecret'];
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

header('Content-Type: application/json');
echo json_encode($tweets);