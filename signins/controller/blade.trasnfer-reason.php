<?php
$data['PageName'] = 'Trasnfer Reason';
$data['PageFile'] = 'trasnfer-reason';
is_admin_session();

$action = "Add";
if (isset($_GET['action']) && $_GET['action']) {
    $action = $_GET['action'];
}



if (isset($_POST['btn_bank']) and ($_POST['btn_bank'] == 'Add')) {
    $reason = trim($_POST['reason']);

    $ins = db_query("INSERT INTO `tbl_trasnfer_reason` SET `reason`='$reason'");

    $insert_id = newid();
    json_log_upd($insert_id, 'trasnfer_reason', 'add', 'id'); // add json log history

    $_SESSION['msgok'] = "Transfer Reason Added Successfully";
    header("location:trasnfer-reason.php");
    exit;
}




if (isset($_POST['btn_bank']) and ($_POST['btn_bank'] == 'Edit')) {
    $bid = $_POST['bid'];
    $reason = $_POST['reason'];

    $upd = db_query("UPDATE tbl_trasnfer_reason SET reason='$reason' WHERE  `id`='$bid'");

    json_log_upd($bid, 'trasnfer_reason', 'update', 'id'); // update json log history
    $_SESSION['msgok'] = "Transfer Reason Update Successfully";
    header("location:trasnfer-reason.php");
    exit;
}


if (($action == 'delete') and ($_GET['bid'] <> "")) {
    $bid = $_GET['bid'];
    $key = $_GET['key'];
    $del = db_query("UPDATE tbl_trasnfer_reason SET Status='$key' where `id`='$bid'");

    $_SESSION['msgok'] = "Transfer Reason $key Successfully";

    header("location:trasnfer-reason.php");
    exit;
}

if (($action == 'edit') and ($_GET['bid'] <> "")) {
    $bid = $_GET['bid'];


    // Select Data for display inserted value
    $qry = "SELECT * FROM `tbl_trasnfer_reason` where `id`='$bid'";
    $rs = db_rows($qry);
    $rs = $rs[0];
    $reason = $rs['reason'];
} else {
    $reason = "";
}

// Query for Listing
$rows = db_rows("SELECT * FROM `tbl_trasnfer_reason` WHERE 1 AND `status`=1 ORDER BY `reason` ASC LIMIT 0,200");

include "header.php";
