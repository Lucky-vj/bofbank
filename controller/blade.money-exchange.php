<?php
$data['PageName'] = 'Money Exchange';
$data['PageFile'] = 'money-exchange';

// Set Login / Not
is_member_session();
// Set Permission for Active or New Member
is_member_status();
// Set Permission for Access page by IBAN
member_page_access_permission(1);

$client_id = $_SESSION["s_client_id"];


$action = "";
if (isset($_GET['action']) <> "") {
	$action = $_GET['action'];
}
if (empty($_GET['step'])) {
	$step = '1';
} else {
	$step = $_GET['step'];
}


if ((isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Submit')) {
	$_SESSION['S_Sender_Account'] = $_POST['Sender_Account'];
	$_SESSION['S_Receipent'] = $_POST['Receipent'];
	$bundle = explode("||", $_POST['Receipent']);
	print_r($bundle);
	$_SESSION['S_Receipent'] = $bundle[0];
	$_SESSION['S_iban'] = $bundle[1];
	$_SESSION['S_currency'] = $bundle[2];

	$_SESSION['S_Amount'] = $_POST['Amount'];


	header("location:money-exchange.php?step=2");
	exit;
	exit;
}


if ((isset($_POST['pay_now']) && $_POST['pay_now'] == 'Pay Now')) {

	$user_details = get_select_list("tbl_iban_issuer_account_details", "`client_id`,`currency`,`accountName`,`IBAN_issuer`", " AND `accountNumber`='" . $_SESSION['S_Receipent'] . "'", 1);

	$iban_currency = $user_details[0]['currency'];
	$convertamt = currencyConverter($_SESSION['AccountCurrency'], $_SESSION['S_currency'], $_SESSION['S_Amount']);

	$insertdata = db_query("insert into tbl_master_trans_table set transaction_amount='" . $_SESSION['S_Amount'] . "',
                                          transaction_currency='" . $_SESSION['AccountCurrency'] . "',
										  transaction_ac_no='" . $_SESSION['S_Receipent'] . "',
										  transaction_type='Debit',
										  transaction_for='Internal Money Transfer',
										  member_id='$client_id',
										  iban_id='" . $_SESSION['default_IBAN_issuer'] . "',
										  transaction_date=now()");
	$transid = newid();
	$transaction_purpose = "Transfer Amount from " . $_SESSION['S_Sender_Account'] . " to " . $_SESSION['S_Receipent'];

	$insertdata = db_query("insert into tbl_master_trans_table set transaction_amount='$convertamt',
                                          transaction_currency='" . $_SESSION['S_currency'] . "',
										  transaction_ac_no='" . $_SESSION['S_Sender_Account'] . "',
										  transaction_type='Credit',
										  transaction_for='Internal Money Transfer',
										  member_id='" . $user_details[0]['client_id'] . "',
										  iban_id='" . $user_details[0]['IBAN_issuer'] . "',
										  sender_transaction_id='$transid',
										  transaction_purpose='$transaction_purpose',
										  transaction_date=now()", 0);
	$transid = newid();
	$_SESSION['msg'] = "Transaction Success: money exchange request initiated; awaiting approval for funds to be credited";
	$_SESSION['trans-responce']['transID'] = $transid;
	$_SESSION['trans-responce']['transAmount'] = $_SESSION['S_Amount'] . " " . $_SESSION['AccountCurrency'];
	$_SESSION['trans-responce']['transStatus'] = "Process";
	header("location:member-transactions.php");
	exit;
	exit;
}

// for get all iban account number
$get_iban = get_select_list("tbl_iban_issuer_account_details", "`accountid`,`IBAN_issuer`,`currency`", " AND client_id='$client_id' AND IBAN_issuer<>'" . $_SESSION['default_IBAN_issuer'] . "' ");

// for get iban selected account number
$get_result = get_iban_account_details($client_id, $_SESSION['default_IBAN_issuer']);
$getaccountNumber = $get_result[0]['accountNumber'];

include "header.php";
