<?php
$data['PageName']='IBAN Fund Transfer';
$data['PageFile']='iban-fund-transfer';
// Set Login / Not

is_member_session();
// Set Permission for Active or New Member
is_member_status();

// Set Permission for Access page by IBAN
member_page_access_permission(2);

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


$contactid=trim($_POST['contactid']);
$amount=trim($_POST['amount']);
$description=trim($_POST['description']);

if(isset($contactid)&&$contactid&&isset($amount)&&$amount&&isset($description)&&$description){

include "api/stylopay/fund-transfer.php";

echo "call APPPPPPPPPPI";exit;
}

}






include "header.php";

?>







