<?php

include "../common.php";

include "controller/blade.member-transaction-by-iban.php";

?>
<!-- Left Sidebar End -->
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
            <!-- <h4 class="heading-ad">All Transactions of
              <? $getdata=member_details($mid,"full_name"); echo ucwords($getdata['full_name']);?>
            </h4> -->
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?=$data['Admins-Home'];?>">Home</a></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
                <path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1"/>
                <path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1"/>
              </svg></li>
                <li class="breadcrumb-item active">All Transactions</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <!-- End Page-content -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h5 class="font-size-14">Number of Transactions<br>
                  </h5>
                </div>
                <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-primary"> <i class="<?=$data['fwicon']['all-transaction'];?>"></i> </span> </div>
              </div>
              <h4 class="m-0 align-self-center"> <?php echo $no_of_transaction?> </h4>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h5 class="font-size-14">Total Credit Amount<br>
                  </h5>
                </div>
                <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-primary"> <i class="<?=$data['fwicon']['credit'];?>"></i> </span> </div>
              </div>
              <h4 class="m-0 align-self-center">
                <?=$_SESSION['acurr'];?>
                <?php echo $total_credit_trans ?> </h4>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <div class="media">
                <div class="media-body">
                  <h5 class="font-size-14">Total Debit Amount<br>
                  </h5>
                </div>
                <div class="avatar-xs"> <span class="avatar-title rounded-circle bg-primary"> <i class="<?=$data['fwicon']['refund'];?>"></i> </span> </div>
              </div>
              <h4 class="m-0 align-self-center">
                <?=$_SESSION['acurr'];?>
                <?php echo $total_debit_trans ?> </h4>
            </div>
          </div>
        </div>
      </div>
      <?php

 $sql_query=" AND member_id='$mid' "; 

$requrl="";

if((@$_GET['start_date']<>"") and (@$_GET['end_date']<>"")){ 

$startdate=$_GET['start_date'];

$enddate=$_GET['end_date'];

$enddate = date('Y-m-d', strtotime($enddate . ' +1 day'));

$sql_query.=" and createdTime >= '".$startdate."' AND  createdTime <= '".$enddate."' "; 

$requrl.="&start_date=".$_GET['start_date']."&end_date=".$_GET['end_date'];

}

if((@$_GET['value']<>"") and (@$_GET['type']<>"")){ 

$sql_query.=" and ".$_GET['type']." = '" .$_GET['value']."'";

$requrl.="&".$_GET['type']."=".$_GET['value'];

}

if($_GET['mid']<>""){ 
$requrl.="&mid=".$_GET['mid'];
}

//$sql_query.=" and transaction_status='Success' ";
$tblname="tbl_master_trans_table_thekingdombank";
$tblfieldid="transactionId";
$tblorder="order by `transactionId` desc";
include('pagination.php');


?>
      <!-- end row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <? if($rows > 0){ ?>
            <div class="card-body">
              <h4 class="header-title mb-4">All Transaction -
                <?=$rows;?>
              </h4>
              <div class="row bg-light">
                <div class="col-md-8">
                  <form  method="get">
                    <input type="hidden" name="mid" value="<?=$mid;?>" >
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label my-2">Start Date</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control my-2" name="start_date" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label my-2">End Date</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control my-2" name="end_date" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary my-2">Search</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4">
                  <form  method="get">
                    <input type="hidden" name="mid" value="<?=$mid;?>" >
                    <div class="input-group form-row my-2">
                      <input type="text" class="form-control" placeholder="Search..." required="" name="value" autocomplete="off" value="">
                      <select class="form-control" name="type">
                        <option value="transaction_id">TransID</option>
                      </select>
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="<?=$data['fwicon']['search'];?>"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0">
                  <thead>
                    <tr>
                      <th scope="col">TransID</th>
                      <th scope="col">Bill&nbsp;Amt</th>
                      <th scope="col">Trans&nbsp;Amt</th>
                      <th scope="col">Timestamp</th>
                      <th scope="col">Trans&nbsp;Response</th>
                      <th scope="col">Trans&nbsp;Status</th>
                      <th scope="col">Settlement&nbsp;Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php



foreach($nquery as $key=>$tranlist) {

?>
                    <tr>
                      <td><?=$tranlist['transactionId'];?> <?=$tranlist['foreignTransactionId'];?></td>
                      <td><?=$tranlist['requestCurrency'];?> <?=$tranlist['requestAmount'];?></td>
                      <td><?=$tranlist['transactionCurrency'];?> <?=$tranlist['transactionAmount'];?></td>
                      <td><?=$tranlist['createdTime'];?></td>
                      <td><? if($tranlist['transaction_type']=="Credit"){?>
                        <i class="<?=$data['fwicon']['circle-dot'];?> text-success mr-1"></i>
                        <? }else{ ?>
                        <i class="<?=$data['fwicon']['circle-dot'];?> text-danger mr-1"></i>
                        <? } ?>
                        <?=$tranlist['transaction_type'];?>
                        -
                        <?=$tranlist['transaction_for'];?></td>
                      <td><? if($tranlist['status']=="Process"){

						   $mscclr="warning";

						   }elseif($tranlist['status']=="Success"){

						   $mscclr="success";

						   }elseif($tranlist['status']=="Failed"){

						   $mscclr="danger";

						   }else{

						   $mscclr="secondary";

						   }

						

						?>
                        <span class="badge rounded-pill text-bg-<?=$mscclr;?>">
                        <?=$tranlist['status'];?>
                        </span></td>
                      <td><?=$tranlist['lastStatusUpdateTime'];?></td>
                      
                    </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="9"><div id="pagination_controls"><?php echo $paginationCtrls; ?></div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <? }else{ ?>
            <div class="alert alert-danger font-weight-bolder text-center mt-3 mx-3 fw-bold" role="alert"> Transactions Not Found </div>
            <? } ?>
          </div>
          <?php include "footer".$data['ex']; ?>
        </div>
      </div>
      <!-- end row -->
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!-- Right Sidebar -->
  </div>
</div>
<!-- /Right-bar -->
<!-- Right bar overlay-->
</div>
</body></html>