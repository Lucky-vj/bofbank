<?php
include "../common.php";

// for resend forgot password link
if (!empty($_POST["account_holder_name"])) {

	$id = $_SESSION["s_client_id"];
	$account_holder_name = $_POST["account_holder_name"];
	$ibancurrency = $_POST["ibancurrency"];



	$insert = "INSERT INTO `tbl_iban_requested_by_client` SET `client_id`='$id',
		                                  `account_holder_name`='$account_holder_name',
										  `ibancurrency`='$ibancurrency'";

	$ins = db_query($insert);
	if ($ins) {
		$template = "IBAN-REQUEST";
		$postvar['fullname'] = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];
		//$postvar['email']=$_SESSION['members']['email'];
		$postvar['email'] = $_SESSION['host_email']; // Admin Email
		$postvar['msgdetails'] = "Sent IBAN Request for currency " . $ibancurrency . " with Account holder name " . $account_holder_name;
		sent_template_mail($template, $postvar, $for_admin = true);
		echo 1;
	}
}
