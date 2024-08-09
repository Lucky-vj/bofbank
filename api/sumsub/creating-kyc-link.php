<?php
include "config-pg.php";
$externalUserId=unique_id(32);
$expiredtime="259200"; // Time Set for 3 Days
$kyclevel="basic-kyc-level"; //sumsub-signin-demo-level
$callurl='/resources/sdkIntegrations/levels/'.$kyclevel.'/websdkLink?ttlInSecs='.$expiredtime.'&externalUserId='.$externalUserId.'&lang=en';

$urls=$baseurl.$callurl;

$timestamp=time();
$method="POST";
//$email="vikashg@itio.in";

$email=$_SESSION["members"]["email"];
$IBAN_issuer=$_SESSION['default_IBAN_issuer'];



$postdata='{
             "email": "'.$email.'"
         }';


$string=$timestamp.$method.$callurl.$postdata;
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
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postdata,
  CURLOPT_HTTPHEADER => array(
    "X-App-Token: $apitoken",
	"X-App-Access-Ts: $timestamp",
    "X-App-Access-Sig: $signature",
	"Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

//echo $response;exit;
if(isset($response)&&$response){
$data=json_decode($response,true);
$url=$data['url'];
$activation_date=date("Y-m-d H:i:s");
$_SESSION['reg-step']="1";
$_SESSION['ses_pg_msg']="Kyc Link Not Generated : ";
$memberid=$_SESSION['members']['client_id'];
$IBAN_issuer=$_SESSION['default_IBAN_issuer'];
if(isset($url)&&$url){


	$qrs=mysqli_query($con,"Insert INTO tbl_client_kyc SET kyc_id='$externalUserId',
															      kyc_provider='sumsub',
																  kyc_levelName='basic-kyc-level',
																  kyc_link='$url',
															      Kyc_status='New',
																  IBAN_issuer='$IBAN_issuer',
															      client_id='$memberid'") or die(mysqli_error($con));
																  
												   
	if($qrs){
	$_SESSION['reg-step']="5";
	$_SESSION['ses_pg_msg']="Kyc Link Generated with KYC ID : ".$externalUserId;
	
	}
   
}else{

}

header("Location:account-summary.php");

}





?>