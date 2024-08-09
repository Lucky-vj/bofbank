<?php
ob_start();
@session_start();
$iex='.php';
//$_SESSION['iex']=$iex;
$data['phpv']=(int)phpversion();		//define php version
$data['all_host']=array();				//define array
$data['ex']=''; $data['css']='';$data['js']='';	//Initialized variables with null or empty
$data['css']='.css';$data['js']='.js';		//define js and css extension
$data['ex']='.php';					//define file extension
$data['iex']=$iex;					//define extension for include files
$data['Path']=dirname(__FILE__);	//define root directory path
$data['DateFormat']='m/d/y H:i';
//$data['action-page']='controller';
//$data['action-prefix']='controller';
$data['noheader']=0;    // for show hide header on page
$data['DbPrefix']="tbl_"; // Table prefix
date_default_timezone_set("Asia/Kolkata"); // Set default timezone

$data['email-from-name']='ITIO Payment Bank';  // Set From Name for Mailer
$data['email-from-email']='support@gatewayeast.com';   // Set Email Name for Mailer


//Initialized localhost as false
$localhosts=false;
$data['localhosts']=false;

//$_SESSION["http_host_loc"]=1;
//echo "<br/>http_host=>".$_SESSION["http_host_loc"];
if($_SERVER["HTTP_HOST"]=='localhost'||isset($_SESSION["http_host_loc"])){	//check localhost or not, if yes then define localhost in data and set true
	$localhosts=true; 
	$data['localhosts']=true; 
}



################################################################################
$protocol = isset($_SERVER["HTTPS"])?'https://':'http://';	//Server and execution environment information
$urlpath=$protocol.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];	//The URI which was given in order to access this page;
$data['urlpath']=$urlpath;
if (strstr($data['urlpath'], 'signins')) {
    $data['login_type']="Admin";
} else {
    $data['login_type']="User";
}

$data['loginSingForgotMsg']='';

//For the protocol, you may or may not have $_SERVER['HTTPS'] and it may or may not be empty. For the web root
if(isset($_SERVER["HTTPS"])&&$_SERVER["HTTPS"]=='on')$data['Prot']='https';else $data['Prot']='http'; 

if ((strpos($_SERVER["HTTP_HOST"], "loadbalancer" ) !== false)) {
	$data['Prot']='http'; 
}
//Initialized variables with relavant values
$data['subfolder']='';
$data['domain_name']=$_SERVER["HTTP_HOST"];
$data['domain_url']=$protocol.$data['domain_name'];
$data['domain_logo']=$data['domain_url'].'/logo.png'; // Set Logo
$data['SiteName']=stripslashes($_SERVER["HTTP_HOST"]);
###############################################################################
if($data['localhosts']==true)	        //if you browse in local system then execute following section
{
$folder='';
}else{
$folder='';
}

//$data['Folder']=basename(__DIR__) ;
$data['Folder']=$folder;
##############################################################################
    $db_hostname='localhost';	        // mysql host name
	
	// For Boof ebank Server
	$db_username= 'bofbank_ebank_master';		// mysql user name
	$db_password= '7qoVFa#ATF0X';		// mysql db_password
	$db_database= 'bofbank_ebank_master';		// mysql db_name
	
	// For Boof Root Server
	//$db_username= 'bofbank_new-db';		// mysql user name
	//$db_password= '4--RLP_5gyGT';		// mysql db_password
	//$db_database= 'bofbank_new-db';		// mysql db_name
	
	// For Amazon Server
	//$db_username= 'userbof';		// mysql user name
	//$db_password= 'hiSS1qLBKocwQKS9aIQjkd';		// mysql db_password
	//$db_database= 'bof';		// mysql db_name
	
$data['localhosts']=$localhosts;

if($data['localhosts']==true)	        //if you browse in local system then execute following section
{
	$subfolder_ex=explodef($data['urlpath'],'/',3);
	$data['subfolder']='/'.explodef($data['urlpath'],'/',3);	//sub folder name
	//define url protocol for localhost 
	$data['HostG']="{$data['Prot']}://localhost".$data['subfolder'];
	$data['HostN']="localhost";
	$data['SERVER_ADDR']=$_SERVER['SERVER_ADDR'];	// The IP address of the server under which the current script is executing. 
	$url_ip=$data['Prot']."://".$data['SERVER_ADDR'];
	$data['SERVER_ADDR_PRA']=$_SERVER['SERVER_ADDR'];	// The IP address of the server under which the current script is executing. 
			
	$db_hostname='localhost';	         // mysql host name
	$db_username='root';		         // mysql user name
	$db_password='';			         // mysql db_password
	$db_database='bofbank_ebank_master';		 // mysql db_name
	
	$data['MYWEBSITE']='Website'; 
	$data['MYWEBSITEURL']='website';
	$data['TimeZone']='Asia/Kolkata'; // UTC || Asia/Singapore || Asia/Kolkata

}


$data['PORT'] = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';		//define port
if($_SERVER['SERVER_PORT']==443||$_SERVER['SERVER_PORT']==80){$data['PORT']='';}
if($data['Folder'])$data['Folder']="/{$data['Folder']}";	//define folder
$data['Addr']="{$_SERVER['REMOTE_ADDR']}";			//define bill_ip
$data['Host']="{$data['Prot']}://{$_SERVER['HTTP_HOST']}{$data['PORT']}{$data['subfolder']}{$data['Folder']}";	//define host name including port and folder

$data['Admins']="{$data['Host']}/signins"; // path of admin panel
$data['Admins-Home']="{$data['Admins']}/index".$data['ex']; // path of admin panel
$data['Host-Home']="{$data['Host']}/index".$data['ex']; // path of admin panel


error_reportingf(0);

//=============================Mysql Connection=============
$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);

// required data for Connect with function//
$data['testEmail_1']="vikashg@itio.in";
$data['Hostname']=$db_hostname;
$data['Username']=$db_username;
$data['Password']=$db_password;
$data['Database']=$db_database;

include "config_mysqli".$data['ex'];
db_connect(); // Database Connection

include "functions".$data['ex'];  // include function files
include "functions_email".$data['ex'];  // include Mail function files
include "common/fontawasome_icon".$data['ex']; // include FW icon files
include "available_currency".$data['ex'];

