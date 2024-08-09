<?php
//include "../../common.php";
$rs=$_GET;
if($rs['MsgId'] && $rs['status_name'] ) {
echo "UPDATE `tbl_sms_gateway` SET  `status`='".$rs['status_name']."' WHERE `id`='".$rs['MsgId']."'";
}

?>