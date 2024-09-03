<?php
$data['PageName'] = 'Admin Dashboard';
$data['PageFile'] = 'index';
is_admin_session();

if (isset($_REQUEST['otype']) && $_REQUEST['otype'] == "DESC") {
    $otype = "ASC";
} else {
    $otype = "DESC";
}
if (isset($_REQUEST['pn']) && $_REQUEST['pn']) {
    $pn = $_REQUEST['pn'];
} else {
    $pn = 1;
}

////// Total Customer
$totcnt = db_rows("SELECT COUNT(`client_id`) AS `total_customer` FROM  `tbl_client_master` WHERE `status`='Active'");
$no_of_customer = $totcnt[0]['total_customer'];

////// Total Debit
$totdebit = db_rows("SELECT COUNT(`transaction_id`) AS `total_dtran` FROM `tbl_master_trans_table` WHERE 1 AND transaction_type='Debit' and transaction_status='Success' ");
$total_debit_trans = $totdebit[0]['total_dtran'];

////// Total Credit
$totcredit = db_rows("SELECT COUNT(`transaction_id`) AS `total_ctran` FROM `tbl_master_trans_table` WHERE 1 and transaction_type='Credit' AND transaction_status='Success' ");
$total_credit_trans = $totcredit[0]['total_ctran'];

//// total transaction Euro

$totcredit = db_rows("SELECT SUM(`transaction_amount`) AS `total_transaction` FROM `tbl_master_trans_table` WHERE 1 and transaction_type='Credit' AND transaction_status='Success' AND converted_transaction_currency='EUR' ");
$total_euro_trans = $totcredit[0]['total_transaction'];

//USD balance

$totcredit = db_rows("SELECT SUM(`transaction_amount`) AS `total_transaction` FROM `tbl_master_trans_table` WHERE 1 and transaction_type='Credit' AND transaction_status='Success' AND converted_transaction_currency='USD' ");
$total_usd_trans = $totcredit[0]['total_transaction'];

//GBP balance

$totcredit = db_rows("SELECT SUM(`transaction_amount`) AS `total_transaction` FROM `tbl_master_trans_table` WHERE 1 and transaction_type='Credit' AND transaction_status='Success' AND converted_transaction_currency='GBP' ");
$total_Gbp_trans = $totcredit[0]['total_transaction'];

//get currency list

$currency_list = db_rows(("SELECT * FROM tbl_currency WHERE currency_status='Active' "));
// print_r($currency_list);exit;

//bank list
$bank_list = db_rows(("SELECT * FROM tbl_common_bank_account WHERE bank_supported_currency='EUR'"));
// echo "<pre>";
// print_r($bank_list);exit;



///////// For Listing with Searching and paging ///////////
$sql_query = " AND transaction_status='Success' ";
$requrl = "";

if ((isset($_GET['date_1st']) <> "") and ($_GET['date_2nd'] <> "")) {

    $startdate = $_GET['date_1st'];
    $enddate = $_GET['date_2nd'];
    $enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
    $sql_query .= " AND transaction_date >= '" . $startdate . "' AND  transaction_date <= '" . $enddate . "' ";
    $requrl .= "&start_date=" . $startdate . "&end_date=" . $enddate;
}

if (isset($_GET['searchkey']) && $_GET['searchkey'] && isset($_GET['key_name']) && $_GET['key_name']) {
    if ($_GET['key_name'] == '6') {
        $sql_query .= " INNER JOIN tbl_client_master ON tbl_master_trans_table.client_id = tbl_client_master.client_id";
        $sql_query .= " WHERE tbl_client_master.full_name LIKE '%" . $_GET['searchkey'] . "%'";
    } else if ($_GET['key_name'] == '5' || $_GET['key_name'] == '7') {
        $sql_query .= " AND " . $data['searchkey'][$_GET['key_name']] . " LIKE '%" . $_GET['searchkey'] . "%'";
    } else {
        $sql_query .= " AND " . $data['searchkey'][$_GET['key_name']] . " = '" . $_GET['searchkey'] . "' ";
    }
    $requrl .= "&key_name=" . $data['searchkey'][$_GET['key_name']] . "&searchkey=" . $_GET['searchkey'];
}

if (isset($_GET['status']) and ($_GET['status'] <> "") and ($_GET['status'] <> "-1")) {

    $sql_query .= " AND transaction_status = '" . $_GET['status'] . "'";
    $requrl .= "&transaction_status=" . $_GET['status'];
}

$tblname = "tbl_master_trans_table";
$tblfieldid = "transaction_id";

if ((isset($_GET['order']) && $_GET['order'] <> "") && (($_GET['otype']) && $_GET['otype'] <> "")) {
    $tblorder = "order by `" . $_GET['order'] . "` " . $_GET['otype'];
    $requrl .= "&order=" . $_GET['order'] . "&otype=" . $_GET['otype'];
} else {
    $tblorder = "ORDER BY `transaction_id` DESC";
}

$pdfurl = urlencode($requrl);
include('pagination.php');

include "header.php";
