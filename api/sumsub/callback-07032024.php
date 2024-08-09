<?php
include "../../common.php";
//include "config-pg.php";
$str=file_get_contents("php://input");
if(empty($str)){ echo "404 Error";exit; }

$obj = json_decode($str,1);
//print_r($obj);

$applicantId=$obj['applicantId'];
$insert=db_query("INSERT INTO callback SET callbackdata='$str',applicantId='$applicantId'",1);

if(isset($applicantId)&&$applicantId&&$obj['reviewStatus']<>"init"){
$upd=db_query("UPDATE tbl_client_kyc SET  Kyc_status='".$obj['reviewStatus']."' WHERE applicantId='$applicantId'",1);
}


?>