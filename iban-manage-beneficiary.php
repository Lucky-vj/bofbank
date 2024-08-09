<?php

include "common.php";

include "controller/blade.iban-manage-beneficiary.php";

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

              <h4 class="header-title"><i class="<?=$data['fwicon']['transaction'];?> fa-fw"></i> <?=$data['PageName'];?> <span class="">[<?=$rows;?>]</span></h4>

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

               <div class="col-12 px-0 ">
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

                

				<div class="row bg-success-subtle rounded mb-2 mx-0">

		  

              

              <div class="col-md-6 ">

                 <form  method="get">

                    <div class="input-group form-row  my-2">
                      <input type="text" class="form-control form-control-sm" placeholder="Search..." required="" name="value" autocomplete="off" value="" />
                      <select class="form-select form-select-sm" name="type">

                       <option value="contactid">ContactID</option>
					   <option value="name">Name</option>
					   <option value="email">Email</option>
					   <option value="mobile">Mobile</option>
                      </select>

                       <div class="input-group-append">                                            

                          <button class="btn btn-sm btn-success" type="submit"><i class="<?=$data['fwicon']['search'];?>"></i></button><a class="hrefmodal btn btn-sm btn-success mx-2" data-tid="BeneficiaryList" data-href="<?=$data['Host'];?>/beneficieries-list<?=$data['ex']?>" title="Beneficieries List" >Refresh</a>

                       </div>

                    </div>

                  </form>

              </div>
			  <div class="col-md-6 text-end">
			  <a href="iban-add-beneficiary.php" title="Add Beneficiary" type="button" class="btn btn-sm btn-success mt-2"><i class="fa-solid fa-circle-plus" title="Add <?=$IBAN_issuer;?> IBAN  Beneficiary"></i></a>
			   </div>

			

            </div>

			

			    <?

			     if(isset($requrl)&&$requrl){  

				 $msg="Search Records Not Found"; 

				?>

				<div class="text-end my-2 px-1 "><a href="<?=$data['Host'];?>/iban-manage-beneficiary<?=$data['ex']?>" class="badge text-bg-success" title="click to view all records">View All Records</a></div>

				<? } ?>

				

			    <? if($rows > 0){ ?>

                <div class="table-responsive">

                  <table class="table table-centered table-nowrap mb-0">
                    <thead  class="bg-success text-white">
                      <tr class="font-weight-bolder">
                        <th scope="col">ContactID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

<?php 
foreach($nquery as $key=>$tranlist) {
?>

                      <tr>

                        <td><?=$tranlist['beneficiary_contactid'];?> </td>

						<td><?=$tranlist['beneficiary_name'];?></td>

                        <td><?=$tranlist['beneficiary_email'];?></td>

                        <td><?=$tranlist['beneficiary_mobile'];?></td>

                        <td><?=$tranlist['beneficiary_status'];?></td>
						
                        <td>
						<a href="api/<?=strtolower(str_replace(" ","-",$IBAN_issuer));?>/delete-beneficiary.php?cid=<?=$tranlist['beneficiary_contactid'];?>" title="Delete Beneficiary" type="button" class="btn btn-sm btn-outline-success" onclick="return confirm('Are you sure you would like to delete this Beneficiary ?');">Delete</i></a>&nbsp;<a data-bs-toggle="modal" data-bs-target="#accountNumber" title="accountNumber" type="button" class="btn btn-sm btn-outline-success accountNumberc" data-title="<?=$tranlist['beneficiary_contactid'];?>">Set Account</i></a>
						</td>

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

				 $msg="You do not have any Beneficiary yet.";

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

<div class="modal fade" id="accountNumber" tabindex="-1" aria-labelledby="accountNumberLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="accountNumberLabel">Set Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  <form method="post">
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Account Number (intrabank):</label>
			<input type="hidden" name="contactid" id="contactid">
            <input type="text" class="form-control" name="accountNumberc" id="accountNumberc" title="Enter Account Number" required>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="Submit" value="Submit" class="btn btn-primary">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
<script>
$('.accountNumberc').on('click', function () {

var datatitle=$(this).attr('data-title');
$('#contactid').val(datatitle);

//alert(datatitle);

});
</script>



</body>

</html>

