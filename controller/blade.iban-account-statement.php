<?php



$data['PageName']='IBAN Account Statement';

$data['PageFile']='iban-account-statement';



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





//$sql_query=" and account_id='$member_account_number' "; 
$sql_query=" ";

$requrl="";

if((isset($_GET['date_1st'])<>"") and ($_GET['date_2nd']<>"")){ 

$startdate=$_GET['date_1st'];

$enddate=$_GET['date_2nd'];

$enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));

$sql_query.=" and date >= '".$startdate."' AND  date <= '".$enddate."' "; 

$requrl.="&start_date=".$startdate."&end_date=".$enddate;

}

if(isset($_GET['searchkey'])&&$_GET['searchkey']&&isset($_GET['key_name'])&&$_GET['key_name']){ 

$sql_query.=" and ".$data['searchkey'][$_GET['key_name']]." = '" .$_GET['searchkey']."'";

$requrl.="&".$data['searchkey'][$_GET['key_name']]."=".$_GET['searchkey'];

}

if(isset($_GET['status']) and ($_GET['status']<>"") and ($_GET['status']<>"-1")){ 

$sql_query.=" and status = '" .$_GET['status']."'";

$requrl.="& transaction_status = ".$_GET['status'];

}

$tblname="tbl_master_trans_table_stylopay";

$tblfieldid="date";

$tblorder="";







include('pagination.php');





include "header.php";

?>







