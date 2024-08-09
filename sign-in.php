<?php
include "common.php";
include "controller/blade.sign-in.php";
// include "common/fb_o_auth/fb_login.php";
// include "common/ld_o_auth/linkedinOAuth.php";
// include "common/google_o_auth/google_o_auth.php";
$button = "btn_submit";
// if (isset($_SESSION['otp-sent']) && $_SESSION['otp-sent'] = 1) {
//   $button = "verify_otp";
//   $disable = "disabled";
// }

?>
<style>
  .bg {
    background-color: #eeeeee;
  }

  .video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
  }

  .home-txt {
    margin: 0 auto;
    animation: zoom-in-zoom-out 5s ease infinite;
  }

  .card {
    width: 550px;
    height: 300px;
    margin: 0;
    position: absolute;
    top: 35%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    margin-left: 175px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    backface-visibility: hidden;
    transform: rotate(45deg);
    animation: rotateCard 4s infinite alternate ease-in-out;
  }

  .card img {

    width: 106%;
    height: 100%;
    border-radius: 10px;
  }

  @keyframes rotateCard {
    from {
      transform: rotate(30deg) rotateY(-25deg);
    }

    to {
      transform: rotate(30deg) rotateY(25deg);
    }
  }

  @keyframes zoom-in-zoom-out {

    0% {

      transform: scale(1, 1);

    }

    50% {

      transform: scale(1.5, 1.5);

    }

    100% {

      transform: scale(1, 1);

    }

  }
