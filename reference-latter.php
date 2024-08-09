<?php
include "common.php";
include "controller/blade.reference-latter.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content reference-page">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row-flex">
        <div class="row">
          <div class="col-md-6">
            <!-- <h4 class="pt-2"><i class="<?=$data['fwicon']['letter'];?> fa-fw"></i><?=$data['PageName'];?>[ <?=$bank_name;?> ] </h4> -->
          </div>
          <div class="col-md-6 row mx-0">
            <div class="col-md-9">
                <? if($_SESSION['default_IBAN_issuer']!=3){ ?>
                  <div class="form-floating inner_page_input">
                  <i class="fa-solid fa-angle-down"></i>
                  <select class="dynamic_select form-select form-select-sm my-2" title="Assign Common Bank" required >
                          <?php 

                            $sellist=db_rows("SELECT * FROM tbl_common_bank_account WHERE bank_status='Active' and bank_id in ($fbid) order by bank_name",1);

                            foreach($sellist as $key=>$rslist) {

                            ?>
                          <option value="?bid=<?=$rslist['bank_id'];?>" <?php if($rslist['bank_id']==$rsbid){ ?> selected="selected" <? } ?> >
                          <?=$rslist['bank_name'];?>
                          -
                          <?=$rslist['bank_account_number'];?>
                          -
                          <?=$rslist['bank_supported_currency'];?>
                          -
                          <?=$rslist['bank_address'];?>
                          </option>
                          <? } ?>
                        </select>
                  </div>
              
              <? } else{ ?>
              
              <? } ?>
            </div>
            <div  iv class="col-md-3 px-0"> 
              <!-- <a class="btn btn-sm w-100 my-2 download" href="<?=$data['Host'];?>/mypdf/referance-letter-pdf<?=$data['ex']?>?bid=<?=$rsbid;?>" title="Download Reference Latter - <?=$bank_name;?>" target="_blank" download>Download <i class="<?=$data['fwicon']['download'];?> fa-fw"></i></a> -->
          <a href="<?= $data['Host']; ?>/mypdf/referance-letter-pdf<?= $data['ex'] ?>?bid=<?= $rsbid; ?>" class="download download-div"><img src="../images/download.svg" alt="download"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-12">
        <div class="card p-2">
          <?php 

				$logo_path=$data['Host']."/images/logo2.png";

				//$logo_path=$data['reference_latter_logo']; // Define on common

				//$bootstrap_path=$data['Host']."/common/css/bootstrap.min.css";

				$bootstrap_path="";

				$message=str_replace("###bootstrap###",$bootstrap_path,$message);

				$message=str_replace("###logo###",$logo_path,$message);

				echo $message;

				

				?>
        </div>
        <? include($data['Path'].'/footer'.$data['iex']);?>
        <? include($data['Path'].'/company-detail-popup'.$data['iex']);?>
      </div>
    </div>
  </div>
  <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<script>

    $(function(){

      // bind change event to select

      $('.dynamic_select').on('change', function () {

	  

          var url = $(this).val(); // get selected value

          if (url) { // require a URL

              window.location = url; // redirect

          }

          return false;

      });

    });

</script>
</body></html>