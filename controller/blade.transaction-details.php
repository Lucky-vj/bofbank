<?php
$data['PageName']='Transaction Details';
$data['PageFile']='transaction-details';
$data['noheader']=1;

if(isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])){
$member_account_number = $_SESSION["s_client_id"];
} else {
header("location:sign-in.php");exit; 
}
$tid=$_GET['tid'];

if($_SESSION['default_IBAN_issuer']==3){
	
	$sel=db_rows("SELECT * FROM tbl_master_trans_table_thekingdombank WHERE transactionId='$tid' "); //and member_id='$member_account_number'
	$nor=$db_counts;
	if($nor==0){
	//header("location:member-transactions.php");
	echo  "Oops, Data Not Found";
	exit; 
	}
	$rs=$sel[0];
	
	if($rs['status']=="PENDING"){
	$mscclr="warning";
	}elseif($rs['status']=="SUCCESS"){
	$mscclr="success";
	}elseif($rs['status']=="FAILED"){
	$mscclr="danger";
	}else{
	$mscclr="secondary";
	}

}else{

    
	
	$sel=db_rows("SELECT * FROM `tbl_master_trans_table` WHERE `transaction_id`='$tid' AND `member_id`='$member_account_number' AND iban_id='".$_SESSION['default_IBAN_issuer']."'");
	$nor=$db_counts;
	if($nor==0){
	//header("location:member-transactions.php");
	echo  "Oops, Data Not Found";
	exit; 
	}
	$rs=$sel[0];
	
	if($rs['transaction_status']=="Process"){
	$mscclr="warning";
	}elseif($rs['transaction_status']=="Success"){
	$mscclr="success";
	}elseif($rs['transaction_status']=="Failed"){
	$mscclr="danger";
	}else{
	$mscclr="secondary";
	}

}

?>







