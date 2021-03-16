<?php
// Start session
if(!session_id()){
    session_start();
}

// Include Github client library 
require_once 'Github_OAuth_Client.php';


/*
 * Configuration and setup GitHub API
 */
$clientID         = 'e5b84c2d18f0f299c87a';
$clientSecret     = '2658911e17ca12edfe4c2e63618c3f409f700cc4';
$redirectURL     = 'http://localhost/github_login/';

$gitClient = new Github_OAuth_Client(array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirectURL,
));


// Try to get the access token
if(isset($_SESSION['access_token'])){
    $accessToken = $_SESSION['access_token'];
    echo "hi";
}
?>