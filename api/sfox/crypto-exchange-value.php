<?php
include "config-api.php";
$urls=$baseurl."/v1/quote";
$method="POST";

//$pair;//"usdtusd";  
//$amount;exit;
$postdata='{
    "pair": "'.$pair.'",
    "side": "buy",
    "quantity": "'.$amount.'"
}';
  
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
  CURLOPT_CUSTOMREQUEST => $method,
  CURLOPT_POSTFIELDS =>$postdata,
  CURLOPT_HTTPHEADER => array(
    "Content-type: application/json",
	"Authorization: Bearer ".$apikey
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$cryptovalue=json_decode($response,1);



?>
 