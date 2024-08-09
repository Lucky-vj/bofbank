<?php
include "../common.php";
include "../controller/blade.transaction-details.php";
// require 'vendor/autoload.php';
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            /* Center content horizontally */
            align-items: center;
            /* Center content vertically */
            height: 100vh;
            /* Full viewport height */

            font-size: 12px;
            /* Adjusted font size */
        }

        .container {
            /* width: 100%; */
            width: 165mm;
            padding: 10mm;
            /* Adjusted padding */
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo img {
            width: 100px;
            /* Adjusted image size */
        }

        header .bank-info {
            text-align: right;
        }

        header .bank-info h1 {
            margin: 0;
            font-size: 16px;
            /* Adjusted font size */
        }

        header .bank-info p {
            margin: 2px 0;
            /* Adjusted margin */
            font-size: 10px;
            /* Adjusted font size */
        }

        .subheader {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 1em;
            border-bottom: 2px solid green;
            /* padding-bottom: 10px; */
        }

        .subheader .date-place,
        .subheader .client-name {
            font-size: 14px;
            /* Adjusted font size */
        }

        main {
            padding: 10mm 0;
            /* Adjusted padding */
        }

        main h2 {
            text-align: center;
            margin-bottom: 10mm;
            font-size: 16px;
            /* Adjusted font size */
        }

        main table {
            width: 100%;
            border-collapse: collapse;
        }

        main table th,
        main table td {
            padding: 8px;
            /* Adjusted padding */
            text-align: left;
            border-bottom: 1px solid green;
            /* Adjusted border */
            font-size: 12px;
            /* Adjusted font size */
        }

        main table th {
            background-color: #f2f2f2;
        }

        footer {
            border-top: 1px solid #000000;
            /* Adjusted border */
            padding-top: 10mm;
            text-align: center;
            font-size: 10px;
            /* Adjusted font size */
        }

        footer p {
            margin: 2px 0;
            /* Adjusted margin */
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="data:image/png;base64,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" alt="BOFBank Logo 2">
            </div>
            <div class="bank-info">
                <h1>BOF Assets LTD</h1>
                <div class="bank-details">
                    <p>Phone: +1(484)2918-722</p>
                    <p>Email: info@bofbank.com</p>
                    <p>Website: www.bofbank.com</p>
                    <p>Address: robson street vancouver bc, Canada</p>
                    <p>Postal: V6G 3B7</p>
                </div>
            </div>
        </header>
        <div>
            <div>
                <p>Date: <?php echo date("d/m/Y"); ?></p>
            </div>
            <div>
                <p style="font-weight: bold;"><?php echo member_details($rs['member_id'], "full_name")['full_name']; ?></p>
            </div>
        </div>
        <main>
            <h2>Transaction Details</h2>
            <table>
                <tr>
                    <th>Detail</th>
                    <th>Information</th>
                </tr>
                <tr>
                    <td>TransID</td>
                    <td><?= $rs['transaction_id']; ?></td>
                </tr>
                <tr>
                    <td>Timestamp</td>
                    <td><?= date('Y-m-d', strtotime($rs['transaction_date'])); ?></td>
                </tr>
                <tr>
                    <td>Bill Amount</td>
                    <td><?= $rs['transaction_amount'] . ' ' . $rs['transaction_currency']; ?></td>
                </tr>
                <tr>
                    <td>Trans Response</td>
                    <td><?= $rs['transaction_type'] . ' - ' . $rs['transaction_for']; ?></td>
                </tr>
                <tr>
                    <td>Beneficiary Name</td>
                    <td><?= $rs['usr_name']; ?></td>
                </tr>
                <tr>
                    <td>Beneficiary Address</td>
                    <td><?= $rs['usr_address']; ?></td>
                </tr>
                <tr>
                    <td>Account Number</td>
                    <td><?= $rs['transaction_ac_no']; ?></td>
                </tr>
                <tr>
                    <td>Swift Code</td>
                    <td><?= $rs['transaction_swift_code']; ?></td>
                </tr>
                <tr>
                    <td>Bank Name</td>
                    <td><?= $rs['transaction_bank_name']; ?></td>
                </tr>
                <tr>
                    <td>Bank Address</td>
                    <td><?= $rs['transaction_bank_address']; ?></td>
                </tr>
                <tr>
                    <td>Purpose / Description</td>
                    <td><?= !empty($rs['transaction_purpose']) ? $rs['transaction_purpose'] : $rs['usr_descricption']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?= $rs['transaction_status']; ?></td>
                </tr>
            </table>
        </main>
        <footer>
            <p>BOFBank, Address: robson street vancouver bc, Canada</p>
            <p>Phone: +1(484)2918-722 | www.bofbank.com</p>
        </footer>
    </div>
</body>

</html>

<?php
$html = ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("transaction_receipt.pdf", array("Attachment" => 1));
?>