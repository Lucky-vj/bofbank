<?php

include "../common.php";

include "controller/blade.member-iban-assign.php";

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

	

      <div class="row mb-4">

        <div class="col-xl-12">

          <div class="row">

            <div class="col-md-12">

              <div class="row">

                <div class="col-md-12 py-2">

						<?php if(isset($_SESSION['msgok'])){ ?>

						<div class="alert alert-success alert-dismissible fade show" role="alert">

						<strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>

						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						</div>

						<?php unset($_SESSION['msgok']); } ?>

						<?php if(isset($_SESSION['msgfail'])){ ?>

						<div class="alert alert-danger alert-dismissible fade show" role="alert">

						<strong>Fail!</strong> <?php echo $_SESSION['msgfail']; ?>

						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						</div>

						<?php unset($_SESSION['msgfail']); } ?>

                </div>

              </div>

			  


	

              <div class="row">

                <div class="col-md-12">

                  <div class="card">

                    <div class="card-body">

                      <h4 class="header-title">

                        <?=ucwords($action);?> Bank Account</h4>

                        

                      <form method="post" >

                        <input type="hidden" name="account_id" value="<?php echo $Client_ID;?>">

                        <input type="hidden" name="bid" value="<?php echo $bid;?>">

                        <!--class="needs-validation" novalidate-->

                        <div class="row">

                          <div class="col-sm-12 my-2">



<div class="table-responsive">
<table class="table table-centered">
<thead>
<tr>
<th scope="col"><strong>IBAN issuer</strong></th>
<th scope="col"><strong>Assign</strong></th>
<th scope="col"><strong>Make Default</strong></th>
</tr>
</thead>
<?php 
//echo $Client_ID;
$getiban=member_details($Client_ID,"IBAN_issuer");
//echo $getiban['IBAN_issuer'];
$getiban=explode("||",$getiban['IBAN_issuer']);
//print_r($getiban);
$IBAN_issuer=explode(",",$getiban[0]);
//print_r($IBAN_issuer);
$IBAN_issuer_default=$getiban[1];
$sellist=db_rows("SELECT `ID`,`IBAN_issuer` FROM `tbl_iban_issuer` WHERE `Status`=1 order by `IBAN_issuer`");
foreach($sellist as $key=>$rslist) {

?>

<tr>
<td scope="col"><?=$rslist['ID'];?> - <?=$rslist['IBAN_issuer'];?></td>
<td scope="col"><input class="form-check-input" name="IBAN_issuer[]" type="checkbox" value="<?=$rslist['ID'];?>" <? if(in_array($rslist['ID'],$IBAN_issuer)){ ?> checked="checked" <? } ?> ></td>
<td scope="col"><input class="form-check-input" type="radio" name="IBAN_issuer_default" value="<?=$rslist['ID'];?>" <? if($rslist['ID']==$IBAN_issuer_default){?> checked <? } ?>></td>
</tr>


<? } ?>
                          </thead>
                        </table>

                      </div>



                          </div>

                          <div class="col-md-12 my-2">

                            <button type="submit" class="btn btn-sm btn-primary btn_update" name="btn_update" value="Add"><i class="<?=$data['fwicon']['circle-plus'];?>"></i> Submit</button>

                          </div>

                        </div>



                        

                      </form>

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

</body>
<script>

/// For checkbox validation - atlease 1 checked
$('.btn_update').on('click', function () {
if ($("input[type='checkbox'][name='IBAN_issuer[]']:checked").length){
		//alert(11);
    }else{
	    alert("Please checked atleast 1 IBAN issuer");
		return false
	}
});

</script>


</html>