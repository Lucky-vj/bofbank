<?php
include "../../common.php";
include "config-stylopay.php";
//echo $baseurl.'/caas/api/v2/user/kyc/rfi/'.$_SESSION['ses_IBAN_userid'];exit;
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => $baseurl.'/caas/api/v2/user/kyc/rfi/'.$_SESSION['ses_IBAN_userid'],
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
echo $response;


?>