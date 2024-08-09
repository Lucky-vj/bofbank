<?php
include "common.php";
include "controller/blade.device_confirmations.php";
$_SESSION['showcode']=0;
unset($_SESSION['showcode']);
?>





<style>



.noQrBarCode #content {}

#content {}

#img{margin: 0 auto !important;

text-align:center;}

.error{margin: 0 auto !important;

text-align:center; color:#fff;background-color:red;padding:5px;}

h1{font-size:18px;}

p{font-size:14px;}

.step2{margin-top:50px;border-top:1px solid;border-bottom:1px solid;width:100%;padding-top: 10px;

padding-bottom: 10px;}

/*.btn-primary { background-color:#999; cursor:pointer;}*/





.label_11{float:left;font-weight:bold;width:100%;margin:10px 0 6px 0;color:#8597f6}

.button_sub{padding:10px;background-color:#001cb7;border:2px solid #0e2cd4;border-radius:6px;width:160px;font-size:22px;color:#fff;height:50px;margin:7px 0 0 0;text-transform:uppercase}

.button_sub:focus{background-color:#4CAF50;border:2px solid #61e066;border-radius:6px}

.button_sub:active{}

.input_key_div{/*display:block;width:351px;clear:both;padding:7px 0*/}

.key_input1{width:14px;outline:none;padding:5px 16px;font-size:25px;letter-spacing:33px;font-weight:bold;border-radius:5px;border:2px solid #9d9d9d;display:inline-block}

html .key_input {}



.form-control{display:unset!important;text-align:center!important;font-weight:bold; font-size:24px!important;}







</style>



<div class="container-sm my-2" >

<div id="content" class="shadow p-3 my-5 rounded bg-success text-white"  style="max-width:335px; margin:0 auto;">

  

  <? if(isset($_SESSION['showcode'])&&$_SESSION['showcode']==true){?>

  <h1>2-Step Verification using Google Authenticator</h1>

  <? } ?>

  <div id="device">

    <?php

		  if (isset($_SESSION['showcode'])&&$_SESSION['showcode']==true)

		  {

		  ?>

    <p>Enter the verification code generated by Google Authenticator app on your phone.</p>

    <div id="img"><br/>

      <br/>

      <img src='<?php echo $qrCodeUrl; ?>' /><br/>

      <br/>

      <br/>

    </div>

    <?php } if(!isset($_SESSION['hideAuthenticatorCode'])){ ?>

    

	<div class="text-center my-2"><img src="<?=$data['Host'];?>/images/2fa-min.png"  height="50px;"/></div>

	<div class="text-center" style="font-size:18px;">Two-factor authentication</div>

	<center>

	<div class="border border-light border-2 my-2 py-2 rounded bg-vdark">

      <form name="postform" method="post" action="devices">

	  <div>

        <div class="text-white float-start px-4 ">Authentication Code </div>

		<div class="float-end px-4"><a class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Two Factor Authentication, or 2FA, is an extra layer of protection used to ensure the security of online accounts beyond just a username and password.">what's this?</a> </div>



		<div class="clearfix"></div>

	  </div>

	  

<div class="row my-1 mx-2">



		<div class="col-sm-12 my-1">

		<input type="number" id="sample_otp" class="form-control form-control-sm text-center" title="Enter Authentication Code"  name="code" required="required"  autofocus />

		</div>

		

		<div class="col-sm-12 my-1">

		<input  type="submit" id="sbmt7"  class="btn btn-info btn-sm w-100" value="Verify" />

		</div>

</div>

        

      </form>

	    <?php if ((isset($_SESSION['googleCode_err']))&&($_SESSION['googleCode_err']!=NULL)){ ?>

  <div class="alert alert-danger  alert-dismissible fade show mx-2" role="alert">

  <strong><i class="<?=$data['fwicon']['triangle-exclamation'];?>"></i> </strong> <?php echo $_SESSION['googleCode_err']; ?>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

  <? $_SESSION['googleCode_err']=NULL; } ?>

	</div>

	

    </center>

	<div class="my-0 py-2 fw-lighter"><i class="<?=$data['fwicon']['mobile-screen'];?>"></i> Open two factor authentication app on your device to view your authentication code and verify your identity.</div>

	

	<div class="text-end"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Contact (Customer-Service-email) for disabling 2FA from your account. Some features may not work for 24 hours." class="text-white"><strong>Lost our 2FA Code?</strong></a></div>

	

	<div class="clearfix"></div>

    <?php } ?>

  </div>



</div>







    </div>

<script>



$("#sbmt7").click(function() {

var sample_otp=$('#sample_otp').val();



        if(sample_otp==''){

			alert('Please enter 123456');

			return false;

		}else if($.trim(sample_otp).length != 6){

		    alert('Please enter 6 digit number');

			return false;

		}else if(!$.isNumeric(sample_otp)){

		    alert('Please enter Numeric Value');

			return false;

		}else{ } 

		

});



$('input').bind('paste', function () {

setTimeout(explode, 200);

});



function explode(){



        var sample_otp=$('#sample_otp').val();

  

        if(sample_otp==''){

			alert('Please enter 123456');

			return false;

		}else if($.trim(sample_otp).length != 6){

		    alert('Please enter 6 digit number');

			return false;

		}else if(!$.isNumeric(sample_otp)){

		    alert('Please enter Numeric Value');

			return false;

		}

  

        $('#sbmt7').trigger("click");

}





 

var BrowserName="<?=$browserOs1['BrowserName'];?>";

var setBrowserName="<?=$setBrowserName?>";



var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {

  return new bootstrap.Tooltip(tooltipTriggerEl)

})



</script>



</div>

