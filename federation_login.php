<?php
include "common.php";
?>
<link href="<?=$data['Host'];?>/common/css/bootstrap.min.css" rel="stylesheet">
<script src="<?=$data['Host'];?>/common/js/bootstrap.bundle.min.js"></script>
<?php
//print_r($_SESSION['user_data']);
/*if(isset($_SESSION['facebook_access_token'])){
    echo "<a href=".$data['Host']."/sign-in".$data['ex']."?Act=Out>Logout</a>";
}*/

$fed_first_name=$_SESSION['user_data']['first_name'];
$fed_last_name=$_SESSION['user_data']['last_name'];
$fed_full_name=$_SESSION['user_data']['full_name'];
$fed_email=$_SESSION['user_data']['email'];
$fed_source=$_SESSION['user_data']['reg_source'];

if(isset($fed_first_name)&&$fed_first_name&&isset($fed_last_name)&&$fed_last_name&&isset($fed_email)&&$fed_email){
$cnt=check_username($fed_email);
if($cnt==1){
?>
<form method="post" id="signins" action="sign-in">
<input type="hidden" name="txt_username" value="<?=$fed_email;?>" />
<input type="hidden" name="login_auth" value="federation" />
<input type="hidden" name="btn_submit" value="btn_submit">
</form>

<script>
  setTimeout(function(){ 
  document.getElementById("signins").submit();
  }, 1000);
</script>
<?php
}else{
?>
<form method="post" id="signups" action="sign-up">
<input type="hidden" name="txt_fname" value="<?=$fed_first_name;?>" />
<input type="hidden" name="txt_lname" value="<?=$fed_last_name;?>" />
<input type="hidden" name="txt_username" value="<?=$fed_email;?>" />
<input type="hidden" name="txt_source" value="<?=$fed_source;?>" />
<input type="hidden" name="btnSubmit" value="btnSubmit">
</form>
<script>
  setTimeout(function(){ 
  document.getElementById("signups").submit();
  }, 1000);
</script>
<?php
 }
}
?>
<div class="text-center mt-5"><img src="images/loading.gif"  style="height:150px;" /></div>