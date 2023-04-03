<?php
session_start();
//Login in to reddit and goto https://www.reddit.com/prefs/apps
//See READ.me for more info on local deployment.
$clientId = "client_app_id"; 
$clientSecret = "client_secret";	
$username = "reddit_username";
$password = "reddit_password";

$params = array(
  'grant_type' => 'password',
  'username' => $username,
  'password' => $password
);

$ch = curl_init('https://www.reddit.com/api/v1/access_token');
curl_setopt($ch, CURLOPT_USERPWD, $clientId . ':' . $clientSecret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response_raw = curl_exec( $ch );
$response = json_decode( $response_raw );
//var_dump($response);
$_SESSION['access_token'] = $response->access_token;
curl_close($ch);
?>