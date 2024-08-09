<?php
include('../common.php');

###############################################################################

//?tbl=5&tblid=399

if(isset($_REQUEST['tbl'])&&isset($_REQUEST['tblid'])){

	$tbl=$_REQUEST['tbl'];
	$tblid=$_REQUEST['tblid'];
	$table_name="client_emails";
	$sqlStmt = "SELECT `email` FROM `{$data['DbPrefix']}$table_name` WHERE `id`='{$tblid}' LIMIT 1";
	
	$q = db_rows($sqlStmt);
	
	if(isset($q[0])){
		 $email=$q[0]['email'];
		//echo "<br/>";
		echo encrypts_decrypts_emails($email,2);
	}
	
}


?>