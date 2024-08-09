<?php
include "common.php";
session_start();
if ($_POST['company_name']) {
	$company_name = $_POST['company_name'];
	$company_registration_no = $_POST['company_registration_no'];
	$date_of_incorporation = $_POST['date_of_incorporation'];
	$country_of_incorporation = $_POST['country_of_incorporation'];
	$city_of_incorporation = $_POST['city_of_incorporation'];
	$company_address = $_POST['company_address'];

	$update = "UPDATE tbl_client_master SET company_name='$company_name',
		                                  company_address='$company_address',
										  company_registration_no='$company_registration_no', 
										  date_of_incorporation='$date_of_incorporation', 
										  country_of_incorporation='$country_of_incorporation',
										  city_of_incorporation='$city_of_incorporation'
										  WHERE client_id='" . $_SESSION["s_client_id"] . "' AND banned=0";
	$upd = db_query($update);
	if ($upd) {
		$_SESSION['members']['company_name'] = $company_name;
		$_SESSION['members']['company_address'] = $company_address;
		$_SESSION['members']['company_registration_no'] = $company_registration_no;
		$_SESSION['members']['date_of_incorporation'] = $date_of_incorporation;
		$_SESSION['members']['country_of_incorporation'] = $country_of_incorporation;
		$_SESSION['members']['city_of_incorporation'] = $city_of_incorporation;

		echo 1;
	} else {
		echo 0;
	}
} else {
	echo 0;
}
