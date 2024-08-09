<?php

$data['PageName'] = 'Account Security';
$data['PageFile'] = 'account-security';


$password = $_SESSION['members']['password'];
$otp_auth_access = $_SESSION['members']['otp_auth_access'];
$google_auth_code = $_SESSION['members']['google_auth_code'];
$google_auth_access = $_SESSION['members']['google_auth_access'];

if ($otp_auth_access == 1) {
        $otp_status = "Activated";
        $otp_icon = $data['fwicon']['check-circle'] . "  text-success";
} else {
        $otp_status = "De activated";
        $otp_icon = $data['fwicon']['check-cross'] . "  text-danger";
}

if ($google_auth_access == 1) {
        $twofastatus = "Activated";
        $twofa_icon = $data['fwicon']['check-circle'] . "  text-success";
} else {
        $twofastatus = "De activated";
        $twofa_icon = $data['fwicon']['check-cross'] . "  text-danger";
}


if (isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])) {
        $member_account_number = $_SESSION["s_client_id"];
        $query = "SELECT * FROM tbl_client_master WHERE client_id = $member_account_number AND banned=0";
        $result = db_rows($query);
        $rs = $result[0];
} else {

        header("location:sign-in.php");
        exit;
}


if (isset($_POST['btn_password']) && $_POST['btn_password']) {

        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $update = db_query("UPDATE tbl_client_master SET password='$new_password' WHERE client_id='$member_account_number'");
        $_SESSION['msg'] = "Password Update Successfully";

        header("location:change-password.php");
        exit;
}

include "header.php";