// Fetch Host Detail from db 
if(empty($_SESSION['host_companyname'])){

$selhost = "SELECT * FROM tbl_host";
$hostv=db_rows($selhost);

	if(isset($data['db_rows_count'])&&$data['db_rows_count']>0){
	$hostv=$hostv[0];
	$_SESSION['domain_server']=$hostv;
	unset($_SESSION['domain_server']["json_log_history"]);
	$_SESSION['host_companyname']=$hostv['host_full_name'];
	$_SESSION['host_logo']=$hostv['host_logo'];
	$_SESSION['host_favicon']=$hostv['host_favicon'];
	$_SESSION['host_header_bg_color']=$hostv['host_header_bg_color'];
	$_SESSION['host_sidebar_bg_color']=$hostv['host_sidebar_bg_color'];
	$_SESSION['host_sidebar_text_color']=$hostv['host_sidebar_text_color'];
	$_SESSION['host_email']=$hostv['host_email'];
	$_SESSION['host_name']=$hostv['host_name'];
	$_SESSION['smtp_host']=$hostv['smtp_host'];
	$_SESSION['smtp_port']=$hostv['smtp_port'];
	$_SESSION['smtp_username']=$hostv['smtp_username'];
	$_SESSION['smtp_password']=$hostv['smtp_password'];
	}
}

if(isset($_SESSION['host_logo'])&&$_SESSION['host_logo']){ $web_logo=$_SESSION['host_logo'];}else{ $web_logo="images/logo2.png";}
$hostv_companyname=$_SESSION['host_companyname'];
$host_logo=$_SESSION['host_logo'];

// For Reference Latter Logo
//echo $data['reference_latter_logo']=$data['Host']."/images/logo.png";
//$data['reference_latter_logo']=$data['Admins']."/img/".$_SESSION['host_logo'];
$data['reference_latter_logo']=$_SESSION['host_logo'];

//define Admin Type
$data['status']=array(
    0=>('Deleted'),
	1=>('Active'),
	2=>('Deactive'),
	3=>('Pending'),
);

//define IBAN Type
$data['IBAN_Type']=array(
	1=>('Basic'),
	2=>('Regular'),
	3=>('Kingdom'),
	4=>('Super'),
);

//define IBAN Status
$data['ibanstatus']=array(
    0=>('Pending'),
	1=>('Active'),
	2=>('Deactive'),
);

//define Search Type
$data['searchkey']=array(
    1=>('transaction_id'),
	2=>('transaction_amount'),
	3=>('converted_transaction_amount'),
	4=>('transaction_status'),
);

//define Search Type for IBAN 2s
if($_SESSION['default_IBAN_issuer']==4){
	$data['searchkey']=array(
		1=>('transactionid'),
		2=>('amount'),
		3=>('amount'),
		4=>('status'),
	);
}

//define Admin Type
if($_SESSION['default_IBAN_issuer']==3){
	$data['searchkey']=array(
		1=>('transactionId'),
		2=>('transactionAmount'),
		3=>('transactionAmount'),
		4=>('status'),
	);
}

//define TransactionStatus Status
if($_SESSION['default_IBAN_issuer']==4){
	$data['TransactionStatus']=array(
		'Success'=>('Success'),
		'Pending'=>('Pending'),
		'Failed'=>('Failed'),
	);
}elseif($_SESSION['default_IBAN_issuer']==3){
	$data['TransactionStatus']=array(
		'Processed'=>('Processed'),
		'Pending'=>('Pending'),
		'Failed'=>('Failed'),
	);
}else{
	$data['TransactionStatus']=array(
		'Success'=>('Success'),
		'Process'=>('Process'),
		'Failed'=>('Failed'),
		'Rejected'=>('Rejected'),
	);
}

//define Admin Type
$data['pg']=array(
	1=>('Default Payment Manually'),
	2=>('Stripe'),
);

//define Account Data with stylopay
$data['stylopay']=array(
	"title"=>('title'),
	"firstName"=>('first_name'),
	"lastName"=>('last_name'),
	"gender"=>('gender'),
	"dateOfBirth"=>('birth_date'),
	"mobileCountryCode"=>('country_code'),
	"mobile"=>('mobile'),
	"nationality"=>('nationality'),
	"deliveryAddress1"=>('address_line1'),
	"deliveryAddress2"=>('address_line2'),
	"deliveryCity"=>('city'),
	"deliveryState"=>('state'),
	"deliveryCountry"=>('country'),
	"deliveryZipCode"=>('pincode'),
);

//The explodef() function_breaks a string into an array. Default explode via dot (.).
function explodef($str,$explode='.',$no=-1){
	if(strpos($str,$explode)!==false){
		$array=explode($explode, $str);
		if($no!=-1){
			return $array[$no];		//return define array element
		}else{
			return $array;	//return full array
		}
	}else{
		return $str;
	}
}

###############################################################################
$data['key_no']=1;
$data['sec_key']=array(1=>'u2R5KQzHGAgbTHgOljT5oiC0kIxkrE62',2=>'18hlapax9alku0p4Yl92QXbNUDnWieHb');
$data['pub_key']=array(1=>'ogHVlE6Go1VEl4RWH3dkEEwC1xse8Lam',2=>'xzicriZsWREIDoPTg2WfnzTsNOKicWkq');
###############################################################################


//The function_prndate() return the date in customized format if DATE is valid, return '---' if not a valid DATE.
function prndate($date){
	global $data;
	//$date=str_replace("PM","",$date); $date=str_replace("AM","",$date);
	if($date=='0000-00-00 00:00:00')return '---';
	else return date($data['DateFormat'], strtotime($date));
}


//Get iban title
function get_iban_title($rec_data){
	global $data;
	$getiban=explode("||",$rec_data);
    $IBAN_issuer_default=$getiban[1];
    if($IBAN_issuer_default==""){$IBAN_issuer_default=1;}
	return $data['IBAN_Type'][$IBAN_issuer_default];
	exit;
	
}

//Get Default IBAN ID
function get_iban_id($clientid){
global $data;
	
$result=get_select_list("tbl_iban_issuer_account_details","`IBAN_issuer`", " AND `client_id`='$clientid' AND `IBAN_isdefault`=1 ORDER BY IBAN_issuer ASC LIMIT 1 ");

$iban_result=$result[0]['IBAN_issuer'];
if($iban_result==""){
$result=get_select_list("tbl_iban_issuer_account_details","`IBAN_issuer`", " AND client_id='$clientid' ORDER BY IBAN_issuer ASC LIMIT 1 ");
$iban_result=$result[0]['IBAN_issuer'];
}
if($iban_result==""){
$result=get_select_list("tbl_iban_issuer","`IBAN_isdefault`", " AND IBAN_isdefault=1 ");
$iban_result=$result[0]['ID'];
}

$_SESSION['default_IBAN_issuer']=$iban_result;
return $iban_result;

}

