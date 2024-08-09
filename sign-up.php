<?php
include "common.php";
include "controller/blade.sign-up.php";
// include "common/fb_o_auth/fb_login.php";
// include "common/ld_o_auth/linkedinOAuth.php";
// include "common/google_o_auth/google_o_auth.php";
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

  /* .sign-up .card {
    background: transparent !important;
    box-shadow: none;
    border: none !important;
  } */
</style>
<img src="./images/1.png" alt="Card Image" class="video-background">
<div class="account-pages sign-up">
  <div class="container-fluid">
    <!-- end row -->
    <div class="row justify-content-center">
      <div class="col-lg-6 form-container">
        <div class="form"> <?php /*?>style="box-shadow: -2px -2px 9px #d4d4d4, 0px 0px 0px #ffffff;"<?php */ ?>
          <div class="card-body login-cont-main">
            <div class="scroll-div">

              <div class="text-right text-white my-2 logo-img"><img src="images/logo2.png" alt="Logo" class="img-fluid" style="max-height: 100px;"></div>
              <div class="mb-2 login-text">Register </div>
              <div class="col-lg-10 mt-2 mb-4">
                <!--<div class=" text-left login-desc" style="color:#000;" >Use these awesome forms to login or create new account in your project for free.</div>-->
              </div>
              <?php if (isset($_SESSION['regmsg']) && $_SESSION['regmsg'] == 'Duplicate') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Duplicate ! </strong> User Name Already Exist. Please Try to Login
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php unset($_SESSION['regmsg']);
              } ?>





              <form method="post" name="reg_form" autocomplete="off"> <!--class="needs-validation" novalidate-->
                <div class="row">
                  <div class="col-md-12 mb-2 col-xl-10">
                    <div class="form-title">Name</div>
                    <div class="form-floating">
                      <input type="text" name="txt_fname" id="txt_fname" class="form-control" placeholder="Your full name" autocomplete="false" required>
                      <!--<label for="adminId">Enter First Name</label>-->
                    </div>
                  </div>

                  <div class="col-md-12 mb-2 col-xl-10">
                    <div class="form-title">Email</div>

                    <div class="form-floating">
                      <input type="email" name="txt_username" class="form-control" id="username" placeholder="Your email address" autocomplete="false" onBlur="checkAvailability()" required>
                      <!--<label for="username">Enter Email ID <span id="user-availability-status"></span> </label>-->
                    </div>
                    <span class="text-danger dmessage"></span>

                  </div>
                  <!--<div class="col-md-12 mb-2 col-xl-10">-->
                  <!--    <div class="form-floating mb-3">-->
                  <!--          <div class="form-title">Password</div>-->
                  <!--      <input id="password-field" type="password" onkeyup="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,'')" class="form-control password" id="userpassword" name="txt_password" placeholder="Your password" value=""  >-->
                  <!--      <label for="userpassword">Enter password</label>-->
                  <!--        <div class="edit-icon-img">-->
                  <!--            <i toggle="#password-field" class="fa fa-fw  field-icon toggle-password fa-eye-slash"></i>-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    </div>-->
                  <!--<div class="col-md-12 col-xl-10 mt-1">-->
                  <!--    <div class="form-check form-switch">-->
                  <!--    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">-->
                  <!--    <label class="form-check-label" for="flexSwitchCheckDefault">Remember me</label>-->
                  <!--  </div>-->
                  <!--    </div>-->

                </div>


                <!--                <div class="row my-2">-->
                <!--                  <div class="custom-control custom-checkbox col-md-7">-->
                <!--<input type="checkbox" class="custom-control-input" id="term-conditionCheck" required title="Terms and Conditions" checked>-->
                <!--                    <label class="custom-control-label font-weight-normal" for="term-conditionCheck" data-toggle="modal" data-target="#exampleModalLong">I accept <a href="https://bofbank.com/term-condition/" class="text-primary"  target="_blank">Terms and Conditions</a></label>-->
                <!--                  </div>-->
                <!--				  <div class="custom-control custom-checkbox col-md-5">-->
                <!--                    <a href="<?= $data['Host']; ?>/sign-in<?= $data['ex'] ?>" class="text-link" title="Click for sign in your account"><i class="<?= $data['fwicon']['profile']; ?> fa-fw"></i> Return to sign in</a>-->
                <!--                  </div>-->
                <!--                </div>-->
                <div class="col-md-12 my-2 col-xl-10">
                  <div class=" mb-2 text-center sign-in-btn ">
                    <button class="btn btn-success w-100 login_account" name="btnSubmit" type="submit">Register</button>
                  </div>
                  <div class="did-have-account">Already have an account? <a href="<?= $data['Host']; ?>/sign-in<?= $data['ex'] ?>" style="color:#27AAE1;">Sign in</a> </div>
                  <!--<div class="or">-->
                  <!--    or-->
                  <!--</div>-->
                  <!--<div class="follow">-->
                  <!--    <div>-->
                  <!--        <img src="images/fb.png"/>-->
                  <!--    </div>-->
                  <!--      <div>-->
                  <!--        <img src="images/apple.png" />-->
                  <!--    </div>-->
                  <!--      <div>-->
                  <!--        <img src="images/google.png" />-->
                  <!--    </div>-->
                  <!--</div>-->

                </div>



                <!--<div class="my-2 text-center"><strong>Or sign up with</strong></div>-->
                <!--<hr />-->
                <!--<div class="col-md-12 text-center my-2">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-4 py-1">-->
                <!--            <?= $output; ?>-->
                <!--        </div>-->
                <!--        <div class="col-md-4 py-1">-->
                <!--            <?= $googleOutput ?>-->
                <!--        </div>-->
                <!--        <div class="col-md-4 py-1">-->
                <!--            <?= $linkdOutput ?>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="./images/card.png" alt="Card Image">
        </div>
      </div>
      <div class="col-lg-6">
      </div>
    </div>
  </div>
</div>
<script>
  $('.login_account').on('click', function() {


    if ($('#txt_fname').val() == "") {
      alert("Please Enter First Name");
      return;
    } else if ($('#txt_lname').val() == "") {
      alert("Please Enter Last Name");
      return;
    } else if ($('#username').val() == "") {
      alert("Please Enter User Name");
      return;
    } else if ($('#txt_email').val() == "") {
      alert("Please Enter Email Address");
      return;
    } else if ($('#txt_country').val() == "") {
      alert("Please Select Country of Residence");
      return;
    } else {

    }


    $(".login_account").html("<i class='<?= $data['fwicon']['spinner'] ?> fa-spin-pulse'></i>");
  });
</script>
<script>
  function checkAvailability() {
    var uname = $("#username").val();
    if (uname == "") {
      return false;
    }

    //alert(222);


    jQuery.ajax({
      url: "common/check-username-availability.php",
      data: 'username=' + $("#username").val(),
      type: "POST",
      success: function(data) {
        //alert(data);
        if (data == 1) {
          var displaydata = "<span class='status-not-available text-danger mx-2' title='Username not available'> <i class='<?= $data['fwicon']['check-cross']; ?> fa-fw my-1'></i></span>";
          $("#user-availability-status").html(displaydata);
          $(".dmessage").html("Email " + uname + " id already exist");
          $('#username').val("");

        } else {
          var displaydata = "<span class='status-available text-success mx-2' title='Username available'> <i class='<?= $data['fwicon']['tick-circle']; ?> fa-fw my-1'></i></span>";
          $("#user-availability-status").html(displaydata);
          $('.dmessage').html("");
        }

        //$("#loaderIcon").hide();
      },
      error: function() {}
    });
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

</body>

</html>