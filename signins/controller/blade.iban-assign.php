<?php

$data['PageName']='Member IBAN Assign';
$data['PageFile']='iban-assign.php';
$data['noheader']=1;
is_admin_session();


$action="Add";

if(isset($_GET['client_id'])&&$_GET['client_id']<>""){ $Client_ID=$_GET['client_id']; }
if(isset($_GET['action'])&&$_GET['action']<>""){ $action=$_GET['action']; }
if(isset($_GET['bid'])&&$_GET['bid']<>""){ $bid=$_GET['bid']; }


if(isset($_POST['btn_add']) and ($_POST['btn_add']=='Add')){

$account_id = $_POST['account_id'];
$iban_issuer = substr($_POST['iban_issuer'],0,-5);
$iban_currency = substr($_POST['iban_issuer'],-3);


$createdAt = date("Y-m-d H:i:s");

$cnt=table_data_availability("tbl_iban_issuer_account_details"," AND client_id='$account_id' AND IBAN_issuer='$iban_issuer'");


if($cnt==1){
$_SESSION['msgfail']="IBAN Issuer Allready Added";
header("location:iban-assign.php?client_id=$Client_ID&admin_view=1&$adm");exit;
}else{
$ins = db_query("INSERT INTO tbl_iban_issuer_account_details SET client_id='$account_id', IBAN_issuer='$iban_issuer', currency='$iban_currency', iban_order_status=1,`accountStatus`='PENDING', createdAt='$createdAt'");
$_SESSION['msgok']="IBAN Issuer Assign Successfully";
header("location:iban-assign.php?client_id=$Client_ID&admin_view=1&$adm");exit;
}


}


if(($_GET['act']=='upd') and ($_GET['datatid']<>"")){
$datatid=$_GET['datatid'];
$client_id=$_GET['client_id'];
$updall = db_query("UPDATE tbl_iban_issuer_account_details SET IBAN_isdefault='0' WHERE client_id='$client_id'");
$upd = db_query("UPDATE tbl_iban_issuer_account_details SET IBAN_isdefault='1' WHERE ID='$datatid' AND client_id='$client_id'");
$_SESSION['msgok']="IBAN Issuer is default change Successfully";
header("location:iban-assign.php?client_id=$client_id&admin_view=1");exit;

}

include "header.php";

?>







