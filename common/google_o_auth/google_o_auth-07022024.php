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
    unset($_SESSION['user_data']);
    $_SESSION['user_data'] = $google_data;
    header("location:federation_login.php");exit;
    } else {
    $auth_url = $client->createAuthUrl();
    $googleOutput = "<a href='".$auth_url."' class='btn btn-outline-danger'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                fill='currentColor' class='bi bi-google' viewBox='0 0 16 16'>
                <path d='M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z' />
            </svg>
             <span style='margin:5px'>
              Google
             </span>
          </a>";
}