//Get iban title
function get_iban_list($clientid){
	global $data;
	//echo $clientid;

$IBAN_issuer=db_rows("SELECT `IBAN_issuer`,`iban_order_status` FROM tbl_iban_issuer_account_details WHERE 1 AND client_id='$clientid' AND (Status=1 || iban_order_status=1)");


	foreach($IBAN_issuer as $key=>$list) {
	if($list['iban_order_status']==1){ $labelIBAN="Requested IBAN";}else{ $labelIBAN=get_iban_account_number($clientid,$list['IBAN_issuer']); }
	
	echo '<li><a class="dropdown-item changeiban" data-iban="'.$list['IBAN_issuer'].'" title="Make Default">'.$labelIBAN.'</a></li>';
	}

}
//generate password
function hash_f($password){
	$result=$password;
	if($password){
		$result=hash('sha256', $password);	
	}
	return $result;
}

//Get Member Details(
function get_member_details($mid){
 global $data;	
	$query = "SELECT *  FROM tbl_client_master WHERE client_id='$mid'";
	$result = db_rows($query);
	$account_details = $result[0];
    $_SESSION['members']=$account_details;
	unset($_SESSION['members']["password"]);
	unset($_SESSION['members']["json_log_history"]);
	unset($_SESSION['members']["otp"]);
    
	return $account_details;
}

//Get Member Details with seperate fields
function member_details($memid,$ffields=""){
global $data;
if($ffields==""){ $ffields="*"; }
$seluserdetail=db_rows("SELECT $ffields FROM tbl_client_master WHERE client_id='$memid'");
$result=$seluserdetail[0];

return $result;

}

//Get Member Username
function member_username($memid){
global $data;
$seluserdetail=db_rows("SELECT `username` FROM `tbl_client_master` WHERE `client_id`='$memid'");
$result=$seluserdetail[0]['username'];
return $result;
}

//Get Username exixt or not
function check_username($username){
global $data;
$username=trim($username);
$query = db_rows("SELECT `client_id` FROM `tbl_client_master` WHERE `username`='$username'",0);
$cnt=$data['db_rows_count'];
return $cnt;
}

//Get IBAN Account Number
function get_iban_account_number($client_id, $IBAN_issuer){
global $data;
$seluserdetail=db_rows("SELECT `accountid`,`accountNumber`,`iban_order_status` FROM `tbl_iban_issuer_account_details` WHERE `client_id`='$client_id' AND `IBAN_issuer`='$IBAN_issuer'");
if($seluserdetail[0]['iban_order_status']==1){
$result="Requisted IBAN";
}else{
$result=$seluserdetail[0]['accountNumber'];
if(empty($result)){ $result=$seluserdetail[0]['accountid']; }
if(empty($result)){ $result=$result="Requisted IBAN"; }
}
return $result;
}

//Get IBAN Account Number
function set_iban_status($client_id, $IBAN_issuer, $status){
global $data;
$updatestatus=db_query("UPDATE `tbl_iban_issuer_account_details` SET `Status`='$status',`iban_order_status`=0 WHERE `client_id`='$client_id' AND `IBAN_issuer`='$IBAN_issuer'");

//if($result){ $result=1;}else{$result=0;}
return $result;
}



//Store IBAN Data in Session(
function store_iban_data($Client_ID,$default_IBAN_issuer){
 global $data;	
 $query = "SELECT IBAN_issuer,accountName,accountid,accountNumber,sponsorBankName,currency,Status,iban_order_status FROM `tbl_iban_issuer_account_details` WHERE `client_id`='$Client_ID' AND `IBAN_issuer`='$default_IBAN_issuer'";
	$result = db_rows($query);
	$iban_details = $result[0];
    $_SESSION['IBANDATA']=$iban_details;
	return $account_details;
}

//Get Full Country Name By Country Short Code
function get_countryname($countrycode){
global $data;
$countrycode=trim($countrycode);
$rs=db_rows("SELECT `country` FROM `tbl_country` WHERE 1 AND ((`ISO_2_DIGIT`='$countrycode') OR (`ISO_3_DIGIT`='$countrycode'))",);
$result=$rs[0]['country'];
return $result;
}

//Get Full Country Short Code By Country Name 
function get_countrycode($country,$digit){
global $data;
$country=trim($country);
$rs=db_rows("SELECT * FROM `tbl_country` WHERE 1 AND `country`='$country'",1);

if($digit==2){
$result=$rs[0]['ISO_2_DIGIT'];
}elseif($digit==3){
$result=$rs[0]['ISO_3_DIGIT'];
}else{

}
return $result;
}


//check data exist or not(
function table_data_availability($tbl_name,$where){
    global $data;	
	$query = db_rows("SELECT * FROM $tbl_name WHERE 1 $where",0);
	$cnt=$data['db_rows_count'];
	return $cnt;
}
// For Generate Account Number and assign default bank
function assign_accountno_and_bank($mid){
global $data;	
$acno=date("ym").substr("0000000{$mid}", -6);
update_member_details($mid, "`assign_account`", $acno);
$_SESSION['members']['assign_account']=$acno;
set_default_bank_account($mid);
return true;
}

// For Generate IBAN Account Number for Basic & Regular IBAN Account according to assign Format from IBAn issuer By Admin
function assign_account_number($mid, $ibanissuer ){
global $data;	
$format=get_field_name_by_id("tbl_iban_issuer","IBAN_account_format","ID",$ibanissuer);

	if($format){
	$format=$format[0]['IBAN_account_format'];
	$format=str_replace("[ID]",$mid,$format);
	$format=str_replace("[MMYY]",date("my"),$format);
	$format=str_replace("[YYMM]",date("ym"),$format);
	$_SESSION['members']['assign_account']=$acno;
	}
	
return $format;
}

//Get Update Member Details with seperate fields
function update_member_details($memid, $fieldname, $fieldval){
global $data;
$upddetail=db_query("UPDATE `tbl_client_master` SET $fieldname='$fieldval'  WHERE client_id='$memid'");
return $upddetail;
}

//Get Update Member Details with multi  fields
function update_member_multi_fields($memid, $fieldnames){
global $data;
$upddetail=db_query("UPDATE `tbl_client_master` SET $fieldnames  WHERE client_id='$memid'");
return $upddetail;
}

