<?php
include "common.php";
$Client_ID = $_SESSION["s_client_id"];
if($_POST['ibandata'])
{ 
$ibandata=$_POST['ibandata'];
$admtype=$_POST['admtype'];
if($admtype==1){
$_SESSION['admin_default_IBAN_issuer']=$ibandata;
}else{
$_SESSION['default_IBAN_issuer']=$ibandata;
}
store_iban_data($Client_ID,$ibandata);
$_SESSION['reg-step']="";

echo 1;
}else{
echo 0;
}
?>







