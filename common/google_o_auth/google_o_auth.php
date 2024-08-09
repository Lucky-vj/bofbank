<?php
$lcd=get_select_list("tbl_social_media_account_details","`google_ClientId`,`google_ClientSecret`,`google_RedirectUrl`","");
$lcd=$lcd[0];

$google_ClientId=$lcd['google_ClientId'];
$google_ClientSecret=$lcd['google_ClientSecret'];
$google_RedirectUrl=$lcd['google_RedirectUrl'];

require_once 'google-Oauth-api/vendor/autoload.php'; // Adjust the path accordingly
$client = new Google_Client();
$client->setClientId($google_ClientId);
$client->setClientSecret($google_ClientSecret);

$client->setRedirectUri($google_RedirectUrl);

$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);
    $_SESSION['access_token'] = $token;
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $google_data['first_name'] = $google_account_info->given_name;
    $google_data['last_name'] = $google_account_info->family_name;
    $google_data['full_name'] = $google_account_info->name;
    $google_data['email'] = $google_account_info->email;
    $google_data['gender'] = $google_account_info->gender;
	$google_data['reg_source'] = "google";
    unset($_SESSION['user_data']);
    $_SESSION['user_data'] = $google_data;
    header("location:federation_login.php");exit;
    } else {
    $auth_url = $client->createAuthUrl();
	
	$googleOutput = '<a class="btn btn-outline-danger w-100" href="'.$auth_url.'">
                <i class="'.$data['fwicon']['google'].'" fa-fw"></i>
                <span style="margin:5px">
                 Google
                </span>
                </a>';
    
}
