<?php
include "../common.php";
include "controller/blade.iban-user-accoun-details.php";
if (isset($_REQUEST['otype']) && $_REQUEST['otype'] == "DESC") {
  $otype = "ASC";
} else {
  $otype = "DESC";
}
if (isset($_REQUEST['pn']) && $_REQUEST['pn']) {
  $pn = $_REQUEST['pn'];
} else {
  $pn = 1;
}
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
            <!-- <h4 class="heading-ad">IBAN User Account </h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg></li>
                <li class="breadcrumb-item active">IBAN User Account</li>
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
                  <?php if (isset($_SESSION['msgok'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php unset($_SESSION['msgok']);
                  } ?>
                </div>
              </div>
              <?php if ((isset($_GET['action']) && $_GET['action'] == 'edit') or (isset($_GET['action']) && $_GET['action'] == 'add')) {
                if ($accountName == "") {
                  $full_name = member_details($_GET['cid'], "full_name");
                  $accountName = $full_name['full_name'];
                }
              ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="text-logo">
                          <?= ucwords($action); ?>
                          IBAN User Account</h4>
                        <form method="post">
                          <input type="hidden" name="bid" value="<? if (isset($_GET['bid']) && $_GET['bid']) {
                                                                    echo $_GET['bid'];
                                                                  } ?>">
                          <input type="hidden" name="cid" value="<? if (isset($_GET['cid']) && $_GET['cid']) {
                                                                    echo $_GET['cid'];
                                                                  } ?>">
                          <!--class="needs-validation" novalidate-->
                          <div class="row">
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="accountName" id="accountName" class="form-control" placeholder="accountName" value="<?php echo $accountName ?>" title="Account Name" required>
                                <label for="accountName">Account Name</label>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="accountid" id="accountid" class="form-control" placeholder="accountid" value="<?php echo $accountid ?>" title="accountid" required>
                                <label for="accountid">Account ID</label>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="accountNumber" id="accountNumber" class="form-control" title="accountNumber" placeholder="accountNumber" value="<?php echo $accountNumber ?>">
                                <label for="accountNumber">IBAN Account Number</label>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="sponsorBankName" id="sponsorBankName" class="form-control" title="sponsorBankName" placeholder="sponsorBankName" value="<?php echo $sponsorBankName ?>">
                                <label for="sponsorBankName">Bank Name</label>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="bankCode" id="bankCode" class="form-control" title="bankCode" placeholder="bankCode" value="<?php echo $bankCode ?>">
                                <label for="bankCode">Bank Code</label>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="holderName" id="holderName" class="form-control" title="holderName" placeholder="holderName" value="<?php echo $holderName ?>">
                                <label for="holderName">Holder Name</label>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <input type="text" name="country" id="country" class="form-control" title="country" placeholder="country" value="<?php echo $country ?>">
                                <label for="country">Country</label>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary" name="btn_submit" value="<?= ucwords($action); ?>"><i class="<?= $data['fwicon']['tick-circle']; ?>"></i> Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <? } ?>


              <div class="px-0">
                <div class="bg-light border rounded mb-2 row mx-0">
                  <form>
                    <div class="row search_form_css  my-2">
                      <input type="hidden" name="action" value="select">
                      <div class="col-sm-4">
                        <input type="text" name="searchkey" class="searchkey_adv form-control form-control-sm bg-transparent" placeholder="Search..">
                      </div>
                      <div class="col-sm-2">
                        <i class="fa-solid fa-angle-down"></i>
                        <select name="key_name" id="searchkeyname" title="Select key name" class="filter_option s_key_name form-select form-select-sm bg-transparent" autocomplete="off">
                          <option value="" selected="selected">Select</option>
                          <option value="accountid" data-placeholder="TransID" title="TransID">Account ID</option>
                          <option value="accountName" data-holder="Bill Amount" title="Bill Amount">Account Name</option>
                        </select>
                      </div>
                      <div class="col-sm-2 px-1">
                        <i class="fa-solid fa-angle-down"></i>
                        <select name="iban" id="iban" class="select_cs_2 cole form-select form-select-sm bg-transparent">
                          <option value="" selected="selected">By IBAN</option>
                          <?php
                          foreach ($iban_list as $ibanlist) { ?>
                            <option value="<?= $ibanlist['ID']; ?>"><?= $ibanlist['IBAN_issuer']; ?></option>
                          <? } ?>
                        </select>
                      </div>

                      <div class="col-sm-2 px-1">
                        <i class="fa-solid fa-angle-down"></i>
                        <select name="currency" id="currency" class="select_cs_2 cole form-select form-select-sm bg-transparent">
                          <option value="" selected="selected">By Currency</option>
                          <?php
                          foreach ($currency_list as $crlist) { ?>
                            <option value="<?= $crlist['currency_code']; ?>"><?= $crlist['currency_code']; ?> - <?= ucwords($crlist['currency_name']); ?></option>
                          <? } ?>
                        </select>
                      </div>
                      <div class="col-sm-2 ">
                        <button type="submit" name="csearch" value="filter" class="adv_search btn btn-primary btn-sm   ms-2 float-start" style="width:36px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <a class="btn btn-success btn-sm ms-1 my-1" href="<?= $data['Host']; ?>/mypdf/client_account_excel<?= $data['ex'] ?>" title="Download Excel" target="_blank" style="float: right;" download="">
                          <i class="<?= $data['fwicon']['excel']; ?> text-light"></i>
                        </a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body row">
                      <!--===============================-->

                      <!--===============================-->

                      <?php if ($rows > 0) { ?>
                        <div class="table-responsive">
                          <table class="table table-centered table-nowrap mb-0">
                            <thead>
                              <tr>
                                <th scope="col"><strong>Account Name</strong></th>
                                <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&iban=<?= $_GET['iban']; ?>&currency=<?= $_GET['currency']; ?>&order=IBAN_issuer&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="IBAN">IBAN <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                                <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&iban=<?= $_GET['iban']; ?>&currency=<?= $_GET['currency']; ?>&order=accountid&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Account ID">Account ID <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                                <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&iban=<?= $_GET['iban']; ?>&currency=<?= $_GET['currency']; ?>&order=accountName&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Account Name">Account Name <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                                <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&iban=<?= $_GET['iban']; ?>&currency=<?= $_GET['currency']; ?>&order=accountNumber&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Account ID">IBAN / Account No.<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                                <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&iban=<?= $_GET['iban']; ?>&currency=<?= $_GET['currency']; ?>&order=currency&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="IBAN / Account No.">Currency <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                                <th scope="col">Balance</th>
                                <th scope="col">Timestamp</th>
                                <?php /*?><th scope="col">Action</th><?php */ ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i = 1;
                              foreach ($nquery as $key => $result) {
                                $member_username = member_username($result['client_id']);
                                $full_name = member_details($result['client_id'], "full_name");
                                $full_name = $full_name['full_name'];

                                if ($result['IBAN_issuer'] == 3) {
                                  $bal = $result['availableBalance'];
                                } else {
                                  $bal = get_user_balance_amt($result['client_id'], $result['IBAN_issuer']);
                                }
                              ?>
                                <tr>
                                  <td><a class="text-primary" onclick="iframe_open_modal(this);" data-tid="Profile Details - (<?= $member_username; ?>)" data-ihref="<?= $data['Admins']; ?>/profile_view<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="<?= $full_name ?> (<?= $member_username ?>)">
                                      <?= $full_name ?>
                                      (
                                      <?= $member_username ?>
                                      )</a></td>
                                  <td><?= $data['IBAN_Type'][$result['IBAN_issuer']] ?></td>
                                  <td><?= $result['accountid'] ?></td>
                                  <td><?= $result['accountName'] ?></td>
                                  <td><?= $result['accountNumber'] ?></td>
                                  <td><?= $result['currency'] ?></td>
                                  <td><?= $bal ?></td>
                                  <td><?= prndate($result['timestamp']) ?></td>
                                  <?php /*?><td><? if($result['IBAN_issuer']==3){?>
                                <a href="<?=$data['Admins'];?>/<?=$data['PageFile'];?><?=$data['ex'];?>?bid=<?=$result['ID']?>&cid=<?=$result['client_id']?>&action=edit"><i class="<?=$data['fwicon']['edit'];?> mx-1" title="Edit"></i></a>
                                <? if(isset($result['json_log_history'])&&$result['json_log_history']){?>
                                <i class="<?=$data['fwicon']['circle-info'];?> text-warning fa-fw" 
			onclick="popup_openv('<?=$data['Host']?>/common/json_log<?=$data['ex']?>?tableid=<?=$result['ID']?>&tablename=iban_issuer_account_details&tablefieldidname=ID')" title="View Json History"></i>
                                <? } ?>
                                <? } ?>
                              </td><?php */ ?>
                                </tr>
                              <?php
                              }
                              ?>
                              <?php if (isset($paginationCtrls) && $paginationCtrls) { ?>
                                <tr>
                                  <td colspan="9">
                                    <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                                  </td>
                                </tr>
                              <? } ?>

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
            <?php include "footer" . $data['ex']; ?>
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
  $('.make-default').on('click', function() {
    var datatid = $(this).attr('data-tid');
    var urls = "?act=upd&datatid=" + datatid;
    //alert(urls);
    window.location.href = urls;

  });
</script>

</html>