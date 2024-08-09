<?php

$data['PageName'] = 'Add Money';
$data['PageFile'] = 'add-money';

$_SESSION["s_admin_username"];
$_SESSION['s_admin_id'];
//$_REQUEST['ClientID'];


if (isset($_SESSION['s_admin_id']) && $_SESSION['s_admin_id'] && ((isset($_REQUEST['ClientID']) && $_REQUEST['ClientID']) || (isset($_SESSION['ClientID']) && $_SESSION['ClientID']))) {
	$data['noheader'] = 1;
	is_admin_session();
	if ($_SESSION['ClientID'] == "") {
		$_SESSION['ClientID'] = $_REQUEST['ClientID'];
	}
	$member_account_number = $_SESSION['ClientID'];
	$_SESSION['default_IBAN_issuer'] = $_SESSION['admin_default_IBAN_issuer'];
	$addedby = "Admin-" . $_SESSION["s_admin_username"] . "-ID-" . $_SESSION['s_admin_id'];
} else {

	// Set Login / Not
	is_member_session();
	// Set Permission for Active or New Member
	is_member_status();
	// Set Permission for Access page by IBAN
	member_page_access_permission(1);
	$member_account_number = $_SESSION["s_client_id"];
	$addedby = "Self";
}


if (isset($_SESSION["s_status"]) && $_SESSION["s_status"] == 'New') {
	header("location:company-details.php");
	exit;
}

if (empty($_GET['step'])) {
	$step = '1';
} else {
	$step = $_GET['step'];
}





if (isset($_SESSION["s_assign_currency"]) && $_SESSION["s_assign_currency"]) {

	$getcurrency = $_SESSION["s_assign_currency"];

	$gcurrency = explode(',', $getcurrency);
}





if (isset($_POST['btn_submit']) == 'Submit') {

	$_SESSION['s_currency'] = $_POST['v_currency'];

	$_SESSION['s_amount'] = $_POST['v_amount'];

	$_SESSION['s_sender_name'] = $_POST['v_sender_name'];

	$_SESSION['s_sender_address'] = $_POST['v_sender_address'];

	$_SESSION['s_descricption'] = $_POST['v_descricption'];

	$_SESSION['s_transaction_gateway'] = $_POST['v_transaction_gateway'];

	$_SESSION['s_account_number'] = $_POST['v_account_number'];


	header("location:add-money.php?step=2");
	exit;
}



if (isset($_POST['btn_back']) == 'Back') {

	$_SESSION['s_currency'] = "";

	$_SESSION['s_amount'] = "";

	$_SESSION['s_sender_name'] = "";

	$_SESSION['s_sender_address'] = "";

	$_SESSION['s_descricption'] = "";

	$_SESSION['s_transaction_gateway'] = "";

	$_SESSION['s_account_number'] = "";

	header("location:add-money.php");
	exit;
}



if (isset($_POST['btn_add_money']) == 'Add Money') {

	$bankid = $_POST['bankid'];

	$s_currency = $_SESSION['s_currency'];

	$s_amount = $_SESSION['s_amount'];

	$s_sender_name = $_SESSION['s_sender_name'];

	$s_sender_address = $_SESSION['s_sender_address'];

	$s_descricption = $_SESSION['s_descricption'];

	$s_transaction_gateway = $_SESSION['s_transaction_gateway'];

	$s_account_number = $_SESSION['s_account_number'];


	$transaction_bank_name = $_POST['bank_name'];

	$transaction_ac_no = $_POST['bank_account_number'];

	$transaction_swift_code = $_POST['bank_swift_code'];

	$transaction_bank_address = $_POST['bank_address'];







	$insertdata = db_query("insert into tbl_master_trans_table set transaction_amount='$s_amount',
                                          iban_id='" . $_SESSION['default_IBAN_issuer'] . "',
                                          transaction_currency='$s_currency',
										  transaction_bank_name='$transaction_bank_name',
										  transaction_ac_no='$transaction_ac_no',
										  transaction_swift_code='$transaction_swift_code',
										  transaction_bank_address='$transaction_bank_address',
										  transaction_bank_id='$bankid',
										  usr_name='$s_sender_name',
										  usr_address='$s_sender_address',
										  usr_descricption='$s_descricption',
										  transaction_type='Credit',
										  transaction_for='Add Money',
										  member_id='$member_account_number',
										  addedby='$addedby',
										  transaction_date=now()", 0);

	$trnsid = newid();

	$_SESSION['s_currency'] = "";

	$_SESSION['s_amount'] = "";

	$_SESSION['s_sender_name'] = "";

	$_SESSION['s_sender_address'] = "";

	$_SESSION['s_descricption'] = "";

	$_SESSION['s_account_number'] = "";

	$_SESSION['msg'] = "Transaction Success: Add money request initiated; awaiting approval for funds to be credited";



	// Variable for Mail



	$template = "ADD-MONEY";

	$postvar['fullname'] = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];

	$postvar['amount'] = $s_amount . " " . $s_currency;
	$postvar['email'] = $_SESSION['members']['email'];


	sent_template_mail($template, $postvar, $for_admin = true);


	// for responce Display

	$_SESSION['trans-responce']['transID'] = $trnsid;
	$_SESSION['trans-responce']['transAmount'] = $s_amount . " " . $s_currency;
	$_SESSION['trans-responce']['transStatus'] = "Process";


	if (isset($_SESSION['ClientID']) && $_SESSION['ClientID']) {
		$urls = $data['Admins'] . "/submitted.php";
		header("location:$urls");
		exit;
	} else {
		header("location:member-transactions.php");
		exit;
	}
}





include "header.php";
