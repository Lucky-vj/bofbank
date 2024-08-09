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
				$lduserData['reg_source'] = "linkedin";
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
    $linkdOutput = '<a class="btn btn-outline-primary ld-btn w-100" href="'.$auth_url.'">
                <i class="'.$data['fwicon']['linkedin'].'" fa-fw"></i>
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