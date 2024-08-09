<?php
include "../../common.php";
include "config-pg.php";
$accountId=$_POST['accountId'];
if(isset($accountId)&&$accountId){}else{ exit; }
$urls=$baseurl.'/v1/accounts/'.$accountId;
  
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
  CURLOPT_POSTFIELDS =>$postdata,
  CURLOPT_HTTPHEADER => array(
    "X-Api-Key: $apikey",
    "X-Api-Secret: $apisecret",
	"Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;exit;
if(isset($response)&&$response){
$data=json_decode($response,1);
$currency=$data['currency'];
$availableBalance=$data['availableBalance'];


if(isset($availableBalance)&&$availableBalance){

$qrs=mysqli_query($con,"UPDATE tbl_iban_issuer_account_details SET currency='$currency',availableBalance='$availableBalance' WHERE accountId='$accountId'");

if($qrs){
$_SESSION['reg-step']=7;
echo "1";

}

}
exit;

}



?>