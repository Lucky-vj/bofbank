<?php

include "common.php";

include "controller/blade.iban-user-details.php";

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

            <div class="col-12 px-0 ">
			
			   <?php  if(isset($_SESSION['ses_pg_msg'])&&$_SESSION['ses_pg_msg']){ ?>
                  <div class="alert alert-info alert-dismissible fade show my-2" role="alert">
  				  <strong><?=$_SESSION['ses_pg_msg'];?></strong>
  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>
                  </div>
				<?php unset($_SESSION['ses_pg_msg']); 
				}?>	
				
				<div class="loader text-center"></div>			

										

            <div class="card">

              <div class="card-body">
               <h4 class="header-title ">User Details </h4>

                <div class="table-responsive">

                  <table class="table table-striped">
                    <?php if(isset($usr['id'])&&$usr['id']){ $i=1; ?>
	
                    <tbody>
<tr><td class="w-50">Title [Mr/Mrs/Ms]</th><td class="w-50 " data-title="title" data-value="<?=$usr['title'];?>" title="Click Update Title"><span class="title"><?=$usr['title'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="title" data-value="<?=$usr['title'];?>"></i></span></td></tr>   
                   

<tr><td class="w-50">First Name</th><td class="w-50 " data-title="firstName" data-value="<?=$usr['firstName'];?>" title="Click Update First Name"><span class="firstName"><?=$usr['firstName'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="firstName" data-value="<?=$usr['firstName'];?>"></i></span></td></tr> 

<tr><td class="w-50">Last Name</th><td class="w-50 " data-title="lastName" data-value="<?=$usr['lastName'];?>" title="Click Update Last Name"><span class="lastName"><?=$usr['lastName'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="lastName" data-value="<?=$usr['lastName'];?>"></i></span></td></tr>


<tr><td class="w-50">Country Code</th><td class="w-50 " data-title="mobileCountryCode" data-value="<?=$usr['mobileCountryCode'];?>" title="Click Update Country Code"><span class="mobileCountryCode"><?=$usr['mobileCountryCode'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="mobileCountryCode" data-value="<?=$usr['mobileCountryCode'];?>"></i></span></td></tr>

<tr><td class="w-50">Phone / Mobile</th><td class="w-50 " data-title="mobile" data-value="<?=$usr['mobile'];?>" title="Click Update Phone / Mobile"><span class="mobile"><?=$usr['mobile'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="mobile" data-value="<?=$usr['mobile'];?>"></i></span></td></tr>


<tr><td class="w-50">Email</th><td class="w-50 " data-title="email" data-value="<?=$usr['email'];?>" title="Click Update Email"><span class="email"><?=$usr['email'];?></span></td></tr>


<tr><td class="w-50">Gender [M/F/O]</th><td class="w-50 " data-title="gender" data-value="<?=$usr['gender'];?>" title="Click Update Gender [M/F/O]"><span class="gender"><?=$usr['gender'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="gender" data-value="<?=$usr['gender'];?>"></i></span></td></tr>


<tr><td class="w-50">DOB [YYYY-MM-DD]</th><td class="w-50 " data-title="dateOfBirth" data-value="<?=$usr['dateOfBirth'];?>" title="Click Update DOB [YYYY-MM-DD]"><span class="dateOfBirth"><?=$usr['dateOfBirth'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="dateOfBirth" data-value="<?=$usr['dateOfBirth'];?>"></i></span></td></tr>


<tr><td class="w-50">Nationality</th><td class="w-50 " data-title="nationality" data-value="<?=$usr['nationality'];?>" title="Click Update Nationality"><span class="nationality"><?=$usr['nationality'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="nationality" data-value="<?=$usr['nationality'];?>"></i></span></td></tr>


<tr><td class="w-50">Address1</th><td class="w-50 " data-title="deliveryAddress1" data-value="<?=$usr['deliveryAddress1'];?>" title="Click Update Address1"><span class="deliveryAddress1"><?=$usr['deliveryAddress1'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="deliveryAddress1" data-value="<?=$usr['deliveryAddress1'];?>"></i></span></td></tr>

<tr><td class="w-50">Address2</th><td class="w-50 " data-title="deliveryAddress2" data-value="<?=$usr['deliveryAddress2'];?>" title="Click Update Address2"><span class="deliveryAddress2"><?=$usr['deliveryAddress2'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="deliveryAddress2" data-value="<?=$usr['deliveryAddress2'];?>"></i></span></td></tr>


<tr><td class="w-50">City</th><td class="w-50 " data-title="deliveryCity" data-value="<?=$usr['deliveryCity'];?>" title="Click Update City"><span class="deliveryCity"><?=$usr['deliveryCity'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="deliveryCity" data-value="<?=$usr['deliveryCity'];?>"></i></span></td></tr>

<tr><td class="w-50">State</th><td class="w-50 " data-title="deliveryState" data-value="<?=$usr['deliveryState'];?>" title="Click Update State"><span class="deliveryState"><?=$usr['deliveryState'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="deliveryState" data-value="<?=$usr['deliveryState'];?>"></i></span></td></tr>

<tr><td class="w-50">Country</th><td class="w-50 " data-title="deliveryCountry" data-value="<?=$usr['deliveryCountry'];?>" title="Click Update Country"><span class="deliveryCountry"><?=$usr['deliveryCountry'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="deliveryCountry" data-value="<?=$usr['deliveryCountry'];?>"></i></span></td></tr>

<tr><td class="w-50">ZipCode</th><td class="w-50 " data-title="deliveryZipCode" data-value="<?=$usr['deliveryZipCode'];?>" title="Click Update ZipCode"><span class="deliveryZipCode"><?=$usr['deliveryZipCode'];?><i class="fa-solid fa-pencil mx-2 float-end edit-details" data-title="deliveryZipCode" data-value="<?=$usr['deliveryZipCode'];?>"></i></span></td></tr>


<tr><td>id</th><td><span id="uid"><?=$usr['id'];?></span>
</td></tr>
<tr><td>Status</th><td><?=$usr['status'];?></td></tr>
</tbody>
					<? $i++; } else {?>
					<tbody>
                      <tr>
                        <td class="w-100"><?=$response;?></th>
                       
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
<script>

$('.edit-details').on('click', function () {

var datatitle=$(this).attr('data-title');
var datavals=$(this).attr('data-value');
$(this).removeClass("edit-details");
$("." + datatitle).html('<input type="text" name="' + datatitle + '" class="form-control float-start w-75" value="' + datavals + '" id="' + datatitle + '" ><i class="fa-solid fa-circle-plus text-success fa-2x p-2 float-end submitdata" data-vkg="' + datatitle + '" onclick="myFunction(&quot;' + datatitle + '&quot;)" ></i>');

});




function myFunction(datatitle) {
var datavkg=$(this).attr('data-vkg');
//alert(datatitle);
var dataval=$("#"+datatitle).val();
//alert(dataval);
var uid=$('#uid').html();
//alert(uid);
var ddd='uid='+uid+'&datatitle='+datatitle+'&dataval='+dataval;
//alert(ddd);
$(".loader").html("<i class='<?=$data['fwicon']['spinner']?> fa-spin-pulse fa-4x'></i>");



$.ajax({

	url: "<?=$data['Host'];?>/api/stylopay/update-user",
	data:'uid='+uid+'&datatitle='+datatitle+'&dataval='+dataval,
	type: "POST",
	success:function(data){
	 //alert(data);

	  if(data==1){

	  //alert("Data Update Sucessfully");
	  location.reload(true);

	  }else{

	  alert(data);

	  }

	},

	error:function (){}

	});
	
}
</script>



</body>

</html>

