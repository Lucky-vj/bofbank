<?php
$data['PageName']='Transaction';
$data['PageFile']='transaction';
is_admin_session();


if(isset($_GET['mid'])&&$_GET['mid']<>""){ $mid=$_GET['mid'];}else{ echo "Wrong Url Please Go Back"; exit; }
if(isset($_GET['acurr'])&&$_GET['acurr']<>""){ $_SESSION['acurr']=$_GET['acurr'];}
$sqlqr=" AND member_id='$mid' AND status='SUCCESS'";


////// Total Trans Count
$totcnt=db_rows("SELECT COUNT(`transactionId`) AS `total_trans` FROM `tbl_master_trans_table_thekingdombank` WHERE 1 $sqlqr");
$no_of_transaction=$totcnt[0]['total_trans'];

////// Total Debit
$totdebit=db_rows("SELECT SUM(`transactionAmount`) AS `total_dtran` FROM `tbl_master_trans_table_thekingdombank` WHERE 1  $sqlqr "); //AND `transaction_type`='Debit'

$total_debit_trans=$totdebit[0]['total_dtran'];





////// Total Credit



$totcredit=db_rows("SELECT SUM(`transactionAmount`) AS `total_ctran` FROM `tbl_master_trans_table_thekingdombank` WHERE 1  $sqlqr "); //AND `transaction_type`='Credit'

$total_credit_trans=$totcredit[0]['total_ctran'];



include "header.php";

?>







