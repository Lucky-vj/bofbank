<?php

$data['PageName']='Pending Member';
$data['PageFile']='approve';
//$data['noheader']=1;
is_admin_session();

if(isset($_REQUEST['mid'])&&$_REQUEST['mid'] && isset($_REQUEST['action'])&&$_REQUEST['action']=="delete" ){
$mid=$_REQUEST['mid'];
$query_admin = db_query("DELETE FROM `tbl_client_master` WHERE `client_id`='$mid'");
$_SESSION['msg']='Account Deleted Successfully';
header("location:approve.php");exit;
}







$qry = "SELECT * FROM `tbl_client_master` WHERE `status`='New' LIMIT 0,50";

$rows=db_rows($qry);

$nor=$db_counts;





	   



include "header.php";

?>







