<?php
include "config-pg.php";
$urls=$baseurl.'/v1/payments';
$foreignTransactionId=password_generate(32);
//$notificationUrl="https://webhook.site/7057296b-5be0-4604-a45d-c2c4def3368e";
$notificationUrl=$data['Host']."/api/thekingdombank/callback";
$reference="ref".rand(100000,999999);
$firstName=$_SESSION["members"]["first_name"];
$lastName=$_SESSION["members"]["last_name"];
$email=$_SESSION["members"]["email"];
$successUrl=$data['Host']."/account-statement-tkb";
//$country="DEU";

$postdata='{
    "foreignTransactionId": "'.$foreignTransactionId.'",
    "amount": '.$amount.',
    "currency": "'.$currency.'",
    "notificationUrl": "'.$notificationUrl.'",
	"successUrl": "'.$successUrl.'",
    "accountId": '.$accountId.',
    "customer": {
        "firstName": "'.$firstName.'",
        "lastName": "'.$lastName.'",
		"email": "'.$email.'",
		"country": "'.$country.'"
    }
}';

$date=date('Y-m-d\TH:i:s\Z');
$member_id=$_SESSION["s_client_id"];
//echo "<pre style='color: red;font-weight: bold;'>" . $postdata . "</pre>"; 
$query=db_query("INSERT INTO tbl_master_trans_table_thekingdombank  SET foreignTransactionId='$foreignTransactionId',
                                                             member_id='$member_id',
															 accountId='$accountId',
															 requestAmount='$amount',
															 requestCurrency='$currency',
															 direction='Payment Request',
															 createdTime='$date',
															 lastStatusUpdateTime='$date',
															 notificationUrl='$notificationUrl'");
//echo "<pre style='color: red;font-weight: bold;'>" . $postdata . "</pre>"; 

$signature=signMessage($postdata, $signaturekey);

  
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
    "X-Api-Key: $apikey",
    "X-Api-Secret: $apisecret",
    "X-Signature: $signature",
    "X-Signature-Key-Id: $signaturekeyid",
	"Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;exit;

$rs=json_decode($response,1);

$update=db_query("UPDATE tbl_master_trans_table_thekingdombank SET externalTransactionId='".$rs['externalTransactionId']."',
                                                             status='PENDING',
															 requestId='".$rs['requestId']."'
															 WHERE foreignTransactionId='$foreignTransactionId'");
if($update){
//echo "Test11";
if(isset($rs['redirectUrl'])&&$rs['redirectUrl']){

$urls=$rs['redirectUrl'];
header("location:$urls");exit;
}else{
$_SESSION['ses_pg_msg']="Currency not support , Please try Again";
$urls="create-payment-request.php";
header("location:$urls");exit;
}


}
?>
