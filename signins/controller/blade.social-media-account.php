<?php

$data['PageName']='Social Media Account';
$data['PageFile']='social-media-account';

is_admin_session();

if(isset($_POST['sent'])){

$FB_APP_ID=$_POST['FB_APP_ID'];
$FB_APP_SECRET=$_POST['FB_APP_SECRET'];
$FB_REDIRECT_URL=$_POST['FB_REDIRECT_URL'];
$FB_BASE_URL=$_POST['FB_BASE_URL'];
$google_ClientId=$_POST['google_ClientId'];
$google_ClientSecret=$_POST['google_ClientSecret'];
$google_RedirectUrl=$_POST['google_RedirectUrl'];
$linkedin_ClientId=$_POST['linkedin_ClientId'];
$linkedin_ClientSecret=$_POST['linkedin_ClientSecret'];
$linkedin_RedirectUrl=$_POST['linkedin_RedirectUrl'];

$upd = db_query("UPDATE tbl_social_media_account_details SET FB_APP_ID='$FB_APP_ID',
                                                   			 FB_APP_SECRET='$FB_APP_SECRET',
												   			 FB_REDIRECT_URL='$FB_REDIRECT_URL',
															 FB_BASE_URL='$FB_BASE_URL',
												   			 google_ClientId='$google_ClientId',
												   			 google_ClientSecret='$google_ClientSecret',
												   			 google_RedirectUrl='$google_RedirectUrl',
												   			 linkedin_ClientId='$linkedin_ClientId',
												   			 linkedin_ClientSecret='$linkedin_ClientSecret',
												   			 linkedin_RedirectUrl='$linkedin_RedirectUrl'");

if(isset($data['affected_rows'])&&$data['affected_rows']){
$_SESSION['msgok']="Social Media Account Details Updated Successfully";
json_log_upd(1,'host','update'); 
}else{
$_SESSION['msgok']="No Any Update found";
}
header("location:social-media-account.php");exit;
}

// Select Data for display inserted value
$qry = "SELECT * FROM tbl_social_media_account_details";
$rs=db_rows($qry);
$rs=$rs[0];

$FB_APP_ID=isset($rs['FB_APP_ID'])&&$rs['FB_APP_ID']?$rs['FB_APP_ID']:'';
$FB_APP_SECRET=isset($rs['FB_APP_SECRET'])&&$rs['FB_APP_SECRET']?$rs['FB_APP_SECRET']:'';
$FB_REDIRECT_URL=isset($rs['FB_REDIRECT_URL'])&&$rs['FB_REDIRECT_URL']?$rs['FB_REDIRECT_URL']:'';
$FB_BASE_URL=isset($rs['FB_BASE_URL'])&&$rs['FB_BASE_URL']?$rs['FB_BASE_URL']:'';
$google_ClientId=isset($rs['google_ClientId'])&&$rs['google_ClientId']?$rs['google_ClientId']:'';
$google_ClientSecret=isset($rs['google_ClientSecret'])&&$rs['google_ClientSecret']?$rs['google_ClientSecret']:'';
$google_RedirectUrl=isset($rs['google_RedirectUrl'])&&$rs['google_RedirectUrl']?$rs['google_RedirectUrl']:'';
$linkedin_ClientId=isset($rs['linkedin_ClientId'])&&$rs['linkedin_ClientId']?$rs['linkedin_ClientId']:'';
$linkedin_ClientSecret=isset($rs['linkedin_ClientSecret'])&&$rs['linkedin_ClientSecret']?$rs['linkedin_ClientSecret']:'';
$linkedin_RedirectUrl=isset($rs['linkedin_RedirectUrl'])&&$rs['linkedin_RedirectUrl']?$rs['linkedin_RedirectUrl']:'';
$json_log_history=isset($rs['json_log_history'])&&$rs['json_log_history']?$rs['json_log_history']:'';

include "header.php";

?>







