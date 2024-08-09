<?php

include "config-pg.php";

$externalUserId=$_SESSION['externalUserId'];
$IBAN_issuer=$_SESSION['default_IBAN_issuer'];

$callurl='/resources/applicants/-;externalUserId='.$externalUserId.'/one';

$urls=$baseurl.$callurl;

$timestamp=time();
$method="GET";


$string=$timestamp.$method.$callurl;
$signature=generateSignature($string, $apisecret);

  
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $urls,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', 
  CURLOPT_CUSTOMREQUEST => 'GET',
  //CURLOPT_POSTFIELDS =>$postdata,
  CURLOPT_HTTPHEADER => array(
    "X-App-Token: $apitoken",
	"X-App-Access-Ts: $timestamp",
    "X-App-Access-Sig: $signature",
	"Content-Type: application/json"
  ),
));

$response = curl_exec($curl);


curl_close($curl);


if(isset($response)&&$response){
$data=json_decode($response,1);
$applicantId=$data['id'];
$kyc_levelName=$data['review']['levelName'];
$Kyc_status=$data['review']['reviewStatus'];

$memberid=$_SESSION['members']['client_id'];
if(isset($applicantId)&&$applicantId){

$qrs=mysqli_query($con,"UPDATE tbl_client_kyc SET applicantId='$applicantId',
                                                  kyc_levelName='$kyc_levelName',
												  Kyc_status='$Kyc_status' 
												  WHERE client_id='$memberid' AND IBAN_issuer='$IBAN_issuer'");

if($qrs){
header("Location:account-summary.php");exit;
}
}
exit;

}




?>