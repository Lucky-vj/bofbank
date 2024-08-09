<?php
include "../common.php";
include "controller/blade.iban-issuer.php";
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
            <!-- <h4 class="heading-ad">Manage IBAN Issuer </h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">IBAN Issuer</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="row mb-4">
        <div class="col-xl-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <?php if(isset($_SESSION['msgok'])){ ?>
					
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                  <?php unset($_SESSION['msgok']); } ?>
                </div>
              </div>
			  
	<?php if((isset($_GET['action'])=='edit') or (isset($_GET['action'])=='add')){ ?> 
	
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="text-logo"> <?=ucwords($action);?> IBAN Issuer</h4>
                      <form method="post" >
                      <input type="hidden" name="bid" value="<? if(isset($_GET['bid'])&&$_GET['bid']){ echo $_GET['bid'];} ?>">
                        <!--class="needs-validation" novalidate-->
                        <div class="row">
						
					      <div class="col-md-4 my-2">
                            <div class="form-floating">
                            <input type="text" name="IBAN_issuer" id="IBAN_issuer" class="form-control" placeholder="IBAN_issuer" value="<?php echo $IBAN_issuer ?>" title="IBAN_issuer" required>
							<label for="IBAN_issuer">IBAN Issuer</label>
							</div>
                          </div>
						  
						  <div class="col-md-4 my-2">
                            <div class="form-floating">
                            <select name="IBAN_status" class="form-select form-select-sm" required>
                            <option value="Test" <? if($IBAN_status=='Test'){ ?> selected="selected" <? } ?>>Test</option>
                            <option value="Live" <? if($IBAN_status=='Live'){ ?> selected="selected" <? } ?>>Live</option>
                            </select>
							<label for="IBAN_issuer">IBAN Status</label>
							</div>
                          </div>
						  
						  <div class="col-md-4 my-2">
                    <div class="form-floating">
                      <select class="form-select" name="IBAN_currency" id="IBAN_currency" title="Currency" required >
                        <option value="" selected="selected">Select</option>
                        <?php 
						  foreach($currency_list as $crlist){ ?>
                        <option value="<?=$crlist['currency_code'];?>"><?=$crlist['currency_code'];?> - <?=ucwords($crlist['currency_name']);?></option>
                        <? } ?>
                      </select>
<? if(isset($IBAN_currency)) {  ?>
<script>$('#IBAN_currency option[value="<?=$IBAN_currency?>"]').prop('selected','selected');</script>
<? } ?>
                      <label for="currency">Currency</label>
                    </div>
                  </div>
						  
						  <div class="col-md-6 my-2">
                            <div class="form-floating">
                          <select name="IBAN_kyc_provider" id="IBAN_kyc_provider" class="form-select" required>
                          <option  value="" selected="selected">Select</option>
                          <?php 
						   $cirr_get_value=get_select_list("tbl_kyc_provider","`ID`,`KYC_provider`","");
						  foreach($cirr_get_value as $currv){ ?>
                          <option value="<?=$currv['ID'];?>"><?=$currv['KYC_provider'];?></option>
                          <? } ?>
                          </select>
							<label for="IBAN_kyc_provider">Select KYC Provider</label>
<? if(isset($IBAN_kyc_provider)){?>
<script>$('#IBAN_kyc_provider option[value="<?=$IBAN_kyc_provider?>"]').prop('selected','selected');</script>
<? } ?>
							</div>
                          </div>
						  
						  
						  <div class="col-md-6 my-2">
                            <div class="form-floating">
                            <input type="text" name="IBAN_account_format" id="IBAN_account_format" class="form-control" placeholder="IBAN Account No format" value="<?php echo $IBAN_account_format ?>" title="IBAN Account No format" required>
							<label for="IBAN_account_format">IBAN Account No format</label>
							</div>
                          </div>
						  


                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" name="btn_submit" value="<?=ucwords($action);?>"><i class="<?=$data['fwicon']['tick-circle'];?>"></i> Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
	<? } ?>		  
			  
