<?php
$data['PageName']='IBAN Create Physical Card';
$data['PageFile']='iban-create-physical-card';
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

if(isset($_POST['Submit'])&&$_POST['Submit']){
$cardid=$_POST['cardid'];
$cardpin=$_POST['cardpin'];

$data1="041234FFFFFFFFFF";
$data2="0000123456789012";
$x = bin2hex(pack('H*',$data1) ^ pack('H*',$data2));
echo $encpin="D5968F5FD296147C";

include "api/stylopay/set-pin.php";



exit;

}



//$sql_query=" and member_id='$member_account_number' "; 
$sql_query=" AND `userid`='".$_SESSION['ses_IBAN_userid']."' AND `accountid`='".$_SESSION['ses_IBAN_accountid']."' AND cardid<>'' ";

$requrl="";
if((isset($_GET['value'])<>"") and ($_GET['type']<>"")){ 
$sql_query.=" and beneficiary_".$_GET['type']." = '" .$_GET['value']."'";
$requrl.="&".$_GET['type']."=".$_GET['value'];
}

$tblname="tbl_iban_physical_card";

$tblfieldid="ID";

$tblorder="order by `ID` desc";







include('pagination.php');

//print_r($iban_data);




include "header.php";

?>







