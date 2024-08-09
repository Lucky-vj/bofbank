<?php

include "../common.php";

include "controller/blade.transaction-details-view.php";

?>

  <!-- ============================================================== -->

  <!-- Start right Content here -->

  <!-- ============================================================== -->

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

        

          <?php $gresult=member_details($rs['member_id'],"");?>       

          <div class="row">

            

                  

                  <div class="col-sm-12 col-xl-12 mt-2"  style="clear:both;">

                    <div class="card">

                      <div class="card-body">

                        <div class="media">

                          <div class="media-body">



<div class="row">

<div class="col-sm-12 my-2"><h6 class="header-title">Member Details : <? //=$rs['member_id'];?></h6></div>

<div class="col-sm-4"><strong>Name</strong></div><div class="col-sm-8"><?=$gresult['full_name'];?></div>							

<div class="col-sm-4"><strong>Address</strong></div><div class="col-sm-8"><?=$gresult['address_line1'];?></div>

<div class="col-sm-4"><strong>Company Name</strong></div><div class="col-sm-8"><?=$gresult['company_name'];?></div>

<div class="col-sm-4"><strong>Company Address</strong></div><div class="col-sm-8"><?=$gresult['company_address'];?></div>

<div class="col-sm-4"><strong>Regst. Number</strong></div><div class="col-sm-8"><?=$gresult['company_registration_no'];?></div>

<div class="col-sm-4"><strong>Assign Currency</strong></div><div class="col-sm-8"><?=$gresult['assign_currency'];?></div>

<div class="col-sm-4"><strong>Assign A/C No</strong></div><div class="col-sm-8"><?=$gresult['assign_account'];?></div>



</div>



</div>

                      </div>

                    </div>

                  </div>

				  

				

                    <div class="card">

                      <div class="card-body">

                        <div class="media">

                          <div class="media-body">

                            <div class="row">

<div class="col-sm-4"><strong>Transaction No</strong></div><div class="col-sm-8"><?=$rs['transaction_id'];?></div>							

<div class="col-sm-4"><strong>Created Date</strong></div><div class="col-sm-8"><?=$rs['transaction_date'];?></div>

<div class="col-sm-4"><strong>Order Amount</strong></div><div class="col-sm-8"><a class="text-success"><strong><?=$rs['transaction_amount'];?> <?=$rs['transaction_currency'];?></strong></a>&nbsp;&nbsp;<a href="https://www.xe.com/currencyconverter/convert/?Amount=<?=$rs['transaction_amount'];?>&From=<?=$rs['transaction_currency'];?>&To=<?=$assign_currency;?>" title="Convert Currency" target="_blank">Convert Currency to <?=$assign_currency;?></a></div>

<div class="col-sm-4"><strong>Type</strong></div><div class="col-sm-8"><? if($rs['transaction_type']=="Credit"){?>

                          <a class="text-success"><strong><?=$rs['transaction_type'];?></strong></a>

                          <? }else{ ?>

                          <a class="text-danger"><strong><?=$rs['transaction_type'];?></strong></a>

                          <? } ?><?=$rs['transaction_for'];?></div>

<div class="col-sm-4"><strong>Beneficiary Name</strong></div><div class="col-sm-8"><?=$rs['usr_name'];?></div>

<div class="col-sm-4"><strong>Beneficiary Address</strong></div><div class="col-sm-8"><?=$rs['usr_address'];?></div>

<div class="col-sm-4"><strong>Account Number</strong></div><div class="col-sm-8"><?=$rs['transaction_ac_no'];?></div>

<div class="col-sm-4"><strong>Swift Code</strong></div><div class="col-sm-8"><?=$rs['transaction_swift_code'];?></div>

<div class="col-sm-4"><strong>Bank Name</strong></div><div class="col-sm-8"><?=$rs['transaction_bank_name'];?></div>

<div class="col-sm-4"><strong>Bank Address</strong></div><div class="col-sm-8"><?=$rs['transaction_bank_address'];?></div>

<div class="col-sm-4"><strong>Purpose/ Descricption</strong></div><div class="col-sm-8"><?=$rs['transaction_purpose'];?> <?=$rs['usr_descricption'];?></div>

<div class="col-sm-4"><strong>Trans Status</strong></div><div class="col-sm-8"><span class="badge rounded-pill text-bg-<?=$mscclr;?> m-1 p-1"><?=$rs['transaction_status'];?></span> </div>









<?php

if($rs['transaction_currency']==$assign_currency){

$convertdeamt=$rs['transaction_amount'];

$convertedamount= $rs['transaction_amount']. " " .$assign_currency;

}else{

$fcurr=$rs['transaction_currency'];

$assign_currency;

$tramt=$rs['transaction_amount'];

$convertdeamt=currencyConverter("$fcurr","$assign_currency","$tramt");

$convertedamount="Convert $fcurr Amount - $tramt to $assign_currency  = $convertdeamt";

}

//echo $convertedamount;

//echo "<br>Transaction Fee  ".$rs['transaction_type']." MRD ".$mdr_fee." % Min ".$min_fee." $assign_currency";

