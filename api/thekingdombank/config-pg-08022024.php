<?php
$baseurl = "https://api.sandbox.thekingdombank.com";
$apikey="2s9kv88f1mgl0i5tr8o2kcksh3";
$apisecret="4cjhmp1rmuaqv68mhosf6i4b0v";
$signaturekey="tdhfnb74qimhg224ljt6qk9772";
$signaturekeyid="cof831g1";


function password_generate($chars) 
{
  $data = '1234567890abcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}


function getsignature($body, $signatureKey) {
        //$mac = hash_hmac("sha256", $body, $signatureKey, true); //
        //return base64_encode($mac);
		try {
        $hash = hash_hmac('sha256', $body, $signatureKey, true);
        return base64_encode($hash);
    } catch (Exception $e) {
        throw new Exception("Unable to sign body", $e);
    }
}

function signMessage($body, $signatureKey) {
    try {
        $mac = hash_hmac("sha256", $body, $signatureKey, true);
        $hash = base64_encode($mac);
        return $hash;
    } catch (Exception $e) {
        throw new Exception("Unable to sign body", 0, $e);
    }
}

?>
