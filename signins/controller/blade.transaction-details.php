<?php

$data['PageName'] = 'Transaction Details';
$data['PageFile'] = 'transaction-details';
//$data['noheader']=1;
is_admin_session();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);



$tid = $_GET['tid'];
$sel = db_rows("SELECT * FROM  `tbl_master_trans_table` WHERE `transaction_id`='$tid'");
$rs = $sel[0];

// Get Default Currency
$acc_details = get_iban_account_details($rs['member_id'], $rs['iban_id']);
$assign_currency = $acc_details[0]['currency'];


$member_id = $rs['member_id'];

if ($rs['transaction_status'] == "Process") {
	$mscclr = "warning";
} elseif ($rs['transaction_status'] == "Success") {
	$mscclr = "success";
} elseif ($rs['transaction_status'] == "Failed") {
	$mscclr = "danger";
} else {
	$mscclr = "secondary";
}



// fetch Transaction fees from db
$selfee = db_rows("SELECT * FROM `tbl_fee` WHERE `client_id`='$member_id'", 0);
$cnt = $data['db_rows_count'];
if ($cnt > 0) {
	$rsfee = $selfee[0];
	$rs['transaction_type'];
	if ($rs['transaction_type'] == "Credit") {
		$mdr_fee = $rsfee['credit_mdr_fee'];
		$min_fee = $rsfee['credit_min_fee'];
	} elseif ($rs['transaction_type'] == "Debit") {
		$mdr_fee = $rsfee['debit_mdr_fee'];
		$min_fee = $rsfee['debit_min_fee'];
	} else {
		$mdr_fee = 0;
		$min_fee = 0;
	}
} else {
	$mdr_fee = $data['mdr_fee']; // fetch default from common file
	$min_fee = $data['mdr_min_fee']; // fetch default from common file
}

////////////////////////////////////



