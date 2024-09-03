<?php
include('../common.php');

// Fetch all active clients
$getdetails = db_rows("SELECT * FROM `tbl_client_master` WHERE `status`='Active'");

// Initialize the HTML content for the PDF
$html = '<html lang="en"><head><style>
    table { width: 30%; border-collapse: collapse; }
    th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    th { background-color: #f2f2f2; }
</style></head><body>';
$title = "Client Bank Accounts Statement :: Total Records: " . count($getdetails);
$html .= "<h2>$title</h2>";
$html .= '<table>
    <thead>
        <tr>
            <th>ClientID</th>
            <th>ClientName</th>
            <th>BankName</th>
            <th>AccountDetails</th>
        </tr>
    </thead>
    <tbody>';

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

            // Append client and bank details to HTML content
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($clientId) . '</td>';
            $html .= '<td>' . htmlspecialchars($detail['full_name']) . '</td>';
            $html .= '<td>' . htmlspecialchars($bankName) . '</td>';
            $html .= '<td>' . htmlspecialchars(json_encode($clientAccount)) . '</td>'; 
            $html .= '</tr>';
        }
    }
}

$html .= '</tbody></table>';
$html .= '</body></html>';

// Generate and output the PDF using Dompdf
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Instantiate and use the Dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser for download
$filename = "Client_Bank_Accounts_" . date("dmyHis") . ".pdf";
$dompdf->stream($filename, array("Attachment" => 1)); // 'Attachment' => 1 forces download
