<?
ob_start();
session_start();
$username=$_SESSION["s_username"];

$text="Download the free Google Authenticator app :: https://support.google.com/accounts/answer/1066447?hl=en";
$key=$_REQUEST['key'];
$fileName = $_SESSION['host_name']."_".$username."_backup_code_2FA.txt";
header('Content-Encoding: UTF-8');
//header("Content-type: application/x-ms-download"); //#-- build header to download the word file 
header('Content-Disposition: attachment; filename='.$fileName);
echo $text."\r\n\r\n".$key;
exit;
?>