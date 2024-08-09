<?php

$data['PageName'] = 'Statement';
$data['PageFile'] = 'member-statement';

// Set Login / Not

is_member_session();

// Set Permission for Active or New Member

is_member_status();

// Set Permission for Access page by IBAN
member_page_access_permission(1);



if (isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])) {

    $member_account_number = $_SESSION["s_client_id"];
} else {

    header("location:sign-in.php");
    exit;
}





$sql_query = " and member_id='$member_account_number' and transaction_status='Success' AND iban_id='" . $_SESSION['default_IBAN_issuer'] . "' ";

/*$requrl="";

if((isset($_GET['start_date'])<>"") and ($_GET['end_date']<>"")){ 

$startdate=$_GET['start_date'];

$enddate=$_GET['end_date'];

$enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));

$sql_query.=" and transaction_date >= '".$startdate."' AND  transaction_date <= '".$enddate."' "; 

$requrl.="&start_date=".$_GET['start_date']."&end_date=".$_GET['end_date'];

}

if((isset($_GET['value'])<>"") and ($_GET['type']<>"")){ 

$sql_query.=" and ".$_GET['type']." = '" .$_GET['value']."'";

$requrl.="&".$_GET['type']."=".$_GET['value'];

}

$tblname="tbl_master_trans_table";

$tblfieldid="transaction_id";

$tblorder="order by `admin_transaction_date` DESC";*/


$requrl = "";

if ((isset($_GET['date_1st']) <> "") and ($_GET['date_2nd'] <> "")) {

    $startdate = $_GET['date_1st'];
    $enddate = $_GET['date_2nd'];
    $enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
    $sql_query .= " and transaction_date >= '" . $startdate . "' AND  transaction_date <= '" . $enddate . "' ";
    $requrl .= "&start_date=" . $startdate . "&end_date=" . $enddate;
}

if (isset($_GET['searchkey']) && $_GET['searchkey'] && isset($_GET['key_name']) && $_GET['key_name']) {
    $sql_query .= " and " . $data['searchkey'][$_GET['key_name']] . " = '" . $_GET['searchkey'] . "'";
    $requrl .= "&key_name=" . $data['searchkey'][$_GET['key_name']] . "&searchkey=" . $_GET['searchkey'];
}

if (isset($_GET['status']) and ($_GET['status'] <> "") and ($_GET['status'] <> "-1")) {
    $sql_query .= " and transaction_status = '" . $_GET['status'] . "'";
    $requrl .= "&transaction_status=" . $_GET['status'];
}

if (isset($_GET['s_month']) and ($_GET['s_month'] <> "")) {
    $sql_query .= " and month(admin_transaction_date) = '" . $_GET['s_month'] . "'";
    $requrl .= "&month=" . $_GET['s_month'];
}

if (isset($_GET['s_year']) and ($_GET['s_year'] <> "")) {
    $sql_query .= " and year(admin_transaction_date) = '" . $_GET['s_year'] . "'";
    $requrl .= "&year=" . $_GET['s_year'];
}



$pdfurl = urlencode($requrl);

$tblname = "tbl_master_trans_table";

$tblfieldid = "transaction_id";

$tblorder = "order by `transaction_id` desc";



include('pagination.php');







include "header.php";
