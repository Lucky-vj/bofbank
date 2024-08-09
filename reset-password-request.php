<?php
include "common.php";
include "controller/blade.reset-password-request.php";
?>
<style>
.bg {
    background-image: url(<?=$data['Host'];?>/images/reset-password-request.png) !important;
}
</style>
<div class="account-pages">
    <div class="container-fluid">
        <!-- end row -->
        <div class="row">
            <div class="col-lg-6 form-container">

                <div class="form login-cont-main"> <?php /*?>style="box-shadow: -2px -2px 9px #d4d4d4,
                    0px 0px 0px #ffffff;"<?php */?>
                    <div class="logo mt-3 mb-3 text-right logo-img"><img src="images/logo2.png" alt="Logo"
                            class="img-fluid" style="max-height: 100px;"></div>
                    <div class="card-body p-4">
                        <div class="p-2">
                            <div class="row justify-content-center">
                                <h1 class="mb-2 login-text text-center"> Reset Password </h1>
                                <p class="text-center" style="max-width:90%; margin-bottom:4rem;">Enter your email
                                    address and we’ll send you an email with instructions to reset your password</p>
                                <form class="form-horizontal" method="post">

                                    <div class="col-md-12 col-lg-10" style="margin:auto;">


                                        <?php  if(isset($_SESSION['message-error'])&&$_SESSION['message-error']){ ?>

                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Alert! </strong> <?=$_SESSION['message-error'];?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>

                                        <? unset($_SESSION['message-error']); } ?>

                                        <?php  if(isset($_SESSION['message-success'])&&$_SESSION['message-success']){ ?>

                                        <div class="alert alert-dismissible fade show" role="alert" style="background: #0ECB8180;border: 1px solid #11FFB6;border-radius:15px;color: #A8FFDD;
">
                                            <strong>Success! </strong> <?=$_SESSION['message-success'];?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>

                                        <? unset($_SESSION['message-success']); } ?>




                                        <div class="form-title">Email Address*</div>
                                        <div class="form-floating mb-3 mt-2">
                                            <input type="email" name="recovery_username" title="Username" id="adminId"
                                                class="form-control" placeholder="Enter User Name" required>
                                            <!-- <label for="adminId">Enter registered email id</label> -->
                                        </div>
                                        <div class="my-2 sign-in-btn">
                                            <button
                                                class="btn btn-primary btn-block waves-effect waves-light w-100  login_account"
                                                name="forgot" value="recover" type="submit">Reset</button>


                                        </div>
                                        <!-- <div class="my-2 text-start"> <a href="<?=$data['Host'];?>/sign-in<?=$data['ex']?>" class="text-link" title="Click for recover your account details"><i class="<?=$data['fwicon']['profile'];?> fa-fw"></i> Return to sign in</a> </div> -->
                                        <div class="did-have-account text-left my-3">
                                            Don't have an account? <a class="sign-up" style="color:#27AAE1;"
                                                href="<?=$data['Host'];?>/sign-up<?=$data['ex']?>">Sign up </a>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-none d-md-block image-container">
                <div class="row">
                    <!--    <div class="col-lg-12" style="text-align:center !important; vertical-align:middle; height:100vh"><img src="images/logo2.png" alt="Logo" class="img-fluid" style="max-height: 120px;-->

                    <!--margin: 0;-->

                    <!--position: relative;-->

                    <!--top: 40%;">-->
                    <!--      <div class="home-txt" style="position:relative;top: 42%; text-align:center;">Better Service Better Banking</div>-->
                    <!--    </div>-->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- end Account pages -->

</body>
<script>
$('.login_account').on('click', function() {
    if ($('#adminId').val() == "") {
        alert("Please enter your username");
        return;
    }

    $(".login_account").html("<i class='<?=$data['fwicon']['spinner']?> fa-spin-pulse'></i>");

});
</script>

</html>