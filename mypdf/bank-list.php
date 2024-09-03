<?php

include('../common.php');

// Fetch all active clients
$getdetails = db_rows("SELECT * FROM `tbl_client_master` WHERE `status`='Active'");

// Initialize the Excel export content
$title = "Client Bank Accounts Statement :: Total Records : " . count($getdetails);
$data_export = "" . $title . "\n\n";
$data_export .= "ClientID\tClientName\tBankName\tAccountDetails\n";

// Iterate through each client
foreach ($getdetails as $detail) {
    $clientId = $detail['client_id'];

    // Fetch client bank account details
    $getclient = db_rows("SELECT * FROM `tbl_member_bank_account` WHERE `client_id`='$clientId'");

    if (!empty($getclient)) {
        foreach ($getclient as $clientAccount) {
            $assignBank = $clientAccount['assign_bank'];

            // Fetch bank details
            $getbank_list = db_rows("SELECT * FROM `tbl_common_bank_account` WHERE `bank_id`='$assignBank'");

            if (!empty($getbank_list)) {
                $bankName = $getbank_list[0]['bank_name'];
            } else {
                $bankName = "Unknown";
            }

            // Append client and bank details to export content
            $data_export .= $clientId . "\t";
            $data_export .= $detail['full_name'] . "\t";
            $data_export .= $bankName . "\t";
            $data_export .= json_encode($clientAccount) . "\n"; // Convert account details to JSON for better readability
        }
    }
}

// Set filename and headers for Excel download
$filename = "Client_Bank_Accounts_" . date("dmyHis") . ".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

// Output data
echo $data_export;
