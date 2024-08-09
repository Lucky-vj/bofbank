<?php
include "common.php";
include "controller/blade.reset-password.php";
if(isset($_REQUEST['verify'])&&$_REQUEST['verify']){ $verify_code=$_REQUEST['verify'];}else{ echo "Access Denied";exit; }
$utype=decryption_value($_REQUEST['utype']);

?>
<style>
.bg {
    background-image: url(<?=$data['Host'];?>/images/reset-password-request.png) !important;
}
</style>

<div class="account-pages">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!--<div class="col-lg-5" style="background-image: url(images/Subscription_Monthly_M.jpg);background-repeat: no-repeat;background-position: center;background-size: cover;"> </div>-->
            <div class="col-lg-6 form-container">

                <!-- <div class="text-center text-white my-2"><img src="<?=$web_logo;?>" alt="Logo" class="img-fluid"
                        style="max-height: 100px;"></div> -->
                <div class="card form bg-body-secondary"> <?php /*?>style="box-shadow: -2px -2px 9px #d4d4d4, 0px 0px
                    0px #ffffff;"<?php */?>
                    <div class="card-body p-4 login-cont-main">
                        <div class="p-2">
                            <div class="logo mt-3 mb-3 text-right logo-img"><img src="images/logo2.png" alt="Logo"
                                    class="img-fluid" style="max-height: 100px;"></div>
                            <!-- <h1 class="mb-2 text-center">Reset password</h1> -->
                            <?php if(isset($_SESSION['msg'])&&$_SESSION['msg']){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Alert ! </strong> <?=$_SESSION['msg'];?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['msg']); } ?>




                            <input type="hidden" name="verify_code" id="verify_code" value="<?=$verify_code;?>">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-9">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <!-- <label for="id"><strong>Username</strong></label> -->

                                                <div class="form-control">
                                                    <?php echo member_username(decryption_value($verify_code));?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <!-- <label for="id"><strong>New Password</strong></label> -->

                                                <input type="password" class="form-control" name="npass" id="password1"
                                                    placeholder="Password" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <!-- <label for="userpassword"><strong>Repeat Password</strong></label> -->
                                                <input type="password" class="form-control"
                                                    placeholder="Confirm Password" name="cpass" id="password2"
                                                    autocomplete="off" required="">
                                            </div>

                                        </div>
                                        <div style="font-family: Epilogue;
