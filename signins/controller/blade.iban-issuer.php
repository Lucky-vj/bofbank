<?php
$data['PageName']='IBAN Issuer';
$data['PageFile']='iban-issuer';
is_admin_session();

$action="Add";
if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }
   
	

if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Add')){
$IBAN_issuer = $_POST['IBAN_issuer'];
$IBAN_status = $_POST['IBAN_status'];
$IBAN_kyc_provider = $_POST['IBAN_kyc_provider'];
$IBAN_currency = $_POST['IBAN_currency'];
$IBAN_account_format = $_POST['IBAN_account_format'];



$ins = db_query("INSERT INTO tbl_iban_issuer SET IBAN_issuer='$IBAN_issuer', 
                                                 IBAN_status='$IBAN_status', 
												 IBAN_kyc_provider='$IBAN_kyc_provider',
												 IBAN_currency='$IBAN_currency',
												 IBAN_account_format='$IBAN_account_format' ");
																  
$insert_id=newid();
json_log_upd($insert_id,'iban_issuer','add','ID'); // add json log history

$_SESSION['msgok']="IBAN Issuer Added Successfully";
header("location:iban-issuer.php");exit;
}




if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Edit')){
$account_id = $_POST['account_id'];
$bid = $_POST['bid'];
$IBAN_issuer = $_POST['IBAN_issuer'];
$IBAN_status = $_POST['IBAN_status'];
$IBAN_kyc_provider = $_POST['IBAN_kyc_provider'];
$IBAN_currency = $_POST['IBAN_currency'];
$IBAN_account_format = $_POST['IBAN_account_format'];




$upd = db_query("UPDATE tbl_iban_issuer SET IBAN_issuer='$IBAN_issuer', 
                                                 IBAN_status='$IBAN_status', 
												 IBAN_kyc_provider='$IBAN_kyc_provider', 
												 IBAN_account_format='$IBAN_account_format',
												 IBAN_currency='$IBAN_currency'
                                                 WHERE ID='$bid'");

json_log_upd($bid,'iban_issuer','update','ID'); // update json log history
$_SESSION['msgok']="IBAN Issuer Update Successfully";
header("location:iban-issuer.php");exit;


}


if(($action=='delete') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_iban_issuer SET Status='$key' where ID='$bid'");

$_SESSION['msgok']="IBAN Issuer $key Successfully";

header("location:iban-issuer.php");exit;
}

if(($_GET['act']=='upd') and ($_GET['datatid']<>"")){
$datatid=$_GET['datatid'];
$updall = db_query("UPDATE tbl_iban_issuer SET IBAN_isdefault='0'");
$upd = db_query("UPDATE tbl_iban_issuer SET IBAN_isdefault='1' where ID='$datatid'");
$_SESSION['msgok']="IBAN Issuer is default change Successfully";
header("location:iban-issuer.php");exit;

}



if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];


// Select Data for display inserted value
$qry = "SELECT * FROM tbl_iban_issuer where ID='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];
$IBAN_issuer = $rs['IBAN_issuer'];
$IBAN_status = $rs['IBAN_status'];
$IBAN_kyc_provider = $rs['IBAN_kyc_provider'];
$IBAN_currency = $rs['IBAN_currency'];
$IBAN_account_format = $rs['IBAN_account_format'];


}else{
$IBAN_issuer="";
$OtherKey="";

}

$currency_list=get_select_list("tbl_currency","`currency_code`,`currency_name`"," AND currency_status='Active' order by currency_code");

include "header.php";
?>



