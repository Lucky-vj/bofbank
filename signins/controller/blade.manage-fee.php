<?php
$data['PageName']='Manage Fee';
$data['PageFile']='manage-fee';
$data['noheader']=1;
is_admin_session();

if(isset($_REQUEST['client_id'])&&$_REQUEST['client_id']){
$Client_ID=$_REQUEST['client_id'];
$query = "SELECT * FROM tbl_fee WHERE client_id = $Client_ID";
$result = db_rows($query);
$rs = $result[0];
}else{
 header("location:sign-in.php");exit;
}

if(isset($_POST['btn_update']) and ($_POST['btn_update']=='Update Fees')){	

$setup_fee_one_time = $_REQUEST["setup_fee_one_time"]; 
$monthly_fee = $_REQUEST["monthly_fee"];
$yearly_fee = $_REQUEST["yearly_fee"];
$credit_mdr_fee = $_REQUEST["credit_mdr_fee"];
$credit_min_fee = $_REQUEST["credit_min_fee"];
$debit_mdr_fee = $_REQUEST["debit_mdr_fee"];
$debit_min_fee = $_REQUEST["debit_min_fee"];

if(isset($_REQUEST["sid"])&&$_REQUEST["sid"]){

       $update = "UPDATE tbl_fee SET setup_fee_one_time='$setup_fee_one_time',
					                   monthly_fee='$monthly_fee', 
									   yearly_fee='$yearly_fee', 
									   credit_mdr_fee='$credit_mdr_fee', 
									   credit_min_fee='$credit_min_fee',
									   debit_mdr_fee='$debit_mdr_fee',
									   debit_min_fee='$debit_min_fee' WHERE client_id='$Client_ID'";

$upd = db_query($update);
json_log_upd($Client_ID,'fee','update','fee_id'); // update json log history 

}else{
$ins = "INSERT INTO `tbl_fee` SET setup_fee_one_time='$setup_fee_one_time',
					                   monthly_fee='$monthly_fee', 
									   yearly_fee='$yearly_fee', 
									   credit_mdr_fee='$credit_mdr_fee', 
									   credit_min_fee='$credit_min_fee',
									   debit_mdr_fee='$debit_mdr_fee',
									   debit_min_fee='$debit_min_fee',client_id='$Client_ID'";
$ins = db_query($ins);
}
$_SESSION['msg']="Fee Update Successfully";
if($_GET['admin_view']=='1'){  $adm="admin_view=1";}
header("location:manage-fee.php?client_id=$Client_ID&$adm");exit;
}
include "header.php";

?>
