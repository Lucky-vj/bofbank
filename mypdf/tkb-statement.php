<?php
include('../common.php');
$accountId = decryption_value($_REQUEST["bid"]);
$css_path=$data['Host']."/mypdf/bootstrap.min.css";

$str = $_REQUEST["str"];
parse_str($str, $output);

$sql_query=" AND accountId='$accountId' "; 

if(isset($output['key_name'])&&$output['key_name']&&isset($output['searchkey'])&&$output['searchkey']){ 
$sql_query.=" AND `".$output['key_name']."` = '" .$output['searchkey']."'";
}

if(isset($output['transaction_status'])&&$output['transaction_status']){ 
$sql_query.=" AND `status` = '" .$output['transaction_status']."'";
}

if((isset($output['start_date'])<>"") and ($output['end_date']<>"")){ 
$startdate=$output['start_date'];
$enddate=$output['end_date'];
$enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
$sql_query.=" AND `createdTime` >= '".$startdate."' AND  `createdTime` <= '".$enddate."' "; 
}

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login']))
{
$Client_ID = $_SESSION["s_client_id"];
$row=db_rows("SELECT full_name,status,company_name,assign_currency,assign_account,activation_date FROM `tbl_client_master` WHERE `client_id`='$Client_ID' LIMIT 0,1");
$row=$row[0];
} else {
header("location:sign-in.php");exit;
}

$fbalance=get_select_list("tbl_iban_issuer_account_details","`currency`,`availableBalance`", " AND accountid='$accountId'");
$currency=$fbalance[0]['currency'];
$availableBalance=$fbalance[0]['availableBalance'];


$sql=db_rows("SELECT * FROM `tbl_master_trans_table_thekingdombank` WHERE 1  $sql_query ORDER BY `transactionId` DESC");
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
                        <th scope="col">Settlement Date</th>
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


$dompdf->stream($filename,array("Attachment"=>1));
