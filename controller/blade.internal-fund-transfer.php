<?php

$data['PageName']='Fund Transfer';
$data['PageFile']='fund-transfer';

// Set Login / Not
is_member_session();
// Set Permission for Active or New Member
is_member_status();
$Client_ID = $_SESSION["s_client_id"];


$action="";
if(isset($_GET['action'])<>""){ $action=$_GET['action']; }

include $template_inc_path."/header.php";
?>



