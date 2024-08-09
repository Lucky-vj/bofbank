<?php
define('MAILGUN_URL', 'https://api.mailgun.net/v3/bofbank.com');
define('MAILGUN_KEY', '6e7fe629216c90829b9c2dd7c6179483-309b0ef4-eb3e8c6e');

function sent_template_mail($template, $post, $for_admin = false)
{
  global $data;

  isset($post['fullname']) && $post['fullname'] ? $fullname = $post['fullname'] : '';
  isset($post['amount']) && $post['amount'] ? $amount = $post['amount'] : '';
  isset($post['otp']) && $post['otp'] ? $otp = $post['otp'] : '';
  isset($post['username']) && $post['username'] ? $username = $post['username'] : '';
  isset($post['password']) && $post['password'] ? $password = $post['password'] : '';
  isset($post['email']) && $post['email'] ? $email = $post['email'] : '';
  isset($_SESSION['host_name']) && $_SESSION['host_name'] ? $sitename = $_SESSION['host_name'] : '';
  isset($amount) && $amount ? $amount = $amount : '';
  isset($otp) && $otp ? $otp = $otp : '';
  isset($post['transtype']) && $post['transtype'] ? $transtype = $post['transtype'] : '';
  isset($post['status']) && $post['status'] ? $status = $post['status'] : '';
  isset($post['msgdetails']) && $post['msgdetails'] ? $msgdetails = $post['msgdetails'] : '';
  isset($post['scheduledate']) && $post['scheduledate'] ? $scheduledate = $post['scheduledate'] : '';
  $seltemp = "SELECT template_subject,template_desc FROM tbl_email_template WHERE template_code = '$template'";
  $temp = db_rows($seltemp);
  $templ = $temp[0];
  $subject = $templ['template_subject'];
  $msg = $templ['template_desc'];

  $subject = str_replace(
    array("[sitename]", "[fullname]", "[username]", "[password]", "[amount]", "[otp]", "[status]"),
    array("$sitename", "$fullname", "$username", "$password", "$amount", "$otp", "$status"),
    $subject
  );

  $msg = str_replace(
    array("[sitename]", "[fullname]", "[username]", "[password]", "[amount]", "[otp]", "[status]", "[transtype]", "[scheduledate]", "[msgdetails]"),
    array("$sitename", "$fullname", "$username", "$password", "$amount", "$otp", "$status", "$transtype", "$scheduledate", "$msgdetails"),
    $msg
  );


  /*====================MailGun API=============================*/
  $mailfromname = 'Support ' . $_SESSION['host_companyname'];
  $mailfrom = "info@bofbank.com";
  $replyto = "info@bofbank.com";
  $toname = $fullname;
  $to = $email;
  $tag = "";

  $admin_address1 = "bofbank12@gmail.com";
  $admin_address2 = "admin@bofbank.com";
  $admin_address3 = "corporate@bofinvestments.com";
  $admin_address4 = "operation@bofinvestments.com";
  $admin_address5 = "onboarding@bofbank.com";

  $array_data = array(
    'from' => $mailfromname . '<' . $mailfrom . '>',
    'to' => $toname . '<' . $to . '>',
    'subject' => $subject,
    'html' => $msg,
    'text' => $msg,
  );

  $admin_array_data1 = array(
    'from' => $mailfromname . '<' . $mailfrom . '>',
    'to' => '<' . $admin_address1 . '>' . ',<' . $admin_address2 . '>' . ',<' . $admin_address3 . '>' . ',<' . $admin_address5 . '>',
    'subject' => $subject,
    'html' => $msg,
    'text' => $msg,
  );

  $admin_array_data2 = array(
    'from' => $mailfromname . '<' . $mailfrom . '>',
    'to' => '<' . $admin_address1 . '>' . ',<' . $admin_address2 . '>' . ',<' . $admin_address3 . '>' . ',<' . $admin_address4 . '>',
    'subject' => $subject,
    'html' => $msg,
    'text' => $msg,
  );

  /*'o:tracking'=>'yes',
		'o:tracking-clicks'=>'yes',
		'o:tracking-opens'=>'yes',
		'o:tag'=>$tag,
		'h:Reply-To'=>$replyto*/

  if ($for_admin == false) {
    $session = curl_init(MAILGUN_URL . '/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($session, CURLOPT_USERPWD, 'api:' . MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($session);
    curl_close($session);
  } else {
    // send to admins
    $session = curl_init(MAILGUN_URL . '/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($session, CURLOPT_USERPWD, 'api:' . MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    if ($template == 'SIGNUP-TO-ADMIN') {
      curl_setopt($session, CURLOPT_POSTFIELDS, $admin_array_data1);
    } else {
      curl_setopt($session, CURLOPT_POSTFIELDS, $admin_array_data2);
    }
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($session);
    curl_close($session);
  }


  //$results = json_decode($response, true);
  //return $results;

  unset($post);
  return;
}
