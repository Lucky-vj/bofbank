<?php

include('../common.php');
$css_path=$data['Host']."/mypdf/bootstrap.min.css";


$title="Account Statement of ".$_REQUEST['bid']." Total Records : ".$nor;

$html='<html lang="en"><style>html { margin: 20px}</style>';

$html.='<head><link href="'.$css_path.'" rel="stylesheet" type="text/css" /></head>';

$html.='<body style="background-color: #fff;"><div class="container my-2 p-2" ><h6>Amount to Add - '.$_SESSION['s_currency'].' '.$_SESSION['s_amount'].' - '.$_SESSION['s_sender_name'].'</h3>';
$html.='<p>Your Preferred Bank.</p>';

$clientID = $_SESSION["s_client_id"];
$selbid=db_rows("SELECT assign_bank FROM tbl_member_bank_account WHERE client_id='$clientID' and bank_status='Active' ");

foreach($selbid as $key=>$rsbid) {

$assign_banks=$rsbid['assign_bank'];
$selcurrdetail=db_rows("SELECT * FROM tbl_common_bank_account WHERE bank_id='$assign_banks' and  bank_supported_currency like '%".$_SESSION['s_currency']."%'");

if($db_counts==1){

$bankdetails=$selcurrdetail[0];

$html.='<div class="my-1 p-1 border border-2"><h6 class="card-header mt-0">'.$bankdetails["bank_name"].'</h5>';
$html.='<table class="table"><tr><td>Beneficiary Name : '.$bankdetails["account_beneficiary"].' </td></tr>';
$html.='<tr><td>Beneficiary Address : '.$bankdetails["beneficiary_address"].'</td></tr>';
$html.='<tr><td>IBAN / Bank Account Number : '.$bankdetails["bank_account_number"].'</td></tr>';
$html.='<tr><td>Swift Code / BIC : '.$bankdetails["bank_swift_code"].'</td></tr>';
$html.='<tr><td>Bank Name : '.$bankdetails["bank_name"].'</td></tr>';
$html.='<tr><td>Bank Address : '.$bankdetails["bank_address"].'</td></tr></table></div>';



}}



//echo $html;exit;





$filename = "Add_Money_Receipt_".date("dmyHis");



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

$dompdf->stream($filename,array("Attachment"=>1));





