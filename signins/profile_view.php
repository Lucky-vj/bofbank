<?php

include "../common.php";

include "controller/blade.profile_view.php";

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

              <!-- <h4 class="heading-ad">Manage Profile / Password - <?php echo $rs['full_name']; ?></h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                  <li class="breadcrumb-item active">Profile</li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!-- end page title -->

		<?php } ?>

        <div class="row mb-4">

          <div class="col-md-12">

            

            <div class="row">

              <div class="col-lg-12 my-2">

                <?php if(isset($_SESSION['msg'])){ ?>

				  <div class="alert alert-success alert-dismissible fade show" role="alert">

                  <strong>Success!</strong> <?=$_SESSION['msg'];?>

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                  </div>

                <?php unset($_SESSION['msg']); } ?>

				

                <div class="card">

                  <div class="card-body">

				  <h3>Update User Details</h3>

                    <form method="post" >



                      <div class="row">
					  
					    <div class="col-md-4 my-2">

                           <div class="form-floating"> 

                           <select name="txt_title" id="txt_title" class="form-select form-select-sm" title="Select Title" data-bs-toggle="tooltip" data-bs-placement="right" required>
                              <option  value="" selected="selected">Select</option>
                              <option value="Mr"  <?php if($rs['title']=="Mr"){ ?> selected="selected" <? } ?>>Mr.</option>
                              <option value="Ms"  <?php if($rs['title']=="Ms"){ ?> selected="selected" <? } ?>>Ms.</option>
                              <option value="Mrs" <?php if($rs['title']=="Mrs"){ ?> selected="selected" <? } ?>>Mrs.</option>
                            </select>

						  <label for="txt_fname">Select Title</label>

						   </div>

                        </div>

                        <div class="col-md-4 my-2">

                           <div class="form-floating"> 

                          <input type="text" name="txt_fname" class="form-control" id="txt_fname" placeholder="First name" value="<?php echo $rs['first_name'];?>" required>

						  <!-- <label for="txt_fname">First name</label> -->

						   </div>

                        </div>

                        <div class="col-md-4 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="txt_lname" class="form-control" id="txt_lname" placeholder="Last name" value="<?php echo $rs['last_name']; ?>" required>

						  <!-- <label for="txt_lname">Last name</label> -->

						  </div>

                        </div>

                      </div>

                      <div class="row">
					  
					    

                        <div class="col-md-3 my-2">

                          <div class="form-floating"> 

                          <select name="txt_country_code" id="txt_country_code" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right"  title="Select Country Code" required>
<option value="" selected="selected">Select</option>
                          <?php 
						  foreach($country_list as $clist){ ?>
                          <option value="<?=$clist['Country_Code'];?>"><?=$clist['country'];?> ( + <?=$clist['Country_Code'];?>)</option>
                          <? } ?>
