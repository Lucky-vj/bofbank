<?php
include "../common.php";
include "controller/blade.sign-in.php";
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

              <h1 class="mb-2 text-center"> Sign in </h1>
                  <?php if(isset($_SESSION['msg_login'])&&$_SESSION['msg_login']){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?=$_SESSION['msg_login'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['msg_login']); } ?> 
            
            <?php if(isset($_GET['y'])){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success </strong> Sign out Successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php  } ?>
			  
              <form class="form-horizontal" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      
                   <input type="text" class="form-control" id="adminId" name="txt_adminid" placeholder="Enter username" value="" required />
				   <!-- <label for="adminId">Enter username</label> -->
                    </div>
                    <div class="form-floating mb-3">
                      
                   <input type="password" class="form-control" id="userpassword" name="txt_password" placeholder="Enter password" required />
                   <!-- <label for="userpassword">Password</label> -->
                    </div>
                    
                    <div class="my-2 text-center">
                      <button class="btn btn-primary btn-block waves-effect waves-light w-100"
                            type="submit" name="btn_submit"> SIGN IN </button>
                    </div>

                     
                        <div class="mt-3"> <a href="<?=$data['Admins'];?>/reset-password-request<?=$data['ex'];?>" class="text-link">
                         <i class="<?=$data['fwicon']['reset-password'];?> fa-fw"></i> Reset Password?</a> </div>
                      
                    </div>
                  </div>
				  
				  
			 </form>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</div>
<!-- end Account pages -->


</body>
</html>
