<?php
$data['PageName']='Reset password';
$data['PageFile']='reset-password-request';
$data['noheader']=1;

if(isset($_POST['forgot']) and ($_POST['forgot']=='recover')){

$recovery_username=$_POST['recovery_username'];
//=====================================Match Query =================

$query = "SELECT client_id, username, password, full_name, email FROM tbl_client_master WHERE username = '$recovery_username'";

$result = db_rows($query);

if($db_counts == 1){

$row = $result[0];

$client_id=$row['client_id'];
$username=$row['username'];
$password=$row['password'];
$full_name=$row['full_name'];
$email=$row['email'];

}else{

$_SESSION['message-error']="Username Not Matched with our Record. Please Check and Try Correct";

header('Location:reset-password-request.php');exit;

}

$encryptionvalue=encryption_value($client_id);
$encryptionusername=encryption_value(urlencode($recovery_username));

$generate_pass="<a href='".$data['Host']."/reset-password".$data['ex']."?verify=".$encryptionvalue."&utype=".$encryptionusername."' title='Reset password'>Reset password</a>";

//===================================================================

//////Mail Start/////// 
$template="RESTORE-PASSWORD";
$postvar['fullname']=$full_name;
$postvar['username']=$username;
$postvar['password']=$generate_pass;
$postvar['email']=$email;
sent_template_mail($template,$postvar);
//////Mail End///////

$_SESSION['message-success']="A reset password link has been sent to your registered Email ID";
header('Location:reset-password-request.php');exit;
}

include "header.php";

?>
