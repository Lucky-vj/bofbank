<?php
$data['PageName']='Referance Letter';
$data['PageFile']='referance-letter';
is_admin_session();


if(isset($_POST['btn_update']) and ($_POST['btn_update']=='Update')){
	
$referance_letter = addslashes($_POST['referance_letter']);
$qrupd = db_query("UPDATE tbl_referance_letter SET referance_letter='$referance_letter' WHERE ref_id='1'");
     

$_SESSION['msg']="ok";
header("location:referance-letter.php");exit;



    }




$qry = "SELECT * FROM  tbl_referance_letter WHERE ref_id='1'";
$rs=db_rows($qry);
$rs=$rs[0];


$ref_letter=stripslashes($rs['referance_letter']);
//$logo_path=$data['Host']."/images/logo.png";
//$logo_path=$data['reference_latter_logo']; // Define on common
//$bootstrap_path=$data['Host']."/common/css/bootstrap.min.css";
//$ref_letter=str_replace("###bootstrap###",$bootstrap_path,$ref_letter);
//$ref_letter=str_replace("###logo###",$logo_path,$ref_letter);

include "header.php";
?>



