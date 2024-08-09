<?php

include "common.php";
include "controller/blade.account-security.php";
$_SESSION['SiteName']=$_SESSION['host_name'];

$sess_secret=isset($_SESSION['secret'])&&$_SESSION['secret']?$_SESSION['secret']:'';
$sess_qrcodeurl=isset($_SESSION['qrCodeUrl'])&&$_SESSION['qrCodeUrl']?$_SESSION['qrCodeUrl']:'';
if(($google_auth_access==2) || ($google_auth_access==0)){ 
$qstatus="De-activate";

?>

<script>
$(document).ready(function () {
$(".loader-icon").html("<i class='<?=$data['fwicon']['check-cross'];?> text-danger'></i>");
 $(".toast-box").addClass("hide")
 $(".toast-box").hide();
});

</script>

<? }else{ $qstatus="Activated"; ?>

<script>
$(document).ready(function () {
 $(".toast-box").addClass("hide")
 $(".toast-box").hide();
  });
</script>

<? } ?>



<style>

.mwidth2fa{max-width:500px;}

@media (max-width: 576px){

   .col-sm-4 {

    flex-shrink: 0;

    width: 100% !important;

    max-width: 100% !important;

	}

   .mwidth2fa{max-width:96% !important;}

}



	.modal-dialog {

     max-width: 360px !important;

     height:600px !important;

     }

	 

	 <? if($google_auth_access==1){ ?>

	 .display_active { display:block;}

	 .display_deactive { display:none;}

	 

	 <? }else{ ?>

	 .display_active { display:none;}

	 .display_deactive { display:block;}

	 <? } ?>

	 .message_deactive { display:none;}

	 #message-error{ color:#CC0000; font-size:14px; }

	 .vkg.dropdown-toggle::after { position: absolute;top: 50%;right: 20px; }    

	 /*.vkg.dropdown-menu { min-width: 100% !important; }*/

     .toast:not(.showing):not(.show) { opacity: unset !important;}

    

</style>

<? if(isset($_SESSION['qrCodeActiveMessage'])&&$_SESSION['qrCodeActiveMessage']){

$qstatus="Activated"; //unset($_SESSION['qrCodeActiveMessage']); 

?>

<script>

$(document).ready(function () {
$(".loader-icon").html("<i class='<?=$data['fwicon']['check-circle'];?> text-success'></i>");
 $(".toast-box").addClass("show")
 $(".toast-box").show();
});

</script>

<? unset($_SESSION['qrCodeActiveMessage']); } ?>

<? if(isset($_SESSION['qrCodeMessage'])&&$_SESSION['qrCodeMessage']){ 



if($_SESSION['qrCodeMessage']==2){ 

$qstatus="De-activate";

?>

<script>

$(document).ready(function () {
$(".loader-icon").html("<i class='<?=$data['fwicon']['check-cross'];?> text-danger'></i>");
 $(".toast-box").addClass("show")
 $(".toast-box").show();
});

</script>

<? }elseif($_SESSION['qrCodeMessage']==1 || $_SESSION['qrCodeMessage']==3){ 

$qstatus="De-activate";

?>

<script>

$(document).ready(function () {
$(".loader-icon").html("<i class='<?=$data['fwicon']['check-cross'];?> text-danger'></i>");
$(".toast-box").addClass("hide")
$(".toast-box").hide();
$('#googleModalToggle').modal('show');
});

</script>

<? }else{ ?>

<script>

$(document).ready(function () {
 $(".toast-box").addClass("hide")
 $(".toast-box").hide();
  });
</script>

<? } ?>

<? } ?>

<style>

.hide { display:none; }

.input-field input:focus+label, .input-field input:valid+label {left: 20px !important;}

</style>

  <!-- ============================================================== -->

  <!-- Start right Content here -->

  <!-- ============================================================== -->

  <div class="main-content account-security">

    <div class="page-content">

      <div class="container-fluid">

        <!-- start page title -->

        <div class="row">

          <div class="col-12">

            <div class="page-title-box d-flex align-items-center justify-content-between">

              <!-- <h4 class="heading-ad"><i class="<?=$data['fwicon']['security'];?> fa-fw"></i> <?=$data['PageName'];?></h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Host-Home'];?>" title="Home">Home</a></li>
				  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
  <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
  <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
