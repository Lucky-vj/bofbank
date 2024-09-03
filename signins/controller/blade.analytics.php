<?php
// echo "dd";exit;
$data['PageName'] = 'The Analytics';
$data['PageFile'] = 'analytics';
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


$getdetails = db_rows("SELECT * FROM `tbl_client_master` WHERE `status`='Active'");

foreach ($getdetails as $detail) {
    $clientId = $detail['client_id'];

    // Fetch client bank account details
    $getclient = db_rows("SELECT * FROM `tbl_member_bank_account` WHERE `client_id`='$clientId' ");

    // Check if any bank accounts were found
    if (!empty($getclient)) {
        foreach ($getclient as $clientAccount) {
            $assignBank = $clientAccount['assign_bank']; // Correct way to access array data

            // Fetch bank details using assign_bank
            $getbank_list = db_rows("SELECT * FROM `tbl_common_bank_account` WHERE `bank_id`='$assignBank'");

            // Debug output for verification
            // echo "<pre>";
            // print_r($clientAccount);
            // print_r($getbank_list);
        }
    }
    // Exit after the first loop for debugging, remove this in production
    
}







///////// For Listing with Searching and paging ///////////
$sql_query = " AND transaction_status='Success' ";
$requrl = "";



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
