<?php
include "../../common.php";
//include "config-pg.php";
$str=file_get_contents("php://input");

$obj = json_decode($str,1);
//print_r($obj);

$foreignTransactionId=$obj['foreignTransactionId'];
$insert=mysqli_query($con,"INSERT INTO callback SET callbackdata='$str',foreignTransactionId='$foreignTransactionId'");

if(isset($foreignTransactionId)&&$foreignTransactionId){

$ibanapi=get_select_list("tbl_master_trans_table_thekingdombank","`transactionId`,`status`", " AND foreignTransactionId='$foreignTransactionId'");
$transactionId=$ibanapi[0]['transactionId'];
echo $status=$ibanapi[0]['status'];

if(isset($status)&&(($status!="PROCESSED") || ($status==""))){


$upd=mysqli_query($con,"UPDATE tbl_master_trans_table_thekingdombank SET transactionId='".$obj['transactionId']."',
                                                                      transactionAmount='".$obj['transactionAmount']."', 
																	  transactionCurrency='".$obj['transactionCurrency']."',
																	  paidAmount='".$obj['paidAmount']."', 
																	  paidCurrency='".$obj['paidCurrency']."',
																	  paymentMethod='".$obj['paymentMethod']."',
																	  type='".$obj['type']."',
																	  requestId='".$obj['requestId']."',
																	  status='".$obj['status']."' 
																	  WHERE foreignTransactionId='$foreignTransactionId'");
																	  //echo "Done";
 }
}


?>