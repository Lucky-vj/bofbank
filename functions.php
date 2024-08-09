<?php

//To removes some special keywords and tags.
function prntext($text,$repl=0){
	//global $data;
	if(is_string($text)){
		if($repl>0){
			//$text = urldecode($text);
		}
		//returns a string or an array with all occurrences of search in subject (ignoring case) replaced with the given replace value.
		$text = str_ireplace(array('onmouseover','onclick','onmousedown','onmousemove','onmouseout','onmouseup','onmousewheel','onkeyup','onkeypress','onkeydown','oninvalid','oninput','onfocus','ondblclick','ondrag','ondragend','ondragenter','onchange','ondragleave','ondragover','ondragstart','ondrop','onscroll','onselect','onwheel','onblur','<','>',"'"), '', $text );
		return trim(strip_tags($text));
	}
}

// manage emails functions

//The get_email_details() used to fetch all details from client_emails table of a member
function get_email_details($uid, $primary=false, $confirmed=true){
	global $data;
	
	//to fetch all details from client_emails table of a member
	$result=db_rows(
		"SELECT * FROM `{$data['DbPrefix']}client_emails`".
		" WHERE `owner`='{$uid}'".
		($primary?" AND `primary`='{$primary}'":'').
		($confirmed?" AND `active`='{$confirmed}'":'')
	);
	return $result;	//return all detail in array
}

//An automatically generated string that can be used in place of real string/text.
function mask($str, $first=0, $last=4) {
	$len = strlen($str);
	$toShow = $first + $last;
	return substr($str, 0, $len <= $toShow ? 0 : $first).str_repeat("*", $len - ($len <= $toShow ? 0 : $toShow)).substr($str, $len - $last, $len <= $toShow ? 0 : $last);
}

//The implodes() function returns a string from the elements of an array
function implodes($implod,$array){
	if(is_array($array)){
		$array=implode($implod,$array);		//make string
	}
	return $array;
}

//An automatically generated email that can be used in place of real email address.
function mask_email($email) {
	$mail_parts = explode("@", $email);
	$domain_parts = explode('.', @$mail_parts[1]);
	
	$mail_parts[0] = mask($mail_parts[0], 2, 1); // show first 2 letters and last 1 letter
	$domain_parts[0] = mask($domain_parts[0], 2, 1); // same here
	$mail_parts[1] = implodes('.', $domain_parts);
	
	return implodes("@", $mail_parts);
}

function encrypts_decrypts_emails($emailId, $type, $mass=false, $email_det=array())	//type 1,3 for encrypts while type 2 for decrypts
{
	global $data;
	
	
	
	if($emailId){
		if($type==1||$type==3) {	//section for encryption
			$emailId_lo = strtolower(trim($emailId));	//change email into lower chars
			if(filter_var($emailId_lo, FILTER_VALIDATE_EMAIL) || isset($data['skipemailvalidation']) || $type==3) {
			
				if(strpos($emailId_lo,'decrypt')!==false){	//check emailId already encrypted or not
					
				}else{
					//$emailId = exp_encrypts256($emailId_lo);
					$emailId = encode_f($emailId_lo);	//encrypt emailId
				}
				
			}
		//	echo 'fail';exit;
			return $emailId;
		}
		elseif($type==2) {
			if(strpos($emailId,'decrypt')!==false){	//check email id encrypted or not, if yes the decrypt
				//$emailId = exp_decrypts256(stripslashes($emailId));
				$emailId = decode_f(stripslashes($emailId));	//decrypt email
			}
			if($mass==true){	//if mass is true the show emailId with mass (start and end chars display)
				$emailId=prntext(mask_email($emailId));

				//check login with admin or view_mask_email roll define then view full email id
				//if(((isset($_SESSION['login_adm']))||(isset($_SESSION['view_mask_email'])&&$_SESSION['view_mask_email']==1)) && $email_det)
				//{
					$det_list = "tbl=".$email_det[0]."&tblid=".$email_det[1];
					
					$emailId = '<a onClick="ajaxf1(this, \'common/check-email'.$data['ex'].'?'.$det_list.'\', 2, 1,3);" class="nomid">'.$emailId.'</a>';
				
				//}
			}
			return strtolower($emailId);	//return encrypted / decrypted email id
		}
	}
	return;
}


//The delete_member_email() is used to delete an email from client_emails. Delete only non-primary email
function delete_member_email($uid, $eid){
	global $data;
	if($eid)
	{
		//fetch email data
		$result=db_rows("SELECT * FROM {$data['DbPrefix']}client_emails WHERE `id`='$eid'");

		if(!isset($result[0])) return 'EMAIL_NOT_FOUND';	//if no record found then return

		$email = encrypts_decrypts_emails($result[0]['email'],2);	//decrypted email
        
		if(verify_email($email)) return 'INVALID_EMAIL_ADDRESS';	//check email validation

		$todel=get_email_detail($eid);		//fetch email detai
	
		if(!$todel) return 'EMAIL_NOT_FOUND';	//if no record found then return
		elseif($todel['primary']) return 'CANNOT_DELETE_PRIMARY';	//if email is primary then can't del
		else{
			
			$qrs=db_query("DELETE FROM {$data['DbPrefix']}client_emails WHERE owner='{$uid}' AND `id`='{$eid}'",1);	//delete email id
	
	
			if($qrs){
				return 'SUCCESS';
			}
		}
	}
}

//The get_email_detail() is used to fetch detail from client_emails
function get_email_detail($eid, $type='ALL'){
	global $data;
	if ($type=='CONFIRMED') {	//if type is CONFIRMED, then fetch only if email activated
		$result=db_rows("SELECT * FROM {$data['DbPrefix']}client_emails WHERE `id`='$eid' AND `active`=1");
	}
	else{ //fetch all emails
		$result=db_rows("SELECT * FROM {$data['DbPrefix']}client_emails WHERE `id`='$eid'");
	}
	if(isset($result[0])) return $result[0];	//return email detail

	return false;
}

//This function currently is not using
function email_exists($email){
	global $data;
	$result=db_rows("SELECT owner FROM {$data['DbPrefix']}client_emails WHERE email='{$email}'");
	return (bool)$result['0'];	
}

//The function verify_email() is used to check email-id is valid or not via email' fixed pattern
function verify_email($email){
	return !(bool)preg_match("/^.+@.+\\..+$/", $email);
}
?>

