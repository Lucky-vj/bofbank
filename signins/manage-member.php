<?php
include "../common.php";
include "controller/blade.manage-member.php";
if (isset($_REQUEST['otype']) && $_REQUEST['otype'] == "DESC") {
  $otype = "ASC";
} else {
  $otype = "DESC";
}
if (isset($_REQUEST['pn']) && $_REQUEST['pn']) {
  $pn = $_REQUEST['pn'];
} else {
  $pn = 1;
}
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content admin manage-member">
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
            <!-- <h4 class="heading-ad">Manage Member</h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg></li>
                <li class="breadcrumb-item active">Manage Member</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <!-- end row -->
      <div class="px-0">
        <div class="bg-light border rounded mb-2 row mx-0">
          <div class="col-sm-4 my-2">
            <form method="get">
              <div class="input-group">
                <input type="text" class="form-control form-control-sm" placeholder="Search By Name" required="" name="s_name" autocomplete="off" value="">
                <i class="fa-solid fa-angle-down"></i>
                <select class="form-select form-select-sm" name="s_type" required="">
                  <option value="">Select Search Type</option>
                  <option value="first_name">First Name</option>
                  <option value="last_name">Last Name</option>
                  <option value="email">Email</option>
                  <option value="city">City</option>
                  <option value="state">State</option>
                </select>
              </div>
              <div class="input-group-append" style="display:none">
                <button class="btn btn-sm btn-primary" type="submit"><i class="<?= $data['fwicon']['search']; ?>"></i></button>
              </div>
            </form>
          </div>
          <div class="col-sm-8 my-2 text-end" style="display: flex; align-items: center; justify-content: flex-end; gap: 1em;">
            <a class="btn btn-success btn-sm ms-1 my-1" href="<?= $data['Host']; ?>/mypdf/client_detail_excel<?= $data['ex'] ?>" title="Download Excel" target="_blank" style="float: right;" download="">
              <i class="<?= $data['fwicon']['excel']; ?> text-light"></i>
            </a>
            <a name="Add" href="add-member<?= $data['ex']; ?>?action=add" value="Add A New Member!" title="Add A New Member" class="btn btn-primary btn-sm">
              <i class="<?= $data['fwicon']['circle-plus']; ?>"></i>
            </a>
          </div>
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
                      <th scope="col"><a href="?action=select&s_name=<?= $_GET['s_name']; ?>&s_type=<?= $_GET['s_type']; ?>&order=first_name&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Name">Name <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                      <th scope="col"><a href="?action=select&s_name=<?= $_GET['s_name']; ?>&s_type=<?= $_GET['s_type']; ?>&order=username&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Username">Username <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                      <th scope="col"><a href="?action=select&s_name=<?= $_GET['s_name']; ?>&s_type=<?= $_GET['s_type']; ?>&order=state&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="State">Company <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                      <th scope="col"><a href="?action=select&s_name=<?= $_GET['s_name']; ?>&s_type=<?= $_GET['s_type']; ?>&order=city&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="City">City <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                      <th scope="col"><a href="?action=select&s_name=<?= $_GET['s_name']; ?>&s_type=<?= $_GET['s_type']; ?>&order=country&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Country">Country <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                      <!-- <th scope="col"><a href="?action=select&s_name=<?= $_GET['s_name']; ?>&s_type=<?= $_GET['s_type']; ?>&order=add_date&otype=<?= $otype; ?>&pn=<?= $pn; ?>" title="Country">Timestamp <i class="fa-solid fa-up-down fa-sm"></i></a></th> -->
                      <th scope="col">IBAN Issuer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql_query = "";
                    $requrl = "";
                    if ((isset($_GET['s_name']) && $_GET['s_name'] <> "") and (isset($_GET['s_type']) && $_GET['s_type'] <> "")) {
                      $sql_query = " AND " . $_GET['s_type'] . " like '%" . $_GET['s_name'] . "%'";
                      $requrl .= "&" . $_GET['s_type'] . "=" . $_GET['s_name'];
                    }

                    //  Send Variable for Paging

                    $sql_query .= " and status<>'New' ";
                    $tblname = "tbl_client_master";
                    $tblfieldid = "client_id";

                    if ((isset($_GET['order']) && $_GET['order'] <> "") && (($_GET['otype']) && $_GET['otype'] <> "")) {
                      $tblorder = "order by `" . $_GET['order'] . "` " . $_GET['otype'];
                    } else {
                      $tblorder = "order by `client_id` desc";
                    }
                    include('pagination.php');
                    $i = 1;
                    // $nquery comes from Paging  ////////////
                    foreach ($nquery as $key => $result) {

                      $getiban = explode("||", $result['IBAN_issuer']);
                      $IBAN_issuer_default = $getiban[1];
                      if ($IBAN_issuer_default == "") {
                        $IBAN_issuer_default = 1;
                      }
                    ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><a class="text-primary pointer" href="<?= $data['Admins']; ?>/merchant<?= $data['ex']; ?>?ClientID=<?= $result['client_id'] ?>&admin_view=1" title="<?= $result['full_name'] ?> "><span title="Full Name">
                              <?= $result['full_name'] ?>
                            </span> </a> </td>
                        <td><?= $result['username'] ?></td>
                        <td><?= $result['company_name'] ?></td>
                        <td>
                          <span style="display: block; width: 250px; word-wrap: break-word; white-space: normal;">
                            <?= $result['owner_type'] == "Corporate" ? $result['city_of_incorporation'] : $result['city']; ?>
                          </span>
                        </td>
                        <td><?= $result['owner_type'] == "Corporate" ? $result['country_of_incorporation'] : $result['country']; ?></td>
                        <!-- <td><?= prndate($result['add_date']) ?></td> -->
                        <td><a class="text-light badge rounded-pill text-bg-primary mx-1 pointer" onclick="iframe_open_modal(this);" data-tid="Manage IBAN Issuer - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]" data-ihref="<?= $data['Admins']; ?>/iban-assign<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="Manage IBAN Issuer - <?= ucwords($result['full_name']) ?> [<?= $result['client_id'] ?>]">Assign IBAN Issuer</a> </td>

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
        </div>
      </div>
      <?php include "footer" . $data['ex']; ?>
      <!-- end row -->
    </div>
    <!-- container-fluid -->
  </div>
  <!-- End Page-content -->
</div>
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