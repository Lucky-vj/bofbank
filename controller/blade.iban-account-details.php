<?php
$data['PageName']='IBAN Account Details';
$data['PageFile']='iban-account-details';
// Set Login / Not

is_member_session();
// Set Permission for Active or New Member
//is_member_status();

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){

$member_account_number = $_SESSION["s_client_id"];

} else {

header("location:sign-in.php");exit;    

}

$sql_query="SELECT * FROM `tbl_iban_issuer_account_details` WHERE  `IBAN_issuer`='$IBAN_issuer' AND `client_id`='$member_account_number' AND `Status`=1 "; 
$result = db_rows($sql_query);
$iban_data = $result[0];



include "header.php";

?>







