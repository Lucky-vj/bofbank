<?php

$data['PageName'] = 'Add Member';
$data['PageFile'] = 'add-member';
is_admin_session();

if (isset($_POST['btn_admin']) && $_POST['btn_admin']) {

	$first_name = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_fname']);
	$last_name = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_lname']);
	$full_name = $first_name . " " . $last_name;
	$username = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_username']);
	$email = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_username']);
	$country = mysqli_real_escape_string($data['cid'], $_REQUEST['txt_country']);
	$adddate = date("Y-m-d H:i:s");

	$select_duplicate = db_rows("SELECT * FROM `tbl_client_master` WHERE `username`='$username'");
	$cnt = $db_counts;
	if ($cnt == 0) {
		//==========Working Area==================
		$query = db_query("INSERT INTO `tbl_client_master` SET `username`='$username',
                                                       `password`='$password',
													   `first_name`='$first_name',
													   `last_name`='$last_name',
													   `full_name`='$full_name',
													   `country`='$country',
													   `registration_source`='Admin',
													   `banned`=0,
													   `email`='$email'", 0);
		$client_id = newid();

		//===========Add Login History===========
		$encryptionvalue = encryption_value($client_id);
		$encryptionusername = encryption_value(urlencode($email));

		$generate_link = "<a href='" . $data['Host'] . "/reset-password" . $data['ex'] . "?verify=" . $encryptionvalue . "&utype=" . $encryptionusername . "&vqt=1' title='Generate password'>Click on Generate password link to create your password</a>";

		//===================================================================

		/*//////Mail Start/////// 
$template="RESTORE-PASSWORD";
$postvar['fullname']=$full_name;
$postvar['username']=$username;
$postvar['password']=$generate_link;
$postvar['email']=$email;
sent_template_mail($template,$postvar);*/
		//////Mail End///////
		//=================For Email=====================================

		//  Mail Function  //

		$template = "SIGNUP-TO-MEMBER";
		$postvar['fullname'] = $full_name;
		$postvar['username'] = $username;
		$postvar['password'] = $generate_link;
		$postvar['email'] = $email;


		sent_template_mail($template, $postvar);

		$template_admin = "SIGNUP-TO-ADMIN";

		sent_template_mail($template_admin, $postvar, $for_admin = true);

		//  End Mail Function  //



		//==============================================================

		$_SESSION['msg'] = "Username : " . $username . " Created Successfully , Details sent on registered Email ID";
		header("location:approve?client_id=$client_id&vd=1");
		exit;

		//========================================

	} else {

		$_SESSION['msg'] = "Username Already Exist.";
		header("location:add-member.php");
		exit;
	}
}


$country_list = get_select_list("tbl_country", "`id`,`country`,`Country_Code`,`ISO_2_DIGIT`", "");


include "header.php";
