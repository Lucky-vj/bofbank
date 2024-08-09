<?php

include "common.php";

include "controller/blade.iban-account-statement.php";

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

              <h4 class="header-title"><i class="<?=$data['fwicon']['transaction'];?> fa-fw"></i> <?=$data['PageName'];?> <span class="">[<?=$rows;?>] <a href="api/stylopay/account-statement.php" class="btn btn-sm btn-success">Refresh</a></span></h4>

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

        

		  

		  <?php if(isset($_SESSION['msg'])){ ?>

		  <div class="alert alert-success alert-dismissible fade show" role="alert">

          <strong>Success!</strong> <?php echo $_SESSION['msg'];?>

           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

		  </div>

		

		  <?php unset($_SESSION['msg']); } ?>

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

				<div class="row  mb-2 mx-0">
                <?php include "common/trans_search_form.php";?>
			    <?

			     if(isset($requrl)&&$requrl){  

				 $msg="Search Records Not Found"; 

				?>

				<div class="text-end my-2 px-1 "><a href="<?=$data['Host'];?>/iban-account-statement<?=$data['ex']?>" class="badge text-bg-primary" title="click to view all records">View All Records</a></div>

				<? } ?>

				

			    <? if($rows > 0){ ?>

                <div class="table-responsive">

                  <table class="table table-centered table-nowrap mb-0">

                    <thead  class="bg-success text-white">

                      <tr class="font-weight-bolder">

                       

                        <th scope="col">TransID</th>

                        <th scope="col">Trans&nbsp;Amt</th>

                        <th scope="col">Balance&nbsp;Amt</th>

                        <th scope="col">Type</th>

                        <th scope="col">Mode</th>

                        <th scope="col">Description</th>

                        <th scope="col">Settlement&nbsp;Date</th>

                        

                      </tr>

                    </thead>

                    <tbody>

<?php 



foreach($nquery as $key=>$tranlist) {

?>

                      <tr>

                        

                        <td><a class="hrefmodal" data-tid="<?=$tranlist['transactionid'];?>" data-href="<?=$data['Host'];?>/transaction-details<?=$data['ex']?>?tid=<?=$tranlist['transactionid'];?>" title="<?=$tranlist['transactionid'];?>" >

                  <?=$tranlist['transactionid'];?></a></td>

                        <td><?=$tranlist['amount'];?></td>

						<td><?=$tranlist['balance'];?></td>

                        <td><?=$tranlist['type'];?></td>

                        <td><?=$tranlist['transactionMode'];?></td>

                        <td><?=$tranlist['description'];?></td>

                        <td><?=$tranlist['date'];?></td>

                        

                      </tr>

	<? } ?>

	<tr>

	<? if(isset($paginationCtrls)&&$paginationCtrls){ ?>

    <td colspan="9"><div id="pagination_controls"><?php echo $paginationCtrls; ?></div></td>

    <? } ?>

  </tr>

                    </tbody>

                  </table>

                </div>

				<? }else{ 

				 $msg="You do not have any transaction yet.";

				 if(isset($requrl)&&$requrl){  

				 $msg="Search Records Not Found"; 

				 }

				?>



				

			  <div class="alert alert-danger font-weight-bolder text-center" role="alert"><?=$msg;?></div>

			  <? } ?>

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

