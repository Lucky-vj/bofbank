<?php
include "common.php";
include "controller/blade.index.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
  .boxv2 {
    background-color: #4d75e4;
  }

  .boxv3 {
    background-color: #253255;
  }

  .boxv4 {
    background-color: #6979ac;
  }

  .dashboard-button {
    border: 1px solid;
    border-radius: 15px;
    margin: 2px 5px !important;
    padding: 7px 10px;
    color: #6b747d !important;
    background-color: #fff;
  }

  .bg-gradient-new {
    background-image: linear-gradient(#AEE1D0, #CEEEE4) !important;
  }

  .dbutton:hover {
    /*color: #FFFFFF  !important;*/
  }

  .btn.template:hover {
    /* background-color: unset !important; */
  }

  .purple-bg {
    background: white !important;
    background: linear-gradient(66deg, #22AFEA -11.84%, #07C 98.75%) !important;
  }

  @media (max-width: 400px) {
    .col {
      flex: 1 0 97% !important;
    }
  }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Added Beneficiary</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr class="table-success">
                <th>Beneficiary Name</th>
                <th>Account no</th>
                <th>Bank Name</th>
                <th>Swift Code</th>
                <th>Bank Address</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php

              if ($_SESSION['default_IBAN_issuer'] == 3) {
                $beneficiarylist = db_rows("SELECT * FROM `tbl_beneficiary` WHERE `client_id`='$member_account_number' AND `beneficiary_status`='Active' AND `IBAN_issuer`='" . $_SESSION['default_IBAN_issuer'] . "' ORDER BY `beneficiary_name`");
              } else {
                $beneficiarylist = db_rows("SELECT * FROM `tbl_beneficiary` WHERE `client_id`='$member_account_number' AND `IBAN_issuer` IN (1,2) AND `beneficiary_status`='Active' ORDER BY `beneficiary_name`");
              }
              foreach ($beneficiarylist as $key => $beneficiaryrow) {
              ?>
                <tr>
                  <td><?= $beneficiaryrow['beneficiary_name']; ?></td>
                  <td><?= $beneficiaryrow['beneficiary_account_number']; ?></td>
                  <td><?= $beneficiaryrow['beneficiary_bank_name']; ?></td>
                  <td><?= $beneficiaryrow['beneficiary_swift_code']; ?></td>
                  <td><?= $beneficiaryrow['beneficiary_bank_address']; ?></td>
                  <td><a href="<?= $data['Host']; ?>/beneficiary-transfer<?= $data['ex'] ?>?act=beneficiary_transfer&bid=<?= $beneficiaryrow['beneficiary_id']; ?>" target="_parent" class="btn btn-success btn-sm">select</a></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="main-content transfer membership-page dashboard-page">
  <div class="page-content">
    <div class="">
      <!-- start page title -->
      <div class="row">
        <div class="row">
          <!-- <div class="col-lg-1"></div> -->
          <div class="col-lg-12 px-1">

            <div class="page-title-box d-none align-items-center justify-content-between">
              <h4 class="heading-ad"><i class="<?= $data['fwicon']['home']; ?> fa-fw"></i> Dashboard<br>
              </h4>
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= $data['Host-Home']; ?>" title="Home">Home</a></li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                      <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                      <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                    </svg></li>
                  <li class="breadcrumb-item active">Dashboard <?= $_SESSION['default_IBAN_issuer']; ?>
                  </li>
                  </li>
                </ol>
              </div>
            </div>
            <?php
            include "common/trans_search_form.php";
            ?>
          </div>
          <!-- <div class="col-lg-1"></div> -->
        </div>
      </div>
      <!-- end page title -->
      <?php
      $currency_code = $currency;
      $currency_symbol = get_currency($currency);
      $currency = $data['AVAILABLE_CURRENCY_MEANING'][$currency];
      $cname = $currency;
      ?>
      <div class="">
        <div class="row">
          <div class="row">
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body purple-bg rounded" data-placement="right" title="Current Balance" style="height: 28em">
                  <div class="row">
                    <div class="col-xl-4 col-lg-12 col-md-0 col-sm-12 main-asset">
                      <div class="dashboard-main-asset"><img src="./images/dashboard-main-asset.png" alt="dashboard-main-asset" class="img-fluid"></div>
                    </div>
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                      <div class="media">
                        <div class="media-left-part">
                          <div class="media-body">
                            <h2><?php if (isset($currency) && $currency) {
                                  echo $currency_symbol;
                                } ?> <?= $totalbalance; ?>
                              <br>
                            </h2>
                          </div>
                          <!-- <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-success"> <i class="<?= $data['fwicon']['sales-volume']; ?>"></i> </span> </div> -->
                          <div class="float-start"><?php if ($_SESSION['IBANDATA']['IBAN_issuer'] <> "") { ?>
                              <ul class="metismenu list-unstyled side-menu mx-0">
                                <li class="list-item77">
                                  <button class="dropdown-toggle44 btn btn-light btn-sm text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= get_iban_account_number($Client_ID, $_SESSION['default_IBAN_issuer']) ?>&nbsp;&nbsp;<i class="fa-solid fa-caret-down fa-fw float-end mt-1"></i> <?php if (isset($currency) && $currency) {
                                                                                                                                                                                          echo $currency_symbol;
                                                                                                                                                                                        } ?> <span id="account-balance"><strong><?php echo $totalbalance; ?></strong></span>
                                  </button>
                                  <ul class="dropdown-menu bg-success-subtle">
                                    <?= get_iban_list($Client_ID) ?>
                                  </ul>
                              </ul>
                            <? } ?>
                          </div>
                        </div>
                        <hr>
                        <div class="">
                          <div class="float-start">
                            <h4 class="m-0 align-self-center" style="font-size:24px !important;">

                              <span style="font-size:16px !important">&nbsp;&nbsp; <?php //if(isset($totalbalance)&&$totalbalance){ 
                                                                                    ?>
                                <? if ($_SESSION['default_IBAN_issuer'] == 3) { ?>
                                  <a title="Refresh Balance" class="mx-2 "><i class="<?= $data['fwicon']['rotate']; ?> fetch-tkb-balance text-success pointer" data-tkb="<?= $accountid; ?>"></i></a> <? } ?></span>
                            </h4>
                          </div>
                          <div class="clear-fix" style="clear:both;"></div>

                          <div class="row dashboard-three-stages">

                            <div class="btn btn-outline-primary template dashboard-button col m-2"><a href="<?= $data['Host']; ?>/<?= $fundtransferurl ?><?= $data['ex'] ?>" class="dbutton"> Fund Transfer <i class="fa-solid fa-arrow-right"></i></a></div>

                            <div class="btn btn-outline-primary template dashboard-button col m-2"><a href="<?= $data['Host']; ?>/<?= $statementurl ?><?= $data['ex'] ?>" class="dbutton"> Statement <i class="fa-solid fa-arrows-rotate"></i></a></div>

                            <div class="btn btn-outline-primary template dashboard-button col m-2"><a href="<?= $data['Host']; ?>/money-exchange<?= $data['ex'] ?>" class="dbutton"> Money Exchange <i class="fa-solid fa-arrows-rotate"></i></a></div>

                            <div class="dashboard-button4 col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dasboard-bottom-sec">
                  <div class="bottom-left-sec">
                    <div class="">
                      <a href="<?php echo $data['Host']; ?>/manage-beneficiary.php?action=add" type="button" class="btn btn-outline-success btn-sm my-2 add-benefit top-inner-transfer-card"><i class="fa-solid fa-circle-plus"></i> <strong>Add New Beneficiary</strong></a>
                    </div>
                    <div class="">
                      <a href="javascript:void(0)" type="button" class="btn btn-outline-success btn-sm my-2 add-benefit top-inner-transfer-card" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./images/pay-money-icon.svg" alt="dashboard-main-asset" class="img-fluid"> <strong>Pay to Beneficiary</strong></a>
                    </div>
                  </div>
                  <div class="btn btn-sm money-balance">
                    <p>Available Balance</p>
                    <h1><?php if (isset($currency_code) && $currency_code) {
                          echo $currency_code;
                        } ?> <span><?php echo $totalbalance; ?> </span></h1>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-2"></div> -->
          </div>
          <!-- end row -->
          <? if (count($seltranlist) > 0) { ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="header-title mb-4"> <span> Latest 5 Transactions</span></h4>
                    <div class="table-responsive">
                      <table class="table table-centered table-nowrap mb-0">
                        <thead class="bg-success text-white">
                          <tr class="text-start">
                            <th scope="col">TransID</th>
                            <!-- <th scope="col">Bill&nbsp;Amt</th> -->
                            <th scope="col">Trans&nbsp;Amt</th>
                            <th scope="col">Timestamp</th>
                            <th scope="col">Trans&nbsp;Response</th>
                            <th scope="col">Trans&nbsp;Status</th>
                            <th scope="col">Settlement&nbsp;Date</th>
                          </tr>
                        </thead>
                        <tbody id="none">
                          <?php foreach ($seltranlist as $key => $tranlist) { ?>
                            <? if ($_SESSION['default_IBAN_issuer'] == 3) { ?>
                              <tr class="text-start">
                                <td><a class="hrefmodal8888" data-tid="<?= $tranlist['transactionId']; ?>" data-href="<?= $data['Host']; ?>/transaction-details<?= $data['ex'] ?>?tid=<?= $tranlist['transactionId']; ?>" title="<?= $tranlist['transactionId']; ?>">
                                    <?= $tranlist['transactionId']; ?></a></td>
                                <!-- <td><?= $tranlist['transactionCurrency']; ?> <?= $tranlist['transactionAmount']; ?></td> -->
                                <td><?= $tranlist['transactionCurrency']; ?> <?= $tranlist['transactionAmount']; ?></td>
                                <td><?= date('Y-m-d', strtotime($tranlist['createdTime'])); ?></td>
                                <td class="text-start"><? if ($tranlist['direction'] == "DEPOSIT") { ?>
                                    <i class="<?= $data['fwicon']['circle-dot']; ?> text-success mr-1"></i>
                                  <? } else { ?>
                                    <i class="<?= $data['fwicon']['circle-dot']; ?> text-danger mr-1"></i>
                                  <? } ?>
                                  <?= $tranlist['direction']; ?>
                                </td>
                                <td><span class="badge rounded-pill text-bg-success m-1 p-1"><?= $tranlist['status']; ?></span></td>
                                <td><?= date('Y-m-d', strtotime($tranlist['lastStatusUpdateTime'])); ?></td>
                              </tr>
                            <? } else { ?>
                              <tr class="text-start">
                                <td><a class="hrefmodal" data-tid="<?= $tranlist['transaction_id']; ?>" data-href="<?= $data['Host']; ?>/transaction-details<?= $data['ex'] ?>?tid=<?= $tranlist['transaction_id']; ?>" title="<?= $tranlist['transaction_id']; ?>">
                                    <?= $tranlist['transaction_id']; ?></a></td>
                                <!-- <td><?= $tranlist['transaction_currency']; ?> <?= $tranlist['transaction_amount']; ?></td> -->
                                <td><?= $tranlist['converted_transaction_currency']; ?> <?= $tranlist['converted_transaction_amount']; ?></td>
                                <td><?= date('Y-m-d', strtotime($tranlist['transaction_date'])); ?></td>
                                <td class="text-start"><? if ($tranlist['transaction_type'] == "Credit") { ?>
                                    <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i>
                                  <? } else { ?>
                                    <i class="mdi mdi-checkbox-blank-circle text-danger mr-1"></i>
                                  <? } ?>
                                  <?= $tranlist['transaction_type']; ?>
                                  -
                                  <?= $tranlist['transaction_for']; ?>
                                </td>
                                <td><span class="badge rounded-pill text-bg-success m-1 p-1"><?= $tranlist['transaction_status']; ?></span></td>
                                <td><?= date('Y-m-d', strtotime($tranlist['admin_transaction_date'])); ?></td>
                                <?php /*?><td><a href="<?=$data['Host'];?>/transaction-details/<?=$data['ex']?>?tid=<?=$tranlist['transaction_id'];?>" title="View Detail" class="text-center"><i class="<?=$data['fwicon']['display'];?> text-success"></i></a></td><?php */ ?>
                              </tr>
                            <? } ?>
                          <? } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
  <div>
    <? include($data['Path'] . '/footer' . $data['iex']); ?>
  </div>
  <!-- /Right-bar -->
  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>
</div>
<script>
  $("#status_csearch").css("display", "none"); // for hide search by status 
</script>
</body>

</html>