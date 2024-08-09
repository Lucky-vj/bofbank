<?php
$data['PageName']='Login History';
$data['PageFile']='login-history';
is_admin_session();



$sql_query=" AND client_id='{$_SESSION['s_admin_id']}' AND login_type='Admin' ";
$tblname="tbl_login_history";
$tblfieldid="token_id";
$tblorder="order by `token_id` desc";
include('pagination.php');




include "header.php";
?>



