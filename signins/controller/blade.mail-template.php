<?php

$data['PageName']='Email Template';

$data['PageFile']='mail-template';

is_admin_session();



$action="Add";

if(isset($_GET['action'])&&$_GET['action']){ $action=$_GET['action']; }

if(isset($_GET['bid'])&&$_GET['bid']){ $bid=$_GET['bid']; }

	



if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Add')){

$template_code = $_POST['template_code'];

$template_subject = $_POST['template_subject'];

$template_desc = $_POST['template_desc'];

$ins = db_query("INSERT INTO tbl_email_template SET template_code='$template_code',                                                       template_subject='$template_subject',

                                                       template_desc='$template_desc'");



$_SESSION['msgok']="Email Template Added Successfully";

header("location:mail-template.php");exit;

}









if(isset($_POST['btn_submit']) and ($_POST['btn_submit']=='Edit')){

$bid = $_POST['bid'];

$template_code = $_POST['template_code'];

$template_subject = $_POST['template_subject'];

$template_desc = $_POST['template_desc'];



$upd = db_query("UPDATE tbl_email_template SET  template_code='$template_code',

                                                         template_subject='$template_subject',

												         template_desc='$template_desc' 

                                                         WHERE template_id='$bid' ");



$_SESSION['msgok']="Email Template Update Successfully";

header("location:mail-template.php");exit;





}





if(($action=='statusc') and (isset($_GET['bid'])<>"")){

$bid=$_GET['bid'];

$key=$_GET['key'];

$del = db_query("UPDATE tbl_email_template SET template_status='$key' where template_id='$bid'");

$_SESSION['msgok']="Email Template $key Successfully";

header("location:mail-template.php");exit;

}







if(($action=='edit') and (isset($_GET['bid'])<>"")){

$bid=$_GET['bid'];







// Select Data for display inserted value

$qry = "SELECT * FROM tbl_email_template where template_id='$bid'";

$rs=db_rows($qry);

$rs=$rs[0];



$template_code=$rs['template_code'];

$template_subject=$rs['template_subject'];

$template_desc=$rs['template_desc'];

}else{

$template_code="";

$template_subject="";

$template_desc="";

}









include "header.php";

?>







