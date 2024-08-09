<?php

$data['PageName']='Login History';
$data['PageFile']='login-history';

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){
} else {
header("location:sign-in.php");    
}

// Fetch List of Login History

$customers_details = db_rows("SELECT * FROM tbl_login_history where client_id='{$_SESSION['s_client_id']}' and login_type='User' ORDER BY login_time DESC limit 0,50");

include "header.php";

?>







