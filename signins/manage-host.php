<?php

include "../common.php";

include "controller/blade.manage-host.php";

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

              <!-- <h4 class="heading-ad">Manage Host</h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                  <li class="breadcrumb-item active">Manage Host</li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!-- end page title -->

        <div class="row mb-4">

          <div class="col-xl-12">

            <div class="row">

              <div class="col-lg-12">

                <div class="row">

                  <div class="col-lg-12">

                    <?php if(isset($_SESSION['msgok'])){ ?>

                    

					  

	<div class="alert alert-success alert-dismissible fade show" role="alert">

   <strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>

   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

   </div>

                    <?php unset($_SESSION['msgok']); } ?>

                  </div>

                </div>

                <div class="row">

                  <div class="col-lg-12">

                    <div class="card">

                      <div class="card-body">

                        <h4 class="header-title text-logo"> Manage Host <? if(isset($json_log_history)&&$json_log_history){?>

			<i class="<?=$data['fwicon']['circle-info'];?> text-info fa-fw" 

			onclick="popup_openv('<?=$data['Host']?>/common/json_log<?=$data['ex']?>?tableid=1&tablename=host')" title="View Json History"></i>

			<? } ?>

			</h4>

                        <form method="post" enctype="multipart/form-data" >

						<input type="hidden" name="host_logo_old" value="<?php echo $host_logo_old?>">

						<input type="hidden" name="host_signature_old" value="<?php echo $host_signature_old?>">

                          <div class="row">

                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                              <input type="text" name="host_name" id="host_name" class="form-control"  placeholder="Host Short Name" value="<?php echo $host_name?>" title="Host Short Name" required>

							  <!-- <label for="host_name">Host Short Name</label> -->

							  </div>

                            </div>

                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                              <input type="text" name="host_full_name"  id="host_full_name" class="form-control" placeholder="Host Full Name" value="<?php echo $host_full_name ?>" title="Host Full Name" required>

							  <!-- <label for="host_full_name">Host Full Name</label> -->

							  </div>

                            </div>

                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                              <input type="text" name="host_contact_no" id="host_contact_no" class="form-control" placeholder="Contact Number" value="<?php echo $host_contact_no ?>" title="Contact Number" required>

							  <!-- <label for="host_contact_no">Contact Number</label> -->

							  </div>

                            </div>

                            <div class="transaction_fixed col-md-6 my-2">

                              <div class="form-floating">

                              <input type="text" name="host_email" id="host_email" class="form-control" placeholder="Email ID" value="<?php echo $host_email ?>" title="Email ID" required>

							  <!-- <label for="host_email">Email ID</label> -->

							  </div>

                            </div>

                            <div class="transaction_percentage col-md-12 my-2">

                              <div class="form-floating">

                              <input type="text" name="host_address" id="host_address" class="form-control" placeholder="Address" value="<?php echo $host_address ?>" title="Address" required>

							  <!-- <label for="host_address" title="Address">Address</label> -->

							  </div>

                            </div>
							
							<div class="col-md-6 my-2">
							
							<div class="form-floating">

                              <input type="text" name="host_logo" id="host_logo" class="form-control" placeholder="Logo" value="<?php echo $host_logo ?>" title="Address" required>

							  <!-- <label for="host_address" title="Address">Logo</label> -->
							  <? if(isset($host_logo)&&$host_logo){ ?>

							  <img src="<?php echo $host_logo;?>" class="img-fluid  my-2" style="height:50px;">

							  <? } ?>

							  </div>

                          </div>
						  <div class="col-md-6 my-2">
							
							<div class="form-floating">

                              <input type="text" name="host_favicon" id="host_favicon" class="form-control" placeholder="Favicon" value="<?php echo $host_favicon ?>" title="Address" required>

							  <!-- <label for="host_address" title="Address">Favicon</label> -->
							  <? if(isset($host_favicon)&&$host_favicon){ ?>

							  <img src="<?php echo $host_favicon;?>" class="img-fluid  my-2" style="height:50px;">

							  <? } ?>

							  </div>

                            </div>

                            
							
							

                            <div class="transaction_percentage col-md-12 my-2">

							<div class="form-floating">

                              

                              <input type="file" name="host_signature" id="host_signature"  class="form-control" placeholder="Signature" title="Signature">

							  <!-- <label for="host_signature" title="Signature">Signature</label> -->

							  </div>

							  <? if(isset($host_signature_old)&&$host_signature_old){ ?>

							  <img src="img/<?php echo $host_signature_old;?>" class="img-fluid  my-2" style="height:50px;">

							  <? } ?>

                            </div>
							
							
							<div class="col-md-4 my-2">
							
							<div class="form-floating">

                              <input type="text" name="host_header_bg_color" id="host_header_bg_color" class="form-control" placeholder="Header Background Color" value="<?php echo $host_header_bg_color ?>" style="background-color:<?php echo $host_header_bg_color ?>" title="Address" required>

							  <!-- <label for="host_address" title="Address">Header Background Color</label> -->

							  </div>

                          </div>
						  
						    <div class="col-md-4 my-2">
							
							<div class="form-floating">

                              <input type="text" name="host_sidebar_bg_color" id="host_sidebar_bg_color" class="form-control" placeholder="Sidebar Background Color" value="<?php echo $host_sidebar_bg_color ?>" style="background-color:<?php echo $host_sidebar_bg_color ?>;" title="Sidebar Background Color" required>

							  <!-- <label for="host_address" title="Address">Sidebar Background Color</label> -->

							  </div>

                          </div>
						  
						    <div class="col-md-4 my-2">
							
							<div class="form-floating">

                              <input type="text" name="host_sidebar_text_color" id="host_sidebar_text_color" class="form-control" placeholder="Sidebar Text Color" value="<?php echo $host_sidebar_text_color ?>"  title="Sidebar Text Color" required>

							  <!-- <label for="host_address" title="Address">Sidebar Text Color</label> -->

							  </div>

                          </div>
						  
						  
						  <div  class="col-md-12 my-2">SMTP Setting</div>
						  
						  <div class="col-md-3 my-2">
							
							<div class="form-floating">

                              <input type="text" name="smtp_host" id="smtp_host" class="form-control" placeholder="SMTP Host" value="<?php echo $smtp_host ?>"  title="SMTP Host" required>

							  <!-- <label for="host_address" title="Address">SMTP Host</label> -->

							  </div>

                          </div>
						  <div class="col-md-3 my-2">
							
							<div class="form-floating">

                              <input type="text" name="smtp_port" id="smtp_port" class="form-control" placeholder="SMTP PORT" value="<?php echo $smtp_port ?>"  title="SMTP PORT" required>

							  <!-- <label for="host_address" title="Address">SMTP PORT</label> -->

							  </div>

                          </div>
						  <div class="col-md-3 my-2">
							
							<div class="form-floating">

                              <input type="text" name="smtp_username" id="smtp_username" class="form-control" placeholder="SMTP username" value="<?php echo $smtp_username ?>"  title="SMTP Username" required>

							  <!-- <label for="host_address" title="Address">SMTP Username</label> -->

							  </div>

                          </div>
						  <div class="col-md-3 my-2">
							
							<div class="form-floating">

                              <input type="password" name="smtp_password" id="smtp_password" class="form-control" placeholder="SMTP Password" value="<?php echo $smtp_password ?>"  title="SMTP Password" required>

							  <!-- <label for="host_address" title="Address">SMTP Password</label> -->

							  </div>

                          </div>

                          </div>

                          <button type="submit" class="btn btn-sm btn-primary" name="sent" value="Update"><i class="<?=$data['fwicon']['tick-circle'];?>"></i> Submit</button>

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

    <!-- end main content-->

  </div>

  

  </div>

 </body>

 </html>