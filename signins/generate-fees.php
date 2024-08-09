<?php

include "../common.php";

include "controller/blade.generate-fees.php";

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

            <!-- <h4 class="heading-ad">Generate Fees</h4> -->

            <div class="page-title-right">

              <ol class="breadcrumb m-0">

                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">Generate Fees</li>

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



                        <div class="row">

                          

						  

<div class="col-md-4 my-2">

<form name="form1" method="post">

<input type="hidden" name="month" value="<?=date("m");?>">

<input type="hidden" name="year" value="<?=date("Y");?>">

<label>Monthly Fee Generate for <?=date("F - Y");?></label><br>

<input type="submit" name="btn_submit" title="Monthly Fee Generate for <?=date("F - Y");?>" class="btn btn-info text-white" value="Generate Monthly Fee">

</form>

</div>

<div class="col-md-4 my-2">

<form name="form2" method="post">

<input type="hidden" name="year" value="<?=date("Y");?>">

<label>Yearly Fee Generate for Year <?=date("Y");?></label><br>

<input type="submit" name="btn_submit" title="Yearly Fee Generate for <?=date("Y");?>" class="btn btn-warning  text-white" value="Generate Yearly Fee">

</form>

</div>



<div class="col-md-4 my-2">

<form name="form3" method="post">

<label>One Time Setup Fee</label><br>

<input type="submit" name="btn_submit" title="One Time Setup Fee" class="btn btn-secondary" value="One Time Setup Fee">

</form>

</div>

						  



                        </div>



                    </div>

                  </div>

                </div>

              </div>

			  

<?php

$rows = db_rows("select * from tbl_master_trans_table where transaction_for in('Monthly Fee','Yearly Fee','One Time Setup Fee') order by transaction_id desc limit 0,100");



?>

              <div class="row">

                <div class="col-lg-12">

                  <div class="card">

                    <div class="card-body row">

                      <div class="col-lg-8">

                        <h4 class="header-title mb-4">Generated Fees - Annual / Monthly (<?=$db_counts;?>)</h4>

                      </div>

                      

                      <?php if($db_counts > 0) { ?>

                      <div class="table-responsive">

                        <table class="table table-centered table-nowrap mb-0">

                          <thead>

                            <tr>

                              <th scope="col"><strong>TransID</strong></th>

							  <th scope="col"><strong>Name</strong></th>

							  <th scope="col"><strong>Company&nbsp;Name</strong></th>

                              <th scope="col"><strong>Trans&nbsp;Amt</strong></th>

							  <th scope="col"><strong>Timestamp</strong></th>

                              <th scope="col"><strong>Trans&nbsp;Response</strong></th>

							  <th scope="col"><strong>Trans&nbsp;Status</strong></th>

							  <th scope="col"><strong>Action</strong></th>

                            </tr>

                          </thead>

                          <tbody>

<?php 

$i=1;

foreach($rows as $key=>$result) {

$gresult=member_details($result['member_id'],"full_name,company_name,company_address,company_registration_no,assign_account");

?>



<?php if($result['transaction_status']=="Process"){

$mscclr="warning";

}elseif($result['transaction_status']=="Success"){

$mscclr="success";

}elseif($result['transaction_status']=="Failed"){

$mscclr="danger";

}else{

$mscclr="secondary";

}

?>

                            <tr>

                              <td><a class="hrefmodal" data-tid="<?=$result['transaction_id'];?>" data-href="<?=$data['Admins'];?>/transaction-details-view<?=$data['ex'];?>?tid=<?=$result['transaction_id'];?>" title="<?=$result['transaction_id'];?>" >

                  <?=$result['transaction_id'];?></a></td>

							  <td><?=$gresult['full_name']?></td>

							  <td><button type="button" class="btn btn-sm btn-info w-100" data-toggle="popover" data-placement="top" title="<?=$gresult['company_name']?>" data-content="Address : <?=$gresult['company_address']?>, Registration Number : <?=$gresult['company_registration_no']?>, Asign Account Number : <?=$gresult['assign_account']?> "><? if(isset($gresult['company_name'])&& $gresult['company_name']){ echo$gresult['company_name'];} ?></button></td>

                              <td><?=$result['transaction_currency'];?> <?=$result['transaction_amount'];?></td>

							   <td><?=$result['transaction_date'];?></td>

                              <td><? if($result['transaction_type']=="Credit"){?>

                          <i class="<?=$data['fwicon']['circle-dot'];?> text-success mr-1"></i>

                          <? }else{ ?>

                          <i class="<?=$data['fwicon']['circle-dot'];?> text-danger mr-1"></i>

                          <? } ?>

                          <?=$result['transaction_type'];?> -

                          <?=$result['transaction_for'];?></td>

						 

                          <td><span class="badge rounded-pill text-bg-<?=$mscclr;?>"><?=$result['transaction_status'];?></span></td>

						  <td>

<a href="<?=$data['Admins'];?>/transaction-details<?=$data['ex'];?>?tid=<?=$result['transaction_id'];?>" title="View Detail" class="text-center"><i class="<?=$data['fwicon']['eye'];?> text-<?=$mscclr;?>"></i></a>

 </td>

                            </tr>

<?php } ?>

                          </tbody>

                        </table>

                      </div>

                      <?php } else { ?>

                      <div class="alert alert-danger text-center"> <strong>Record Not Found</strong> </div>

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

 </html>