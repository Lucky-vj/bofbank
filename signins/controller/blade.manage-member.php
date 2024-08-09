<?php

$data['PageName']='Manage Member';

$data['PageFile']='manage-member';

//$data['noheader']=1;

is_admin_session();



if(isset($_REQUEST['mid'])&&$_REQUEST['mid'] && isset($_REQUEST['status'])&&$_REQUEST['status'] ){



$mid=$_REQUEST['mid'];

$mstatus=$_REQUEST['status'];

$query_admin = db_query("UPDATE tbl_client_master SET status='$mstatus' WHERE client_id='$mid'");

$_SESSION['msg']='Status Change to '.$mstatus.' for A/C No - '.$mid;

header("location:manage-member.php");exit;



}


if(isset($_REQUEST['mid'])&&$_REQUEST['mid'] && isset($_REQUEST['iban'])&&$_REQUEST['iban'] ){



$mid=$_REQUEST['mid'];

$iban=$_REQUEST['iban'];

$query_admin = db_query("UPDATE tbl_client_master SET IBAN_issuer='$iban' WHERE client_id='$mid'");

$_SESSION['msg']='IBAN Issuer Change to '.$iban.' for A/C No - '.$mid;

header("location:manage-member.php");exit;



}

		   



include "header.php";

?>