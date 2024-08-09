<?php

include "common.php";

include "controller/blade.beneficieries-list.php";

?>

  <!-- ============================================================== -->

  <!-- Start right Content here -->

  <!-- ============================================================== -->
<style>
#myModal12{ margin-top: 100px !important;}
</style>


  <div class="container">
		

          <div class="row">

  


                  

                  <div class="col-sm-12 col-xl-12 mt-2">



                         <div class="table-responsive">

                  <table class="table table-centered table-nowrap mb-0">
                    <thead  class="bg-primary text-white">
                      <tr class="font-weight-bolder">
                        <th scope="col">ContactID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        
                      </tr>
                    </thead>
                    <tbody>

<?php 
foreach($dtatalist as $key=>$bene) {
?>

                      <tr>

                        <td><?=$bene['contactid'];?> </td>

						<td><?=$bene['name'];?></td>

                        <td><?=$bene['mobile'];?></td>

                        <td><?=$bene['email'];?></td>


                      </tr>

	<? } ?>

	<tr>



  </tr>

                    </tbody>

                  </table>

                </div>





                        
				  


          </div>

		 <? // } ?>

        </div>

      

</div>

<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->

<div class="rightbar-overlay"></div>



</body>

</html>

