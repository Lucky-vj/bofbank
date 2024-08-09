<?php

$data['PageName'] = 'Sign in';
$data['PageFile'] = 'sign-in';
$data['noheader'] = 1;

if (isset($_REQUEST['verify_otp'])) {

	if (isset($_REQUEST["txt_otp"]) && $_REQUEST["txt_otp"]) {

		$cnt = verify_opt($_SESSION['members']['client_id'], $_REQUEST["txt_otp"]);
		if ($cnt == 1) {

			// google auth code		
			if (($_SESSION['members']['client_id']) && (isset($_SESSION['members']['google_auth_access']) && $_SESSION['members']['google_auth_access'] == 1 || $_SESSION['members']['google_auth_access'] == 3) && ($_SESSION['members']['google_auth_code'])) {
				$_SESSION['google_auth'] = true;
				$url = $data['Host'] . '/device_confirmations' . $data['ex'];
				if ($json_action == true) {
					$pra['msg'] = "Successfully this process. Continue MFA for avail the service of Dashboard!";
					$pra['url'] = $url;
					json_print($pra);
					//store_login_session($_SESSION['members']);
					//header("location:index.php");
					exit;
				} else {
					header("Location: $url");
				}
			} else {
				store_login_session($_SESSION['members']);
				header("location:index.php");
				exit;
			}
		} else {
			$_SESSION['msg'] = "Wrong OTP. Please Try again";
			header("location:sign-in.php");
			exit;
		}
	}
}

if (isset($_REQUEST['btn_submit'])) {
	$username = $_REQUEST["txt_username"];
	$password = $_REQUEST["txt_password"];
	$login_auth = $_REQUEST["login_auth"];

	$password = hash_f($password);
	// if (isset($login_auth) && $login_auth == "federation") {
	// 	$query = "SELECT * FROM tbl_client_master WHERE username = '$username' AND (status='Active' or status='New') AND banned=0";
	// } else {
	// 	$query = "SELECT * FROM tbl_client_master WHERE username = '$username' AND password='$password' AND (status='Active' or status='New') AND banned=0";
	// }
	$query = "SELECT * FROM tbl_client_master WHERE username = '$username' AND password='$password' AND (status='Active' or status='New') AND banned=0";


	$result1 = db_rows($query);
	if ($db_counts > 0) {
		$row_account = $result1[0];
		$client_id = $row_account['client_id'];
		$status = $row_account['status'];
		$_SESSION['members'] = $row_account;
		/////otp Status///////////
		$otp_auth_access = $row_account['otp_auth_access'];
		if (isset($otp_auth_access) && $otp_auth_access == 1) {
			generate_otp($client_id, $_SESSION['members']['full_name'], $_SESSION['members']['email']);
			$_SESSION['otp-sent'] = 1;
			header("location:sign-in.php");
			exit;
		}


		///// 2FA Verified  ////////////////////
		$google_auth_access = $row_account['google_auth_access'];
		$google_auth_code = $row_account['google_auth_code'];
		$_SESSION['google_auth_code'] = $google_auth_code;
		// google auth code		
		if (($client_id) && (isset($google_auth_access) && $google_auth_access == 1 || $google_auth_access == 3) && ($google_auth_code)) {
			unset($_SESSION['attempts']);
			$_SESSION['google_auth'] = true;
			$url = $data['Host'] . '/device_confirmations' . $data['ex'];
			if ($json_action == true) {
				$pra['msg'] = "Successfully this process. Continue MFA for avail the service of Dashboard!";
				$pra['url'] = $url;
				json_print($pra);
			} else {
				header("Location: $url");
			}
			exit;
		}
		///// End2FA Verified  ////////////////////

		// For Member detail on session
		store_login_session($_SESSION['members']);

		header("location:index.php");
		exit;
	} else {
		$query = "SELECT status  FROM tbl_client_master WHERE username = '$username' AND  password='$password' AND banned=0";
		$result = db_rows($query, 0);
		if ($db_counts > 0) {
			$_SESSION['msg'] = "Your Account is " . $result[0]['status'] . ". Please contact our support team";
		} else {
			$_SESSION['msg'] = "Wrong username or password";
		}
		header("location:sign-in.php");
		exit;
	}
}

if (isset($_REQUEST['Act']) and ($_REQUEST['Act'] == 'Out')) {

	unset($_SESSION["s_client_id"]);
	unset($_SESSION["s_login"]);
	unset($_SESSION["s_username"]);
	unset($_SESSION["s_first_name"]);
	unset($_SESSION["s_last_name"]);
	unset($_SESSION["s_assign_account"]);
	unset($_SESSION["s_assign_currency"]);
	unset($_SESSION["s_login_ip"]);
	unset($_SESSION['host_companyname']);
	unset($_SESSION['otp']);
	unset($_SESSION["s_status"]);
	unset($_SESSION['regmsg']);
	unset($_SESSION['host_companyname']);
	$sesid = $_SESSION['sesiduser'];
	$logout_time = date("Y-m-d H:i:s");
	db_query("UPDATE tbl_login_history SET logout_time = '$logout_time' WHERE session_id ='$sesid'");
	unset($_SESSION['sesiduser']);
	unset($_SESSION);
	$_SESSION['sesiduser'] = "";
	session_destroy();
	session_start();
	$_SESSION['msg'] = "Sign Out Successfully";
	header('location:sign-in.php');
	exit;
}

include "header.php";
