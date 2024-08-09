<?php
include "common.php";
include "controller/blade.create-internal-transfer.php";
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

              <h4 class="heading-ad"><i class="<?=$data['fwicon']['sales-volume'];?> fa-fw"></i> <?=$data['PageName'];?><br>

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

		

		

          <div class="row">

            <div class="col-12 px-0 ">
			<?php  if(isset($_SESSION['ses_pg_msg'])&&$_SESSION['ses_pg_msg']){ ?>
                  <div class="alert alert-info alert-dismissible fade show my-2" role="alert">
  				  <strong><?=$_SESSION['ses_pg_msg'];?></strong>
  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>
                  </div>
				<?php unset($_SESSION['ses_pg_msg']); 
				} ?>	

              <div class="card ">

                <div class="card-body ">

                  <h4 class="header-title"><?=$data['PageName'];?></h4>

                  

                  <form method="post">

				  <div class="row ">

				  

				  

					   

                    <div class="col-md-4 my-2">

					  

					  <div class="form-floating">

<input class="form-control" name="email" id="email" type="email" title="Email" required>

						<label for="email">Beneficiary Email</label> 

						</div>

                      </div>

                   

                    <div class="col-md-4 my-2">

					  <div class="form-floating">

                        <input class="form-control" name="amount" id="amount" type="text" title="Amount" required>                <label for="amount">Amount</label>

                      </div> 

					  </div>

                  

                    <div class="col-md-4 my-2">

					 <div class="form-floating"> 

<select class="form-select" name="currency" id="currency" title="Currency" required >
<option value="" selected="selected">Select</option>
                          <?php 
						  foreach($currency_list as $crlist){ ?>
                          <option value="<?=$crlist['currency_code'];?>"><?=$crlist['currency_code'];?> - 
						  <?=ucwords($crlist['currency_name']);?></option>
						  <? } ?>
</select> <label for="currency">Currency</label>

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

if((email=="") || (currency=="") || (amount=="")){
alert("Please enter required field");
return;
}

$(".submit_loader").html("<i class='<?=$data['fwicon']['spinner']?> fa-spin-pulse'></i>");
});
</script>



</body>

</html>

