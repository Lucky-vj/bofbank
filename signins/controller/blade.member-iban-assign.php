<?php
$data['PageName']='Member IBAN Assign';
$data['PageFile']='member-iban-assign.php';
$data['noheader']=1;
is_admin_session();


$action="Add";

if(isset($_GET['client_id'])&&$_GET['client_id']<>""){ $Client_ID=$_GET['client_id']; }

if(isset($_GET['action'])&&$_GET['action']<>""){ $action=$_GET['action']; }

if(isset($_GET['bid'])&&$_GET['bid']<>""){ $bid=$_GET['bid']; }



if(isset($_POST['btn_update']) and ($_POST['btn_update']=='Add')){

$IBAN_issuer = $_POST['IBAN_issuer'];
//print_r($IBAN_issuer);
$IBAN_issuer =implode(",", $IBAN_issuer)."||".$_POST['IBAN_issuer_default'];
//echo $IBAN_issuer_default = $_POST['IBAN_issuer_default'];

$ins = db_query("UPDATE `tbl_client_master` SET IBAN_issuer='$IBAN_issuer'  WHERE client_id='$Client_ID'");

if($_GET['admin_view']=='1'){  $adm="admin_view=1";}



if($ins){

$_SESSION['msgok']="IBAN Assign Updated Successfully";

header("location:member-iban-assign.php?client_id=$Client_ID&admin_view=1&$adm");exit;

}else{

$_SESSION['msgfail']="IBAN Assign Not Updated";

header("location:member-iban-assign.php?client_id=$Client_ID&admin_view=1&$adm");exit;

}



}

include "header.php";

?>







