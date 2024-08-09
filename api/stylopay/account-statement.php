<?php
include "../../common.php";
include "config-stylopay.php";

//$accountid="dgdsgdsfdhfdhgfjgfj";
$url=$baseurl.'/caas/api/v2/account/statement/'.$_SESSION['ses_IBAN_userid'].'/'.$_SESSION['ses_IBAN_accountid'];

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', //for 
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"offset":"1",
"limit":"20",
"startDate":"2023-07-01",
"endDate":"2024-01-01"

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
$data=json_decode($response,true);
$message=$data['message'];
$status=$data['status'];
$_SESSION['ses_pg_msg']="Account Statement Not Found Error with : ".$message;
header("Location:../../iban-account-statement.php");
}
?>