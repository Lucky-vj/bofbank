<?php
include "common.php";
include "controller/blade.add-money.php";

if (isset($_SESSION['ClientID']) && $_SESSION['ClientID']) {
?>
  <style>
    .trans.page-content {
      padding: calc(0px + 24px) calc(24px / 2) 0px calc(24px / 2) !important;
    }

    .trans.main-content {
      margin-left: 0px !important;
    }

    body[data-layout=horizontal] .page-content {
      margin-top: 0px !important;
      padding: calc(0px + 24px) calc(24px / 2) 20px calc(24px / 2) !important;
    }
  </style>
<? } ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="trans main-content add-money common-inner-css">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad"><i class="<?= $data['fwicon']['sales-volume']; ?> fa-fw"></i>
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
        <div class="col-12">
          <h4 class="header-title common-txt">STEP - 1</h4>
          <p class="card-title-desc common-txt">To Add funds into your account, kindly choose the desired currency and specify the amount below. Follow the instructions provided to complete the transfer process.</p>
        </div>
      </div>
      <div class="my-2 contain-width">
        <?php if ($step == 1) { ?>
          <div class="row">
            <div class="col-12 ">
              <div class="inner-page card">
                <div class="card-body ">

                  <form method="post">
                    <input type="hidden" name="ClientID" value="<?= $_REQUEST['ClientID']; ?>" />
                    <div class="row ">
                      <div class="col-md-6 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="v_currency">Select Currency</label>
                          <i class="fa-solid fa-angle-down"></i>
                          <select name="v_currency" id="v_currency" class="form-select" title="Select Currency" required>
                            <option value="" selected="selected">Select Currency</option>
                            <?php

                            $cirr_get_value = bank_assign_currency("$member_account_number");

                            // print_r($cirr_get_value);

                            foreach ($cirr_get_value as $currv) { ?>
                              <option value="<?= $currv; ?>">
                                <?= $currv; ?>
                              </option>
                            <? } ?>
                          </select>

                        </div>
                      </div>
                      <div class="col-md-6 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="v_sender_name">Sender Name</label>
                          <input class="form-control" name="v_sender_name" id="v_sender_name" type="text" title="Sender Name" required>
                        </div>
                      </div>
                      <div class="col-md-6 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="v_amount">Top up Amount</label>
                          <input type="number" class="form-control" name="v_amount" id="v_amount" title="Deposit Amount" step="0.001" required>
                        </div>
                      </div>
                      <div class="col-md-6 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="v_sender_address">Sender Address</label>
                          <input class="form-control" name="v_sender_address" id="v_sender_address" type="text" title="Sender Address" required>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 my-2 descrip">
                        <div class="form-floating inner_page_input">
                          <!--<label for="v_descricption">Descricption</label>-->
                          <!--<input class="form-control" name="v_descricption" id="v_descricption" type="text"  title="Descricption" required>-->
                          <textarea placeholder="Description" rows="10" name="v_descricption" id="comment_text" cols="70" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                        </div>
                      </div>

                    </div>
                    <div class="form-group common-btn">
                      <!--<i class="<?= $data['fwicon']['circle-plus']; ?>"></i>-->
                      <button type="submit" class="btn btn-sm submit-cmn-btn" name="btn_submit" value="Submit">Submit</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <!-- end col -->
          </div>
        <? } ?>
        <?php if ($step == 2) {

          if ($_SESSION['s_currency'] == "") {

            header("location:add-money.php");
            exit;
          }

        ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="inner-page card">
                <div class="card-body">
                  <h4 class="header-title ">STEP - 2 <a class="btn btn-danger btn-sm" href="mypdf/receipt-add-money.php" title="Download PDF" target="_blank" style="float: right;" download=""><i class="fa-solid fa-file-pdf text-light"></i></a></h4>
                  <p class="card-title-desc ">Confirm Data and Select Your Preferred Bank.</p>
                  <div class="col-sm-12 col-xl-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="media">
                          <div class="media-body">
                            <h5 class="font-size-14">Amount to Add -
                              <?= $_SESSION['s_currency']; ?>
                              <?= $_SESSION['s_amount']; ?>
                              -
                              <?= $_SESSION['s_sender_name']; ?>
                            </h5>
                            <!--<h5 class="font-size-12" title="Sender Name"><?= $_SESSION['s_sender_name']; ?></h5>

							<h5 class="font-size-11"  title="Address"><?= $_SESSION['s_sender_address']; ?></h5>

							<h5 class="font-size-11"  title="Descricption"><?= $_SESSION['s_descricption']; ?></h5>-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php

                  $selbid = db_rows("SELECT assign_bank FROM tbl_member_bank_account WHERE client_id='$member_account_number' and bank_status='Active' ");



                  foreach ($selbid as $key => $rsbid) {



                    $assign_banks = $rsbid['assign_bank'];

                    $selcurrdetail = db_rows("SELECT * FROM tbl_common_bank_account WHERE bank_id='$assign_banks' and  bank_supported_currency like '%" . $_SESSION['s_currency'] . "%'");

                    if ($db_counts == 1) {



                      $bankdetails = $selcurrdetail[0];



                  ?>
                      <form name="form-submit" method="post">
                        <input type="hidden" id="bankid44" name="bankid" value="<?= $bankdetails['bank_id'] ?>">
                        <input type="hidden" name="bank_name" value="<?= $bankdetails['bank_name'] ?>">
                        <input type="hidden" name="bank_account_number" value="<?= $bankdetails['bank_account_number'] ?>">
                        <input type="hidden" name="bank_swift_code" value="<?= $bankdetails['bank_swift_code'] ?>">
                        <input type="hidden" name="bank_address" value="<?= $bankdetails['bank_address'] ?>">
                        <div class="col-xl-12">
                          <div class="card">
                            <h5 class="card-header mt-0">
                              <?= $bankdetails['bank_name'] ?>
                            </h5>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6 inner-col my-2">
                                  <label>Beneficiary Name : </label>
                                  <?= $bankdetails['account_beneficiary'] ?>
                                </div>
                                <div class="col-md-6 inner-col my-2">
                                  <label>Beneficiary Address : </label>
                                  <?= $bankdetails['beneficiary_address'] ?>
                                </div>
                                <div class="col-md-6 inner-col my-2">
                                  <label>IBAN / Bank Account Number : </label>
                                  <?= $bankdetails['bank_account_number'] ?>
                                </div>
                                <div class="col-md-6 inner-col my-2">
                                  <label>Swift Code / BIC : </label>
                                  <?= $bankdetails['bank_swift_code'] ?>
                                </div>
                                <div class="col-md-6 inner-col my-2">
                                  <label>Bank Name : </label>
                                  <?= $bankdetails['bank_name'] ?>
                                </div>
                                <div class="col-md-6 inner-col my-2">
                                  <label>Bank Address : </label>
                                  <?= $bankdetails['bank_address'] ?>
                                </div>
                              </div>
                              <input type="submit" id="submit" class="btn btn-sm btn-success" name="btn_add_money" title="Add Money" value="Add Money">
                            </div>
                          </div>
                        </div>
                      </form>
                  <?

                    }
                  } ?>
                  <!--<div class="form-group col-12 my-2 text-end">-->
                  <!--<input type="submit" id="submit" class="btn btn-success" name="btn_add_money" value="Add Money">-->
                  <!--<input type="submit" id="back" class="btn btn-success" name="btn_back" value="Back">-->
                  <!-- </div>-->
                  <!-- </form>-->
                </div>
              </div>
            </div>
          </div>
        <? } ?>
      </div>
    </div>
    <!-- container-fluid -->
  </div>
  <? include($data['Path'] . '/footer' . $data['iex']); ?>
  <!-- End Page-content -->
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<!-- JAVASCRIPT -->
<script>
  $(function() {

    $("#submit99").click(function() {

      if ($('input[type=radio][name=bankid]:checked').length == 0)

      {

        alert("Please select atleast one Bank");

        return false;

      } else

      {

        //alert("radio button selected value: ");

      }

    });

  });
</script>
</body>

</html>