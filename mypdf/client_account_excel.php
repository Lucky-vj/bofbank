<?php
include('../common.php');

$sql = db_rows("SELECT * FROM `tbl_iban_issuer_account_details` WHERE `status` = 1");
$nor = $db_counts;

$iban_list = get_select_list("tbl_iban_issuer", "`ID`,`IBAN_issuer`", " AND ID<>3 ORDER BY `IBAN_issuer`");

$iban_list_new = [];
foreach ($iban_list as $item) {
    $iban_list_new[$item['ID']] = $item['IBAN_issuer'];
}

$title = "Client Accounts :: Total Records : " . $nor;

$data_temp = "" . $title . "\n\n";


$data_temp .= " Account Name \t IBAN \t Account Name \t Account Number \t Currency \t Available Balance " . "\n";

foreach ($sql as $key => $rs) {
    $member_details_temp = member_details($rs["client_id"], "username,full_name");
    $member_username_ = $member_details_temp["username"];
    $full_name_ = $member_details_temp["full_name"];

    if ($rs['IBAN_issuer'] == 3) {
        $bal = $rs['availableBalance'];
    } else {
        $bal = get_user_balance_amt($rs['client_id'], $rs['IBAN_issuer']);
    }
    $data_temp .= $full_name_ . "(" . $member_username_ . ")" . "\t" . $iban_list_new[$rs['IBAN_issuer']] . "\t" . $rs['accountName'] . "\t" . $rs['accountNumber'] . "\t" . $rs['currency'] . "\t" . $bal . "\t" . "\n";
}

$filename = "Client_Accounts_" . date("dmyHis") . ".xls";

header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

echo $header . "\n" . $data_temp;
