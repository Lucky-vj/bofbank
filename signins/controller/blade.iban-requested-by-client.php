<?php
$data['PageName']='IBAN Requested by Client';
$data['PageFile']='iban-requested-by-client';
is_admin_session();


$sql_query=" ";

$tblname="tbl_iban_requested_by_client";

$tblfieldid="id";

$tblorder="order by `id` desc";

include('pagination.php');









include "header.php";

?>







