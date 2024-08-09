<?php

include "common.php";

include "controller/blade.beneficiary-transfer.php";

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="heading-ad">Beneficiary Transfer To
              <? if (isset($beneficiary_name)) {
                echo $beneficiary_name;
              } ?>
            </h4>
          </div>
        </div>
      </div>
      <div class="my-2">
        <?php //if($step==2){ 
        ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title ">Beneficiary Detail</h4>
                <p class="card-title-desc ">Check Beneficiary Detail before transfer Money</p>
                <? if (isset($page_error) && $page_error == 0) { ?>
                  <div class="card">
                    <div class="card-body">
                      <div class="media">
                        <div class="media-body">
                          <div class="row font-size-14">
                            <div class="col-sm-6 col-xl-6 my-2"><strong>Account Number</strong> -
                              <?= $beneficiary_account_number; ?>
                            </div>
                            <div class="col-sm-6 col-xl-6 my-2"><strong>Swift Code</strong> -
                              <?= $beneficiary_swift_code; ?>
                            </div>
                            <div class="col-sm-6 col-xl-6 my-2"><strong>Bank Name</strong> -
                              <?= $beneficiary_bank_name; ?>
                            </div>
                            <div class="col-sm-6 col-xl-6 my-2"><strong>Bank Address</strong> -
                              <?= $beneficiary_bank_address; ?>
                            </div>
                            <div class="col-sm-6 col-xl-6 my-2"><strong>Beneficiary Name</strong> -
                              <?= $beneficiary_name; ?>
                            </div>
                            <div class="col-sm-6 col-xl-6 my-2"><strong>Beneficiary Address</strong> -
                              <?= $beneficiary_address; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card ">
                    <div class="card-body ">
                      <h4 class="header-title">Beneficiary Detail</h4>
                      <form method="post" id="twofaformId" action="beneficiary-transfer.php">
                        <input type="hidden" name="btn_submit" value="Submit" />
                        <input type="hidden" name="beneficiary_name" value="<?= $beneficiary_name; ?>">
                        <input type="hidden" name="beneficiary_account_number" value="<?= $beneficiary_account_number; ?>">
                        <input type="hidden" name="beneficiary_bank_name" value="<?= $beneficiary_bank_name; ?>">
                        <input type="hidden" name="beneficiary_bank_address" value="<?= $beneficiary_bank_address; ?>">
                        <input type="hidden" name="beneficiary_swift_code" value="<?= $beneficiary_swift_code; ?>">
                        <input type="hidden" name="beneficiary_address" value="<?= $beneficiary_address; ?>">
                        <div class="row">
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input class="form-control" name="transaction_amount" id="trans_amt" type="number" title="Deposit Amount" required>
                              <label for="trans_amt">Amount - How much do you want Deposit?</label>
                            </div>
                          </div>
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <select name="transaction_currency" id="trans_curr" class="form-select" title="Select Currency" required>
                                <option value="" selected="selected">Select</option>
                                <?php if (isset($beneficiary_currency) && $beneficiary_currency) { ?>
                                  <option value="<?= $beneficiary_currency; ?>"> <?= $beneficiary_currency; ?> </option>
                                <? } else { ?>
                                  <?php $cirr_get_value = bank_assign_currency("$Client_ID");
                                  foreach ($cirr_get_value as $currv) { ?>
                                    <option value="<?= $currv; ?>"><?= $currv; ?></option><? } ?>
                                <? } ?>

                              </select>
                              <label for="trans_curr">Select Currency</label>
                            </div>
                          </div>
                          <?php /*?><div class="col-md-4 my-2">
                          <div class="form-floating">
                            <input class="form-control" name="transaction_purpose" id="trans_purpose" type="text" title="Purpose for Transfer" required>
                            <label for="trans_purpose">Purpose for Transfer</label>
                          </div>
                        </div><?php */ ?>

                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <select class="form-select" name="trasnfer_reason" id="trasnfer_reason" title="Purpose for Transfer" required>
                                <option value="" selected="selected">Select</option>

                                <?php foreach ($trasnfer_reason_list as $trlist) { ?>
                                  <option value="<?= $trlist['id']; ?>"><?= $trlist['reason']; ?></option>
                                <? } ?>

                              </select>
                              <label for="currency">Purpose for Transfer</label>
                            </div>
                          </div>
                          <div class="col-md-6 my-2">
                            <div class="form-floating">
                              <input class="form-control" name="other_trasnfer_reason" id="other_trasnfer_reason" type="text" title="Other Trasnfer Reason">
                              <label for="amount">Other Transfer Reason</label>
                            </div>
                          </div>

                          <div class="col-md-12 my-2">
                            <button type="submit" class="btn btn-sm btn-success" name="btn_submit" id="btn_submit" value="Submit"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                <? } else { ?>
                  <div class="alert alert-danger" role="alert"> Access Denied </div>
                <? } ?>
              </div>
            </div>
          </div>
          <? // } 
          ?>
        </div>
      </div>
      <? include($data['Path'] . '/footer' . $data['iex']); ?>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  </div>
  <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
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





  // check 2fa

  $("#btn_submit").click(function() {



    var trans_amt = $("#trans_amt").val();

    var trans_curr = $("#trans_curr").val();

    var trans_purpose = $("#trans_purpose").val();



    if (trans_amt == '') {

      alert('Please enter transaction amount');

      $("#trans_amt").focus()

      return false;

    } else if (trans_curr == "") {

      alert('Please select currency');

      $("#trans_curr").focus()

      return false;

    } else if (trans_purpose == "") {

      alert('Please enter transaction purpose');

      $("#trans_purpose").focus()

      return false;

    }



    <?

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
</script>
</body>

</html>