</select>

						  <!-- <label for="txt_country_code">Country Code</label> -->
						  

						  </div>
                          <? if(isset($rs['country_code'])){ ?>
                            <script>$('#txt_country_code option[value="<?=$rs['country_code']?>"]').prop('selected','selected');</script>
                            <? } ?>
                        </div>
      
	                    <div class="col-md-3 my-2">

                          <div class="form-floating"> 

                          <input  type="text" id="txt_mobile" name="txt_mobile" class="form-control form-control-sm" placeholder="Enter phone / mobile" value="<?=$rs['mobile']?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter phone / mobile number">

						  <!-- <label for="txt_mobile">Phone / Mobile Number</label> -->

						  </div>

                        </div>
						
						<div class="col-md-3 my-2">

                          <div class="form-floating"> 

                          <select name="txt_gender" id="txt_gender" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Gender" required>
                              <option  value="" selected="selected">Select</option>
                              <option value="M"  <?php if($rs['gender']=="M"){ ?> selected="selected" <? } ?>>Male</option>
                              <option value="F"  <?php if($rs['gender']=="F"){ ?> selected="selected" <? } ?>>Female</option>
                              <option value="O"  <?php if($rs['gender']=="O"){ ?> selected="selected" <? } ?>>Other</option>
                            </select>

						  <!-- <label for="txt_gender">Gender</label> -->

						  </div>

                        </div>
						
						<div class="col-md-3 my-2">

                          <div class="form-floating"> 

                           <input type="date" name="birth_date" id="birth_date" class="form-control form-control-sm" placeholder="Date Of Birth" value="<?php echo $rs['birth_date']?>" max="<?= date('Y-m-d', strtotime('-18 years'));?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Date Of Birth" required>

						  <!-- <label for="birth_date">Date Of Birth</label> -->

						  </div>

                        </div>
                        
						
						
						
						

                      </div>

                      <div class="row">

                        <div class="col-md-6 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="txt_address_line1" class="form-control" id="txt_address_line1" placeholder="Address" value="<?php echo $rs['address_line1']?>" required>

						  <!-- <label for="txt_address">Address Line 1</label> -->

						  </div>

                        </div>
						
						<div class="col-md-6 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="txt_address_line2" class="form-control" id="txt_address_line2" placeholder="Address" value="<?php echo $rs['address_line2']?>" required>

						  <!-- <label for="txt_address">Address Line 2</label> -->

						  </div>

                        </div>

                        <div class="col-md-6 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="txt_city" class="form-control" id="txt_city" placeholder="City" value="<?php echo $rs['city']?>" required>

						  <!-- <label for="txt_city">City</label> -->

						  </div>

                        </div>

                        <div class="col-md-6 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="txt_state" class="form-control" id="txt_state" placeholder="State" value="<?php echo $rs['state']?>" required>

						  <!-- <label for="txt_state">State</label> -->

						  </div>

                        </div>

						

						   <div class="col-md-6 my-2">

                          <div class="form-floating"> 

                          <select name="txt_country" id="txt_country" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right"  title="Select Country" required>
<option value="" selected="selected">Select</option>
                          <?php 
						  foreach($country_list as $clist){ ?>
                          <option value="<?=$clist['country'];?>"><?=$clist['country'];?></option>
                          <? } ?>
</select>

						  <!-- <label for="txt_country">Country</label> -->

						  </div>
<? if(isset($rs['country'])) { ?>
 <script>$('#txt_country option[value="<?=$rs['country']?>"]').prop('selected','selected');</script>
<? } ?>
                        </div>

						

						

                        <div class="col-md-6 my-2">

                          <div class="form-floating"> 

                          <input type="text" name="txt_zip" class="form-control" id="txt_zip" placeholder="Zip" value="<?php echo $rs['pincode']?>" required>

						  <!-- <label for="txt_zip">Zip</label> -->

						  </div>

                        </div>

                      </div>

                      <button type="submit" class="btn btn-sm btn-primary" name="btn_update" value="Update Profile"><i class="<?=$data['fwicon']['circle-plus'];?>"></i> Submit</button>

                    </form>

                  </div>

                </div>

				

				

				<?php /*?><div class="card">

                  <div class="card-body">

                    <h4 class="header-title">Change Password</h4>

                    <form method="post" >

                      <!--class="needs-validation" novalidate-->

                      <div class="row">

                        <div class="col-md-6 my-2">

                          <label for="New Password">New Password</label>

                          <input type="text" name="new_password" class="form-control" id="new_password" placeholder="New Password"  required>

                        </div>

                        <div class="col-md-6 my-2">

                          <label for="Confirm Passwored">Confirm Passwored</label>

                          <input type="text" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Passwored" required>

                        </div>

                      </div>

                      <input type="submit" class="btn btn-primary" name="btn_password" id="btn_password" value="Change Password">

                    </form>

                  </div>

                </div><?php */?>

				

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



<script>

$(function() {

    $("#btn_password").click(function() {   

	val2 = $("#new_password").val(); 

	val4 = $("#confirm_password").val(); 

	var myLength = $("#new_password").val().length;

	//alert(myLength);

	//alert(val2);  alert(val4);  

      if(val2==val4)

      {

        if(myLength >= 5){

		}else{

		alert("Password too Short. Minimum 5 Char Allow for change password");

        return false;

		}

		

      }

      else

      {

         alert("New Password and Confirm Password Not Matched");

         return false;

      }      

    });

});

</script>

</body>

</html>

