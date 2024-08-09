<?php
include "../../common.php";
include "config-stylopay.php";
$contactid=$_GET['cid'];
$urls=$baseurl.'/caas/api/v2/contact/'.$_SESSION['ses_IBAN_userid'].'/'.$_SESSION['ses_IBAN_accountid'].'/'.$contactid;


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
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    "x-api-key: $apikey",
    "x-client-id: $clientid",
    "x-program-id: $programid",
    "x-client-name: $clientname",
    "x-request-id: UUID"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;exit;

if(isset($response)&&$response){
$iban_data=json_decode($response,true);


if(isset($iban_data['status'])&&$iban_data['status']=="SUCCESS"){
$qrs=mysqli_query($con,"DELETE FROM `tbl_iban_beneficiary` WHERE beneficiary_contactid='$contactid'");
}

$_SESSION['ses_pg_msg']="Delete : ".$iban_data['status']." With Message - ".$iban_data['message'];
header("Location:../../iban-manage-beneficiary.php");
}




?>