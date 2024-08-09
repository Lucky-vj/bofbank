<?php

include "common.php";

include "controller/blade.iban-account-balance.php";

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

              <h4 class="header-title"><i class="<?=$data['fwicon']['transaction'];?> fa-fw"></i> <?=$data['PageName'];?> [Stylopay] </h4>

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

        

		  


			<div class="row">

            <div class="col-12 px-0">							

				<?php  if(isset($_SESSION['ses_pg_msg'])&&$_SESSION['ses_pg_msg']){ ?>
                  <div class="alert alert-info alert-dismissible fade show my-2" role="alert">
  				  <strong><?=$_SESSION['ses_pg_msg'];?></strong>
  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>
                  </div>
				<?php unset($_SESSION['ses_pg_msg']); 
				} ?>								

										

            <div class="card">

              <div class="card-body">
				
				<h4 class="header-title ">Account Balance <a href="api/stylopay/available-balance.php" title="Available Balance" type="button" class="btn btn-sm btn-outline-success"> Refresh Balance</a></h4>
				
				<div class="table-responsive">

                  <table class="table table-striped">
				  <?php if(isset($iban['availableBalance'])&&$iban['availableBalance']){ ?>
                    <tbody>
					  <tr>
                        <td class="w-50">AccountID</th>
                        <td class="w-50">: <?=$iban['accountid'];?></td>
                      </tr>
					  <tr>
					    <td>Account Number</td>                    
					    <td>: <?=$iban['accountNumber'];?></td>
				      </tr>
					  <tr>
					    <td >Type</td>                    
					    <td >: <?=$iban['type'];?></td>
				      </tr>

					  
					  <tr>
					    <td >Available Balance</td>                    
					    <td >: <?=$iban['availableBalance'];?></td>
				      </tr>
					  <tr>
					    <td>Currency</td>                    
					    <td >: <?=$iban['currency'];?></td>
				      </tr>
					  <tr>
                        <td>CreatedAt</th>
                        <td>: <?=$iban['createdAt'];?></td>
                      </tr>
					  
					  <tr >
                        <td>routingNumber</th>
                        <td>: <?=$iban['routingNumber'];?></td>
                      </tr>
					  <tr >
					    <td>fees</td>                     
					    <td>: <?=$iban['fees'];?></td>
				      </tr>
					  <tr >
					    <td>sponsorBankName</td>                    
					    <td >: <?=$iban['sponsorBankName'];?></td>
				      </tr>
					  <tr>
					    <td>interest</td>                     
					    <td >: <?=$iban['interest'];?></td>
				      </tr>
					  
					  <tr>
					    <td >Status</td>                    
					    <td >: <?=$iban['Balance_Status'];?></td>
				      </tr>
                    </tbody>
					<? } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><a href="api/<?=strtolower(str_replace(" ","-",$IBAN_issuer));?>/available-balance.php" title="Available Balance" type="button" class="btn btn-outline-success"> View <?=$IBAN_issuer;?> IBAN  Available Balance</a></th>
                       
                      </tr>
					  
                    </tbody>
					<? }?>
                  </table>
                </div>

              </div>

            </div>

			<? include($data['Path'].'/footer'.$data['iex']);?>

			</div>

        </div>

          </div>

        </div>

      </div>

    </div>

    <br>

  </div>

  <!-- end main content-->

</div>

<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->

<div class="rightbar-overlay"></div>





</body>

</html>

