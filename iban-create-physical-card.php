<?php
include "common.php";
include "controller/blade.iban-create-physical-card.php";
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

                

				<div class="row bg-success-subtle rounded mb-2 mx-0">

		  

              

              <div class="col-md-6 ">

                 <form  method="get">

                    <div class="input-group form-row  my-2">
                      <input type="text" class="form-control form-control-sm" placeholder="Search..." required="" name="value" autocomplete="off" value="" />
                      <select class="form-select form-select-sm" name="type">

                       <option value="cardid">CardID</option>
                      </select>

                       <div class="input-group-append">                                            

                          <button class="btn btn-sm btn-success" type="submit"><i class="<?=$data['fwicon']['search'];?>"></i></button>

                       </div>

                    </div>

                  </form>

              </div>
			  <div class="col-md-6 text-end">
			  <a href="api/stylopay/create-physical-card.php" title="Create Physical Card" type="button" class="btn btn-sm btn-success mt-2"><i class="fa-solid fa-circle-plus" title="Create Stylopay IBAN  Physical Card"></i></a>
			   </div>

			

            </div>

			

			    <?

			     if(isset($requrl)&&$requrl){  

				 $msg="Search Records Not Found"; 

				?>

				<div class="text-end my-2 px-1 "><a href="<?=$data['Host'];?>/iban-manage-beneficiary<?=$data['ex']?>" class="badge text-bg-primary" title="click to view all records">View All Records</a></div>

				<? } ?>

				

			    <? if($rows > 0){ ?>

                <div class="table-responsive">

                  <table class="table table-centered table-nowrap mb-0">
                    <thead  class="bg-success text-white">
                      <tr class="font-weight-bolder">
                        <th scope="col">CardID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Message</th>
                        <th scope="col">createdAt</th>
                        <th scope="col">Card Activation Status</th>
						<th scope="col">Set PIN Status</th>
                      </tr>
                    </thead>
                    <tbody>

<?php 
foreach($nquery as $key=>$tranlist) {
?>

                      <tr>

                        <td><?=$tranlist['cardid'];?> </td>

						<td><?=$tranlist['status'];?></td>

                        <td><?=$tranlist['message'];?></td>

                        <td><?=$tranlist['createdAt'];?></td>

                        <td>
						
						<? if(isset($tranlist['card_activation_status'])&&$tranlist['card_activation_status']==0){ ?>
						<a href="api/stylopay/card-activation.php?cid=<?=$tranlist['cardid']?>" title="Create Physical Card" type="button" class="btn btn-sm btn-outline-danger">Click for Active Card</i></a>
						<? }else{ ?><?=$tranlist['card_activation_status'];?> <? } ?>
						</td>
						
						<td>
						<? if(isset($tranlist['set_pin_status'])&&$tranlist['set_pin_status']!="SUCCESS"){ ?>
						<a data-bs-toggle="modal" data-bs-target="#setPin" title="Set PIN" type="button" class="btn btn-sm btn-outline-danger setPinc" data-title="<?=$tranlist['cardid']?>">Click for Set PIN</i></a>
						<? }else{ ?><?=$tranlist['set_pin_status'];?> <? } ?>
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

				 $msg="You do not create any card yet.";

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



<div class="modal fade" id="setPin" tabindex="-1" aria-labelledby="setPinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="setPinLabel">Set Pin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  <form method="post">
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Enter 4 Digit Pin:</label>
			<input type="hidden" name="cardid" id="cardid">
            <input type="number" class="form-control" name="cardpin" id="cardpin" title="Enter 4 Digit Pin" required>
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
$('.setPinc').on('click', function () {

var datatitle=$(this).attr('data-title');
$('#cardid').val(datatitle);

alert(datatitle);

});
</script>
</body>

</html>

