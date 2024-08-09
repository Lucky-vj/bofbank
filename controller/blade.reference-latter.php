<?php

$data['PageName'] = 'Reference Letter';
$data['PageFile'] = 'reference-latter';
// Set Login / Not
is_member_session();
// Set Permission for Active or New Member
is_member_status();

$clientID = $_SESSION["s_client_id"];

// From Customer Details
$rsacc = get_member_details($clientID);
$company_name = $rsacc['company_name'];
$company_address = $rsacc['company_address'];
$company_registration_no = $rsacc['company_registration_no'];
$country_of_incorporation = $rsacc['country_of_incorporation'];
$city_of_incorporation = $rsacc['city_of_incorporation'];
$assign_account = $_SESSION['iban-account']['accountid'];
if (isset($rsacc['activation_date']) && $rsacc['activation_date']) {
    $date = date("F d, Y", strtotime($rsacc['activation_date']));
} else {
    $date = date("F d, Y", strtotime($rsacc['add_date']));
}


$selbid = db_rows("SELECT assign_bank FROM tbl_member_bank_account WHERE client_id='$clientID' AND bank_status='Active'");
$cntbank = $db_counts;
if ($cntbank > 1) {
    $fbid = "";
    foreach ($selbid as $key => $bankidx) {
        $fbid .= $bankidx['assign_bank'] . ',';
    }
    $fbid = substr($fbid, 0, -1);
    $rsbid = explode(',', $fbid)[0];
} else {

    $rsbid = $selbid[0];
    $rsbid = $rsbid['assign_bank'];
    $fbid = $rsbid;
}


if ($_SESSION['default_IBAN_issuer'] == 3) {
    $selbank = db_rows("SELECT * FROM tbl_iban_issuer_account_details WHERE client_id='$clientID' AND IBAN_issuer='" . $_SESSION['default_IBAN_issuer'] . "'");
    $bank = $selbank[0];
    $account_beneficiary = $bank['accountName'];
    if ($account_beneficiary == "") {
        $account_beneficiary = $company_name;
    }
    $bank_account_number = $bank['accountNumber'];
    $assign_account = $bank['accountNumber'];
    $bank_name = $bank['sponsorBankName'];

    $beneficiary_address = $rsacc['company_address'];
    $bank_address = $bank['bank_address'];
    $bank_swift_code = $bank['bank_swift_code'];
    $supported_currency = $bank['currency'];
} else {
    // From Common Bank Details
    if (isset($_GET['bid']) <> "") {
        $rsbid = $_GET['bid'];
    }
    $selbank = db_rows("SELECT * FROM  tbl_common_bank_account WHERE bank_id='$rsbid'");
    $bank = $selbank[0];
    $account_beneficiary = $bank['account_beneficiary'];
    $beneficiary_address = $bank['beneficiary_address'];
    $bank_name = $bank['bank_name'];
    $bank_address = $bank['bank_address'];
    $bank_swift_code = $bank['bank_swift_code'];
    $bank_account_number = $bank['bank_account_number'];
    $supported_currency = $bank['bank_supported_currency'];
}



// From Host Details Comes from common
$host_name = $_SESSION['domain_server']['host_name'];
$host_full_name = $_SESSION['domain_server']['host_full_name'];
$host_address = $_SESSION['domain_server']['host_address'];
$host_contact_no = $_SESSION['domain_server']['host_contact_no'];


// From Refrence Letter

$sel = db_rows("SELECT * FROM  tbl_referance_letter WHERE ref_id='1'");

$rs = $sel[0];
$message = $rs['referance_letter'];

$message = str_replace(
    array("[ApproveDate]", "[CompanyName]", "[CompanyAddress]", "[CompanyCountry]", "[CompanyCity]", "[CompanyRegNo]", "[HostAssignAcc]", "[HostCompanyShort]", "[HostCompany]", "[HostCompanyAdd]", "[HostCompanyPhone]", "[account_beneficiary]", "[beneficiary_address]", "[bank_account_number]", "[bank_swift_code]", "[bank_name]", "[bank_address]", "[bank_supported_currency]"),



    array("$date", "$company_name", "$company_address", "$country_of_incorporation", "$city_of_incorporation", "$company_registration_no", "$assign_account", "$host_name", "$host_full_name", "$host_address", "$host_contact_no", "$account_beneficiary", "$beneficiary_address", "$bank_account_number", "$bank_swift_code", "$bank_name", "$bank_address", "$supported_currency"),
    $message
);



include "header.php";
