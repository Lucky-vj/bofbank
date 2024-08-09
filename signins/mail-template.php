<?php

include "../common.php";

include "controller/blade.mail-template.php";

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

              <!-- <h4 class="heading-ad">Manage Email Template</h4> -->

              <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                  <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                  <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
                </svg></li>
                  <li class="breadcrumb-item active">Email Template</li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!-- end page title -->

        <div class="row mb-4">

          <div class="col-md-12">

            <div class="row">

              <div class="col-md-12">

                <div class="row">

                  <div class="col-md-12">

                    <?php if(isset($_SESSION['msgok'])){ ?>

					<div class="alert alert-success alert-dismissible fade show" role="alert">

                    <?php echo $_SESSION['msgok']; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>

                    <?php unset($_SESSION['msgok']); } ?>

                  </div>

                </div>

                <div class="row">

                  <div class="col-md-12">

                    <div class="card">

                      <div class="card-body">

                        <h4 class="header-title"><?=ucwords($action);?> Email Template</h4>

                        <form method="post" >

                          <input type="hidden" name="bid" value="<?php echo @$_GET['bid'];?>">

                          <div class="row">

                            <div class="col-md-8 my-2">

							<div class="form-floating">

                              <input type="text" name="template_subject" id="template_subject" class="form-control"  placeholder="Email Subject" value="<?php echo $template_subject?>" title="Email Subject" required>

							  <!-- <label for="template_subject" title="Email Subject">Email Subject</label> -->

							  </div>

                            </div>

                            <div class="col-md-4 my-2">

							<div class="form-floating">

                              <input type="text" name="template_code" id="template_code" class="form-control" placeholder="Email Short Code" value="<?php echo $template_code ?>" title="Email Short Code" required>

							  <!-- <label for="template_code" title="Email Short Code">Email Short Code</label> -->

							  </div>

                            </div>

                            <div class="col-md-12 my-2">

							  <textarea  name="template_desc" class="form-control editor" required><?=$template_desc;?></textarea>

                            </div>

                          </div>

                          <button type="submit" class="btn btn-sm btn-primary" name="btn_submit" value="<?=ucwords($action);?>"><i class="<?=$data['fwicon']['tick-circle'];?>"></i> Submit</button>

                        </form>

                      </div>

                    </div>

                  </div>

                </div>

<?php

$rows = db_rows("SELECT * FROM tbl_email_template where 1  ORDER BY `template_subject` ASC LIMIT 0,50");



?>

                <div class="row">

                  <div class="col-md-12">

                    <div class="card">

                      <div class="card-body row">

                        <div class="col-md-8">

                          <h4 class="header-title mb-4">Added Email Template </h4>

                        </div>

                        <div class="col-md-4 text-end"><?php /*?><a name="Add" href="<?=$data['Admins'];?>/mail-template<?=$data['ex'];?>?action=add" value="Add A New Email Template!" title="Add A New Email Template" class="btn btn-primary"><i class="<?=$data['fwicon']['circle-plus'];?>"></i></a><?php */?></div>

                        <?php if($db_counts > 0) { ?>

                        <div class="table-responsive">

                          <table class="table table-centered table-nowrap mb-0">

                            <thead>

                              <tr>

                                <th scope="col">#</th>

                                <th scope="col"><strong>Template Subject</strong></th>

                                <th scope="col"><strong>Template Code</strong></th>

                                <th scope="col"><strong>Action</strong></th>

                              </tr>

                            </thead>

                            <tbody>

                              <?php 

$i=1;

foreach($rows as $key=>$result) {

?>

                              <tr>

                                <td><?=$i++?></td>

                                <td><?=$result['template_subject']?></td>

                                <td><?=$result['template_code']?></td>

                                <td><a href="<?=$data['Admins'];?>/mail-template<?=$data['ex'];?>?bid=<?=$result['template_id']?>&action=edit"><i class="<?=$data['fwicon']['edit'];?> text-success mx-2" title="Edit"></i></a>

                                  <!--<?php if($result['template_status']=='Active'){ ?>

                                  <a href="<?=$data['Admins'];?>/mail-template<?=$data['ex'];?>?bid=<?=$result['template_id']?>&action=statusc&key=Deleted" onClick="return confirm('Are you Sure to Delete');" title="Delete Email Template"><i class="<?=$data['fwicon']['delete'];?> text-danger mx-2"></i></a>

                                  <? }else{ ?>

                                  <a href="<?=$data['Admins'];?>/mail-template<?=$data['ex'];?>?bid=<?=$result['template_id']?>&action=statusc&key=Active" onClick="return confirm('Are you Sure to Active');" title="Active Email Template"><i class="<?=$data['fwicon']['check'];?> text-success mx-2"></i></a>

                                  <? } ?>-->                                </td>

                              </tr>

                              <?php

  }

?>

                            </tbody>

                          </table>

                        </div>

                        <?php } else { ?>

                        <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> Email Template Not Added. </div>

                        <?php } ?>

                      </div>

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

    <!-- end main content-->

  </div>

  

  </div>

  <!-- JAVASCRIPT -->



<link rel="stylesheet" type="text/css" href="https://jqueryte.com/css/jquery-te.css"/>

<script src="https://jqueryte.com/js/jquery-te-1.4.0.min.js"></script>

<script>

	$('.editor').jqte();

</script>

</body>

</html>



 </body>

 </html>