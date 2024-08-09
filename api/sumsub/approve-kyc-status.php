<?php
include "../../common.php";

if(isset($_POST['applicantId'])&&$_POST['applicantId']){
$applicantId=$_POST['applicantId'];
$qrs=mysqli_query($con,"UPDATE `tbl_client_kyc` SET `Kyc_status`='completed' WHERE `id`='$applicantId'");
if($qrs){ echo 1;exit; }
exit;
}

?>