<?php

$data['PageName'] = 'Crypto Exchange';
$data['PageFile'] = 'crypto-exchange';

// Set Login / Not
is_member_session();
// Set Permission for Active or New Member
is_member_status();
// Set Permission for Access page by IBAN
member_page_access_permission(1);
//$step=1;

$clientid = $_SESSION["s_client_id"];

if (isset($_GET['step']) == "") {
    $step = '1';
} else {
    $step = $_GET['step'];
}
if (isset($_SESSION['cnt']) == "") {
    $_SESSION['cnt'] = '1';
}

$getcurrency = $_SESSION["s_assign_currency"];

$gcurrency = explode(',', $getcurrency);

//print_r($gcurrency);
if (isset($_POST['btnCrypto'])) {




    $insert = db_query("insert into `client_crypto_receiving_wallet_address` set 
client_id='$clientid',
currency_from='" . $_SESSION['crypto']['currency_from'] . "',
currency_to='" . $_SESSION['crypto']['currency_to'] . "',
amount='" . $_SESSION['crypto']['amount'] . "',
receiver_wallet_address='" . $_SESSION['crypto']['receiver_wallet_address'] . "',
network='" . $_SESSION['crypto']['network'] . "',
exchange_value='" . $_SESSION['crypto']['exchange_value'] . "',
responce='" . json_encode($_SESSION['cryptovalue']) . "',
descricption='" . $_SESSION['crypto']['descricption'] . "'");
    if ($insert) {

        $template = "CRYPTO-EXCHANGE";
        $postvar['fullname'] = $_SESSION["s_first_name"] . " " . $_SESSION["s_last_name"];
        $postvar['amount'] = $_SESSION['crypto']['amount'] . " " . $_SESSION['crypto']['currency_from'] . " to " . $_SESSION['crypto']['currency_to'] . " <br> Exchange Value - " . $_SESSION['crypto']['exchange_value'] . " <br> Receiver Wallet Address - " . $_SESSION['crypto']['receiver_wallet_address'] . " <br> Network - " . $_SESSION['crypto']['network'] . " <br> Descricption - " . $_SESSION['crypto']['descricption'];
        //$postvar['email']=$_SESSION['members']['email'];
        $postvar['email'] = $_SESSION['host_email']; // Admin Email

        sent_template_mail($template, $postvar, $for_admin = true);


        $step = 1;
        $_SESSION['msg'] = "Request Submitted - Request id are " . $_SESSION['cryptovalue']['quote_id'];
        unset($_SESSION['cnt']);
        unset($_SESSION['crypto']);
        unset($_SESSION['cryptovalue']);
        header("location:crypto-exchange.php");
        exit;
    }
}

if (isset($_POST['cancel'])) {

    unset($_SESSION['crypto']);
    unset($_SESSION['cryptovalue']);
    header("location:crypto-exchange.php");
    exit;
}
if (isset($_POST['btn_submit']) == 'Submit') {

    $_SESSION['crypto']['currency_from'] = $_POST['currency_from'];
    $_SESSION['crypto']['currency_to'] = $_POST['currency_to'];
    $_SESSION['crypto']['amount'] = $_POST['amount'];
    $_SESSION['crypto']['receiver_wallet_address'] = $_POST['receiver_wallet_address'];
    $_SESSION['crypto']['network'] = $_POST['network'];
    $_SESSION['crypto']['descricption'] = $_POST['descricption'];


    $pair = strtolower(trim($_POST['currency_to']) . '' . trim($_POST['currency_from']));
    $amount = trim($_POST['amount']);
    if (isset($pair) && $pair && isset($amount) && $amount) {

        include "api/sfox/crypto-exchange-value.php";
        //print_r($cryptovalue);
        $amount = trim($_POST['amount']);

        //if(isset($cryptovalue['buy_price'])&&$cryptovalue['buy_price']){
        $_SESSION['cryptovalue'] = $cryptovalue;
        $_SESSION['crypto']['exchange_value'] = $_SESSION['cryptovalue']['amount'];
        header("location:crypto-exchange.php?step=2");
        exit;
        //}else{
        //$step=1;
        //unset($_SESSION['cnt']);
        //unset($_SESSION['crypto']);
        //unset($_SESSION['cryptovalue']);
        //$_SESSION['msg']="Technical error - Please try again";
        //header("location:crypto-exchange.php");exit;

        //}

    }
}








include "header.php";
