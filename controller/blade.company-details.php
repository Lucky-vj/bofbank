<?php



$data['PageName'] = 'Company Details';

$data['PageFile'] = 'company-details';





if (isset($_SESSION["s_client_id"]) && isset($_SESSION['s_login'])) {

    $Client_ID = $_SESSION["s_client_id"];

    $query = "SELECT * FROM tbl_client_master WHERE client_id = $Client_ID";

    $result = db_rows($query);

    $rs = $result[0];



    if (($rs['status'] == 'Active') and ($_SESSION["s_status"] == 'New')) {
        $_SESSION["s_status"] = "";
    }
} else {



    header("location:sign-in.php");
    exit;
}



if (isset($_POST['btn_update']) && $_POST['btn_update'] == 'Update Company Details') {


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

										  country_of_incorporation='$country_of_incorporation',

                                          city_of_incorporation='$city_of_incorporation'  

										  WHERE client_id='" . $_SESSION["s_client_id"] . "'";



    $upd = db_query($update);

    $_SESSION['msg'] = "ok";

    header("location:company-details.php");
    exit;
}



include "header.php";
