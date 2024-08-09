<?php
include "../../common.php";
include "config-stylopay.php";

//$_SESSION['members']['mobile']
$memberid = $_SESSION['members']['client_id'];
$posturl = $baseurl . "/caas/api/v2/user";
$postbody = [
  "agentCode" => $agentCode,
  "subAgentCode" => $subAgentCode,
  "title" => $_SESSION['members']['title'],
  "firstName" => $_SESSION['members']['first_name'],
  "middleName" => "",
  "lastName" => $_SESSION['members']['last_name'],
  "gender" => $_SESSION['members']['gender'],
  "dateOfBirth" => $_SESSION['members']['birth_date'],
  "mobileCountryCode" => $_SESSION['members']['country_code'],
  "mobile" => $_SESSION['members']['mobile'],
  "nationality" => $_SESSION['members']['nationality'],
  "email" => $_SESSION['members']['email'],
  "idType" => $_SESSION['members']['doc_id_type'],
  "idNumber" => $_SESSION['members']['doc_id_number'],
  "idExpiry" => $_SESSION['members']['doc_id_exp_date'],
  "deliveryAddress1" => $_SESSION['members']['address_line1'],
  "deliveryAddress2" => $_SESSION['members']['address_line2'],
  "deliveryCity" => $_SESSION['members']['city'],
  "deliveryState" => $_SESSION['members']['state'],
  "deliveryCountry" => $_SESSION['members']['country_two_digit_code'],
  "deliveryZipCode" => $_SESSION['members']['pincode'],
  "billingAddress1" => $_SESSION['members']['address_line1'],
  "billingAddress2" => $_SESSION['members']['address_line2'],
  "billingCity" => $_SESSION['members']['city'],
  "billingState" => $_SESSION['members']['state'],
  "billingCountry" => $_SESSION['members']['country_two_digit_code'],
  "billingZipCode" => $_SESSION['members']['pincode']
];

$postdata = json_encode($postbody);



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
//echo $response;exit;
if (isset($response) && $response) {
  $data = json_decode($response, true);
  $message = $data['message'];
  $title = $data['title'];
  $status = $data['status'];
  $userid = $data['userid'];
  $activation_date = date("Y-m-d H:i:s");
  $_SESSION['reg-step'] = "5";
  $_SESSION['ses_pg_msg'] = "User Not Created Error with : " . $message . " & Title " . $title;
  if (isset($userid) && $userid) {

    $qrs = mysqli_query($con, "Insert INTO tbl_iban_issuer_account_details SET IBAN_userid='$userid',
															      IBAN_user_status='$status',
															      IBAN_issuer='2',
															      client_id='$memberid'") or die(mysqli_error($con));

    $upd = mysqli_query($con, "UPDATE tbl_client_master SET activation_date='$activation_date',
                            banned=0,
												   status='Active',
												   WHERE client_id='$memberid'") or die(mysqli_error($con));
    $_SESSION['s_status'] = "";

    if ($qrs) {

      $_SESSION['ses_pg_msg'] = "User Created Successfully. User ID : " . $userid;
    }
  } else {
    $_SESSION['reg-step'] = "1";
    $_SESSION['ses_pg_msg'] = "User Not Created Error with : " . $message;
  }

  //header("Location:../../profile");
  header("Location:profile");
}
