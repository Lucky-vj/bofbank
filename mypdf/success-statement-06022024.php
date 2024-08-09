<?php
include('../common.php');

$bid = $_REQUEST["bid"];
$css_path=$data['Host']."/mypdf/bootstrap.min.css";
$row=db_rows("select full_name,status,company_name,assign_currency,assign_account,activation_date from  tbl_client_master where client_id='$bid' limit 0,1");
$row=$row[0];

$sql=db_rows("select * from  tbl_master_trans_table where member_id='$bid' and transaction_status='Success' order by `admin_transaction_date` DESC");
$nor=$db_counts;
$title="Account Statement of ".$_REQUEST['bid']." Total Records : ".$nor;
$html='<html lang="en"><style>html { margin: 0px}</style>';
$html.='<head><link href="'.$css_path.'" rel="stylesheet" type="text/css" /></head>';
$html.='<body style="background-color: #fff;"><div class="container my-2 p-2" ><h3>'.$title.'</h3>';
$html.='<table class="table"><tr><td>Account No. : '.$row["assign_account"].' </td><td>Status : '.$row["status"].'</td></tr><tr><td>Name. : '.$row["full_name"].'</td><td>Company Name : '.$row["company_name"].'</td></tr><tr><td>Assign Currency : '.$row["assign_currency"].'</td><td>Activation Date : '.$row["activation_date"].'</td></tr></table>';



$html.='<table class="table table-centered table-nowrap">
                    <thead  class="bg-primary text-white">
                      <tr class="font-weight-bolder">
                        <th scope="col">Trans ID</th>
                        <th scope="col">Bill Amt</th>
						<th scope="col">Trans Amt</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Trans Type</th>
                        <th scope="col">Trans Status</th>
                        <th scope="col">Settelement Date</th>
                      </tr>
                    </thead>';
$balamt=0.00;

foreach($sql as $key=>$rs) {

if($rs['transaction_type']=="Credit"){
$balamt=($balamt + $rs['converted_transaction_amount']);
}else{
$balamt=($balamt - $rs['converted_transaction_amount']);
}
$balamt=amount_format($balamt);

$html.="<tr><td>".$rs['transaction_id']."</td><td>".$rs['transaction_currency']." ".$rs['transaction_amount']."</td><td>".$rs['converted_transaction_currency']." ".$rs['converted_transaction_amount']."</td><td>".$rs['available_balance']."</td><td>".$rs['transaction_type']."</td><td>".$rs['transaction_status']."</td><td>".date("d-m-Y H:i:s",strtotime($rs['admin_transaction_date']))."</td></tr>";
}


$html.='</table></div></body></html>';

//echo $html;exit;


$filename = "Account_Statement_of_".$_REQUEST['bid']."_Total_Records_".$nor."_".date("dmyHis");

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


