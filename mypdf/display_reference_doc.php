<?php
include("../common.php");
is_admin_session();

$transaction_id = $_REQUEST["tid"] ?? '';

if ($transaction_id == '') {
    $_SESSION['msg'] = "Invalid Request";
    header("location:view_requests.php");
    exit;
}

$transactions = db_rows("SELECT * FROM tbl_master_trans_table WHERE transaction_id='$transaction_id'");

if (empty($transactions) || empty($transactions[0]['reference_doc'])) {
    $_SESSION['msg'] = "Invalid Request";
    header("location:view_requests.php");
    exit;
}

$transaction = $transactions[0];

$fileName = $transaction['reference_doc'];
$filePath = '/var/www/secure_uploads/reference_doc/' . $fileName;
// $filePath = 'C:\\BofBankDocUploads\\' . $fileName;

if (!file_exists($filePath)) {
    die("Error: File not found");
}

// Determine MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $filePath);
finfo_close($finfo);

// Set appropriate headers
header("Content-Type: $mimeType");
header("Content-Disposition: inline; filename=\"$fileName\"");
header("Content-Length: " . filesize($filePath));

// Output the file
readfile($filePath);
exit;
