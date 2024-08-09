<?php

include "common.php";

include "controller/blade.member-statement.php";

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content transfer  membership-page">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="float-start w-50">
              <h4 class="header-title"><i class="<?= $data['fwicon']['mystatement']; ?> fa-fw"></i> Statements [
                <?= $rows; ?>
                ]</h4>
            </div>
            <div class="float-start right-download w-50 text-end">
              <h4 class="header-title">&nbsp;
                <a class="btn btn-success btn-sm ms-1" href="<?= $data['Host']; ?>/mypdf/success-statement-exl<?= $data['ex'] ?>?bid=<?= $member_account_number; ?>&str=<?= $pdfurl; ?>" title="Download Account Statement" target="_blank" style="float: right;" download="">
                  <i class="<?= $data['fwicon']['excel']; ?> text-light"></i>
                </a>&nbsp;
                <a class="btn btn-danger btn-sm" href="<?= $data['Host']; ?>/mypdf/success-statement<?= $data['ex'] ?>?bid=<?= $member_account_number; ?>&str=<?= $pdfurl; ?>" title="Download Account Statement" target="_blank" style="float: right;" download="">
                  <i class="<?= $data['fwicon']['pdf']; ?> text-light"></i>
                </a>&nbsp;
                <span id="currbal" class="btn btn-info btn-sm mx-2" style="float: right;">View Balance</span>
              </h4>
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
      <div class="row contain-width">
        <div class="col-12 ">
          <div class="inner-page card">
            <div class="card-body">
              <div class="row  mb-2 mx-0">
                <?php include "common/statement_search_form.php"; ?>

                <?

                if (isset($requrl) && $requrl) {

                  $msg = "Search Records Not Found";

                ?>
                  <div class="text-end my-2 px-1 "><a href="<?= $data['Host']; ?>/member-statement<?= $data['ex'] ?>" class="badge text-bg-success" title="click to view all records" style="padding: 1em 2em;">View All Records</a></div>
                <? } ?>
                <? if ($rows > 0) { ?>
                  <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                      <thead class="bg-success text-white">
                        <tr class="font-weight-bolder">
                          <th scope="col" style="width: 100px;">TransID</th>
                          <th scope="col">User</th>
                          <th scope="col">Bill&nbsp;Amt</th>
                          <!-- <th scope="col">Trans&nbsp;Amt</th> -->
                          <th scope="col">Trans&nbsp;Response</th>
                          <th scope="col">Trans&nbsp;Status</th>
                          <th scope="col">Available&nbsp;Balance</th>
                          <th scope="col">Settlement&nbsp;Date</th>
                          <th scope="col">Description</th>
                          <th scope="col">&nbsp;</th>
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
                            <td><?= $tranlist['usr_name']; ?></td>
                            <td><?= $tranlist['transaction_currency']; ?>
                              <?= $tranlist['transaction_amount']; ?></td>
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
                            <td><span class="badge rounded-pill text-bg-success m-1 p-1">
                                <?= $tranlist['transaction_status']; ?>
                              </span></td>
                            <td><?= $tranlist['converted_transaction_currency']; ?>
                              <?= amount_format($tranlist['available_balance']); ?>
                              <? //=$balamt;
                              ?>
                            </td>
                            <td>
                              <?= !empty($tranlist['admin_transaction_date']) ? date('Y-m-d', strtotime($tranlist['admin_transaction_date'])) : ''; ?>
                            </td>
                            <td>
                              <!-- <?= $tranlist['admin_transaction_desc']; ?> -->
                              <?= !empty($tranlist['transaction_purpose']) ? $tranlist['transaction_purpose'] : $tranlist['usr_descricption']; ?>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                        <? } ?>
                        <tr>
                          <? if (isset($paginationCtrls) && $paginationCtrls) { ?>
                            <td colspan="10">
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
                  <div class="alert alert-danger font-weight-bolder text-center alert-msg" role="alert">
                    <?= $msg; ?>
                  </div>
                <? } ?>
              </div>
            </div>
            <? include($data['Path'] . '/footer' . $data['iex']); ?>

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
<input type="hidden" id="memidx" value="<?= $member_account_number; ?>">
<script>
  $(document).ready(function() {

    $("#currbal").click(function() {

      var memidx = $("#memidx").val();

      // alert(memidx);

      $.ajax({

        type: "POST",

        url: "balance-request.php",

        data: {
          memid: memidx
        }

      }).done(function(data) {

        //alert(data);

        $("#currbal").html(data);

      });

    });

    // $("#status_csearch").css("display","none"); // for hide search by status 

  });
</script>
</body>

</html>