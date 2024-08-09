<?php
include "../common.php";
include "controller/blade.social-media-account.php";
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
            <!-- <h4 class="heading-ad"><?=$data['PageName'];?> <? if(isset($json_log_history)&&$json_log_history){?>
<i class="<?=$data['fwicon']['circle-info'];?> text-info fa-fw" 
onclick="popup_openv('<?=$data['Host']?>/common/json_log<?=$data['ex']?>?tableid=1&tablename=social_media_account_details')" title="View Json History"></i>
<? } ?></h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">Manage <?=$data['PageName'];?></li>
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
                  <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['msgok']); } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <form method="post">
                        <div class="row">
						<h4 class="header-title text-logo"><i class="<?=$data['fwicon']['facebook'];?> text-primary"></i> Facebook Account Details</h4>
                          
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input type="text" name="FB_APP_ID"  id="FB_APP_ID" class="form-control" placeholder="Facebook APP ID" value="<?php echo $FB_APP_ID ?>" title="Facebook APP ID" required>
                              <!-- <label for="FB_APP_ID">Facebook APP ID</label> -->
                            </div>
                          </div>
						  
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input type="text" name="FB_APP_SECRET" id="FB_APP_SECRET" class="form-control" placeholder="Facebook APP SECRET" value="<?php echo $FB_APP_SECRET ?>" title="Facebook APP SECRET" required>
                              <!-- <label for="FB_APP_SECRET">Facebook APP SECRET</label> -->
                            </div>
                          </div>
						  
						  <div class="col-md-12 my-2">
                            <div class="form-floating">
                              <input type="text" name="FB_REDIRECT_URL" id="FB_REDIRECT_URL" class="form-control"  placeholder="Facebook Redirect Url" value="<?php echo $FB_REDIRECT_URL?>" title="Facebook Redirect Url" required>
                              <!-- <label for="FB_REDIRECT_URL">Facebook Redirect Url : Like - <?php echo $data['Host'];?>/sign-in</label> -->
                            </div>
                          </div>
						  
						  <div class="col-md-12 my-2">
                            <div class="form-floating">
                              <input type="text" name="FB_BASE_URL" id="FB_BASE_URL" class="form-control"  placeholder="Facebook Base Url" value="<?php echo $FB_BASE_URL?>" title="Facebook Redirect Url" required>
                              <!-- <label for="FB_BASE_URL">Facebook Base Url : Like - <?php echo $data['Host'];?></label> -->
                            </div>
                          </div>
						  
                        </div>
						<div class="row">
						<h4 class="header-title text-logo"><i class="<?=$data['fwicon']['google'];?>  text-danger"></i> Google Account Details</h4>
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input type="text" name="google_ClientId"  id="google_ClientId" class="form-control" placeholder="Gmail ClientId" value="<?php echo $google_ClientId ?>" title="Gmail ClientId" required>
                              <!-- <label for="google_ClientId">Google ClientId</label> -->
                            </div>
                          </div>
						  
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input type="text" name="google_ClientSecret" id="google_ClientSecret" class="form-control" placeholder="Gmail ClientSecret" value="<?php echo $google_ClientSecret ?>" title="Gmail ClientSecret" required>
                              <!-- <label for="google_ClientSecret">Google ClientSecret</label> -->
                            </div>
                          </div>
						  
						  <div class="col-md-12 my-2">
                            <div class="form-floating">
                              <input type="text" name="google_RedirectUrl" id="google_RedirectUrl" class="form-control"  placeholder="Gmail RedirectUrl" value="<?php echo $google_RedirectUrl?>" title="Gmail RedirectUrl" required>
                              <!-- <label for="google_RedirectUrl">Google RedirectUrl : Like - <?php echo $data['Host'];?>/auth_google</label> -->
                            </div>
                          </div>
                        </div>
						<div class="row">
						<h4 class="header-title text-logo"><i class="<?=$data['fwicon']['linkedin'];?> text-info"></i> Linkedin Account Details</h4>
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input type="text" name="linkedin_ClientId"  id="linkedin_ClientId" class="form-control" placeholder="Linkedin ClientId" value="<?php echo $linkedin_ClientId ?>" title="Linkedin ClientId" required>
                              <!-- <label for="linkedin_ClientId">Linkedin ClientId </label> -->
                            </div>
                          </div>
						  
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input type="text" name="linkedin_ClientSecret" id="linkedin_ClientSecret" class="form-control" placeholder="Linkedin ClientSecret" value="<?php echo $linkedin_ClientSecret ?>" title="Linkedin ClientSecret" required>
                              <!-- <label for="linkedin_ClientSecret">Linkedin ClientSecret</label> -->
                            </div>
                          </div>
						  
						  <div class="col-md-12 my-2">
                            <div class="form-floating">
                              <input type="text" name="linkedin_RedirectUrl" id="linkedin_RedirectUrl" class="form-control"  placeholder="Linkedin RedirectUrl" value="<?php echo $linkedin_RedirectUrl?>" title="Linkedin RedirectUrl" required>
                              <!-- <label for="linkedin_RedirectUrl">Linkedin RedirectUrl : Like - <?php echo $data['Host'];?>/auth-linkedin</label> -->
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
</body></html>