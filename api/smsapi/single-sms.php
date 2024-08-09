<?php

include "config-sms.php";

function sms_send($params, $token, $backup = false)
{

    static $content;

    if ($backup == true) {
        $url = 'https://api2.smsapi.com/sms.do';
    } else {
        $url = 'https://api.smsapi.com/sms.do';
    }

    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $params);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $token"
    ));

    $content = curl_exec($c);
    $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

    if ($http_status != 200 && $backup == false) {
        $backup = true;
        sms_send($params, $token, $backup);
    }

    curl_close($c);
    return $content;
}



$params = array(
    'to'            => '919555538740',               //destination number  
    'from'          => 'Test',                       //sendername made in https://ssl.smsapi.com/sms_settings/sendernames
    'message'       => 'Hi Mobile verify by BOF',    //message content
    'format'        => 'json',           
);

echo $response=sms_send($params, $token);exit;



$response='{
    "count": 1,
    "list": [
        {
            "id": "65C5F7D8346335AB238F2152",
            "points": 0.088,
            "number": "919555538740",
            "date_sent": 1707472856,
            "submitted_number": "919555538740",
            "status": "QUEUE",
            "error": null,
            "idx": null,
            "parts": 1
        }
    ]
}';
if(isset($response)&&$response){
$rs=json_decode($response,1);
$rs['list']=$rs['list'][0];
//print_r($rs);
echo "INSERT INTO `tbl_sms_gateway` SET `id`='".$rs['list']['id']."',
                                        `points`='".$rs['list']['points']."',
										`number`='".$rs['list']['number']."',
										`date_sent`='".$rs['list']['date_sent']."',
										`submitted_number`='".$rs['list']['submitted_number']."',
										`status`='".$rs['list']['status']."',
										`error`='".$rs['list']['error']."',
										`idx`='".$rs['list']['idx']."',
										`parts`='".$rs['list']['parts']."',
										`count`='".$rs['count']."'";
}

?>
