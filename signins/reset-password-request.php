<?php
include "../common.php";
include "controller/blade.reset-password-request.php";
?>
<style>
.bg { background-image: url(<?=$data['Host'];?>/images/web-cover-internal-min.jpg) !important; }
</style> 

<div class="account-pages admin">
  <div class="container">
    <!-- end row -->
    <div class="row justify-content-center">
      <div class="col-lg-12 mt-5" style="max-width:400px;margin:0 auto;">
	  <div class="text-center text-white my-2"><img src="images/light-logo.png" alt="Logo" class="img-fluid" style="max-height: 60px;"></div>
        <div class="card form" ><?php /*?>style="box-shadow: -2px -2px 9px #d4d4d4, 0px 0px 0px #ffffff;"<?php */?>
          <div class="card-body p-4">
            <div class="p-2">
              <h1 class="mb-2 text-center"> Reset Password </h1>
			  <?php  if(isset($_SESSION['message-error'])&&$_SESSION['message-error']){ ?>
				  
				  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  				  <strong>Alert! </strong> <?=$_SESSION['message-error'];?>
  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>

				  <? unset($_SESSION['message-error']); } ?>
				  
				  <?php  if(isset($_SESSION['message-success'])&&$_SESSION['message-success']){ ?>
				  
				  <div class="alert alert-success alert-dismissible fade show" role="alert">
  				  <strong>Success! </strong> <?=$_SESSION['message-success'];?>
  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>

				  <? unset($_SESSION['message-success']); } ?>
              <form class="form-horizontal"  method="post">
                <div class="row">
                  <div class="col-md-12">
				  
				  
				  
				  

				  <div class="form-floating mb-3 mt-2">
 <input type="text" name="recovery_username" id="recovery_username" title="Username" class="form-control"  placeholder="Enter User Name" required>
  <!-- <label for="recovery_username">Enter Username</label> -->
</div>
                    
                    <div class="my-2">
                      <button class="btn btn-primary btn-block waves-effect waves-light w-100" name="forgot"  value="recover" type="submit">Continue</button>
					                  <div class="my-2 text-start"> <a href="<?=$data['Admins'];?>/sign-in<?=$data['ex'];?>" class="text-link" title="Click for recover your account details"><i class="<?=$data['fwicon']['key'];?> fa-fw"></i> Already have an Account</a> </div>

                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</div>
<!-- end Account pages -->
</div>
<!-- end Account pages -->


</body>
</html>