$mdr=$convertdeamt * 2 /100;

if(($rs['transaction_for']=="Transaction Fee") or ($rs['transaction_for']=="Yearly Fee") or ($rs['transaction_for']=="Monthly Fee") or ($rs['transaction_for']=="One Time Setup Fee")){

$tranfee="0";

$purpose1="No Transaction Fee";

}else if($min_fee < $mdr){

$tranfee=round($mdr, 2);

$purpose1="Assign Transaction Fee of TransID - ".$rs['transaction_id']."  is MDR ".$mdr_fee." % : ". $tranfee." ".$assign_currency;

}else{

$tranfee=round($min_fee, 2);

$purpose1="Transaction Fee of TransID - ".$rs['transaction_id']." is Min Amount : ". $tranfee." ".$assign_currency;

}





?>

<div class="col-sm-4"><strong>Converted Amount</strong></div><div class="col-sm-8"><?=$convertedamount;?></div>

<div class="col-sm-4"><strong>Transaction Fee</strong></div><div class="col-sm-8"><?=$purpose1;?></div>

</div>

<?php if($rs['admin_transaction_id']<>""){ ?>

<div class="row bg-light border border-primary m-1 rounded">

<div class="col-sm-12 my-2"><h4 class="header-title my-2">By Admin</h4></div>

<div class="col-sm-4 my-2"><strong>TransNo</strong> - <?=$rs['admin_transaction_id'];?></div>

<div class="col-sm-4 my-2"><strong>TransDate</strong> - <?=$rs['admin_transaction_date'];?></div>

<div class="col-sm-4 my-2"><strong>TransAmount</strong> - <?=$rs['converted_transaction_amount'];?> <?=$rs['converted_transaction_currency'];?></div>

<div class="col-sm-12 my-2"><strong>TransDetail</strong> - <?=$rs['admin_transaction_desc'];?> ( <strong><?=$rs['admin_approval_status'];?></strong> )</div>

</div>



<? } ?>

                          

						  

						  

                        </div>

                      </div>

                    </div>

                  </div>



               

				

				<?php if($rs['transaction_status']<>"Success"){?>

				

                    <?php /*?><div class="card">

                      <div class="card-body">

                        <div class="media">

                          <div class="media-body">

<form name="frm" method="post">

<input type="hidden" name="transaction_id" value="<?=$rs['transaction_id'];?>">

<input type="hidden" name="tranfee" value="<?=$tranfee;?>">

<input type="hidden" name="assign_currency" value="<?=$assign_currency;?>">

<input type="hidden" name="purpose1" value="<?=$purpose1;?>">

<input type="hidden" name="memberfullname" value="<?=$gresult['full_name'];?>">

<input type="hidden" name="memberemail" value="<?=$gresult['email'];?>">

<input type="hidden" name="transtype" value="<?=$rs['transaction_for'];?>">

<input type="hidden" name="orderamt" value="<?=$rs['transaction_amount'];?> <?=$rs['transaction_currency'];?>">

<div class="row font-size-14">

<div class="col-md-6 my-2">

<label>Transaction ID</label>

<input class="form-control" name="admin_transaction_id" type="number" title="Transaction ID By Admin" placeholder="Transaction ID By Admin" value="<?=$rs['transaction_id'];?>" readonly="" required>

</div>

<div class="col-md-6 my-2">

<label>Transaction Amount (<?=$assign_currency;?>)</label>





<input class="form-control" name="converted_transaction_amount" type="text" title="Converted Transaction Amount" placeholder="Converted Transaction Amount" value="<?=$convertdeamt;?>" required>

<input type="hidden" name="converted_transaction_currency" value="<?=$assign_currency;?>">



</div>

<div class="col-md-6 my-2">

<label>Value Date</label>

<input class="form-control" name="admin_transaction_date" type="datetime-local" title="Transaction Date By Admin" placeholder="Transaction Date By Admin" value="<?=date('Y-m-d');?>T<?=date('H:i');?>" required>

</div>

<div class="col-md-6 my-2">

<label>Transaction Status</label>

<select name="admin_transaction_status" class="form-control" title="Transaction Status" required>

<option value="">Select Transaction Status</option>

<option value="Failed">Failed</option>

<option value="Process">Process</option>

<option value="Rejected">Rejected</option>

<option value="Success">Success</option>

</select>

</div>	

<div class="col-md-12 my-2">

<textarea name="admin_transaction_desc" id="admin_transaction_desc" Placeholder="Transaction Description / Reason" class="form-control" title="Transaction Description / Reason" required></textarea>

</div>

		

<div class="col-md-2 my-2">

<input type="submit" class="btn btn-primary" name="btn_submit" value="Submit">

</div>

					</div>

					     </form>

					</div></div></div></div><?php */?>

				<?php  } ?>

              </div>

            

		



	  

	  

      <!-- container-fluid -->

    </div>

    <!-- End Page-content -->

  </div>

  <!-- end main content-->

</div>

  <!-- End Page-content -->

</div>

<!-- end main content-->

</div>

</body>

</html>