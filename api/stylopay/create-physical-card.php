<?php
include "../../common.php";
include "config-stylopay.php";

$urls=$baseurl.'/caas/api/v2/card/physical/'.$_SESSION['ses_IBAN_userid'].'/'.$_SESSION['ses_IBAN_accountid'];





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



if(!$iban_data['cardid']){
$_SESSION['ses_pg_msg']="Physical Card Not Generated : ".$iban_data['message']."".$iban_data['error'];
}else{

$memberid = $_SESSION["s_client_id"];
$IBAN_userid = $_SESSION['ses_IBAN_userid'];
$IBAN_accountid = $_SESSION['ses_IBAN_accountid'];
$accountid=$iban_data['accountid'];
$cardid=$iban_data['cardid'];
$last4=$iban_data['last4'];
$currency=$iban_data['currency'];
$type=$iban_data['type'];
$cardStatus=$iban_data['cardStatus'];
$status=$iban_data['status'];
$message=$iban_data['message'];
$createdAt=$iban_data['createdAt'];

	$qrs=mysqli_query($con,"INSERT INTO tbl_iban_physical_card SET userid='$IBAN_userid',
																  accountid='$IBAN_accountid',
																  cardid='$cardid',
																  last4='$last4',
															      currency='$currency',
																  type='$type',
																  cardStatus='$cardStatus',
																  status='$status',
																  message='$message' ") or die(mysqli_error($con));
	if($qrs){
	$_SESSION['ses_pg_msg']=" Physical Card Generated with Status - : ".$beneficiary_status;
	}
  }
header("Location:../../iban-create-physical-card.php");
}




?>