<?php

$data['PageName']='View Requests';
$data['PageFile']='view_requests';
is_admin_session();

if(isset($_REQUEST['otype'])&&$_REQUEST['otype']=="DESC"){ $otype="ASC";}else{$otype="DESC";}
if(isset($_REQUEST['pn'])&&$_REQUEST['pn']){ $pn=$_REQUEST['pn'];}else{$pn=1;}

////// Total Trans Count

$totcnt=db_rows("SELECT COUNT(`transaction_id`) as total_trans FROM tbl_master_trans_table where transaction_for in('Beneficiary Transfer','Quick Transfer') and transaction_status='Process'");

$no_of_transaction=$totcnt[0]['total_trans'];

////// Total Debit
$totam=db_rows("SELECT COUNT(`transaction_id`) as total_addmoney FROM tbl_master_trans_table where 1 and transaction_for='Add Money' and transaction_status='Process'");
$total_addmoney=$totam[0]['total_addmoney'];

////// Total Credit

$totrm=db_rows("SELECT COUNT(`transaction_id`) as total_requestmoney FROM tbl_master_trans_table where 1 and transaction_for='Request Money' and transaction_status='Process'");

$total_requestmoney=$totrm[0]['total_requestmoney'];
$totlacount=($no_of_transaction +  $total_addmoney + $total_requestmoney);


///////// For Listing with Searching and paging ///////////
$sql_query=" AND `transaction_status`='Process' AND `sender_transaction_id` IS NULL "; 
$requrl="";

if((isset($_GET['date_1st'])<>"") and ($_GET['date_2nd']<>"")){ 

$startdate=$_GET['date_1st'];
$enddate=$_GET['date_2nd'];
$enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));
$sql_query.=" AND transaction_date >= '".$startdate."' AND  transaction_date <= '".$enddate."' "; 
$requrl.="&start_date=".$startdate."&end_date=".$enddate;
}

if(isset($_GET['searchkey'])&&$_GET['searchkey']&&isset($_GET['key_name'])&&$_GET['key_name']){ 

$sql_query.=" and ".$data['searchkey'][$_GET['key_name']]." = '" .$_GET['searchkey']."'";
$requrl.="&key_name=".$data['searchkey'][$_GET['key_name']]."&searchkey=".$_GET['searchkey'];

}

if(isset($_GET['status']) and ($_GET['status']<>"") and ($_GET['status']<>"-1")){ 

$sql_query.=" AND transaction_status = '" .$_GET['status']."'";
$requrl.="&transaction_status=".$_GET['status'];

}

$tblname="tbl_master_trans_table";
$tblfieldid="transaction_id";

if((isset($_GET['order'])&&$_GET['order']<>"") && (($_GET['otype'])&&$_GET['otype']<>"")){ 
$tblorder="order by `".$_GET['order']."` ".$_GET['otype'];
$requrl.="&order=".$_GET['order']."&otype=".$_GET['otype'];

}else{
$tblorder="ORDER BY `transaction_id` DESC";
}

$pdfurl=urlencode($requrl);
include('pagination.php');

include "header.php";
?>