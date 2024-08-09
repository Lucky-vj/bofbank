<?php
$data['PageName']='IBAN KYC Details';
$data['PageFile']='iban-kyc-details';
// Set Login / Not

is_member_session();
// Set Permission for Active or New Member
is_member_status();

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){

$member_account_number = $_SESSION["s_client_id"];

$iban_query = "SELECT * FROM tbl_iban_issuer_account_details WHERE client_id = $member_account_number AND IBAN_user_status='SUCCESS'";
$iban_result = db_rows($iban_query);
$iban = $iban_result[0];
$_SESSION['ses_IBAN_userid']=$iban['IBAN_userid'];

} else {

header("location:sign-in.php");exit;    

}






include "header.php";

?>







