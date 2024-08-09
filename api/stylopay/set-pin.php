<?php
include "../../common.php";
include "config-stylopay.php";

$postbody= [
"pinBlock"=>$encpin
];

$postdata=json_encode($postbody);
$urls=$baseurl.'/caas/api/v2/card/pin/'.$_SESSION['ses_IBAN_userid'].'/'.$_SESSION['ses_IBAN_accountid']."/".$cardid;


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
  CURLOPT_POSTFIELDS =>$postdata,
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



if(isset($iban_data['message'])&&$iban_data['message']!="SUCCESS"){
$_SESSION['ses_pg_msg']="Set Pin Failed with Status - : ".$iban_data['message'];
}else{

	$qrs=mysqli_query($con,"UPDATE `tbl_iban_physical_card` SET   set_pin_status='".$iban_data['status']."'
																  WHERE cardid='$cardid'") or die(mysqli_error($con));
	if($qrs){
	$_SESSION['ses_pg_msg']=" Set Pin Successfully with Status - : ".$iban_data['message'];
	}
  }
header("Location:iban-create-physical-card.php");
}


