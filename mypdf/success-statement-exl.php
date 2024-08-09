<?php
include('../common.php');
$bid = $_REQUEST["bid"];
$str = $_REQUEST["str"];
parse_str($str, $output);
$sql_query = " AND `member_id`='$bid' AND `transaction_status`='Success' AND iban_id='" . $_SESSION['default_IBAN_issuer'] . "' ";
if (isset($output['key_name']) && $output['key_name'] && isset($output['searchkey']) && $output['searchkey']) {
    $sql_query .= " AND `" . $output['key_name'] . "` = '" . $output['searchkey'] . "'";
}
if ((isset($output['start_date']) <> "") and ($output['end_date'] <> "")) {
    $startdate = $output['start_date'];
    $enddate = $output['end_date'];
    $enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
    $sql_query .= " AND `transaction_date` >= '" . $startdate . "' AND  `transaction_date` <= '" . $enddate . "' ";
}
// fetch Client details
$row = db_rows("SELECT full_name,status,company_name,activation_date FROM  `tbl_client_master` WHERE `client_id`='$bid' LIMIT 0,1");
$row = $row[0];
// fetch Client details assign_currency,assign_account
$iban = db_rows("SELECT `accountid`,`accountNumber`,`currency` FROM `tbl_iban_issuer_account_details` WHERE `client_id`='$bid' AND `IBAN_issuer`='" . $_SESSION['default_IBAN_issuer'] . "' LIMIT 0,1");
$iban = $iban[0];
$sql = db_rows("SELECT * FROM  `tbl_master_trans_table` WHERE 1 " . $sql_query . " ORDER BY `admin_transaction_date` DESC");
$nor = $db_counts;
$exltitle = "Account Statement of " . $_REQUEST['bid'] . " Total Records : " . $nor;
$exlaccountNumber = "Account No. : " . $iban["accountNumber"];
$exlstatus = "Status : " . $row["status"];
$exlname = "Name : " . $row["full_name"];
$exlcompany_name = "Company Name : " . $row["company_name"];
$exlcurrency = "Assign Currency : " . $iban["currency"];
$exlactivation_date = "Activation Date : " . $row["activation_date"];
$data_export = "" . $title . "\n";
$data_export .= $exlaccountNumber . "\t" . $exlstatus . "\n";
$data_export .= $exlname . "\t" . $exlcompany_name . "\n";
$data_export .= $exlcurrency . "\t" . $exlactivation_date . "\n \r\n";

$data_export .= "Trans ID \t User \t Bill Amt \t Trans Amt \t Balance \t Trans Type \t Trans For \t Trans Status \t Settelement Date \t Description" . "\n";


$balamt = 0.00;

//print_r($sql);exit;

foreach ($sql as $key => $rs) {

    if ($rs['transaction_type'] == "Credit") {

        $balamt = ($balamt + $rs['converted_transaction_amount']);
    } else {

        $balamt = ($balamt - $rs['converted_transaction_amount']);
    }

    $balamt = amount_format($balamt);


    $data_export .= $rs['transaction_id'] . "\t" . $rs['usr_name'] . "\t" . $rs['transaction_currency'] . " " . $rs['transaction_amount'] . "\t" . $rs['converted_transaction_currency'] . " " . $rs['converted_transaction_amount'] . "\t" . $rs['available_balance'] . "\t" . $rs['transaction_type'] . "\t" . $rs['transaction_for'] . "\t" . $rs['transaction_status'] . "\t" . date("d-m-Y H:i:s", strtotime($rs['admin_transaction_date'])) . "\t" . (!empty($rs['transaction_purpose']) ? $rs['transaction_purpose'] : $rs['usr_descricption']) . "\n";
}




$filename = "Account_Statement_of_" . $_REQUEST['bid'] . "_Total_Records.xlsx";


header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=statement.xls");
// header('Content-Type: text/csv');
// header("Content-Disposition: attachment; filename=export.csv");
header("Pragma: no-cache");
header("Expires: 0");

// output data
echo $header . "\n" . $data_export;
