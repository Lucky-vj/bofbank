<?php

include "common.php";

include "controller/blade.company-details.php";

?>

<!-- ============================================================== -->

<!-- Start right Content here -->

<!-- ============================================================== -->

<div class="main-content">

  <div class="page-content">

    <div class="container-fluid">

      <!-- start page title -->

      <div class="row">

        <div class="col-12">

          <div class="page-title-box d-flex align-items-center justify-content-between">

            <h4 class="heading-ad"><i class="<?= $data['fwicon']['comp-profile']; ?> fa-fw"></i> <?= $data['PageName']; ?> </h4>

            <div class="page-title-right">

              <ol class="breadcrumb m-0">

                <li class="breadcrumb-item"><a href="<?= $data['Host-Home']; ?>" title="Home">Home</a></li>

                <li class="breadcrumb-item active"><?= $data['PageName']; ?>

                </li>

                </li>

              </ol>

            </div>

          </div>

        </div>

      </div>

      <?php if (isset($_SESSION['regmsg']) && $_SESSION['regmsg'] == "Ok") { ?>

        <h1 class="mb-2 text-center"> Thanks For Registration </h1>

        <div class="row">

          <div class="col-md-12">

            <h5>

              <div class="alert alert-success fade in alert-dismissible show text-center"> You Have Successfully Registered. Login Details are Sent Your Registered Email ID.<br>

                Your Account Active after Admin Approval </div>

            </h5>

          </div>

        </div>

      <?php unset($_SESSION['regmsg']);
      } ?>



      <?php if (isset($_SESSION["s_status"]) && $_SESSION["s_status"] == 'New') { ?>

        <div class="row">

          <div class="col-md-12">

            <h5>

              <div class="alert alert-danger fade in alert-dismissible show text-center"> Your Account Has Not Active Yet, Please Wait for Admin Approval </div>

            </h5>

          </div>

        </div>

      <?php } ?>



      <!-- end page title -->

      <div class="row mb-4">

        <div class="col-xl-2"> </div>

        <div class="col-xl-12">

          <div class="row">

            <div class="col-md-7">

              <div class="btn-toolbar" role="toolbar"> </div>

            </div>

            <div class="col-md-5">

              <div class="btn-toolbar justify-content-md-end" role="toolbar">

                <div class="btn-group ml-md-2 mb-3"> </div>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-lg-12">



              <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] == "ok") { ?>



                <div class="alert alert-success alert-dismissible fade show" role="alert">

                  <strong>Success! </strong> Company Detail Update Successfully.

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>

              <?php unset($_SESSION['msg']);
              } ?>



              <div class="card">

                <div class="card-body">

                  <h3>Update Your Company Details</h3>

                  <form method="post">

                    <div class="row">

                      <div class="col-md-6 my-2">

                        <div class="form-floating">

                          <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $rs['company_name']; ?>" required>

                          <label for="company_name">Company Name</label>

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

                    <button type="submit" class="btn btn-sm btn-success" name="btn_update" value="Update Company Details"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> Submit</button>

                  </form>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="col-xl-2"> </div>

      </div>

      <!-- end row -->

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

<!-- /Right-bar -->

<!-- Right bar overlay-->

<div class="rightbar-overlay"></div>



</body>

</html>