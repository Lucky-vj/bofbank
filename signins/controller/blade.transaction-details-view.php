<?php
$data['PageName']='Transaction Details';
$data['PageFile']='transaction-details';
$data['noheader']=1;
is_admin_session();

//if($_SESSION["s_admin_id"]==""){ header("Location:sign-in.php");exit;}
	
	
$tid=$_GET['tid'];
$sel=db_rows("SELECT * FROM  tbl_master_trans_table WHERE transaction_id='$tid'");

$rs=$sel[0];

$member_id=$rs['member_id'];
                           if($rs['transaction_status']=="Process"){
						   $mscclr="warning";
						   }elseif($rs['transaction_status']=="Success"){
						   $mscclr="success";
						   }elseif($rs['transaction_status']=="Failed"){
						   $mscclr="danger";
						   }else{
						   $mscclr="secondary";
						   }
						   
// Fetch Currency From A/C Table

$selcur=db_rows("SELECT assign_currency FROM  tbl_client_master WHERE client_id='$member_id'");
$rscur=$selcur[0];
$assign_currency=$rscur['assign_currency'];


////////////////////////////////////

$selfee=db_rows("SELECT * FROM tbl_fee WHERE client_id='$member_id'");
$rsfee=$selfee[0];


$rs['transaction_type'];
if($rs['transaction_type']=="Credit"){
$mdr_fee=$rsfee['credit_mdr_fee'];
$min_fee=$rsfee['credit_min_fee'];
}elseif($rs['transaction_type']=="Debit"){
$mdr_fee=$rsfee['debit_mdr_fee'];
$min_fee=$rsfee['debit_min_fee'];
}else{
$mdr_fee="";
$min_fee="";
}
						   

//include "header.php";
?>



