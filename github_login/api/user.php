<?php

function error($msg){
    $response=[];
    $response['success']=false;
    $response['message']=$msg;
    return json_encode($response);
}

session_start();
$accessToken=$_SESSION['my_access_token_accessToken'];

if($accessToken == ""){
    die(error('Error: Invalid access token'));
}

$url='https://api.github.com/user';
// ?access_token=.$accessToken
$authHeader="Authorization: token ".$accessToken;
$userAgentHeader="User-Agent: harshita26";

echo $authHeader."<br />";


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);


// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json',$userAgentHeader));

$response = curl_exec($ch);

curl_close ($ch);


echo $response;

?>