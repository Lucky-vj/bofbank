<?php
// for send Mail from Site
use PHPMailer\PHPMailer\PHPMailer;
require 'common/mailer/src/PHPMailer.php';
require 'common/mailer/src/SMTP.php';
require 'common/mailer/src/Exception.php';

function sent_template_mail($template,$post){
global $data;

isset($post['fullname'])&&$post['fullname']?$fullname=$post['fullname']:'';
isset($post['amount'])&&$post['amount']?$amount=$post['amount']:'';
isset($post['otp'])&&$post['otp']?$otp=$post['otp']:'';
isset($post['username'])&&$post['username']?$username=$post['username']:'';
isset($post['password'])&&$post['password']?$password=$post['password']:'';
isset($post['email'])&&$post['email']?$email=$post['email']:'';
isset($_SESSION['host_name'])&&$_SESSION['host_name']?$sitename=$_SESSION['host_name']:'';
isset($amount)&&$amount?$amount=$amount:'';
isset($otp)&&$otp?$otp=$otp:'';
isset($post['transtype'])&&$post['transtype']?$transtype=$post['transtype']:'';
isset($post['status'])&&$post['status']?$status=$post['status']:'';
isset($post['msgdetails'])&&$post['msgdetails']?$msgdetails=$post['msgdetails']:'';
isset($post['scheduledate'])&&$post['scheduledate']?$scheduledate=$post['scheduledate']:'';
$seltemp = "SELECT template_subject,template_desc FROM tbl_email_template WHERE template_code = '$template'";
$temp = db_rows($seltemp);
$templ = $temp[0];
$subject = $templ['template_subject'];
$msg = $templ['template_desc'];

$subject=str_replace(array("[sitename]","[fullname]","[username]","[password]","[amount]","[otp]","[status]"), 
array("$sitename","$fullname","$username","$password","$amount","$otp","$status"), $subject);

$msg=str_replace(array("[sitename]","[fullname]","[username]","[password]","[amount]","[otp]","[status]","[transtype]","[scheduledate]","[msgdetails]"),
array("$sitename","$fullname","$username","$password","$amount","$otp","$status","$transtype","$scheduledate","$msgdetails"), $msg);



$mail = new PHPMailer;

$mail->isSMTP(); 
//$mail->Priority = 1; 
//$mail->SMTPDebug = 2;                                   // Set mailer to use SMTP
$mail->Host = $_SESSION['smtp_host'];                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                   // Enable SMTP authentication
$mail->Username = $_SESSION['smtp_username'];                 // SMTP username
$mail->Password = $_SESSION['smtp_password'];                 // SMTP password
$mail->SMTPSecure = 'tls';                                // Enable encryption, only 'tls' is accepted
$mail->Port = $_SESSION['smtp_port'];
$mail->IsHTML(true); 
$mail->From = 'info@bofbank.com';
$mail->FromName = 'BOF BANK';
$mail->addAddress($email,$fullname);                      // Add a recipient

$mail->WordWrap = 50;                                     // Set word wrap to 50 characters

$mail->Subject = $subject;
$mail->Body = $msg;
//send the message, check for errors
if (!$mail->send()) {

    //echo "ERROR: " . $mail->ErrorInfo;

} else {

    //echo "SUCCESS11";

}

unset($post);

return;





}







?>

