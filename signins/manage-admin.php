<?php

include "../common.php";

include "controller/blade.manage-admin.php";

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

            <!-- <h4 class="heading-ad">Admin Manager</h4> -->

            <div class="page-title-right">

              <ol class="breadcrumb m-0">

                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">Manage Admin</li>

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

                      <h4 class="header-title">

                        <?=ucwords($action);?> Admin</h4>

                        

                      <form method="post" >

                        <input type="hidden" name="bid" value="<?php echo @$_GET['bid'];?>">

                        <div class="row">

                          

						  

                          <div class="col-md-4 my-2">

                            <div class="form-floating">

                            <input type="text" name="admin_username" id="admin_username" class="form-control" placeholder="User Name" value="<?php echo $admin_username ?>" title="User Name" onBlur="checkAvailability()" required>

							<!-- <label for="admin_username">Admin Username <span id="user-availability-status"></span> </label> -->

                          </div>

						  </div>

						  

						  

						  



						  

						  <div class="col-md-4 my-2">

                            <div class="form-floating">

                            <input type="text" name="admin_full_name" id="admin_full_name" class="form-control"  placeholder="Full Name" value="<?php echo $admin_full_name?>" title="Full Name" required>

							<!-- <label for="admin_full_name">Full Name</label> -->

							</div>

                          </div>

						  

						  <div class="col-md-4 my-2">

                            <div class="form-floating">

                            <input type="text" name="admin_mobile" id="admin_mobile" class="form-control" placeholder="Admin Contact Number" value="<?php echo $admin_mobile ?>" title="Admin Contact Number" required>

							<!-- <label for="admin_mobile">Contact Number</label> -->

                          </div>

						  </div>

						  

						  <div class="col-md-4 my-2">

                            <div class="form-floating">

                            <input type="text" name="admin_email" id="admin_email" class="form-control" placeholder="Admin Email" value="<?php echo $admin_email ?>" title="Admin Email">

							<!-- <label for="admin_email" title="Admin Email">Email</label> -->

							</div>

                          </div>

						  

						  

                          <div class="col-md-4 my-2">

                          <div class="form-floating">

                          <select name="admin_type" id="admin_type" class="form-select" title="Admin Type" required>

                          <option value="">Select Admin Type</option>

                          <option value="Admin" <?php if($admin_type=="Admin"){ ?> selected="selected" <? } ?>>Admin</option>

                          <option value="Super" <?php if($admin_type=="Super"){ ?> selected="selected" <? } ?>>Super</option>

                          </select>

                          <!-- <label for="admin_type">Admin Type</label> -->

                          </div>

                          </div>

						  

                        <div class="col-md-4 my-2">

                        <div class="form-floating">

                        <select name="admin_status" id="admin_status" class="form-select" title="Admin Status" required>

                        <option value="">Select</option>

                        <option value="Active" <?php if($admin_status=="Active"){ ?> selected="selected" <? } ?>>Active</option>

                        <option value="Deactive" <?php if($admin_status=="Deactive"){ ?> selected="selected" <? } ?>>Deactive</option>

                        </select>

                        <!-- <label for="admin_status">Select Status</label> -->

                          </div>

                          </div>

                        </div>

                        <button type="submit" class="btn btn-sm btn-primary" name="btn_admin" value="<?=ucwords($action);?>"><i class="<?=$data['fwicon']['tick-circle'];?>"></i> Submit</button>

                      </form>

                    </div>

                  </div>

                </div>

              </div>

			  

              <?php

            $rows = db_rows("SELECT * FROM tbl_admin WHERE 1  ORDER BY admin_full_name ASC limit 0,50");





              ?>

              <div class="row">

                <div class="col-lg-12">

                  <div class="card">

                    <div class="card-body row">

                      <div class="col-lg-8">

                        <h4 class="header-title mb-4">Added Admin </h4>

                      </div>

                      <div class="col-lg-4 text-end"><?php /*?><a name="Add" href="<?=$data['Admins'];?>/manage-admin<?=$data['ex'];?>?action=add" value="Add A New Admin!" title="Add A New Admin" class="btn btn-primary"><i class="<?=$data['fwicon']['circle-plus'];?>"></i></a><?php */?></div>

                      <?php if($db_counts > 0) { ?>

                      <div class="table-responsive">

                        <table class="table table-centered table-nowrap mb-0">

                          <thead>

                            <tr>

                              <th scope="col"><strong>User Name</strong></th>

                              <th scope="col"><strong>Full Name</strong></th>

                              <th scope="col"><strong>Email</strong></th>

                              <th scope="col"><strong>Mobile</strong></th>

                              <th scope="col"><strong>Type</strong></th>

                              <th scope="col"><strong>Status</strong></th>

                              <th scope="col"><strong>Action</strong></th>

                            </tr>

                          </thead>

                          <tbody>

                            <?php 

                          $i=1;

                          foreach($rows as $key=>$result) {



                          $encryptionvalue=encryption_value($result['admin_id']);

                          $encryptionusername=encryption_value($result['admin_username']);



                          ?>

                            <tr>

                              <td><?=$result['admin_username']?></td>

                              <td><?=$result['admin_full_name']?></td>

                              <td><?=$result['admin_email']?></td>

                              <td><?=$result['admin_mobile']?></td>

							  <td><?=$result['admin_type']?></td>

							  <td><?=$result['admin_status']?></td>

                              <td>

                    <a href="<?=$data['Admins'];?>/manage-admin<?=$data['ex'];?>?bid=<?=$result['admin_id']?>&action=edit"><i class="<?=$data['fwicon']['edit'];?> text-success mx-2" title="Edit"></i></a> 

                    <?php if($result['admin_status']=='Active'){ ?>

                    <a href="<?=$data['Admins'];?>/manage-admin<?=$data['ex'];?>?bid=<?=$result['admin_id']?>&action=statusc&key=Deleted" onClick="return confirm('Are you Sure to Delete');" title="Delete Admin"><i class="<?=$data['fwicon']['delete'];?> text-danger mx-2"></i></a>

                    <? }else{ ?>

                    <a href="<?=$data['Admins'];?>/manage-admin<?=$data['ex'];?>?bid=<?=$result['admin_id']?>&action=statusc&key=Active" onClick="return confirm('Are you Sure to Active');" title="Active Admin"><i class="<?=$data['fwicon']['check'];?> text-success mx-2"></i></a>

                    <? } ?>





                    <a class="hrefmodal" data-tid="Reset Password" data-href="<?=$data['Admins'];?>/reset-password?verify=<?=$encryptionvalue;?>&utype=<?=$encryptionusername;?>&admin_view=1" title="Reset Password"><i class="<?=$data['fwicon']['reset-password'];?> text-success mx-2"></i></a>



                    <? if(isset($result['json_log_history'])&&$result['json_log_history']){?>

                          <i class="<?=$data['fwicon']['circle-info'];?> text-info fa-fw" 

                          onclick="popup_openv('<?=$data['Host']?>/common/json_log<?=$data['ex']?>?tableid=<?=$result['admin_id']?>&tablename=admin&tablefieldidname=admin_id')" title="View Json History"></i>

                          <? } ?>



                    </td>

                                                </tr>

                                                <?php

                      }

                    ?>

                          </tbody>

                        </table>

                      </div>

                      <?php } else { ?>

                      <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> Admin Not Added. </div>

                      <?php } ?>

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

 <script>

function checkAvailability() {

//$("#loaderIcon").show();

if($("#admin_username").val()==""){

return false;

}



jQuery.ajax({

url: "admin_username_availability",

data:'username='+$("#admin_username").val(),

type: "POST",

success:function(data){



if(data==1){

var displaydata="<span class='status-not-available text-danger mx-2' title='Username not available'> <i class='<?=$data['fwicon']['check-cross'];?> fa-fw my-1'></i></span>";

$("#user-availability-status").html(displaydata);

$('#admin_username').val("");



}else{

var displaydata="<span class='status-available text-success mx-2' title='Username available'> <i class='<?=$data['fwicon']['tick-circle'];?> fa-fw my-1'></i></span>";

$("#user-availability-status").html(displaydata);

}



//$("#loaderIcon").hide();

},

error:function (){}

});

}

</script>

 </html>