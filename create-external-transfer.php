<?php
include "common.php";
include "controller/blade.create-external-transfer.php";
if(isset($_SESSION['ClientID'])&&$_SESSION['ClientID']){
?>
<style>
 .trans.page-content { padding: calc(0px + 24px) calc(24px / 2) 0px calc(24px / 2) !important;}
 .trans.main-content  { margin-left: 0px !important;} 

  body[data-layout=horizontal] .page-content {
    margin-top: 0px !important;
    padding: calc(0px + 24px) calc(24px / 2) 20px calc(24px / 2) !important;
}
 </style>
<? } ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="trans main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="heading-ad"><i class="<?=$data['fwicon']['sales-volume'];?> fa-fw"></i>
              <?=$data['PageName'];?>
              <br>
            </h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Host-Home'];?>" title="Home">Home</a></li>
                <li class="breadcrumb-item active">
                  <?=$data['PageName'];?>
                </li>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="my-2">
        <div class="row">
          <div class="col-12 px-0 ">
            <?php  if(isset($_SESSION['ses_pg_msg'])&&$_SESSION['ses_pg_msg']){ ?>
            <div class="alert alert-info alert-dismissible fade show my-2" role="alert"> <strong>
              <?=$_SESSION['ses_pg_msg'];?>
              </strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <?php unset($_SESSION['ses_pg_msg']); 
				} ?>
          <div class="card ">
            <div class="card-body ">
              <h4 class="header-title">
                <?=$data['PageName'];?>
              </h4>
              <form method="post">
			  <input type="hidden" name="ClientID" value="<?=$_REQUEST['ClientID'];?>" />
                <div class="row ">
                  <div class="col-md-4 my-2">
                    <div class="form-floating">
                      <?php if(isset($get_beneficiary_name)&&$get_beneficiary_name){ ?>
                      <h2 class="p-2">Beneficiary Name : <strong>
                        <?=$get_beneficiary_name;?>
                        </strong></h2>
                      <input name="name" id="name" type="hidden"  value="<?=$get_beneficiary_name;?>">
                      <? }else{ ?>
                      <input class="form-control" name="name" id="name" type="text" title="Name" required>
					  <label for="ibanno">Beneficiary Name</label>
                      <? } ?>
                      
                    </div>
                  </div>
                  <div class="col-md-4 my-2">
                    <div class="form-floating">
                      <?php if(isset($get_beneficiary_account_number)&&$get_beneficiary_account_number){ ?>
                      <h2 class="p-2">IBAN Number : <strong>
                        <?=$get_beneficiary_account_number;?>
                        </strong></h2>
                      <input name="iban" id="iban" type="hidden"  value="<?=$get_beneficiary_account_number;?>">
                      <? }else{ ?>
                      <input class="form-control" name="iban" id="iban" type="text" title="IBAN Number" required>
                      <label for="ibanno">IBAN Number</label>
                      <? } ?>
                    </div>
                  </div>
                  <div class="col-md-4 my-2">
                    <div class="form-floating">
                      <?php if(isset($get_beneficiary_bank_country)&&$get_beneficiary_bank_country){ ?>
                      <h2 class="p-2">Country : <strong>
                        <?=get_countryname($get_beneficiary_bank_country);?>
                        </strong></h2>
                      <input name="country" id="country" type="hidden"  value="<?=$get_beneficiary_bank_country;?>">
                      <? }else{ ?>
                      <select class="form-select" name="country" id="country" title="Country" required >
                        <option value="" selected="selected">Select</option>
                        <?php 
						  foreach($country_list as $clist){ ?>
                        <option value="<?=$clist['ISO_3_DIGIT'];?>">
                        <?=$clist['country'];?>
                        </option>
                        <? } ?>
                      </select>
                      <label for="amount">Select Country</label>
                      <? } ?>
                      
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <div class="form-floating">
                      <input class="form-control" name="amount" id="amount" type="text" title="Amount" required>
                      <label for="amount">Amount</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <div class="form-floating">
<select class="form-select" name="currency" id="currency" title="Currency" required >
<option value="" selected="selected">Select</option>
<?php if(isset($get_beneficiary_currency)&&$get_beneficiary_currency){ ?>
<option value="<?=$get_beneficiary_currency;?>"> <?=$get_beneficiary_currency;?> </option>
<? }else{ ?>
<?php foreach($currency_list as $crlist){ ?>
<option value="<?=$crlist['currency_code'];?>"> <?=$crlist['currency_code'];?> - <?=ucwords($crlist['currency_name']);?></option>
<? } ?>
<? } ?>
</select>
                      <label for="currency">Currency</label>
                    </div>
                  </div>
				  
				  <div class="col-md-6 my-2">
                    <div class="form-floating">
<select class="form-select" name="trasnfer_reason" id="trasnfer_reason" title="Purpose for Transfer" required >
<option value="" selected="selected">Select</option>

<?php foreach($trasnfer_reason_list as $trlist){ ?>
<option value="<?=$trlist['id'];?>"><?=$trlist['reason'];?></option>
<? } ?>

</select>
                      <label for="currency">Purpose for Transfer</label>
                    </div>
                  </div>
				  <div class="col-md-6 my-2">
                    <div class="form-floating">
                      <input class="form-control" name="other_trasnfer_reason" id="other_trasnfer_reason" type="text" title="Other Trasnfer Reason">
                      <label for="amount">Other Trasnfer Reason</label>
                    </div>
                  </div>
                  <div class="form-group col-12 my-2">
                    <button type="submit" class="btn btn-sm btn-success submit_loader" name="btn_submit" value="Pay"><i class="<?=$data['fwicon']['circle-plus'];?>"></i> Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
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
<!-- JAVASCRIPT -->
<script>
$('.submit_loader').on('click', function () {

var amount= $('#amount').val();
var currency= $('#currency').val();
var email= $('#email').val();
var iban= $('#iban').val();
var name= $('#name').val();
var trasnfer_reason= $('#trasnfer_reason').val();

if((email=="") || (currency=="") || (amount=="") || (iban=="") || (name=="") || (trasnfer_reason=="")){
alert("Please enter required field");
return;
}


$(".submit_loader").html("<i class='<?=$data['fwicon']['spinner']?> fa-spin-pulse'></i>");
});
</script>
</body></html>