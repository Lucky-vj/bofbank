<?php
include "common.php";
$data['PageName']='Device';
$data['PageFile']='devices';
$data['noheader']=1;





function redirect_post($url, array $data)
{
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script type="text/javascript">
            function closethisasap() {
                document.forms["redirectpost"].submit();
            }
        </script>
    </head>
    <body onLoad="closethisasap();">
    <form name="redirectpost" method="post" action="<?php echo $url; ?>">
        <?php
        if ( !is_null($data) ) {
            foreach ($data as $k => $v) {
                echo '<input type="hidden" name="' . $k . '" value="' . $v . '"> ';
            }
        }
        ?>
    </form>
    </body>
    </html>
    <?php
    exit;
}

$url=$data['Host'];
$_SESSION['googleCode_err']=NULL;
if($_POST['code'])
{ 
	$code=$_POST['code'];
	$secret=$_SESSION['members']['google_auth_code'];
	require_once $data['Path'].'/googleLib/GoogleAuthenticator.php';
	$ga = new GoogleAuthenticator();
	$checkResult = $ga->verifyCode($secret, $code, 8);    // 2 = 2*30sec clock tolerance
	
		if ($checkResult) {
			$_SESSION['login']=true;
			$_SESSION['merchant']=true;
			unset ($_SESSION['showcode']);
			store_login_session($_SESSION['members']);
			$url=$url.'/index'.$data['ex'];
			header("Location:$url");exit;
			
			
		}else {
			$_SESSION['googleCode_err']="Wrong Code. Try again.";
			echo $url=$url.'/device_confirmations'.$data['ex'];
			header("Location:$url");exit;
			
		}

}
else {
	$_SESSION['googleCode_err']="Code was not entered";
	$url=$url.'/device_confirmations.do';
	header("Location: $url");
	exit;
}


include "header.php"; 

?>



