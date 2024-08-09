<?php
include "common.php";
include "controller/blade.fund-transfer.php";
?>
  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content" >
    <div class="page-content">
	<div class="container-fluid">
        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
              <h4><i class="<?=$data['fwicon']['arrow-right-arrow-left'];?> fa-fw"></i> Transfers<br>
              </h4>
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?=$data['Host-Home'];?>" title="Home">Home</a></li>
                  <li class="breadcrumb-item active">Transfers
                  </li>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
      <div class="container-fluid">
	  <?php if(isset($_SESSION['msg'])){ ?>
		  <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success!</strong> <?php echo $_SESSION['msg'];?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		
		  <?php unset($_SESSION['msg']); } ?>
		  
<div class="p-4 my-4 bg-success text-white rounded">
<div class="float-end mb-2"><a href="create-payment-request.php" title="Request Money" class="text-light"><strong>Request Money</strong>&nbsp;&nbsp;<i class="fa-solid fa-arrow-right-long"></i></a></div><br />

</div>
        <div class="row">
          <div class="col-lg-12">
		  
		  
										
										
            <div class="card33">
              <div class="card-body33">
			  <div class="row">
				      <div class="col-lg-12">
                        <h4 class="header-title mb-4 text-center">Select your transfer type</h4>
                      </div>
                      
				</div>	
				<div class="row">  

					

<div class="col-sm-6">

<div class="card text-center p-2 bg-body-secondary">
<div class="w-100 "><i class="fa-solid fa-piggy-bank fa-fw fa-4x my-4 text-primary" title="Bank"></i></div>
<h4>Internal BOF Transfer</h4>
<p>Pay via bank transfer</p>
<a class="btn btn-outline-primary" href="create-internal-transfer.php">Internal Fund Transfer</a>
</div>
            
			
        </div>

<div class="col-sm-6">

<div class="card text-center p-2 bg-body-secondary">
<div class="w-100 "><i class="<?=$data['fwicon']['bank'];?> fa-fw fa-4x my-4 text-primary" title="Bank"></i></div>
<h4>International Transfer</h4>
<p>Pay via bank transfer</p>
<a class="btn btn-outline-primary" href="create-external-transfer.php">External Fund Transfer</a>
</div>
           
			
        </div>
		

</div>


 </div>
              </div>
            </div>
			<? include($data['Path'].'/footer'.$data['iex']);?>
          </div>
        </div>
		

      </div>
    </div>
	
	
  </div>
  <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<!-- Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


</body>
</html>
