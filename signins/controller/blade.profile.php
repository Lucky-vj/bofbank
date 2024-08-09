<?php
$data['PageName']='My Profile';
$data['PageFile']='profile';
is_admin_session();




if(isset($_POST['btn_admin'])&&$_POST['btn_admin']){
$bid = $_SESSION['s_admin_id'];
$admin_username = $_POST['admin_username'];
$admin_full_name = $_POST['admin_full_name'];
$admin_mobile = $_POST['admin_mobile'];
$admin_email = $_POST['admin_email'];



$upd = db_query("UPDATE tbl_admin SET  admin_username='$admin_username',
                                                   admin_full_name='$admin_full_name',
												   admin_email='$admin_email',
												   admin_mobile='$admin_mobile'
                                                   WHERE  admin_id='$bid' ");


if(isset($data['affected_rows'])&&$data['affected_rows']){
$_SESSION['msgok']="Profile Update Successfully";
json_log_upd($bid,'admin','update','admin_id'); // update json log history
}else{
$_SESSION['msgok']="No Any Update found";
}


header("location:profile.php");exit;


}




if(isset($_SESSION['s_admin_id'])&&$_SESSION['s_admin_id']){
$sess_id=$_SESSION['s_admin_id'];

$qry = "SELECT * FROM tbl_admin where admin_id='$sess_id'";
$rs=db_rows($qry);
$rs=$rs[0];
$admin_username=$rs['admin_username'];
$admin_full_name=$rs['admin_full_name'];
$admin_mobile=$rs['admin_mobile'];
$admin_email=$rs['admin_email'];
$json_log_history=$rs['json_log_history'];
}



include "header.php";
?>



