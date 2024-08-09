<?php

$data['PageName'] = 'Transfer';
$data['PageFile'] = 'beneficiary-transfer';

//include("functions.php");

if (isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])) {
	$Client_ID = $_SESSION["s_client_id"];
} else {
	header("location:sign-in.php");
	exit;
}



// Set Permission for Active or New Member
if (isset($_SESSION["s_status"]) && $_SESSION["s_status"] == 'New') {
	header("location:company-details.php");
	exit;
}


if (($_GET['act'] == 'beneficiary_transfer') and (isset($_GET['bid']) && $_GET['bid'] <> "")) {
	$page_error = 0;
	$bid = $_GET['bid'];
	$sel = db_rows("SELECT * FROM  tbl_beneficiary WHERE beneficiary_id='$bid' and client_id='$Client_ID'");
	$rs = $sel[0];
	$beneficiary_name = $rs['beneficiary_name'];
	$beneficiary_account_number = $rs['beneficiary_account_number'];
	$beneficiary_bank_name = $rs['beneficiary_bank_name'];
	$beneficiary_swift_code = $rs['beneficiary_swift_code'];
	$beneficiary_address = $rs['beneficiary_address'];
	$beneficiary_bank_address = $rs['beneficiary_bank_address'];
	$beneficiary_currency = $rs['beneficiary_currency'];
} else {
	$page_error = 1;
}




if (isset($_POST['btn_submit']) == 'Submit') {
	$beneficiary_name = $rs['beneficiary_name'];
	$beneficiary_account_number = $_POST['beneficiary_account_number'];
	$beneficiary_bank_name = $_POST['beneficiary_bank_name'];
	$beneficiary_swift_code = $_POST['beneficiary_swift_code'];
	$beneficiary_address = $_POST['beneficiary_address'];
	$beneficiary_bank_address = $_POST['beneficiary_bank_address'];
	$transaction_currency = $_POST['transaction_currency'];
	$transaction_amount = $_POST['transaction_amount'];
	$transaction_purpose = $_POST['other_trasnfer_reason'];
	$trasnfer_reason = $_POST['trasnfer_reason'];
	$other_trasnfer_reason = $_POST['other_trasnfer_reason'];


	$insertdata = db_query("insert into tbl_master_trans_table set transaction_amount='$transaction_amount',
                                          transaction_currency='$transaction_currency',
										  iban_id='" . $_SESSION['default_IBAN_issuer'] . "',
										  transaction_bank_name='$beneficiary_bank_name',
										  transaction_ac_no='$beneficiary_account_number',
										  transaction_swift_code='$beneficiary_swift_code',
										  transaction_bank_address='$beneficiary_bank_address',
										  transaction_purpose='$transaction_purpose',
										  usr_name='$beneficiary_name',
										  usr_address='$beneficiary_address',
										  transaction_type='Debit',
										  transaction_for='Beneficiary Transfer',
										  trasnfer_reason='$trasnfer_reason',
										  other_trasnfer_reason='$other_trasnfer_reason',
										  member_id='$Client_ID',
										  transaction_date=now()");





	//  Mail Function  //
	$template = "BENEFICIARY-TRANSFER";
	$postvar['fullname'] = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];
	$postvar['amount'] = $transaction_amount . " " . $transaction_currency;
	$postvar['email'] = $_SESSION['members']['email'];
	sent_template_mail($template, $postvar, $for_admin = true);

	//  End Mail Function  //

	$_SESSION['msg'] = "Amount Transfer Successfully";
	header("location:member-transactions.php");
	exit;
}


$trasnfer_reason_list = get_select_list("tbl_trasnfer_reason", "`id`,`reason`", "");

include "header.php";
