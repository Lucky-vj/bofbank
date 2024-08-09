<?php

$data['PageName']='Reset password';
$data['PageFile']='reset-password-request';
$data['noheader']=1;


if(isset($_POST['forgot']) and ($_POST['forgot']=='recover')){
$recovery_username=$_POST['recovery_username'];

//=====================================Match Query =================

$query = "SELECT admin_id, admin_username, admin_full_name, admin_email FROM tbl_admin WHERE admin_username = '$recovery_username'";

$result = db_rows($query);

if($db_counts==1){


$row = $result[0];
$admin_id=$row['admin_id'];
$username=$row['admin_username'];
$full_name=$row['admin_full_name'];
$email=$row['admin_email'];
}else{

$_SESSION['message-error']="Username Not Matched with our Record. Please Check and Try Correct";
header('Location:reset-password-request.php');exit;
}

$encryptionvalue=encryption_value($admin_id);
$encryptionusername=encryption_value($username);


$generate_pass="<a href='".$data['Admins']."/reset-password".$data['ex']."?verify=".$encryptionvalue."&utype=".$encryptionusername."' title='Reset password'>Reset password</a>";

//===================================================================

//////Mail Start/////// 

$template="RESTORE-PASSWORD";
$postvar['fullname']=$full_name;
//$postvar['sitename']="ITIO Bank";
$postvar['username']=$username;
$postvar['password']=$generate_pass;
$postvar['email']=$email;
sent_template_mail($template,$postvar);
//////Mail End///////

$_SESSION['message-success']="Your Account Detail sent your Registered Email ID.";
header('Location:reset-password-request.php');exit;
}

include "header.php";

?>







