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
	
$media = $connection->upload("media/upload", [
  'media' => __DIR__ . '/modric.jpg'
]);

$res = $connection->post("statuses/update", [
  'status' => 'モドリッチかっこいいよね、ラキティッチも！！',
  'media_ids' => $media->media_id
]);

$media = $connection->upload("media/upload", [
  'media' => __DIR__ . '/modric&rakitic.jpg'
]);

$res = $connection->post("statuses/update", [
  'media_ids' => $media->media_id
]);

if ($connection->getLastHttpCode() == 200) {
    // Tweet posted succesfully
    echo 'Success!!'.PHP_EOL;
} else {
    // Handle error case
    echo 'miss...'.$res->errors[0]->message .PHP_EOL;
}
