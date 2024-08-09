<?php

include "common.php";
include "controller/blade.emails.php";

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="heading-ad"><i class="<?=$data['fwicon']['history'];?> fa-fw"></i>
              <?=$data['PageName'];?>
              <br>
            </h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Host-Home'];?>" title="Home">Home</a></li>
                <li class="breadcrumb-item active">
                  <?=$data['PageName'];?>
                </li>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
		        <?php  if(isset($_SESSION['msg'])&&$_SESSION['msg']){ ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
  				  <strong>Success! </strong> <?php echo $_SESSION['msg']; ?>
  				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>
				<?php unset($_SESSION['msg']); } ?>
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-4" > <span data-toggle="tooltip" data-placement="right"> <?=$data['PageName'];?> </span></h4>
              <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0">
                  <thead class="bg-success text-white">
                    <tr  class="font-weight-bolder">
                      <th style="width:60%">E-mail</th>
                      <th style="width:20%">&nbsp;</th>
					  <th style="width:10%">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody id="none">
<? foreach($data['emails'] as $ind=>$email) { ?>

                    <tr>
                      <td><?=encrypts_decrypts_emails($email['email'],2,true, array(5,$email['id']));?></td>
					  <td>		  
            <? if(!$email['active']){?>
            <a href="#" class="mx-2 btn btn-sm btn-outline-primary">Not Active<i class='<?=$data['fwicon']['primary'];?> text-warning' title='Not Active'></i></a>
            <? }elseif($email['primary']){ ?>
            <a href="#" class="mx-2 btn btn-sm btn-outline-primary">Primary<i class='<?=$data['fwicon']['primary'];?> text-success fw-bold fa-lg' title='Primary'></i></a>
            <? } else { ?>
            <a href="<?php echo $data['Host'];?>/emails<?=$data['ex']?>?choice=<?=($email['id'])?>&primbtn=1&uid=<?=$email['owner'];?>"  onclick="return confirm('Do you want to make this as your primary Email?');" class="mx-2 btn btn-sm btn-outline-primary ">Make Primary</a>
            <? } ?></td>
                      <td><a href="<?php echo $data['Host'];?>/emails<?=$data['ex']?>?choice=<?=($email['id'])?>&deletebtn=1&uid=<?=$email['owner'];?>"  onclick="return confirm('Do you want to delete this Email?');" title="Delete Email" class="mx-2"><i class="<?=$data['fwicon']['delete'];?> text-danger" aria-hidden="true"></i></a></td>
			
                    </tr>
<? } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <? include($data['Path'].'/footer'.$data['iex']);?>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
<!-- /Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script>
function ajaxf1(e,theUrl,theIds,active=true,pop='0'){
	var theUrl="<?=$data['Host'];?>/"+theUrl;
	//alert(theUrl);
	if(theIds&&theUrl){
		if($(e).hasClass('active_ajx')){
			
		} else {
		  $(e).addClass('active_ajx');
		  if(pop=='1'){popuploadig();}
		  else if(pop=='2'){loading_imgf($(theIds));}
		  $.ajax({url: theUrl,success: function(result){
			  if(pop=='3'){
				  $(e).html(result);
			  }else{
			  $(theIds).html(result);}
			   if(pop=='1'){popupclose();}
			  //$(theIds).slideDown(1200);
		   }});
		}
	}
	if(active){
		if($(e).hasClass('active')){
			$(e).removeClass('active');
			$(theIds).slideUp(300);
			$(theIds).parent().removeClass('active');			
		} else {
		  $(e).addClass('active');
		  $(theIds).slideDown(800);
		  $(theIds).parent().addClass('active');
		}
	}
}
</script>
</div>
</body></html>