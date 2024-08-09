<?php

include('../common.php');





// for change password merchant

if(!empty($_POST["opass"])) {



  $mid=$_SESSION["s_client_id"];

  $opass=hash_f($_POST["opass"]);

  $npass=hash_f($_POST["npass"]);

  

  $cnt=table_data_availability("tbl_client_master"," AND client_id={$mid} AND password='{$opass}' ");

  

	  if($cnt==1){

	     $query = "UPDATE tbl_client_master SET password='{$npass}' WHERE client_id='{$mid}'";

	     $result = db_query($query);

		 if($result){ 

		 $_SESSION['msg']="Password Change Successfully";

		 echo 1;exit;

		 } else{ 

		 echo "Error : Please Try After Some Time"; 

		 }

	     

	  }else{

	   echo "Old Password Not Match Please Try Again";

	  }

  }

// for reset password merchant

if(isset($_POST["pass"])&&$_POST["pass"]) { 

$auth_pass_code=decryption_value($_POST["auth_pass_code"]);

$npass=$_POST["npass"];

$npass=hash_f($_POST["npass"]);



$cnt=table_data_availability("tbl_client_master"," AND client_id={$auth_pass_code} ");



	  if($cnt==1){

	     $query = "UPDATE tbl_client_master SET password='{$npass}' WHERE client_id='{$auth_pass_code}'";

	     $result = db_query($query);

		 if($result){ 

		 $_SESSION['msg']="Password Change Successfully";

		 echo 1;exit;

		 } else{ 

		 echo "Error : Please Try After Some Time"; 

		 }

	     

	  }else{

	   echo "Data mismatched error, Check and try again";

	  }

  }



?>