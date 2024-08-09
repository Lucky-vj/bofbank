<?php
include "../common.php";
include "controller/blade.merchant.php";
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
  .btn:hover {
    color: #000033;
  }

  .nav-pills .nav-link {
    color: #000000 !important;
    /*background-color: #8ab3a5 !important;*/
    border: 1px solid #eee !important;
    box-shadow: inset 0px 0px 0px 3px #f7f7f7;

  }

  .nav-pills .nav-link:hover {
    color: #006600 !important;
    box-shadow: inset 0px 0px 0px 3px #f7f7f7 !important;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    color: #fff !important;
    background-color: #8ab3a5 !important;
    border: 1px solid #eee !important;
  }

  .fa-star-of-life {
    color: #FF0000 !important;
    font-size: 10px !important;
  }

  .col-form-label44 {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
  }

  .text-start:hover {
    background: none !important;
  }
</style>
<div class="main-content admin">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div class="container table-responsive">
                  <div class="row">
                    <div class="col-sm-6 text-start">
                      <h6 class="my-2"><i class="<?= $data['fwicon']['profile']; ?> fa-fw"></i>
                        <?= $rs['full_name']; ?>
                        [
                        <?= $rs['username']; ?>
                        ][<?= $data['IBAN_Type'][$_SESSION['admin_default_IBAN_issuer']]; ?>] <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Profile Details - <?= $rs['full_name'] ?> (<?= $rs['username'] ?>)" data-ihref="<?= $data['Admins']; ?>/profile_summary<?= $data['ex']; ?>?client_id=<?= $ClientID ?>&admin_view=1"><i class="<?= $data['fwicon']['edit']; ?> mx-1" title="Edit <?= $data['PageName']; ?>"></i></a>
                        <? if ($_SESSION['admin_default_IBAN_issuer'] != 3) { ?>
                          <a class="ms-1" href="<?= $data['Host']; ?>/mypdf/success-statement-exl<?= $data['ex'] ?>?bid=<?= $ClientID; ?>&str=<?= $pdfurl; ?>" title="Download Account Statement" target="_blank" download=""><i class="<?= $data['fwicon']['excel']; ?> text-success"></i></a><a class="ms-1" href="<?= $data['Host']; ?>/mypdf/success-statement<?= $data['ex'] ?>?bid=<?= $ClientID; ?>&str=<?= $pdfurl; ?>" title="Download Account Statement" target="_blank" download=""><i class="<?= $data['fwicon']['pdf']; ?> text-danger"></i></a>
                        <? } ?>
                      </h6>
                    </div>
                    <div class="col-sm-6 text-end">

                      <ul class="metismenu list-unstyled side-menu m-1  float-end">
                        <li class="list-item77">
                          <button class="dropdown-toggle btn btn-outline-primary btn-sm text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Assign IBAN List">

                            <? if (isset($_SESSION['admin_default_IBAN_issuer']) && $_SESSION['admin_default_IBAN_issuer']) { ?>
                              <?= get_iban_account_number($ClientID, $_SESSION['admin_default_IBAN_issuer']) ?>
                            <? } else { ?>
                              Select IBAN
                            <? } ?>
                          </button>
                          <ul class="dropdown-menu bg-success-subtle">
                            <?= get_iban_list($ClientID) ?>
                          </ul>


                      </ul>
                      <button class="btn btn-outline-success btn-sm text-start float-end m-1" type="button" title="Balance"><?= $default_currency; ?>&nbsp;<?= $default_availableBalance; ?></button>
                      <? if ($_SESSION['admin_default_IBAN_issuer'] != 3) { ?>
                        <a href="<?= $data['Admins']; ?>/member-transaction<?= $data['ex']; ?>?mid=<?= $ClientID ?>&acurr=<?= $default_currency ?>" class="btn btn-outline-danger btn-sm text-start float-end m-1" target="_blank" type="button" title="Total Transactions">Trans - <?= $total_trans; ?></a>
                      <? } else { ?>
                        <?php /*?><a href="<?=$data['Admins'];?>/member-transaction-by-iban<?=$data['ex'];?>?mid=<?=$ClientID?>&acurr=<?=$default_currency?>" class="btn btn-outline-danger btn-sm text-start float-end m-1" target="_blank" type="button" title="Total Transactions">Trans - <?=$total_trans;?></a><?php */ ?>
                      <? } ?>
                    </div>
                  </div>
                  <div class="nav flex-rows nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <span class=" button nav-link m-1 active" id="v-PersonalDetails-tab" data-bs-toggle="pill" data-bs-target="#v-PersonalDetails" type="button" role="tab" aria-controls="v-PersonalDetails" aria-selected="true"><i class="<?= $data['fwicon']['profile']; ?>" title="Account Summary"></i> </span>

                    <span class=" button nav-link m-1" id="v-MemberAddress-tab" data-bs-toggle="pill" data-bs-target="#v-MemberAddress" type="button" role="tab" aria-controls="v-MemberAddress" aria-selected="true"><i class="fa-solid fa-credit-card" title="Issued IBAN"></i> </span>

                    <span class="nav-link m-1" id="v-CompanyDetails-tab" data-bs-toggle="pill" data-bs-target="#v-CompanyDetails" type="button" role="tab" aria-controls="v-CompanyDetails" aria-selected="false"><i class="<?= $data['fwicon']['bank']; ?>" title="Assign Bank"></i> </span>

                    <span class="nav-link m-1" id="v-AdditionalDetails-tab" data-bs-toggle="pill" data-bs-target="#v-AdditionalDetails" type="button" role="tab" aria-controls="v-AdditionalDetails" aria-selected="false"><i class="<?= $data['fwicon']['fees']; ?>" title="Fee Engine"></i> </span>
                    <? if ($_SESSION['admin_default_IBAN_issuer'] == 3) { ?>
                      <span class="nav-link m-1" type="button" role="tab" onclick="iframe_open_modal(this);" data-tid="Request Money" data-ihref="<?php echo $data['Host']; ?>/create-payment-request<?php echo $data['ex'] ?>?ClientID=<?= $ClientID; ?>&admin_view=1" title="Request Money"><i class="<?php echo $data['fwicon']['beneficiary']; ?> fa-fw"></i> Request Money </span>

                      <span class="nav-link m-1" type="button" role="tab" onclick="iframe_open_modal(this);" data-tid="Fund Transfer" data-ihref="<?php echo $data['Host']; ?>/create-external-transfer<?php echo $data['ex'] ?>?ClientID=<?= $ClientID; ?>&admin_view=1" title="Fund Transfer"><i class="<?php echo $data['fwicon']['arrow-right-arrow-left']; ?> fa-fw"></i> Fund Transfer</span>
                    <? } else { ?>
                      <span class="nav-link m-1" type="button" role="tab" onclick="iframe_open_modal(this);" data-tid="ADD Money" data-ihref="<?php echo $data['Host']; ?>/add-money<?php echo $data['ex'] ?>?ClientID=<?= $ClientID; ?>&admin_view=1" title="Add Money"><i class="<?php echo $data['fwicon']['sales-volume']; ?> fa-fw"></i> ADD Money </span>

                      <span class="nav-link m-1" type="button" role="tab" onclick="iframe_open_modal(this);" data-tid="Transfers" data-ihref="<?php echo $data['Host']; ?>/transfer<?php echo $data['ex'] ?>?ClientID=<?= $ClientID; ?>&admin_view=1" title="Transfers"><i class="<?php echo $data['fwicon']['arrow-right-arrow-left']; ?> fa-fw"></i> Transfers</span>
                    <? } ?>
                    <?php
                    $buttonClass = $rs['banned'] ? 'btn-danger' : 'btn-primary'; // 'btn-danger' for banned users, 'btn-primary' for non-banned
                    ?>
                    <button class="btn <?= ($rs["banned"] ? "btn-primary" : "btn-danger"); ?>" onclick="toggleUserStatus(<?= $ClientID ?>)">
                      <?php if ($rs['banned'] == 1) { ?>
                        Activate User
                      <?php } else { ?>
                        Deactivate User
                      <?php } ?>
                    </button>


                  </div>

                  <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show  active " id="v-PersonalDetails" role="tabpanel" aria-labelledby="v-PersonalDetails-tab" tabindex="0">

                      <span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['hand']; ?>" title="Account Summary"></i>&nbsp;&nbsp;Account Summary</span>
                      <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Profile Details - (<?= $_SESSION["members"]["email"] ?>)" data-ihref="<?= $data['Admins']; ?>/profile_summary<?= $data['ex']; ?>?client_id=<?= $ClientID ?>&admin_view=1"><span class="badge rounded-pill border text-dark py-2 px-4 my-2" title="Update Profile"><i class="<?= $data['fwicon']['edit']; ?> text-success"></i></span></a>

                      <div class="row row-cols-1 row-cols-md-2 text-center">
                        <div class="col">
                          <div class="card  rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                              <h3 class="my-0 fw-2 fs-6 text-white">Personal Information</h3>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-4 text-start">Contact Name</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['title']; ?>
                                  <?= $rs['first_name']; ?>
                                  <?= $rs['last_name']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Email</div>
                                <div class="col-sm-8 text-start text-truncate">:
                                  <?= $rs['email']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Contact Number</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['country_code']; ?>
                                  <?= $rs['mobile']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Gender</div>
                                <div class="col-sm-8 text-start" title="<?= $rs['gender']; ?>">: <i class="fa-solid <?= $gender; ?>"></i> </div>
                                <div class="col-sm-4 text-start">Date of Birth </div>
                                <div class="col-sm-8 text-start">:
                                  <?= date("d F Y", strtotime($rs['birth_date'])); ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card  rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                              <h3 class="my-0 fw-2 fs-6 text-white">Home Address</h3>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-4 text-start">Address</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['address_line1']; ?>
                                  <?= $rs['address_line2']; ?>
                                </div>
                                <div class="col-sm-4 text-start">City</div>
                                <div class="col-sm-8 text-start text-truncate">:
                                  <?= $rs['city']; ?>
                                </div>
                                <div class="col-sm-4 text-start">State</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['state']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Country</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['country']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Postal Code </div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['pincode']; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card  rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                              <h3 class="my-0 fw-2 fs-6 text-white">Owner`s Details</h3>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-4 text-start">Owner`s Type</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['owner_type']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Company Name</div>
                                <div class="col-sm-8 text-start text-truncate">:
                                  <?= $rs['company_name']; ?>
                                  <? if ($rs['company_name'] == "") { ?>
                                    <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Company Details - <?= $_SESSION["members"]["email"] ?> [<?= $ClientID ?>]" data-ihref="<?= $data['Admins']; ?>/company_details<?= $data['ex']; ?>?client_id=<?= $ClientID ?>&admin_view=1" title="<?= $result['company_name'] ?>"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i></a>
                                  <? } ?>

                                </div>
                                <div class="col-sm-4 text-start">Registration Number</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['company_registration_no']; ?>
                                </div>
                                <div class="col-sm-4 text-start"> Incorporation Country</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['country_of_incorporation']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Incorporation City </div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['city_of_incorporation']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Company Address </div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['company_address']; ?>
                                </div>
                                <div class="col-sm-4 text-start">What is your role </div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['role_in_company']; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card  rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                              <h3 class="my-0 fw-2 fs-6 text-white">Additional Details</h3>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-4 text-start">Member Type </div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['individual_type']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Business Activity </div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['business_activity']; ?>
                                </div>
                                <div class="col-sm-4 text-start">Nationality</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['nationality']; ?>
                                </div>
                                <div class="col-sm-4 text-start">ID Type</div>
                                <div class="col-sm-8 text-start text-truncate">:
                                  <?= $rs['doc_id_type']; ?>
                                </div>
                                <div class="col-sm-4 text-start">ID Number</div>
                                <div class="col-sm-8 text-start">:
                                  <?= $rs['doc_id_number']; ?>
                                </div>
                                <div class="col-sm-4 text-start">ID Expiry Date</div>
                                <div class="col-sm-8 text-start">:
                                  <?= date("d F Y", strtotime($rs['doc_id_exp_date'])); ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade show " id="v-MemberAddress" role="tabpanel" aria-labelledby="v-MemberAddress-tab" tabindex="0">
                      <span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['hand']; ?>" title="Issued IBAN"></i>&nbsp;&nbsp;Issued IBAN</span>
                      <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Manage IBAN Issuer" data-ihref="<?= $data['Admins']; ?>/iban-assign<?= $data['ex']; ?>?client_id=<?= $ClientID ?>&admin_view=1" title="Manage IBAN Issuer"><span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['circle-plus']; ?> text-success"></i></span></a>
                      <div class="row">

                        <?php

                        if ($iban_counts > 0) { ?>
                          <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                              <thead>
                                <tr class="bg-primary text-white rounded">
                                  <th scope="col">IBAN</th>
                                  <th scope="col">Account ID</th>
                                  <th scope="col">Account Name</th>
                                  <th scope="col">IBAN / Account No.</th>
                                  <th scope="col">Currency</th>
                                  <th scope="col">Balance</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i = 1;
                                foreach ($iban as $key => $result) {

                                  if ($result['IBAN_issuer'] == 3) {
                                    $bal = $result['availableBalance'];
                                  } else {
                                    $bal = get_user_balance_amt($ClientID, $result['IBAN_issuer']);
                                  }
                                ?>
                                  <tr>
                                    <td><?= $data['IBAN_Type'][$result['IBAN_issuer']] ?></td>
                                    <td><?= $result['accountid'] ?></td>
                                    <td><?= $result['accountName'] ?></td>
                                    <td><?= $result['accountNumber'] ?></td>
                                    <td><?= $result['currency'] ?></td>
                                    <td><?= $bal ?></td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        <?php } else { ?>
                          <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> IBAN Issuer Not Added. </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="tab-pane fade show" id="v-CompanyDetails" role="tabpanel" aria-labelledby="v-CompanyDetails-tab" tabindex="0">
                      <span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['hand']; ?>" title="Issued IBAN"></i>&nbsp;&nbsp;Assign Bank</span>
                      <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Bank Account - <?= ucwords($result['full_name']) ?> [<?= $ClientID ?>]" data-ihref="<?= $data['Admins']; ?>/member-bank-account<?= $data['ex']; ?>?client_id=<?= $ClientID ?>&admin_view=1" title="[<?= $ClientID ?>]"><span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['circle-plus']; ?> text-success"></i></span></a>
                      <div class="row">
                        <?php
                        $rows = db_rows("SELECT * FROM `tbl_member_bank_account` WHERE `client_id`='$ClientID' AND `bank_status`='Active' ORDER BY `bank_status` ASC LIMIT 0,10");
                        $nor = $db_counts;
                        if ($nor > 0) { ?>
                          <div class="table-responsive">
                            <table class="table table-centered">
                              <thead>
                                <tr class="bg-primary text-white rounded-3">
                                  <th scope="col"><strong>Assigned Bank</strong></th>
                                  <th scope="col"><strong>Bank Detail</strong></th>
                                  <th scope="col"><strong>Support Currency</strong></th>
                                  <th scope="col"><strong>Bank Address</strong></th>
                                  <th scope="col"><strong>Status</strong></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i = 1;
                                foreach ($rows as $key => $result) {
                                  $common_bank_id = $result['assign_bank'];
                                  $selbank = db_rows("select * from tbl_common_bank_account where bank_id='$common_bank_id' limit 0,1");
                                  $res = $selbank[0];
                                ?>
                                  <tr>
                                    <td><?= $res['account_beneficiary'] ?>
                                      <br>
                                      <p class="text-break">
                                        <?= $res['beneficiary_address'] ?>
                                      </p>
                                    </td>
                                    <td><?= $res['bank_name'] ?>
                                      <br>
                                      <?= $res['bank_account_number'] ?>
                                      <br>
                                      <?= $res['bank_swift_code'] ?>
                                    </td>
                                    <td><?= $res['bank_supported_currency'] ?></td>
                                    <td><?= $res['bank_address'] ?></td>
                                    <td><?= $res['bank_status'] ?></td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        <?php } else { ?>
                          <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> Bank Not Added. </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="tab-pane fade show" id="v-AdditionalDetails" role="tabpanel" aria-labelledby="v-AdditionalDetails-tab" tabindex="0">
                      <span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['hand']; ?>" title="Issued IBAN"></i>&nbsp;&nbsp;Fee Engine / Transaction Fee</span>
                      <a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Fee Engine / Transaction Fee" data-ihref="<?= $data['Admins']; ?>/manage-fee<?= $data['ex']; ?>?client_id=<?= $ClientID; ?>&admin_view=1" title="Add Your Fee Engine / Transaction Fee"><span class="badge rounded-pill border text-dark py-2 px-4 my-2"><i class="<?= $data['fwicon']['circle-plus']; ?> text-success"></i></span></a>
                      <div class="row">

                        <div class="table-responsive">
                          <table class="table table-striped77">
                            <tbody>
                              <?php if (isset($fees['debit_mdr_fee']) && $fees['debit_mdr_fee']) { ?>

                                <tr>
                                  <td scope="col">Setup Fee One Time</td>
                                  <td scope="col"><?= $fees['setup_fee_one_time']; ?></td>
                                  <td scope="col">Yearly Fee</td>
                                  <td scope="col"><?= $fees['yearly_fee']; ?></td>
                                  <td scope="col">Monthly Fee</td>
                                  <td scope="col"><?= $fees['monthly_fee']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Credit MDR Transaction Fee in %</td>
                                  <td scope="col"><?= $fees['credit_mdr_fee']; ?></td>
                                  <td scope="col">Credit Minimum Transaction Fee</td>
                                  <td scope="col"><?= $fees['credit_min_fee']; ?></td>
                                </tr>
                                <tr>
                                  <td scope="col">Debit MDR Transaction Fee in %</td>
                                  <td scope="col"><?= $fees['debit_mdr_fee']; ?></td>
                                  <td scope="col">Debit Minimum Transaction Fee</td>
                                  <td scope="col"><?= $fees['debit_min_fee']; ?></td>
                                </tr>

                              <?php } else { ?>

                                <tr>
                                  <td scope="col">Fee Not Set</td>
                                  <td scope="col"><?php /*?><a class="text-primary pointer" onclick="iframe_open_modal(this);" data-tid="Fee Engine / Transaction Fee" data-ihref="<?=$data['Admins'];?>/manage-fee<?=$data['ex'];?>?client_id=<?=$ClientID;?>&admin_view=1" title="Add Your Fee Engine / Transaction Fee"><i class="<?=$data['fwicon']['circle-plus'];?> text-success"></i></a><?php */ ?></td>
                                  <td scope="col">Default MDR Transaction Fee in %</td>
                                  <td scope="col"><?= $data['mdr_fee']; ?></td>
                                  <td scope="col">Default MDR Minimum Transaction Fee</td>
                                  <td scope="col"><?= $data['mdr_min_fee']; ?></td>
                                </tr>

                              <?php } ?>

                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--==================-->
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
</div>
<script>
  function toggleUserStatus(clientId) {
    var confirmation = confirm("Are you sure you want to change the user's status?");
    if (confirmation) {
      $.ajax({
        url: 'controller/blade.update_user_status.php',
        method: 'POST',
        data: {
          clientId: clientId
        },
        success: function(response) {
          alert(response);
          location.reload();
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
  }
</script>
<script>
  $('.changeiban').click(function() {
    var ibandata = $(this).attr('data-iban');
    var admtype = 1;
    //alert(ibandata);

    if (ibandata != '') {
      $.ajax({
        url: "<?= $data['Host']; ?>/set-iban-session.php",
        data: 'ibandata=' + ibandata + '&admtype=' + admtype,
        type: "POST",
        success: function(data) {
          //alert(data);
          if (data == 1) {
            location.reload(true);
          } else {
            //alert(data);
            return false;
          }
        },
      });

    }

  });
</script>
</body>

</html>