<?php

//$result=get_select_list("tbl_iban_issuer","`ApiKey`,`Odf1`,`Odf2`,`Odf3`,`Base_URL`", " AND `ID`=3 LIMIT 1 ");

// For sandbox environment
//$baseurl = "https://api.sandbox.thekingdombank.com";
//$apikey="2s9kv88f1mgl0i5tr8o2kcksh3";
//$apisecret="4cjhmp1rmuaqv68mhosf6i4b0v";
//$signaturekey="tdhfnb74qimhg224ljt6qk9772";
//$signaturekeyid="cof831g1";

// For live environment
$baseurl = "https://api.thekingdombank.com";
$apikey="j429dhvnr6n0h1sr9s3roaor54";
$apisecret="0ipuan2sffd3fk15eq9miia0tu";
$signaturekey="foeqqgddlchhebhlqjaf8rsqlf";
$signaturekeyid="8m3g3i94";


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
