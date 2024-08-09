<?php
include "../../common.php";
include "config-pg.php";
$applicantId=$_SESSION['applicantId'];

$vtype=$_REQUEST['vtype'];
$callurl='/resources/applicants/'.$applicantId.'/status';
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
  CURLOPT_CUSTOMREQUEST => $method,
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
//echo $response;
if(isset($response)&&$response){
$data=json_decode($response,1);
$reviewStatus=$data['reviewStatus'];

$memberid=$_SESSION['members']['client_id'];
if(isset($reviewStatus)&&$reviewStatus){

$qrs=mysqli_query($con,"UPDATE tbl_client_kyc SET Kyc_status='$reviewStatus' WHERE client_id='$memberid'");

if($qrs){
	if($vtype==1){ echo $reviewStatus;exit;} 
	?>
	<div class="my-2 text-center"><h2 class="text-denger fw-bold fs-4">KYC Status : <?=$reviewStatus;?></h2></div>
	<?
	}
}
exit;

}




?>