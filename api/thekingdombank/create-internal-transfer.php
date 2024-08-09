<?php
include "config-pg.php";
$urls=$baseurl.'/v1/transfers/internal';
$foreignTransactionId=password_generate(32);
//$notificationUrl="https://webhook.site/7057296b-5be0-4604-a45d-c2c4def3368e";
$notificationUrl=$data['Host']."/api/thekingdombank/callback";



$postdata='{"accountId": '.$accountId.',
"foreignTransactionId": "'.$foreignTransactionId.'",
"amount": '.$amount.',
"currency": "'.$currency.'",
"destinationEmail": "'.$email.'",
"notificationUrl": "'.$notificationUrl.'"
}';
$member_id=$_SESSION["s_client_id"];
$query=db_query("INSERT INTO tbl_master_trans_table_thekingdombank  SET foreignTransactionId='$foreignTransactionId',
                                                             accountId='$accountId',
															 member_id='$member_id',
															 requestAmount='$amount',
															 requestCurrency='$currency',
															 notificationUrl='$notificationUrl'");
															 
				

//echo "<pre style='color: red;font-weight: bold;'>" . $postdata . "</pre>"; 
//exit;
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

if(isset($rs['transactionId'])&&$rs['transactionId']){

$update=db_query("UPDATE tbl_master_trans_table_thekingdombank SET transactionId='".$rs['transactionId']."',
                                                             status='".$rs['status']."',
															 createdTime='".$rs['createdTime']."',
															 lastStatusUpdateTime='".$rs['lastStatusUpdateTime']."',
															 transactionAmount='".$rs['transactionAmount']."',
															 transactionCurrency='".$rs['transactionCurrency']."',
															 direction='".$rs['direction']."',
															 type='".$rs['type']."',
															 category='".$rs['category']."',
															 paymentMethod='".$rs['paymentMethod']."',
															 requestId='".$rs['requestId']."',
															 isFee='".$rs['isFee']."'
															 WHERE foreignTransactionId='$foreignTransactionId'");
	if($update){
	$_SESSION['msg']=" Transaction Status - ".$rs['status']." With Transaction ID ".$rs['transactionId'];
	header("location:account-statement-tkb.php");exit;
	}
}else{

$update=db_query("UPDATE tbl_master_trans_table_thekingdombank SET transactionId='".$rs['traceId']."',
                                                             status='FAILED',
															 createdTime='".$rs['timestamp']."',
															 lastStatusUpdateTime='".$rs['timestamp']."',
															 category='".$rs['message']."',
															 paymentMethod='".$rs['message']."'
															 WHERE foreignTransactionId='$foreignTransactionId'");
$_SESSION['msg']=" Transaction Failed - ".$rs['message'];
header("location:account-statement-tkb.php");exit;
}

?>