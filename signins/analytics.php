<?php
include "../common.php";
include "controller/blade.analytics.php";

// Initialize the search parameters
$s_name = $_GET['s_name'] ?? '';
$s_type = $_GET['s_type'] ?? '';

// Define the base query
$query = "SELECT * FROM `tbl_client_master`";

// Add search condition based on the `s_type`
if ($s_type === 'full_name' && !empty($s_name)) {
    $s_name = htmlspecialchars($s_name, ENT_QUOTES, 'UTF-8');
    $query .= " WHERE `full_name` LIKE '%$s_name%'";
}

// Execute the query
$getdetails = db_rows($query);
?>



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content admin admin-dashboard">
    <div class="page-content">
        <div class="container-fluid ">
            <div class="px-0">
                <div class="bg-light border rounded mb-2 row mx-0">
                    <div class="col-sm-4 my-2">
                        <form method="get">
                            <div class="input-group">
                                <!-- Search by Name Input -->
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    placeholder="Search By Name"
                                    name="s_name"
                                    autocomplete="off"
                                    value="<?= htmlspecialchars($_GET['s_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                    required>

                                <!-- Search Type Dropdown -->
                                <select class="form-select form-select-sm" name="s_type" required>
                                    <option value="">Select Search Type</option>
                                    <option value="full_name" <?= (isset($_GET['s_type']) && $_GET['s_type'] === 'full_name') ? 'selected' : ''; ?>>
                                        User Name
                                    </option>
                                </select>

                                <!-- Search Button -->
                                <button class="btn btn-sm btn-primary" type="submit">
                                    <i class="<?= htmlspecialchars($data['fwicon']['search'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></i>
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="row mx-0">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="float-end col-sm-12">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Total Records <span class="badge text-bg-danger"><?= $rows; ?></span>
                                    </button>

                                    <?php if (empty($requrl) ) { ?>
                                        <a href="<?= $data['Admins']; ?>/analytics<?= $data['ex'] ?>" class="btn btn-primary btn-sm" title="Click to view all records">View All Records</a>
                                    <?php } ?>

                                    <!-- Excel and PDF Download Links -->
                                    <a class="btn btn-success btn-sm ms-1 my-1" href="<?= $data['Host']; ?>/mypdf/bank-list<?= $data['ex'] ?>?str=<?= $pdfurl; ?>" title="Download Excel" target="_blank" download>
                                        <i class="<?= $data['fwicon']['excel']; ?> text-light"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm my-1" href="<?= $data['Host']; ?>/mypdf/bank-list-statement<?= $data['ex'] ?>?str=<?= $pdfurl; ?>" title="Download PDF" target="_blank" download>
                                        <i class="<?= $data['fwicon']['pdf']; ?> text-light"></i>
                                    </a>
                                </div>
                            </div>

                            <?php if ($rows > 0) { ?>
                                <div class="table-responsive">
                                    <table class="admin table table-centered table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Client ID</th>
                                                <th scope="col"><a href="?action=select&s_name=<?= htmlspecialchars($_GET['s_name'] ?? ''); ?>&s_type=<?= htmlspecialchars($_GET['s_type'] ?? ''); ?>&order=full_name&otype=<?= htmlspecialchars($otype ?? ''); ?>&pn=<?= htmlspecialchars($pn ?? ''); ?>" title="Name">Name <i class="fa-solid fa-up-down fa-sm"></i></a></th>
                                                <!-- Dynamic Bank Columns -->
                                                <?php for ($j = 1; $j <= 9; $j++): ?>
                                                    <th scope="col">Bank<?= $j; ?></th>
                                                <?php endfor; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($getdetails as $detail) {
                                                $clientId = $detail['client_id'];

                                                // Fetch client bank account details
                                                $getclient = db_rows("SELECT * FROM `tbl_member_bank_account` WHERE `client_id`='$clientId'");

                                                // Prepare arrays to store the bank names, amounts, and currency names
                                                $banks = array_fill(0, 9, '-');
                                                $amounts = array_fill(0, 9, '0.00');
                                                $currency_name = array_fill(0, 9, '-');

                                                if (!empty($getclient)) {
                                                    $bankIndex = 0;
                                                    foreach ($getclient as $clientAccount) {
                                                        if ($bankIndex > 8) break;

                                                        $assignBank = $clientAccount['assign_bank'];
                                                        $clients = $clientAccount['client_id'];

                                                        // Fetch bank details using assign_bank
                                                        $getbank_list = db_rows("SELECT * FROM `tbl_common_bank_account` WHERE `bank_id`='$assignBank'");

                                                        // Fetch the total credit amount and currency for the client from the transaction table
                                                        $totcredit = db_rows("SELECT SUM(transaction_amount) AS total_transaction, transaction_currency 
                                                                            FROM `tbl_master_trans_table` 
                                                                            WHERE transaction_type='Credit' AND member_id='$clients' 
                                                                            GROUP BY transaction_currency");

                                                        if (!empty($getbank_list)) {
                                                            $banks[$bankIndex] = htmlspecialchars($getbank_list[0]['bank_name']);
                                                            if (!empty($totcredit)) {
                                                                $currency_name[$bankIndex] = htmlspecialchars($totcredit[0]['transaction_currency']);
                                                                $amounts[$bankIndex] = htmlspecialchars($totcredit[0]['total_transaction'] ?? '0.00');
                                                            }
                                                        }

                                                        $bankIndex++;
                                                    }
                                                }
                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= htmlspecialchars($detail['client_id']); ?></td>
                                                    <td><?= htmlspecialchars($detail['full_name']); ?></td>
                                                    <?php for ($j = 0; $j < 9; $j++): ?>
                                                        <td>
                                                            <a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bankModal"
                                                                data-bank-name="<?= htmlspecialchars($banks[$j]); ?>"
                                                                data-amount="<?= htmlspecialchars($amounts[$j]); ?>"
                                                                data-currency_name="<?= htmlspecialchars($currency_name[$j]); ?>">
                                                                <?= htmlspecialchars($banks[$j]); ?>
                                                            </a>
                                                        </td>
                                                    <?php endfor; ?>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger font-weight-bolder text-center" role="alert">
                                    <?= "Transaction not found."; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php include "footer" . $data['ex']; ?>
                </div>
            </div>

            <!-- Bank Details Modal -->
            <div class="modal fade" id="bankModal" tabindex="-1" aria-labelledby="bankModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bankModalLabel">Bank Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Dynamic content will be loaded here -->
                            <p><strong>Bank Name:</strong> <span id="bank-name"></span></p>
                            <p><strong>Amount:</strong> <span id="amount"></span></p>
                            <p><strong>Currency:</strong> <span id="currency-name"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $("#status_csearch").css("display", "none"); // for hide search by status 
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var bankModal = document.getElementById('bankModal');
                    bankModal.addEventListener('show.bs.modal', function(event) {
                        var button = event.relatedTarget;
                        var bankName = button.getAttribute('data-bank-name');
                        var amount = button.getAttribute('data-amount');
                        var currency_name = button.getAttribute('data-currency_name');

                        var modalBankName = bankModal.querySelector('#bank-name');
                        var modalAmount = bankModal.querySelector('#amount');
                        var modalCurrencyName = bankModal.querySelector('#currency-name');

                        modalBankName.textContent = bankName;
                        modalAmount.textContent = amount;
                        modalCurrencyName.textContent = currency_name;
                    });
                });
            </script>
            </body>
        </div>
    </div>
</div>

</html>