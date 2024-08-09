<?php
$data['PageName'] = 'Transaction';
$data['PageFile'] = 'transaction';
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

////// Total Trans Count
$totcnt = db_rows("SELECT COUNT(`transaction_id`) as total_trans FROM tbl_master_trans_table where 1");
$no_of_transaction = $totcnt[0]['total_trans'];

////// Total Debit
$totdebit = db_rows("SELECT COUNT(`transaction_id`) as total_dtran FROM tbl_master_trans_table where 1 and transaction_type='Debit'");
$total_debit_trans = $totdebit[0]['total_dtran'];

////// Total Credit
$totcredit = db_rows("SELECT COUNT(`transaction_id`) as total_ctran FROM tbl_master_trans_table where 1 and transaction_type='Credit'");
$total_credit_trans = $totcredit[0]['total_ctran'];

///////// For Listing with Searching and paging ///////////
$sql_query = " ";
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
