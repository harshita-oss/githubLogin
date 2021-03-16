<?php
echo "hi";
$code=$_GET['code'];
echo ' code: '.$code;
if($code == ""){
    header('Location:http://localhost/github_login/');
    exit;
}
$clientID         = 'e5b84c2d18f0f299c87a';
$clientSecret     = '2658911e17ca12edfe4c2e63618c3f409f700cc4';
$url='https://github.com/login/oauth/access_token';

$postParams=[
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'code' => $code
];



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$postParams);

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

$response = curl_exec($ch);

curl_close ($ch);
$data=json_decode($response);

if ($data->access_token != ""){
    session_start();
    $_SESSION['my_access_token_accessToken']=$data->access_token;
    header('Location:http://localhost/github_login/');
    exit;
}
echo $data->error_description;

?>