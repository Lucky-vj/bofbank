<?php

include "../common.php";

include "controller/blade.change-password.php";

?>



  <!-- ============================================================== -->

  <!-- Start right Content here -->

  <!-- ============================================================== -->

  <div class="main-content admin">

    <div class="page-content">

      <div class="container-fluid">

        <!-- start page title -->

        <div class="row">

          <div class="col-12">

            <div class="page-title-box d-flex align-items-center justify-content-between">

              <!-- <h4 class="heading-ad">Reset Password - [<?php echo $_SESSION['ses_full_name'];?>]</h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                  <li class="breadcrumb-item active">Reset Password</li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!-- end page title -->

        <div class="row my-2">

          <div class="col-md-12">

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

                <?php if(isset($_SESSION['msg'])&&$_SESSION['msg']=="ok"){ ?>

				  

				  <div class="alert alert-success alert-dismissible fade show" role="alert">

                  <strong>Success ! </strong> Password Change Successfully.

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                  </div>

   

                <?php unset($_SESSION['msg']); } ?>

				

                <?php if(isset($_SESSION['msg'])&&$_SESSION['msg']=="Fail"){ ?>

				

				  <div class="alert alert-danger alert-dismissible fade show" role="alert">

                  <strong>Fail ! </strong> New Password and Confirm Password Not Matched.

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                  </div>

				  

                <?php unset($_SESSION['msg']); } ?>

				

                <a id="open_modal_pop" class="hrefmodal btn btn-primary" data-tid="Reset Password" data-href="<?=$data['Admins'];?>/reset-password?verify=<?=encryption_value($_SESSION['s_admin_id']);?>&utype=<?=encryption_value($_SESSION["s_admin_username"]);?>&admin_view=1" title="Reset Password" style="display: none;" >Reset Password</a>

				

				

				<div class="inner-page card">

                  <div class="card-body">

				 <h4 class="header-title"> Reset Password</h4>

                  <h6>You can reset your password for security reasons or reset it if you forget it.</h6>      

                      

  <div class="border rounded p-2 my-2 dropdown" style="max-width:500px; margin:0 auto;">



  <div class="vkg dropdown-toggle" style="width:calc(100% - 70px);" role="button" id="dropdownPassword" data-bs-toggle="dropdown" aria-expanded="false"><span class="loader-pass"><i class="<?=$data['fwicon']['check-circle'];?> text-success"></i></span>&nbsp;Password </div>



  <ul class="vkg dropdown-menu" aria-labelledby="dropdownPassword">

    <li><a class="dropdown-item password-action" data-value="1">Reset Password</a></li>

  </ul>

  

  

</div>







                  

				  

				  </div>

                </div>

              </div>

            </div>

          </div>

		    <?php include "footer".$data['ex']; ?>

        </div>

      </div>

      <!-- end row -->

    </div>

    <!-- container-fluid -->

  </div>

  <!-- End Page-content -->

  

  </div>



 </body>

 <script>

$('.password-action').on('click', function () { 

$( "#open_modal_pop" ).trigger( "click" );

})

  </script>

 </html>