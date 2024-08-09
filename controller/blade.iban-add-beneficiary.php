<?php
$data['PageName']='IBAN Add Beneficiary';
$data['PageFile']='iban-add-beneficiary';
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
$_SESSION['ses_IBAN_accountid']=$iban['accountid'];

} else {

header("location:sign-in.php");exit;    

}

if(isset($_POST['btn_submit'])&&$_POST['btn_submit']=="Submit"){


$beneficiary_name=trim($_POST['beneficiary_name']);
$beneficiary_email=trim($_POST['beneficiary_email']);
$beneficiary_mobile=trim($_POST['beneficiary_mobile']);

if(isset($beneficiary_name)&&$beneficiary_name&&isset($beneficiary_email)&&$beneficiary_email&&isset($beneficiary_mobile)&&$beneficiary_mobile){

include "api/stylopay/add-beneficiary.php";

exit;
}

}






include "header.php";

?>







