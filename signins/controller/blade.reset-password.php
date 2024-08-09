<?php

$data['PageName']='Reset Password';
$data['PageFile']='reset-password';
$data['noheader']=1;
//print_r($_SESSION['members']);


if(isset($_REQUEST['admin_view'])&&$_REQUEST['admin_view']){ $admin_view=$_REQUEST['admin_view'];}else{ $admin_view="";}
if($admin_view<>1){
include "header.php";
}
?>