</svg></li>

                  <li class="breadcrumb-item active"><?=$data['PageName'];?>

                  </li>

                  </li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!-- end page title -->

        <div class="row mb-4">

          <div class="col-xl-2"> </div>

          <div class="col-xl-12">

            <div class="row">

              <div class="col-md-7">

                <div class="btn-toolbar" role="toolbar"> </div>

              </div>

              <div class="col-md-5">

                <div class="btn-toolbar justify-content-md-end" role="toolbar">

                  <div class="btn-group ml-md-2 mb-3"> </div>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-lg-12">

				

				<?php  if(isset($_SESSION['msg'])&&$_SESSION['msg']){ ?>

  

                <div class="alert alert-success alert-dismissible fade show" role="alert">

  				  <strong>Success! </strong> <?php echo $_SESSION['msg']; ?>

  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

				  </div>

				<?php unset($_SESSION['msg']); } ?>

				

				

                <div class="inner-page card">

                  <div class="card-body">

				 <h4 class="header-title"> Update Password</h4>

                  <h6>You can change your password for security reasons or reset it if you forget it.</h6>      

                      

						<div class="border rounded p-2 my-2 dropdown" style="max-width:500px; margin:0 auto;">
						<div class="vkg dropdown-toggle" style="width:calc(100% - 70px);" role="button" id="dropdownPassword" data-bs-toggle="dropdown" aria-expanded="false"><span class="loader-pass"><i class="<?=$data['fwicon']['check-circle'];?> text-success"></i></span>&nbsp;Password </div>
						<ul class="vkg dropdown-menu" aria-labelledby="dropdownPassword">
							<li><a class="dropdown-item password-action" data-value="1">Reset Password</a></li>
						</ul>
						</div>





       

				  

				  </div>

                </div>

				



				<div class="modal fade" id="passwordModal" aria-hidden="true" aria-labelledby="passwordModalLabel" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="passwordModalLabel">Change / Update Password</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

	  <!--<form method="post">-->

      <div class="modal-body">

	  <div class="toast-pass toast align-items-center text-message border-0 w-100 mb-2 fade hide" role="alert" aria-live="assertive" aria-atomic="true">

  <div class="d-flex">

    <div class="toast-body toast-body-msg-pass"></div>

    

    <button type="button" class="btn-close btn-close-white me-2 m-auto close_toast"  onclick="toastclose('.toast-pass')" data-bs-dismiss="toast-pass" aria-label="Close"></button>

  </div>

</div>

	  <div class="row">

	  <input type="hidden" name="auth_pass_code" id="auth_pass_code" value="<?=$auth_pass_code;?>" />

	     <? if(!isset($data['subUser'])&&empty($data['subUser'])){ ?>

			    

				<div class="col-sm-12 input-field mt-3">

				<input type="password" class="form-control" name="opass" id="password" autocomplete="off" required />

				<label for="password">Old Password</label>

				</div>

			    

		<? } ?>	

				

				<div class="col-sm-12 input-field mt-3"><input type="password" class="form-control" name="npass" id="password1" autocomplete="off" required />

				<label for="password1">New Password</label>

				</div>

			   

				

				

				<div class="col-sm-12 input-field my-3"><input type="password" class="form-control" name="cpass" id="password2" autocomplete="off" required />

				<label for="password2">Repeat Password</label>

				</div>

			    

			



<div class="row valiglyph my-2">

<div class="col-sm-6"><span id="8char" style="color:#FF0004;"><i class="<?=$data['fwicon']['circle-cross'];?>"></i></span> 10 Characters Long</div>

<div class="col-sm-6"><span id="ucase" style="color:#FF0004;"><i class="<?=$data['fwicon']['circle-cross'];?>"></i></span> One Uppercase Letter</div>

<div class="col-sm-6"><span id="lcase" style="color:#FF0004;"><i class="<?=$data['fwicon']['circle-cross'];?>"></i></span> One Lowercase Letter</div>

<div class="col-sm-6"><span id="num"  style="color:#FF0004;"><i class="<?=$data['fwicon']['circle-cross'];?>"></i></span> One Number</div>

<div class="col-sm-6"><span id="pwmatch"  style="color:#FF0004;"><i class="<?=$data['fwicon']['circle-cross'];?>"></i></span> Passwords Match</div>

