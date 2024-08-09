<?php
$data['PageName']='Approve Member';
$data['PageFile']='approve-member';
is_admin_session();


$client_id=$_GET['client_id'];
$sel=db_rows("SELECT * FROM tbl_client_master WHERE client_id='$client_id'");
$rs=$sel[0];

include "header.php";
?>



