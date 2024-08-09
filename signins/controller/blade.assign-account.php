<?php
$data['PageName']='Member Bank Account';
$data['PageFile']='member-bank-account';
$data['noheader']=1;
is_admin_session();

$Client_ID=$_REQUEST['client_id'];
if(!isset($_SESSION["s_admin_id"])) {  header("sign-in.php");exit; }

if(isset($_POST['btn_update']) and ($_POST['btn_update']=='Update')){
$assign_account = $_POST['assign_account'];
$upd = db_query("UPDATE tbl_client_master SET assign_account='$assign_account' WHERE client_id='$Client_ID'");

json_log_upd($Client_ID,'client_master','update','client_id'); // update json log history      

$_SESSION['msg']="ok";
if($_GET['admin_view']=='1'){  $adm="admin_view=1";}
header("location:assign-account.php?client_id=$Client_ID&$adm");exit;
}

$query=db_rows("SELECT * FROM  tbl_client_master WHERE client_id= '$Client_ID'");
$assign_account=$query[0]['assign_account'];


include "header.php";
?>



