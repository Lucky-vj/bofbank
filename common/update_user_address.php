<?php
include "../common.php";

// for resend forgot password link
if(!empty($_POST["address_line1"])) {
	
	
	if(isset($_POST["admin_client_id"])&&$_POST["admin_client_id"]){
	$id=$_POST["admin_client_id"];
	}else{
	$id=$_SESSION["s_client_id"];
	}
	
	$address_line1=$_POST["address_line1"];
	$address_line2=$_POST["address_line2"];
	$city=$_POST["city"];
	$state=$_POST["state"];
	$country=$_POST["country"];
	$pincode=$_POST["pincode"];
	$additional_information=$_POST["additional_information"];

      $update = "UPDATE `tbl_client_master` SET `address_line1`='$address_line1',
		                                  `address_line2`='$address_line2',
										  `city`='$city', 
										  `state`='$state', 
										  `country`='$country', 
										  `pincode`='$pincode',
										  `additional_information`='$additional_information' WHERE `client_id`= $id";
       
	    $upd = db_query($update);
		if($upd){
		json_log_upd($id,'client_master','update','client_id'); // update json log history
        get_member_details($id); // set update Session
		echo 1;
		}
		
}


?>