//Get Update Member Details with seperate fields
function set_default_bank_account($memid){
global $data;
$result=get_select_list("tbl_common_bank_account","bank_id",$where_pred=' AND bank_isdefault=1 ');
$assign_bank=$result[0]['bank_id'];

$cnt=table_data_availability("tbl_member_bank_account"," AND client_id='$memid' AND assign_bank='$assign_bank'");
if($cnt==0){
$ins = db_query("INSERT INTO tbl_member_bank_account SET client_id='$memid', assign_bank='$assign_bank', bank_addedon=now()");
}
return $ins;
}


//Store Member Login Session(
function store_login_session($sess_array){
    global $data;

        $_SESSION["s_status"]=$sess_array['status'];;
        $_SESSION["s_client_id"] = $sess_array['client_id'];
		$client_id =$_SESSION["s_client_id"];
        $_SESSION["s_login"] = date("Y-m-d H:i:s");
		$_SESSION["s_username"] = $sess_array['username'];
		$username=$_SESSION["s_username"];
		$_SESSION["s_first_name"] = $sess_array['first_name'];
		$_SESSION["s_last_name"] = $sess_array['last_name'];
		$_SESSION["s_assign_account"] = $sess_array['assign_account'];
		$_SESSION["s_assign_currency"] = $sess_array['assign_currency'];

        $Login_time = $_SESSION["s_login"];
        $login_ip=$_SERVER['REMOTE_ADDR'];
        // insert record of login time
        $_SESSION['sesiduser']=uniqid();
		$sesid=$_SESSION['sesiduser'];
		unset($_SESSION['members']["password"]);
	unset($_SESSION['members']["json_log_history"]);
	unset($_SESSION['members']["otp"]);
        $query_for_login_history = "INSERT INTO tbl_login_history (client_id, login_time, login_ip, session_id,login_name) VALUES ($client_id,'$Login_time','$login_ip','$sesid','$username')";

        $result_for_login_history = db_query($query_for_login_history);
        
       
}

//Verify OTP
function verify_opt($mid,$otp){
    global $data;
    $tbl_name="tbl_client_master";	
	$query = "SELECT client_id FROM $tbl_name WHERE otp='{$otp}' AND client_id='{$mid}'";
	$result = db_rows($query);
	$cnt=$data['db_rows_count'];
	return $cnt;
}

//Generate OTP

function generate_otp($mid,$name,$email){
global $data;
$rand=rand('9087','2439');
$fire_Result=db_query("update tbl_client_master set otp='$rand' where client_id='$mid'");
//////Mail Start/////// 
$template="OTP";
$postvar['fullname']=$name;
$postvar['sitename']="ITIO Bank";
$postvar['otp']=$rand;
$postvar['email']=$email;
sent_template_mail($template,$postvar);
//////Mail End///////

}

function encryption_value($rec_data){
$ciphering_value = "AES-128-CTR";
$encryption_key ="ITIO";
$encryption_value = @openssl_encrypt($rec_data, $ciphering_value, $encryption_key); 
return $encryption_value;
}

function decryption_value($rec_data){
$ciphering_value = "AES-128-CTR";
$decryption_key ="ITIO";
$decryption_value = @openssl_decrypt($rec_data, $ciphering_value, $decryption_key);
return $decryption_value;
}

// fetch user balance
function fetch_user_balance($memid){
global $data;
$balamt=0.00;  
$sql=db_rows("select converted_transaction_currency,converted_transaction_amount,transaction_type from  tbl_master_trans_table where member_id='$memid' and transaction_status='Success' order by `transaction_id` asc");
foreach($sql as $key=>$rs) {
 
if($rs['transaction_type']=="Credit"){
$balamt=($balamt + $rs['converted_transaction_amount']);
}else{
$balamt=($balamt - $rs['converted_transaction_amount']);
}

$curr=$rs['converted_transaction_currency'];

}
$curr=isset($curr)&&$curr?$curr:'';
$balamt=$curr." ".amount_format($balamt);

return $balamt;

}

// fetch user balance
function fetch_user_balance_amt($memid){
global $data;
$balamt=0.00;  
$sql=db_rows("select converted_transaction_amount,transaction_type from  tbl_master_trans_table where member_id='$memid' and transaction_status='Success' order by `transaction_id` asc");
foreach($sql as $key=>$rs) {
 
if($rs['transaction_type']=="Credit"){
$balamt=($balamt + $rs['converted_transaction_amount']);
}else{
$balamt=($balamt - $rs['converted_transaction_amount']);
}


}
$balamt=amount_format($balamt);

return $balamt;

}

// change Amount Display Format
function amount_format($amt){
$amt=number_format((float)$amt, 2, '.', '');
return $amt;
}

/// Check Admin Session

function is_admin_session(){
 global $data;
 if(isset($_SESSION['s_admin_id'])&&$_SESSION['s_admin_id']){
 }else{
 $_SESSION['msg_login']="Access Denied ";
 $redirect=$data['Admins']."/sign-in".$data['ex'];
 header("location:{$redirect}");
 exit;
 }

}

/// Check Member Session

function is_member_session(){
 global $data;
 if(isset($_SESSION['s_client_id'])&&$_SESSION['s_client_id']){
 $clientID=$_SESSION['s_client_id'];
 }else{
 $_SESSION['msg_login']="Access Denied ";
 $redirect=$data['Host']."/sign-in".$data['ex'];
 header("location:{$redirect}");
 exit;
 }

}
/// Check Member Status
function is_member_status(){
 global $data;
 if(isset($_SESSION['s_status'])&&$_SESSION['s_status']=="New"){
 // Set Default IBAN ID
if($_SESSION['default_IBAN_issuer']==""){
$ibanapi=get_select_list("tbl_iban_issuer","`ID`", " AND IBAN_isdefault=1",1);
$_SESSION['default_IBAN_issuer']=$ibanapi[0]['ID'];
}
 $redirect=$data['Host']."/account-summary".$data['ex'];
 header("location:{$redirect}");
 exit;
 }

}

/// Check Page Access Permission by Assign IBAN
function member_page_access_permission($pid){
 global $data;
 if(($_SESSION['default_IBAN_issuer']==2)&& $pid=1){$pid=2;}
 if(($_SESSION['default_IBAN_issuer']==$pid)&&($_SESSION['IBANDATA']['Status']==1)){
 //echo "Access";
 }else{
 // Set Default IBAN ID
if($_SESSION['default_IBAN_issuer']==""){
$ibanapi=get_select_list("tbl_iban_issuer","`ID`", " AND IBAN_isdefault=1",1);
$_SESSION['default_IBAN_issuer']=$ibanapi[0]['ID'];
}
 $redirect=$data['Host']."/account-summary".$data['ex'];
 header("location:{$redirect}");
 exit;
 }

}

