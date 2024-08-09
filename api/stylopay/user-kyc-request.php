<?php
include "../../common.php";
include "config-stylopay.php";
//echo $_SESSION['ses_IBAN_userid'];
$webhook_url="https://webhook.site/5237d159-9a22-4c81-953b-5275c66370d9";



$memberid=$_SESSION['members']['client_id'];
$posturl = $baseurl."/caas/api/v2/user/kyc/rfi/".$_SESSION['ses_IBAN_userid'];

$ref="doc-".$_SESSION['members']['email']."-".date("dmY");
$addr=$_SESSION['members']['address_line1'].' '.$_SESSION['members']['address_line2'];
$issue_date="2023-04-10";//date("Y-m-d");
$dob_year = (date('Y') - date('Y',strtotime($_SESSION['members']['birth_date'])));


$postbody='{
    "reference"    : "'.$ref.'",
    "callback_url" : "'.$webhook_url.'",
    "email"        : "'.$_SESSION['members']['email'].'",
    "country"      : "'.$_SESSION['members']['country_two_digit_code'].'",
    "language"     : "EN",
    "verification_mode" : "any",
    "ttl"           : 60,
    "face": {
        "proof": ""
    },
    
    "document"         : {
        "proof"           : "",
        "additional_proof" : "",
        "supported_types" : ["id_card","driving_license","passport"],
        "name"             : {
             "first_name"   : "'.$_SESSION['members']['first_name'].'",
             "middle_name"  : "",
             "last_name"    : "'.$_SESSION['members']['last_name'].'"
        },
        "dob"             : "'.$_SESSION['members']['birth_date'].'",
        "age"             :  '.$dob_year.',
        "issue_date"      : "", 
        "expiry_date"     : "",
        "gender"        :  "'.$_SESSION['members']['gender'].'",
        "document_number" : "",
        "allow_offline"   : "1",
        "allow_online"    : "1"
    },
    
    "address"         : {
        "proof"            : "",
        "supported_types"  : ["id_card","bank_statement"],
        "name"             : {
             "first_name"   : "'.$_SESSION['members']['first_name'].'",
             "middle_name"  : "",
             "last_name"    : "'.$_SESSION['members']['last_name'].'"
        },
        "full_address"      : "'.$addr.'",
        "address_fuzzy_match":"1",
        "issue_date"        : "'.$issue_date.'"
    }
    
}';
//echo $postbody;
//exit;


$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => $posturl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postbody,
  CURLOPT_HTTPHEADER => array(
    "x-api-key: $apikey",
    "x-client-id: $clientid",
    "x-program-id: $programid",
    "x-client-name: $clientname",
    "x-request-id: UUID",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;exit;


if(isset($response)&&$response){
$data=json_decode($response,true);
$kycStatus=$data['kycStatus'];
$kycLink=$data['kycLink'];
$documentType=$data['documentType'];
$complianceStatus=$data['complianceStatus'];
$email=$data['email'];
$message=$data['message'];
$_SESSION['reg-step']="5";
$_SESSION['ses_pg_msg']="KYC Not Created Error with : ".$message;
$_SESSION['pmsg']="KYC Not Created Error with : ".$message;
if(isset($kycStatus)&&$kycStatus){

	$qrs=mysqli_query($con,"Insert INTO tbl_iban_issuer_account_details SET kycStatus='$kycStatus',
															      kycLink='$kycLink',
															      documentType='$documentType',
																  complianceStatus='$complianceStatus',
															      client_id='$memberid'") or die(mysqli_error($con));
	if($qrs){
	$_SESSION['ses_pg_msg']="KYC Created Successfully : ";
	$_SESSION['pmsg']="KYC Created Successfully : ";
	$_SESSION['reg-step']="5";
	
	}
   
}
header("Location:../../profile");
}



?>