</div>





                



		

		</div>

	   

	   

	   

      </div>

      <div class="modal-footer">

       
	  <div class="form-group common-btn">
                    <!--<i class="fa-solid fa-circle-plus"></i>-->
                      <button type="submit" class="btn btn-sm submit-cmn-btn" name="btn_submit" value="Submit">Submit</button>
                </div>
		<!-- <button class="btn btn-primary btn-sm submit-password" type="submit" name="change" value="Change Now!" ><i class="<?=$data['fwicon']['check-circle'];?>"></i> Submit</button> -->

		

      </div>

	  <!--</form>-->

    </div>

  </div>

</div>

           

				<script>





$("input[type=password]").keyup(function(){ 

    var ucase = new RegExp("[A-Z]+");

	var lcase = new RegExp("[a-z]+");

	var num = new RegExp("[0-9]+");

	

	if($("input[type=password]").length > 0){

		$(".valiglyph").css({"display":"flex"});

	}

	

	

	if($("#password1").val().length >= 10){

		$("#8char").removeClass("remove_2");

		$("#8char").addClass("ok_2 ");

		$("#8char").css("color","#00A41E");

		$('#8char i').attr('class','<?=$data['fwicon']['check-circle'];?> text-success');

	}else{

		$("#8char").removeClass("ok_2 ");

		$("#8char").addClass("remove_2");

		$("#8char").css("color","#FF0004");

		$('#8char i').attr('class','<?=$data['fwicon']['circle-cross'];?> text-danger');

		

	}

	

	if(ucase.test($("#password1").val())){

		$("#ucase").removeClass("remove_2");

		$("#ucase").addClass("ok_2 ");

		$("#ucase").css("color","#00A41E");

		$('#ucase i').attr('class','<?=$data['fwicon']['check-circle'];?> text-success');

	}else{

		$("#ucase").removeClass("ok_2 ");

		$("#ucase").addClass("remove_2");

		$("#ucase").css("color","#FF0004");

		$('#ucase i').attr('class','<?=$data['fwicon']['circle-cross'];?> text-danger');

	}

	

	if(lcase.test($("#password1").val())){

		$("#lcase").removeClass("remove_2");

		$("#lcase").addClass("ok_2 ");

		$("#lcase").css("color","#00A41E");

		$('#lcase i').attr('class','<?=$data['fwicon']['check-circle'];?> text-success');

	}else{

		$("#lcase").removeClass("ok_2 ");

		$("#lcase").addClass("remove_2");

		$("#lcase").css("color","#FF0004");

		$('#lcase i').attr('class','<?=$data['fwicon']['circle-cross'];?> text-danger');

	}

	

	if(num.test($("#password1").val())){

		$("#num").removeClass("remove_2");

		$("#num").addClass("ok_2 ");

		$("#num").css("color","#00A41E");

		$('#num i').attr('class','<?=$data['fwicon']['check-circle'];?> text-success');

	}else{

		

		$("#num").removeClass("ok_2 ");

		$("#num").addClass("remove_2");

		$("#num").css("color","#FF0004");

		$('#num i').attr('class','<?=$data['fwicon']['circle-cross'];?> text-danger');

	}

	

	if($("#password1").val() == $("#password2").val()){

	

	if($("#password1").val()==""){ return false;}

	

	

		$("#pwmatch").removeClass("remove_2");

		$("#pwmatch").addClass("ok_2 ");

		$("#pwmatch").css("color","#00A41E");

		$('#pwmatch i').attr('class','<?=$data['fwicon']['check-circle'];?> text-success');

	}else{

	

		$("#pwmatch").removeClass("ok_2 ");

		$("#pwmatch").addClass("remove_2");

		$("#pwmatch").css("color","#FF0004");

		$('#pwmatch i').attr('class','<?=$data['fwicon']['circle-cross'];?> text-danger');

	}

});

<? if(isset($post['npass'])&&$post['npass']){ ?>

$('input[type=password]').trigger('keyup');

<? } ?>



$(document).ready(function() {

	 $('#password1,#password2').bind('copy paste cut',function(e) { 

		 e.preventDefault(); //disable cut,copy,paste

		 alert('cut,copy & paste options are disabled !!');

	 });

});





$('.password-action').on('click', function () {

$('#passwordModal').modal('show');

});





