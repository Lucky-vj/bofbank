<?php

$data['PageName'] = 'Schedule';
$data['PageFile'] = 'schedule';

// Set Login / Not
is_member_session();
// Set Permission for Active or New Member
is_member_status();
// Set Permission for Access page by IBAN
member_page_access_permission(1);

$member_account_number = $_SESSION["s_client_id"];

if (isset($_GET['step']) == "") {
	$step = '1';
} else {
	$step = $_GET['step'];
}

if (isset($_POST['schedule_transfer']) == 'Schedule Transfer') {

	$_SESSION['s_beneficiary_name'] = $_POST['beneficiary_name'];
	$_SESSION['s_beneficiary_account_number'] = $_POST['beneficiary_account_number'];
	$_SESSION['s_beneficiary_bank_name'] = $_POST['beneficiary_bank_name'];
	$_SESSION['s_beneficiary_bank_address'] = $_POST['beneficiary_bank_address'];
	$_SESSION['s_beneficiary_swift_code'] = $_POST['beneficiary_swift_code'];
	$_SESSION['s_transaction_amount'] = $_POST['transaction_amount'];
	$_SESSION['s_transaction_currency'] = $_POST['transaction_currency'];
	$_SESSION['s_transaction_purpose'] = $_POST['transaction_purpose'];
	$_SESSION['s_schedule_time'] = $_POST['schedule_time'];
	$_SESSION['s_trasnfer_reason'] = $_POST['trasnfer_reason'];
	$_SESSION['s_other_trasnfer_reason'] = $_POST['other_trasnfer_reason'];

	header("location:schedule.php?step=2");
	exit;
}

if (isset($_POST['submit_transfer']) == 'Stransfer') {

	$beneficiary_name = $_SESSION['s_beneficiary_name'];
	$beneficiary_account_number = $_SESSION['s_beneficiary_account_number'];
	$beneficiary_bank_name = $_SESSION['s_beneficiary_bank_name'];
	$beneficiary_swift_code = $_SESSION['s_beneficiary_swift_code'];
	$beneficiary_bank_address = $_SESSION['s_beneficiary_bank_address'];
	$transaction_currency = $_SESSION['s_transaction_currency'];
	$transaction_amount = $_SESSION['s_transaction_amount'];
	$transaction_purpose = $_SESSION['s_transaction_purpose'];
	$schedule_time = $_SESSION['s_schedule_time'];
	$trasnfer_reason = $_SESSION['s_trasnfer_reason'];
	$other_trasnfer_reason = $_SESSION['s_other_trasnfer_reason'];



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
										  transaction_for='Schedule Transfer',
										  schedule_time='$schedule_time',
										  trasnfer_reason='$trasnfer_reason',
										  other_trasnfer_reason='$other_trasnfer_reason',
										  member_id='$member_account_number',
										  transaction_date=now()");

	$trnsid = newid();

	$_SESSION['s_beneficiary_name'] = "";
	$_SESSION['s_beneficiary_account_number'] = "";
	$_SESSION['s_beneficiary_bank_name'] = "";
	$_SESSION['s_beneficiary_swift_code'] = "";
	$_SESSION['s_beneficiary_bank_address'] = "";
	$_SESSION['s_transaction_currency'] = "";
	$_SESSION['s_transaction_amount'] = "";
	$_SESSION['s_transaction_purpose'] = "";
	$_SESSION['s_schedule_time'] = "";
	$_SESSION['s_trasnfer_reason'] = "";
	$_SESSION['s_other_trasnfer_reason'] = "";


	$_SESSION['msg'] = "Amount Transfer Scheduled for " . date("M d, Y", strtotime($schedule_time));

	$step = 1;

	//  Mail Function  //

	$template = "SCHEDULE-TRANSFER";
	$postvar['fullname'] = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];
	$postvar['amount'] = $transaction_amount . " " . $transaction_currency;
	$postvar['email'] = $_SESSION['members']['email'];
	$postvar['scheduledate'] = $schedule_time;
	sent_template_mail($template, $postvar, $for_admin = true);

	//  End Mail Function  //

	// for responce Display
	$_SESSION['trans-responce']['transID'] = $trnsid;
	$_SESSION['trans-responce']['transAmount'] = $transaction_amount . " " . $transaction_currency;
	$_SESSION['trans-responce']['transStatus'] = "Process";
	header("location:member-transactions.php");
	exit;
}

$trasnfer_reason_list = get_select_list("tbl_trasnfer_reason", "`id`,`reason`", "");
include "header.php";
