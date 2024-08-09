<?php

$data['PageName']='profile';

$data['PageFile']='profile_view';

$data['noheader']=1;

is_admin_session();

$createdAt=date("Y-m-d");

// Set Default IBAN ID

$default_IBAN_issuer=1;


if(isset($_SESSION["s_admin_id"]) and ($_REQUEST['client_id']<>""))
{
		$Client_ID=$_REQUEST['client_id'];
        $query = "SELECT * FROM `tbl_client_master` WHERE `client_id` = $Client_ID";
		$rs=db_rows($query);
        $rs=$rs[0];
} else {
        header("location:sign-in.php");exit;
}

// for check Personal details Fields are Filled or Not
if(($rs['title']=="") || ($rs['first_name']=="") || ($rs['last_name']=="") || ($rs['country_code']=="") || ($rs['mobile']=="") || ($rs['email']=="") || ($rs['gender']=="") || ($rs['birth_date']=="")){
$personal_details_icon=$data['fwicon']['check-cross']." text-danger";
$personal_details=0;
}else{
$personal_details_icon=$data['fwicon']['tick-circle']." text-success";
$personal_details=1;
$_SESSION['reg-step']=2;
}

// for check Address details Fields are Filled or Not
if(($rs['address_line1']=="") || ($rs['address_line2']=="") || ($rs['city']=="") || ($rs['state']=="") || ($rs['pincode']=="") || ($rs['country']=="")){
$address_details_icon=$data['fwicon']['check-cross']." text-danger";
$address_details=0;
}else{
$address_details_icon=$data['fwicon']['tick-circle']." text-success";
$address_details=1;
$_SESSION['reg-step']=3;
}

// for check Company details Fields are Filled or Not
if($rs['owner_type']==""){
$company_details_icon=$data['fwicon']['check-cross']." text-danger";
$company_details=0;
}else{
$company_details_icon=$data['fwicon']['tick-circle']." text-success";
$company_details=1;
$_SESSION['reg-step']=4;

}

// for check Additional details Fields are Filled or Not
if(($rs['doc_id_type']=="") || ($rs['doc_id_number']=="") || ($rs['doc_id_exp_date']=="")){
$additional_details_icon=$data['fwicon']['check-cross']." text-danger";
$additional_details=0;
}else{
$additional_details_icon=$data['fwicon']['tick-circle']." text-success";
$additional_details=1;
$_SESSION['reg-step']=5;
}

// Check Blank section and open tab according it
if($personal_details==0){
$_SESSION['reg-step']=1;
}elseif($address_details==0){
$_SESSION['reg-step']=2;
}elseif($company_details==0){
$_SESSION['reg-step']=3;
}elseif($additional_details==0){
$_SESSION['reg-step']=4;
}else{}


// Fetch Data from Client KYC Table


$sql_query="SELECT * FROM `tbl_client_kyc` WHERE IBAN_issuer='$default_IBAN_issuer' AND `client_id`='$Client_ID' ";


$result = db_rows($sql_query);
$kyc_data = $result[0];
//print_r($kyc_data);
if(isset($kyc_data['applicantId'])&&$kyc_data['applicantId']){
$_SESSION['applicantId']=$kyc_data['applicantId'];
}
if(isset($kyc_data['Kyc_status'])&&$kyc_data['Kyc_status']){
$_SESSION['Kyc_status']=$kyc_data['Kyc_status'];
}
//exit;
// pre define default status
$IBAnUserDetails=$data['fwicon']['check-cross']." text-danger";
$IBAnKYC=$data['fwicon']['check-cross']." text-danger";
$IBAnAccountDetails=$data['fwicon']['check-cross']." text-danger";
$IBAnAccountBalance=$data['fwicon']['check-cross']." text-danger";


