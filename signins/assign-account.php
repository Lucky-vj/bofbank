<?php

include "../common.php";

include "controller/blade.assign-account.php";

?>



 <style>

 .trans.page-content { padding: calc(0px + 24px) calc(24px / 2) 0px calc(24px / 2) !important;}

 .trans.main-content  { margin-left: 0px !important;} 

  body[data-layout=horizontal] .trans.page-content {

    margin-top: 0px !important;

    padding: calc(0px + 0px) calc(0px / 2) 0px calc(0px / 2) !important;

  }  



 

 </style>

  <!-- ============================================================== -->

  <!-- Start right Content here -->

  <!-- ============================================================== -->

  <div class="trans main-content admin">

    <div class="trans page-content">

      <div class="container-fluid">

	  <?php if($_GET['admin_view']<>'1'){ ?>

        <!-- start page title -->

        <div class="row">

          <div class="col-12">

            <div class="page-title-box d-flex align-items-center justify-content-between">

              <!-- <h4 class="heading-ad">Manage Assign Account : - <?php echo $Client_ID; ?></h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                  <li class="breadcrumb-item active">Assign Account</li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!-- end page title -->

		<?php } ?>

        <div class="row my-2">

          

            <div class="row">

              <div class="col-lg-12">

                <?php if(isset($_SESSION['msg'])=="ok"){ ?>

                

				<div class="alert alert-success alert-dismissible fade show my-2" role="alert">

				<strong>Success!</strong> Account Update Successfully.

				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

				</div>

                <?php unset($_SESSION['msg']); } ?>

                <div class="card">

                  <div class="card-body">

                    <form method="post" >

                      <!--class="needs-validation" novalidate-->

                      <div class="row">

                        <div class="col-md-3 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="assign_account" id="assign_account" class="form-control" placeholder="Assign Account Number" value="<?php echo $assign_account?>" required>

						  <label for="assign_account">Assign Account Number</label>

						   </div>

                        </div>

                        <div class="col-md-4 my-2">

                          <!--<input type="submit" class="btn btn-primary" name="btn_update" value="Update">-->

                        </div>

                      </div>

                      <button type="submit" class="btn btn-sm btn-primary" name="btn_update" value="Update"> <i class="<?=$data['fwicon']['verified'];?>"></i> Submit</button>

                    </form>

                  </div>

                </div>

              </div>

            </div>

          

        </div>

      </div>

      <!-- end row -->

    </div>

    <!-- container-fluid -->

  </div>

  <!-- End Page-content -->

   </div>

  </body>

</html>