<?php
include "common.php";
include "controller/blade.reset-password.php";
// if(isset($_REQUEST['verify'])&&$_REQUEST['verify']){ $verify_code=$_REQUEST['verify'];}else{ echo "Access Denied";exit; }
// $utype=decryption_value($_REQUEST['utype']);

?>
<style>
.bg {
    background-image: url(<?=$data['Host'];?>/images/reset-password-request.png) !important;
}

.success {
    font-family: Epilogue;
    font-size: 30px;
    font-weight: 600;
    line-height: 39px;
    letter-spacing: 0.16em;
    text-align: center;
    color: #000;
}

.success-desc {
    font-family: Epilogue;
    font-size: 13px;
    font-weight: 400;
    line-height: 15.6px;
    letter-spacing: 0.08em;
    text-align: center;
    color: #000;
    margin: auto;
    max-width: 85%;

}

.sign-new button {
    background: #0000004D !important;
    font-family: Epilogue;
    font-size: 18px;
    font-weight: 600;
    /* line-height: 31.34px; */
    text-align: center;
    color: #000 !important;
    border: none !important;
    border-radius: 12px;

}

.inner-lay {
    background: #FFFFFF1A;
    padding: 15px 20px;
    border-radius: 12px;
    margin-top: 15px
}
.sign-up .card{
  background: transparent !important;
  box-shadow: none;
  border: none !important;
}
</style>

<div class="account-pages sign-up">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!--<div class="col-lg-5" style="background-image: url(images/Subscription_Monthly_M.jpg);background-repeat: no-repeat;background-position: center;background-size: cover;"> </div>-->
            <div class="col-lg-6 form-container">

                <!-- <div class="text-center text-white my-2"><img src="<?=$web_logo;?>" alt="Logo" class="img-fluid"
                        style="max-height: 100px;"></div> -->
                <div class="card form"> <?php /*?>style="box-shadow: -2px -2px 9px #d4d4d4, 0px 0px
                    0px #ffffff;"<?php */?>
                    <div class="card-body p-4 login-cont-main">
                        <div class="p-2">
                            <div class="logo mt-3 mb-3 text-right logo-img"><img src="images/logo2.png" alt="Logo"
                                    class="img-fluid" style="max-height: 100px;"></div>





                            <input type="hidden" name="verify_code" id="verify_code" value="<?=$verify_code;?>">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 inner-lay">
                                    <div class="row justify-content-center">

                                        <div class="col-md-12">
                                            <div class="text-center success">
                                                SUCCESS!
                                            </div>
                                            <div class="text-center">
                                                <img src="images/done.gif" />
                                            </div>
                                            <div class="success-desc">
                                                Thank for registering on BOF BANK! Please dick on the verification link
                                                sent to Email ID to activate your account If you cannot fre eman, please
                                                check your spam and trash folders to ensure that the hasn't tpen marked
                                                as spam or accidentally deleted.
                                            </div>
                                        </div>


                                    </div>

                                    <!-- <div class="row valiglyph my-2">
                                        <div class="col-sm-6"><span id="8char" style="color:#FF0004;"><i
                                                    class="<?=$data['fwicon']['circle-cross'];?>"></i></span> 10
                                            Characters Long</div>
                                        <div class="col-sm-6"><span id="ucase" style="color:#FF0004;"><i
                                                    class="<?=$data['fwicon']['circle-cross'];?>"></i></span> One
                                            Uppercase Letter</div>
                                        <div class="col-sm-6"><span id="lcase" style="color:#FF0004;"><i
                                                    class="<?=$data['fwicon']['circle-cross'];?>"></i></span> One
                                            Lowercase Letter</div>
                                        <div class="col-sm-6"><span id="num" style="color:#FF0004;"><i
                                                    class="<?=$data['fwicon']['circle-cross'];?>"></i></span> One Number
                                        </div>
                                        <div class="col-sm-6"><span id="pwmatch" style="color:#FF0004;"><i
                                                    class="<?=$data['fwicon']['circle-cross'];?>"></i></span> Passwords
                                            Match</div>
                                    </div> -->

                                    <div class="mb-2 mt-4 text-center sign-new">
                                        <button
                                            class="btn btn-primary btn-block waves-effect waves-light w-100 submit-password"
                                            type="submit" name="submit"> CLICK HERE TO RESEND THE EMAIL </button>
                                    </div>

                                    <div class="my-3 text-center sign-in-btn">
                                        <button
                                            class="btn btn-primary btn-block waves-effect waves-light w-100 submit-password"
                                            type="submit" name="submit">NEXT</button>
                                    </div>

                                </div>
                                <!-- <div class="col-md-6"><a href="<?=$data['Host'];?>/sign-up<?=$data['ex']?>"
                                        class="text-muted" title="Click for sign up new user"><i
                                            class="<?=$data['fwicon']['profile'];?> fa-fw"></i> New User ? Sign up</a>
                                </div> -->
                                <div class="col-md-6">
                                    <!-- <a
                                        href="<?=$data['Host'];?>/reset-password-request<?=$data['ex']?>"
                                        class="text-muted" title="Click for recover your account details"><i
                                            class="<?=$data['fwicon']['reset-password'];?> fa-fw"></i> Forgot your
                                        password?</a> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 image-container">
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- end Account pages -->


</body>

</html>