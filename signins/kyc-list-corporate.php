<?php
include "../common.php";
include "controller/blade.kyc-list-corporate.php";
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
                        <!-- <h4 class="heading-ad">Manage <?= $data['PageName']; ?> </h4> -->
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


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class="col-lg-12">
                                                <!-- <h4 class="text-logo"><?= $data['PageName']; ?> </h4> -->
                                            </div>

                                            <?php if ($db_counts > 0) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-centered table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"><strong>Account Name</strong></th>

                                                                <th scope="col"><strong>Email</strong></th>
                                                                <th scope="col"><strong>KYC Level Name</strong></th>
                                                                <th scope="col"><strong>KYC Status</strong></th>
                                                                <th scope="col"><strong>Timestamp</strong></th>
                                                                <th scope="col"><strong>Admin KYC Status</strong></th>
                                                                <th scope="col"><strong>Actions</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($kyc as $key => $result) {
                                                                $member_username = member_username($result['client_id']);
                                                                $member_detail_temp = member_details($result['client_id'], 'full_name,company_name');
                                                                $member_fullname = $member_detail_temp['full_name'];
                                                                $member_company = $member_detail_temp['company_name'];
                                                            ?>
                                                                <tr>
                                                                    <td> <a class="text-primary" onclick="iframe_open_modal(this);" data-tid="Profile Details - (<?= $member_username; ?>)" data-ihref="<?= $data['Admins']; ?>/profile_view<?= $data['ex']; ?>?client_id=<?= $result['client_id'] ?>&admin_view=1" title="<?= $result['full_name'] ?> (<?= $result['username'] ?>)"><?= $member_fullname; ?> ( <?= $member_company ?> )</a></td>

                                                                    <td><?= $member_username ?></td>
                                                                    <td><?= $result['kyc_levelName'] ?></td>
                                                                    <td>
                                                                        <?= $result['Kyc_status'] ?><? if (isset($result['kyc_link']) && $result['kyc_link'] && $result['Kyc_status'] != "completed") { ?>
                                                                        &nbsp;<a href="<?= $result['kyc_link'] ?>" target="_blank" title="Move to kyc page"><i class="<?= $data['fwicon']['square-link']; ?> text-primary"></i></a>&nbsp;
                                                                        <a onClick="return confirm('Are you Sure to complete this kyc');" title="Click for complete KYC" class="btn btn-sm btn-success kyc-completed" data-kyc="<?= $result['id'] ?>">Approve</a>
                                                                    <? } ?>

                                                                    </td>
                                                                    <td><?= htmlspecialchars(prndate($result['Admin_Kyc_Timestamp'])) ?></td>
                                                                    <td>
                                                                        <? if ($result['Admin_Kyc_status'] == 0) { ?>
                                                                            <a onClick="return confirm('Are you Sure to complete this kyc');" title="Complete KYC" class="btn btn-sm btn-outline-success kyc-activate" data-kyc="<?= $result['id'] ?>">Pending Admin Approval</a>
                                                                        <? } else { ?>
                                                                            <i class="fa-solid fa-thumbs-up text-success fa-1x mx-4" title="Admin KYC Status Completed"></i>
                                                                        <? } ?>
                                                                    </td>
                                                                    <!-- delete button -->
                                                                    <td>
                                                                        <? if ($result['Admin_Kyc_status'] == 0) { ?>
                                                                            <a href="<?= $data['Admins']; ?>/kyc-list<?= $data['ex']; ?>?action=delete_kyc&bid=<?= $result['id'] ?>" onClick="return confirm('Are you sure to reject this kyc');" title="Click for KYC rejection" class="btn btn-sm btn-danger">Reject</a>
                                                                        <? } else { ?>
                                                                            <a href="<?= $data['Admins']; ?>/kyc-list<?= $data['ex']; ?>?action=delete_kyc&bid=<?= $result['id'] ?>" onClick="return confirm('Are you sure to delete this kyc');" title="Click for KYC deletion">
                                                                                <i class="<?= $data['fwicon']['delete']; ?> text-danger"></i>
                                                                            </a>
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
                                                <div class="alert alert-danger w-100 m-2 text-center"> <strong>Record Not Found -</strong> <?= $data['PageName']; ?> Not Added. </div>
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

<script>
    $(document).ready(function() {

        $(".kyc-activate").click(function() {
            //alert(1111);
            //var urls="<?= $data['Host']; ?>/api/sumsub/change-kyc-status";
            var urls = "<?= $data['Host']; ?>/api/sumsub/approve-admin-kyc-status.php";
            //alert(urls);
            var applicantId = $(this).attr('data-kyc');
            //alert(applicantId);
            //return;
            $.ajax({
                type: "POST",
                url: urls,
                data: {
                    applicantId: applicantId
                }
            }).done(function(data) {
                //alert(data);
                if (data == 1) {
                    location.reload(true);
                } else {
                    return false;
                }
            });
        });

        $(".kyc-completed").click(function() {
            //alert(1111);
            var urls = "<?= $data['Host']; ?>/api/sumsub/approve-kyc-status.php";
            //alert(urls);
            var applicantId = $(this).attr('data-kyc');
            //alert(applicantId);
            //return;
            $.ajax({
                type: "POST",
                url: urls,
                data: {
                    applicantId: applicantId
                }
            }).done(function(data) {
                //alert(data);
                if (data == 1) {
                    location.reload(true);
                } else {
                    return false;
                }
            });
        });

    });
</script>

</html>