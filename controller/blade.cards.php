<?php

$data['PageName']='Cards';

$data['PageFile']='Cards';



// Set Login / Not

is_member_session();

// Set Permission for Active or New Member

is_member_status();



$member_account_number = $_SESSION["s_client_id"];



if(isset($_GET['step'])==""){ $step='1'; } else { $step=$_GET['step']; }

if(isset($_POST['submit_transfer'])=='Transfer'){}


include "header.php";

?>







