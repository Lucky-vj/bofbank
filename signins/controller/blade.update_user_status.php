<?php
include './../../common.php';

$data['PageName'] = 'Deactivate User';

$data['PageFile'] = 'deactivate-user';

is_admin_session();

$clientId = $_POST['clientId'];

if ($clientId) {
    $temp_user_data = get_member_details($clientId);
    if ($temp_user_data['banned'] == 1) {
        echo "User Activated Successfully";
        update_member_details($clientId, 'banned', 0);
    } else {
        echo "User Deactivated Successfully";
        update_member_details($clientId, 'banned', 1);
    }
}

include "header.php";
