<?php
include "../../common.php";
include "config-stylopay.php";


if (isset($_REQUEST['uid']) && $_REQUEST['uid']) {
  $uid = $_REQUEST['uid'];
  $datatitle = $_REQUEST['datatitle'];
  $dataval = $_REQUEST['dataval'];
}

$urls = $baseurl . "/caas/api/v2/user/" . $uid;
$postbody = [
  "$datatitle" => $dataval
];
$postdata = json_encode($postbody);


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
  CURLOPT_CUSTOMREQUEST => 'PATCH',
  CURLOPT_POSTFIELDS => $postdata,
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
//echo $response;


$iban_data = json_decode($response, true);


if (isset($iban_data['status']) && $iban_data['status'] == "SUCCESS") {

  $datatitle = $data["stylopay"]["$datatitle"];
  $qr = "UPDATE `tbl_client_master` SET  $datatitle='$dataval' WHERE client_id ='" . $_SESSION["s_client_id"] . "'";
  $qrs = mysqli_query($con, $qr);
  if ($qrs) {
    $_SESSION['ses_pg_msg'] = "Data Updated with Status - : " . $iban_data['message'];
    echo 1;
    exit;
  }
} else {
  echo $_SESSION['ses_pg_msg'] = "Data Not Updated with Status - : " . $iban_data['message'];
  exit;
}
