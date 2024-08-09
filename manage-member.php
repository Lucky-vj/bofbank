<?php

include "../common.php";

include "controller/blade.manage-member.php";

?>

<!-- ============================================================== -->

<!-- Start right Content here -->

<!-- ============================================================== -->

<div class="main-content manage-member">

  <div class="page-content">

    <div class="container-fluid">

      <!-- start page title -->

      <div class="row">

        <div class="col-12">

          <?php if (isset($_SESSION['msg'])) { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">

              <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>

              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

          <?php unset($_SESSION['msg']);
          } ?>

          <div class="page-title-box d-flex align-items-center justify-content-between">

            <h4 class="heading-ad">Manage Member</h4>

            <div class="page-title-right">

              <ol class="breadcrumb m-0">

                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>

                <li class="breadcrumb-item active">Manage Member</li>

              </ol>

            </div>

          </div>

        </div>

      </div>

      <!-- end page title -->

      <!-- end row -->

      <div class="row bg-primary-subtle rounded mb-2 mx-0">

        <div class="col-sm-4 my-2">

          <form method="get">

            <div class="input-group">

              <input type="text" class="form-control form-control-sm" placeholder="Search By Name" required="" name="s_name" autocomplete="off" value="">

              <select class="form-select form-select-sm" name="s_type" required="">

                <option value="">Select Search Type</option>

                <option value="full_name">Member Name</option>

                <option value="email">Email</option>

                <option value="city">City</option>

                <option value="state">State</option>

                <option value="company_name">Company Name</option>

              </select>

              <div class="input-group-append">

                <button class="btn btn-sm btn-primary" type="submit"><i class="<?= $data['fwicon']['search']; ?>"></i></button>

              </div>

            </div>

          </form>

        </div>

        <div class="col-sm-8 my-2 text-end">

          <a name="Add" href="add-member<?= $data['ex']; ?>?action=add" value="Add A New Member!" title="Add A New Member" class="btn btn-primary btn-sm"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i></a>

        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">

          <div class="card">

            <div class="card-body">

              <!--<h4 class="header-title mb-4">History of Customers Login and Logout</h4>-->

              <div class="table-responsive">

                <table class="table table-nowrap mb-0">

                  <thead>

                    <tr>

                      <th scope="col">#</th>

                      <th scope="col"><strong>Member&nbsp;Details</strong></th>

                      <th scope="col"><strong>Company&nbsp;Detail</strong></th>

                      <th scope="col"><strong>Bank</strong></th>

                      <th scope="col"><strong>Fee</strong></th>

                      <th scope="col">IBAN Issuer</th>

                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php

                    $sql_query = "";

                    if ((isset($_GET['s_name']) <> "") and (isset($_GET['s_type']) <> "")) {

                      $sql_query = " AND " . $_GET['s_type'] . " like '%" . $_GET['s_name'] . "%'";

                      //$requrl.="&".$_GET['s_type']."=".$_GET['s_name'];

                    }
                    //  Send Variable for Paging

                    //$sql_query.=" and status='Active' ";

                    $sql_query .= " and status<>'New' ";

                    $tblname = "tbl_client_master";

                    $tblfieldid = "client_id";

                    $tblorder = "order by `client_id` desc";

                    include('pagination.php');

                    $i = 1;

                    // $nquery comes from Paging  ////////////

                    foreach ($nquery as $key => $result) {

                      $actid = $result['client_id'];

                      $countbank = db_rows("SELECT bank_id from tbl_member_bank_account where client_id='$actid' and bank_status='Active'");

                      $totcnt = $db_counts;

                      $getiban = explode("||", $result['IBAN_issuer']);
                      $IBAN_issuer_default = $getiban[1];
                      if ($IBAN_issuer_default == "") {
                        $IBAN_issuer_default = 1;
                      }
                    ?>

                      <tr>

                        <td><?= $i++ ?></td>

                        <td>
                          <a class="text-primary" onclick="iframe_open_modal(this);" data-tid="Profile Details - <?= $result['full_name'] ?> (<?= $result['username'] ?>)" data-ihref="<?= $data['Admins']; ?>/profile_view<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="<?= $result['full_name'] ?> (<?= $result['username'] ?>)"><span title="Full Name"><?= $result['full_name'] ?></span> <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="User Name">(<?= $result['username'] ?>)</span></a>
                        </td>

                        <td>

                          <?php if ($result['company_name'] <> "") { ?>

                            <a class="text-primary" onclick="iframe_open_modal(this);" data-tid="Company Details - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]" data-ihref="<?= $data['Admins']; ?>/company_details<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="<?= $result['company_name'] ?>"><?= $result['company_name'] ?></a>

                            <!--<br>

						    <?= $result['company_address'] ?><br>

                            <?= $result['company_registration_no'] ?><br>

                            <?= $result['date_of_incorporation'] ?><br>

                            <?= $result['country_of_incorporation'] ?>

                            <?= $result['city_of_incorporation'] ?>-->

                          <? } else { ?>

                            <a class="text-primary" onclick="iframe_open_modal(this);" data-tid="Company Details - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]" data-ihref="<?= $data['Admins']; ?>/company_details<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="<?= $result['company_name'] ?>"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i></a>

                          <? } ?>
                        </td>

                        <td class="text-center">
                          <?php /*?><a class="modal_for_iframe badge rounded-pill text-bg-primary" href="member-bank-account<?=$data['ex'];?>?client_id=<?=$result['client_id']?>&admin_view=1" title="Manage Bank Account - <?=ucwords($result['full_name'])?> [<?=$result['client_id']?>]"><?=$totcnt;?></a><?php */ ?>

                          <a class="rounded-pill text-bg-primary p-1" onclick="iframe_open_modal(this);" data-tid="Bank Account - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]" data-ihref="<?= $data['Admins']; ?>/member-bank-account<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="<?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]"><?= $totcnt; ?></a>
                        </td>

                        <td>
                          <a class="text-primary" onclick="iframe_open_modal(this);" data-tid="Fee Engine / Transaction Fee - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]" data-ihref="<?= $data['Admins']; ?>/manage-fee<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="Update Your Fee Engine / Transaction Fee - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]"><i class="<?= $data['fwicon']['edit']; ?> text-success"></i>
                          </a>
                        </td>

                        <td>
                          <a class="text-light badge rounded-pill text-bg-primary mx-1" onclick="iframe_open_modal(this);" data-tid="Manage IBAN Issuer - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]" data-ihref="<?= $data['Admins']; ?>/iban-assign<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="Manage IBAN Issuer - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]">Assign IBAN Issuer</a>
                        </td>

                        <td>

                          <a href="<?= $data['Admins']; ?>/member-transaction<?= $data['ex']; ?>?mid=<?= $result['client_id'] ?>&acurr=<?= $result['assign_currency'] ?>" title="View Transaction Details" class=" mx-1"> <i class="<?= $data['fwicon']['eye']; ?>"></i></a>

                          <? if (isset($result['json_log_history']) && $result['json_log_history']) { ?>

                            <i class="<?= $data['fwicon']['circle-info']; ?> text-info fa-fw" onclick="popup_openv('<?= $data['Host'] ?>/common/json_log<?= $data['ex'] ?>?tableid=<?= $result['client_id'] ?>&tablename=account&tablefieldidname=client_id')" title="View Json History"></i>

                          <? } ?>
                        </td>
                      </tr>

                    <?php

                    }

                    ?>

                    <? if (isset($paginationCtrls) && $paginationCtrls) { ?>

                      <tr>

                        <td colspan="12">
                          <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                        </td>
                      </tr>

                    <? } ?>
                  </tbody>
                </table>

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

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {

    return new bootstrap.Tooltip(tooltipTriggerEl)

  })
</script>

<script>
  // Selecting the iframe element

  var iframe = document.getElementById("iframe_loader");

  // Adjusting the iframe height onload event

  iframe.onload = function() {

    iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';

  }
</script>

</body>

</html>