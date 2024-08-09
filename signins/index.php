<?php
include "../common.php";
include "controller/blade.index.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content admin admin-dashboard">
  <div class="page-content">
    <div class="container-fluid ">
      <!-- start page title -->
      <!-- <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="heading-ad">Dashboard</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
  <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
  <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
</svg></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div> -->
      <!-- end page title -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h5>Number of Active Member</h5>
                </div>
                <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-primary"> <i class="<?= $data['fwicon']['profile']; ?>"></i> </span> </div>
              </div>
              <h4 class="m-0 align-self-center"> <?php echo $no_of_customer ?> </h4>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h5>Total Debit Transactions</h5>
                </div>
                <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-primary"> <i class="<?= $data['fwicon']['refund']; ?>"></i> </span> </div>
              </div>
              <h4 class="m-0 align-self-center"> <?php echo $total_debit_trans ?> </h4>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h5>Total Credit Transactions</h5>
                </div>
                <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-primary"> <i class="<?= $data['fwicon']['settlement']; ?>"></i> </span> </div>
              </div>
              <h4 class="m-0 align-self-center"> <?php echo $total_credit_trans ?> </h4>
            </div>
          </div>
        </div>
      </div>

      <?php include "../common/trans_search_form.php"; ?>


      <?php if (isset($_SESSION['msg']) == "ok") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> Customer Details Update Successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['msg']);
      } ?>

      <div class="row mx-0">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <?php /*?><div class="float-start col-sm-6">
                  <h4 class="header-title text-logo">Transaction - <?=$rows;?></h4>
                </div><?php */ ?>
                <div class="float-end col-sm-12">

                  <button type="button" class="btn btn-primary btn-sm">Total Records <span class="badge text-bg-danger"><?= $rows; ?></span></button>
                  <?php if (isset($requrl) && $requrl) {
                    $msg = "Search Records Not Found"; ?>
                    <a href="<?= $data['Admins']; ?>/index<?= $data['ex'] ?>" class="btn btn-primary btn-sm" title="click to view all records">View All Records</a>
                  <? } ?>
                  <a class="btn btn-success btn-sm ms-1 my-1" href="<?= $data['Host']; ?>/mypdf/statement-excel<?= $data['ex'] ?>?str=<?= $pdfurl; ?>" title="Download Excel" target="_blank" style="float: right;" download=""><i class="<?= $data['fwicon']['excel']; ?> text-light"></i></a>&nbsp;<a class="btn btn-danger btn-sm my-1" href="<?= $data['Host']; ?>/mypdf/statement<?= $data['ex'] ?>?str=<?= $pdfurl; ?>" title="Download PDF" target="_blank" style="float: right;" download=""><i class="<?= $data['fwicon']['pdf']; ?> text-light"></i></a>
                </div>
              </div>

              <? if ($rows > 0) {  //echo $vq; echo $requrl; 
              ?>
                <div class="table-responsive">
                  <table class="admin table table-centered table-nowrap mb-0">
                    <thead>
                      <tr>
                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_id&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="TransID">TransID<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                        <th scope="col">AccNumber</th>
                        <th scope="col">User</th>
                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_amount&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Bill Amt">BillAmt<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                        <!-- <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=converted_transaction_amount&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Trans Amt">TransAmt<i class="fa-solid fa-up-down fa-sm"></i></a></th> -->
                        <!-- <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_date&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Timestamp">Timestamp<i class="fa-solid fa-up-down fa-sm"></i></a></th> -->
                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_type&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Used Bank">Used Bank<i class="fa-solid fa-up-down fa-sm"></i></a></th>

                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_type&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Trans Response">TransResponse<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_date&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Transfer Reason">Transfer Reason<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=transaction_status&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Trans Status">Status<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                        <th scope="col"><a href="?action=select&searchkey=<?= $_GET['searchkey']; ?>&key_name=<?= $_GET['key_name']; ?>&status=<?= $_GET['status']; ?>&date_range=<?= $_GET['date_range']; ?>&time_period=<?= $_GET['time_period']; ?>&date_1st=<?= $_GET['date_1st']; ?>&date_2nd=<?= $_GET['date_2nd']; ?>&order=admin_transaction_date&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Settlement Date">SettlementDate<i class="fa-solid fa-up-down fa-sm"></i></a></th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php



                      foreach ($nquery as $key => $tranlist) {

                        $accountno = get_iban_account_number($tranlist['member_id'], $tranlist['iban_id']);
                        // $member_username = member_username($tranlist['member_id']);
                        $member_fullname = member_details($tranlist['member_id'], 'full_name')['full_name'];
                        $member_company = member_details($tranlist['member_id'], 'company_name')['company_name'];
                        $used_bank = $tranlist['used_bank'] ? get_admin_bank($tranlist['used_bank']) : '';

                      ?>
                        <tr>
                          <td><a class="hrefmodal" data-tid="<?= $tranlist['transaction_id']; ?>" data-href="<?= $data['Admins']; ?>/transaction-details-view<?= $data['ex']; ?>?tid=<?= $tranlist['transaction_id']; ?>" title="<?= $tranlist['transaction_id']; ?>">
                              <?= $tranlist['transaction_id']; ?>
                            </a></td>
                          <td><?= $accountno; ?></td>
                          <!-- <td><?= $member_username; ?></td> -->
                          <td><?= $member_fullname; ?> ( <?= $member_company ?> ) </td>
                          <!-- <td>
                            <?= $tranlist['transaction_currency']; ?>
                            <?= $tranlist['transaction_amount']; ?>
                          </td> -->
                          <td><?= $tranlist['converted_transaction_currency']; ?>
                            <?= $tranlist['converted_transaction_amount']; ?></td>
                          <!-- <td><?= date('Y-m-d', strtotime($tranlist['transaction_date'])); ?></td> -->
                          <td><?= $used_bank ? $used_bank['bank_name'] : ' - '; ?> </td>

                          <td><? if ($tranlist['transaction_type'] == "Credit") { ?>
                              <i class="<?= $data['fwicon']['circle-dot']; ?> text-success mr-1" title="<?= $tranlist['transaction_type']; ?>"></i>
                            <? } else { ?>
                              <i class="<?= $data['fwicon']['circle-dot']; ?> text-danger mr-1" title="<?= $tranlist['transaction_type']; ?>"></i>
                            <? } ?>
                            <?= $tranlist['transaction_for']; ?>
                          </td>
                          <td><span><?= $tranlist['transaction_purpose']; ?></span></td>
                          <td><span class="badge rounded-pill text-bg-success"><?= $tranlist['transaction_status']; ?></span></td>
                          <td><?= date('Y-m-d', strtotime($tranlist['admin_transaction_date'])); ?></td>
                          <td><a href="<?= $data['Admins']; ?>/transaction-details<?= $data['ex']; ?>?tid=<?= $tranlist['transaction_id']; ?>" title="View Detail" class="text-center"><i class="<?= $data['fwicon']['eye']; ?> text-success"></i></a></td>
                        </tr>
                      <?php } ?>
                      <tr class="pagination">
                        <td colspan="9">
                          <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              <? } else {

                $msg = "Transaction not found.";

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
<script>
  $("#status_csearch").css("display", "none"); // for hide search by status 
</script>
</body>

</html>