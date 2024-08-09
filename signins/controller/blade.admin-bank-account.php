<?php
$data['PageName']='Admin Bank Account';
$data['PageFile']='admin-bank-account';
is_admin_session();

$action="Add";
if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }
   
	

if(isset($_POST['btn_bank']) and ($_POST['btn_bank']=='Add@@@@')){
$admin_bank_name = $_POST['admin_bank_name'];
$admin_bank_account_number = $_POST['admin_bank_account_number'];
$admin_bank_address = $_POST['admin_bank_address'];
$admin_bank_swift_code = $_POST['admin_bank_swift_code'];
$admin_bank_payment_reference=$_POST['admin_bank_payment_reference'];
//$admin_bank_supported_currency=$_POST['admin_bank_supported_currency'];
$admin_bank_supported_currency=implode(",",$_POST['admin_bank_supported_currency']); 
$admin_account_beneficiary=$_POST['admin_account_beneficiary'];
$admin_beneficiary_address=$_POST['admin_beneficiary_address'];

$ins = db_query("INSERT INTO tbl_admin_bank_account SET admin_bank_name='$admin_bank_name', 
                                                                  admin_bank_account_number='$admin_bank_account_number', 
				                                                  admin_bank_address='$admin_bank_address',
																  admin_bank_swift_code='$admin_bank_swift_code',                                                                  admin_bank_payment_reference='$admin_bank_payment_reference', 
																  admin_bank_supported_currency='$admin_bank_supported_currency',
																  admin_account_beneficiary='$admin_account_beneficiary',
																  admin_beneficiary_address='$admin_beneficiary_address', admin_bank_addedon=now()");

$_SESSION['msgok']="Bank Added Successfully";
header("location:admin-bank-account.php");exit;
}




if(isset($_POST['btn_bank']) and ($_POST['btn_bank']=='Edit')){
$account_id = $_POST['account_id'];
$bid = $_POST['bid'];
$admin_bank_name = $_POST['admin_bank_name'];
$admin_bank_account_number = $_POST['admin_bank_account_number'];
$admin_bank_address = $_POST['admin_bank_address'];
$admin_bank_swift_code = $_POST['admin_bank_swift_code'];
$admin_bank_payment_reference=$_POST['admin_bank_payment_reference'];
//$admin_bank_supported_currency=$_POST['admin_bank_supported_currency'];
$admin_bank_supported_currency=implode(",",$_POST['admin_bank_supported_currency']); 
$admin_account_beneficiary=$_POST['admin_account_beneficiary'];
$admin_beneficiary_address=$_POST['admin_beneficiary_address'];

$upd = db_query("UPDATE tbl_admin_bank_account SET admin_bank_name='$admin_bank_name', 
                                                             admin_bank_account_number='$admin_bank_account_number', 
															 admin_bank_address='$admin_bank_address',
															 admin_bank_swift_code='$admin_bank_swift_code',
															 admin_bank_payment_reference='$admin_bank_payment_reference',
															 admin_account_beneficiary='$admin_account_beneficiary',
															 admin_beneficiary_address='$admin_beneficiary_address',
															 admin_bank_supported_currency='$admin_bank_supported_currency' WHERE  admin_bank_id='$bid'");
															 
json_log_upd($bid,'admin_bank_account','update','admin_bank_id'); // update json log history

$_SESSION['msgok']="Bank Update Successfully";
header("location:admin-bank-account.php");exit;


}


if(($action=='delete') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_admin_bank_account SET admin_bank_status='$key' where admin_bank_id='$bid'");

$_SESSION['msgok']="Bank $key Successfully";

header("location:admin-bank-account.php");exit;
}

if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];

// Select Data for display inserted value
$qry = "SELECT * FROM tbl_admin_bank_account where admin_bank_id='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];

$admin_bank_name=$rs['admin_bank_name'];
$admin_bank_account_number=$rs['admin_bank_account_number'];
$admin_bank_address=$rs['admin_bank_address'];
$admin_bank_swift_code=$rs['admin_bank_swift_code'];
$admin_bank_payment_reference=$rs['admin_bank_payment_reference'];
$admin_bank_supported_currency=$rs['admin_bank_supported_currency'];
$admin_account_beneficiary=$rs['admin_account_beneficiary'];
$admin_beneficiary_address=$rs['admin_beneficiary_address'];
}else{
$admin_bank_name="";
$admin_bank_account_number="";
$admin_bank_address="";
$admin_bank_swift_code="";
$admin_bank_payment_reference="";
$admin_bank_supported_currency="";
$admin_account_beneficiary="";
$admin_beneficiary_address="";
}



include "header.php";
?>



