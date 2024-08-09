<?php
$data['PageName']='KYC Provider';
$data['PageFile']='kyc-provider';
is_admin_session();

$action="Add";
if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }
   
if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Add')){
$KYC_provider = $_POST['KYC_provider'];
$KYC_status = $_POST['KYC_status'];
$ApiKey = $_POST['ApiKey'];
$Odf1 = $_POST['Odf1'];
$Odf2 = $_POST['Odf2'];
$Odf3 = $_POST['Odf3'];
$Other_Data_Json = $_POST['Other_Data_Json'];

$ins = db_query("INSERT INTO tbl_kyc_provider SET KYC_provider='$KYC_provider', 
                                                 KYC_status='$KYC_status', 
                                                 ApiKey='$ApiKey', 
												 Odf1='$Odf1', 
												 Odf2='$Odf2', 
												 Odf3='$Odf3', 
												 Other_Data_Json='$Other_Data_Json' ");
																  
$insert_id=newid();
json_log_upd($insert_id,'kyc_provider','add','ID'); // add json log history

$_SESSION['msgok']="KYC Provider Added Successfully";
header("location:kyc-provider.php");exit;
}




if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Edit')){
$account_id = $_POST['account_id'];
$bid = $_POST['bid'];
$KYC_provider = $_POST['KYC_provider'];
$KYC_status = $_POST['KYC_status'];
$ApiKey = $_POST['ApiKey'];
$Odf1 = $_POST['Odf1'];
$Odf2 = $_POST['Odf2'];
$Odf3 = $_POST['Odf3'];


$upd = db_query("UPDATE tbl_kyc_provider SET KYC_provider='$KYC_provider', 
                                                 KYC_status='$KYC_status', 
                                                 ApiKey='$ApiKey', 
												 Odf1='$Odf1', 
												 Odf2='$Odf2', 
												 Odf3='$Odf3', 
												 Other_Data_Json='$Other_Data_Json' WHERE ID='$bid'");

json_log_upd($bid,'kyc_provider','update','ID'); // update json log history
$_SESSION['msgok']="KYC Provider Update Successfully";
header("location:kyc-provider.php");exit;


}


if(($action=='delete') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_kyc_provider SET Status='$key' where ID='$bid'");

$_SESSION['msgok']="KYC Provider $key Successfully";

header("location:kyc-provider.php");exit;
}

if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];


// Select Data for display inserted value
$qry = "SELECT * FROM tbl_kyc_provider where ID='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];
$KYC_provider = $rs['KYC_provider'];
$KYC_status = $rs['KYC_status'];
$ApiKey = $rs['ApiKey'];
$Odf1 = $rs['Odf1'];
$Odf2 = $rs['Odf2'];
$Odf3 = $rs['Odf3'];
$Other_Data_Json = $rs['Other_Data_Json'];

}else{
$KYC_provider="";
$OtherKey="";

}


include "header.php";
?>



