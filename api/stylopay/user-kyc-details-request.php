<?php
//include "../../common.php";
include "inc.php";

$userid="oacc9h4mp67-j8g9k2h0qb-fgfch4pkq8qlb6e6hmj";
echo $posturl = $baseurl."/caas/api/v2/user/kyc/details/oacc9h4mp67-j8g9k2h0qb-fgfch4pkq8qlb6e6hmj";
echo "<br>";


$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => $posturl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: "'.$apikey.'"',
    'x-client-id: "'.$clientid.'"',
    'x-program-id: "'.$programid.'"',
    'x-client-name: {businessname}',
    'x-request-id: UUID'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;




?>