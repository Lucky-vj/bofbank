<?php
include "common.php";
include "controller/blade.account-statement-tkb.php";
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
            <div class="float-start w-50">
              <h4 class="header-title"><i class="<?= $data['fwicon']['mystatement']; ?> fa-fw"></i> Statements [
                <?= $rows; ?>
                ]</h4>
            </div>
            <div class="float-start w-50 text-end">
              <h4 class="header-title">&nbsp;<a class="btn btn-danger btn-sm" href="<?= $data['Host']; ?>/mypdf/tkb-statement<?= $data['ex'] ?>?bid=<?= encryption_value($_SESSION['ses_IBAN_accountid']); ?>&str=<?= $pdfurl; ?>" title="Download Account Statement" target="_blank" style="float: right;" download=""><i class="<?= $data['fwicon']['pdf']; ?> text-light"></i></a>&nbsp;<span id="account-balance" class="btn btn-info btn-sm mx-2 text-white float-end fetch-tkb-balance pointer" data-tkb="<?= $_SESSION['ses_IBAN_accountid']; ?>">View Balance</span></h4>
            </div>
          </div>
        </div>
      </div>
      <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong><?php echo $_SESSION['msg']; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['msg']);
      } ?>
      </body>
      <div class="row">
        <div class="col-12 ">
          <div class="card">
            <div class="card-body">
              <div class="row  mb-2 mx-0">
                <?php include "common/trans_search_form.php"; ?>
                <?

                if (isset($requrl) && $requrl) {

                  $msg = "Search Records Not Found";

                ?>
                  <div class="text-end my-2 px-1 "><a href="<?= $data['Host']; ?>/account-statement-tkb<?= $data['ex'] ?>" class="badge text-bg-primary" title="click to view all records">View All Records</a></div>
                <? } ?>
                <? if ($rows > 0) { ?>
                  <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                      <thead class="bg-primary text-white">
                        <tr class="font-weight-bolder">
                          <th scope="col" style="width: 100px;">TransID</th>
                          <th scope="col">Bill&nbsp;Amt</th>
                          <th scope="col">Trans&nbsp;Amt</th>
                          <th scope="col">Timestamp</th>
                          <th scope="col">Trans&nbsp;Response</th>
                          <th scope="col">Trans&nbsp;Status</th>
                          <?php /*?><th scope="col">Available&nbsp;Balance</th><?php */ ?>
                          <th scope="col">Settelement&nbsp;Date</th>
                          <th scope="col">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($nquery as $key => $tranlist) {

                          if ($tranlist['status'] == "PROCESSED") {
                            $statuscss = "text-bg-success";
                          } elseif ($tranlist['status'] == "PENDING") {
                            $statuscss = "text-bg-warning";
                          } else {
                            $statuscss = "text-bg-danger";
                          }

                        ?>
                          <tr>
                            <td><a class="hrefmodal" data-tid="<?= $tranlist['transactionId']; ?>" data-href="<?= $data['Host']; ?>/transaction-details<?= $data['ex'] ?>?tid=<?= $tranlist['transactionId']; ?>" title="<?= $tranlist['transactionId']; ?>">
                                <?= $tranlist['transactionId']; ?>
                              </a></td>
                            <td><?= $tranlist['requestCurrency']; ?>
                              <?= $tranlist['requestAmount']; ?></td>
                            <td><?= $tranlist['transactionCurrency']; ?>
                              <?= $tranlist['transactionAmount']; ?></td>
                            <td><?= $tranlist['createdTime']; ?></td>
                            <td><? if ($tranlist['direction'] == "DEPOSIT") { ?>
                                <i class="<?= $data['fwicon']['circle-dot']; ?> text-success mr-1"></i>
                              <? } else { ?>
                                <i class="<?= $data['fwicon']['circle-dot']; ?> text-danger mr-1"></i>
                              <? } ?>
                              <?= $tranlist['direction']; ?>
                            </td>
                            <td><span class="badge rounded-pill <?= $statuscss; ?> m-1 p-1">
                                <?= $tranlist['status']; ?>
                              </span></td>
                            <td><?= $tranlist['lastStatusUpdateTime']; ?></td>
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
                  <div class="alert alert-danger font-weight-bolder text-center" role="alert">
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

      //alert(memidx);

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

  });
</script>
<!-- Modal -->
<?php /*?><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Transaction Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">

    <tr>
      <th scope="col">Trans ID</th><th>Amount</th>
	  <th scope="col">Amount</th><th>Amount</th>
	  <th scope="col">Status</th><th>Amount</th>
    </tr>
</table>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div><?php */ ?>

</html>