$('.submit-password').on('click', function () {





    var opass=$('#password').val();

	var npass=$('#password1').val();

	var cpass=$('#password2').val();

	//var auth_pass_code=$('#auth_pass_code').val();

	var auth_pass_code=1;

	var utype=1;

	

	    if(opass==''){

			alert('Please enter old password');

			$( "#password" ).focus();

			return false;

		}else if(npass==''){

		    alert('Please enter new password');

			$( "#password1" ).focus();

			return false;

		}else if(cpass==''){

		    alert('Please enter repeat password');

			$( "#password2" ).focus();

			return false;

		}else if(opass==npass){

		    alert('New password should not be same as old password.');

			$( "#password2" ).focus();

			return false;

		}else if(cpass!=npass){

		    alert('New password and repeat password not matched');

			$( "#password2" ).focus();

			return false;

		}else if(npass.search(/[a-z]/) < 0) { 

		    alert('Password must contain at least one lowercase letter');

			$( "#password1" ).focus();

			return false;

		}else if(npass.search(/[A-Z]/) < 0) { 

		    alert('Password must contain at least one uppercase letter');

			$( "#password1" ).focus();

			return false;

		}else if(npass.search(/[0-9]/) < 0) { 

		    alert('Password must contain at least one number');

			$( "#password1" ).focus();

			return false;

		}else if(npass.length < 10) { 

		    alert('Password must be at least 10 characters');

			$( "#password1" ).focus();

			return false;

		}

		//$(".submit-password").html("<i class='<?=$data['fwicon']['spinner'];?> fa-spin-pulse'></i>");



		var senddata ='?opass='+opass+'&npass='+npass+'&cpass='+cpass+'&auth_pass_code='+auth_pass_code+'&utype='+utype;

		

		

	$.ajax({

	url: "<?=$data['Host'];?>/common/call-ajax-page",

	data:'opass='+opass+'&npass='+npass+'&cpass='+cpass+'&auth_pass_code='+auth_pass_code+'&utype='+utype,

	type: "POST",

	success:function(data){

	  //alert(data);

	  if(data==1){

	  location.reload(true);

	  

	  }else{

	  alert(data);

	  }

	},

	error:function (){}

	});



});





</script>





				<div class="inner-page card">

                  <div class="card-body">

				 <h4 class="header-title"> OTP</h4>

                  <h6>Enable / Disable OTP</h6>      

                      

                  <div class="border rounded p-2 my-2 dropdown" style="max-width:500px; margin:0 auto;">



  <div class="vkg dropdown-toggle" style="width:calc(100% - 70px);" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><span class="loader-icon-otp"><i class="<?=$otp_icon;?>"></i></span>&nbsp;OTP  - <span id="otpstatusbyjq"><?=$otp_status;?></span> </div>



  <ul class="vkg dropdown-menu" aria-labelledby="dropdownMenuLink">

    

    <li><a class="dropdown-item otp-action" data-value="1">Activate</a></li>

	<li><a class="dropdown-item otp-action" data-value="0">De-activate</a></li>



  </ul>

  

  

  

</div>

<div class="alert alert-primary alert-dismissible fade " id="optmsgs" role="alert" style="max-width:500px; margin:0 auto;">

  <span id="otp_msg">.</span>

  </div>







                  

				  

				  </div>

                </div>

				

                <script>

$('.otp-action').on('click', function () {

var datavals=$(this).attr('data-value');

var senddata='?mid=<?=$member_account_number;?>&otp_auth_access='+datavals;





 $.ajax({

	url: "<?=$data['Host'];?>/common/ajax-otp<?=$data['ex']?>"+senddata,

	data:'vid=155&google_auth_access='+datavals,

	type: "POST",

	success:function(data){

	 //alert(data);

	  if(data==1){

	      if(datavals==1){

	      $(".loader-icon-otp").html("<i class='<?=$data['fwicon']['check-circle'];?> text-success'></i>");

		  $("#optmsgs").addClass("show");

		  $("#otp_msg").html("OTP Activated Successfully");

		  }else{

		  $(".loader-icon-otp").html("<i class='<?=$data['fwicon']['check-cross'];?> text-danger'></i>");

		  $("#optmsgs").addClass("show");

		  $("#otp_msg").html("OTP De activated Successfully");

		  }

	  }

	},

	error:function (){}

	});





});



</script>



               <!--////////////2FA//////////////-->

			   

			   <div class="inner-page card two-step">

                  <div class="card-body">

				 <h4 class="header-title"> Two-step authentication</h4>

                  <p>Requires two-step authentication in order to keep your account secure. By using either your phone or an authenticator app in addition to your password, you ensure that no one else can log in to your account.

We encourage you to enable multiple forms of two-step authentication as a backup in case you lose your mobile device or lose service.</p> 



