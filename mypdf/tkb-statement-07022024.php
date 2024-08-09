<?php
include('../common.php');
$accountId = decryption_value($_REQUEST["bid"]);
$css_path=$data['Host']."/mypdf/bootstrap.min.css";

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login']))
{
$Client_ID = $_SESSION["s_client_id"];
$row=db_rows("select full_name,status,company_name,assign_currency,assign_account,activation_date from  tbl_client_master where client_id='$Client_ID' limit 0,1");
$row=$row[0];
} else {
header("location:sign-in.php");exit;
}

$fbalance=get_select_list("tbl_iban_issuer_account_details","`currency`,`availableBalance`", " AND accountid='$accountId'");
$currency=$fbalance[0]['currency'];
$availableBalance=$fbalance[0]['availableBalance'];


$sql=db_rows("select * from  tbl_master_trans_table_thekingdombank where accountId='$accountId' order by `transactionId` DESC");
$nor=$db_counts;
$title="Account Statement of ".$accountId." Total Records : ".$nor;
$html='<html lang="en"><style>html { margin: 0px;font-size:12px;}</style>';
$html.='<head><link href="'.$css_path.'" rel="stylesheet" type="text/css" /></head>';
$html.='<body><div class="container my-2 p-2" ><h5>'.$title.'</h5>';
$html.='<table class="table"><tr><td>Account No. : '.$accountId.' </td><td>Name. : '.ucwords($row["full_name"]).'</td>
</tr><tr><td>Assign Currency : '.$currency.'</td><td>Balance : '.$availableBalance.'</td></tr></table><br/>
';
$html.='<table class="table table-striped table-nowrap">
                    <thead  class="bg-primary text-white">
                      <tr class="font-weight-bolder">
                        <th scope="col">Trans ID</th>
                        <th scope="col">Bill Amt</th>
						<th scope="col">Trans Amt</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Trans Response</th>
                        <th scope="col">Trans Status</th>
                        <th scope="col">Settelement Date</th>
                      </tr>
                    </thead>';
foreach($sql as $key=>$rs) {
$html.="<tr><td>".$rs['transactionId']."</td><td>".$rs['requestCurrency']." ".$rs['requestAmount']."</td><td>".$rs['transactionCurrency']." ".$rs['transactionAmount']."</td><td>".$rs['createdTime']."</td><td>".$rs['direction']."</td><td>".$rs['status']."</td><td>".date("d-m-Y H:i:s",strtotime($rs['lastStatusUpdateTime']))."</td></tr>";
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





