<?php



$data['PageName'] = 'Request Money';

$data['PageFile'] = 'request-money';



// Set Login / Not

is_member_session();

// Set Permission for Active or New Member

is_member_status();

// Set Permission for Access page by IBAN
member_page_access_permission(1);

$member_account_number = $_SESSION["s_client_id"];





if (isset($_GET['step']) == "") {
	$step = '1';
} else {
	$step = $_GET['step'];
}



$getcurrency = $_SESSION["s_assign_currency"];

$gcurrency = explode(',', $getcurrency);

//print_r($gcurrency);



if (isset($_POST['btn_submit']) == 'Submit') {

	$_SESSION['s_currency'] = $_POST['v_currency'];

	$_SESSION['s_amount'] = $_POST['v_amount'];

	$_SESSION['s_sender_name'] = $_POST['v_sender_name'];

	$_SESSION['s_sender_address'] = $_POST['v_sender_address'];

	$_SESSION['s_descricption'] = $_POST['v_descricption'];

	header("location:request-money.php?step=2");
	exit;
}



if (isset($_POST['btn_back']) == 'Back') {

	$_SESSION['s_currency'] = "";

	$_SESSION['s_amount'] = "";

	$_SESSION['s_sender_name'] = "";

	$_SESSION['s_sender_address'] = "";

	$_SESSION['s_descricption'] = "";

	header("location:request-money.php");
	exit;
}



if (isset($_POST['btn_request_money']) == 'Request Money') {

	$bankid = $_POST['bankid'];

	$s_currency = $_SESSION['s_currency'];

	$s_amount = $_SESSION['s_amount'];

	$s_sender_name = $_SESSION['s_sender_name'];

	$s_sender_address = $_SESSION['s_sender_address'];

	$s_descricption = $_SESSION['s_descricption'];



	$transaction_bank_name = $_POST['bank_name'];

	$transaction_ac_no = $_POST['bank_account_number'];

	$transaction_swift_code = $_POST['bank_swift_code'];

	$transaction_bank_address = $_POST['bank_address'];



	$insertdata = db_query("insert into tbl_master_trans_table set transaction_amount='$s_amount',

                                          transaction_currency='$s_currency',

										  transaction_bank_name='$transaction_bank_name',

										  transaction_ac_no='$transaction_ac_no',

										  transaction_swift_code='$transaction_swift_code',

										  transaction_bank_address='$transaction_bank_address',

										  transaction_bank_id='$bankid',

										  usr_name='$s_sender_name',

										  usr_address='$s_sender_address',

										  usr_descricption='$s_descricption',

										  transaction_type='Debit',

										  transaction_for='Request Money',

										  member_id='$member_account_number',

										  transaction_date=now()");



	$lastinsertid = newid();



	$_SESSION['s_currency'] = "";

	$_SESSION['s_amount'] = "";

	$_SESSION['s_sender_name'] = "";

	$_SESSION['s_sender_address'] = "";

	$_SESSION['s_descricption'] = "";

	$_SESSION['msg'] = "Request Money Added Successfully";





	$full_name = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];

	$email = "vikash@bigit.io";

	$username = $_SESSION["s_username"];



	if ($_SESSION["s_assign_account"] == "") {
		$accno = $_SESSION["s_client_id"];
	} else {
		$accno = $_SESSION["s_assign_account"];
	}









	$template = "REQUEST-MONEY";

	$postvar['fullname'] = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];

	$postvar['amount'] = $s_amount . " " . $s_currency;

	$postvar['sitename'] = "ITIO Bank";

	$postvar['email'] = "vikash@bigit.io";



	sent_template_mail($template, $postvar, $for_admin = true);


	// for responce Display

	$_SESSION['trans-responce']['transID'] = $lastinsertid;
	$_SESSION['trans-responce']['transAmount'] = $s_amount . " " . $s_currency;
	$_SESSION['trans-responce']['transStatus'] = "Process";

	header("location:member-transactions.php");
	exit;
}







include "header.php";
