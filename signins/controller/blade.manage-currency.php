<?php
$data['PageName']='Manage Currency';
$data['PageFile']='manage-currency';
is_admin_session();

$action="Add";
if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }
   

if(isset($_POST['btn_currency']) and ($_POST['btn_currency']=='Add')){

$currency_name = $_POST['currency_name'];
$currency_code = $_POST['currency_code'];
$currency_territory = $_POST['currency_territory'];
$currency_icon_bootstrap = $_POST['currency_icon_bootstrap'];

$ins = db_query("INSERT INTO tbl_currency SET currency_name='$currency_name',                                                       currency_code='$currency_code',
                                                       currency_icon_bootstrap='$currency_icon_bootstrap',
                                                       currency_territory='$currency_territory'");

$_SESSION['msgok']="Currency Added Successfully";
header("location:manage-currency.php");exit;
}



if(isset($_POST['btn_currency']) and ($_POST['btn_currency']=='Edit')){
 $bid = $_POST['bid'];
$currency_name = $_POST['currency_name'];
$currency_code = $_POST['currency_code'];
$currency_territory = $_POST['currency_territory'];
$currency_icon_bootstrap = $_POST['currency_icon_bootstrap'];

$upd = db_query("UPDATE tbl_currency SET  currency_name='$currency_name',
                                                   currency_code='$currency_code',
												   currency_icon_bootstrap='$currency_icon_bootstrap',
												   currency_territory='$currency_territory' 
                                                   WHERE  currency_id='$bid' ");

$_SESSION['msgok']="Currency Update Successfully";
header("location:manage-currency.php");exit;


}


if(($action=='statusc') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_currency SET currency_status='$key' where currency_id='$bid'");
$_SESSION['msgok']="Currency $key Successfully";
header("location:manage-currency.php");exit;
}

if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];


// Select Data for display inserted value
$qry = "SELECT * FROM tbl_currency where currency_id='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];

$currency_name=$rs['currency_name'];
$currency_code=$rs['currency_code'];
$currency_territory=$rs['currency_territory'];
$currency_icon_bootstrap=$rs['currency_icon_bootstrap'];
}else{
$currency_name="";
$currency_code="";
$currency_territory="";
$currency_icon_bootstrap="";
}

include "header.php";
?>



