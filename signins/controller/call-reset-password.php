<?php

include("../../common.php");

// for reset password merchant

if(isset($_POST["pass"])&&$_POST["pass"]) { 


$auth_pass_code=decryption_value($_POST["auth_pass_code"]);

$npass=$_POST["npass"];

$npass=hash_f($_POST["npass"]);



$cnt=table_data_availability("tbl_admin"," AND admin_id={$auth_pass_code} ");



	  if($cnt==1){

	     $result = db_query("UPDATE tbl_admin SET admin_password='{$npass}' WHERE admin_id='{$auth_pass_code}'");

		 if($result){ 

		 $_SESSION['msg_login']="Password Change Successfully";

		 echo 1;

		 } else{ 

		 echo "Error : Please Try After Some Time"; 

		 }

	     

	  }else{

	   echo "Data mismatched error, Check and try again";

	  }

  }



?>