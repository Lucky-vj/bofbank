<?php

$data['PageName']='Manage Host';
$data['PageFile']='manage-host';

is_admin_session();

if(isset($_POST['sent'])){

$host_name=$_POST['host_name'];
$host_full_name=$_POST['host_full_name'];
$host_address=$_POST['host_address'];
$host_contact_no=$_POST['host_contact_no'];
$host_email=$_POST['host_email'];
$host_logo=$_POST['host_logo'];
$upload_signature=$_POST['host_signature'];
$host_favicon=$_POST['host_favicon'];
$host_header_bg_color=$_POST['host_header_bg_color'];
$host_sidebar_bg_color=$_POST['host_sidebar_bg_color'];
$host_sidebar_text_color=$_POST['host_sidebar_text_color'];
$smtp_host=$_POST['smtp_host'];
$smtp_port=$_POST['smtp_port'];
$smtp_username=$_POST['smtp_username'];
$smtp_password=$_POST['smtp_password'];

//==========Upload Signature======================

if(isset($_FILES['host_signature']['name'])){

$file_name_signature = $_FILES['host_signature']['name'];

if(($file_name_signature)&&($_FILES["host_signature"]["size"]>6000000)){ //1000000*6=6000000 (6MB)

echo "File size should be less than 6MB";exit;	

}elseif(($file_name_signature)&&(!preg_match("/\.(jpg|jpeg|bmp|gif|png|pdf)$/", $file_name_signature))){

echo  "Unsupported file type ".$ext;exit;	

}

$maxIdx=rand(100000,999999);

$fileNamesignature	= $maxIdx.'_'.$_FILES['host_signature']['name'];

$uploaddirx 		= 'img/';

$updatelogo_filex = $uploaddirx . basename($fileNamesignature); 

if (move_uploaded_file($_FILES['host_signature']['tmp_name'], $updatelogo_filex)) { 

     if($upload_signature){unlink($uploaddirx . basename($upload_signature));}

     } else {

	 $fileNamesignature = $upload_signature;

	 }

}
              $upd = db_query("UPDATE tbl_host SET host_name='$host_name',
                                                   host_full_name='$host_full_name',
												   host_address='$host_address',
												   host_contact_no='$host_contact_no',
												   host_email='$host_email',
												   host_logo='$host_logo',
												   host_favicon='$host_favicon',
												   host_header_bg_color='$host_header_bg_color',
												   host_sidebar_bg_color='$host_sidebar_bg_color',
												   host_sidebar_text_color='$host_sidebar_text_color',
												   smtp_host='$smtp_host',
												   smtp_port='$smtp_port',
												   smtp_username='$smtp_username',
												   smtp_password='$smtp_password',
												   host_signature='$fileNamesignature'",1
				);

				

if(isset($data['affected_rows'])&&$data['affected_rows']){

    $_SESSION['host_companyname']=$host_full_name;
	$_SESSION['host_logo']=$host_logo;
	$_SESSION['host_favicon']=$host_favicon;
	$_SESSION['host_header_bg_color']=$host_header_bg_color;
	$_SESSION['host_sidebar_bg_color']=$host_sidebar_bg_color;
	$_SESSION['host_sidebar_text_color']=$host_sidebar_text_color;
	$_SESSION['host_email']=$host_email;
	$_SESSION['host_name']=$host_name;
	$_SESSION['smtp_host']=$smtp_host;
	$_SESSION['smtp_port']=$smtp_port;
	$_SESSION['smtp_username']=$smtp_username;
	$_SESSION['smtp_password']=$smtp_password;

$_SESSION['msgok']="Host Details Updated Successfully";

json_log_upd(1,'host','update'); // update json log history

}else{
$_SESSION['msgok']="No Any Update found";
}
header("location:manage-host.php");exit;
}



// Select Data for display inserted value

$qry = "SELECT * FROM tbl_host";
$rs=db_rows($qry);
$rs=$rs[0];

$host_name=isset($rs['host_name'])&&$rs['host_name']?$rs['host_name']:'';
$host_full_name=isset($rs['host_full_name'])&&$rs['host_full_name']?$rs['host_full_name']:'';
$host_address=isset($rs['host_address'])&&$rs['host_address']?$rs['host_address']:'';
$host_contact_no=isset($rs['host_contact_no'])&&$rs['host_contact_no']?$rs['host_contact_no']:'';
$host_email=isset($rs['host_email'])&&$rs['host_email']?$rs['host_email']:'';
$host_logo=isset($rs['host_logo'])&&$rs['host_logo']?$rs['host_logo']:'';
$host_signature_old=isset($rs['host_signature'])&&$rs['host_signature']?$rs['host_signature']:'';
$host_favicon=isset($rs['host_favicon'])&&$rs['host_favicon']?$rs['host_favicon']:'';
$host_header_bg_color=isset($rs['host_header_bg_color'])&&$rs['host_header_bg_color']?$rs['host_header_bg_color']:'';
$host_sidebar_bg_color=isset($rs['host_sidebar_bg_color'])&&$rs['host_sidebar_bg_color']?$rs['host_sidebar_bg_color']:'';
$host_sidebar_text_color=isset($rs['host_sidebar_text_color'])&&$rs['host_sidebar_text_color']?$rs['host_sidebar_text_color']:'';
$smtp_host=isset($rs['smtp_host'])&&$rs['smtp_host']?$rs['smtp_host']:'';
$smtp_port=isset($rs['smtp_port'])&&$rs['smtp_port']?$rs['smtp_port']:'';
$smtp_username=isset($rs['smtp_username'])&&$rs['smtp_username']?$rs['smtp_username']:'';
$smtp_password=isset($rs['smtp_password'])&&$rs['smtp_password']?$rs['smtp_password']:'';
$json_log_history=isset($rs['json_log_history'])&&$rs['json_log_history']?$rs['json_log_history']:'';

include "header.php";

?>







