<?php
// Include configuration file
require_once 'fb_api_config.php';

if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
	    $urls=$_SESSION['FB_BASE_URL'];
        header("Location:$urls");
    }
    
    // Getting user's profile info from Facebook
    try {
        $graphResponse = $fb->get('/me?fields=name,first_name,last_name,email,link,picture,birthday,gender');
        $fbUser = $graphResponse->getGraphUser();
        $logoutURL = $helper->getLogoutUrl($accessToken,FB_REDIRECT_URL.'fb_logout.php');
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    // Getting user's profile data
    $fbUserData = array();
    if(!empty($fbUser['email']))
    { 
        if(!empty($fbUser['name'])){
            $fbUserData['full_name'] =$fbUser['name'];
        }
        if(!empty($fbUser['first_name'])){
            $fbUserData['first_name'] = $fbUser['first_name'];
        }
        if(!empty($fbUser['last_name'])){
            $fbUserData['last_name'] = $fbUser['last_name'];
        }
        if(!empty($fbUser['email'])){
            $fbUserData['email'] = $fbUser['email'];
        }
        if(!empty($fbUser['gender'])){
            $fbUserData['gender'] = $fbUser['gender'];
        }
        if(!empty($fbUser['birthday'])){
            $fbUserData['birth_date'] = $fbUser['birthday'];
        }
        unset($_SESSION['user_data']);
        $_SESSION['user_data'] = $fbUserData;
        header("location:federation_login.php");exit;

    }else{
        $_SESSION['msg']="Your Social media account doesn't have Email-Id";
        unset($_SESSION['facebook_access_token']);
	    header("location:sign-up.php");
    }
}else{
    // Get login url
    $permissions = ['email']; // Optional permissions
    $loginURL = $helper->getLoginUrl(FB_REDIRECT_URL,$permissions);
    // Render Facebook login button
    $output = '<a class="btn btn-outline-primary fb-btn" href="'.htmlspecialchars($loginURL).'">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                       <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                     </svg>
                     <span style="margin:5px">
                       Facebook
                     </span>
                </a>';
}
?>