<?php
$data['PageName']='Manage Admin';
$data['PageFile']='manage-admin';
is_admin_session();

$action="Add";
if(isset($_GET['action'])<>""){ $action=$_GET['action']; }
   

if(isset($_POST['btn_admin']) and ($_POST['btn_admin']=='Add')){
$admin_username = $_POST['admin_username'];
$admin_full_name = $_POST['admin_full_name'];
$admin_mobile = $_POST['admin_mobile'];
$admin_email = $_POST['admin_email'];
$admin_type = $_POST['admin_type'];
$admin_status = $_POST['admin_status'];

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$generate_pass = substr( str_shuffle( $chars ), 0, 8 );
$admin_password=hash_f($generate_pass);

//$_SESSION['temp_admin_password']=$generate_pass;



$ins = db_query("INSERT INTO tbl_admin SET    admin_username='$admin_username',                                                       admin_full_name='$admin_full_name',
                                                       admin_email='$admin_email',
                                                       admin_mobile='$admin_mobile',
													   admin_password='$admin_password',
													   admin_status='$admin_status',
													   admin_type='$admin_type'");

$insert_id=newid();
json_log_upd($insert_id,'admin','add','admin_id'); // add json log history
$_SESSION['msgok']="Admin Added Successfully";
$_SESSION['msgok'].=" username : ".$admin_username." and password : ".$generate_pass;
header("location:manage-admin.php");exit;
}



if(isset($_POST['btn_admin']) and ($_POST['btn_admin']=='Edit')){
$bid = $_POST['bid'];
$admin_username = $_POST['admin_username'];
$admin_full_name = $_POST['admin_full_name'];
$admin_mobile = $_POST['admin_mobile'];
$admin_email = $_POST['admin_email'];
$admin_type = $_POST['admin_type'];
$admin_type = $_POST['admin_type'];
$admin_status = $_POST['admin_status'];



$upd = db_query("UPDATE tbl_admin SET  admin_username='$admin_username',
                                                   admin_full_name='$admin_full_name',
												   admin_email='$admin_email',
												   admin_mobile='$admin_mobile',
												   admin_status='$admin_status',
												   admin_type='$admin_type'
                                                   WHERE  admin_id='$bid' ");
json_log_upd($bid,'admin','add','admin_id'); // update json log history
$_SESSION['msgok']="Admin Details Update Successfully";
header("location:manage-admin.php");exit;


}


if(($action=='statusc')and ($_GET['bid']<>"")){
$bid=$_GET['bid'];
$key=$_GET['key'];
$del = db_query("UPDATE tbl_admin SET admin_status='$key' where admin_id='$bid'");
$_SESSION['msgok']="Admin $key Successfully";
header("location:manage-admin.php");exit;
}

if(($action=='edit') and ($_GET['bid']<>"")){
$bid=$_GET['bid'];


// Select Data for display inserted value
$qry = "SELECT * FROM tbl_admin where admin_id='$bid'";
$rs=db_rows($qry);
$rs=$rs[0];

$admin_username=$rs['admin_username'];
$admin_full_name=$rs['admin_full_name'];
$admin_mobile=$rs['admin_mobile'];
$admin_email=$rs['admin_email'];
$admin_password=$rs['admin_password'];
$admin_type=$rs['admin_type'];
$admin_status=$rs['admin_status'];
}else{
$admin_username="";
$admin_full_name="";
$admin_mobile="";
$admin_email="";
$admin_password="";
$admin_type="";
$admin_status="";

}



include "header.php";
?>



