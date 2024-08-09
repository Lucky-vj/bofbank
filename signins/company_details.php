<?php

include "../common.php";

include "controller/blade.company_details.php";

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

        <div class="col-md-12">



          <div class="row">

            <div class="col-lg-12 my-2">

              <?php if (isset($_SESSION['msg'])) { ?>





                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">

                  <strong>Success!</strong> <?= $_SESSION['msg']; ?>

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>

              <?php unset($_SESSION['msg']);
              } ?>

              <div class="card">

                <div class="card-body">

                  <!--<h4 class="header-title">Update Your Company Details - <?php echo $rs['full_name']; ?> : <?php echo $Client_ID; ?></h4>-->

                  <form method="post">



                    <div class="row">

                      <div class="col-md-6 my-2">

                        <div class="form-floating">

                          <input type="text" name="company_name" id="company_names" class="form-control" value="<?php echo $rs['company_name']; ?>" required>

                          <label for="company_names">Company Name</label>

                        </div>

                      </div>



                      <div class="col-md-6 my-2">

                        <div class="form-floating">

                          <input type="text" name="company_registration_no" class="form-control" id="company_registration_no" placeholder="Company Registration Number" value="<?php echo $rs['company_registration_no']; ?>" required>

                          <label for="company_registration_no">Company Registration Number</label>

                        </div>

                      </div>



                      <div class="col-md-6 my-2">

                        <div class="form-floating">

                          <input type="date" name="date_of_incorporation" class="form-control" id="date_of_incorporation" placeholder="Date of Incorporation" value="<?php echo $rs['date_of_incorporation'] ?>" required>

                          <label for="date_of_incorporation">Date of Incorporation</label>

                        </div>

                      </div>



                      <div class="col-md-6 my-2">

                        <div class="form-floating">

                          <input type="text" name="country_of_incorporation" class="form-control" id="country_of_incorporation" placeholder="Country of Incorporation" value="<?php echo $rs['country_of_incorporation'] ?>" required>

                          <label for="country_of_incorporation">Country of Incorporation</label>

                        </div>

                      </div>


                      <div class="col-md-6 my-2">

                        <div class="form-floating">

                          <input type="text" name="city_of_incorporation" class="form-control" id="city_of_incorporation" placeholder="City of Incorporation" value="<?php echo $rs['city_of_incorporation'] ?>" required>

                          <label for="city_of_incorporation">City of Incorporation</label>

                        </div>

                      </div>


                      <div class="col-md-12 my-2">

                        <div class="form-floating">

                          <input type="text" name="company_address" class="form-control" id="company_address" placeholder="Company Address" value="<?php echo $rs['company_address'] ?>" required>

                          <label for="company_address">Company Address</label>

                        </div>

                      </div>

                    </div>



                    <input type="submit" class="btn btn-sm btn-primary mt-1" name="btn_update" value="Update Company Details"><i class="<?= $data['fwicon']['verified']; ?>"></i> Submit</input>

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

<!-- End Page-content -->

</div>

</body>

</html>