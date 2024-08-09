<?php

include "common.php";

if($_REQUEST["memid"]){



 $memid = $_REQUEST["memid"];

$balamt=0.00;  

$sql=db_rows("select converted_transaction_currency,converted_transaction_amount,transaction_type from  tbl_master_trans_table where member_id='$memid' and transaction_status='Success' AND iban_id='".$_SESSION['default_IBAN_issuer']."' order by `transaction_id` asc");

foreach($sql as $key=>$rs) {

 

if($rs['transaction_type']=="Credit"){

$balamt=($balamt + $rs['converted_transaction_amount']);

}else{

$balamt=($balamt - $rs['converted_transaction_amount']);

}



$curr=$rs['converted_transaction_currency'];



}

$curr=isset($curr)&&$curr?$curr:'';

echo $balamt=$curr." ".amount_format($balamt);



}

?>

