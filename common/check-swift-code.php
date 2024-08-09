<?php
include('../common.php');

	// Check Swift Code exists or not - vikash
	if(!empty($_POST["bswift"])) {
		$field="swift_code='" . $_POST["bswift"] . "' ";
		$v='Swift Code';
		
	    $qry = "SELECT bank,city,branch,country,ISO_3_DIGIT FROM tbl_swift_code WHERE ".$field." limit 1";
	  
	    $result=db_rows($qry);
	  
	 
	  if (empty($result)) {
		 echo '{"valid":"0","message":"We are unable to verify this SWIFT number via our Bank Directory. Proceed if your SWIFT details is correct"}';
	  }else{
	  
	   echo '{"valid":"1","bank":"'.$result[0]['bank'].'","city":"'.$result[0]['city'].'","branch":"'.$result[0]['branch'].'","country":"'.$result[0]['country'].'","ISO_3_DIGIT":"'.$result[0]['ISO_3_DIGIT'].'"}';
	   
	
	  }// End if DB condition
	}// End if POST username



?>