<?php
include "../common.php";
include "controller/blade.add-member.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content admin">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad">Add New Member</h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">Add New Member</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="row my-2">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-7">
              <div class="btn-toolbar" role="toolbar"> </div>
            </div>
            <div class="col-md-5">
              <div class="btn-toolbar justify-content-md-end" role="toolbar">
                <div class="btn-group ml-md-2 mb-3"> </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <?php  if(isset($_SESSION['msg'])&&$_SESSION['msg']){ ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Duplicate ! </strong>
                <?=$_SESSION['msg'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php unset($_SESSION['msg']); } ?>
              <div class="card">
                <div class="card-body">
                  <form method="post" name="reg_form" >
                    <!--class="needs-validation" novalidate-->
                    <div class="row">
                      <div class="col-md-6 my-2">
                        <div class="form-floating">
                          <input type="text" name="txt_fname" id="txt_fname" class="form-control" placeholder="Enter First Name" required>
                          <!-- <label for="adminId">Enter First Name</label> -->
                        </div>
                      </div>
                      <div class="col-md-6  my-2">
                        <div class="form-floating ">
                          <input type="text" name="txt_lname" id="txt_lname" class="form-control" placeholder="Enter Last Name" value="" required>
                          <!-- <label for="txt_lname">Enter Last Name</label> -->
                        </div>
                      </div>
                      <div class="col-md-6  my-2">
                        <div class="form-floating">
                          <input type="email" name="txt_username" class="form-control" id="username" placeholder="Enter User Name" autocomplete="false" onBlur="checkAvailability()" required>
                          <!-- <label for="username">Enter Email ID <span id="user-availability-status"></span> </label> -->
                        </div>
						<span class="text-danger dmessage"></span>
                      </div>
                      
                      
                      
                      
                      
                      <div class="col-md-6  my-2">
                        <div class="form-floating">
                          <select name="txt_country" id="txt_country" class="form-select"  title="Select Country" required>
                             <option value="" selected="selected">Select Country</option>
                                         <?php 
						                 foreach($country_list as $clist){ ?>
                          <option value="<?=$clist['country'];?>"><?=$clist['country'];?></option>
                          <? } ?>
                        </select>
  <!-- <label for="txt_country">Country of Residence</label> -->
                        </div>
                      </div>
                      
                    </div>
                    
                    <button type="submit" class="btn btn-sm btn-primary my-2 login_account" name="btn_admin" value="Submit"><i class="<?=$data['fwicon']['circle-plus'];?>"></i> Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<script>
$('.login_account').on('click', function () {


if($('#txt_fname').val()==""){
alert("Please Enter First Name");
return;
}else if($('#txt_lname').val()==""){
alert("Please Enter Last Name");
return;
}else if($('#username').val()==""){
alert("Please Enter User Name");
return;
}else if($('#txt_email').val()==""){
alert("Please Enter Email Address");
return;
}else if($('#txt_country').val()==""){
alert("Please Select Country of Residence");
return;
}else{

}

		
$(".login_account").html("<i class='<?=$data['fwicon']['spinner']?> fa-spin-pulse'></i>");
});




</script>
<script>
function checkAvailability() {
var uname=$("#username").val();
if(uname==""){
return false;
}

//alert(222);
		

jQuery.ajax({
url: "../common/check-username-availability",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
//alert(data);
if(data==1){
var displaydata="<span class='status-not-available text-danger mx-2' title='Username not available'> <i class='<?=$data['fwicon']['check-cross'];?> fa-fw my-1'></i></span>";
$("#user-availability-status").html(displaydata);
$(".dmessage").html("Email "+ uname +" id already exist");
$('#username').val("");

}else{
var displaydata="<span class='status-available text-success mx-2' title='Username available'> <i class='<?=$data['fwicon']['tick-circle'];?> fa-fw my-1'></i></span>";
$("#user-availability-status").html(displaydata);
$('.dmessage').html("");
}

//$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body></html>