</style>
<img src="./images/1.png" alt="Card Image" class="video-background">
<div class="container-fluid">

  <div class="row ">
    <div class="col-lg-6  form-container">

      <div class="row login-cont-main form">
        <!--<div class="col-lg-2 col-md-2 col-sm-9 col-xs-2 form-box"> </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-box">
          <div class="logo mt-3 mb-3 text-right logo-img"><img src="images/logo2.png" alt="Logo" class="img-fluid" style="max-height: 100px;"></div>
          <div class="heading mb-3">
            <h1 class="mb-2 text-left login-text"> Login </h1>
            <div class=" text-left login-desc">Enter your email and password to sign in</div>
          </div>
          <?php if (isset($_SESSION['msg']) && $_SESSION['msg']) { ?>
            <div class="alert alert-info alert-dismissible fade show bg-success border-0" role="alert">
              <?= $_SESSION['msg']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php unset($_SESSION['msg']);
          } ?>
          <form class="form-horizontal mt-3" method="post">
            <div class="row ">
              <div class="col-md-12 col-xl-10 col-lg-10">
                <div class="row ">
                  <div class="col-md-12">
                    <div class="form-title">Email</div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control username" id="adminId" name='txt_username' placeholder="Your email address" value="<? if (isset($_SESSION['members']['client_id'])) {
                                                                                                                                                    echo $_SESSION['members']['username'];
                                                                                                                                                  } ?>" <? if (isset($disable)) {
                                                                                                                                                          echo $disable;
                                                                                                                                                        } ?> required>
                      <!--<label for="adminId">Enterss registered email id</label>-->
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <div class="form-title">Password</div>
                      <input id="password-field" type="password" onkeyup="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,'')" class="form-control password" id="userpassword" name="txt_password" placeholder="Your password" value="<? if (isset($_SESSION['members']['password'])) {
                                                                                                                                                                                                                                                          echo "XXXXX";
                                                                                                                                                                                                                                                        } ?>" required <? if (isset($disable)) {
                                                                                                                                                                                                                                                                          echo $disable;
                                                                                                                                                                                                                                                                        } ?>>
                      <!-- <input id="password-field"
                                                                onkeyup="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,'')"
                                                                required="required" name="current_password"
                                                                class="form-control allletterwithspace" type="password"> -->
                      <!--<label for="userpassword">Enter password</label>-->

                      <div class="edit-icon-img">
                        <i toggle="#password-field" class="fa fa-fw  field-icon toggle-password fa-eye-slash"></i>
                      </div>
                    </div>
                  </div>
                  <? if (isset($_SESSION['otp-sent']) && $_SESSION['otp-sent'] = 1) { ?>
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="userotp" name="txt_otp" placeholder="Enter Otp" min="1001" max="9999" required>
                        <!-- <label for="userotp">Enter Otp (Sent your registered email id)</label> -->
                      </div>
                    </div>
                  <? } ?>
                </div>
                <div class="remember-me-main">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Remember me</label>
                  </div>
                  <div>
                    <a href="<?= $data['Host']; ?>/reset-password-request<?= $data['ex'] ?>" style="color:#000;">Forgot Password ?</a>
                  </div>
                </div>
                <div class=" mb-2 text-center sign-in-btn ">
                  <button class="btn btn-primary btn-block waves-effect waves-light w-100 login_account" type="submit" name="<?= $button; ?>"> Sign in </button>
                </div>
                <div class="did-have-account">
                  Don't have an account? <a class="sign-up" style="color:#27AAE1;" href="<?= $data['Host']; ?>/sign-up<?= $data['ex'] ?>">Sign up </a>
                </div>
              </div>
              <!--<div class="col-xl-9"><a href="<?= $data['Host']; ?>/sign-up<?= $data['ex'] ?>" class="text-link" title="Click for sign up new user" style="color:#6b747d;"><i class="<?= $data['fwicon']['profile']; ?> fa-fw" style="color:#6b747d;"></i> New user ? sign up</a></div>-->
              <!--<div class="col-xl-9"><a href="<?= $data['Host']; ?>/reset-password-request<?= $data['ex'] ?>" class="text-link" title="Click for recover your account details" style="color:#6b747d;"><i class="<?= $data['fwicon']['reset-password']; ?> fa-fw" style="color:#6b747d;"></i> Reset password?</a></div> <div class="col text-end" style="max-width: 20px !important;"><span class="float-end" id="liveToastBtn" title="Support helpline"><i class="<?= $data['fwicon']['support']; ?> fa-fw"></i></span></div>-->
            </div>
            <!--<div class="my-2 text-center"><strong>Or sign in with</strong></div>-->
            <!--<hr />-->
            <!--<div class="col-md-12 text-center my-2">-->
            <!--                             <div class="row">-->
            <!--                                 <div class="col-md-4 py-1">-->
            <!--                                     <?= $output; ?>-->
            <!--                                 </div>-->
            <!--                                 <div class="col-md-4  py-1">-->
            <!--                                     <?= $googleOutput ?>-->
            <!--                                 </div>-->
            <!--                                 <div class="col-md-4  py-1">-->
            <!--                                     <?= $linkdOutput ?>-->
            <!--                                 </div>-->
            <!--                             </div>-->
            <!--                         </div>-->
          </form>
        </div>
        <!--<div class="col-lg-2 col-md-2 col-sm-9 col-xs-2 form-box"> </div>-->
      </div>
    </div>
    <div class="card">
      <img src="./images/card.png" alt="Card Image">
    </div>
  </div>


  <!-- <div class="col-lg-6 col-md-6 d-none d-md-block image-container"> -->
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
</div>
<? include($data['Path'] . '/footer' . $data['iex']); ?>
</div>
<!-- end Account pages -->
<div class="toast-container position-absolute top-50 start-50 translate-middle">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header"> <i class="<?= $data['fwicon']['support']; ?> fa-fw text-success"></i> <strong class="me-auto">&nbsp;Support Team</strong> <small>24x7</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <div><span><i class="<?= $data['fwicon']['email']; ?>"></i>
          <?= $_SESSION['domain_server']['host_email']; ?>
        </span>&nbsp;&nbsp;<span><i class="<?= $data['fwicon']['phone']; ?>"></i>
          <?= $_SESSION['domain_server']['host_contact_no']; ?>
        </span></div>
    </div>
  </div>
</div>
</body>
<script>
  $('.login_account').on('click', function() {
    if (($('.username').val() == "") || ($('.password').val() == "")) {
      alert("Please Enter Username and password");

      return;
    }
    if ($("#userotp").length) {
      //alert("The element you're testing is present.");
      if ($('#userotp').val() == "") {
        alert("Please Enter OTP");
        return;
      }
    }

    $(".login_account").html("<i class='<?= $data['fwicon']['spinner'] ?> fa-spin-pulse'></i>");

  });
</script>
<script>
  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')


  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      toastBootstrap.show()

    })
  }
</script>


<script>
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "text") {
      input.attr("type", "password");
    } else {
      input.attr("type", "text");
    }
  });
</script>

</html>