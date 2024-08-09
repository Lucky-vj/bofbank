<?php
include "common.php";
include "controller/blade.iban-create-account.php";
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
				
				<h4 class="header-title ">Create Account</h4>
				
				<div class="table-responsive">

                  <table class="table table-striped">
				  <?php if(isset($iban['accountid'])&&$iban['accountid']){ ?>
                    <tbody>
					  <tr >
                        <td class="w-50">Account ID</th>
                        <td class="w-50">: <?=$iban['accountid'];?></td>
                      </tr>
					  <tr >
                        <td >Status</th>
                        <td >: <?=$iban['accountStatus'];?></td>
                      </tr>
                    </tbody>
					
					<? } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><a href="api/stylopay/create-account.php" title="Create Account" type="button" class="btn btn-outline-success">Create Stylopay IBAN  Account</a></th>
                       
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

