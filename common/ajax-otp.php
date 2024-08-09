<?php

include "../common.php";

if(isset($_REQUEST['mid'])&&$_REQUEST['mid']&isset($_REQUEST['otp_auth_access'])){

$mid=$_REQUEST['mid'];

$otp_auth_access=$_REQUEST['otp_auth_access'];

$update = db_query("UPDATE `tbl_client_master` SET `otp_auth_access`='$otp_auth_access' WHERE `client_id`='$mid'");

if($update){  $_SESSION['members']['otp_auth_access']=$otp_auth_access; echo 1; }else{echo "fail";}

}
?>