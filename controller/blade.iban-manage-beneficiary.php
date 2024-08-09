<?php
$data['PageName']='IBAN Manage Beneficiary';
$data['PageFile']='iban-manage-beneficiary';

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


$sql_query=" and IBAN_userid='".$_SESSION['ses_IBAN_userid']."' "; 
//$sql_query="";

$requrl="";
if((isset($_GET['value'])<>"") and ($_GET['type']<>"")){ 
$sql_query.=" and beneficiary_".$_GET['type']." = '" .$_GET['value']."'";
$requrl.="&".$_GET['type']."=".$_GET['value'];
}

$tblname="tbl_iban_beneficiary";
$tblfieldid="beneficiary_id";
$tblorder="order by `beneficiary_id` desc";
include('pagination.php');


if(isset($_POST['Submit'])&&$_POST['Submit']){
$contactid=$_POST['contactid'];
$accountNumberc=$_POST['accountNumberc'];


include "api/stylopay/update-contact.php";





}





include "header.php";

?>







