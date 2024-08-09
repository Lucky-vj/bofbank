<?php
include "../../common.php";
include "config-stylopay.php";

$urls=$baseurl.'/caas/api/v2/account/'.$_SESSION['ses_IBAN_userid'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $urls,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', //for 
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"label":"myaccount",
"type":"personalChecking"

}',
  CURLOPT_HTTPHEADER => array(
    "x-api-key: $apikey",
    "x-client-id: $clientid",
    "x-program-id: $programid",
    "x-client-name: $clientname",
    "x-request-id: UUID",
    "Content-Type: application/json;charset=UTF-8"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;exit;

if(isset($response)&&$response){
$iban_data=json_decode($response,true);
//$iban_data=$iban_data[0];
//echo $iban_data['accountid'];exit;
$_SESSION['reg-step']="6";

if(!$iban_data['accountid']){
$_SESSION['pmsg']=$_SESSION['ses_pg_msg']="Account Not Created : ".$iban_data['message'];
$_SESSION['S_Account_status']="KYC Pending";
}else{

$memberid = $_SESSION["s_client_id"];
$accountid=$iban_data['accountid'];
$message=$iban_data['message'];
$accountStatus=$iban_data['status'];


	$qrs=mysqli_query($con,"UPDATE tbl_iban_issuer_account_details SET accountid='$accountid',
															      accountStatus='$accountStatus'
																  WHERE client_id='$memberid'") or die(mysqli_error($con));
	if($qrs){
	$_SESSION['pmsg']=$_SESSION['ses_pg_msg']="Account Created with Status - : ".$accountStatus;
	}
  }
header("Location:profile.php");
}




?>