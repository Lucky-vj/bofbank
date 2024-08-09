<?php
$data['PageName']='Internal Fund Transfer';
$data['PageFile']='create-internal-transfer';
// Set Login / Not

is_member_session();
// Set Permission for Active or New Member
is_member_status();

// Set Permission for Access page by IBAN
member_page_access_permission(3);

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){

$member_account_number = $_SESSION["s_client_id"];
$iban_query = "SELECT * FROM tbl_iban_issuer_account_details WHERE client_id = $member_account_number AND IBAN_issuer='".$_SESSION['default_IBAN_issuer']."'";
$iban_result = db_rows($iban_query);
$iban = $iban_result[0];
$_SESSION['ses_IBAN_userid']=$iban['availableBalance'];
$_SESSION['ses_IBAN_accountid']=$iban['accountid'];

} else {

header("location:sign-in.php");exit;    

}

if(isset($_POST['btn_submit'])&&$_POST['btn_submit']=="Pay"){


$email=trim($_POST['email']);
$amount=trim($_POST['amount']);
$currency=trim($_POST['currency']);
$accountId=$_SESSION['ses_IBAN_accountid'];

if(isset($email)&&$email&&isset($amount)&&$amount&&isset($currency)&&$currency){

include "api/thekingdombank/create-internal-transfer.php";
exit;
}

}



$currency_list=get_select_list("tbl_currency","`currency_code`,`currency_name`"," AND currency_status='Active' order by currency_code");


include "header.php";

?>







