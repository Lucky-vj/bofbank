<?php
$data['PageName']='Member Bank Account';
$data['PageFile']='member-bank-account';
$data['noheader']=1;
is_admin_session();



$action="Add";
if(isset($_GET['client_id'])&&$_GET['client_id']<>""){ $Client_ID=$_GET['client_id']; }
if(isset($_GET['action'])&&$_GET['action']<>""){ $action=$_GET['action']; }
if(isset($_GET['bid'])&&$_GET['bid']<>""){ $bid=$_GET['bid']; }
   
	

if(isset($_POST['btn_bank']) and ($_POST['btn_bank']=='Add')){
$account_id = $_POST['account_id'];
$assign_bank = $_POST['assign_bank'];


$ins = db_query("INSERT INTO tbl_member_bank_account SET client_id='$account_id', assign_bank='$assign_bank', bank_addedon=now()");
if($_GET['admin_view']=='1'){  $adm="admin_view=1";}

if($ins){
$_SESSION['msgok']="Bank Assign Successfully";
header("location:member-bank-account.php?client_id=$Client_ID&admin_view=1&$adm");exit;
}else{
$_SESSION['msgfail']="Bank Allready Added";
header("location:member-bank-account.php?client_id=$Client_ID&admin_view=1&$adm");exit;
}

}

if(isset($_POST['btn_bank']) and ($_POST['btn_bank']=='Edit')){


$account_id = $_POST['account_id'];
$bid = $_POST['bid'];
$assign_bank = $_POST['assign_bank'];
//echo "UPDATE tbl_member_bank_account SET assign_bank='$assign_bank' WHERE  bank_id='$bid' ";
//echo "==========";exit;

$upd = db_query("UPDATE tbl_member_bank_account SET assign_bank='$assign_bank' WHERE  bank_id='$bid' ",1);

$_SESSION['msgok']="Bank Update Successfully";
if($_GET['admin_view']=='1'){  $adm="admin_view=1";}
header("location:member-bank-account.php?client_id=$Client_ID&admin_view=1&$adm");exit;


}


if(($action=='delete') and ($_GET['client_id']<>"") and ($_GET['bid']<>"")){
$account_id=$_GET['client_id'];
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_member_bank_account SET bank_status='$key' where bank_id='$bid'");

$_SESSION['msgok']="Bank $key Successfully";
if($_GET['admin_view']=='1'){  $adm="admin_view=1";}
header("location:member-bank-account.php?client_id=$Client_ID&admin_view=1&$adm");exit;
}

if(($action=='edit') and ($_GET['client_id']<>"") and ($_GET['bid']<>"")){
$account_id=$_GET['client_id'];
$bid=$_GET['bid'];
$sel = db_rows("SELECT * FROM tbl_member_bank_account where bank_id='$bid'");
$assign_bank=$sel[0]['assign_bank'];


}else{
$assign_bank="";
}


include "header.php";
?>



