<?php
include "common.php";
include "controller/blade.transaction-details.php";
?>
<style>
  .trans.page-content {
    padding: calc(0px + 24px) calc(24px / 2) 0px calc(24px / 2) !important;
  }

  .trans.main-content {
    margin-left: 0px !important;
  }

  body[data-layout=horizontal] .trans.page-content {
    margin-top: 0px !important;
    padding: calc(0px + 0px) calc(0px / 2) 0px calc(0px / 2) !important;
  }
</style>
<div class="trans main-content">
  <div class="trans page-content">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="card11">
          <div class="card-body11">
            <div class="col-sm-12 col-xl-12 mt-2">
              <div class="card11 ">
                <div class="card-body11">
                  <div class="media">

                    <div class="media-body">

                      <? if ($_SESSION['default_IBAN_issuer'] == 3) { ?>

                        <div class="row border rounded m-2 p-1">

                          <div class="col-sm-4"><strong>TransID</strong> </div>
                          <div class="col-sm-8"><?= $rs['transactionId']; ?></div>

                          <div class="col-sm-4"><strong>Timestamp</strong> </div>
                          <div class="col-sm-8"><?= $rs['lastStatusUpdateTime']; ?></div>

                          <div class="col-sm-4"><strong>Bill Amount</strong> </div>
                          <div class="col-sm-8"><a class="text-success"><strong><?= $rs['requestAmount']; ?> <?= $rs['requestCurrency']; ?></strong></a></div>

                          <div class="col-sm-4"><strong>Trans Amount</strong> </div>
                          <div class="col-sm-8"><a class="text-success"><strong><?= $rs['transactionAmount']; ?> <?= $rs['transactionCurrency']; ?></strong></a></div>



                          <div class="col-sm-4"><strong>Trans Response</strong> </div>
                          <div class="col-sm-8">

                            <? if ($rs['transaction_type'] == "DEPOSIT") { ?>

                              <a class="text-success"><strong><?= $rs['direction']; ?></strong></a>

                            <? } else { ?>

                              <a class="text-danger"><strong><?= $rs['direction']; ?></strong></a>

                            <? } ?> - <span class="badge rounded-pill text-bg-<?= $mscclr; ?>"><?= $rs['status']; ?></span>
                          </div>

                          <div class="col-sm-4"><strong>Direction</strong> </div>
                          <div class="col-sm-8"><?= $rs['direction']; ?></div>

                          <div class="col-sm-4"><strong>Type</strong> </div>
                          <div class="col-sm-8"><?= $rs['type']; ?></div>

                          <div class="col-sm-4"><strong>Category</strong> </div>
                          <div class="col-sm-8"><?= $rs['category']; ?></div>

                          <div class="col-sm-4"><strong>Payment Method</strong> </div>
                          <div class="col-sm-8"><?= $rs['paymentMethod']; ?></div>

                          <div class="col-sm-4"><strong>isFee</strong> </div>
                          <div class="col-sm-8"><?= $rs['isFee']; ?></div>

                          <div class="col-sm-4"><strong>Trans Status</strong> </div>
                          <div class="col-sm-8"><span class="badge rounded-pill text-bg-<?= $mscclr; ?>"><?= $rs['status']; ?></span></div>

                        </div>



                      <? } else { ?>
                        <div class="row border rounded m-2 p-1">

                          <div class="col-sm-4"><strong>TransID</strong> </div>
                          <div class="col-sm-8"><?= $rs['transaction_id']; ?></div>

                          <div class="col-sm-4"><strong>Timestamp</strong> </div>
                          <div class="col-sm-8"><?= $rs['transaction_date']; ?></div>

                          <div class="col-sm-4"><strong>Bill Amount</strong> </div>
                          <div class="col-sm-8"><a class="text-success"><strong><?= $rs['transaction_amount']; ?> <?= $rs['transaction_currency']; ?></strong></a></div>

                          <div class="col-sm-4"><strong>Trans Response</strong> </div>
                          <div class="col-sm-8">

                            <? if ($rs['transaction_type'] == "Credit") { ?>

                              <a class="text-success"><strong><?= $rs['transaction_type']; ?></strong></a>

                            <? } else { ?>

                              <a class="text-danger"><strong><?= $rs['transaction_type']; ?></strong></a>

                            <? } ?> - <?= $rs['transaction_for']; ?>
                          </div>

                          <div class="col-sm-4"><strong>Beneficiary Name</strong> </div>
                          <div class="col-sm-8"><?= $rs['usr_name']; ?></div>

                          <div class="col-sm-4"><strong>Beneficiary Address</strong> </div>
                          <div class="col-sm-8"><?= $rs['usr_address']; ?></div>

                          <div class="col-sm-4"><strong>Account Number</strong> </div>
                          <div class="col-sm-8"><?= $rs['transaction_ac_no']; ?></div>

                          <div class="col-sm-4"><strong>Swift Code</strong> </div>
                          <div class="col-sm-8"><?= $rs['transaction_swift_code']; ?></div>

                          <div class="col-sm-4"><strong>Bank Name</strong> </div>
                          <div class="col-sm-8"><?= $rs['transaction_bank_name']; ?></div>

                          <div class="col-sm-4"><strong>Bank Address</strong> </div>
                          <div class="col-sm-8"><?= $rs['transaction_bank_address']; ?></div>

                          <div class="col-sm-4"><strong>Purpose / Descricption</strong> </div>
                          <div class="col-sm-8"><?= get_transfer_reason($rs['trasnfer_reason']); ?> - <?= $rs['transaction_purpose']; ?> <?= $rs['usr_descricption']; ?></div>

                          <!-- <div class="col-sm-4"><strong>Other Reason</strong> </div>
                          <div class="col-sm-8"><?= $rs['other_trasnfer_reason']; ?> <?= $rs['usr_descricption']; ?></div> -->

                          <div class="col-sm-4"><strong>Trans Status</strong> </div>
                          <div class="col-sm-8"><span class="badge rounded-pill text-bg-<?= $mscclr; ?>"><?= $rs['transaction_status']; ?></span></div>

                        </div>
                        <?php if ($rs['admin_transaction_id'] <> "") { ?>

                          <h6 class="mx-2">Bank Status :</h6>

                          <div class="row border rounded m-2 p-1 px-2">



                            <div class="col-sm-4"><strong>Bank TransID</strong> </div>
                            <div class="col-sm-8"><?= $rs['admin_transaction_id']; ?></div>

                            <div class="col-sm-4"><strong>Trans Amt</strong> </div>
                            <div class="col-sm-8"><?= $rs['converted_transaction_amount']; ?> <?= $rs['converted_transaction_currency']; ?></div>

                            <div class="col-sm-4"><strong>Settel. Date</strong> </div>
                            <div class="col-sm-8"><?= $rs['admin_transaction_date']; ?></div>

                            <div class="col-sm-4"><strong>Trans Status </strong></div>
                            <div class="col-sm-8"><span class="badge rounded-pill text-bg-<?= $mscclr; ?>"><?= $rs['transaction_status']; ?></span></div>

                          </div>
                        <? } ?>
                      <? } ?>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<!-- end main content-->
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<!-- /Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
</body>

</html>