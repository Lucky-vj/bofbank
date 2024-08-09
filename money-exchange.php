<?php
include "common.php";
include "controller/blade.money-exchange.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<style>
  .themed-grid-col {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    background-color: rgba(86, 61, 124, .15);
    border: 1px solid rgba(86, 61, 124, .2);
  }
</style>
<div class="main-content money-exchange">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
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
    </div>
    <div class="contain-width">
      <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['msg']);
      } ?>

      <div class="row">
        <div class="col-lg-12">
          <div class="inner-page card">

            <div class="card-body">
              <div class="row right-input-row">
                <div class="col-xl-7 col-lg-12 col-md-6 col-sm-12">
                  <div class="btn btn-sm money-balance">
                    <p>Available Balance</p>
                    <h1>
                      <?= $_SESSION['AccountCurrency']; ?>
                      <!-- <span> -->
                      <?= $_SESSION['AccountBalance']; ?>
                      <!-- </span> -->
                    </h1>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12">
                  <div class="row">

                    <?php if ($step == 1) { ?>
                      <div class="col-sm-12">
                        <form method="post">
                          <div class="row">
                            <div class="col-sm-12 my-2">
                              <div class="form-floating moneyx">
                                <i class="fa-solid fa-angle-down"></i>
                                <select name="Sender_Account" id="Sender_Account" class="form-select" title="Search for account number" required="">
                                  <option value="">select account no</option>
                                  <option value="<?= $getaccountNumber; ?>">
                                    <?= $getaccountNumber; ?> - <?= $_SESSION['AccountCurrency']; ?> <?= $_SESSION['AccountBalance']; ?>
                                  </option>
                                  <?php
                                  foreach ($get_iban as $getiban) { ?>
                                    <option value="<?= $getiban['accountid']; ?>||<?= $getiban['IBAN_issuer']; ?>||<?= $getiban['currency']; ?>">
                                      <?= $getiban['accountid']; ?>
                                      -
                                      <?= $getiban['currency']; ?> <?= get_user_balance_amt($client_id, $getiban['IBAN_issuer']); ?>
                                    </option>
                                  <? } ?>
                                </select>
                                <!-- <label for="Sender_Account">Select Account No</label> -->
                              </div>
                            </div>
                            <div class="col-sm-12 my-2">
                              <div class="form-floating moneyx">
                                <input type="number" class="form-control" name="Amount" id="Amount" title="Transfer Amount" placeholder="transfer amount" required />
                                <!-- <label for="Amount">Enter Transfer Amount</label> -->
                              </div>
                            </div>
                            <div class="col-sm-12 my-2">
                              <div class="form-floating moneyx">
                                <i class="fa-solid fa-angle-down"></i>
                                <select name="Receipent" id="Receipent" class="form-select" title="Search for receipent" required="">
                                  <option value="">search for recipient</option>
                                  <option value="<?= $getaccountNumber; ?>">
                                    <?= $getaccountNumber; ?> - <?= $_SESSION['AccountCurrency']; ?> <?= $_SESSION['AccountBalance']; ?>
                                  </option>
                                  <?php
                                  foreach ($get_iban as $getiban) { ?>
                                    <option value="<?= $getiban['accountid']; ?>||<?= $getiban['IBAN_issuer']; ?>||<?= $getiban['currency']; ?>">
                                      <?= $getiban['accountid']; ?>
                                      -
                                      <?= $getiban['currency']; ?> <?= get_user_balance_amt($client_id, $getiban['IBAN_issuer']); ?>
                                    </option>
                                  <? } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group common-btn">
                            <button type="submit" class="btn btn-sm submit-cmn-btn" name="btn_submit" value="Submit">continue</button>
                          </div>
                        </form>
                      </div>
                    <? } ?>
                    <?php if ($step == 2) {

                      $availableb = $_SESSION['AccountBalance'];
                      $transb = $_SESSION['S_Amount'];
                      $st = "";
                      if ($availableb < $transb) {
                        $st = 1;
                      }
                    ?>
                      <div class="col-sm-12">
                        <form method="post">
                          <div class="row p-4">
                            <div class="col-sm-12 themed-grid-col">
                              <div class="fs-5">From Account Number :<?= $_SESSION['S_Sender_Account']; ?></div>
                              <div class="fs-6">Transaction Amount :<?= $_SESSION['AccountCurrency']; ?> <?= $_SESSION['S_Amount']; ?></div>
                            </div>

                            <div class="col-sm-12 text-center "><i class="<?php echo $data['fwicon']['arrow-right-arrow-left']; ?> fa-fw m-4 fs-4"></i></div>
                            <div class="col-sm-12 themed-grid-col">
                              <div class="fs-5">To Account Number :<?= $_SESSION['S_Receipent']; ?><?= $_SESSION['S_iban']; ?></div>
                              <div class="fs-6">
                                Exchange Amount : <?= $_SESSION['S_currency']; ?> <?php echo currencyConverter($_SESSION['AccountCurrency'], $_SESSION['S_currency'], $_SESSION['S_Amount']) ?>
                              </div>

                            </div>

                          </div>
                          <div class="col-sm-12 my-2 px-2">
                            <a href="money-exchange.php" class="btn btn-outline-success btn-sm template">Back</a>
                            <?php if ($st == 1) { ?>
                              <a class="btn btn-danger btn-sm template">Insufficient funds</a>
                            <?php } else { ?>
                              <input type="submit" name="pay_now" value="Pay Now" class="btn btn-success btn-sm template">
                            <?php } ?>
                          </div>
                        </form>
                      </div>
                    <? } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <? include($data['Path'] . '/footer' . $data['iex']); ?>
      </div>
    </div>
  </div>
</div>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<!-- Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script>
  $(document).ready(function() {
    $('#Sender_Account').change(function() {
      var selectedAccount = $(this).val();
      $('#Receipent option').prop('hidden', false); // reset all options to visible
      $('#Receipent option[value="' + selectedAccount + '"]').prop('hidden', true); // hide the selected account
    });
  });

  $(document).ready(function() {
    $('#Sender_Account').change(function() {
      var selectedAccount = $(this).val().split('||')[0];
      var selectedBalance = $(this).find('option:selected').text().split('-')[1];

      // update the balance display
      $('.money-balance h1').text(selectedBalance);
    });
  });
</script>
</body>

</html>