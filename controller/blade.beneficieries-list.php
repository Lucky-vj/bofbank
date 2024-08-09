<?php

$data['PageName']='Transaction Details';

$data['PageFile']='transaction-details';

//$data['noheader']=1;



if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){

$member_account_number = $_SESSION["s_client_id"];

$iban_query = "SELECT * FROM tbl_iban_issuer_account_details WHERE client_id = $member_account_number AND IBAN_user_status='SUCCESS'";
$iban_result = db_rows($iban_query);
$iban = $iban_result[0];
$_SESSION['ses_IBAN_userid']=$iban['IBAN_userid'];
$_SESSION['ses_IBAN_accountid']=$iban['accountid'];

} else {

header("location:sign-in.php");exit; 

}

if(isset($_SESSION['ses_IBAN_userid'])&&$_SESSION['ses_IBAN_userid']&&isset($_SESSION['ses_IBAN_accountid'])&&$_SESSION['ses_IBAN_accountid']){
include "api/stylopay/beneficieries-list.php";

if(isset($response)&&$response){
$dtatalist=json_decode($response,true);

}

}


						   



include "header.php";

?>







