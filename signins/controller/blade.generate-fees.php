<?php
$data['PageName']='Generate Fees';
$data['PageFile']='generate-fees';
is_admin_session();

if(isset($_POST['btn_submit'])){

$sqlquery="";
$updqr="";

$month=$_POST['month'];
$year=$_POST['year'];

if($_POST['btn_submit']=="Generate Monthly Fee"){
$purpose="Monthly Fee for ".date("F",strtotime($month))." - ".$year;
$transaction_for="Monthly Fee";
$transdate=$year."-".$month."-01";
$sqlquery=" AND monthly_fee > 0 AND monthly_fee_last_month_generated <> '$transdate'";
$tramtvar="monthly_fee";
$updqr=" monthly_fee_last_month_generated='$transdate' ";

}else if($_POST['btn_submit']=="Generate Yearly Fee"){
$purpose="Yearly Fee for - ".$year;
$transaction_for="Yearly Fee";
$transdate=$year."-01-01";
$sqlquery=" and yearly_fee > 0 and yearly_fee_last_year_generated <> '$transdate'";
$tramtvar="yearly_fee";
$updqr=" yearly_fee_last_year_generated='$transdate' ";

}else if($_POST['btn_submit']=="One Time Setup Fee"){
$purpose="One Time Setup Fee";
$transaction_for="One Time Setup Fee";
$sqlquery=" and setup_fee_one_time > 0 and setup_fee_one_time_status='New' ";
$transdate=date("Y-m-d H:i:s");
$tramtvar="setup_fee_one_time";
$updqr=" setup_fee_one_time_status='Generated' ";
}





$sel=db_rows("select * from tbl_fee where 1 $sqlquery ");
$nor=$db_counts;
foreach($sel as $key=>$rs) {
$tranfee=$rs[$tramtvar];
$assign_currency=$rs['currency'];
$member_id=$rs['client_id'];



// Select Data for display inserted value
$qry = "SELECT * FROM tbl_admin_bank_account where 1";
$rs=db_rows($qry);
$rs=$rs[0];

$admin_bank_name=$rs['admin_bank_name'];
$admin_bank_account_number=$rs['admin_bank_account_number'];
$admin_bank_address=$rs['admin_bank_address'];
$admin_bank_swift_code=$rs['admin_bank_swift_code'];
$admin_bank_payment_reference=$rs['admin_bank_payment_reference'];
$admin_bank_supported_currency=$rs['admin_bank_supported_currency'];
$admin_account_beneficiary=$rs['admin_account_beneficiary'];
$admin_beneficiary_address=$rs['admin_beneficiary_address'];

$admin_approval_status="Added On ".date("d-m-Y H:i:s")." with IP : ".$_SERVER['REMOTE_ADDR']." By ".$_SESSION['ses_full_name'];
$admin_transaction_date=date("Y-m-d H:i:s");
$admin_transaction_desc="Auto Deduct Transaction Fee and Added on Admin Bank Account";




        db_query("insert into tbl_master_trans_table set transaction_amount='$tranfee',
                                                  transaction_currency='$assign_currency',
												  converted_transaction_currency='$assign_currency',
										          converted_transaction_amount='$tranfee',
												  transaction_bank_name='$admin_bank_name',
										          transaction_ac_no='$admin_bank_account_number',
										          transaction_swift_code='$admin_bank_swift_code',
										          transaction_bank_address='$admin_bank_address',
										          transaction_purpose='$purpose',
										          usr_name='$admin_account_beneficiary',
										          usr_address='$admin_beneficiary_address',
										          transaction_type='Debit',
										          transaction_for='$transaction_for',
										          member_id='$member_id',
												  transaction_status='Process',
										          transaction_date='$transdate'");
												   
												  /*admin_transaction_date='$admin_transaction_date',
										          admin_transaction_desc='$admin_transaction_desc',
										          admin_transaction_id='$admin_transaction_id',                                                  admin_approval_status='$admin_approval_status',*/
												  
			if($purpose){	
			$upd= db_query("update tbl_fee set $updqr where client_id='$member_id'");
			}
			
			}

$_SESSION['msgok']=$nor." ".$purpose." Generated";
header("location:generate-fees.php");exit;
}


include "header.php";
?>



