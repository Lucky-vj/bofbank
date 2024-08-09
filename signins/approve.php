<?php

include "../common.php";

include "controller/blade.approve.php";

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content admin">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <?php if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php unset($_SESSION['msg']);
          } ?>
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad">Pending Member</h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg></li>
                <li class="breadcrumb-item active">Pending Member</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <!-- end row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- <h4 class="header-title mb-4">History of Customers Login and Logout</h4> -->
              <?php

              if ($nor > 0) {

              ?>
                <div class="table-responsive">
                  <table class="table table-centered table-nowrap mb-0">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"><strong>Name</strong></th>
                        <th scope="col"><strong>Email</strong></th>
                        <th scope="col"><strong>Mobile No </strong></th>
                        <th scope="col"><strong>Address</strong></th>
                        <th scope="col"><strong>Username</strong></th>
                        <th scope="col"><strong>Timestamp</strong></th>
                        <th scope="col"><strong>Manage</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($rows as $key => $result) {
                      ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td><?= $result['full_name'] ?></td>
                          <td><?= $result['email'] ?></td>
                          <td><?= $result['mobile'] ?></td>
                          <td><?= $result['address_line1'] ?>
                            <br>
                            <?= $result['city'] ?>
                            ,
                            <?= $result['state'] ?>
                            -
                            <?= $result['pincode'] ?>
                          </td>
                          <td><?= $result['username'] ?></td>
                          <td><?= prndate($result['add_date']) ?></td>
                          <td><!--<a href="<?= $data['Admins']; ?>/approve-member<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>" class="badge rounded-pill text-bg-warning">Manage</a>-->
                            <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Profile Details - <?= $result['full_name'] ?> (<?= $result['username'] ?>)" data-ihref="<?= $data['Admins']; ?>/profile_summary<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1"><i class="<?= $data['fwicon']['edit']; ?> mx-1" title="Edit <?= $data['PageName']; ?>"></i></a>

                            <a href="<?= $data['Admins']; ?>/approve<?= $data['ex']; ?>?mid=<?= $result['client_id'] ?>&action=delete" onClick="return confirm('Are you Sure to Delete');" title="Delete <?= $data['PageName']; ?>"><i class="<?= $data['fwicon']['delete']; ?> text-danger mx-1"></i></a>
                          </td>
                        </tr>
                      <?php

                      }

                      ?>
                    </tbody>
                  </table>
                </div>
              <? } else { ?>
                <div class="alert alert-danger font-weight-bolder text-center" role="alert"> No New Registered Member Pending for Approval </div>
              <? } ?>
            </div>
          </div>
          <?php include "footer" . $data['ex']; ?>
        </div>
      </div>
      <!-- end row -->
    </div>
    <!-- container-fluid -->
  </div>
  <!-- End Page-content -->
</div>
<script>
  $(function() {

    // bind change event to select

    $('.dynamic_select').on('change', function() {



      var url = $(this).val(); // get selected value

      if (url) { // require a URL

        window.location = url; // redirect

      }

      return false;

    });

  });
</script>
</div>
</body>

</html>