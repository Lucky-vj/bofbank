<?php
// Facebook API configuration
$fcd=get_select_list("tbl_social_media_account_details","`FB_APP_ID`,`FB_APP_SECRET`,`FB_REDIRECT_URL`,`FB_BASE_URL`","");
$fcd=$fcd[0];

$FB_APP_ID=$fcd['FB_APP_ID'];
$FB_APP_SECRET=$fcd['FB_APP_SECRET'];
$FB_REDIRECT_URL=$fcd['FB_REDIRECT_URL'];
$FB_BASE_URL=$fcd['FB_BASE_URL'];
$_SESSION['FB_BASE_URL']=$FB_BASE_URL;
//Initialized localhost as false

$base_url = $FB_BASE_URL;
$redirectURL = $FB_REDIRECT_URL;

$base_urls = htmlspecialchars($base_url);
$redirectURLs =  htmlspecialchars($redirectURL);
define('FB_APP_ID', $FB_APP_ID);
define('FB_APP_SECRET', $FB_APP_SECRET);
define('FB_REDIRECT_URL', $redirectURLs);
define('base_url', $base_urls);

// Start session
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once "assets/facebook-sdk/autoload.php";

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Call Facebook API
$fb = new Facebook(array(
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v3.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>