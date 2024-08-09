<?php
$data['PageName'] = 'Sign Up';
$data['PageFile'] = 'sign-up';
$data['noheader'] = 1;


if (isset($_REQUEST['btnSubmit'])) {

	$first_name = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_fname']);
	$last_name = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_lname']);
	$full_name = $first_name . " " . $last_name;
	$mobile = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_mobile']);
	$country = $_REQUEST['txt_country'];
	$email = $username = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_username']);
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$generate_pass = substr(str_shuffle($chars), 0, 8);
	$registration_source = $_REQUEST['txt_source'];
	if ($registration_source == "") {
		$registration_source = "web";
	}

	$password = hash_f($generate_pass);
	$adddate = date("Y-m-d H:i:s");
	$select_duplicate = db_rows("select * from tbl_client_master where username='$username'");
	$cnt = $db_counts;
	if ($cnt == 0) {
		//==========Working Area==================

		$adddate = date("Y-m-d H:i:s");

		$query = db_query("INSERT INTO `tbl_client_master` SET `username`='$username',
                                                       `password`='$password',
													   `first_name`='$first_name',
													   `last_name`='$last_name',
													   `full_name`='$full_name',
													   `country`='$country',
													   `registration_source`='$registration_source',
													   `banned`=0,
													   `email`='$email'", 0);


		$client_id = newid();

		if ($client_id == "") {
			$_SESSION['regmsg'] = "Duplicate";
			header("location:sign-up.php");
			exit;
		}

		json_log_upd($client_id, 'client_master', 'add', 'client_id'); // update json log history
		get_member_details($client_id);

		$_SESSION["s_client_id"] = $client_id;
		$_SESSION["s_login"] = date("Y-m-d H:i:s");
		$_SESSION["s_username"] = $username;
		$_SESSION["s_status"] = "New";
		//===========Add Login History===========
		$login_time = $_SESSION["s_login"];
		$login_ip = $_SERVER['REMOTE_ADDR'];
		$_SESSION['sesiduser'] = uniqid();
		$sesid = $_SESSION['sesiduser'];
		$query_for_login_history = "INSERT INTO `tbl_login_history` (client_id, login_time, login_ip, session_id,login_name) VALUES ($client_id,'$login_time','$login_ip','$sesid','$username')";
		$result_for_login_history = db_query($query_for_login_history);
		//=================For Email=====================================

		//  Mail Function  //

		$template = "SIGNUP-TO-MEMBER";
		$postvar['fullname'] = $full_name;
		$postvar['username'] = $username;
		$postvar['password'] = $generate_pass;
		$postvar['email'] = $email;
		//print_r($postvar);
		//echo "=======";exit;
		sent_template_mail($template, $postvar);

		$template_admin = "SIGNUP-TO-ADMIN";

		sent_template_mail($template_admin, $postvar, $for_admin = true);

		//  End Mail Function  //
		//==============================================================
		$_SESSION['regmsg'] = "Ok";
		if ($_SESSION["s_status"] == "New") {
			$ibanapi = get_select_list("tbl_iban_issuer", "`ID`", " AND IBAN_isdefault=1");
			$_SESSION['default_IBAN_issuer'] = $ibanapi[0]['ID'];
			header("location:account-summary.php");
			exit;
		} else {
			header("location:index.php");
			exit;
		}
		//========================================
	} else {

		$_SESSION['regmsg'] = "Duplicate";

		header("location:sign-up.php");
		exit;
	}
}







$country_list = get_select_list("tbl_country", "`id`,`country`,`Country_Code`,`ISO_2_DIGIT`", "");

include "header.php";