if((isset($personal_details)&&$personal_details==1) && (isset($address_details)&&$address_details==1) && (isset($additional_details)&&$additional_details==1) && (isset($company_details)&&$company_details==1) && $kyc_data['kyc_id']=="" && $_SESSION['reg-step']=="5" && $default_IBAN_issuer==1){


$qrs=mysqli_query($con,"Insert INTO tbl_client_kyc SET IBAN_issuer='$default_IBAN_issuer',
                                                       kyc_provider='No KYC',
													   kyc_id='No KYC',
													   kyc_levelName='No KYC',
													   Kyc_status='completed',
													   createdAt='$createdAt',
													   client_id='$Client_ID'") or die(mysqli_error($con));

$_SESSION['reg-step']=6;
header("location:profile_summary.php?client_id=$Client_ID&admin_view=1&vv33");exit;
}else{

if((isset($personal_details)&&$personal_details==1) && (isset($address_details)&&$address_details==1) && (isset($additional_details)&&$additional_details==1) && (isset($company_details)&&$company_details==1) && $kyc_data['kyc_id']=="" && $_SESSION['reg-step']=="5"){
$url="api/ekyc/creating-kyc-link.php";
include "$url";
header("Location:profile_summary.php?client_id=$Client_ID&admin_view=1&vv44");exit;
}

if((isset($personal_details)&&$personal_details==1) && (isset($address_details)&&$address_details==1) && (isset($additional_details)&&$additional_details==1) && (isset($company_details)&&$company_details==1) && $kyc_data['applicantId']=="" && $kyc_data['kyc_id']<>"" && $_SESSION['reg-step']=="5"){

$_SESSION['externalUserId']=$kyc_data['kyc_id'];

$qrs=mysqli_query($con,"UPDATE tbl_client_kyc SET applicantId='$Client_ID' WHERE client_id='$Client_ID'");
header("Location:profile_summary.php?client_id=$Client_ID&admin_view=1&vv55");exit;
												  
}

}


if(isset($kyc_data['Kyc_status'])&&$kyc_data['Kyc_status']=="completed"){

// for check Kyc Done or Not
$IBAnKYC=$data['fwicon']['tick-circle']." text-success";
$_SESSION['reg-step']=6;


$sql_query="SELECT * FROM `tbl_iban_issuer_account_details` WHERE `IBAN_issuer`='$default_IBAN_issuer' AND `client_id`='$Client_ID' "; 
$ibanacc = db_rows($sql_query);
$cnt=count($ibanacc);
if($cnt==0){

if(($default_IBAN_issuer==1) || ($default_IBAN_issuer==2)){

$acno=generate_account_number($Client_ID, $default_IBAN_issuer);
set_default_bank_account($Client_ID);
$insert=db_query("INSERT INTO `tbl_iban_issuer_account_details` SET `IBAN_issuer`='$default_IBAN_issuer',
                                                        `accountName`='".$rs['full_name']."',
                                                        `accountid`='$acno',
														`createdAt`='$createdAt',
														`currency`='USD', 
														`accountNumber`='$acno', 
														`availableBalance`='0.00',
														`client_id`='$Client_ID', 
														`accountStatus`='SUCCESS'");
$_SESSION['pmsg']="KYC Completed & Account Created";
$_SESSION['reg-step']=6;

}else{
$insert=db_query("INSERT INTO `tbl_iban_issuer_account_details` SET `IBAN_issuer`='".$default_IBAN_issuer."',
                                                        `client_id`='$Client_ID', 
														`accountStatus`='PENDING'");
$_SESSION['pmsg']="KYC Completed";
}
														


$_SESSION['reg-step']=6;
header("location:profile_summary.php?client_id=$Client_ID&admin_view=1&vv11");exit;

}elseif(($cnt==1)&&$ibanacc[0]['iban_order_status']==1){
if(($default_IBAN_issuer==1) || ($default_IBAN_issuer==2)){

	//$acno=assign_account_number($Client_ID, $default_IBAN_issuer);
	
	$acno=generate_account_number($Client_ID, $default_IBAN_issuer);
	set_default_bank_account($Client_ID);
	
$insert=db_query("UPDATE `tbl_iban_issuer_account_details` SET `accountName`='".$rs['full_name']."',
															   `accountid`='$acno',
															   `createdAt`='$createdAt',
															   `currency`='USD', 
															   `accountNumber`='$acno', 
															   `availableBalance`='0.00',
															   `accountStatus`='SUCCESS',`iban_order_status`=0 WHERE `client_id`='$Client_ID' AND  `IBAN_issuer`='".$default_IBAN_issuer."'");
	$_SESSION['pmsg']="KYC Completed & Account Created";
	$_SESSION['reg-step']=6;
	header("location:profile_summary.php?client_id=$Client_ID&admin_view=1&vv22");exit;
	
	}else{
	 if(($ibanacc[0]['Status']==0) && ($ibanacc[0]['accountStatus']=="SUCCESS")){
	  set_iban_status($Client_ID, $default_IBAN_issuer, 1);
	  $_SESSION['IBANDATA']['Status']=1;
	  }
	}
}else{

	  if(isset($rs['status'])&&$rs['status']=='New' && $ibanacc[0]['accountStatus']=="SUCCESS"){
	  $_SESSION['s_status']='Active';
	  $activation_date=date("Y-m-d H:i:s");
	  update_member_multi_fields($Client_ID," `status`='Active',`activation_date`='".$activation_date."' ");
	  $_SESSION["members"]["status"]='Active';
	  $_SESSION['reg-step']=1;
	  }
	  
	  if(($ibanacc[0]['Status']==0) && ($ibanacc[0]['accountStatus']=="SUCCESS")){
	  set_iban_status($Client_ID, $default_IBAN_issuer, 1);
	  $_SESSION['IBANDATA']['Status']=1;
	  }
	  
}


}

// for check Account No. Done or Not
if(isset($ibanacc[0]['accountStatus'])&&$ibanacc[0]['accountStatus']=="PENDING"){
$IBAnAccountDetails=$data['fwicon']['tick-circle']." text-warning";
}if(isset($ibanacc[0]['accountStatus'])&&$ibanacc[0]['accountStatus']=="SUCCESS"){
$IBAnAccountDetails=$data['fwicon']['tick-circle']." text-success";
$IBAnAccountBalance=$data['fwicon']['tick-circle']." text-success";
$_SESSION['reg-step']=1;
}else{

}

$country_list=get_select_list("tbl_country","`id`,`country`,`Country_Code`,`ISO_2_DIGIT`","");

include "header.php";

?>

