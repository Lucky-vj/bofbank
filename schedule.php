<?php
include "common.php";
include "controller/blade.schedule.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- start -->
<script>


</script>
<!-- end -->

<div class="main-content transfer schedule-transfer">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad"><i class="<?= $data['fwicon']['calender']; ?> fa-fw"></i>
              <?= $data['PageName']; ?>
              <br>
            </h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $data['Host-Home']; ?>" title="Home">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg></li>
                <li class="breadcrumb-item active">
                  <?= $data['PageName']; ?>
                </li>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="contain-width">
        <div class="row">
          <?php if (!isset($_SESSION['ClientID'])) { ?>
            <div class="col-lg-4">
              <a class="btn btn-outline-primary btn-sm balance top-inner-transfer-card"><span>Available Balance :</span>
                <p><?= $_SESSION['AccountCurrency']; ?> <?= $_SESSION['AccountBalance']; ?></p>
              </a>
            </div>
            <div class="col-lg-4">
              <a href="javascript:void(0)" type="button" class="btn btn-outline-success btn-sm my-2 pay-benefit top-inner-transfer-card" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./images/pay-money-icon-light.svg" alt="dashboard-main-asset" class="img-fluid"> <strong>Pay to Beneficiary</strong></a>
            </div>
            <div class="col-lg-4">
              <a href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>?action=add" type="button" class="btn btn-outline-success btn-sm my-2 add-benefit top-inner-transfer-card"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> <strong>Add New Beneficiary</strong></a>
            </div>
          <? } ?>
        </div>
      </div>
      <div class="my-4 contain-width">
        <!-- end page title -->
        <!-- getiing clase -->
        <div class="col-12 my-2">
          <?php if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php unset($_SESSION['msg']);
          } ?>
          <div id="swiftmsg" class="col-sm-12 px-1"></div>
          <?php if ($step == 1) { ?>
            <?php /*?><div class="tab-pane active" id="ClientInfo"><?php */ ?>
            <div class="row">
              <div class="col-12">
                <div class="inner-page card>
                <div class=" card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <!--<h4 class="header-title"> <?= $data['PageName']; ?> Transfer</h4>-->
                      <!--<p>Transfer without Adding Beneficiary</p>-->
                    </div>
                    <!--<div class="col-lg-9  text-end" >-->
                    <!--<a class="btn btn-outline-primary btn-sm mx-1">Available Balance : <?= $_SESSION['AccountCurrency']; ?> <?= $_SESSION['AccountBalance']; ?></a><a href="javascript:void(0)" type="button" class="btn btn-outline-success btn-sm my-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="<?= $data['fwicon']['amazon-pay']; ?>"></i> <strong>Pay to Beneficiary</strong></a>&nbsp;<a href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>?action=add" type="button" class="btn btn-outline-success btn-sm my-2"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> <strong>Add New Beneficiary</strong></a></div>-->
                  </div>
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="text" class="form-control" name="beneficiary_name" id="beneficiary_name" title="Beneficiary Name" placeholder="Beneficiary Name" required>
                          <!--<label for="beneficiary_name">Beneficiary Name</label>-->
                        </div>
                      </div>
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="text" name="beneficiary_swift_code" id="beneficiary_swift_code" class="form-control" onBlur="checkAvailability()" placeholder="Swift Code" required />
                          <!--<label for="beneficiary_swift_code">Swift Code</label>-->
                        </div>
                      </div>
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="number" id="transaction_amount" name="transaction_amount" class="form-control" title="Amount" placeholder="Amount" required />
                          <!--<label for="transaction_amount">Amount</label>-->
                        </div>
                      </div>
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="text" id="beneficiary_account_number" name="beneficiary_account_number" class="form-control" title="Account Number" placeholder="Account/IBAN No" required />
                          <!--<label for="beneficiary_account_number">Account/IBAN No</label>-->
                        </div>
                      </div>

                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="text" id="beneficiary_bank_name" name="beneficiary_bank_name" class="form-control" title="Bank Name" placeholder="bank name" required />
                          <!--<label for="beneficiary_bank_name">Bank Name</label>-->
                        </div>
                      </div>

                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <i class="fa-solid fa-angle-down"></i>
                          <select name="transaction_currency" id="transaction_currency" class="form-select" title="Select Currency" placeholder="Swift Code" required>
                            <option value="" selected="selected">select currency</option>
                            <?php $cirr_get_value = bank_assign_currency("$member_account_number");

                            foreach ($cirr_get_value as $currv) { ?>
                              <option value="<?= $currv; ?>">
                                <?= $currv; ?>
                              </option>
                            <? } ?>
                          </select>
                          <!--<label for="transaction_currency">Select Currency</label>-->
                        </div>
                      </div>
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="text" id="beneficiary_confirm_account_number" name="beneficiary_confirm_account_number" class="form-control" title="Confirm Account Number" placeholder="Confirm Account/IBAN No" required />
                          <!--<label for="beneficiary_confirm_account_number">Confirm Account/IBAN No</label>-->
                        </div>
                      </div>
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input type="text" id="beneficiary_bank_address" name="beneficiary_bank_address" class="form-control" title="Bank Address" placeholder="Bank Address" required />
                          <!--<label for="beneficiary_bank_address">Bank Address</label>-->
                        </div>
                      </div>
                      <div class="col-md-4 my-2">

                        <div class="form-floating inner_page_input">
                          <input type="date" id="schedule_time" name="schedule_time" class="form-control date" min="<?= date('Y-m-d'); ?>" title="Schedule Date" placeholder="Schedule date" required />
                          <!--<label for="schedule_time">Schedule Date</label>-->

                        </div>
                      </div>
                      <div class="col-md-6 my-2">
                        <div class="form-floating inner_page_input">
                          <i class="fa-solid fa-angle-down"></i>
                          <select class="form-select" name="trasnfer_reason" id="trasnfer_reason" title="Purpose for Transfer" required>
                            <option value="" selected="selected">Purpose for Transfer</option>

                            <?php foreach ($trasnfer_reason_list as $trlist) { ?>
                              <option value="<?= $trlist['id']; ?>"><?= $trlist['reason']; ?></option>
                            <? } ?>

                          </select>
                          <!--<label for="currency">Purpose for Transfer</label>-->
                        </div>
                      </div>
                      <div class="col-md-4  my-3">
                        <div class="form-floating inner_page_input">
                          <input class="form-control" name="other_trasnfer_reason" id="other_trasnfer_reason" type="text" title="Other Trasnfer Reason" placeholder="Other Trasnfer Reason">
                          <!--<label for="amount">Other Trasnfer Reason</label>-->
                        </div>
                      </div>
                    </div>
                    <!--<button type="submit" id="submit_beneficiary" class="btn btn-sm btn-success" name="schedule_transfer" title="Schedule Transfer" value="Schedule Transfer"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> Submit</button>-->
                    <div class="form-group common-btn">
                      <!--<i class="<?= $data['fwicon']['circle-plus']; ?>"></i>-->
                      <button type="submit" class="btn btn-sm submit-cmn-btn" name="schedule_transfer" value="Submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    <? } ?>
    <?php if ($step == 2) {

      if ($_SESSION['s_transaction_amount'] == "") {

        header("location:schedule.php");
        exit;
      }

      // for check balance 

      $assign_currency_tr   = $_SESSION['AccountCurrency'];
      $availableb = $_SESSION['AccountBalance'];
      $transfer_currency_tr = $_SESSION['s_transaction_currency'];
      $transfer_amount_tr   = $_SESSION['s_transaction_amount'];

      if ($assign_currency_tr <> $transfer_currency_tr) {
        $convertdeamt = currencyConverter("$transfer_currency_tr", "$assign_currency_tr", "$transfer_amount_tr");
      } else {
        $convertdeamt = $transfer_amount_tr;
      }

      $st = "";
      if ($availableb < $convertdeamt) {
        $st = 1;
      }

    ?>
      <!--<div class="tab-pane active" id="ClientInfo">

              <div class="col-12">-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="text-end">
                <div class="btn btn-outline-primary btn-sm">Available Balance : <?= $_SESSION['AccountCurrency']; ?> <?= $_SESSION['AccountBalance']; ?></div>
              </div>
              <h4 class="header-title ">Beneficiary Detail</h4>
              <p class="card-title-desc ">Check Beneficiary Detail before transfer Money</p>
              <div class="col-sm-12 col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <div class="media">
                      <div class="media-body">
                        <div class="row font-size-14">
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Amount</strong> -
                            <?= $_SESSION['s_transaction_amount']; ?>
                            <?= $_SESSION['s_transaction_currency']; ?>
                          </div>
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Beneficiary Name</strong> -
                            <?= $_SESSION['s_beneficiary_name']; ?>
                          </div>
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Account Number</strong> -
                            <?= $_SESSION['s_beneficiary_account_number']; ?>
                          </div>
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Swift Code</strong> -
                            <?= $_SESSION['s_beneficiary_swift_code']; ?>
                          </div>
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Bank Name</strong> -
                            <?= $_SESSION['s_beneficiary_bank_name']; ?>
                          </div>
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Bank Address</strong> -
                            <?= $_SESSION['s_beneficiary_bank_address']; ?>
                          </div>
                          <div class="col-sm-6 col-xl-6 my-2"><strong>Schedule Date</strong> -
                            <?= $_SESSION['s_schedule_time']; ?>
                          </div>
                          <div class="col-sm-12 col-xl-12 my-2">
                            <form method="post" name="frm" action="schedule.php" id="twofaformId">
                              <input type="hidden" name="submit_transfer" value="Stransfer" />
                              <a href="schedule.php" class="btn btn-outline-success btn-sm template">Back</a>
                              <?php if ($st == 1) { ?>
                                <a class="btn btn-danger btn-sm template">Insufficient funds</a>
                              <?php } else { ?>
                              <?php } ?>
                              <div class="form-group common-btn mb-5">
                                <button type="submit" class="btn btn-sm submit-cmn-btn" name="btn_submit" value="Submit">Submit</button>
                              </div>
                            </form>
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
      </div>
      <!--</div>

            </div>-->
    <? } ?>
    <!--Demo filed-->
    </div>
  </div>
</div>
<? include($data['Path'] . '/footer' . $data['iex']); ?>
</div>
<!-- end col -->
</div>
</div>
</div>
<br>
</div>
<!-- end main content-->
</div>
</div>
<!-- /.modal -->
<!-- Modal -->
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
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script>
  $("#submit_beneficiary").click(function() {

    val2 = $("#beneficiary_account_number").val();
    val4 = $("#beneficiary_confirm_account_number").val();

    if (val2 == "") {
      alert("Please enter account number");
      return false;
    } else if (val2 != val4) {
      alert("Account Number and Confirm Account Number Not Mached");
      return false;
    } else if ($.trim(val2).length <= 5) {
      alert('Please enter min 5 digit account number');
      return false;
    }



  });

  $("#btn_submit").click(function() {

    <?php

    if (($_SESSION['members']['client_id']) && (isset($_SESSION['members']['google_auth_access']) && $_SESSION['members']['google_auth_access'] == 1 || $_SESSION['members']['google_auth_access'] == 3) && ($_SESSION['members']['google_auth_code'])) {

    ?>

      $('#twofaModal').modal('show');

      return false;

    <?

    } else {

    ?>

      $("#twofaformId").submit();

    <?

    }

    ?>





  });



  function submit_form_verified() {

    $("#twofaformId").submit();

  }


  // check swift code
  function checkAvailability() {

    $.ajax({
      url: "<?= $data['Host']; ?>/common/check-swift-code.php",
      data: 'bswift=' + $("#beneficiary_swift_code").val(),
      type: "POST",
      success: function(data) {
        //alert(data);
        var obj = JSON.parse(data);
        //alert(obj.valid);
        //alert(obj.bank);
        //alert(obj.city);
        //alert(obj.branch);
        //alert(obj.country);


        if (obj.valid == 1) {
          //alert("Valid Swift Code");
          document.getElementById('beneficiary_bank_name').value = obj.bank;
          document.getElementById('beneficiary_bank_address').value = obj.branch + " " + obj.city + " , " + obj.country;
          $('#swiftmsg').attr('class', 'col-sm-12 px-1 alert alert-success');
          //$('#basicidx i').prop('title', 'Valid Swift Code');
          document.getElementById('swiftmsg').innerHTML = " <i class='ps-3 m-0 <?= $data['fwicon']['check-circle']; ?> text-success'></i> SWIFT Code Verified ";
        } else {
          //alert("Inalid Swift Code");
          $('#swiftmsg').attr('class', 'col-sm-12 px-1 alert alert-danger');
          //$('#basicidx i').prop('title', 'Invalid Swift Code');
          document.getElementById('swiftmsg').innerHTML = " <i class='ps-3 m-0 <?= $data['fwicon']['check-cross']; ?> text-danger'></i> We are unable to verify this SWIFT number via our Bank Directory. Click Okay and proceed if your SWIFT details is correct ";
        }



      },
      error: function() {}
    });
  }
</script>
</body>

</html>