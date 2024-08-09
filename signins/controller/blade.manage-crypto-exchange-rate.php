<?php

$data['PageName']='Crypto Exchange Rate';

$data['PageFile']='crypto-exchange-rate';

is_admin_session();



$action="Add";

if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }

   



if(isset($_POST['btn_currency']) and ($_POST['btn_currency']=='Add')){



$currency_from = $_POST['currency_from'];

$currency_to = $_POST['currency_to'];

$exchange_value = $_POST['exchange_value'];




$ins = db_query("INSERT INTO tbl_crypto_exchange_rate SET currency_from='$currency_from',                                                       currency_to='$currency_to',
                                                       exchange_value='$exchange_value'");



$_SESSION['msgok']="Crypto Exchange Rate Added Successfully";

header("location:manage-crypto-exchange-rate.php");exit;

}







if(isset($_POST['btn_currency']) and ($_POST['btn_currency']=='Edit')){

 $bid = $_POST['bid'];
$currency_from = $_POST['currency_from'];
$currency_to = $_POST['currency_to'];
$exchange_value = $_POST['exchange_value'];

$upd = db_query("UPDATE tbl_crypto_exchange_rate SET  currency_from='$currency_from',
                                                   currency_to='$currency_to',
												   exchange_value='$exchange_value' 
                                                   WHERE  id='$bid' ");



$_SESSION['msgok']="Crypto Exchange Rate Update Successfully";

header("location:manage-crypto-exchange-rate.php");exit;





}





if(($action=='statusc') and ($_GET['bid']<>"")){

$bid=$_GET['bid'];

$key=$_GET['key'];

$del = db_query("UPDATE tbl_crypto_exchange_rate SET status='$key' where id='$bid'");

$_SESSION['msgok']="Crypto Exchange Rate $key Successfully";

header("location:manage-crypto-exchange-rate.php");exit;

}



if(($action=='edit') and ($_GET['bid']<>"")){

$bid=$_GET['bid'];





// Select Data for display inserted value

$qry = "SELECT * FROM tbl_crypto_exchange_rate where id='$bid'";

$rs=db_rows($qry);

$rs=$rs[0];



$currency_from=$rs['currency_from'];

$currency_to=$rs['currency_to'];

$exchange_value=$rs['exchange_value'];


}else{

$currency_from="";

$currency_to="";

$exchange_value="";


}



include "header.php";

?>







