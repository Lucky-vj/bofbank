<?php

include "../common.php";

include "controller/blade.profile.php";

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

              <!-- <h4 class="heading-ad">My Profile - [<?php echo $_SESSION['ses_full_name'];?>]</h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>

                  <li class="breadcrumb-item active">My Profile</li>

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

                                  <?php if(isset($_SESSION['msgok'])){ ?>

                  

					

	<div class="alert alert-success alert-dismissible fade show" role="alert">

   <strong><?php echo $_SESSION['msgok']; ?></strong>

   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

   </div>

                  <?php unset($_SESSION['msgok']); } ?>

                <div class="inner-page card">

                  <div class="card-body">

				  <h4 class="header-title text-logo"> My Profile <? if(isset($json_log_history)&&$json_log_history){?>

			<i class="<?=$data['fwicon']['circle-info'];?> text-info fa-fw" 

			onclick="popup_openv('<?=$data['Host']?>/common/json_log<?=$data['ex']?>?tableid=<?=$_SESSION['s_admin_id'];?>&tablename=admin&tablefieldidname=admin_id')" title="View Json History"></i>

			<? } ?>

			</h4>

                    <form method="post" >

                        

                        <div class="row">

                          

						  

                          <div class="col-md-6 my-2">

                            <div class="form-floating"> 

                            <input type="text" name="admin_username" id="admin_username" class="form-control"  value="<?php echo $admin_username ?>" title="User Name" required>

							<!-- <label for="admin_username">Admin Username</label> -->

							 </div>

                          </div>

						  

						  

						  <div class="col-md-6 my-2">

                            <div class="form-floating"> 

                            <input type="text" name="admin_full_name" id="admin_full_name" class="form-control"  value="<?php echo $admin_full_name?>" title="Full Name" required>

							<!-- <label for="admin_full_name">Full Name</label> -->

                          </div>

						  </div>

						  

						  <div class="col-md-6 my-2">

                            <div class="form-floating"> 

                            <input type="text" name="admin_mobile" id="admin_mobile" class="form-control" value="<?php echo $admin_mobile ?>" title="Admin Contact Number" required>

							<!-- <label for="admin_mobile">Contact Number</label> -->

                          </div>

						  </div>

						  

						  <div class="col-md-6 my-2">

                            <div class="form-floating"> 

                            <input type="text" name="admin_email" id="admin_email" class="form-control"  value="<?php echo $admin_email ?>" title="Admin Email">

							<!-- <label for="admin_email" title="Admin Email">Email</label> -->

                          </div>

						  </div>

						  

						  



						  



                        </div>

                        <input type="submit" class="btn btn-sm btn-primary submit-clr" name="btn_admin" value="Submit">

                      </form>

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

 </html>