<? if(isset($_SESSION['members']['google_auth_code'])&&$_SESSION['members']['google_auth_code']){ ?>

<div>If you lose your mobile device or security key, you can <a href="<?=$data['Host']?>/common/backup_code_two_step_authentication<?=$data['iex'];?>?key=<?=$_SESSION['members']['google_auth_code'];?>" class="text-link" target="_blank" title="Download backup code" data-bs-toggle="tooltip" data-bs-placement="top">generate a backup code</a> to sign in to your account.</div>

<? } ?>     

                      

                 <div class="border rounded p-2 my-2 dropdown mwidth2fa" style="max-width:500px; margin:0 auto;">



  <div class="vkg dropdown-toggle" style="width:calc(100% - 70px);" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><span class="loader-icon"><i class="<?=$data['fwicon']['check-circle'];?> text-success"></i></span>&nbsp;Authenticator app - <?=$twofastatus;?> </div>



  <ul class="vkg dropdown-menu" aria-labelledby="dropdownMenuLink">

    <li><a class="dropdown-item two-fa-action" data-value="2">De-activate</a></li>

    <li><a class="dropdown-item two-fa-action" data-value="1">Activate</a></li>

    <li><a class="dropdown-item two-fa-action" data-value="3">QR-Code Reset</a></li>

  </ul>

</div>



<!--<div class="alert alert-primary alert-dismissible fade " id="twofamsgs" role="alert" style="max-width:500px; margin:0 auto;">

  <span id="twofa_msg">.</span>

  </div>-->

  <div class="clearfix"></div>

<div class="toast align-items-center text-white bg-primary-subtle border-0 w-100 mt-1 mb-4 toast-box" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" style="max-width:500px; margin:0 auto;">

  <div class="d-flex">

    <div class="toast-body"><?=$qstatus;?></div>

    <button type="button" class="btn-close btn-close-white me-2 m-auto close_button text-dark" data-bs-dismiss="toast" aria-label="Close"></button>

  </div>

</div>



                  

				  

				  </div>

                </div>

				

				

				<!--Added for 2FA Activation Modal-->



<div class="modal fade" id="googleModalToggle" aria-hidden="true" aria-labelledby="googleModalToggleLabel" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="googleModalToggleLabel">Use an Authenticator app</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

	  

	  <span>

        <p>Download the free <a href="https://support.google.com/accounts/answer/1066447?hl=en" title="Move to Google Authenticator" target="_blank" class="fw-bold text-link">Google Authenticator</a> app, add a new account than scan this barcode to setup your account</p>

		<div class="text-center my-2"><img src="<?=$sess_qrcodeurl;?>" /></div>

		<div class="text-center my-2"><a title="Enter Code Manually" data-bs-target="#googleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" class="fw-bold text-link pointer">Enter Code Manually</a></div>

	   </span>

	   

	   

	   

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> <button class="btn btn-secondary" data-bs-target="#googleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Continue</button>

      </div>

    </div>

  </div>

</div>



<div class="modal fade" id="googleModalToggle2" aria-hidden="true" aria-labelledby="googleModalToggleLabel2" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="googleModalToggleLabel2">Use an Authenticator app</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <p>Download the free <a href="https://support.google.com/accounts/answer/1066447?hl=en" title="Move to Google Authenticator" target="_blank">Google Authenticator</a> app, add a new account than enter this code to setup your account</p>

		<div class="text-center my-2 fs-3"><?=$sess_secret;?></div>

		

		<div class="text-center my-2"><a href="#" title="Enter Code Manually" data-bs-target="#googleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal" class="fw-bold text-link">Scan barcode instead</a></div>

      </div>

    <div class="modal-footer">

         <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> <button class="btn btn-secondary" data-bs-target="#googleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Continue</button>

      </div>

    </div>

  </div>

</div>



<div class="modal fade" id="googleModalToggle3" aria-hidden="true" aria-labelledby="googleModalToggleLabel3" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="googleModalToggleLabel3">Save your backup code</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <p>Save this emergency backup code and store it somewhere safe. if you loss your mobile device. you can use this code to bypass two-step-authentication and sign in </p>

		<div class="text-center">

		

		<input type="text" class="form-control form-control-sm w-75 px-2 float-start" value="<?=$sess_secret;?>" id="myInput"><i class="<?=$data['fwicon']['copy'];?> pointer w-25 float-start text-start p-2" title="Copy Backup Code" onclick="CopyValTestbox('Backup Code')"></i></div>

		<div class="clearfix"></div>

		<div class="my-2 text-start "><a href="<?=$data['Host']?>/common/backup_code_two_step_authentication<?=$data['iex'];?>?key=<?=$sess_secret;?>" target="_blank" title="Download backup code" class="btn btn-sm btn-primary showbutton"><i class="<?=$data['fwicon']['download'];?> "></i> Download</a></div>

      

    <div class="modal-footer">

          <button class="btn btn-primary hidebutton hide" data-bs-target="#googleModalToggle4" data-bs-toggle="modal" data-bs-dismiss="modal">I have saved my backup code</button>

      </div>

    </div>

  </div>

