<?php

include "common.php";

include "controller/blade.cards.php";

//echo $_SESSION['members']['email'];
//echo $_SESSION['domain_server']['host_full_name'];


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

		<h4>Coming soon</h4>

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

$(function() {

    $("#submit99").click(function() {     

      if($('input[type=radio][name=bankid]:checked').length == 0)

      {

         alert("Please select atleast one Bank");

         return false;

      }

      else

      {

          //alert("radio button selected value: ");

      }      

    });

});

</script>

</body>

</html>

