<? if (!isset($post['SearchResult']) || empty(($post['SearchResult']))) {
    if (isset($data['tr_count']) && $data['tr_count'] == 0) {
        $data['result_count'] = 0;
    }
    if (isset($_SESSION['query_post_pg']['page']) && $_SESSION['query_post_pg']['page'] == "") {
        $_SESSION['query_post_pg']['page'] = 1;
    }
?>
    <div class="col-sm-12 mb-2 py-2" id="s_box">

        <div class="widget-cl2 msearch_1 advSdiv mx-3">
            <form action="<?= $pageaction; ?>">
                <div class="row search_form_css">
                    <input type="hidden" name="action" value="select" />
                    <div class="col-lg-2 col-md-5 col-sm-12 px-3">
                        <div class="form-floating inner_page_input">
                            <select name="s_month" class="form-control">
                                <option value="">Select Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5 col-sm-12 px-3">
                        <div class="form-floating inner_page_input">
                            <select name="s_year" class="form-control">
                                <option value="">Select Year</option>
                                <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="csearch" value="filter" class="adv_search btn btn-success btn-sm my-1  ms-2 float-start" style="width:56px;">
                        <i class="<?= $data['fwicon']['search']; ?>"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
<? } ?>

<script type="text/javascript" src="<?= $data['Host'] ?>/common/date_range/moment.min.js"></script>
<script type="text/javascript" src="<?= $data['Host'] ?>/common/date_range/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $data['Host'] ?>/common/date_range/daterangepicker.css" />