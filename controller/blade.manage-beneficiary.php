<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$data['PageName'] = 'Beneficiary';
$data['PageFile'] = 'manage-beneficiary';



// Set Login / Not
is_member_session();

// Set Permission for Active or New Member
is_member_status();

// Set Permission for Access page by IBAN
//member_page_access_permission(1);


$Client_ID = $_SESSION["s_client_id"];


$action = "";

if (isset($_GET['action']) <> "") {
	$action = $_GET['action'];
}


if ((isset($_GET['action']) && $_GET['action'] == 'delete') and ($_GET['bid'] <> "")) {
	$bid = $_GET['bid'];
	$del = db_query("UPDATE tbl_beneficiary SET beneficiary_status='Deleted' where beneficiary_id='$bid' and client_id='$Client_ID'");
	$_SESSION['msg'] = "Beneficiary Deleted Successfully";
	header("location:manage-beneficiary.php");
	exit;
}







if (isset($_POST['add_beneficiary']) && $_POST['add_beneficiary']) {
	$beneficiary_name = $_POST['beneficiary_name'];
	$beneficiary_account_number = $_POST['beneficiary_account_number'];
	$beneficiary_swift_code = $_POST['beneficiary_swift_code'];
	$beneficiary_address = $_POST['beneficiary_address'];
	$beneficiary_bank_name = $_POST['beneficiary_bank_name'];
	$beneficiary_bank_address = $_POST['beneficiary_bank_address'];
	$beneficiary_bank_country = $_POST['beneficiary_bank_country'];
	$beneficiary_currency = $_POST['beneficiary_currency'];
	$beneficiary_country = $_POST['beneficiary_country'];


	$insertdata = db_query("insert into tbl_beneficiary set beneficiary_name='$beneficiary_name',
                                          beneficiary_account_number='$beneficiary_account_number',
										  beneficiary_bank_name='$beneficiary_bank_name',
										  beneficiary_bank_address='$beneficiary_bank_address',
										  beneficiary_swift_code='$beneficiary_swift_code',
										  beneficiary_address='$beneficiary_address',
										  beneficiary_bank_country='$beneficiary_bank_country',
										  beneficiary_currency='$beneficiary_currency',
										  beneficiary_country='$beneficiary_country',
										  client_id='$Client_ID',
										  IBAN_issuer='" . $_SESSION['default_IBAN_issuer'] . "',
										  beneficiary_addedon=now()");



	$_SESSION['msg'] = "Beneficiary Added Successfully";
	header("location:manage-beneficiary.php");
	exit;
}



if (isset($_POST['edit_beneficiary'])) {
	$bid = $_GET['bid'];
	$beneficiary_name = $_POST['beneficiary_name'];
	$beneficiary_account_number = $_POST['beneficiary_account_number'];
	$beneficiary_swift_code = $_POST['beneficiary_swift_code'];
	$beneficiary_address = $_POST['beneficiary_address'];
	// $beneficiary_transfer_limit = $_POST['beneficiary_transfer_limit'];
	// $beneficiary_status = $_POST['beneficiary_status'];
	// $beneficiary_addedon = $_POST['beneficiary_addedon'];
	$beneficiary_bank_name = $_POST['beneficiary_bank_name'];
	$beneficiary_bank_address = $_POST['beneficiary_bank_address'];
	$beneficiary_bank_country = $_POST['beneficiary_bank_country'];
	$beneficiary_currency = $_POST['beneficiary_currency'];
	$beneficiary_country = $_POST['beneficiary_country'];

	$insertdata = db_query("update tbl_beneficiary set beneficiary_name='$beneficiary_name',
                                          beneficiary_account_number='$beneficiary_account_number',
										  beneficiary_bank_name='$beneficiary_bank_name',
										  beneficiary_bank_address='$beneficiary_bank_address',
										  beneficiary_bank_country='$beneficiary_bank_country',
										  beneficiary_swift_code='$beneficiary_swift_code',
										  beneficiary_address='$beneficiary_address',
                                          beneficiary_currency='$beneficiary_currency',
										  beneficiary_country='$beneficiary_country'
										  where beneficiary_id='$bid' and client_id='$Client_ID'");



	$_SESSION['msg'] = "Beneficiary Update Successfully";

	header("location:manage-beneficiary.php");
	exit;
}







if ((isset($_GET['action']) && $_GET['action'] == 'edit') and ($_GET['bid'] <> "")) {

	$bid = $_GET['bid'];

	$sel = db_rows("SELECT * FROM tbl_beneficiary where beneficiary_id='$bid'");

	$rs = $sel[0];
	$beneficiary_name = $rs['beneficiary_name'];
	$beneficiary_account_number = $rs['beneficiary_account_number'];
	$beneficiary_bank_name = $rs['beneficiary_bank_name'];
	$beneficiary_bank_address = $rs['beneficiary_bank_address'];
	$beneficiary_bank_country = $rs['beneficiary_bank_country'];
	$beneficiary_swift_code = $rs['beneficiary_swift_code'];
	$beneficiary_address = $rs['beneficiary_address'];
	$beneficiary_transfer_limit = $rs['beneficiary_transfer_limit'];
	$beneficiary_currency = $rs['beneficiary_currency'];
	$beneficiary_country = $rs['beneficiary_country'];
}


$currency_list = get_select_list("tbl_currency", "`currency_code`,`currency_name`", " AND currency_status='Active' order by currency_code");
$country_list = get_select_list("tbl_country", "`id`,`country`,`ISO_3_DIGIT`", "");


include "header.php";
