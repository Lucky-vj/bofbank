<?php
include "../common.php";

// for resend forgot password link
if(!empty($_POST["doc_id_type"])) {
	
	if(isset($_POST["admin_client_id"])&&$_POST["admin_client_id"]){
	$id=$_POST["admin_client_id"];
	}else{
	$id=$_SESSION["s_client_id"];
	}
	$doc_id_type=$_POST["doc_id_type"];
	$nationality=$_POST["nationality"];
	$doc_id_number=$_POST["doc_id_number"];
	$doc_id_exp_date=$_POST["doc_id_exp_date"];


      $update = "UPDATE `tbl_client_master` SET `nationality`='$nationality',
	                                      `doc_id_type`='$doc_id_type',
		                                  `doc_id_number`='$doc_id_number',
										  `doc_id_exp_date`='$doc_id_exp_date' WHERE `client_id`= $id";
       
	    $upd = db_query($update);
		if($upd){
		json_log_upd($id,'client_master','update','client_id'); // update json log history
        get_member_details($id); // set update Session
		echo 1;
		}
		
}


?>