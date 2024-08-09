<?php
include "../common.php";
include "controller/blade.iban-assign.php";
?>
<style>

 .trans.page-content { padding: calc(0px + 24px) calc(24px / 2) 0px calc(24px / 2) !important;}

 .trans.main-content  { margin-left: 0px !important;} 

  body[data-layout=horizontal] .trans.page-content {

    margin-top: 0px !important;

    padding: calc(0px + 0px) calc(0px / 2) 0px calc(0px / 2) !important;

  }  



 

 </style>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="trans main-content admin">
  <div class="trans page-content">
    <div class="container-fluid">
      <?php if($_GET['admin_view']<>'1'){ ?>
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad">Assign IBAN Issuer - Account Number : <?php echo $Client_ID; ?></h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">Assign IBAN Issuer</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <?php } ?>
      <div class="row mb-4">
        <div class="col-xl-12">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 py-2">
                  <?php if(isset($_SESSION['msgok'])){ ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['msgok']); } ?>
                  <?php if(isset($_SESSION['msgfail'])){ ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Fail!</strong> <?php echo $_SESSION['msgfail']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['msgfail']); } ?>
                </div>
              </div>
              <?php if(($action=='edit') or ($action=='add')){ ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="header-title"><?=ucwords($action);?> IBAN Issuer</h4>
                        
                        
                      <form method="post" >
                        <input type="hidden" name="account_id" value="<?php echo $Client_ID;?>">
                        <input type="hidden" name="bid" value="<?php echo $bid;?>">
                        <!--class="needs-validation" novalidate-->
                        <div class="row">
                          <div class="col-md-3 my-2">
<select name="iban_issuer" id="iban_issuer" class="form-select form-select-sm" title="Assign IBAN Issuer" required >
<option value="">Assign IBAN Issuer</option>
<?php 
$sellist=db_rows("SELECT * FROM `tbl_iban_issuer` WHERE `Status`=1 AND `ID`<>3  ORDER BY `IBAN_issuer`");
foreach($sellist as $key=>$rslist) {
?>
<option value="<?=$rslist['ID'];?>||<?=$rslist['IBAN_currency'];?>" <?php if($rslist['ID']==$iban_issuer){ ?> selected="selected"<? } ?>>
<?=$rslist['IBAN_issuer'];?> [<?=$rslist['IBAN_currency'];?>]
</option>
<? } ?>
</select>
                          </div>
                          <div class="col-md-2 my-2">
                            <button type="submit" class="btn btn-sm btn-primary" name="btn_add" value="<?=ucwords($action);?>"><i class="<?=$data['fwicon']['circle-plus'];?>"></i> Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <? } ?>
<?php
$rows = db_rows("select * from tbl_iban_issuer_account_details where client_id='$Client_ID'  order by ID desc");

?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body row my-2">
                      <div class="col-md-8">
                        <h4 class="header-title  my-2">Added IBAN Issuer </h4>
                      </div>
                      <div class="col-md-4 text-end"><a name="Add" href="iban-assign<?=$data['ex'];?>?client_id=<?php echo $Client_ID; ?>&action=add&admin_view=1" value="Add A New Bank!" title="Add A New Bank" class="btn btn-sm btn-primary my-2"><i class="<?=$data['fwicon']['circle-plus'];?>"></i></a></div>
                      <?php if($db_counts > 0) { ?>
                      <div class="table-responsive">
                        <table class="table table-centered">
                          <thead>
                            <tr>
							  <th scope="col"><strong>IBAN Issuer</strong></th>
                              <th scope="col"><strong>accountName</strong></th>
                              <th scope="col"><strong>accountid</strong></th>
                              <th scope="col"><strong>accountNumber</strong></th>
                              <th scope="col"><strong>BankName</strong></th>
                              <th scope="col"><strong>currency</strong></th>
                              <th scope="col"><strong>Is Default</strong></th>
                              <th scope="col"><strong>createdAt</strong></th>
							  <th scope="col"><strong>Status</strong></th>
                            </tr>
                          </thead>
                          <tbody>
<?php 
$i=1;
foreach($rows as $key=>$result) {
$common_bank_id=$result['assign_bank'];
?>
                            <tr>
							  <td><?=$data['IBAN_Type'][$result['IBAN_issuer']]?></td>
                              <td><?=$result['accountName']?></td>
                              <td><?=$result['accountid']?></td>
                              <td><?=$result['accountNumber']?></td>
                              <td><?=$result['sponsorBankName']?></td>
                              <td><?=$result['currency']?></td>
                              <td class="radio-tab"><input class="form-check-input make-default" type="radio" name="IBAN_isdefault" id="IBAN_isdefault" data-tid="<?=$result['ID']?>" data-cid="<?=$result['client_id']?>" <? if($result['IBAN_isdefault']==1){ ?> checked="checked" <? } ?>></td>
                              <td><?=prndate($result['createdAt'])?></td>
							  <td><?=$data['ibanstatus'][$result['Status']]?></td>
                            </tr>
                            <?php

  }

?>
                          </tbody>
                        </table>
                      </div>
                      <?php } else { ?>
                      <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> Bank Not Added. </div>
                      <?php } ?>
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
  <!-- end main content-->
</div>
</div>
<script>
  $('.make-default').on('click', function () {
  var datatid=$(this).attr('data-tid');
  var datacid=$(this).attr('data-cid');
  var urls="?act=upd&datatid="+ datatid +"&client_id="+ datacid;
  //alert(urls);
  window.location.href=urls;
  
  });
  </script>
</body></html>