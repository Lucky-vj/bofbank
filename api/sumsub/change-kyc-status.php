<?php
include "../../common.php";
include "config-pg.php";
$applicantId=$_POST['applicantId'];//exit;//"65aa210add871d62a227fdcb";

$callurl='/resources/applicants/'.$applicantId.'/status/testCompleted';
$urls=$baseurl.$callurl;

$timestamp=time();
$method="POST";

$postdata='{
   "reviewAnswer" : "GREEN",
   "rejectLabels": []
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
$data=json_decode($response,1);
$ok=$data['ok'];

$memberid=$_SESSION['members']['client_id'];
if(isset($ok)&&$ok==1){

$qrs=mysqli_query($con,"UPDATE tbl_client_kyc SET Kyc_status='completed' WHERE applicantId='$applicantId'");

if($qrs){
echo "1";

}

}
exit;

}

?>