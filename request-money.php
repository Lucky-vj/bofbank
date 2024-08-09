<?php

include "common.php";

include "controller/blade.request-money.php";

?>

  <!-- ============================================================== -->

  <!-- Start right Content here -->

  <!-- ============================================================== -->

  <div class="main-content">

    <div class="page-content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

            <div class="page-title-box d-flex align-items-center justify-content-between">

              <h4 class="heading-ad"><i class="<?=$data['fwicon']['requestfund'];?> fa-fw"></i> <?=$data['PageName'];?><br>

              </h4>

			  <div class="page-title-right">

                <ol class="breadcrumb m-0">

                  <li class="breadcrumb-item"><a href="<?=$data['Host-Home'];?>" title="Home">Home</a></li>

                  <li class="breadcrumb-item active"><?=$data['PageName'];?>

                  </li>

                  </li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <div class="my-2">

		

		<?php if($step==1){ ?>

          <div class="row">

            <div class="col-12 ">

              <div class="card ">

                <div class="card-body ">

                  <h4 class="header-title ">STEP - 1</h4>

                  <p class="card-title-desc ">To add funds to your account please select the currency and the amount and other  below to receive transfer instructions.</p>

                  <form method="post">

				  <div class="row">

				  

                    <div class="col-md-6 my-2">

					    <div class="form-floating">

                        <select name="v_currency" id="v_currency" class="form-select" title="Select Currency" required>

                          <option  value="" selected="selected">Select</option>

                          <?php 

						  $cirr_get_value=bank_assign_currency("$member_account_number");

						  foreach($cirr_get_value as $currv){ ?>

                          <option value="<?=$currv;?>"><?=$currv;?></option>

                          <? } ?>

                        </select>

						<label for="">Select Currency</label>

						</div>

                      </div>

                   

                    <div class="col-md-6 my-2">

					  <div class="form-floating">

                        <input class="form-control" name="v_amount" id="v_amount" type="number" title="Request Amount" placeholder="Amount - How much do you Request ?" required>

						<label for="v_amount">Request Amount</label>

						</div>

                      </div>

                   

                    <div class="col-md-6 my-2">

					  <div class="form-floating">

                        <input class="form-control" name="v_sender_name" id="v_sender_name" type="text" title="Receiver Name" required>  <label for="v_sender_name">Receiver Name</label>

						</div>

                      </div>

                    

                    <div class="col-md-6 my-2">

					   <div class="form-floating">

                        <input class="form-control" name="v_sender_address" id="v_sender_address" type="text"  title="Receiver Address" required><label for="v_sender_address">Receiver Address</label>

						</div>

                      

                    </div>

                    <div class="col-md-12 my-2">

					  <div class="form-floating">

                        <input class="form-control" name="v_descricption" id="v_descricption" type="text"  title="Descricption" required>               <label for="v_descricption">Descricption</label>

						</div>

                      </div>

                    

                    <div class="form-group col-12 my-2">

                      

					  <button type="submit" class="btn btn-sm btn-success" name="btn_submit" value="Submit"><i class="<?=$data['fwicon']['circle-plus'];?>"></i> Submit</button>

                    </div>

					

					</div>

                  </form>

                </div>

              </div>

            </div>

            <!-- end col -->

          </div>

		<? } ?>

		<?php if($step==2){ 

		if($_SESSION['s_currency']==""){

		  header("location:request-money.php");exit;

		  }

		?>

          <div class="row">

            <div class="col-lg-12">

              <div class="card">

                <div class="card-body">

                  <h4 class="header-title ">STEP - 2</h4>

                  <p class="card-title-desc ">Confirm Data and Select Your Preferred Bank.</p>

                  <div class="col-sm-12 col-xl-12">

                    <div class="card">

                      <div class="card-body">

                        <div class="media">

                          <div class="media-body">

                            <h5 class="font-size-14">Request Money - <?=$_SESSION['s_currency'];?> <?=$_SESSION['s_amount'];?> - <?=$_SESSION['s_sender_name'];?></h5>

							<!--<h5 class="font-size-12" title="Sender Name"><?=$_SESSION['s_sender_name'];?></h5>

							<h5 class="font-size-11"  title="Address"><?=$_SESSION['s_sender_address'];?></h5>

							<h5 class="font-size-11"  title="Descricption"><?=$_SESSION['s_descricption'];?></h5>-->

                          </div>

                        </div>

                        

                  

                      </div>

                    </div>

                  </div>

				  

               

                   



<?php 

$selbid=db_rows("SELECT assign_bank FROM tbl_member_bank_account WHERE client_id='$member_account_number' and bank_status='Active' ");

foreach($selbid as $key=>$rsbid) {

$assign_banks=$rsbid['assign_bank'];

$selcurrdetail=db_rows("SELECT * FROM tbl_common_bank_account WHERE bank_id='$assign_banks' and  bank_supported_currency like '%".$_SESSION['s_currency']."%'");

if($db_counts==1){



$bankdetails=$selcurrdetail[0];



?>

<form name="form-submit" method="post">

<input type="hidden" id="bankid44" name="bankid" value="<?=$bankdetails['bank_id']?>" >



<input type="hidden" name="bank_name" value="<?=$bankdetails['bank_name']?>" >

<input type="hidden" name="bank_account_number" value="<?=$bankdetails['bank_account_number']?>" >

<input type="hidden" name="bank_swift_code" value="<?=$bankdetails['bank_swift_code']?>" >

<input type="hidden" name="bank_address" value="<?=$bankdetails['bank_address']?>" >

<div class="col-xl-12">



                            <div class="card">



                                <h5 class="card-header mt-0"><?=$bankdetails['bank_name']?></h5>



                                <div class="card-body">



<div class="row">

					

					

                        <div class="col-md-6 my-2">

					  <label>Beneficiary Name : </label> <?=$bankdetails['account_beneficiary']?>

                        

                      </div>

					  

					  <div class="col-md-6 my-2">

					  <label>Beneficiary Address : </label> <?=$bankdetails['beneficiary_address']?>

                        

                      </div>

					  <div class="col-md-6 my-2">

					  <label>IBAN / Bank Account Number : </label> <?=$bankdetails['bank_account_number']?>

                        

                      </div>

					  

					   <div class="col-md-6 my-2">

					  <label>Swift Code / BIC : </label> <?=$bankdetails['bank_swift_code']?>

                        

                      </div>

					  <div class="col-md-6 my-2">

					  <label>Bank Name : </label> <?=$bankdetails['bank_name']?>

                        

                      </div>

					  

					   <div class="col-md-6 my-2">

					  <label>Bank Address : </label> <?=$bankdetails['bank_address']?>

                        

                      </div>

					

					  

					  

					 </div>





<input type="submit" id="submit" class="btn btn-sm btn-success" name="btn_request_money" title="Request Money - <?=$bankdetails['bank_name']?>" value="Request Money">



                                </div>



                            </div>



                        </div>

</form>

						

 

						

<? } } ?>

                   

      

				  

				  <!--<div class="form-group col-12 my-2 text-end">-->

                      <!--<input type="submit" id="submit" class="btn btn-success" name="btn_add_money" value="Add Money">-->

					  <!--<input type="submit" id="back" class="btn btn-success" name="btn_back" value="Back">-->

                   <!-- </div>-->

				 <!-- </form>-->

                </div>

              </div>

            </div>

          </div>

		 <? } ?>

        </div>

      </div>

      <!-- container-fluid -->

    </div>

	<? include($data['Path'].'/footer'.$data['iex']);?>

    <!-- End Page-content -->

  </div>

  <!-- end main content-->

</div>

<!-- END layout-wrapper -->

<!-- Right Sidebar -->



<script>

$(function() {

    $("#submit99").click(function() {     

      if($('input[type=radio][name=bankid]:checked').length == 0)

      {

         alert("Please select atleast one Bank");

         return false;

      }

      else

      {

          //alert("radio button selected value: ");

      }      

    });

});

</script>

</body>

</html>

