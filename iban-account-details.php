<?php
include "common.php";
include "controller/blade.iban-account-details.php";

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

              <h4 class="header-title"><i class="<?=$data['fwicon']['transaction'];?> fa-fw"></i> <?=$data['PageName'];?> [Stylopay]</h4>

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
               <h4 class="header-title btn btn-outline-primary w-100 text-start">User Details </h4>

                <div class="table-responsive">

                  <table class="table table-striped">
                    <?php if(isset($iban_data['IBAN_userid'])&&$iban_data['IBAN_userid']){ ?>
                    <tbody>
                      <tr>
                        <td class="w-50">IBAN Issuer</th>
                        <td class="w-50">: <?=$iban_data['IBAN_issuer'];?></td>
                      </tr>
					  <tr>
                        <td>IBAN User ID</th>
                        <td>: <?=$iban_data['IBAN_userid'];?> [<?=$iban_data['IBAN_user_status'];?>]</td>
                      </tr>
					  
					  
                    </tbody>
					<? } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><a href="api/stylopay/create-user.php" type="button" class="btn btn-outline-success">Generate Stylopay IBAN User ID</a></th>
                       
                      </tr>
					  
                    </tbody>
					<? }?>
					
					
                  </table>

                </div>
				
				<h4 class="header-title btn btn-outline-primary w-100 text-start">Account Details </h4>
				
				<div class="table-responsive">

                  <table class="table table-striped">
				  <?php if(isset($iban_data['accountid'])&&$iban_data['accountid']){ ?>
                    <tbody>
					  <tr >
                        <td class="w-50">Account ID</th>
                        <td class="w-50">: <?=$iban_data['accountid'];?></td>
                      </tr>
					  <tr >
                        <td>Account Status</th>
                        <td>: <?=$iban_data['accountStatus'];?></td>
                      </tr>
					  <tr >
                        <td>createdAt</th>
                        <td>: <?=$iban_data['createdAt'];?></td>
                      </tr>
                    </tbody>
					
					<? } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><a href="api/stylopay/user-kyc-details-request.php" title="KYC Request" type="button" class="btn btn-outline-success">Active Stylopay IBAN Account KYC</a></th>
                       
                      </tr>
					  
                    </tbody>
					<? }?>
                  </table>
                </div>
				
				
				<h4 class="header-title btn btn-outline-primary w-100 text-start">Account Balance </h4>
				
				<div class="table-responsive">

                  <table class="table table-striped">
				  <?php if(isset($iban_data['accountNumber'])&&$iban_data['accountNumber']){ ?>
                    <tbody>
					  <tr>
                        <td class="w-50">AccountID
                        </td><td class="w-50">: <?=$iban_data['accountid'];?></td>
                      </tr>
					  <tr>
					    <td>Account Number</td>                    
					    <td>: <?=$iban_data['accountNumber'];?></td>
				      </tr>
					  <tr>
					    <td>Account Type</td>                    
					    <td>: <?=$iban_data['type'];?></td>
				      </tr>

					  
					  <tr>
					    <td>Available Balance</td>                    
					    <td>: <?=$iban_data['availableBalance'];?></td>
				      </tr>
					  <tr>
					    <td>Currency</td>                    
					    <td>: <?=$iban_data['currency'];?></td>
				      </tr>
					  <tr>
                        <td>CreatedAt
                        </td><td>: <?=$iban_data['createdAt'];?></td>
                      </tr>
					  
					  <tr>
                        <td>routingNumber
                        </td><td>: <?=$iban_data['routingNumber'];?></td>
                      </tr>
					  <tr>
					    <td>fees</td>                     
					    <td>: <?=$iban_data['fees'];?></td>
				      </tr>
					  <tr>
					    <td>sponsorBankName</td>                    
					    <td>: <?=$iban_data['sponsorBankName'];?></td>
				      </tr>
					  <tr>
					    <td>interest</td>                     
					    <td>: <?=$iban_data['interest'];?></td>
				      </tr>
					  
					  <tr>
					    <td>Status</td>                    
					    <td>: <?=$iban_data['Balance_Status'];?></td>
				      </tr>
                    </tbody>
					
					<? } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><a href="api/stylopay/available-balance.php" title="KYC Request" type="button" class="btn btn-outline-success">Check  Stylopay IBAN Account Balance</a></th>
                       
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

