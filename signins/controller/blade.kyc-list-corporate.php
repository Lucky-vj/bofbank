<?php
$data['PageName'] = 'Corporate KYC List';
$data['PageFile'] = 'kyc-list-corporate';
is_admin_session();

$action = "Add";
if (isset($_GET['action']) && $_GET['action']) {
    $action = $_GET['action'];
}

if (($action == 'delete') and ($_GET['bid'] <> "")) {
    $bid = $_GET['bid'];
    $key = $_GET['key'];
    //$del = db_query("UPDATE tbl_kyc_provider SET Status='$key' where ID='$bid'");
    $_SESSION['msgok'] = "KYC Approved Successfully";
    header("location:kyc-list.php");
    exit;
}

if (($action == 'delete_kyc') and ($_GET['bid'] <> "")) {
    $bid = $_GET['bid'];
    $del = db_query("UPDATE tbl_client_kyc SET is_deleted=1 where id='$bid'");
    $_SESSION['msgok'] = "KYC Rejected Successfully";
    header("location:kyc-list.php");
    exit;
}


$kyc = db_rows("select * from tbl_client_kyc where is_deleted=0 order by id desc limit 0,100");

// echo "<pre>";
// print_r($rows);
// echo "<pre>";


include "header.php";
