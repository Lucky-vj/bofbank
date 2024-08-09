<?php

$data['PageName']='profile';

$data['PageFile']='profile_view';

$data['noheader']=1;

is_admin_session();



if(isset($_SESSION["s_admin_id"]) and ($_REQUEST['client_id']<>""))

{

		$Client_ID=$_REQUEST['client_id'];

        $query = "SELECT * FROM tbl_client_master WHERE client_id = $Client_ID";

		$rs=db_rows($query);

        $rs=$rs[0];



} else {



        header("location:sign-in.php");exit;

}



	

	

	if(isset($_POST['btn_update']) and ($_POST['btn_update']=='Update Profile')){

        $title = $_POST['txt_title'];
		$first_name = $_POST['txt_fname'];
        $last_name = $_POST['txt_lname'];
        $full_name = $first_name . " " . $last_name;
        $country_code = $_POST['txt_country_code'];
		$mobile = $_POST['txt_mobile'];
        $gender = $_POST['txt_gender'];
		$birth_date = $_POST['birth_date'];
        $address_line1 = $_POST['txt_address_line1'];
		$address_line2 = $_POST['txt_address_line2'];
        $city = $_POST['txt_city'];
        $state = $_POST['txt_state'];
        $zip = $_POST['txt_zip'];
		$country = $_POST['txt_country'];





       $update = "UPDATE tbl_client_master SET title='$title',
	                                      first_name='$first_name',
		                                  last_name='$last_name',
										  full_name='$full_name', 
										  mobile='$mobile', 
										  country_code='$country_code', 
										  gender='$gender', 
										  birth_date='$birth_date', 
										  address_line1='$address_line1', 
										  address_line2='$address_line2', 
										  city='$city', 
										  state='$state', 
										  country='$country', 
										  pincode='$zip' WHERE client_id='$Client_ID'";

        $upd = db_query($update);

json_log_upd($Client_ID,'client_master','update','client_id'); // update json log history

$_SESSION['msg']="Profile Update Successfully";

if($_GET['admin_view']=='1'){  $adm="admin_view=1";}

header("location:profile_view.php?client_id=$Client_ID&$adm");exit;







    }

	

if(isset($_POST['btn_password']) and ($_POST['btn_password']=='Change Password')){

$new_password = $_POST['new_password'];

$confirm_password = $_POST['confirm_password'];

$update = db_query("UPDATE tbl_client_master SET password='$new_password' WHERE client_id='$Client_ID'");

$_SESSION['msg']="Password Update Successfully";

if($_GET['admin_view']=='1'){  $adm="admin_view=1";}

header("location:profile_view.php?client_id=$Client_ID&$adm");exit;



}	   

$country_list=get_select_list("tbl_country","`id`,`country`,`Country_Code`","");

include "header.php";

?>







