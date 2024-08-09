<?php
include('../common.php');

$sql = db_rows("SELECT * FROM `tbl_client_master` WHERE `status` = 'Active' ORDER BY `client_id` DESC"); // active clients
// $sql = db_rows("SELECT * FROM `tbl_client_master` WHERE 1=1 ORDER BY `client_id` DESC"); // all clients
$nor = $db_counts;

$title = "Client Details :: Total Records : " . $nor;

$data_temp = "" . $title . "\n\n";

$data_temp .= " Client Name \t Username / Email \t Phone \t Country \t City \t Address \t Zip Code \t ID Provided \t Doc ID \t Account Type \t Company Name" . "\n";

foreach ($sql as $key => $rs) {
    $data_temp .= $rs['full_name'] . "\t" . $rs['username'] . "\t" . $rs['mobile'] . "\t" . $rs['country'] . "\t" . $rs['city'] . "\t" . $rs['address_line1'] . "\t" . $rs['pincode'] . "\t" . $rs['doc_id_type'] . "\t" . $rs['doc_id_number'] . "\t" . $rs['owner_type'] . "\t" . $rs['company_name'] . "\t" . "\n";
}

$filename = "Client_Details_" . date("dmyHis") . ".xls";

header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

echo $header . "\n" . $data_temp;
