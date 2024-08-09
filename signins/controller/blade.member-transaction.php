<?php

$data['PageName']='Transaction';

$data['PageFile']='transaction';

is_admin_session();


$sql="";
if(isset($_SESSION['admin_default_IBAN_issuer'])&&$_SESSION['admin_default_IBAN_issuer']){
$sql="AND `iban_id`='".$_SESSION['admin_default_IBAN_issuer']."'";
}


if(isset($_GET['mid'])&&$_GET['mid']<>""){ $mid=$_GET['mid'];}else{ echo "Wrong Url Please Go Back"; exit; }

if(isset($_GET['acurr'])&&$_GET['acurr']<>""){ $_SESSION['acurr']=$_GET['acurr'];}

$sqlqr=" AND member_id='$mid' AND transaction_status='Success'".$sql;



////// Total Trans Count

$totcnt=db_rows("SELECT COUNT(`transaction_id`) as total_trans FROM tbl_master_trans_table where 1 $sqlqr");

$no_of_transaction=$totcnt[0]['total_trans'];



////// Total Debit

$totdebit=db_rows("SELECT SUM(`converted_transaction_amount`) as total_dtran FROM tbl_master_trans_table where 1 and transaction_type='Debit' $sqlqr ");

$total_debit_trans=$totdebit[0]['total_dtran'];





////// Total Credit



$totcredit=db_rows("SELECT SUM(`converted_transaction_amount`) as total_ctran FROM tbl_master_trans_table where 1 and transaction_type='Credit' $sqlqr ");

$total_credit_trans=$totcredit[0]['total_ctran'];



include "header.php";

?>







