<?php
include "common.php";
include "controller/blade.crypto-exchange.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<!-- start -->
<style>
  .page-title-box {
    padding-bottom: 0px;
  }

  .form-floating.inner_page_input>.form-select,
  .form-floating.inner_page_input>input {
    height: 36px !important;

  }

  .inner-page.card {
    padding: 30px;
    height: 36em;
  }

  /* fill */
  .descrip .form-floating.inner_page_input {
    height: 100px !important;

  }

  .crypto h4.header-title.common-txt {
    margin-bottom: 0px;
  }
</style>
<!-- end -->
<div class="main-content add-money crypto common-inner-css">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad"><i class="<?= $data['fwicon']['bitcoin']; ?> fa-fw"></i>
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
          <h4 class="header-title common-txt">Crypto Exchange</h4>
        </div>
      </div>
      <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['msg']);
      } ?>

      <div class="my-2 contain-width">
        <?php if ($step == 1) { ?>
          <div class="row">
            <div class="col-12 ">
              <div class="inner-page card">
                <div class="card-body ">
                  <?php /*?><p class="card-title-desc ">To add funds to your account please select the currency and the amount and other  below to receive transfer instructions.</p><?php */ ?>
                  <form method="post">
                    <div class="row">
                      <div class="col-md-4 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="currency_from">Select Currency</label>
                          <i class="fa-solid fa-angle-down"></i>
                          <select name="currency_from" id="currency_from" class="form-select" title="Select Currency" required>
                            <option value="" selected="selected">Select Currency</option>
                            <?php

                            $cirr_get_value = bank_assign_currency("$clientid");

                            foreach ($cirr_get_value as $currv) { ?>
                              <option value="<?= $currv; ?>">
                                <?= $currv; ?>
                              </option>
                            <? } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="amount">Amount</label>
                          <input class="form-control" name="amount" id="amount" type="number" title="Amount" placeholder="Amount" required>
                        </div>
                      </div>
                      <div class="col-md-4 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="currency_to">Select Crypto</label>
                          <i class="fa-solid fa-angle-down"></i>
                          <select name="currency_to" id="currency_to" class="form-select" title="Select Currency to" required>
                            <option value="" selected="selected">Select Crypto</option>
                            <option value="USDT">USDT</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="amount">Receiver Wallet Address</label>
                          <input class="form-control" name="receiver_wallet_address" id="receiver_wallet_address" type="text" title="Receiver Wallet Address" required>
                        </div>
                      </div>
                      <div class="col-md-6 inner-col my-2">
                        <div class="form-floating inner_page_input">
                          <label for="network">select network</label>
                          <i class="fa-solid fa-angle-down"></i>
                          <select name="network" id="network" class="form-select" title="Select Network" required>
                            <option value="" selected="selected">Select Network</option>
                            <option value="ERC20">ERC20</option>
                            <option value="TRC20">TRC20</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 my-2 descrip">
                        <div class="form-floating inner_page_input">
                          <!--<label for="v_descricption">Descricption</label>-->
                          <!--<input class="form-control" name="v_descricption" id="v_descricption" type="text"  title="Descricption" required>-->
                          <textarea placeholder="Description" rows="10" name="comment[text]" id="comment_text" cols="74" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                        </div>
                      </div>
                      <!--<div class="form-group col-12 my-2">-->
                      <!--  <button type="submit" class="btn btn-sm btn-success template" name="btn_submit" value="Submit"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> Submit</button>-->
                      <!--</div>-->
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

          if ($_SESSION['crypto']['amount'] == "") {
            header("location:crypto-exchange.php");
            exit;
          }

          //print_r($_SESSION['crypto']);
          //print_r($_SESSION['cryptovalue']);

        ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card" style="max-width:600px;margin:0 auto;">
                <div class="card-body">



                  <form name="form-submit" method="post">
                    <div class="col-xl-12">
                      <div class="card">
                        <h5 class="card-header mt-0">Confirm Conversion : Rate - <?= $_SESSION['cryptovalue']['buy_price']; ?></h5>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-5 my-2 text-center">
                              <div><img src="images/currency/<?= strtolower($_SESSION['crypto']['currency_from']); ?>.png" class="img-thumbnail" alt="..." style="max-height:40px !important;"></div>
                              <label class="text-center my-1">From </label>
                              <div class="h1">
                                <?= $_SESSION['crypto']['amount']; ?> <?= $_SESSION['crypto']['currency_from']; ?>
                              </div>
                            </div>
                            <div class="col-md-2 my-2"><i class="fa-solid fa-arrow-right-long"></i></div>

                            <div class="col-md-5 my-2 text-center">
                              <div><img src="images/currency/<?= strtolower($_SESSION['crypto']['currency_to']); ?>.png" class="img-thumbnail" alt="..." style="max-height:40px !important;"></div>
                              <label class="text-center my-1">Receive </label>
                              <div class="h1">
                                <?= $_SESSION['cryptovalue']['amount']; ?> <?= $_SESSION['crypto']['currency_to']; ?>
                              </div>
                            </div>


                          </div>
                          <div class="text-center">
                            <input type="submit" id="submit" class="btn btn-sm btn-success" name="btnCrypto" title="Crypto Exchange" value="Convert (10s)">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                <?  } ?>

                </div>
              </div>
            </div>
          </div>

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


<?php
$i = 0;
if (isset($_GET['step']) && $_GET['step'] == 2) {
  $_SESSION['cnt'] = $_SESSION['cnt'] + 1;  ?>
  <script language="javascript">
    setTimeout(function() {
      window.location.reload(1);
    }, 10000);
  </script>
<?php

  if ($_SESSION['cnt'] >= 6) {
    unset($_SESSION['cnt']);
    unset($_SESSION['crypto']);
    unset($_SESSION['cryptovalue']);
    $_SESSION['msg'] = "Session expired. Please try again";
    header("location:crypto-exchange.php");
    exit;
  }
}
?>

<script>
  var count = 10;
  $('#counter').text(count);
  var timer = setInterval(function() {
    count--;
    //if (count === 0) {
    //clearInterval(timer);
    //window.location = 'http://www.google.com';
    //}
    $('#submit').val("Convert (" + count + "s)");
  }, 1000); // Every second
</script>

</body>

</html>