<?php
include "common.php";
include "controller/blade.member-transactions.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content transfer membership-page">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- <h4 class="header-title"><i class="<?= $data['fwicon']['transaction']; ?> fa-fw"></i>
              <?= $data['PageName']; ?>
              <span class="">[<?= $rows; ?>]</span></h4> -->
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
      <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['msg']);
      } ?>
      <?php //print_r($_SESSION['trans-responce']);
      if (isset($_SESSION['trans-responce']['transID']) && $_SESSION['trans-responce']['transID']) {
        $responcedata = "<table class='table table-centered table-nowrap bg-success-subtle text-dark rounded'><tr><td>Transaction ID</td><td>" . $_SESSION['trans-responce']['transID'] . "</td></tr>";
        $responcedata .= "<tr><td>Amount</td><td>" . $_SESSION['trans-responce']['transAmount'] . "</td></tr>";
        $responcedata .= "<tr><td>Status</td><td>" . $_SESSION['trans-responce']['transStatus'] . "</td></tr></table>";
      ?>
        <script>
          $(document).ready(function() {
            $('#transResponce').modal('show');
            $('#transResponce .modal-body').html("<?= $responcedata ?>");
          });
        </script>
      <? unset($_SESSION['trans-responce']);
      } ?>
      <div class="row contain-width">
        <div class="col-12 ">
          <div class="inner-page card">
            <div class="card-body">
              <div class="row  mb-2 mx-0">
                <!-- <div class="form-floating inner_page_input"> -->
                <?php include "common/trans_search_form.php"; ?>
                <!-- </div> -->
                <?php if (isset($requrl) && $requrl) {
                  $msg = "Search Records Not Found"; ?>
                  <div class="text-end my-2 px-1 ">
                    <a href="<?= $data['Host']; ?>/member-transactions<?= $data['ex'] ?>" class="badge text-bg-success" title="click to view all records" style="padding: 1em 2em;">View All Records</a>
                  </div>
                <? } ?>
                <? if ($rows > 0) { ?>
                  <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                      <thead class="bg-success text-white">
                        <tr class="font-weight-bolder">
                          <th scope="col">TransID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Bill&nbsp;Amt</th>
                          <th scope="col">Trans&nbsp;Response</th>
                          <th scope="col">Trans&nbsp;Status</th>
                          <th scope="col">Description</th>
                          <th scope="col">Settlement&nbsp;Date</th>
                          <th scope="col">Settlement&nbsp;Info</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($nquery as $key => $tranlist) {
                        ?>
                          <tr onclick="window.open('transfer_export.php?tid=<?= $tranlist['transaction_id']; ?>', '_blank');" style="cursor:pointer;">
                            <td>
                              <a href="transfer_export.php?tid=<?= $tranlist['transaction_id']; ?>" title="<?= $tranlist['transaction_id']; ?>" target="_blank">
                                <?= $tranlist['transaction_id']; ?>
                              </a>
                            </td>
                            <td>
                              <?= ($tranlist['transaction_for'] == 'Internal Money Transfer') ? 'SELF' : $tranlist['usr_name']; ?>
                            </td>
                            <td>
                              <?= $tranlist['transaction_currency']; ?>
                              <?= $tranlist['transaction_amount']; ?>
                            </td>
                            <!-- <td>
                              <?= $tranlist['converted_transaction_currency']; ?>
                              <?= $tranlist['converted_transaction_amount']; ?>
                            </td> -->
                            <!-- <td><?= date('Y-m-d', strtotime($tranlist['transaction_date'])); ?></td> -->
                            <td><? if ($tranlist['transaction_type'] == "Credit") { ?>
                                <i class="<?= $data['fwicon']['circle-dot']; ?> text-success mr-1"></i>
                              <? } else { ?>
                                <i class="<?= $data['fwicon']['circle-dot']; ?> text-danger mr-1"></i>
                              <? } ?>
                              <?= $tranlist['transaction_type']; ?>
                              -
                              <?= $tranlist['transaction_for']; ?>
                            </td>
                            <td><? if ($tranlist['transaction_status'] == "Process") {

                                  $mscclr = "warning";
                                } elseif ($tranlist['transaction_status'] == "Success") {

                                  $mscclr = "success";
                                } elseif ($tranlist['transaction_status'] == "Failed") {

                                  $mscclr = "danger";
                                } else {

                                  $mscclr = "secondary";
                                }
                                ?>
                              <span class="badge rounded-pill text-bg-<?= $mscclr; ?> m-1 p-1">
                                <?= $tranlist['transaction_status']; ?>
                              </span>
                            </td>
                            <td>
                              <?= !empty($tranlist['transaction_purpose']) ? $tranlist['transaction_purpose'] : $tranlist['usr_descricption']; ?>
                            </td>
                            <td>
                              <?= !empty($tranlist['admin_transaction_date']) ? date('Y-m-d', strtotime($tranlist['admin_transaction_date'])) : ''; ?>
                            </td>
                            <td>
                              <?= ($tranlist['transaction_status'] == "Rejected") ? $tranlist['admin_transaction_desc'] : ""; ?>
                            </td>
                          </tr>
                        <? } ?>
                        <tr>
                          <? if (isset($paginationCtrls) && $paginationCtrls) { ?>
                            <td colspan="9">
                              <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                            </td>
                          <? } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                <? } else {

                  $msg = "You do not have any transaction yet.";

                  if (isset($requrl) && $requrl) {

                    $msg = "Search Records Not Found";
                  }

                ?>
                  <!-- <div class="alert alert-danger font-weight-bolder text-center" role="alert">
                  <?= $msg; ?>
                </div> -->
                <? } ?>
              </div>
            </div>
            <? include($data['Path'] . '/footer' . $data['iex']); ?>

            <!--<div class="alert alert-danger font-weight-bolder text-center alert-msg" role="alert">-->
            <!--      <?= $msg; ?>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
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