<?php
$rows = db_rows("SELECT * FROM `tbl_iban_issuer` where 1 AND `ID`<>3  ORDER BY `Status` ASC LIMIT 0,10");
?>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body row">
                      <div class="col-lg-8">
                        <h4 class="text-logo">Added IBAN Issuer </h4>
                      </div>
                      <div class="col-lg-4 text-end"><?php /*?><a name="Add" href="iban-issuer<?=$data['ex'];?>?action=add" value="Add A New IBAN Issuer!" title="Add A New IBAN Issuer" class="btn btn-sm btn-primary"><i class="<?=$data['fwicon']['circle-plus'];?>"></i></a><?php */?></div>
                      <?php if($db_counts > 0) { ?>
                      <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col"><strong>IBAN Issuer</strong></th>
                              <th scope="col"><strong>KYC Provider</strong></th>
							  <th scope="col">A/ No. Format</th>
							  <th scope="col">Currency</th>
							  <th scope="col">Is Default</th>
							  <th scope="col"><strong>Status</strong></th>
                              <?php /*?><th scope="col"><strong>Action</strong></th><?php */?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
$i=1;
foreach($rows as $key=>$result) {
?>
                            <tr>
                              <td><?=$i;?></td>
							  <td><?=$result['IBAN_issuer']?></td>
                              <td><?=get_kyc_name_by_id($result['IBAN_kyc_provider'])?></td>
							  <td><?=$result['IBAN_account_format']?></td>
							  <td><?=$result['IBAN_currency']?></td>
							  <td class="radio-tab"><input class="form-check-input make-default" type="radio" name="IBAN_isdefault" id="IBAN_isdefault" data-tid="<?=$result['ID']?>" <? if($result['IBAN_isdefault']==1){ ?> checked="checked" <? } ?>></td>
							  <td><?=$data['status'][$result['Status']]?></td>
                              <?php /*?><td>
<a href="<?=$data['Admins'];?>/iban-issuer<?=$data['ex'];?>?bid=<?=$result['ID']?>&action=edit"><i class="<?=$data['fwicon']['edit'];?> mx-1" title="Edit"></i></a> <?php */?>
<?php /*?><?php if($result['Status']==1){ ?>
<a href="<?=$data['Admins'];?>/iban-issuer<?=$data['ex'];?>?bid=<?=$result['ID']?>&action=delete&key=0" onClick="return confirm('Are you Sure to Delete');" title="Delete IBAN Issuer"><i class="<?=$data['fwicon']['delete'];?> text-danger mx-1"></i></a>
<? }else{ ?>
<a href="<?=$data['Admins'];?>/iban-issuer<?=$data['ex'];?>?bid=<?=$result['ID']?>&action=delete&key=1" onClick="return confirm('Are you Sure to Active');" title="Active IBAN Issuer"><i class="<?=$data['fwicon']['check'];?> text-success  mx-1"></i></a>
<? } ?><?php */?>

<? if(isset($result['json_log_history'])&&$result['json_log_history']){?>
			<?php /*?><i class="<?=$data['fwicon']['circle-info'];?> text-info fa-fw" 
			onclick="popup_openv('<?=$data['Host']?>/common/json_log<?=$data['ex']?>?tableid=<?=$result['ID']?>&tablename=iban_issuer&tablefieldidname=ID')" title="View Json History"></i><?php */?>
			<? } ?></td>
                            </tr>
<?php
 $i++; }
?>
                          </tbody>
                        </table>
                      </div>
                      <?php } else { ?>
                      <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> IBAN Issuer Not Added. </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php include "footer".$data['ex']; ?>
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

  </body>
    <script>
  $('.make-default').on('click', function () {
  var datatid=$(this).attr('data-tid');
  var urls="?act=upd&datatid="+ datatid;
  //alert(urls);
  window.location.href=urls;
  
  });
  </script>
 </html>