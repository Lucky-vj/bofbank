<?php
include "common.php";
include "controller/blade.transaction-details.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-size: 12px;
            /* Adjusted font size */
        }

        .container {
            width: 100%;
            max-width: 210mm;
            padding: 10mm;
            /* Adjusted padding */
            margin: auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            display: flex;
            flex-direction: column;
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
            text-align: left;
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
            flex: 1;
        }

        main h2 {
            text-align: center;
            margin-bottom: 10mm;
            font-size: 16px;
            /* Adjusted font size */
        }

        main table {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
        }

        main table th,
        main table td {
            padding: 9px;
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
            padding-top: 10mm;
            text-align: center;
            font-size: 10px;
            /* Adjusted font size */
            margin-top: auto;
        }

        footer p {
            margin: 2px 0;
            /* Adjusted margin */
        }

        .download-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="images/BOF-LOGO.png" alt="BOFBank Logo">
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
        <div class="subheader">
            <div class="date-place">
                <p>Date: <?php echo date("d/m/Y"); ?></p>
            </div>
            <div class="client-name">
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
            <p>BOFBank, robson street vancouver bc, Canada</p>
            <p>Phone: +1(484)2918-722 | www.bofbank.com</p>
        </footer>
        <a href="./mypdf/download_pdf.php?tid=<?= $rs['transaction_id']; ?>" class="download-btn">Download PDF</a>
    </div>
</body>

</html>