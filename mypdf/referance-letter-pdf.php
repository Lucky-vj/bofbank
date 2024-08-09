<?php
include('../common.php');
$title = "Reference Latter";
$clientID = $_SESSION["s_client_id"];
$logo_path = $data['reference_latter_logo']; // Define on common
$css_path = $data['Host'] . "/mypdf/bootstrap.min.css";
$stamp_path = $data['Host'] . "/images/Stamp.png"; // Ensure this path is correct

// From Client Details
$selacc = db_rows("SELECT * FROM  tbl_client_master WHERE client_id='$clientID'");
$rsacc = $selacc[0];
$company_name = $rsacc['company_name'];
$company_address = $rsacc['company_address'];
$company_registration_no = $rsacc['company_registration_no'];
$country_of_incorporation = $rsacc['country_of_incorporation'];
$assign_account = $_SESSION['iban-account']['accountid'];

$date = isset($rsacc['activation_date']) && $rsacc['activation_date'] ? date("F d, Y", strtotime($rsacc['activation_date'])) : date("F d, Y", strtotime($rsacc['add_date']));

if ($_GET['bid'] <> "") {
    $rsbid = $_GET['bid'];
} else {
    echo "Error in Data";
    exit;
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


// From Host Details

$selhost = db_rows("SELECT * FROM  tbl_host");

$host = $selhost[0];
$host_name = $host['host_name'];
$host_full_name = $host['host_full_name'];
$host_address = $host['host_address'];
$host_contact_no = $host['host_contact_no'];




// Fetch Referance Letter Format from Referance Table
$sel = db_rows("SELECT * FROM  tbl_referance_letter WHERE ref_id='1'");
$rs = $sel[0];
$message = $rs['referance_letter'];


// Replace Dynamic Data from Static Data
$message = str_replace(
    array("[ApproveDate]", "[CompanyName]", "[CompanyAddress]", "[CompanyCountry]", "[CompanyRegNo]", "[HostAssignAcc]", "[HostCompanyShort]", "[HostCompany]", "[HostCompanyAdd]", "[HostCompanyPhone]", "[account_beneficiary]", "[beneficiary_address]", "[bank_account_number]", "[bank_swift_code]", "[bank_name]", "[bank_address]", "###logo###", "[bank_supported_currency]"),

    array("$date", "$company_name", "$company_address", "$country_of_incorporation", "$company_registration_no", "$assign_account", "$host_name", "$host_full_name", "$host_address", "$host_contact_no", "$account_beneficiary", "$beneficiary_address", "$bank_account_number", "$bank_swift_code", "$bank_name", "$bank_address", "$logo_path", "$supported_currency"),
    $message
);

$html = '<html lang="en">';
$html .= '<head>';
$html .= '<link href="' . $css_path . '" rel="stylesheet" type="text/css" />';
$html .= '<style>';
$html .= 'html, body { margin: 0px; padding: 0px; font-size: 12px; font-family: Arial, sans-serif; }';
$html .= 'table { width: 100%; border-collapse: collapse; }';
$html .= 'td { padding: 5px; border: 1px solid #ddd; }';
$html .= '.footer { position: absolute; bottom: 0; width: 100%; text-align: center; }';
$html .= '</style>';
$html .= '</head>';
$html .= '<body style="background-color: #fff; margin: 0px; padding: 10px;">';
$html .= '<div class="container my-2 py-1">';
$html .= '<div style="padding-right: 10px;">' . $message . '</div>';
$html .= '<div class="footer">';
$html .= '<img src="' . $stamp_path . '" alt="Stamp" style="width: 100px; height: auto; margin-bottom: 30px; margin-left: 300px;" />';
$html .= '</div>';
$html .= '</div></body></html>';



$filename = "referance_letter_" . "$bank_name" . date("s");



// include autoloader

require_once 'dompdf/autoload.inc.php';



// reference the Dompdf namespace

use Dompdf\Dompdf;



// instantiate and use the dompdf class

$dompdf = new Dompdf();



$dompdf->loadHtml($html);



$dompdf->set_option('isRemoteEnabled', TRUE);

//$dompdf->set_option('isHtml5ParserEnabled', true);



// (Optional) Setup the paper size and orientation

$dompdf->setPaper('A4', 'portrait');




// Render the HTML as PDF

$dompdf->render();



// Output the generated PDF to Browser


$dompdf->stream($filename, array("Attachment" => 1));
