<?php

include('../common.php');
$str = $_REQUEST["str"];
parse_str($str, $output);

//print_r($output);
$sql_query="";

if($_REQUEST["view"]<>"all"){
$sql_query.=" AND `transaction_status`='Success'"; 
}

// For Display Key Search

if(isset($output['key_name'])&&$output['key_name']&&isset($output['searchkey'])&&$output['searchkey']){ 
$sql_query.=" AND `".$output['key_name']."` = '" .$output['searchkey']."'";
}

// For Display Transaction Status
if(isset($output['transaction_status'])&&$output['transaction_status']){ 
$sql_query.=" AND `transaction_status` = '" .$output['transaction_status']."'";
}

// For Display Date Range
if((isset($output['start_date'])<>"") and ($output['end_date']<>"")){ 
$startdate=$output['start_date'];
$enddate=$output['end_date'];
$enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
$sql_query.=" AND `transaction_date` >= '".$startdate."' AND  `transaction_date` <= '".$enddate."' "; 
}

// For Display sorting Order
if((isset($output['order'])&&$output['order']<>"") && (($output['otype'])&&$output['otype']<>"")){ 
$tblorder="ORDER BY `".$output['order']."` ".$output['otype'];
}else{
$tblorder="ORDER BY `transaction_id` DESC";
}

$css_path=$data['Host']."/mypdf/bootstrap.min.css";



$sql=db_rows("SELECT * FROM `tbl_master_trans_table` WHERE 1 ".$sql_query." ".$tblorder." ",0);//exit;
$nor=$db_counts;
$title="Statement :: Total Records : ".$nor;
$html='<html lang="en"><style>html { margin: 20px}</style>';
$html.='<head><link href="'.$css_path.'" rel="stylesheet" type="text/css" /></head>';
$html.='<body style="background-color: #fff;"><div class="container my-2 p-2" ><h3>'.$title.'</h3>';








$html.='<table class="table table-centered table-nowrap">

                    <thead  class="bg-primary text-white">

                      <tr class="font-weight-bolder">

                        <th scope="col">TransID</th>

                        <th scope="col">BillAmt</th>

						<th scope="col">TransAmt</th>

                        <th scope="col">Timestamp</th>

                        <th scope="col">TransType</th>

                        <th scope="col">Status</th>

                        <th scope="col">SettlementDate</th>

                      </tr>

                    </thead>';




foreach($sql as $key=>$rs) {

if($rs['transaction_status']=="Success"){
$SettlementDate=date("d-m-Y H:i:s",strtotime($rs['admin_transaction_date']));
}else{
$SettlementDate="-";
}


$html.="<tr><td>".$rs['transaction_id']."</td><td>".$rs['transaction_currency']." ".$rs['transaction_amount']."</td><td>".$rs['converted_transaction_currency']." ".$rs['converted_transaction_amount']."</td><td>".$rs['transaction_date']."</td><td>".$rs['transaction_type']."</td><td>".$rs['transaction_status']."</td><td>".$SettlementDate."</td></tr>";

}





$html.='</table></div></body></html>';



//echo $html;exit;





$filename = "Account_Statement_".date("dmyHis");



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





