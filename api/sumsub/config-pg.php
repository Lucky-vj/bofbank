<?php
$getapidata=get_select_list("tbl_kyc_provider","`ApiKey`,`Odf1`,`Odf2`", " AND `ID`=3 LIMIT 1 ");

$baseurl = "https://api.sumsub.com";
if(isset($getapidata)&&$getapidata){

$apitoken=$getapidata[0]['ApiKey'];
$apisecret=$getapidata[0]['Odf1'];

}else{
//$apitoken="sbx:Vl9O8ip5iHnYjQJ2DqhQF5tG.780gb1jQ6zfXHT8O0Zmq3TYf1yzHbElu";
//$apisecret="t0pNPPMSa7QMKeYEQ3EK0HSDhuPilNvK";
}



function unique_id($chars) 
{
  $data = '1234567890abcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}


function generateSignature($string, $apisecret) {
    return hash_hmac('sha256', $string, $apisecret);
}

?>
