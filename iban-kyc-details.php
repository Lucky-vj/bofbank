<?php

include "common.php";

include "controller/blade.iban-kyc-details.php";

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

            <div class="col-12 ">							

										

            <div class="card">

              <div class="card-body">
				
				<h4 class="header-title ">KYC Details </h4>
				
				<div class="table-responsive">

                  <table class="table table-striped">
				  <?php if(isset($iban_data['IBAN_kycStatus'])&&$iban_data['IBAN_kycStatus']){ ?>
                    <tbody>
					  <tr >
                        <td class="w-50">KYC Type</th>
                        <td class="w-50">: <?=$iban_data['IBAN_kyc_documentType'];?></td>
                      </tr>
					  <tr >
                        <td>KYC Status</th>
                        <td>: <?=$iban_data['IBAN_kycStatus'];?></td>
                      </tr>
					  <tr >
                        <td >KYC Compliance Status</th>
                        <td >: <?=$iban_data['IBAN_kyc_complianceStatus'];?></td>
                      </tr>
                    </tbody>
					
					<? } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><a href="api/stylopay/user-kyc-request.php" title="KYC Request" type="button" class="btn btn-outline-success"> Stylopay IBAN Account KYC Request</a></th></tr>
						
						<tr>
                        <td class="w-100"><a href="api/stylopay/user-kyc-fri-details.php" title="KYC Request" type="button" class="btn btn-outline-success"> Stylopay IBAN Account KYC User RFI details</a></th>
                       
                      </tr>
					  <tr>
                        <td class="w-100"><a href="api/stylopay/user-kyc-details.php" title="KYC Request" type="button" class="btn btn-outline-success"> Stylopay IBAN Account KYC User KYC details</a></th>
                       
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

