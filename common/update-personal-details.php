<?php
include "../common.php";

// for resend forgot password link
if(!empty($_POST["first_name"])) {

$admin_client_id=$_POST["admin_client_id"];

	if(isset($_POST["admin_client_id"])&&$_POST["admin_client_id"]){
	$id=$_POST["admin_client_id"];
	}else{
	$id=$_SESSION["s_client_id"];
	}
		

	$title=$_POST["title"];
	$admin_client_id=$_POST["admin_client_id"];
	$first_name=$_POST["first_name"];
	$last_name=$_POST["last_name"];
	$full_name = $first_name . " " . $last_name;
	//$email=$_POST["email"];
	$country_code=$_POST["country_code"];
	$mobile=$_POST["mobile"];
	$gender=$_POST["gender"];
	$birth_date=$_POST["birth_date"];



      $update = "UPDATE `tbl_client_master` SET `title`='$title',
		                                  `first_name`='$first_name',
		                                  `last_name`='$last_name',
										  `full_name`='$full_name', 
										  `country_code`='$country_code', 
										  `mobile`='$mobile', 
										  `gender`= '$gender', 
										  `birth_date`='$birth_date' WHERE `client_id`= $id"; 
										  
       
	    $upd = db_query($update);
		if($upd){
		json_log_upd($id,'client_master','update','client_id'); // update json log history
        get_member_details($id); // set update Session
		echo 1;
		}
		
}


?>