if (isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Submit') {
	$transaction_id = $_POST['transaction_id'];
	$admin_transaction_id = $_POST['admin_transaction_id'];
	$converted_transaction_amount = str_replace(",", "", $_POST['converted_transaction_amount']);
	$converted_transaction_currency = $_POST['converted_transaction_currency'];
	$admin_transaction_date = date("Y-m-d H:i:s");
	$admin_transaction_status = $_POST['admin_transaction_status'];
	$admin_transaction_desc = $_POST['admin_transaction_desc'];
	$memberfullname = $_POST["memberfullname"];
	$memberemail = $_POST["memberemail"];
	$transtype = $_POST["transtype"];
	$orderamt = $_POST["orderamt"];
	$tranfee = $_POST['tranfee'];
	$assign_currency = $_POST['assign_currency'];
	$purpose1 = $_POST['purpose1'];
	$transaction_type = $_POST['transaction_type'];
	$transaction_ac_no = $_POST['transaction_ac_no'];
	$used_bank = $_POST['used_bank'];
	$mybalance = get_user_balance_amt($member_id, $rs['iban_id']);  // fetch current balance


	if (!isset($_FILES['reference_doc']) || $_FILES['reference_doc']['error'] !== UPLOAD_ERR_OK) {
		$_SESSION['msg'] = "File upload failed top";
		header("location:transaction-details.php?tid={$transaction_id}");
		exit;
	}

	if ($transaction_type == "Credit") {
		$available_balance = $mybalance + $converted_transaction_amount;
	} else {
		$process_amount = $converted_transaction_amount + $tranfee;
		if (($mybalance < $process_amount) && ($admin_transaction_status == "Success")) {
			$_SESSION['msg'] = "Insufficient Balance";
			header("location:transaction-details.php?tid={$transaction_id}&r=ib");
			exit;
		}
		$available_balance = $mybalance - $converted_transaction_amount;
	}

	// $file = $_FILES['reference_doc'];
	// $fileName = $file['name'];
	// $fileTmpName = $file['tmp_name'];
	// $fileSize = $file['size'];
	// $fileError = $file['error'];

	// // Display the error in $_FILES
	// if ($fileError !== UPLOAD_ERR_OK) {
	// 	$_SESSION['msg'] = "File upload error: " . $fileError;
	// 	header("location:transaction-details.php?tid={$transaction_id}");
	// 	exit;
	// }

	// // Generate a unique filename
	// $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
	// $newFileName = uniqid('doc_') . '.' . $fileExtension;

	// $uploadDir = '/var/www/secure_uploads/reference_doc/';
	// // $uploadDir = 'C:\\BofBankDocUploads\\'; // local path
	// $uploadPath = $uploadDir . $newFileName;

	// if (move_uploaded_file($fileTmpName, $uploadPath)) {
	// 	// File uploaded successfully
	// } else {
	// 	$_SESSION['msg'] = "File upload failed " . $fileError;
	// 	header("location:transaction-details.php?tid={$transaction_id}");
	// 	exit;
	// }

	$admin_approval_status = "Added On " . date("d-m-Y H:i:s") . " with IP : " . $_SERVER['REMOTE_ADDR'] . " By " . $_SESSION['ses_full_name'];
	$db_response = db_query("UPDATE tbl_master_trans_table set converted_transaction_amount='$converted_transaction_amount',
                                                       converted_transaction_currency='$converted_transaction_currency',
										               admin_transaction_date='$admin_transaction_date',
										               transaction_status='$admin_transaction_status',
										               admin_transaction_desc='$admin_transaction_desc',
										               admin_transaction_id='$admin_transaction_id',
													   admin_approval_status='$admin_approval_status',
													   available_balance='$available_balance',
													   used_bank='$used_bank'
													   where transaction_id='$transaction_id'");
	//    reference_doc='$newFileName'



	if (($purpose1 <> "No Transaction Fee") and ($admin_transaction_status == "Success")) {
		$selaccdt = db_rows("SELECT * FROM tbl_admin_bank_account where 1");
		$bankdata = $selaccdt[0];
		$admin_bank_name = $bankdata['admin_bank_name'];
		$admin_bank_account_number = $bankdata['admin_bank_account_number'];
		$admin_bank_address = $bankdata['admin_bank_address'];
		$admin_bank_swift_code = $bankdata['admin_bank_swift_code'];
		$admin_bank_payment_reference = $bankdata['admin_bank_payment_reference'];
		$admin_bank_supported_currency = $bankdata['admin_bank_supported_currency'];
		$admin_account_beneficiary = $bankdata['admin_account_beneficiary'];
		$admin_beneficiary_address = $bankdata['admin_beneficiary_address'];
		$admin_approval_status = "Added On " . date("d-m-Y H:i:s") . " with IP : " . $_SERVER['REMOTE_ADDR'] . " By " . $_SESSION['ses_full_name'];
		$admin_transaction_date = date('Y-m-d H:i:s', strtotime($date . ' +2 seconds')); // for difference settlement time with two transactions
		$admin_transaction_desc = "Auto Deduct Transaction Fee and Added on Admin Bank Account";
		$mybalance = get_user_balance_amt($member_id, $rs['iban_id']);  // fetch current balance
		$available_balance = $mybalance - $tranfee;  // Get available balance

		db_query("insert into tbl_master_trans_table set transaction_amount='$tranfee',
                                                  transaction_currency='$assign_currency',
												  iban_id='" . $rs['iban_id'] . "',
												  converted_transaction_currency='$assign_currency',
										          converted_transaction_amount='$tranfee',
												  transaction_bank_name='$admin_bank_name',
										          transaction_ac_no='$admin_bank_account_number',
										          transaction_swift_code='$admin_bank_swift_code',
										          transaction_bank_address='$admin_bank_address',
										          transaction_purpose='$purpose1',
										          usr_name='$admin_account_beneficiary',
										          usr_address='$admin_beneficiary_address',
										          transaction_type='Debit',
										          transaction_for='Transaction Fee',
										          member_id='$member_id',
												  transaction_status='Success',
												  admin_transaction_date='$admin_transaction_date',
										          admin_transaction_desc='$admin_transaction_desc',
												  admin_approval_status='$admin_approval_status',
												  transaction_fee_linked_account='$transaction_id',
												  available_balance='$available_balance',
												  used_bank='$used_bank',
										          transaction_date=now()");

		$template = "TRANSACTION-FEE";
		$postvar['amount'] = $tranfee . " " . $assign_currency;
		$postvar['status'] = $admin_transaction_status;
		$postvar['transtype'] = $transtype;
		$postvar['fullname'] = $memberfullname;
		$postvar['email'] = $memberemail;
		sent_template_mail($template, $postvar);
		unset($postvar);
	}

	if (isset($rs['transaction_for']) && ($rs['transaction_for'] == "Internal Money Transfer") && isset($transaction_ac_no) && $transaction_ac_no) {

		$trans_details = get_select_list("tbl_master_trans_table", "`member_id`,`transaction_id`,`iban_id`", " AND sender_transaction_id='$transaction_id'");
		//print_r($trans_details);

		$trans_member_id = $trans_details[0]['member_id'];
		$trans_transaction_id = $trans_details[0]['transaction_id'];
		$trans_iban_id = $trans_details[0]['iban_id'];

		// Get Default Currency

		$acc_details1 = get_iban_account_details($trans_member_id, $trans_iban_id);

		$trans_currency = $acc_details1[0]['currency']; //"EUR";

		//exit;

		if ($trans_currency <> $converted_transaction_currency) {

			$converted_transaction_amount = currencyConverter($converted_transaction_currency, $trans_currency, $converted_transaction_amount);
		}

		$mybalance = get_user_balance_amt($trans_member_id, $trans_iban_id);
		$available_balance = $mybalance + $converted_transaction_amount;

		$admin_transaction_desc = "Transfer Amount";
		db_query("UPDATE `tbl_master_trans_table` SET converted_transaction_amount='$converted_transaction_amount',
                                                       converted_transaction_currency='" . $trans_currency . "',
										               admin_transaction_date='$admin_transaction_date',
										               transaction_status='$admin_transaction_status',
										               admin_transaction_desc='$admin_transaction_desc',
										               admin_transaction_id='$admin_transaction_id',
													   admin_approval_status='$admin_approval_status',
													   available_balance='$available_balance',
													   used_bank='$used_bank'
													   WHERE sender_transaction_id='$transaction_id'");
	}

	//  Mail Function  //

	$template = "TRANSACTION-UPDATE";

	$postvar['amount'] = $orderamt;
	$postvar['status'] = $admin_transaction_status;
	$postvar['transtype'] = $transtype;
	$postvar['fullname'] = $memberfullname;
	$postvar['email'] = $memberemail;

	sent_template_mail($template, $postvar);

	//  End Mail Function  //											   

	$_SESSION['msg'] = "Transaction ID " . $transaction_id . " Update Successfully";

	header("Location:view_requests.php");
	exit;
} else {
	$assign_bank = "";
}


include "header.php";
