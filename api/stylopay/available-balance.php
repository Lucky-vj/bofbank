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
  CURLOPT_CUSTOMREQUEST => 'GET',
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
$iban_data=$iban_data[0];


$_SESSION['reg-step']="7";
if(!$iban_data['accountid']){
$_SESSION['pmsg']=$_SESSION['ses_pg_msg']="Balance Not Found : ".$iban_data['message'];
$_SESSION['S_Balance_status']=$iban_data['message'];
}else{

$accountid=$iban_data['accountid'];
$routingNumber=$iban_data['routingNumber'];
$createdAt=$iban_data['createdAt'];
$fees=$iban_data['fees'];
$sponsorBankName=$iban_data['sponsorBankName'];
$interest=$iban_data['interest'];
$currency=$iban_data['currency'];
$accountNumber=$iban_data['accountNumber'];
$type=$iban_data['type'];
$availableBalance=$iban_data['availableBalance'];
$status=$iban_data['status'];
$memberid=$_SESSION['members']['client_id'];


	$qrs=mysqli_query($con,$ss="UPDATE tbl_iban_issuer_account_details SET routingNumber='$routingNumber',
															      createdAt='$createdAt',
																  fees='$fees',
																  sponsorBankName='$sponsorBankName',
																  interest='$interest',
																  currency='$currency', 
																  accountNumber='$accountNumber',
																  type='$type',
																  availableBalance='$availableBalance',
																  accountid='$accountid',
															      Balance_Status='$status' WHERE client_id='$memberid'",1);
																  
																  //echo $ss;
																  //exit;
															      
	if($qrs){
	$_SESSION['pmsg']=$_SESSION['ses_pg_msg']="Balance Updated with Status - : ".$status;
	}
  }
if(isset($_GET['v'])&&$_GET['v']==1){
header("Location:../../profile.php");
}else{
header("Location:profile.php");
}
}


?>