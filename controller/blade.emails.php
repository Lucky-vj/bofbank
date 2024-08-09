<?php

$data['PageName']='My Email Addresses';
$data['PageFile']='emails';

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){
} else {
header("location:sign-in.php");    
}

// Fetch List of Emails
$data['emails']=get_email_details($_SESSION["s_client_id"], false, false);



if(isset($_GET['choice'])&&$_GET['choice'] && isset($_GET['deletebtn'])&&$_GET['deletebtn']&& isset($_GET['uid'])&&$_GET['uid']){

$result=delete_member_email($_GET['uid'],$_GET['choice']);
if($result){
$_SESSION['msg']="Email Delete Successfully";
header("location:emails.php");exit;
}else{
$_SESSION['msg']="Email Not Deleted";
header("location:emails.php");exit;
}

}


include "header.php";

?>