//This function is used to fetch list of fields
function get_select_list($tblname,$fields='*',$where_pred=''){
	global $data;
	$table_list=db_rows("SELECT $fields FROM `$tblname` WHERE 1 ".$where_pred,0);
	return $table_list;	//return subadmin list
}

//This function is used to fetch Field Name from ID
function get_field_name_by_id($tblname,$fieldname,$tableidname,$tableid){
	global $data;
	$table_list=db_rows("SELECT $fieldname FROM `$tblname` WHERE 1 AND  $tableidname='$tableid' LIMIT 1 ",0);
	return $table_list;	//return subadmin list
}

//This function is used to fetch IBAN Account Details
function get_iban_account_details($userid, $ibanid){
	global $data;
	$result=db_rows("SELECT `accountid`, `currency`, `availableBalance`, `accountNumber` FROM `tbl_iban_issuer_account_details` WHERE 1 AND  IBAN_issuer='$ibanid' AND client_id='$userid' LIMIT 1 ",0);
	return $result;	//return subadmin list
}

//This function is used to fetch Field Name from ID
function get_kyc_name_by_id($tableid){
	global $data;
	$result=db_rows("SELECT `KYC_provider` FROM `tbl_kyc_provider` WHERE 1 AND  `ID`='$tableid' LIMIT 1 ",0);
	return $result[0]['KYC_provider'];	//return subadmin list
}

function crypro_exchange_value($curr_from,$curr_to){
global $data;
$xx=$curr_from." !!- ".$curr_to;
 
 global $data;
$qry="SELECT `exchange_value` FROM tbl_crypto_exchange_rate WHERE currency_from='$curr_from' AND currency_to='$curr_to' AND status=1";

$rs=db_rows($qry);
$result=$rs[0]['exchange_value'];

//return $result;

return $result;
}

