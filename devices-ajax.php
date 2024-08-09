<?php

include "common.php";

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

			echo 1;

			exit;

			

		}else {

			echo "Wrong Code. Try again.";

			exit;

		}



}

else {

	echo "Enter 6 Digit Verification Code";

}









?>







