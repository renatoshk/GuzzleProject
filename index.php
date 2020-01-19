<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "vendor/autoload.php";
$login = new App\Login;
$response = $login->auth('a1', '1');
if ($response['action'] == 'success') {
	$result = $login->getApiData();
	$name = $result['body'][0]['username'];
	$id = $result['body'][0]['user_id'];
	echo "<h1>Hello $name</h1>";
	echo "<p>Your ID is: <b>$id</b></p>";
}else{
	echo $response['message'];
}