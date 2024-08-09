<?php
include "../../common.php";

if(isset($_POST['applicantId'])&&$_POST['applicantId']){
$applicantId=$_POST['applicantId'];
$qrs=mysqli_query($con,"UPDATE `tbl_client_kyc` SET `Admin_Kyc_status`=1,`Admin_Kyc_Timestamp`=now() WHERE `id`='$applicantId'");
if($qrs){ echo 1;exit; }
exit;
}

?>