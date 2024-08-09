<?php

$data['PageName']='Member Profile';
$data['PageFile']='merchant';
is_admin_session();


if(isset($_REQUEST["ClientID"]) and ($_REQUEST['ClientID']))
{

$ClientID=$_REQUEST['ClientID'];   // Get Client id from URL
$rs=member_details($ClientID,""); // Fetch Merchent details
$_SESSION["members"]["first_name"]=$rs['first_name'];
$_SESSION["members"]["last_name"]=$rs['last_name'];
$_SESSION["members"]["email"]=$rs['email'];
$_SESSION["s_client_id"]=$ClientID;
$_SESSION["s_first_name"]=$rs['first_name'];
$_SESSION["s_last_name"]=$rs['last_name'];
$_SESSION['s_login']="Admin";

//print_r($rs);

// Set fwicon for male/female/other		
if($rs['gender']=="M"){ $gender="fa-person";}elseif($rs['gender']=="F"){ $gender="fa-person-dress";}else{ $gender="fa-genderless";}

// Fetch Transaction Fees from function
$fees = get_member_fees($ClientID);

// Fetch IBAN

$iban = db_rows("SELECT * FROM `tbl_iban_issuer_account_details` WHERE client_id='$ClientID' ORDER BY `ID` DESC LIMIT 0,10",0);
$iban_counts=$db_counts;

if(isset($_SESSION['admin_default_IBAN_issuer'])&&$_SESSION['admin_default_IBAN_issuer']){
$key = array_search($_SESSION['admin_default_IBAN_issuer'], array_column($iban, 'IBAN_issuer'));  
$default_currency=$iban[$key]['currency'];
$default_accountid=$iban[$key]['accountid'];
$default_availableBalance=$iban[$key]['availableBalance'];
}else{
$key=0;
$_SESSION['admin_default_IBAN_issuer']=$iban[$key]['IBAN_issuer'];
$default_currency=$iban[$key]['currency'];
$default_accountid=$iban[$key]['accountid'];
$default_availableBalance=$iban[$key]['availableBalance'];
$_SESSION['default_IBAN_issuer']=$_SESSION['admin_default_IBAN_issuer'];
}

if($_SESSION['admin_default_IBAN_issuer']==3){

$tbl_name="tbl_master_trans_table_thekingdombank";
$where=" AND member_id='$ClientID' ";
$total_trans=table_data_availability($tbl_name,$where);
}else{
$tbl_name="tbl_master_trans_table";
$where=" AND member_id='$ClientID' AND `iban_id`='".$_SESSION['admin_default_IBAN_issuer']."' ";
$total_trans=table_data_availability($tbl_name,$where);
$default_availableBalance=get_user_balance_amt($ClientID,$_SESSION['admin_default_IBAN_issuer']);
}





}else{ echo "404"; exit; } // Client id not found




include "header.php";

?>







