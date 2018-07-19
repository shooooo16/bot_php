<?php 

require_once(__DIR__.'/config.php');

//package
// -Composer(パッケージ管理ツール)

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(
	CONSUMER_KEY, 
	CONSUMER_SECRET, 
	ACCESS_TOKEN, 
	ACCESS_TOKEN_SECRET);
	
//$content = $connection->get("account/verify_credentials");
//$content = $connection->get("statuses/home_timeline", ['count'=> 3]);
//var_dump($content);

$res = $connection->post("statuses/update", [
	'status' => ('現在時刻は、'.date('H時i分s秒').'になります。')
]);

if ($connection->getLastHttpCode() == 200) {
    // Tweet posted succesfully
    echo 'Success!!'.PHP_EOL;
} else {
    // Handle error case
    echo 'miss...'.$res->errors[0]->message .PHP_EOL;
}
