<?php
include "../common.php";

// for resend forgot password link
if (!empty($_POST["owner_type"])) {

	if (isset($_POST["admin_client_id"]) && $_POST["admin_client_id"]) {
		$id = $_POST["admin_client_id"];
	} else {
		$id = $_SESSION["s_client_id"];
	}
	$company_name = $_POST["company_name"];
	$company_registration_no = $_POST["company_registration_no"];
	$date_of_incorporation = $_POST["date_of_incorporation"];
	$country_of_incorporation = $_POST["country_of_incorporation"];
	$city_of_incorporation = $_POST["city_of_incorporation"];
	$company_address = $_POST["company_address"];
	$role_in_company = $_POST["role_in_company"];
	$business_activity = $_POST["business_activity"];
	$owner_type = $_POST["owner_type"];
	$individual_type = $_POST["individual_type"];
	if ($date_of_incorporation == "") {
		$date_of_incorporation = date("Y-m-d");
	}


	$update = "UPDATE `tbl_client_master` SET `company_name`='$company_name',
		                                  `company_registration_no`='$company_registration_no',
										  `date_of_incorporation`='$date_of_incorporation', 
										  `country_of_incorporation`='$country_of_incorporation',
										  `city_of_incorporation`='$city_of_incorporation',
										  `company_address`='$company_address',
										  `role_in_company`='$role_in_company',
										  `owner_type`='$owner_type',
										  `individual_type`='$individual_type',
										  `business_activity`='$business_activity' WHERE `client_id`= $id";

	$upd = db_query($update);
	if ($upd) {
		json_log_upd($id, 'client_master', 'update', 'client_id'); // update json log history
		get_member_details($id); // set update Session
		echo 1;
	}
}
