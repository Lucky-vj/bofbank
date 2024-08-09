<?php

include "../common.php";

include "controller/blade.common-bank-account.php";

?>

<!-- ============================================================== -->

<!-- Start right Content here -->

<!-- ============================================================== -->

<div class="main-content admin bank-ac">

  <div class="page-content">

    <div class="container-fluid">

      <!-- start page title -->

      <div class="row">

        <div class="col-12">

          <div class="page-title-box d-flex align-items-center justify-content-between">

            <!-- <h4 class="heading-ad">Manage Common Bank Account </h4> -->

            <div class="page-title-right">

              <ol class="breadcrumb m-0">

                <li class="breadcrumb-item"><a href="<?= $data['Admins-Home']; ?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                    <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
                    <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
                  </svg></li>
                <li class="breadcrumb-item active">Common Bank Account</li>

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

                        <h4 class="text-logo"> <?= ucwords($action); ?> Common Bank Account</h4>

                        <form method="post">

                          <input type="hidden" name="bid" value="<? if (isset($_GET['bid']) && $_GET['bid']) {
                                                                    echo $_GET['bid'];
                                                                  } ?>">

                          <!--class="needs-validation" novalidate-->

                          <div class="row">



                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="account_beneficiary" id="account_beneficiary" class="form-control" placeholder="Account Beneficiary" value="<?php echo $account_beneficiary ?>" title="Account Beneficiary" required>

                                <!-- <label for="account_beneficiary">Account Beneficiary</label> -->

                              </div>

                            </div>



                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="beneficiary_address" id="beneficiary_address" class="form-control" placeholder="Beneficiary Address" value="<?php echo $beneficiary_address ?>" title="Beneficiary Address" required>

                                <!-- <label for="beneficiary_address">Beneficiary Address</label> -->

                              </div>

                            </div>



                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" placeholder="Bank Account Number" value="<?php echo $bank_account_number ?>" title="Bank Account Number" required>

                                <!-- <label for="bank_account_number">IBAN / Bank Account Number</label> -->

                              </div>

                            </div>



                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="bank_swift_code" id="bank_swift_code" class="form-control" title="Bank Swift Code" placeholder="Bank Swift Code" value="<?php echo $bank_swift_code ?>" required>

                                <!-- <label for="bank_swift_code">Swift Code / BIC</label> -->

                              </div>

                            </div>



                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="<?php echo $bank_name ?>" title="Bank Name" required>

                                <!-- <label for="bank_name">Bank Name</label> -->

                              </div>

                            </div>



                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="bank_address" id="bank_address" class="form-control" title="Bank Address" placeholder="Bank Address" value="<?php echo $bank_address ?>" required>

                                <!-- <label for="bank_address">Bank Address</label> -->

                              </div>

                            </div>







                            <div class="col-md-12 my-2"><label>Supported Currency</label></div>

                            <div class="col-md-12 m-2 row">





                              <?php

                              $people = explode(',', $bank_supported_currency);

                              $query_curr = db_rows("SELECT * FROM tbl_currency WHERE currency_status='Active'");

                              foreach ($query_curr as $key => $curr) {



                              ?>

                                <div class="col-md-2">

                                  <div class="form-check form-switch radio-tab radio-checkbox">

                                    <input type="checkbox" name="bank_supported_currency[]" class="form-check-input" value="<?php echo $curr['currency_code']; ?>" <?php if (in_array($curr['currency_code'], $people)) {
                                                                                                                                                                      echo "checked";
                                                                                                                                                                    } ?>>

                                    <?php echo $curr['currency_code']; ?> - <?php echo $curr['currency_territory']; ?>

                                  </div>

                                </div>



                              <? } ?>







                            </div>
                            <div class="col-md-6 my-2">
                              <div class="form-floating">
                                <select name="codes" id="codes" class="form-control" title="codes" required>
                                  <option value="" disabled selected>Select a code</option>
                                  <option value="SERA" <?php echo ($codes == 'SERA') ? 'selected' : ''; ?>>SEPA</option>
                                  <option value="SWIFT" <?php echo ($codes == 'SWIFT') ? 'selected' : ''; ?>>SWIFT</option>
                                  <option value="Short code" <?php echo ($codes == 'Short code') ? 'selected' : ''; ?>>Short code</option>
                                  <option value="Interac" <?php echo ($codes == 'Interac') ? 'selected' : ''; ?>>Interac</option>
                                </select>
                                <?php echo $codes ?>
                              </div>
                            </div>
                            <div class="col-md-6 my-2">

                              <div class="form-floating">

                                <input type="text" name="bank_description" id="bank_description" class="form-control" title="Bank description" placeholder="Bank description" value="<?php echo $bank_description ?>" required>

                                <!-- <label for="bank_description">Bank description</label> -->

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



              <?php

              $rows = db_rows("select * from tbl_common_bank_account where 1  order by bank_status asc limit 0,50");



              ?>

              <div class="row">

                <div class="col-lg-12">

                  <div class="card">

                    <div class="card-body row">

                      <div class="col-lg-8">

                        <h4 class="text-logo">Added Bank Account </h4>

                      </div>

                      <div class="col-lg-4 text-end"><a name="Add" href="common-bank-account<?= $data['ex']; ?>?action=add" value="Add A New Bank!" title="Add A New Bank" class="btn btn-sm btn-primary"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i></a></div>

                      <?php if ($db_counts > 0) { ?>

                        <div class="table-responsive">

                          <table class="table table-centered table-nowrap mb-0">

                            <thead>

                              <tr>

                                <th scope="col">#</th>

                                <th scope="col"><strong>Beneficiary</strong></th>

                                <th scope="col"><strong>Bank&nbsp;Name</strong></th>

                                <th scope="col"><strong>Codes</strong></th>

                                <th scope="col"><strong>IBAN&nbsp;/&nbsp;A/C&nbsp;Number</strong></th>

                                <th scope="col"><strong>Swift&nbsp;Code&nbsp;/&nbsp;BIC</strong></th>

                                <th scope="col"><strong>Bank&nbsp;Address</strong></th>

                                <th scope="col"><strong>Currency</strong></th>

                                <th scope="col"><strong>Description</strong></th>


                                <th scope="col"><strong>Is Default</strong></th>

                                <th scope="col"><strong>Status</strong></th>


                                <th scope="col"><strong>Action</strong></th>

                              </tr>

                            </thead>

                            <tbody>

                              <?php

                              $i = 1;

                              foreach ($rows as $key => $result) {

                              ?>

                                <tr>

                                  <td><?= $i++ ?></td>

                                  <td><?= $result['account_beneficiary'] ?></td>

                                  <td><?= $result['bank_name'] ?></td>

                                  <td><?= $result['codes'] ?></td>

                                  <td><?= $result['bank_account_number'] ?></td>

                                  <td><?= $result['bank_swift_code'] ?></td>

                                  <td><span title="<?= $result['bank_address']; ?>"><?= substr($result['bank_address'], 0, 20) ?></span></td>

                                  <td><?= $result['bank_supported_currency'] ?></td>

                                  <td><?= $result['bank_description'] ?></td>


                                  <td class="radio-tab"><input class="form-check-input make-default" type="radio" name="bank_isdefault" data-tid="<?= $result['bank_id'] ?>" id="bank_isdefault" <? if ($result['bank_isdefault'] == 1) { ?> checked="checked" <? } ?>></td>

                                  <td><?= $result['bank_status'] ?></td>

                                  <td>

                                    <a href="<?= $data['Admins']; ?>/common-bank-account<?= $data['ex']; ?>?bid=<?= $result['bank_id'] ?>&action=edit"><i class="<?= $data['fwicon']['edit']; ?> mx-1" title="Edit"></i></a>

                                    <?php if ($result['bank_status'] == 'Active') { ?>

                                      <a href="<?= $data['Admins']; ?>/common-bank-account<?= $data['ex']; ?>?bid=<?= $result['bank_id'] ?>&action=delete&key=Deleted" onClick="return confirm('Are you Sure to Delete');" title="Delete Bank"><i class="<?= $data['fwicon']['delete']; ?> text-danger mx-1"></i></a>

                                    <? } else { ?>

                                      <a href="<?= $data['Admins']; ?>/common-bank-account<?= $data['ex']; ?>?bid=<?= $result['bank_id'] ?>&action=delete&key=Active" onClick="return confirm('Are you Sure to Active');" title="Active Bank"><i class="<?= $data['fwicon']['check']; ?> text-success  mx-1"></i></a>

                                    <? } ?>



                                    <? if (isset($result['json_log_history']) && $result['json_log_history']) { ?>

                                      <i class="<?= $data['fwicon']['circle-info']; ?> text-info fa-fw" onclick="popup_openv('<?= $data['Host'] ?>/common/json_log<?= $data['ex'] ?>?tableid=<?= $result['bank_id'] ?>&tablename=common_bank_account&tablefieldidname=bank_id')" title="View Json History"></i>

                                    <? } ?>





                                  </td>

                                </tr>

                              <?php

                              }

                              ?>

                            </tbody>

                          </table>

                        </div>

                      <? } else { ?>

                        <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> Bank A/C Not Added. </div>

                      <? } ?>

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
<script>
  $('.make-default').on('click', function() {
    var datatid = $(this).attr('data-tid');
    var urls = "?act=upd&datatid=" + datatid;
    //alert(urls);
    window.location.href = urls;

  });
</script>

</html>