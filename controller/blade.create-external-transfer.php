<?php
$data['PageName']='External Fund Transfer';
$data['PageFile']='create-external-transfer';
// Set Login / Not

if(isset($_SESSION['s_admin_id'])&&$_SESSION['s_admin_id']&&((isset($_REQUEST['ClientID'])&&$_REQUEST['ClientID'])|| (isset($_SESSION['ClientID'])&&$_SESSION['ClientID']))){
$data['noheader']=1;
is_admin_session();
if($_SESSION['ClientID']==""){ $_SESSION['ClientID']= $_REQUEST['ClientID'];}
$member_account_number = $_SESSION['ClientID'];
$_SESSION["s_client_id"]= $_SESSION['ClientID'];
$_SESSION['s_login']=date("d m Y H:i:s");
$_SESSION['default_IBAN_issuer']=$_SESSION['admin_default_IBAN_issuer'];
$addedby="Admin-".$_SESSION["s_admin_username"]."-ID-".$_SESSION['s_admin_id'];
}else{

// Set Login / Not
is_member_session();
// Set Permission for Active or New Member
is_member_status();
// Set Permission for Access page by IBAN
member_page_access_permission(3);
$member_account_number = $_SESSION["s_client_id"];
$addedby="Self";
}

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


$iban=trim($_POST['iban']);
$name=trim($_POST['name']);
$country=trim($_POST['country']);
$amount=trim($_POST['amount']);
$currency=trim($_POST['currency']);
$trasnfer_reason=trim($_POST['trasnfer_reason']);
$other_trasnfer_reason=trim($_POST['other_trasnfer_reason']);
$accountId=$_SESSION['ses_IBAN_accountid'];

if(isset($iban)&&$iban&&isset($amount)&&$amount&&isset($currency)&&$currency){

include "api/thekingdombank/create-external-transfer.php";
exit;
}

}

if(isset($_GET['bid'])&&$_GET['bid']){
$bid=$_GET['bid'];

$bene_data=get_select_list("tbl_beneficiary","`beneficiary_name`,`beneficiary_account_number`,`beneficiary_bank_country`,`beneficiary_currency`", " AND `client_id`='$member_account_number' AND `beneficiary_id`='$bid' ");

$get_beneficiary_name=$bene_data[0]['beneficiary_name'];
$get_beneficiary_account_number=$bene_data[0]['beneficiary_account_number'];
$get_beneficiary_bank_country=$bene_data[0]['beneficiary_bank_country'];
$get_beneficiary_currency=$bene_data[0]['beneficiary_currency'];

}



$currency_list=get_select_list("tbl_currency","`currency_code`,`currency_name`"," AND currency_status='Active' order by currency_code");

$country_list=get_select_list("tbl_country","`id`,`country`,`ISO_3_DIGIT`","");

$trasnfer_reason_list=get_select_list("tbl_trasnfer_reason","`id`,`reason`","");




include "header.php";

?>







