<?php
$data['PageName']='Payment Gateway';
$data['PageFile']='payment-gateway';
is_admin_session();

$action="Add";
if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }
   
	

if(isset($_POST['btn_bank']) and ($_POST['btn_bank']=='Add')){
$PaymentGateway = $_POST['PaymentGateway'];
$SecretKey = $_POST['SecretKey'];
$ApiKey = $_POST['ApiKey'];
$OtherKey = $_POST['OtherKey'];
$CallbackUrl=$_POST['CallbackUrl'];


$ins = db_query("INSERT INTO tbl_payment_gateway SET PaymentGateway='$PaymentGateway', 
                                                                  SecretKey='$SecretKey', 
				                                                  ApiKey='$ApiKey',
																  OtherKey='$OtherKey',                                                                  CallbackUrl='$CallbackUrl' ");
																  
$insert_id=newid();
json_log_upd($insert_id,'payment_gateway','add','ID'); // add json log history

$_SESSION['msgok']="Payment Gateway Added Successfully";
header("location:payment-gateway.php");exit;
}




if(isset($_POST['btn_bank']) and ($_POST['btn_bank']=='Edit')){
$account_id = $_POST['account_id'];
$bid = $_POST['bid'];
$PaymentGateway = $_POST['PaymentGateway'];
$SecretKey = $_POST['SecretKey'];
$ApiKey = $_POST['ApiKey'];
$OtherKey = $_POST['OtherKey'];
$CallbackUrl=$_POST['CallbackUrl'];


$upd = db_query("UPDATE tbl_payment_gateway SET PaymentGateway='$PaymentGateway', 
                                                             SecretKey='$SecretKey', 
															 ApiKey='$ApiKey',
															 OtherKey='$OtherKey',
															 CallbackUrl='$CallbackUrl' WHERE  ID='$bid'");

json_log_upd($bid,'payment_gateway','update','ID'); // update json log history
$_SESSION['msgok']="Payment Gateway Update Successfully";
header("location:payment-gateway.php");exit;


}


if(($action=='delete') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_payment_gateway SET Status='$key' where ID='$bid'");

$_SESSION['msgok']="Payment Gateway $key Successfully";

header("location:payment-gateway.php");exit;
}

if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];


// Select Data for display inserted value
$qry = "SELECT * FROM tbl_payment_gateway where ID='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];
$PaymentGateway=$rs['PaymentGateway'];
$SecretKey=$rs['SecretKey'];
$ApiKey=$rs['ApiKey'];
$OtherKey=$rs['OtherKey'];
$CallbackUrl=$rs['CallbackUrl'];
}else{
$PaymentGateway="";
$SecretKey="";
$ApiKey="";
$OtherKey="";
$CallbackUrl="";

}


include "header.php";
?>



