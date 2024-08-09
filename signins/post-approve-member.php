<?php

//ob_start();

//session_start();

include "../common.php";



$client_id = $_REQUEST["client_id"];

$memberfullname = $_REQUEST["memberfullname"];

$memberemail = $_REQUEST["memberemail"];



$company_name = $_REQUEST["company_name"];

$company_registration_no = $_REQUEST["company_registration_no"];

$date_of_incorporation = $_REQUEST["date_of_incorporation"];

$country_of_incorporation = $_REQUEST["country_of_incorporation"];

$city_of_incorporation = $_REQUEST["city_of_incorporation"];

$company_address = $_REQUEST["company_address"];





$assign_bank = $_REQUEST["assign_bank"];

$assign_currency = $_REQUEST["assign_currency"];

$assign_account = $_REQUEST["assign_account"];





$setup_fee_one_time = $_REQUEST["setup_fee_one_time"];

$monthly_fee = $_REQUEST["monthly_fee"];

$yearly_fee = $_REQUEST["yearly_fee"];

$credit_mdr_fee = $_REQUEST["credit_mdr_fee"];

$credit_min_fee = $_REQUEST["credit_min_fee"];

$debit_mdr_fee = $_REQUEST["debit_mdr_fee"];

$debit_min_fee = $_REQUEST["debit_min_fee"];



$inst = db_query("INSERT INTO tbl_member_bank_account SET client_id='$client_id', assign_bank='$assign_bank', bank_addedon=now()", 0);



$updatefee = db_query("INSERT INTO tbl_fee SET client_id='$client_id',

		                               setup_fee_one_time='$setup_fee_one_time',

					                   monthly_fee='$monthly_fee', 

									   yearly_fee='$yearly_fee', 

									   credit_mdr_fee='$credit_mdr_fee', 

									   credit_min_fee='$credit_min_fee',

									   debit_mdr_fee='$debit_mdr_fee',

									   currency='$assign_currency',

									   debit_min_fee='$debit_min_fee',addedon=now()", 0);



$updateacc = db_query("UPDATE tbl_client_master SET company_name='$company_name',

		                               company_address='$company_address',

					                   company_registration_no='$company_registration_no', 

									   date_of_incorporation='$date_of_incorporation', 

									   assign_account='$assign_account',

									   assign_currency='$assign_currency',

									   country_of_incorporation='$country_of_incorporation',

									   city_of_incorporation='$city_of_incorporation',

									   status='Active',activation_date=now() WHERE client_id='$client_id'", 0);



json_log_upd($client_id, 'client_master', 'update', 'client_id'); // update json log history									   

if ($updateacc) {

	//  Mail Function  //

	$template = "ACCOUNT-ACTIVATION";

	$postvar['fullname'] = $memberfullname;

	$postvar['sitename'] = "ITIO Bank";

	$postvar['email'] = $memberemail;

	sent_template_mail($template, $postvar);

	//  End Mail Function  //

	echo "1";
} else {

	echo "0";
}
