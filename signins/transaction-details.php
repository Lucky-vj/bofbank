<?php
include "../common.php";
include "controller/blade.transaction-details.php";
?>
<style>
  .blink {
    animation: blinker 1s step-start infinite;
  }

  @keyframes blinker {
    25% {
      opacity: 0;
    }
  }
</style>
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
            <h4 class="heading-ad">Transaction Details of TransID - <?= $rs['transaction_id']; ?> </h4>
          </div>
        </div>
      </div>
      <?php $gresult = member_details($rs['member_id'], ""); ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-page card">
            <div class="card-body">

              <div class="col-sm-12 col-xl-12 mt-2" style="clear:both;">
                <div class="inner-page card">
                  <div class="card-body">
                    <?php if (isset($_SESSION['msg'])) { ?>
                      <div class="col-sm-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo $_SESSION['msg']; ?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                    <?php unset($_SESSION['msg']);
                    } ?>

                    <div class="media">
                      <div class="media-body">
                        <!--<h6 class="header-title my-2">Member Details : <?= $rs['member_id']; ?> </h6>-->
                        <div class="row">
                          <div class="col-sm-6 my-2"><strong>Name</strong> - <?= $gresult['full_name']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Address</strong> - <?= $gresult['address_line1']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Company Name</strong> - <?= $gresult['company_name']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Company Address</strong> - <?= $gresult['company_address']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Registration Number</strong> - <?= $gresult['company_registration_no']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Assign Currency</strong> - <?= $acc_details[0]['currency']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Assign Account No</strong> - <?= $acc_details[0]['accountNumber']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Email</strong> - <a href="mailto: <?= $gresult['username']; ?>"><?= $gresult['username']; ?></a></div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="inner-page card">
                  <div class="card-body">
                    <div class="media">
                      <div class="media-body">
                        <div class="row">
                          <div class="col-sm-6 my-2"><strong>TransID</strong> - <?= $rs['transaction_id']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Timestamp</strong> - <?= $rs['transaction_date']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Bill Amt</strong> - <a class="text-success"><strong><?= $rs['transaction_amount']; ?> <?= $rs['transaction_currency']; ?></strong></a>&nbsp;&nbsp;<a href="https://www.xe.com/currencyconverter/convert/?Amount=<?= $rs['transaction_amount']; ?>&From=<?= $rs['transaction_currency']; ?>&To=<?= $assign_currency; ?>" title="Convert Currency" target="_blank">Convert Currency to <?= $assign_currency; ?></a></div>
                          <div class="col-sm-6 my-2"><strong>Trans Response</strong> - <? if ($rs['transaction_type'] == "Credit") { ?>
                              <a class="text-success"><strong><?= $rs['transaction_type']; ?></strong></a>
                            <? } else { ?>
                              <a class="text-danger"><strong><?= $rs['transaction_type']; ?></strong></a>
                            <? } ?> - <?= $rs['transaction_for']; ?>
                          </div>
                          <div class="col-sm-6 my-2"><strong>Name </strong> - <?= $rs['usr_name']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Address</strong> - <?= $rs['usr_address']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Account Number</strong> - <?= $rs['transaction_ac_no']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Swift Code</strong> - <?= $rs['transaction_swift_code']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Bank Name</strong> - <?= $rs['transaction_bank_name']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Bank Address</strong> - <?= $rs['transaction_bank_address']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Transfer Category</strong> -
                            <?php if ($rs['trasnfer_reason']) {
                              echo get_transfer_reason($rs['trasnfer_reason']);
                            } ?>
                          </div>
                          <div class="col-sm-6 my-2"><strong>Purpose / Descricption / Other</strong> - <?= $rs['transaction_purpose']; ?> / <?= $rs['usr_descricption']; ?> / <?= $rs['other_trasnfer_reason']; ?></div>
                          <div class="col-sm-6 my-2"><strong>Trans Status</strong> - <span class="badge rounded-pill text-bg-<?= $mscclr; ?> m-1 p-1"><?= $rs['transaction_status']; ?></span> </div>

                          <?php
                          if ($rs['transaction_currency'] == $assign_currency) {
                            $convertdeamt = $rs['transaction_amount'];
                            $convertedamount = $rs['transaction_amount'] . " " . $assign_currency;
                          } else {
                            $fcurr = $rs['transaction_currency'];
                            $assign_currency;
                            $tramt = $rs['transaction_amount'];
                            $convertdeamt = currencyConverter("$fcurr", "$assign_currency", "$tramt");
                            $convertedamount = "Convert $fcurr Amount - $tramt to $assign_currency  = $convertdeamt";
                          }
                          //echo $convertedamount;
                          //echo "<br>Transaction Fee  ".$rs['transaction_type']." MRD ".$mdr_fee." % Min ".$min_fee." $assign_currency";
                          $mdr = $convertdeamt * $mdr_fee / 100;

                          if (($rs['transaction_for'] == "Transaction Fee") or ($rs['transaction_for'] == "Yearly Fee") or ($rs['transaction_for'] == "Monthly Fee") or ($rs['transaction_for'] == "One Time Setup Fee")) {
                            $tranfee = "0";
                            $purpose1 = "No Transaction Fee";
                          } else if ($min_fee < $mdr) {
                            $tranfee = round($mdr, 2);
                            $purpose1 = "Assign Transaction Fee of TransID - " . $rs['transaction_id'] . "  is MDR " . $mdr_fee . " % : " . $tranfee . " " . $assign_currency;
                          } else {
                            $tranfee = round($min_fee, 2);
                            $purpose1 = "Transaction Fee of TransID - " . $rs['transaction_id'] . " is Min Amount : " . $tranfee . " " . $assign_currency;
                          }

                          ?>
                          <div class="col-sm-6 my-2">
                            <strong>Converted Amount</strong> - <?= $convertedamount; ?>
                          </div>
                          <div class="col-sm-6 my-2">
                            <strong>Trans Fee</strong> - <?= $purpose1; ?>
                          </div>
                          <? if (isset($rs['udf1']) && $rs['udf1']) {
                            $currency_value = crypro_exchange_value($_SESSION['s_currency'], $_SESSION['s_currency_to']);
                          ?>
                            <div class="col-sm-12 my-2  text-primary">
                              <strong>Udf1</strong> - <?= $rs['udf1']; ?>
                            </div>
                          <? } ?>
                          <div class="col-sm-6 my-2">
                            <strong>Used Bank</strong> - <?= $rs['used_bank'] ? get_admin_bank($rs['used_bank'])['account_beneficiary'] : ''; ?>
                          </div>
                          <!-- <div class="col-sm-6 my-2">
                            <strong>Reference Document</strong> - <a href="<?= $data['Host']; ?>/mypdf/display_reference_doc<?= $data['ex'] ?>?tid=<?= $rs['transaction_id']; ?>"><?= $rs['reference_doc']; ?></a>
                          </div> -->
                        </div>
                        <?php if ($rs['admin_transaction_id'] <> "") { ?>
                          <div class="row bg-light border border-primary">
                            <div class="col-sm-12 my-2">
                              <h4 class="header-title my-2">By Admin</h4>
                            </div>
                            <div class="col-sm-4 my-2"><strong>TransID</strong> - <?= $rs['admin_transaction_id']; ?></div>
                            <div class="col-sm-4 my-2"><strong>TransDate</strong> - <?= $rs['admin_transaction_date']; ?></div>
                            <div class="col-sm-4 my-2"><strong>Trans Amt</strong> - <?= $rs['converted_transaction_amount']; ?> <?= $rs['converted_transaction_currency']; ?></div>
                            <div class="col-sm-12 my-2"><strong>TransDetail</strong> - <?= $rs['admin_transaction_desc']; ?> ( <strong><?= $rs['admin_approval_status']; ?></strong> )</div>
                          </div>

                        <? } ?>

                      </div>
                    </div>
                  </div>
                </div>

                <?php if ($rs['transaction_status'] <> "Success") { ?>

                  <div class="inner-page card">
                    <div class="card-body">
                      <div class="media">
                        <div class="media-body">
                          <form name="frm" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="transaction_id" value="<?= $rs['transaction_id']; ?>">
                            <input type="hidden" name="tranfee" value="<?= $tranfee; ?>">
                            <input type="hidden" name="assign_currency" value="<?= $assign_currency; ?>">
                            <input type="hidden" name="purpose1" value="<?= $purpose1; ?>">
                            <input type="hidden" name="memberfullname" value="<?= $gresult['full_name']; ?>">
                            <input type="hidden" name="memberemail" value="<?= $gresult['email']; ?>">
                            <input type="hidden" name="transtype" value="<?= $rs['transaction_for']; ?>">
                            <input type="hidden" name="transaction_ac_no" value="<?= $rs['transaction_ac_no']; ?>">
                            <input type="hidden" name="transaction_type" value="<?= $rs['transaction_type']; ?>">
                            <input type="hidden" name="orderamt" value="<?= $rs['transaction_amount']; ?> <?= $rs['transaction_currency']; ?>">

                            <?php
                            $cls = "";
                            $low_balance = 0;
                            $balance_amount = get_user_balance_amt($rs['member_id'], $rs['iban_id']);
                            if ($rs['transaction_type'] == "Credit") {
                              $process_amount = ($convertdeamt);
                              $cls = "success";
                            } else {
                              $process_amount = ($convertdeamt + $tranfee);
                              $cls = "danger";

                              if ($balance_amount < $process_amount) {
                                $low_balance = 1;
                              }
                            }
                            ?>
                            <div class="row font-size-14">
                              <div class="col-md-12">
                                <div class="float-start">
                                  <span class="btn btn-sm btn-outline-<?= $cls; ?>">Total <?= $rs['transaction_type']; ?> Amount : <?= $assign_currency; ?> <?= $process_amount; ?></span>
                                  <? if ($low_balance == 1) { ?>
                                    <span class="badge rounded-pill text-bg-danger blink mx-3 p-2">Insufficient Balance</span>
                                  <? } ?>

                                </div>
                                <div class="float-end">
                                  <span class="btn btn-sm btn-outline-primary">Available Balance : <?= $assign_currency; ?> <?= $balance_amount; ?></span>
                                </div>
                              </div>
                              <div class="col-md-3 my-2">
                                <label>TransID</label>
                                <input class="form-control" name="admin_transaction_id" type="number" title="Transaction ID By Admin" placeholder="Transaction ID By Admin" value="<?= $rs['transaction_id']; ?>" readonly="" required>
                              </div>
                              <div class="col-md-3 my-2">
                                <label>Trans Amt (<?= $assign_currency; ?>)</label>
                                <input class="form-control" name="converted_transaction_amount" type="text" title="Converted Trans Amt" placeholder="Converted Trans Amt" value="<?= $convertdeamt; ?>" required>
                                <input type="hidden" name="converted_transaction_currency" value="<?= $assign_currency; ?>">
                              </div>
                              <div class="col-md-3 my-2">
                                <label>Settlement Date</label>
                                <input class="form-control date" name="admin_transaction_date" type="datetime-local" title="Transaction Date By Admin" placeholder="Transaction Date By Admin" value="<?= date('Y-m-d'); ?>T<?= date('H:i'); ?>" required>
                              </div>
                              <div class="col-md-3 my-2">
                                <label>Trans Status</label>
                                <select name="admin_transaction_status" class="form-select" title="Trans Status" required>
                                  <option value="">Select Trans Status</option>
                                  <option value="Failed">Failed</option>
                                  <option value="Process">Process</option>
                                  <option value="Rejected">Rejected</option>
                                  <? if ($low_balance == 0) { ?>
                                    <option value="Success">Success</option>
                                  <? } ?>
                                </select>
                              </div>
                              <div class="col-md-6 my-2">
                                <label>Description</label>
                                <div class="form-floating">
                                  <textarea class="form-control" name="admin_transaction_desc" placeholder="Transaction Description / Reason" id="admin_transaction_desc" required></textarea>
                                  <!-- <label for="admin_transaction_desc">Transaction Description / Reason</label> -->
                                </div>
                              </div>
                              <div class="col-md-3 my-2">
                                <label>Used Bank</label>
                                <select name="used_bank" id="used_bank" class="form-select form-select-sm" title="Used Bank" required>
                                  <option value="">--- Used Bank --- </option>
                                  <?php
                                  $sellist = db_rows("SELECT * FROM tbl_common_bank_account WHERE bank_status='Active' order by bank_name");
                                  foreach ($sellist as $key => $rslist) {
                                  ?>
                                    <option value="<?= $rslist['bank_id']; ?>" <?php if ($rslist['bank_id'] == $assign_bank) { ?> selected="selected" <? } ?>><?= $rslist['bank_name']; ?> - <?= $rslist['bank_account_number']; ?> - <?= $rslist['bank_supported_currency']; ?> - <?= $rslist['bank_address']; ?></option>
                                  <? } ?>
                                </select>
                              </div>
                              <!-- <div class="col-md-3 my-2">
                                <label>Reference Document</label>
                                <input class="form-control" name="reference_doc" type="file" title="Reference Document" placeholder="Reference Document" value="<?= $rs['reference_doc']; ?>" required>
                              </div> -->
                              <div class="col-md-4 my-2 btn-flex">
                                <a href="<?= $data['Admins']; ?>/view_requests<?= $data['ex'] ?>" class="btn btn-sm btn-primary template" title="Back to Pending Transaction"><i class="<?= $data['fwicon']['back']; ?>"></i> Back</a>
                                <button type="submit" class="btn btn-sm btn-primary template" name="btn_submit" value="Submit"><i class="<?= $data['fwicon']['tick-circle']; ?>"></i> Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  } ?>
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
  <!-- End Page-content -->
</div>



</div>
</body>
<script>
  (function blink() {
    $('.blink_me').fadeOut(500).fadeIn(500, blink);
  })();
</script>

</html>