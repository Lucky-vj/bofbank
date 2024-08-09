<?php
include "../../common.php";
//include "config-pg.php";
$str=file_get_contents("php://input");
if(empty($str)){ echo "404 Error";exit; }

$obj = json_decode($str,1);
//print_r($obj);

$applicantId=$obj['applicantId'];
$insert=db_query("INSERT INTO callback SET callbackdata='$str',applicantId='$applicantId'",1);
$current_status=get_kyc_status($applicantId);
if(isset($applicantId)&&$applicantId&&($obj['reviewStatus']<>"init")&&($current_status<>"completed")){
$upd=db_query("UPDATE tbl_client_kyc SET  Kyc_status='".$obj['reviewStatus']."' WHERE applicantId='$applicantId'");
}


?>