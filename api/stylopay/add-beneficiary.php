<?php
include "../../common.php";
include "config-stylopay.php";

$postbody= [
"name"=>$beneficiary_name,
"email"=>$beneficiary_email,
"mobile"=>$beneficiary_mobile
];

$postdata=json_encode($postbody);
//$baseurl.'/caas/api/v2/contact/'.$_SESSION['ses_IBAN_userid'].'/'.$_SESSION['ses_IBAN_accountid'];



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $baseurl.'/caas/api/v2/contact/'.$_SESSION['ses_IBAN_userid'].'/'.$_SESSION['ses_IBAN_accountid'],
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
echo $response;

if(isset($response)&&$response){
$iban_data=json_decode($response,true);



if(!$iban_data['contactid']){
$_SESSION['ses_pg_msg']="Beneficiary Not Added : ".$iban_data['message'];
}else{

$memberid = $_SESSION["s_client_id"];
$IBAN_userid = $_SESSION['ses_IBAN_userid'];
$IBAN_accountid = $_SESSION['ses_IBAN_accountid'];
$beneficiary_contactid=$iban_data['contactid'];
$beneficiary_message=$iban_data['message'];
$beneficiary_status=$iban_data['status'];


	$qrs=mysqli_query($con,"INSERT INTO tbl_iban_beneficiary SET beneficiary_contactid='$beneficiary_contactid',
	                                                              IBAN_userid='".$_SESSION['ses_IBAN_userid']."',
																  IBAN_accountid='".$_SESSION['ses_IBAN_accountid']."',
																  beneficiary_name='$beneficiary_name',
																  beneficiary_email='$beneficiary_email',
																  beneficiary_mobile='$beneficiary_mobile',
															      beneficiary_status='$beneficiary_status',
																  beneficiary_message='$beneficiary_message'") or die(mysqli_error($con));
	if($qrs){
	$_SESSION['ses_pg_msg']=$beneficiary_name." Added with Status - : ".$beneficiary_status;
	}
  }
header("Location:iban-manage-beneficiary.php");
}




?>