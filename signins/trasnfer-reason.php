<?php
include "../common.php";
include "controller/blade.trasnfer-reason.php";
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
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="heading-ad"><?= $data['PageName']; ?></h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg></li>
                <li class="breadcrumb-item active"><?= $data['PageName']; ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="row mb-4">
        <div class="col-xl-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <?php if (isset($_SESSION['msgok'])) { ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success!</strong> <?php echo $_SESSION['msgok']; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php unset($_SESSION['msgok']);
                  } ?>
                </div>
              </div>

              <?php if ((isset($_GET['action']) == 'edit') or (isset($_GET['action']) == 'add')) { ?>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="text-logo"> <?= ucwords($action); ?> <?= $data['PageName']; ?></h4>
                        <form method="post">
                          <input type="hidden" name="bid" value="<? if (isset($_GET['bid']) && $_GET['bid']) {
                                                                    echo $_GET['bid'];
                                                                  } ?>">
                          <!--class="needs-validation" novalidate-->
                          <div class="row">

                            <div class="col-md-12 my-2">
                              <div class="form-floating">
                                <input type="text" name="reason" id="reason" class="form-control" placeholder="reason" value="<?php echo $reason ?>" title="reason" required>
                                <!-- <label for="reason"><?= $data['PageName']; ?></label> -->
                              </div>
                            </div>

                          </div>
                          <button type="submit" class="btn btn-sm btn-primary" name="btn_bank" value="<?= ucwords($action); ?>"><i class="<?= $data['fwicon']['tick-circle']; ?>"></i> Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <? } ?>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body row">
                      <div class="col-lg-8">
                        <h4 class="text-logo">Added <?= $data['PageName']; ?> </h4>
                      </div>
                      <div class="col-lg-4 text-end"><a name="Add" href="trasnfer-reason<?= $data['ex']; ?>?action=add" value="Add A New <?= $data['PageName']; ?>!" title="Add A New <?= $data['PageName']; ?>" class="btn btn-sm btn-primary"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i></a></div>
                      <?php if ($db_counts > 0) { ?>
                        <div class="table-responsive">
                          <table class="table table-centered table-nowrap mb-0">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col"><strong><?= $data['PageName']; ?></strong></th>
                                <th scope="col" style="width:150px;"><strong>Action</strong></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i = 1;
                              foreach ($rows as $key => $result) {
                              ?>
                                <tr>
                                  <td><?= $i++ ?></td>
                                  <td><?= $result['reason'] ?></td>
                                  <td>
                                    <a href="<?= $data['Admins']; ?>/trasnfer-reason<?= $data['ex']; ?>?bid=<?= $result['id'] ?>&action=edit"><i class="<?= $data['fwicon']['edit']; ?> mx-1" title="Edit"></i></a>

                                    <a href="<?= $data['Admins']; ?>/trasnfer-reason<?= $data['ex']; ?>?bid=<?= $result['id'] ?>&action=delete&key=deleted" onClick="return confirm('Are you Sure to Delete');" title="Delete <?= $data['PageName']; ?>"><i class="<?= $data['fwicon']['delete']; ?> text-danger mx-1"></i></a>

                                    <? if (isset($result['json_log_history']) && $result['json_log_history']) { ?>
                                      <i class="<?= $data['fwicon']['circle-info']; ?> text-info fa-fw" onclick="popup_openv('<?= $data['Host'] ?>/common/json_log<?= $data['ex'] ?>?tableid=<?= $result['id'] ?>&tablename=trasnfer_reason&tablefieldidname=id')" title="View Json History"></i>
                                    <? } ?>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      <?php } else { ?>
                        <div class="p-2">
                          <div class="alert alert-danger w-100 text-center"> <strong>Record Not Found </strong> </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
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
  <!-- end main content-->
</div>

</div>

</body>

</html>