font-size: 12px;
font-weight: 400;
line-height: 14px;
text-align: left;
color: #000;
margin:15px 0px 25px 0px;
">
                                            Your password must contain at least 8 characters, one uppercase (ex: A. B.
                                            C, etcL one lowercase letter. one numeric dgit (ex: 1.2.3. etc) and one
                                            special character (ex: @,$)
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

                                    <div class="my-2 text-center sign-in-btn">
                                        <button
                                            class="btn btn-primary btn-block waves-effect waves-light w-100 submit-password"
                                            type="submit" name="submit"> RESET PASWORD </button>
                                    </div>
                                    <div class="did-have-account text-center">Already have an account? <a
                                            href="<?=$data['Host'];?>/sign-in<?=$data['ex']?>"
                                            style="color:#27AAE1;">Sign in</a> </div>
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
<script>
$("input[type=password]").keyup(function() {
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");

    if ($("input[type=password]").length > 0) {
        $(".valiglyph").css({
            "display": "flex"
        });
    }


    if ($("#password1").val().length >= 10) {
        $("#8char").removeClass("remove_2");
        $("#8char").addClass("ok_2 ");
        $("#8char").css("color", "#00A41E");
        $('#8char i').attr('class', '<?=$data['fwicon']['check-circle'];?> text-success');
    } else {
        $("#8char").removeClass("ok_2 ");
        $("#8char").addClass("remove_2");
        $("#8char").css("color", "#FF0004");
        $('#8char i').attr('class', '<?=$data['fwicon']['circle-cross'];?> text-danger');

    }

    if (ucase.test($("#password1").val())) {
        $("#ucase").removeClass("remove_2");
        $("#ucase").addClass("ok_2 ");
        $("#ucase").css("color", "#00A41E");
        $('#ucase i').attr('class', '<?=$data['fwicon']['check-circle'];?> text-success');
    } else {
        $("#ucase").removeClass("ok_2 ");
        $("#ucase").addClass("remove_2");
        $("#ucase").css("color", "#FF0004");
        $('#ucase i').attr('class', '<?=$data['fwicon']['circle-cross'];?> text-danger');
    }

    if (lcase.test($("#password1").val())) {
        $("#lcase").removeClass("remove_2");
        $("#lcase").addClass("ok_2 ");
        $("#lcase").css("color", "#00A41E");
        $('#lcase i').attr('class', '<?=$data['fwicon']['check-circle'];?> text-success');
    } else {
        $("#lcase").removeClass("ok_2 ");
        $("#lcase").addClass("remove_2");
        $("#lcase").css("color", "#FF0004");
        $('#lcase i').attr('class', '<?=$data['fwicon']['circle-cross'];?> text-danger');
    }

    if (num.test($("#password1").val())) {
        $("#num").removeClass("remove_2");
        $("#num").addClass("ok_2 ");
        $("#num").css("color", "#00A41E");
        $('#num i').attr('class', '<?=$data['fwicon']['check-circle'];?> text-success');
    } else {

        $("#num").removeClass("ok_2 ");
        $("#num").addClass("remove_2");
        $("#num").css("color", "#FF0004");
        $('#num i').attr('class', '<?=$data['fwicon']['circle-cross'];?> text-danger');
    }

    if ($("#password1").val() == $("#password2").val()) {

        if ($("#password1").val() == "") {
            return false;
        }


        $("#pwmatch").removeClass("remove_2");
        $("#pwmatch").addClass("ok_2 ");
        $("#pwmatch").css("color", "#00A41E");
        $('#pwmatch i').attr('class', '<?=$data['fwicon']['check-circle'];?> text-success');
    } else {

        $("#pwmatch").removeClass("ok_2 ");
        $("#pwmatch").addClass("remove_2");
        $("#pwmatch").css("color", "#FF0004");
        $('#pwmatch i').attr('class', '<?=$data['fwicon']['circle-cross'];?> text-danger');
    }
});

$(document).ready(function() {
    $('#password1,#password2').bind('copy paste cut', function(e) {
        e.preventDefault(); //disable cut,copy,paste
        alert('cut,copy & paste options are disabled !!');
    });
});


$('.submit-password').on('click', function() {


    var npass = $('#password1').val();
    var cpass = $('#password2').val();
    var auth_pass_code = $('#verify_code').val();
    var pass = "reset";

    if (npass == '') {
        alert('Please enter new password');
        $("#password1").focus();
        return false;
    } else if (cpass == '') {
        alert('Please enter repeat password');
        $("#password2").focus();
        return false;
    } else if (cpass != npass) {
        alert('New password and repeat password not matched');
        $("#password2").focus();
        return false;
    } else if (npass.search(/[a-z]/) < 0) {
        alert('Password must contain at least one lowercase letter');
        $("#password1").focus();
        return false;
    } else if (npass.search(/[A-Z]/) < 0) {
        alert('Password must contain at least one uppercase letter');
        $("#password1").focus();
        return false;
    } else if (npass.search(/[0-9]/) < 0) {
        alert('Password must contain at least one number');
        $("#password1").focus();
        return false;
    } else if (npass.length < 10) {
        alert('Password must be at least 10 characters');
        $("#password1").focus();
        return false;
    }
    $(".submit-password").html("<i class='<?=$data['fwicon']['spinner'];?> fa-spin-pulse'></i>");




    $.ajax({
        url: "<?=$data['Host'];?>/common/call-ajax-page",
        data: 'npass=' + npass + '&cpass=' + cpass + '&auth_pass_code=' + auth_pass_code + '&pass=' +
            pass,
        type: "POST",
        success: function(data) {
            //alert(data);
            if (data == 1) {
                //location.reload(true);
                window.location.href = "<?=$data['Host'];?>/sign-in<?=$data['ex']?>";

            } else {
                //alert(data);
                $(".submit-password").html(" Continue ");
            }
        },
        error: function() {}
    });

});
</script>

</body>

</html>