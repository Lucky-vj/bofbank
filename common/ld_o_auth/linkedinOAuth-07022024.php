<?php
$lcd=get_select_list("tbl_social_media_account_details","`linkedin_ClientId`,`linkedin_ClientSecret`,`linkedin_RedirectUrl`","");
$lcd=$lcd[0];

$linkedin_ClientId=$lcd['linkedin_ClientId'];
$linkedin_ClientSecret=$lcd['linkedin_ClientSecret'];
$linkedin_RedirectUrl=$lcd['linkedin_RedirectUrl'];

// LinkedIn App credentials
$client_id = $linkedin_ClientId;
$client_secret = $linkedin_ClientSecret;
$redirect_uri = $linkedin_RedirectUrl;
$state = 'foobar';  // You can use this to protect against CSRF attacks
$scope= 'openid profile email'; // LinkedIn API Permissions

// Step 1: User clicked on the "Login with LinkedIn" link
if (isset($_GET['code'])) {
    // Step 2: LinkedIn redirects back to your site with the authorization code
    // Step 3: Exchange authorization code for access token
    $code = $_GET['code'];
    $token_url = 'https://www.linkedin.com/oauth/v2/accessToken';
    $token_params = [
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirect_uri,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
    ];

    $token_response = http_post($token_url, $token_params);
    $token_data = json_decode($token_response, true);
    // Check if access token is obtained successfully
    if (isset($token_data['access_token'])) {
        $access_token = $token_data['access_token'];
        // Step 4: Use access token to fetch user information
        $profile_url = 'https://api.linkedin.com/v2/userinfo';
        $profile_headers = [
            'Authorization: Bearer '.$access_token,
            'Connection: Keep-Alive',
        ];
        $profile_response = http_get($profile_url, $profile_headers);
        $profile_data = json_decode($profile_response, true);
        if (array_key_exists("status",$profile_data)){
        }else{
            if(array_key_exists("email",$profile_data) && !empty($profile_data['email'])){
                $lduserData['first_name'] = $profile_data['given_name'];
                $lduserData['last_name'] = $profile_data['family_name'];
                $lduserData['full_name'] = $profile_data['name'];
                $lduserData['email'] = $profile_data['email'];
                $lduserData['username'] = $profile_data['email'];
                unset($_SESSION['user_data']);
                $_SESSION['user_data'] = $lduserData;
                header("location:federation_login.php");
                exit;
            }else{
                $_SESSION['msg']="Your Social media account doesn't have Email-Id";
                header("location:sign-in.php");
            }
        }
    } else {
        $_SESSION['msg']="Error obtaining access token! Please Try Again.";
                header("location:sign-in.php");
    }
} else {
    // Step 0: User clicks the "Login with LinkedIn" link
    $auth_url = 'https://www.linkedin.com/oauth/v2/authorization?';
    $auth_url .= 'response_type=code';
    $auth_url .= '&client_id=' . $client_id;
    $auth_url .= '&redirect_uri=' . urlencode($redirect_uri);
    $auth_url .= '&state=' . $state;
    $auth_url .= '&scope=' . urlencode($scope);
    $linkdOutput = '<a class="btn btn-outline-primary ld-btn" href="'.$auth_url.'">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                   <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                 </svg>
                <span style="margin:5px">
                 Linkedin
                </span>
                </a>';
}

// Helper function for making HTTP POST requests
function http_post($url, $params) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// Helper function for making HTTP GET requests
function http_get($url, $headers) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
?>