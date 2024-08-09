<?php

use function PHPSTORM_META\type;

include('../common.php');
$str = $_REQUEST["str"];
parse_str($str, $output);

//print_r($output);
$sql_query = "";

if ($_REQUEST["view"] <> "all") {
    $sql_query .= " AND `transaction_status`='Success'";
}

// For Display Key Search

if (isset($output['key_name']) && $output['key_name'] && isset($output['searchkey']) && $output['searchkey']) {
    $sql_query .= " AND `" . $output['key_name'] . "` = '" . $output['searchkey'] . "'";
}

// For Display Transaction Status
if (isset($output['transaction_status']) && $output['transaction_status']) {
    $sql_query .= " AND `transaction_status` = '" . $output['transaction_status'] . "'";
}

// For Display Date Range
if ((isset($output['start_date']) <> "") and ($output['end_date'] <> "")) {
    $startdate = $output['start_date'];
    $enddate = $output['end_date'];
    $enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
    $sql_query .= " AND `transaction_date` >= '" . $startdate . "' AND  `transaction_date` <= '" . $enddate . "' ";
}

// For Display sorting Order
if ((isset($output['order']) && $output['order'] <> "") && (($output['otype']) && $output['otype'] <> "")) {
    $tblorder = "ORDER BY `" . $output['order'] . "` " . $output['otype'];
} else {
    $tblorder = "ORDER BY `transaction_id` DESC";
}


$sql = db_rows("SELECT * FROM `tbl_master_trans_table` WHERE 1 " . $sql_query . " " . $tblorder . " ", 0);

$nor = $db_counts;
$title = "Statement :: Total Records : " . $nor;
$data_export = "" . $title . "\n\n";

$data_export .= "TransID \tUser \tBeneficiary \tCurrencies \tAmount \tTimestamp \tTransType \tTrans Purpose \tStatus \tSettlementDate\t" . "\n";


foreach ($sql as $key => $rs) {
    if ($rs['transaction_status'] == "Success") {
        $SettlementDate = date("Y-m-d", strtotime($rs['admin_transaction_date']));
    } else {
        $SettlementDate = "-";
    }

    $member_info = member_details($rs['member_id'], "full_name,owner_type,company_name");
    $data_export .= $rs['transaction_id'] . "\t";
    $data_export .= "\t" . $member_info['owner_type'] == 'Corporate' ? $member_info['company_name'] : $member_info['full_name'] . "\t" . $rs['usr_name'] . "\t" . $rs['converted_transaction_currency'] . "\t" . ($rs['transaction_type'] == 'Debit' ? '-' : '') . $rs['converted_transaction_amount'] . "\t" . date('Y-m-d', strtotime($rs['transaction_date'])) . "\t" . $rs['transaction_type'] . "\t" . (($rs['transaction_purpose'] || trim($rs['transaction_purpose']) || trim($rs['usr_descricption'])) ? ($rs['transaction_purpose'] ? trim($rs['transaction_purpose']) : trim($rs['usr_descricption'])) : get_transfer_reason($rs['trasnfer_reason'])) . "\t" . $rs['transaction_status'] . "\t" . $SettlementDate . "\n";
}

//echo $html;exit;


$filename = "Account_Statement_" . date("dmyHis") . ".xls";

header("Content-type: application/vnd.ms-excel; name='excel'");
//header("Content-Disposition: attachment; filename=statement.xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

// output data
echo $header . "\n" . $data_export;
