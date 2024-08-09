<?php
include "common.php";
include "controller/blade.manage-beneficiary.php";

if ($_SESSION['default_IBAN_issuer'] == 3) {
  $target_url = "create-external-transfer";
} else {
  $target_url = "beneficiary-transfer";
}
$acc_title = "Account/IBAN No.";
$atyp = "text";

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content transfer manage-page">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="<?= $data['Host-Home']; ?>" title="Home">Home</a>
                </li>
                <li>
                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg>
                </li>
                <li class="breadcrumb-item active">
                  <?= $data['PageName']; ?>
                </li>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contain-width">
      <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['msg']);
      } ?>
      <div id="swiftmsg" class="col-sm-12 px-1"></div>
      <?php if (($action == "add") or ($action == "edit")) { ?>
        <div class="row add-beneficiary">
          <div class="col-lg-12">
            <div class="inner-page card">
              <div class="card-body">
                <!-- <h4 class="header-title">
                  <?= ucwords($action); ?>
                  Beneficiary</h4> -->
                <form method="POST">
                  <div class="row ">
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="<?= $atyp; ?>" id="beneficiary_account_number" name="beneficiary_account_number" class="form-control" title="Account Number" value="<? if (isset($beneficiary_account_number) && $beneficiary_account_number) {
                                                                                                                                                                            echo $beneficiary_account_number;
                                                                                                                                                                          } ?>" placeholder="Account/IBAN No" required />
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="<?= $atyp; ?>" id="beneficiary_confirm_account_number" name="beneficiary_confirm_account_number" value="<? if (isset($beneficiary_account_number) && $beneficiary_account_number) {
                                                                                                                                                echo $beneficiary_account_number;
                                                                                                                                              } ?>" class="form-control" title="Confirm Account Number" placeholder="Confirm Account/IBAN No" required />
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="text" name="beneficiary_address" id="beneficiary_address" class="form-control" value="<? if (isset($beneficiary_address) && $beneficiary_address) {
                                                                                                                              echo $beneficiary_address;
                                                                                                                            } ?>" title="Address" placeholder="Beneficiary address" required />
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="text" class="form-control" name="beneficiary_name" id="beneficiary_status" title="Beneficiary Name" value="<? if (isset($beneficiary_name) && $beneficiary_name) {
                                                                                                                                                  echo $beneficiary_name;
                                                                                                                                                } ?>" placeholder="Beneficiary Name" required>
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <div class="form-floating inner_page_input">
                          <i class="fa-solid fa-angle-down"></i>
                          <select class="form-select" name="beneficiary_country" id="beneficiary_country" title="Country" required>
                            <option value="" selected="selected">country of Beneficiary</option>
                            <?php foreach ($country_list as $clist) { ?>
                              <option value="<?= $clist['ISO_3_DIGIT']; ?>"><?= $clist['country']; ?></option>
                            <? } ?>
                          </select>
                          <? if (isset($beneficiary_country)) {  ?>
                            <script>
                              $('#beneficiary_country option[value="<?= $beneficiary_country ?>"]').prop('selected', 'selected');
                            </script>
                          <? } ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <i class="fa-solid fa-angle-down"></i>
                        <select class="form-select" name="beneficiary_currency" id="beneficiary_currency" title="Currency" required>
                          <option value="" selected="selected">select currency</option>
                          <?php
                          foreach ($currency_list as $crlist) { ?>
                            <option value="<?= $crlist['currency_code']; ?>"><?= $crlist['currency_code']; ?> - <?= ucwords($crlist['currency_name']); ?></option>
                          <? } ?>
                        </select>
                        <? if (isset($beneficiary_currency)) {  ?>
                          <script>
                            $('#beneficiary_currency option[value="<?= $beneficiary_currency ?>"]').prop('selected', 'selected');
                          </script>
                        <? } ?>
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="text" name="beneficiary_swift_code" id="beneficiary_swift_code" class="form-control" value="<? if (isset($beneficiary_swift_code) && $beneficiary_swift_code) {
                                                                                                                                    echo $beneficiary_swift_code;
                                                                                                                                  } ?>" onBlur="checkAvailability()" placeholder="Swift Code" required />
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="text" id="beneficiary_bank_name" name="beneficiary_bank_name" class="form-control" value="<? if (isset($beneficiary_bank_name) && $beneficiary_bank_name) {
                                                                                                                                  echo $beneficiary_bank_name;
                                                                                                                                } ?>" title="Bank Name" placeholder="bank name" required />
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <div class="form-floating inner_page_input">
                          <i class="fa-solid fa-angle-down"></i>
                          <select class="form-select" name="beneficiary_bank_country" id="beneficiary_bank_country" title="Country" required>
                            <option value="" selected="selected">country of bank</option>
                            <?php foreach ($country_list as $clist) { ?>
                              <option value="<?= $clist['ISO_3_DIGIT']; ?>"><?= $clist['country']; ?></option>
                            <? } ?>
                          </select>
                          <? if (isset($beneficiary_bank_country)) {  ?>
                            <script>
                              $('#beneficiary_bank_country option[value="<?= $beneficiary_bank_country ?>"]').prop('selected', 'selected');
                            </script>
                          <? } ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 my-2">
                      <div class="form-floating inner_page_input">
                        <input type="text" id="beneficiary_bank_address" name="beneficiary_bank_address" class="form-control" value="<? if (isset($beneficiary_bank_address) && $beneficiary_bank_address) {
                                                                                                                                        echo $beneficiary_bank_address;
                                                                                                                                      } ?>" title="Bank Address" placeholder="bank address" required />
                      </div>
                    </div>
                  </div>
                  <a href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>" class="btn btn-sm mx-2 back-to-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 66 62" fill="none" class="fa-beat">
                      <circle cx="35" cy="31" r="31" fill="#8EDEFF" />
                      <circle cx="31" cy="31" r="31" fill="#27AAE1" />
                      <path d="M36 21L26 31L36 41" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                  <div class="form-group common-btn">
                    <!--<i class="fa-solid fa-circle-plus"></i>-->
                    <!-- <button type="submit" class="btn btn-sm " name="btn_submit" value="Submit">Submit</button> -->
                    <button type="submit" id="submit_beneficiary" class="btn btn-sm submit-cmn-btn" name="<?= $action; ?>_beneficiary" title="<?= ucwords($action); ?> Beneficiary" value="<?= ucwords($action); ?> Beneficiary"> Submit</button>

                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      <?php } ?>
      <?php if ($action == "") { ?>
        <div class="row contain-width">
          <div class="col-lg-12">
            <div class="inner-page card">
              <div class="card-body">
                <div class="row" style="display:none">
                  <div class="col-lg-8">
                    <h4 class="header-title mb-4">Added Beneficiary </h4>
                  </div>
                  <div class="col-lg-4 text-end"><a name="Add" href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>?action=add" value="Add Beneficiary" title="Add Beneficiary" class="btn btn-sm btn-success mb-2"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i></a></div>
                </div>
                <?php
                if ($_SESSION['default_IBAN_issuer'] == 3) {
                  $selbenlist = db_rows("SELECT * FROM `tbl_beneficiary` WHERE `client_id`='$Client_ID' AND `beneficiary_status`<>'Deleted' AND `IBAN_issuer`='" . $_SESSION['default_IBAN_issuer'] . "' ORDER BY `beneficiary_name`");
                } else {
                  $selbenlist = db_rows("SELECT * FROM `tbl_beneficiary` WHERE `client_id`='$Client_ID' AND `beneficiary_status`<>'Deleted' AND `IBAN_issuer` IN (1,2,4,5) ORDER BY `beneficiary_name`");
                }

                ?>
                <div class="table-responsive">
                  <table class="table table-centered table-nowrap mb-0">
                    <? if (count($selbenlist) > 0) { ?>
                      <thead class="bg-success text-white">
                        <tr class="text-start">
                          <th scope="col" title="Beneficiary Name"><strong>Name</strong></th>
                          <th scope="col"><strong>AccNumber</strong></th>
                          <th scope="col" title="Bank Name"><strong>Bank</strong></th>
                          <th scope="col" title="Bank Address"><strong>Address</strong></th>
                          <th scope="col"><strong>Swift Code</strong></th>
                          <th scope="col"><strong>Country</strong></th>
                          <th scope="col" title="Beneficiary Address"><strong>Address</strong></th>
                          <th scope="col"><strong>Status</strong></th>
                          <th scope="col" style="width:80px;"><strong>Action</strong></th>
                        </tr>
                      </thead>
                    <? } else { ?>
                      <h3 class="common-txt">Add new beneficiary</h3>
                      <p class="common-txt">here you can add new beneficiary for transfer funds securely</p>

                    <? } ?>
                    <tbody>
                      <?php

                      foreach ($selbenlist as $key => $banlist) {

                      ?>
                        <tr>
                          <td><?= $banlist['beneficiary_name']; ?></td>
                          <td><?= $banlist['beneficiary_account_number']; ?><br /><span class="rounded-pill text-bg-primary px-2  py-1 pointer"><?= $banlist['beneficiary_currency']; ?></span>
                          </td>
                          <td><?= $banlist['beneficiary_bank_name']; ?></td>
                          <td><?= $banlist['beneficiary_bank_address']; ?></td>
                          <td><?= $banlist['beneficiary_swift_code']; ?></td>
                          <td><?= $banlist['beneficiary_bank_country']; ?></td>
                          <td><?= $banlist['beneficiary_address']; ?></td>
                          <td><?php if ($banlist['beneficiary_status'] == 'Active') {
                                $bgclr = "success";
                              } else {
                                $bgclr = "warning";
                              } ?>
                            <span class="badge rounded-pill text-bg-<?= $bgclr; ?> m-1">
                              <?= $banlist['beneficiary_status']; ?>
                            </span>
                          </td>
                          <td>
                            <a href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>?action=edit&bid=<?= $banlist['beneficiary_id']; ?>" title="Edit Beneficiary">
                              <i class="<?= $data['fwicon']['edit']; ?> text-success "></i>
                            </a>
                            &nbsp;
                            <a href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>?action=delete&bid=<?= $banlist['beneficiary_id']; ?>" title="Delete Beneficiary" onClick="return confirm('Are you Sure to Delete');">
                              <i class="<?= $data['fwicon']['delete']; ?> text-danger mx-1 "></i>
                            </a>
                            &nbsp;
                            <a href="<?= $target_url; ?><?= $data['ex'] ?>?act=beneficiary_transfer&bid=<?= $banlist['beneficiary_id']; ?>" onClick="return confirm('Are you Sure want  Transfer Money to <?= $banlist['beneficiary_name']; ?>');">
                              <i class="<?= $data['fwicon']['amazon-pay']; ?> text-warning" title="Transfer to <?= $banlist['beneficiary_name']; ?>"></i>
                            </a>
                          </td>
                        </tr>
                      <? } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group common-btn">
                <!--<i class="fa-solid fa-circle-plus"></i>-->
                <a name="Add" href="<?= $data['Host']; ?>/manage-beneficiary<?= $data['ex'] ?>?action=add" value="Add Beneficiary" title="Add Beneficiary" class="btn btn-sm submit-cmn-btn">Add</a>
              </div>
            </div>
            <? include($data['Path'] . '/footer' . $data['iex']); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<!-- Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script>
  $(function() {

    $("#submit_beneficiary").click(function() {

      val2 = $("#beneficiary_account_number").val();

      val4 = $("#beneficiary_confirm_account_number").val();


      if (val2 !== val4) {
        alert("Account Number and Confirm Account Number do not match.");
        return false;
      }

    });

  });


  // check swift code
  function checkAvailability() {

    $.ajax({
      url: "<?= $data['Host']; ?>/common/check-swift-code.php",
      data: 'bswift=' + $("#beneficiary_swift_code").val(),
      type: "POST",
      success: function(data) {
        //alert(data);
        var obj = JSON.parse(data);
        //alert(obj.valid);
        //alert(obj.bank);
        //alert(obj.city);
        //alert(obj.branch);
        //alert(obj.country);

        if (obj.valid == 1) {
          //alert("Valid Swift Code");
          document.getElementById('beneficiary_bank_name').value = obj.bank;
          document.getElementById('beneficiary_bank_address').value = obj.branch + " " + obj.city;
          $("#beneficiary_bank_country").val(obj.ISO_3_DIGIT);
          $('#swiftmsg').attr('class', 'col-sm-12 px-1 alert alert-success');
          //$('#basicidx i').prop('title', 'Valid Swift Code');
          document.getElementById('swiftmsg').innerHTML = " <i class='ps-3 m-0 <?= $data['fwicon']['check-circle']; ?> text-success'></i> SWIFT Code Verified ";
        } else {
          //alert("Inalid Swift Code");
          $('#swiftmsg').attr('class', 'col-sm-12 px-1 alert alert-danger');
          //$('#basicidx i').prop('title', 'Invalid Swift Code');
          document.getElementById('swiftmsg').innerHTML = " <i class='ps-3 m-0 <?= $data['fwicon']['check-cross']; ?> text-danger'></i> We are unable to verify this SWIFT number via our Bank Directory. Click Okay and proceed if your SWIFT details is correct ";
        }

      },
      error: function() {}
    });
  }
</script>
</body>

</html>