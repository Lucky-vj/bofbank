<?php
$data['PageName'] = 'Mail List';
$data['PageFile'] = 'maillist';
is_admin_session();

if (isset($_REQUEST['mid']) && $_REQUEST['mid'] && isset($_REQUEST['action']) && $_REQUEST['action'] == "delete") {
	$mid = $_REQUEST['mid'];
	$query_admin = db_query("DELETE FROM `tbl_client_master` WHERE `client_id`='$mid'");
	$_SESSION['msg'] = 'Account Deleted Successfully';
	header("location:maillist.php");
	exit;
}







// $qry = "SELECT * FROM `tbl_client_master` WHERE `status`='Active' LIMIT 0,50";
$query = "SELECT * FROM tbl_client_master WHERE status='Active'  LIMIT 50";



$rowss = db_rows($query);

$nor = $db_counts;

// echo "<pre>";
// print_r($rows);
// echo "<pre>";







include "header.php";
