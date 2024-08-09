<?php
$data['PageName']='IBAN User Accoun Details';
$data['PageFile']='iban-user-accoun-details';
is_admin_session();

$action="Add";
if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }

if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Edit') and trim($_POST['accountid'])<>""){
$bid = $_POST['bid'];
$cid = $_POST['cid'];
$accountid = $_POST['accountid'];
$accountName = $_POST['accountName'];
$country = $_POST['country'];
$accountNumber = $_POST['accountNumber'];
$sponsorBankName = $_POST['sponsorBankName'];
$bankCode = $_POST['bankCode'];
$holderName = $_POST['holderName'];

$upd = db_query("UPDATE tbl_iban_issuer_account_details SET accountid='$accountid', 
                                                            country='$country',
															accountNumber='$accountNumber',
															sponsorBankName='$sponsorBankName',
															bankCode='$bankCode',
															holderName='$holderName',
															accountStatus='SUCCESS',
                                                            accountName='$accountName' WHERE ID='$bid' AND IBAN_issuer=3");
															
if($accountid){
$updacc = db_query("UPDATE tbl_client_master SET status='Active' WHERE client_id='$cid'");
}
                                                 

json_log_upd($bid,'iban_issuer_account_details','update','ID'); // update json log history
$_SESSION['msgok']="IBAN  A/C Detail Update Successfully";
header("location:iban-user-accoun-details.php");exit;
}

if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];


// Select Data for display inserted value
$qry = "SELECT * FROM tbl_iban_issuer_account_details where ID='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];
$accountid = $rs['accountid'];
$accountName = $rs['accountName'];
$country = $rs['country'];
$accountNumber = $rs['accountNumber'];
$bankCode = $rs['bankCode'];
$sponsorBankName = $rs['sponsorBankName'];
$holderName = $rs['holderName'];

}else{
$IBAN_issuer="";
$OtherKey="";
}


/// For Listing with Searching and paging
$sql_query=" "; 
$requrl="";

if((isset($_GET['searchkey'])&&$_GET['searchkey']<>"") && (($_GET['key_name'])&&$_GET['key_name']<>"")){ 
$sql_query.=" AND ".$_GET['key_name']." = '" .$_GET['searchkey']."'";
$requrl.="&searchkey=".$_GET['searchkey']."&key_name=".$_GET['key_name'];
}

if(isset($_GET['iban'])&&$_GET['iban']<>""){ 
$sql_query.=" AND `IBAN_issuer` = '" .$_GET['iban']."'";
$requrl.="&iban=".$_GET['iban'];
}

if(isset($_GET['currency'])&&$_GET['currency']<>""){ 
$sql_query.=" AND `currency` = '" .$_GET['currency']."'";
$requrl.="&currency=".$_GET['currency'];
}

//echo $requrl;
//$sql_query.=" and transaction_status='Success' ";
$tblname="tbl_iban_issuer_account_details";
$tblfieldid="ID";
if((isset($_GET['order'])&&$_GET['order']<>"") && (($_GET['otype'])&&$_GET['otype']<>"")){ 
$tblorder="order by `".$_GET['order']."` ".$_GET['otype'];
}else{
$tblorder="order by `ID` DESC";
}

include('pagination.php');

$currency_list=get_select_list("tbl_currency","`currency_code`,`currency_name`"," AND currency_status='Active' order by currency_code");
$iban_list=get_select_list("tbl_iban_issuer","`ID`,`IBAN_issuer`"," AND ID<>3 ORDER BY `IBAN_issuer`");


include "header.php";
?>



