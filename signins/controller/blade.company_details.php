<?php

$data['PageName'] = 'profile';

$data['PageFile'] = 'profile_view';

$data['noheader'] = 1;

is_admin_session();



if (isset($_SESSION["s_admin_id"]) and ($_REQUEST['client_id'] <> "")) {

    $Client_ID = $_REQUEST['client_id'];

    $query = "SELECT * FROM tbl_client_master WHERE client_id = $Client_ID";

    $rs = db_rows($query);

    $rs = $rs[0];
} else {

    header("location:sign-in.php");
    exit;
}




if (isset($_POST['btn_update']) and ($_POST['btn_update'] == 'Update Company Details')) {





    $company_name = $_POST['company_name'];

    $company_address = $_POST['company_address'];

    $company_registration_no = $_POST['company_registration_no'];

    $date_of_incorporation = $_POST['date_of_incorporation'];

    $country_of_incorporation = $_POST['country_of_incorporation'];

    $city_of_incorporation = $_POST['city_of_incorporation'];

    $update = "UPDATE tbl_client_master SET company_name='$company_name',

		                                  company_address='$company_address',

										  company_registration_no='$company_registration_no', 

										  date_of_incorporation='$date_of_incorporation',

                                          city_of_incorporation='$city_of_incorporation',

										  country_of_incorporation='$country_of_incorporation' WHERE client_id='$Client_ID'";

    $upd = db_query($update);

    json_log_upd($Client_ID, 'client_master', 'update', 'client_id'); // update json log history

    $_SESSION['msg'] = "Company Details Update Successfully";

    if ($_GET['admin_view'] == '1') {
        $adm = "admin_view=1";
    }

    header("location:company_details.php?client_id=$Client_ID&$adm");
    exit;
}





include "header.php";
