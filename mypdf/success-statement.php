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


$css_path = $data['Host'] . "/mypdf/bootstrap.min.css";

// fetch Client details
$row = db_rows("SELECT full_name,status,company_name,activation_date FROM  `tbl_client_master` WHERE `client_id`='$bid' LIMIT 0,1");
$row = $row[0];

// fetch Client details assign_currency,assign_account
$iban = db_rows("SELECT `accountid`,`accountNumber`,`currency` FROM `tbl_iban_issuer_account_details` WHERE `client_id`='$bid' AND `IBAN_issuer`='" . $_SESSION['default_IBAN_issuer'] . "' LIMIT 0,1");
$iban = $iban[0];



$sql = db_rows("SELECT * FROM  `tbl_master_trans_table` WHERE 1 " . $sql_query . " ORDER BY `admin_transaction_date` DESC");

$nor = $db_counts;

$title = "Account Statement of " . $_REQUEST['bid'] . " Total Records : " . $nor;

$html = '<html lang="en"><style>html { margin: 20px}</style>';

$html .= '<head><link href="' . $css_path . '" rel="stylesheet" type="text/css" /></head>';

$html .= '
<style>
  @page {
    size: A4 landscape; /* Set the page size to A4 and orientation to landscape */
    margin: 10mm; /* Adjust the margin as needed */
  }
  body, html {
    width: 297mm;
    height: 210mm;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .logo{
    width: 100% !important;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  table td {
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
    white-space: normal !important;
    max-width: 400px !important;
  }

</style>
<body style="background-color: #fff;">
  <div class="container my-2 p-2" >
    <header>
      <div class="logo" style="width: 100%; display: block;">
        <img src="' . $data['Host'] . '/images/BOF-LOGO.png" alt="BOFBank Logo" style="margin-bottom: 3em;">
        <div class="bank-info" style="float: right;">
          <h1>BOF Assets LTD</h1>
          <div class="bank-details">
              <p>Phone: +1(484)2918-722</p>
              <p>Email: info@bofbank.com</p>
              <p>Website: www.bofbank.com</p>
              <p>Address: robson street vancouver bc, Canada</p>
              <p>Postal: V6G 3B7</p>
          </div>
        </div>
      </div>
    </header>

    <h4>' . $title . '</h4>';

$html .= '
<table class="table">
  <tr>
    <td>Account No. : ' . $iban["accountNumber"] . ' </td>
    <td>Status : ' . $row["status"] . '</td>
  </tr>
  <tr>
    <td>Name. : ' . $row["full_name"] . '</td>
    <td>Company Name : ' . $row["company_name"] . '</td>
  </tr>
  <tr>
    <td>Assign Currency : ' . $iban["currency"] . '</td>
    <td>Activation Date : ' . date("d-m-Y", strtotime($row["activation_date"])) . '</td>
  </tr>
</table>';



$html .= '<table class="table table-centered table-nowrap">

                    <thead  class="bg-primary text-white">

                      <tr class="font-weight-bolder">

                        <th scope="col">Trans ID</th>

                        <th scope="col">Beneficiary</th>

                        <th scope="col">Bill Amt</th>

                        <th scope="col">Trans Type</th>

                        <th scope="col">Purpose / Description</th>

                        <th scope="col">Settlement Date</th>

                      </tr>

                    </thead>';

$balamt = 0.00;

foreach ($sql as $key => $rs) {
  if ($rs['transaction_type'] == "Credit") {
    $balamt = ($balamt + $rs['converted_transaction_amount']);
  } else {
    $balamt = ($balamt - $rs['converted_transaction_amount']);
  }

  $balamt = amount_format($balamt);

  $purpose = !empty($rs['transaction_purpose']) ? $rs['transaction_purpose'] : $rs['usr_descricption'];
  $html .= "
  <tr>
    <td>" . $rs['transaction_id'] . "</td>
    <td>" . $rs['usr_name'] . "</td>
    <td>" . $rs['transaction_currency'] . " " . $rs['transaction_amount'] . "</td>
    <td>" . $rs['transaction_type'] . "</td>
    <td>" . $purpose . "</td>
    <td>" . date("d-m-Y", strtotime($rs['admin_transaction_date'])) . "</td>
  </tr>";
}

$html .= '
      </table>
    </div>
  </body>
</html>';



//echo $html;exit;





$filename = "Account_Statement_of_" . $_REQUEST['bid'] . "_Total_Records_" . $nor . "_" . date("dmyHis");



// include autoloader

require_once 'dompdf/autoload.inc.php';



// reference the Dompdf namespace

use Dompdf\Dompdf;



// instantiate and use the dompdf class

$dompdf = new Dompdf();



$dompdf->loadHtml($html);



$dompdf->set_option('isRemoteEnabled', TRUE);

$dompdf->set_option('isHtml5ParserEnabled', true);



// (Optional) Setup the paper size and orientation

$dompdf->setPaper('A4', 'orientation');



// Render the HTML as PDF

$dompdf->render();



// Output the generated PDF to Browser

//$dompdf->stream($filename); // Download

$dompdf->stream($filename, array("Attachment" => 1));
