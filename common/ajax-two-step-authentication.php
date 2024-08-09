<?php

include('../common.php');

$username=$_SESSION["s_username"];



//echo $_REQUEST["vid"];

//echo $_REQUEST["google_auth_access"];

//$_REQUEST["vid"]=1;

//$_REQUEST["google_auth_access"]=1;

//exit;





if(!empty($_REQUEST["vid"])) {

     $id=$_REQUEST["vid"];

     $code=$_REQUEST["google_auth_access"];

     $tbl='tbl_client_master';

     $sitename=$_SESSION['host_name'];

	 $secret="";

//echo $data['Path'].'/googleLib/GoogleAuthenticator'.$data['iex'];



            if($code==1||$code==3){

			include($data['Path'].'/googleLib/GoogleAuthenticator'.$data['iex']);

			$ga = new GoogleAuthenticator();

			$secret = $ga->createSecret();

			$_SESSION['secret']=$secret;

			$result['secret']=$secret;

			

			$qrCodeUrl = $ga->getQRCodeGoogleUrl($username,$secret,$sitename);

			$_SESSION['qrCodeUrl']=$qrCodeUrl;

			$result['qrCodeUrl']=$qrCodeUrl;

			}





            $query="UPDATE `{$tbl}` SET `google_auth_code`='{$secret}', `google_auth_access`='2' WHERE `client_id`='{$id}' ";

	        db_query($query);

	        //json_log_upd($id,$tbl,'2FA Activate'); // for json log history

	        $_SESSION['qrCodeMessage']=$code;

			echo 1;exit;

	

}





$_SESSION['googleCode_err']=NULL;

if(isset($_POST['code'])&&$_POST['code'])

{

   

	$code=$_POST['code'];

	$secret=isset($_POST['secret'])&&$_POST['secret']?$_POST['secret']:'';

	include($data['Path'].'/googleLib/GoogleAuthenticator'.$data['iex']);

	$ga = new GoogleAuthenticator();

	$checkResult = $ga->verifyCode($secret, $code, 8);    // 2 = 2*30sec clock tolerance

	

		if ($checkResult) {

			$_SESSION['login']=true;

			$_SESSION['merchant']=true;

			$username=$_SESSION["s_username"];

			$id=$_SESSION["s_client_id"];

			//set_last_access($username);

			//save_remote_ip((int)$_SESSION["s_client_id"], $_SERVER["REMOTE_ADDR"]);

			//user_un_block_time($_SESSION["s_client_id"]);

			unset ($_SESSION['showcode']);

			//if($data['UseTuringNumber'])unset($_SESSION['turing']);			

			//if(isset($_SESSION['redirect_url'])&&isset($_SERVER['HTTP_REFERER'])){

			 //redirect_post($_SESSION['redirect_url'], $_SESSION['send_data']);

			//}else{

			 $tbl='tbl_client_master';

			 $query="UPDATE `{$tbl}` SET  `google_auth_access`='1' WHERE `client_id`='{$id}' ";

	         db_query($query);

			// json_log_upd($id,$tbl,'2FA Activate'); // for json log history

			$_SESSION['members']['google_auth_code']=$_SESSION['secret'];

            $_SESSION['members']['google_auth_access']=1;

			 $_SESSION['qrCodeActiveMessage']="Activated";

			 unset($_SESSION['qrCodeMessage']);

			 unset($_SESSION['secret']);

			 unset($_SESSION['qrCodeUrl']);

			 echo  1;exit;

			

			

		}else {

		

			echo  "Wrong Code. Try again.";

		}



}





?>