//The json_log_upd() used to update logs in JSON format
function json_log_upd($tableId=0,$tableName='json_log',$action_name='Update',$tablefieldidname='id'){
	
	global $data;$qp=0;
	
	if(isset($_GET['qp'])){
		$qp=1;
	}
	if($action_name=='action'){
		if(isset($_GET['action'])&&$_GET['action']){
			$action_name=$_GET['action'];	//action name from url
		}
	}
	
	//fetch login detail from $_SESSION
	
	
	if(isset($_SESSION["s_admin_username"])&&$_SESSION["s_admin_username"]&&$data['login_type']=="Admin"){
		$admin_id=$_SESSION['s_admin_id']." : ".$_SESSION["s_admin_username"]." - ".$_SESSION['ses_full_name'];
	}elseif(isset($_SESSION["s_username"])&&$_SESSION["s_username"]&&$data['login_type']=="User"){
		$admin_id=$_SESSION['s_client_id']." : ".$_SESSION["s_username"]." - ".$_SESSION['s_first_name']." ".$_SESSION['s_last_name'];
	}else{
			$admin_id='Admin...';
	}
	
	
	
	$tablefieldidname;
	
	//echo $admin_id;exit;
	$pLog=[];
	$dat=[];
	
	if($tableId>0){
		//fetch previous store json log history
		$log_slc=db_rows(
			"SELECT * FROM `{$data['DbPrefix']}{$tableName}`".
			" WHERE `{$tablefieldidname}`='{$tableId}' LIMIT 1",$qp
		);
		$pLog=(isset($log_slc[0]['json_log_history'])?$log_slc[0]['json_log_history']:'');
		if(isset($_REQUEST['viewaction'])){
			$dat['view_log_name']=$_REQUEST['viewaction'];	//log name
			
		}else{
			$dat=(isset($log_slc[0])?$log_slc[0]:''); // current log
		}
		
		//unset following keys value of $dat array
		if(isset($dat['json_log_history'])) unset($dat['json_log_history']);
		if(isset($dat['templates_log'])) unset($dat['templates_log']);
		if(isset($dat['previous_passwords'])) unset($dat['previous_passwords']);
		if(isset($dat['manual_adjust_balance_json'])) unset($dat['manual_adjust_balance_json']); 
		if(isset($dat['more_details'])) unset($dat['more_details']);
		
		$dat1=[];
		$dat1['ip_address']=((isset($_SERVER['HTTP_X_FORWARDED_FOR'])&&$_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);			//access IP
		$dat1['devinm']=encode_f(php_uname('n'),0);					//fetch Host name
		$dat1['miscellaneous']=encode_f(php_uname().' '.PHP_OS,0);	//fetch operating system PHP is running on
		if(isset($_SERVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']){
			$dat1['HTTP_REFERER']=$_SERVER['HTTP_REFERER'];			//referer url
		}
		if(isset($dat)&&is_array($dat)){
			foreach($dat as $ke=>$va){
				if((json_decode($va) == null)&&(preg_match('/^[\[\{]\"/', $va))){
					//echo "<br/>json missing: ".$ke."=>".$dat[$ke];
					unset($dat[$ke]);
					unset($dat1[$ke]);
				}else{
					$dat1[$ke]=isJsonEn($va);	//encode array to json
					//echo "<br/>".$ke."=>".$dat[$ke];
				}
			}
		}
		$dat=$dat1;
		//exit;
		
		
		
		
	}else{
		$pLog=""; // string json
		$dat=$log; // array 
	}
	
	//$diff_count="";
	$diff_count=0;
	
	if($pLog){
		//echo $pLog;
		$pLog_re=str_replace(array('<diff>','</diff>'),'',$pLog);
		//echo "<hr/>pLog_re=>".$pLog_re;
		
		$pLog_de=jsondecode($pLog_re,1,1);	//json decode - json to array
		//echo "<hr/>print_r pLog_de =>"; print_r($pLog_de);echo "<br/><hr/>";
		//$pLog_count=sizeof($pLog_de);

		if(isset($pLog_de)){
			error_reportingf(0);				// Turn off all error reporting

			$diff_ar=[];
			$datde_ar=$dat;
			$pLog_de_end1=end($pLog_de);
			$pLog_de_end_log_log=$pLog_de_end1['log_log'];
			
			if(isset($pLog_de_end_log_log)&&$pLog_de_end_log_log&&isset($datde_ar)&&$datde_ar) $diff_ar = array_diff($datde_ar,$pLog_de_end_log_log);

			$dat_1=[];
			if($diff_ar){
				foreach($diff_ar as $key=>$value){
					$dat_1[$key]="<diff>".$value."</diff>";
					//echo "<hr/>diff=>".$dat[$key];
					$diff_count++;
				}
				$dat=array_merge($dat,$dat_1);
			}
		}
	}
	
	
	$dat['url_get']=$data['urlpath'];
	
	$cLog['log_user']=$admin_id;
	$cLog['log_date']=date('Y-m-d H:i:s A');
	$cLog['log_action']=$action_name;
	$cLog['log_url']=$data['urlpath'];
	$cLog['log_count']=$diff_count;
	$cLog['log_log']=($dat);
	$t_log=json_log($pLog,$cLog);
	
	//echo "<hr/>t_log1=>".$t_log1=jsonencode($cLog);
	
	//exit;
	
	if($qp){
		echo $t_log; 
	}
	
	if(isset($data['JSON_INSERT'])&&$data['JSON_INSERT']){
		$tableId=0;	
	}
	
	if($tableId>0){
		//update json log history in defined table
		db_query("UPDATE `{$data['DbPrefix']}{$tableName}`".
		" SET `json_log_history`='{$t_log}' WHERE `{$tablefieldidname}`='{$tableId}'",$qp);
		//exit;
	}
	
}

//The encode_f() used to encode the string / email with KEY via using "AES-256-CBC" has sha256 method base on openssl_decrypt and base64_decode.
function encode_f($string,$json=1) {
	global $data;	//call globally

	$key=$data['key_no'];	//key number
	$secret_key=$data['sec_key'][$key];	//secret key
	$public_key=$data['pub_key'][$key];	//public key
	$output = false;
	$encrypt_method = "AES-256-CBC";		//encryption method
	$iv = substr( hash( 'sha256', $public_key ), 0, 16 );
	$output = rtrim( strtr( base64_encode( openssl_encrypt( $string, $encrypt_method, $secret_key, 0, $iv ) ), '+/', '-_'), '=');
	if($json==1){
		$output='{"decrypt":"'.($output).'","key":"'.$key.'"}';
	}elseif($json==2){
		$output='{"decrypt":"'.($output).'","key":"'.$key.'","gt":"'.time().'"}';	//add key generate time - Rajnesh - 26-09-2022
	}
	return $output;	//return encrypt string
}

//The decode_f() used to decode the string / email with KEY via using "AES-256-CBC" has sha256 method base on openssl_decrypt and base64_decode.
function decode_f($string,$json=1) {
	global $data;			//call globally
	$key=$data['key_no'];	//key number
	$output = false;

	if($json&&(strpos($string,'decrypt')!==false)){ 
		$string_json=json_decode($string,1);	//json to array
		$string=$string_json['decrypt'];		//decrypted value
		$key=(int)$string_json['key'];
	}

	$secret_key		= $data['sec_key'][$key];	//secret key
	$public_key		= $data['pub_key'][$key];	//public key
	$encrypt_method = "AES-256-CBC";			//encryption method type
	
	$iv = substr( hash( 'sha256', $public_key ), 0, 16 );
	$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $secret_key, 0, $iv );

	return $output;	//return decrypt string
}

//The isJsonDe() used to returns the value encoded in json in appropriate PHP type. Values true , false and null are returned as true, false and null respectively. null is returned if the json cannot be decoded or if the encoded data is deeper than the nesting limit.
function isJsonDe($string) {
	return (json_decode($string) == null) ? $string : json_decode($string,true) ;
}

//The isJsonEn() used to returns a string containing the JSON representation of the supplied array.
function isJsonEn($string) {
	if(is_array($string)){
		
	}elseif (preg_match('/^[\[\{]\"/', $string)) {
		$string=isJsonDe($string);		//json to array
		$string=jsondecode($string);	//json to array
	}
	return $string;
}

//The createJsonf() used to returns a string containing the JSON representation of the supplied value.
function createJsonf($jParam,$jData){
	$result=array();
	$jDataArray=isJsonEn($jData);	//array to json
	//$jDataArray=isJsonDe($jData);
	if(is_array($jDataArray)){
		$result=$jDataArray;
	}else{
		$result[$jParam]=$jData;
	}
	return json_encode($result);	//return json string
}

//The json_log() function_is used to merge two JSON object.
function json_log($pLog='',$cLog='',$compare=0){
	$size=1;
	$mLog=[];
	$pLog=jsondecode($pLog);// convert a JSON object to a PHP array.

	if($pLog){
		$pLog_count=sizeof($pLog);
		if($pLog_count){
			$size=($pLog_count+$size);
		}
	}
	//$mLog[$size]=jsondecode($cLog);
	//$cLog_en=jsonencode($cLog);
	
	$mLog[]=jsondecode($cLog);
	//$mLog[$size]=jsondecode($cLog_en);

	if(is_array($pLog)&&is_array($mLog)){ 
		$mLog=array_merge($pLog,$mLog);		//merge log array
	}
	//print_r($mLog);exit;
	$mLog=jsonencode($mLog);// convert a PHP array to a JSON object
	$mLog=str_replace(array('"{','}"','"[',']"'),array('{','}','[',']'),$mLog);	//fixed error
	return $mLog;	//return json
}

//to remove some unwanted words and unpair symbols from a JSON.
function jsonreplace($str)
{	
	if(is_string($str)){
	
		//returns a string or an array with all occurrences of search in subject (ignoring case) replaced with the given replace value.
		$str = str_ireplace(array('onmouseover','onclick','onmousedown','onmousemove','onmouseout','onmouseup','onmousewheel','onkeyup','onkeypress','onkeydown','oninvalid','oninput','onfocus','ondblclick','ondrag','ondragend','ondragenter','onchange','ondragleave','ondragover','ondragstart','ondrop','onscroll','onselect','onwheel','onblur',"'"), '', $str );
		$str=str_replace(array('[productName],'),'",',$str);
		$str=str_replace(array('[productName]},"'),'"},"',$str);
		$str=str_replace(array('],"data"'),']","data"',$str);
		$str=str_replace(array('”', '“'),'"',$str);
		$str=str_replace(array('{order_token},'),array('{order_token}",'),$str);
		$str=str_replace(array('}rn"}'),array('}}'),$str);
		//$str = str_replace(array('[{','}]'), array('{','}'), $str );
	}
	return $str;
}

//The parseStringf() function_is used to remove unpair symbols from a json. eg. \, ", ' etc. 
function parseStringf($string) {
	$string = str_replace("\\", "", $string);
	$string = str_replace('"{', "{", $string);
	$string = str_replace('}"', "}", $string);
	return '"'.$string.'"';
}

//The jsonencode1() function_is used to encode a array into JSON format.
function jsonencode($str,$theTrue='', $skip=0){
	
	if (is_array($str)){ 
		$str=json_encode($str, JSON_UNESCAPED_UNICODE);	//array to json
	}else{
		$str=str_replace(array('{,{'),'{{',$str);	//fixed json error
	}
	if($skip==0 || empty($skip))
	{
		$str=parseStringf($str);	//remove unpair brackes
		$str=stripslashes($str);
	}
	$str=ltrim($str,'"');	//remove double quote (") from start if available
	$str=rtrim($str,'"');	//remove double quote (") at end if available
	return $str;	//return json
}
// to decode or convert a JSON object to a PHP object or array.
function jsondecode($str,$theTrue='', $skip=0){

	if(is_array($str)){		//check string is already an array or not
		
	}else{
		$str=jsonreplace($str);		//remove html keywords from string
		if($skip==0 || empty($skip))
		{
			$str=str_replace(array('"{','}"','"[',']"'),array('{','}','[',']'),$str);	//fixed json error
		}
		$str=json_decode($str,true);	//convert a JSON object to a PHP array.
	}
	return $str;	//return array
}

//Fetch all details or one or more fields from any table via using customized conditions from payout DB
function select_tablep($where_pred='',$tbl='',$prnt=0,$limit=1,$select='*'){
	global $data;
	if($tbl){
		$result=db_rows_2(
			"SELECT {$select} FROM `{$data['DbPrefix']}{$tbl}`".
			" WHERE {$where_pred} ".($limit?" LIMIT 1 ":"")." ",$prnt
		);
		if($limit && isset($result[0])){
			return $result[0];	//return a row
		}else{
			return $result;		//return rows
		}
	}else{
		return "Not Data Available";	//return empty
	}
}


//Fetch all details or one or more fields from any table via using customized conditions
function select_tablef($where_pred='',$tbl='',$prnt=0,$limit=1,$select='*'){
	global $data;
	if($tbl){
		//fetch data from table
		$result=db_rows(
			"SELECT {$select} FROM `{$data['DbPrefix']}{$tbl}`".
			" WHERE {$where_pred} ".($limit?" LIMIT 1 ":"")." ",$prnt
		);
		if($limit && isset($result[0])){
			return $result[0];	//return a row
		}else{
			return $result;		//return rows
		}
	}else{
		return "Not Data Available";		//return empty
	}
}

//The function_prndatelog() return the date in customized format if DATE is valid, return '---' if not a valid DATE.
function prndatelog($date){
	global $data;
	$date=str_replace("PM","",$date);	//remove AM from date
	$date=str_replace("AM","",$date);	//remove PM from date
	if($date=='0000-00-00 00:00:00')return '---';
	else return date($data['DateFormat'], strtotime($date));
}

function error_reportingf($type=0){
	if($type==1){
		error_reporting(E_ALL ^ (E_DEPRECATED));	//Sets which PHP errors are reported
	}elseif($type==2){
		error_reporting(E_ERROR | E_WARNING | E_PARSE);	//Sets which PHP errors are reported
	}else{
		error_reporting(0);					// Turn off all error reporting
	}
}

//this function_used to display complete json log
function json_log_popup($log='', $action_name='View Json Log', $tableId=0,$tableName='json_log',$owner=''){
	global $data;$qp=0;
	
	

	//check login type
	if(isset($_SESSION['s_admin_username'])){
		if(isset($_GET['qp'])){
			$qp=1;
		}
		if($tableId>0){
			//fetch json log history from a table
			$log_slc=db_rows(
				"SELECT `json_log_history` FROM `{$data['DbPrefix']}{$tableName}`".
				" WHERE `id`='{$tableId}' LIMIT 1",$qp
			);
			if($log_slc[0]['json_log_history']){
				$log=$log_slc[0]['json_log_history'];
			}
		}
		
		if($log){	//if log exists then print log	
		?>
		<div class="row json_log_view1_row">
			<div class="col_2" style="padding:0;float:left;">
				<div class="hhh" style="width:0;overflow:hidden;"><? $all_log2=jsondecode($log); //decode json to php array object?></div>
				<? //Change width:95vw; to 100% 0n 201022 by vikash ?>
				<div class="tbl_exl tbl_exlHeightAuto" style="width:98%;overflow:auto">
					<table class="compare" style="margin-top: -2px;">
					<tbody>
					<? if(is_array($all_log2)){foreach($all_log2 as $key6=>$value6){ 
					?>
					<tr><td title="<?=$key6;?>" style="width: 200px;">
						<div><a><?=$value6['log_user'];?><?=($value6['log_count']>0)?'<span class="diff_log" data-no=0 onclick="diff_log(this,\''.$value6['log_count'].'\')">'.$value6['log_count'].'</span>':'';?></a></div>
						<div style="clear:both;"><?=prndatelog($value6['log_date']);?>&nbsp;<i class="<?=$data['fwicon']['circle-info'];?> text-danger" title="<?=$value6['log_action'];?>"></i></div></td>

						<td nowrap title="<?=$key6;?>" style="width: 100%;">
							<div style="width:100%;">
							<?
							if(is_array($value6)){
								$value6_0=jsondecode($value6['log_log']);

								if(isset($_SESSION['login_adm'])&&isset($_REQUEST['de'])){
									if(isset($value6_0['devinm'])&&$value6_0['devinm'])$value6_0['devinm']=decode_f($value6_0['devinm'],0);
									if(isset($value6_0['miscellaneous'])&&$value6_0['miscellaneous'])$value6_0['miscellaneous']=decode_f($value6_0['miscellaneous'],0);
								}else{
									if(isset($value6_0['devinm'])&&$value6_0['devinm']) unset($value6_0['devinm']);
									if(isset($value6_0['miscellaneous'])&&$value6_0['miscellaneous']) unset($value6_0['miscellaneous']);
								}
 
								foreach($value6_0 as $key6_1=>$value6_1){
								?>
									<div class="dtd" title="<?=jsonencode($key6_1)?>" >
										<?=jsonencode($key6_1)?> : <b><?=jsonencode($value6_1);?></b>
									</div>
								<? 
								} 
							} ?>
							</div>
							</td></tr>
						<? } } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<? } ?>
	<?
	}
}

// fetch Bank Assign Currency

function bank_assign_currency($Client_ID="") {
global $data;
$currn="";
$select_bank=db_rows("SELECT assign_bank FROM tbl_member_bank_account WHERE client_id='$Client_ID' and bank_status='Active'");

foreach($select_bank as $key=>$bankrow) {

$assign_bank_id=$bankrow['assign_bank'];
$select_currency=db_rows("SELECT bank_supported_currency FROM tbl_common_bank_account WHERE bank_id='$assign_bank_id' ");
$rowcurr=$select_currency[0];

   if($currn){
   $currn.=",".$rowcurr['bank_supported_currency'];
   }else{
   $currn.=$rowcurr['bank_supported_currency'];
   }

} 

return $cirr_get_value=array_unique(explode(",",$currn));
}





// Currency Converter
function currencyConverter($from_Currency='USD',$to_Currency='CAD',$amount=1,$getway=false,$results=false) {
    global $data;
	$qprint=0; 
	$dbf=1;
	try {
	
		if(isset($_GET['f'])&&$_GET['f']=='c'){
			$qprint=1;
		}
	
	
		$result=array();
		$from_Currency = urlencode($from_Currency);
		$to_Currency = urlencode($to_Currency);
		
		$result['from_Currency']=$from_Currency;
		$result['to_Currency']=$to_Currency;
		$result['amount']=$amount;
		$result['digit_after_dot']="4";
		
		
		//select db -------------------------------------------- 
		if($dbf){

			//$exchange_rate_select_db=db_rows(
				$exchange_rate_select_db=db_rows("SELECT * FROM `currency_exchange_table` WHERE ( `currency_from`='{$from_Currency}' OR `currency_from`='{$to_Currency}' ) ORDER BY `id` DESC LIMIT 1 ");//,$qprint
			//);
			 $exchange_rate_select=$exchange_rate_select_db[0];
			 
			
			//$exchange_rate_size=sizeof($exchange_rate_select_db);
			$exchange_rate_size=$data['db_rows_count'];
			//$exchange_rate_select=$exchange_rate_select_db[0];
			
			$current_date_2h=date('YmdHis', strtotime("-1 hours"));
	
			$db_timestamp=date('YmdHis', strtotime($exchange_rate_select['timestamp']));

			$response_json=$exchange_rate_select['currency_josn'];

			
			if($qprint){
				
				echo "<br/>$exchange_rate_size=>".$exchange_rate_size; 
				
				echo "<br/>db_timestamp=>".(int)$db_timestamp; 
				echo "<br/>current_date_2h=>".(int)$current_date_2h;
				
				echo "<br/><br/>commentTime=>".date('d-m-Y H:i:s', $exchange_rate_select['comments']);
				echo "<br/>db_timestamp=>".date('d-m-Y H:i:s', strtotime($db_timestamp));

				echo "<br/><br/>(current_date) - 2=> ".date('d-m-Y H:i:s A', strtotime($current_date_2h));
				echo "<br/>(current_date) + 0=>".date('d-m-Y H:i:s A');
				
				$time1 = new DateTime($db_timestamp);
				//$time2 = new DateTime($current_date_2h);
				$time2 = new DateTime(date('Y-m-d H:i:s'));
				$timediff = $time1->diff($time2);
				echo "<br/><br/>diff (db_timestamp - current_date)=>".$timediff->format('%y year %m month %d days %h hour %i minute %s second')."<br/>";
			}
				
		
		
				
				
			//update db -------------------------------------------- 
			if(($db_timestamp<$current_date_2h)||($exchange_rate_size==0)){
				$response_api_get=file_get_contents('https://v6.exchangerate-api.com/v6/b5aa60779b04ba9d2075573a/latest/'.$from_Currency);
				$response_json=$response_api_get;
				if(false !== $response_api_get){
					
					$response_api_object = json_decode($response_api_get,true);
					
					if('success' === $response_api_object['result']) {
						
						$timestamp=date('Y-m-d H:i:s');
						

db_query("INSERT INTO `currency_exchange_table`(`currency_from`,`timestamp`,`currency_josn`,`comments`)VALUES('{$response_api_object['base_code']}','{$timestamp}','{$response_api_get}','{$response_api_object['time_next_update_unix']}')");
						
					}
				} 
			}
			
		} //--------------------------------------
		else{

			$response_json = file_get_contents('https://v6.exchangerate-api.com/v6/b5aa60779b04ba9d2075573a/latest/'.$from_Currency);
		}
		
		
		// currency calculation ----------------------------
		if(false !== $response_json) {
			if($qprint){ echo '<br/><br/>'.$response_json .'<br/><br/>'; }
			$response_object = json_decode($response_json,true);
			if($qprint){  echo '<br/><br/>response_object=>';print_r($response_object); }
			 if('success' === $response_object['result']) {
				
				$rates=$response_object['conversion_rates'][$to_Currency];
				if($qprint){ echo '<br/><br/>rates_get=>'.$rates .''; }
				if(($dbf)&&$to_Currency==$response_object['base_code']){
					$rates=(1/(double)$response_object['conversion_rates'][$from_Currency]);
					if($qprint){ echo "<br/>rates {$to_Currency}=>".$rates .'<br/><br/>'; }
				}
				
				$per_rates=number_format((double)(1 * $rates), $result['digit_after_dot'], '.', '');
				
				$result['rates_accurate']="1 ".$result['from_Currency']." to ".($per_rates). " ".$to_Currency;
				
				$result['per_rates']=$per_rates;
				
				
				$currency = ($amount * $rates); 
				
				$result['converted_amount_accurate']=$currency;
				
			}
		}
		
		
		if($getway){
			$currency_g=(($currency*2.676)/100); // 2.676%
			$currency_f=($currency + $currency_g); // +2.676%
			$result['cal_rate']="+2.676%";
			
			//$currency_f=$currency; // Added By Vikash
			
		}else{
			$currency_35=(($currency*3.553)/100); // 3.553%
			$currency_f=($currency - $currency_35); // -3.553%
			$result['cal_rate']="-3.553%";
		    //$currency_f=$currency; // Added By Vikash
		}
		




		
		$currency_f=number_format((double)$currency_f, '2', '.', '');
		
		//$per_rates_cal=($currency_f/$amount);
		//$result['per_rates_cal']=number_format((double)$per_rates_cal, $result['digit_after_dot'], '.', '');
		
		//$result['rates']="1 ".$result['from_Currency']." to ".($result['per_rates_cal']). " ".$to_Currency;

		//$result['converted_amount']=$currency_f;
		
		if($results){
			return $result;
		}else{
			return $currency_f;
		}

	}
	catch(Exception $e) {
	  echo '<=currencyConverter=> ' .$e->getMessage();
	}
}


?>