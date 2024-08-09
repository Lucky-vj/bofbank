<?php
include "../common.php";
include "controller/blade.manage-fee.php";
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
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="trans main-content admin">
  <div class="trans page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <!-- end page title -->
      <div class="row mb-4">
        <div class="col-md-12 my-2">
          <div class="row">
            <div class="col-lg-12">
              <?php if (isset($_SESSION['msg'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong>
                  <?= $_SESSION['msg']; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php unset($_SESSION['msg']);
              } ?>
              <div class="card">
                <div class="card-body">
                  <!--<h4 class="header-title">Update Your Fee Engine / Transaction Fee : <?php echo $Client_ID; ?></h4>-->
                  <form method="post">
                    <input type="hidden" name="sid" value="<?= $rs['client_id']; ?>" />
                    <div class="row">
                      <div class="col-sm-4">
                        <!-- <label> Setup Fee One Time </label> -->
                        <input type="number" step="0.01" id="setup_fee_one_time" name="setup_fee_one_time" placeholder="Setup Fee One Time" class="form-control my-2" title="Setup Fee One Time" value="<?= $rs['setup_fee_one_time']; ?>" required />
                      </div>
                      <div class="col-sm-4">
                        <!-- <label> Yearly Fee </label> -->
                        <input type="number" step="0.01" name="yearly_fee" id="yearly_fee" placeholder="Yearly Fee" class="form-control my-2" title="Yearly Fee" value="<?= $rs['yearly_fee']; ?>" required />
                      </div>
                      <div class="col-sm-4">
                        <!-- <label> Monthly Fee </label> -->
                        <input type="number" step="0.01" name="monthly_fee" id="monthly_fee" placeholder="Monthly Fee" class="form-control my-2" title="Monthly Fee" value="<?= $rs['monthly_fee']; ?>" required />
                      </div>
                    </div>
                    <h2 class="fs-title">Transaction Fee</h2>
                    <div class="row py-2">
                      <div class="col-sm-12 ">
                        <!-- <label> Credit Transaction Fee </label> -->
                      </div>
                      <div class="col-sm-6">
                        <div class="form-floating">
                          <input type="number" step="0.001" name="credit_mdr_fee" id="credit_mdr_fee" placeholder="Credit MDR Transaction Fee in %" class="form-control my-2" title="Credit MDR Transaction Fee in %" value="<?= $rs['credit_mdr_fee']; ?>" required />
                          <!-- <label for="credit_mdr_fee">Credit MDR Transaction Fee in %</label> -->
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-floating">
                          <input type="number" step="0.001" name="credit_min_fee" id="credit_min_fee" placeholder="Credit Minimum Transaction Fee" class="form-control my-2" title="Credit Minimum Transaction Fee" value="<?= $rs['credit_min_fee']; ?>" required />
                          <!-- <label for="credit_min_fee">Credit Minimum Transaction Fee</label> -->
                        </div>
                      </div>
                    </div>
                    <div class="row py-2 mt-2">
                      <div class="col-sm-12 ">
                        <!-- <label> Debit Transaction Fee </label> -->
                      </div>
                      <div class="col-sm-6">
                        <div class="form-floating">
                          <input type="number" step="0.001" name="debit_mdr_fee" id="debit_mdr_fee" placeholder="Debit MDR Transaction Fee in %" class="form-control my-2" title="Debit MDR Transaction Fee in %" value="<?= $rs['debit_mdr_fee']; ?>" required>
                          <!-- <label for="debit_mdr_fee">Debit MDR Transaction Fee in %</label> -->
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-floating">
                          <input type="number" step="0.001" name="debit_min_fee" id="debit_min_fee" placeholder="Debit Minimum Transaction Fee" class="form-control my-2" title="Debit Minimum Transaction Fee" value="<?= $rs['debit_min_fee']; ?>" required />
                          <!-- <label for="debit_min_fee">Debit Minimum Transaction Fee</label> -->
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-primary template" name="btn_update" value="Update Fees" style="color: black" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- container-fluid -->
</div>
</div>
</body>

</html>