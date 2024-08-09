<?php

$data['PageName'] = 'Common Bank Account';

$data['PageFile'] = 'common-bank-account';

is_admin_session();



$action = "Add";

if (isset($_GET['action']) && $_GET['action']) {
	$action = $_GET['action'];
}







if (isset($_POST['btn_bank']) and ($_POST['btn_bank'] == 'Add')) {

	$bank_name = $_POST['bank_name'];

	$codes = $_POST['codes'];

	$bank_account_number = $_POST['bank_account_number'];

	$bank_address = $_POST['bank_address'];

	$bank_swift_code = $_POST['bank_swift_code'];

	$bank_payment_reference = $_POST['bank_payment_reference'];

	$bank_supported_currency = implode(",", $_POST['bank_supported_currency']);

	$bank_description = $_POST['bank_description'];

	$account_beneficiary = $_POST['account_beneficiary'];

	$beneficiary_address = $_POST['beneficiary_address'];



	$ins = db_query("INSERT INTO tbl_common_bank_account SET bank_name='$bank_name', 

                                                                  codes='$codes',

																  bank_account_number='$bank_account_number', 

				                                                  bank_address='$bank_address',

																  bank_swift_code='$bank_swift_code',                                                                  bank_payment_reference='$bank_payment_reference', 

																  bank_supported_currency='$bank_supported_currency',

																  bank_description='$bank_description',

																  account_beneficiary='$account_beneficiary',

																  beneficiary_address='$beneficiary_address', bank_addedon=now()");



	$insert_id = newid();

	json_log_upd($insert_id, 'common_bank_account', 'add', 'bank_id'); // add json log history



	$_SESSION['msgok'] = "Bank Added Successfully";

	header("location:common-bank-account.php");
	exit;
}









if (isset($_POST['btn_bank']) and ($_POST['btn_bank'] == 'Edit')) {

	$account_id = $_POST['account_id'];

	$bid = $_POST['bid'];

	$bank_name = $_POST['bank_name'];

	$codes = $_POST['codes'];

	$bank_account_number = $_POST['bank_account_number'];

	$bank_address = $_POST['bank_address'];

	$bank_swift_code = $_POST['bank_swift_code'];

	$bank_payment_reference = $_POST['bank_payment_reference'];

	$bank_supported_currency = implode(",", $_POST['bank_supported_currency']);

	$bank_description = $_POST['bank_description'];

	$account_beneficiary = $_POST['account_beneficiary'];

	$beneficiary_address = $_POST['beneficiary_address'];



	$upd = db_query("UPDATE tbl_common_bank_account SET bank_name='$bank_name', 

                                                             codes='$codes',

															 bank_account_number='$bank_account_number', 

															 bank_address='$bank_address',

															 bank_swift_code='$bank_swift_code',

															 bank_payment_reference='$bank_payment_reference',

															 account_beneficiary='$account_beneficiary',

															 beneficiary_address='$beneficiary_address',

															 bank_description='$bank_description',

															 bank_description='$bank_description',

															 bank_supported_currency='$bank_supported_currency' WHERE  bank_id='$bid'");



	json_log_upd($bid, 'common_bank_account', 'update', 'bank_id'); // update json log history

	$_SESSION['msgok'] = "Bank Update Successfully";

	header("location:common-bank-account.php");
	exit;
}





if (($action == 'delete') and ($_GET['bid'] <> "")) {

	$bid = $_GET['bid'];

	$key = $_GET['key'];

	$del = db_query("UPDATE tbl_common_bank_account SET bank_status='$key' where bank_id='$bid'");



	$_SESSION['msgok'] = "Bank $key Successfully";



	header("location:common-bank-account.php");
	exit;
}

if (($_GET['act'] == 'upd') and ($_GET['datatid'] <> "")) {
	$datatid = $_GET['datatid'];
	$updall = db_query("UPDATE tbl_common_bank_account SET bank_isdefault='0'");
	$upd = db_query("UPDATE tbl_common_bank_account SET bank_isdefault='1' where bank_id='$datatid'");
	$_SESSION['msgok'] = "Bank is default change Successfully";
	header("location:common-bank-account.php");
	exit;
}



if (($action == 'edit') and ($_GET['bid'] <> "")) {

	$bid = $_GET['bid'];





	// Select Data for display inserted value

	$qry = "SELECT * FROM tbl_common_bank_account where bank_id='$bid'";

	$rs = db_rows($qry);

	$rs = $rs[0];



	$bank_name = $rs['bank_name'];

	$codes = $_POST['codes'];

	$bank_account_number = $rs['bank_account_number'];

	$bank_address = $rs['bank_address'];

	$bank_swift_code = $rs['bank_swift_code'];

	$bank_payment_reference = $rs['bank_payment_reference'];

	$bank_supported_currency = $rs['bank_supported_currency'];

	$bank_description = $rs['bank_description'];

	$account_beneficiary = $rs['account_beneficiary'];

	$beneficiary_address = $rs['beneficiary_address'];
} else {

	$bank_name = "";

	$codes = "";

	$bank_account_number = "";

	$bank_address = "";

	$bank_swift_code = "";

	$bank_payment_reference = "";

	$bank_supported_currency = "";

	$bank_description = "";

	$account_beneficiary = "";

	$beneficiary_address = "";
}





include "header.php";