</div>

</div>



<div class="modal fade" id="googleModalToggle4" aria-hidden="true" aria-labelledby="googleModalToggleLabel4" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="googleModalToggleLabel4">Update an Authenticator app</h5>

        <button type="button" class="btn-close closebtn" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

	  <span class="message_active">

        <p>Please enter your 6-digit authentication code from the <a href="https://support.google.com/accounts/answer/1066447?hl=en" title="Move to Google Authenticator" target="_blank">Google Authenticator</a> app. </p>

		

<div class="text-center my-2">

<span id="message-error"></span>

<input type="number" maxlength="6" class="form-control form-control-sm text-center px-2" name="code" id="code" title="Enter your 6 Digit Authentication Code" required >

</div>

      

        <div class="modal-footer"><button class="btn btn-primary" title="back" data-bs-target="#googleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>

          <button class="btn btn-secondary match-2fa" >Confirm update</button>

      </div>

	  </span>

	  <span class="message_deactive">

	  <p>From now on, whenever you sign in to your account, you'll need to enter both your password and also an authentication code generated by Google Authenticator. </p>

	  <div class="modal-footer"><button type="button" class="btn btn-secondary closebtn" data-bs-dismiss="modal">Done</button>

      </div>

          

      <!--</div>-->

	  </span>

    </div>

  </div>

</div>

</div>

                

<script>





$('.two-fa-action').on('click', function () {



var datavals=$(this).attr('data-value');

var senddata='?vid=<?=$_SESSION["s_client_id"];?>&google_auth_access='+datavals;



	$.ajax({

	url: "<?=$data['Host'];?>/common/ajax-two-step-authentication",

	data:'vid=<?=$_SESSION["s_client_id"];?>&google_auth_access='+datavals,

	type: "POST",

	success:function(data){

	  //alert(data);

	  if(data==1){

	  location.reload(true);

	  }

	},

	error:function (){}

	});

	

});



// For Match 2fa

$('.match-2fa').on('click', function () {

   var code=$('#code').val();

       //alert(code);

	   

	    if(code==''){

			alert('Please enter 123456');

			return false;

		}else if($.trim(code).length != 6){

		    alert('Please enter 6 digit number');

			return false;

		}else if(!$.isNumeric(code)){

		    alert('Please enter Numeric Value');

			return false;

		}

		

		$.ajax({

	url: "<?=$data['Host'];?>/common/ajax-two-step-authentication",

	data:'secret=<?=$sess_secret;?>&code='+$("#code").val(),

	type: "POST",

	success:function(data){

	//alert(data);

	  if(data==1){

	  $(".message_active").hide();

	  $(".message_deactive").show();

	  }else{

	    if(data==""){ var data="Enter your 6 Digit Authentication Code";}

	  $("#message-error").html(data);

	  }

	},

	error:function (){}

	});

	

});



$('.closebtn').on('click', function () {

location.reload(true);

});



$('.showbutton').on('click', function () {

$(".hidebutton").show();

});



	// js for copy data

	function CopyValTestbox(theLabel) {

   

	var range = document.createRange();

	range.selectNode(document.getElementById("myInput"));

	window.getSelection().removeAllRanges(); // clear current selection

	window.getSelection().addRange(range); // to select text

	

	

	        if (document.execCommand('copy')) {

                window.getSelection().removeAllRanges();// to deselect

				alert("Copied : " + theLabel);

            }

	}



</script>

				

				



				

			   

              </div>

            </div>

          </div>

        </div>

        <div class="col-xl-2"> </div>

      </div>

      <!-- end row -->

    </div>

	<? include($data['Path'].'/footer'.$data['iex']);?>

    <!-- container-fluid -->

  </div>

  

  <!-- End Page-content -->

</div>

<!-- end main content-->

</div>

<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->

<div class="rightbar-overlay"></div>









</body>

</html>

