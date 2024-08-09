<?php



$data['PageName']='Sign in';

$data['PageFile']='sign-in';

$data['noheader']=1;

//print_r($_SESSION['members']);



if(isset($_REQUEST['btn_submit']))

  {

    $Admin_id = $_REQUEST["txt_adminid"];

    $Password = $_REQUEST["txt_password"];

	$Password=hash_f($Password);

    $query = "SELECT * FROM tbl_admin WHERE admin_username = '$Admin_id' AND  admin_password='$Password' AND admin_status='Active' ";

	$result1 = db_rows($query);

	

	//echo $db_counts;  comes from db_rows()

	

    if($db_counts > 0 )

    {

      $row = $result1[0];

	  $_SESSION['admin-info']=$row;

	  $_SESSION['ses_full_name']=$row['admin_full_name'];

	  $_SESSION['ses_email']=$row['admin_email'];

      $_SESSION['s_admin_id'] = $row['admin_id'];

	  $_SESSION['s_admin_username'] = $Admin_id;

        $login_ip=$_SERVER['REMOTE_ADDR'];

		$Login_time=date("Y-m-d H:i:s");

		$admid=$row['admin_id'];

		$_SESSION['sesid']=uniqid();

		$sesid=$_SESSION['sesid'];



        $query_for_login_history = db_query("INSERT INTO tbl_login_history (client_id, login_time, login_ip, login_type,session_id,login_name) VALUES ('$admid','$Login_time','$login_ip','Admin','$sesid','".$row['admin_full_name']."')");

		

      header("location:index.php");exit;

    }

    else

    {

	 $_SESSION['msg_login']="Wrong Username or Password / Account Not Active .";

     header('location:sign-in.php');exit;

    }



  }

  

  if(isset($_REQUEST['Act'])=='Out'){

  unset($_SESSION['ses_full_name']);

  unset($_SESSION['ses_email']);

  unset($_SESSION['s_admin_id']);

  unset($_SESSION['s_admin_username']);

  $sesid=$_SESSION['sesid'];

  unset($_SESSION['host_companyname']);

  $logout_time=date("Y-m-d H:i:s");

  db_query("UPDATE tbl_login_history SET logout_time = '$logout_time' WHERE session_id ='$sesid'");

  unset($_SESSION['sesid']);

  $_SESSION['sesid']="";

  session_destroy();

  $_SESSION['msg_login']="Sign Out Successfully";

  header('location:sign-in.php?y');exit;

  }



include "header.php";

?>







