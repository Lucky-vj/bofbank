<?php
$data['PageName']='IBAN User Details';
$data['PageFile']='iban-user-details';
// Set Login / Not

is_member_session();
// Set Permission for Active or New Member
is_member_status();

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){

$member_account_number = $_SESSION["s_client_id"];

$iban_query = "SELECT * FROM tbl_iban_issuer_account_details WHERE client_id = $member_account_number AND IBAN_user_status='SUCCESS'";
$iban_result = db_rows($iban_query);
$iban = $iban_result[0];

} else {

header("location:sign-in.php");exit;    

}
$USERID=$iban['IBAN_userid'];
if(isset($USERID)&&$USERID){
include "api/stylopay/user-details.php";
}


if(isset($response)&&$response){
$usr=json_decode($response,true);
}else{

}






include "header.php";

?>







