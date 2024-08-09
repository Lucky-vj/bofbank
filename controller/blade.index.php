<?php
$data['PageName'] = 'Dashboard';
$data['PageFile'] = 'index';
is_member_session();
is_member_status();
$Client_ID = $_SESSION["s_client_id"];

// Set Default IBAN ID
if ($_SESSION['default_IBAN_issuer'] == "") {
    get_iban_id($Client_ID);
}


// Start global Balance
$globalbalance = 0;
$globalbalance = get_global_balance($Client_ID);


$result = get_select_list("tbl_iban_issuer_account_details", "`currency`,`availableBalance`", " AND `client_id`='$Client_ID' AND `IBAN_issuer`=3 LIMIT 1 ");

$iban_result = $result[0]['currency'];
$iban_result = $result[0]['availableBalance'];
if (isset($globalbalance) && $globalbalance) {
    $globalbalance = $globalbalance + $iban_result;
}
// END global Balance

// Fetch data for BAsic User 
if ($_SESSION['default_IBAN_issuer'] == 3) {


    $get_result = get_iban_account_details($Client_ID, $_SESSION['default_IBAN_issuer']);
    //print_r($get_result);
    $totalbalance = $get_result[0]['availableBalance'];

    $currency = $get_result[0]['currency'];
    $_SESSION['AccountBalance'] = $totalbalance;
    $_SESSION['AccountCurrency'] = $currency;
    $accountid = $get_result[0]['accountid'];
    $accountNumber = $get_result[0]['accountNumber'];

    if ($accountNumber == "") {
        $accountNumber = $accountid;
    }

    $fundtransferurl = "create-internal-transfer";
    $statementurl = "account-statement-tkb";

    $seltranlist = get_select_list("tbl_master_trans_table_thekingdombank", "*", " AND accountId='$accountid' AND status='PROCESSED' order by transactionId desc limit 0,20");
    $pageaction = "account-statement-tkb.php"; // Search Page Action

} else { // Fetch data for The Kingdom Bank IBAN 

    // Total Debit Balance
    $totdebit = db_rows("SELECT SUM(`converted_transaction_amount`) AS `total_amt` FROM `tbl_master_trans_table` WHERE `member_id`='$Client_ID' AND `transaction_type`='Debit' AND `transaction_status`='Success'  AND  `iban_id`='" . $_SESSION['default_IBAN_issuer'] . "' ", 0);
    $total_debit_amount = amount_format($totdebit[0]['total_amt']);

    /// Fetch Total Credit Balance
    $totcredit = db_rows("SELECT SUM(`converted_transaction_amount`) AS `total_camt` FROM `tbl_master_trans_table` WHERE `member_id`='$Client_ID' AND `transaction_type`='Credit' AND `transaction_status`='Success'  AND  iban_id='" . $_SESSION['default_IBAN_issuer'] . "' ", 0);
    $credit_sum = amount_format($totcredit[0]['total_camt']);

    //Total Balance Calculation
    $totalbalance = amount_format(($totcredit[0]['total_camt'] - $totdebit[0]['total_amt']));
    $_SESSION['AccountBalance'] = $totalbalance;

    //$currency=$_SESSION["members"]["assign_currency"];
    //$accountid=$_SESSION["members"]["assign_account"];

    $fundtransferurl = "transfer";
    $statementurl = "member-statement";

    $seltranlist = get_select_list("tbl_master_trans_table", "*", " AND `member_id`='$Client_ID' AND `transaction_status`='Success' AND  `iban_id`='" . $_SESSION['default_IBAN_issuer'] . "' ORDER BY `transaction_id` DESC LIMIT 0,5");




    $get_result = get_iban_account_details($Client_ID, $_SESSION['default_IBAN_issuer']);
    //print_r($get_result);
    //$totalbalance=$get_result[0]['availableBalance'];
    $_SESSION['iban-account'] = $get_result[0];
    $currency = $get_result[0]['currency'];
    $_SESSION['AccountCurrency'] = $currency;
    $accountid = $get_result[0]['accountid'];
    $accountNumber = $get_result[0]['accountNumber'];

    if ($accountNumber == "") {
        $accountNumber = $accountid;
    }
    $pageaction = "member-statement.php"; // Search Page Action
}

include "header.php";
