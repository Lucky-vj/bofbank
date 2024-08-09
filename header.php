<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $data['PageName']; ?></title>
  <meta content="ebank <?php echo $data['PageName']; ?>" name="description" />
  <meta content="ebank <?php echo $data['PageName']; ?>" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo $_SESSION['host_favicon']; ?>">
  <!-- Bootstrap Css -->
  <script src="<?php echo $data['Host']; ?>/common/js/jquery-3.6.4.min.js"></script>
  <link href="<?php echo $data['Host']; ?>/common/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $data['Host']; ?>/common/fontawesome/css/all.min.css" rel="stylesheet">
  <script src="<?php echo $data['Host']; ?>/common/js/bootstrap.bundle.min.js"></script>
  <link href="<?php echo $data['Host']; ?>/common/css/template.css" rel="stylesheet">
  <link href="<?php echo $data['Host']; ?>/common/css/media.css" rel="stylesheet">
  <script src="<?php echo $data['Host']; ?>/common/js/template.js"></script>
  <link href="<?php echo $data['Host']; ?>/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
  <!-- Icons Css -->
  <link href="<?php echo $data['Host']; ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?php echo $data['Host']; ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- auto logout script -->
  <style>
    /* #sidebar-menu ul li a i { color: white !important; } */
    < !--.side-menu ul li:hover {
      background-color: #000 !important;
    }

    -->@media screen and (min-width: 993px) {

      #vertical-menu-btn,
      #vertical-menu-btn-close {
        display: none;
      }

      #sidebar-menu {
        padding: 40px 15px;
      }
    }
  </style>

</head>



<?php

//$data['PageFile'];



$header_title_search = array("sign-in", "sign-up", "reset-password-request", "reset-password");

if (in_array($data['PageFile'], $header_title_search)) {

?>



  <style>
    body,
    html {

      height: 100%;
      margin-top: 0 !important;

    }



    .bg {
      /* The image used */
      /*
  background-image: url(<?php echo $data['Host']; ?>/images/signup-bg.png) ;

*/

      /* Full height */

      height: 100%;



      /* Center and scale the image nicely */

      background-position: center;

      background-repeat: no-repeat;

      background-size: cover;

    }

    /* .navbar-header{ background-color:<?php echo $_SESSION['host_header_bg_color']; ?> !important; } */
    .sidebar-color {
      background-color: <?php echo $_SESSION['host_sidebar_bg_color']; ?> !important;
      color: <?php echo $_SESSION['host_sidebar_text_color']; ?> !important;
    }

    /* #sidebar-menu ul li a { color:unset !important; } */
  </style>

  <?php /*?><body data-topbar="dark" data-layout="horizontal" class="h-100 bg">
<?php */ ?>
<?php
} else { ?>
  <style>
    /* .navbar-header{ background-color:<?php echo $_SESSION['host_header_bg_color']; ?> !important; } */
    .sidebar-color {
      background-color: <?php echo $_SESSION['host_sidebar_bg_color']; ?> !important;
      color: <?php echo $_SESSION['host_sidebar_text_color']; ?> !important;
    }

    /* #sidebar-menu ul li a { color:unset !important; } */
  </style>

  <?php /*?><body data-topbar="dark" data-layout="horizontal" class="h-100">
<?php */ ?>
<?php
} ?>
<style>
  .purple-bg {
    background: white !important;
  }

  .card {
    background: white !important;
  }

  /*.btn-primary{background:#6b747d !important;}*/
  /*.metismenu .text-start:hover{background:#127c59 !important;}*/
  /*.btn-outline-primary{color:#6b747d !important;border:#6b747d 1px solid !important;}*/
  /*.btn-sm{color:#6b747d !important;  border:#6b747d 1px solid !important;}*/
  /*.text-start:hover { background: #127c59 !important; }*/
  .dropdown-toggle::after {
    margin-left: 115px !important;
  }

  tr:hover {
    background: linear-gradient(to right top, #72b57e, #8cbc87, #a2c492, #b6cba0, #c8d3af) !important;
    color: #fff;
  }

  .dropdown-item.active,
  .dropdown-item:active {
    color: #fff;
    /* background: linear-gradient(to right top, #72b57e, #8cbc87, #a2c492, #b6cba0, #c8d3af)!important; */
    background: var(--1, #27aae1) !important;
  }
</style>

<body data-topbar="dark" data-layout="horizontal" class="h-100 bg-success-subtle">
  <!-- Begin page -->

  <div id="layout-wrapper">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- auto logout script -->

    <script src="<?php echo $data['Host']; ?>/assets/libs/simplebar/simplebar.min.js"></script>


    <?php

    if (isset($data['noheader']) && $data['noheader'] == 0) {

      $current_file = basename($_SERVER['PHP_SELF']);
      $current_file = str_replace('.php', '', $current_file);

      if ($_SESSION['default_IBAN_issuer'] == "") {
        $_SESSION['default_IBAN_issuer'] = get_iban_id($_SESSION["s_client_id"]);
      }

      if (isset($_SESSION["members"]["client_id"]) && $_SESSION["members"]["client_id"] && isset($_SESSION['default_IBAN_issuer']) && $_SESSION['default_IBAN_issuer']) {
        $Client_ID = $_SESSION["members"]["client_id"];
        $default_IBAN_issuer = $_SESSION['default_IBAN_issuer'];
        if (empty($_SESSION['IBANDATA']['IBAN_issuer'])) {
          store_iban_data($Client_ID, $default_IBAN_issuer);
        }
        //print_r($_SESSION['IBANDATA']);
      }

      if (($_SESSION['IBANDATA']['Status'] == 0) && $current_file <> "account-summary") {
        header("Location:account-summary.php");
        exit;
      }
    ?>


      <header id="page-topbar" class="user-side">

        <!-- making lienaer greand in background on header bar using the sytle shheret -->

        <div class="navbar-header bg">

          <div class="d-flex">

            <!-- LOGO -->
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn"> <i class="<?php echo $data['fwicon']['toggle-sidebar']; ?>" style="color:black;border: unset !important;"></i> </button>

            <div class="d-flex text-start align-items-center">
              <div class="navbar-brand-box">
                <h4 class="heading-ad">
                  <?= $data['PageName']; ?>
                  <br>
                </h4>
              </div>
            </div>
            <!-- App Search-->
          </div>

          <div class="text-center light-logo lg-d-none"> <img src="images/light-logo.png" alt="Logo" class="img-fluid5 my-2" style="height:40px;"> </div>

          <div class="d-flex align-items-center">

            <div class="dropdown d-inline-block d-lg-none ml-2 d-none">

              <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </button>

              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                <form class="p-3">

                  <div class="form-group m-0">

                    <div class="input-group">

                      <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">

                      <div class="input-group-append">

                        <button class="btn btn-danger" type="submit"><i class="mdi mdi-magnify"></i></button>

                      </div>

                    </div>

                  </div>

                </form>

              </div>

            </div>

            <div class="dropdown d-inline-block d-none" id="load_div">

              <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <!--<i class="mdi mdi-bell-outline" style="color:white;"></i>--> <span class="badge badge-danger badge-pill" style="right: 0; color:white !important "><!-- 100 --></span></button>

              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">

                <div class="p-3">

                  <div class="row align-items-center">

                    <div class="col">

                      <h6 class="m-0 font-weight-medium text-uppercase">Notifications </h6>

                    </div>

                    <div class="col-auto"> <span class="badge badge-pill badge-primary">New <? //=$count; 
                                                                                            ?></span> </div>
                  </div>

                </div>


              </div>

            </div>

            <!--<div class="profile-pic sm-none-class">-->
            <!--<img src="images/profile-pic.png" alt="Logo" class="img-fluid5 my-2" style="width:40px; height:40px;"> -->
            <!--</div>-->
            <div class="dropdown-center mb-1 sm-none-class">
              <?php if (isset($_SESSION["members"]["company_name"]) && $_SESSION["members"]["company_name"]) { ?>
                <button class="btn  mt-1 text-start ">
                  <?php echo ucwords($_SESSION["members"]["company_name"]); ?>
                  <br>
                  <!-- <span style="font-size:12px"><?php echo $_SESSION["members"]["company_name"]; ?>  -->
                </button>
              <?php } else { ?>
                <button class="btn mt-3 text-start mx-1" data-bs-toggle="dropdown" aria-expanded="false">
                  Hi, <?php echo ucwords($_SESSION["members"]["full_name"]); ?> <i class="fa-solid fa-circle-chevron-down fa-fw"></i>
                </button>


              <? } ?>




              <!-- 	
	<ul class="dropdown-menu bg-success-subtle px-2" style="width:200px !important;">

    <li class="text-start text-white mx-0 botder bg-danger rounded p-2"><?php echo ucwords($_SESSION["members"]["full_name"]); ?> [<?php echo ucwords($_SESSION["members"]["status"]); ?>]

	

	<? if (isset($_SESSION["members"]["assign_account"]) && $_SESSION["members"]["assign_account"]) { ?>

	<div>A/c No - <?php echo ucwords($_SESSION["members"]["assign_account"]); ?></div>
	<div>For Currency - <?php echo strtoupper($_SESSION["members"]["assign_currency"]); ?></div>

	<? } ?>

	

	</li>



  <li><a class="dropdown-item" href="<?= $data['Host']; ?>/account-summary<?= $data['ex'] ?>" title="Profile"><i class="<?= $data['fwicon']['profile']; ?> fa-fw"></i> Profile</a> </li>

    <?php /*?><li><a class="dropdown-item" href="<?=$data['Host'];?>/company-details<?=$data['ex']?>" title="Company Details"><i class="<?=$data['fwicon']['comp-profile'];?> fa-fw"></i> Company Details</a> </li><?php */ ?>


	<li><a class="dropdown-item" href="<?= $data['Host']; ?>/account-security<?= $data['ex'] ?>" title="Account Security"><i class="<?= $data['fwicon']['security']; ?> fa-fw"></i> Account Security</a></li>

	<li><a class="dropdown-item" href="<?= $data['Host']; ?>/login-history<?= $data['ex'] ?>" title="Login History"><i class="<?= $data['fwicon']['history']; ?> fa-fw"></i> Login History</a></li>

	<li><a class="dropdown-item" href="<?= $data['Host']; ?>/sign-in<?= $data['ex'] ?>?Act=Out" title="Logout"><i class="<?= $data['fwicon']['signout']; ?> fa-fw"></i> Sign Out</a></li>

  </ul> -->

            </div>

            <div class="dropdown-profile">
              <button class="btn text-start " data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32" fill="none">
                  <path d="M8.87455 0.202881H5.40598C4.0261 0.202881 2.70273 0.751038 1.72701 1.72676C0.751282 2.70249 0.203125 4.02585 0.203125 5.40574V8.87431C0.203125 10.2542 0.751282 11.5776 1.72701 12.5533C2.70273 13.529 4.0261 14.0772 5.40598 14.0772H8.87455C10.2544 14.0772 11.5778 13.529 12.5535 12.5533C13.5293 11.5776 14.0774 10.2542 14.0774 8.87431V5.40574C14.0774 4.02585 13.5293 2.70249 12.5535 1.72676C11.5778 0.751038 10.2544 0.202881 8.87455 0.202881ZM10.6088 8.87431C10.6088 9.33427 10.4261 9.77539 10.1009 10.1006C9.77564 10.4259 9.33451 10.6086 8.87455 10.6086H5.40598C4.94602 10.6086 4.5049 10.4259 4.17966 10.1006C3.85442 9.77539 3.6717 9.33427 3.6717 8.87431V5.40574C3.6717 4.94578 3.85442 4.50465 4.17966 4.17941C4.5049 3.85417 4.94602 3.67145 5.40598 3.67145H8.87455C9.33451 3.67145 9.77564 3.85417 10.1009 4.17941C10.4261 4.50465 10.6088 4.94578 10.6088 5.40574V8.87431ZM8.87455 17.5457H5.40598C4.0261 17.5457 2.70273 18.0939 1.72701 19.0696C0.751282 20.0453 0.203125 21.3687 0.203125 22.7486V26.2172C0.203125 27.597 0.751282 28.9204 1.72701 29.8961C2.70273 30.8719 4.0261 31.42 5.40598 31.42H8.87455C10.2544 31.42 11.5778 30.8719 12.5535 29.8961C13.5293 28.9204 14.0774 27.597 14.0774 26.2172V22.7486C14.0774 21.3687 13.5293 20.0453 12.5535 19.0696C11.5778 18.0939 10.2544 17.5457 8.87455 17.5457ZM10.6088 26.2172C10.6088 26.6771 10.4261 27.1183 10.1009 27.4435C9.77564 27.7687 9.33451 27.9515 8.87455 27.9515H5.40598C4.94602 27.9515 4.5049 27.7687 4.17966 27.4435C3.85442 27.1183 3.6717 26.6771 3.6717 26.2172V22.7486C3.6717 22.2886 3.85442 21.8475 4.17966 21.5223C4.5049 21.197 4.94602 21.0143 5.40598 21.0143H8.87455C9.33451 21.0143 9.77564 21.197 10.1009 21.5223C10.4261 21.8475 10.6088 22.2886 10.6088 22.7486V26.2172ZM26.2174 17.5457H22.7488C21.369 17.5457 20.0456 18.0939 19.0699 19.0696C18.0941 20.0453 17.546 21.3687 17.546 22.7486V26.2172C17.546 27.597 18.0941 28.9204 19.0699 29.8961C20.0456 30.8719 21.369 31.42 22.7488 31.42H26.2174C27.5973 31.42 28.9207 30.8719 29.8964 29.8961C30.8721 28.9204 31.4203 27.597 31.4203 26.2172V22.7486C31.4203 21.3687 30.8721 20.0453 29.8964 19.0696C28.9207 18.0939 27.5973 17.5457 26.2174 17.5457ZM27.9517 26.2172C27.9517 26.6771 27.769 27.1183 27.4437 27.4435C27.1185 27.7687 26.6774 27.9515 26.2174 27.9515H22.7488C22.2889 27.9515 21.8478 27.7687 21.5225 27.4435C21.1973 27.1183 21.0146 26.6771 21.0146 26.2172V22.7486C21.0146 22.2886 21.1973 21.8475 21.5225 21.5223C21.8478 21.197 22.2889 21.0143 22.7488 21.0143H26.2174C26.6774 21.0143 27.1185 21.197 27.4437 21.5223C27.769 21.8475 27.9517 22.2886 27.9517 22.7486V26.2172ZM17.546 3.67145C17.546 3.21149 17.7287 2.77037 18.0539 2.44513C18.3792 2.11989 18.8203 1.93717 19.2803 1.93717H29.686C30.1459 1.93717 30.5871 2.11989 30.9123 2.44513C31.2376 2.77037 31.4203 3.21149 31.4203 3.67145C31.4203 4.13141 31.2376 4.57254 30.9123 4.89778C30.5871 5.22302 30.1459 5.40574 29.686 5.40574H19.2803C18.8203 5.40574 18.3792 5.22302 18.0539 4.89778C17.7287 4.57254 17.546 4.13141 17.546 3.67145ZM31.4203 10.6086C31.4203 11.0686 31.2376 11.5097 30.9123 11.8349C30.5871 12.1602 30.1459 12.3429 29.686 12.3429H19.2803C18.8203 12.3429 18.3792 12.1602 18.0539 11.8349C17.7287 11.5097 17.546 11.0686 17.546 10.6086C17.546 10.1486 17.7287 9.70751 18.0539 9.38227C18.3792 9.05703 18.8203 8.87431 19.2803 8.87431H29.686C30.1459 8.87431 30.5871 9.05703 30.9123 9.38227C31.2376 9.70751 31.4203 10.1486 31.4203 10.6086Z" fill="white" />
                </svg>
              </button>



              <ul class="dropdown-menu bg-success-subtle px-2" style="width:230px !important;">

                <li class="text-start text-white mx-0 botder bg-success rounded p-2"><?php if (isset($_SESSION["members"]["company_name"]) && $_SESSION["members"]["company_name"]) { ?> <?php echo ucwords($_SESSION["members"]["company_name"]); ?> <?php } else {
                                                                                                                                                                                                                                                      echo ucwords($_SESSION["members"]["full_name"]);
                                                                                                                                                                                                                                                    } ?><br> (<?php echo ucwords($_SESSION["members"]["status"]); ?>)



                  <? if (isset($_SESSION["members"]["assign_account"]) && $_SESSION["members"]["assign_account"]) { ?>

                    <div>A/c No - <?php echo ucwords($_SESSION["members"]["assign_account"]); ?></div>
                    <div>For Currency - <?php echo strtoupper($_SESSION["members"]["assign_currency"]); ?></div>

                  <? } ?>



                </li>



                <li><a class="dropdown-item" href="<?= $data['Host']; ?>/account-summary<?= $data['ex'] ?>" title="Profile"><i class="<?= $data['fwicon']['profile']; ?> fa-fw"></i> Profile</a> </li>

                <?php /*?><li><a class="dropdown-item" href="<?=$data['Host'];?>/company-details<?=$data['ex']?>" title="Company Details"><i class="<?=$data['fwicon']['comp-profile'];?> fa-fw"></i> Company Details</a> </li><?php */ ?>


                <li><a class="dropdown-item" href="<?= $data['Host']; ?>/account-security<?= $data['ex'] ?>" title="Account Security"><i class="<?= $data['fwicon']['security']; ?> fa-fw"></i> Account Security</a></li>

                <li><a class="dropdown-item" href="<?= $data['Host']; ?>/login-history<?= $data['ex'] ?>" title="Login History"><i class="<?= $data['fwicon']['history']; ?> fa-fw"></i> Login History</a></li>

                <li><a class="dropdown-item" href="<?= $data['Host']; ?>/sign-in<?= $data['ex'] ?>?Act=Out" title="Logout"><i class="<?= $data['fwicon']['signout']; ?> fa-fw"></i> Sign Out</a></li>

              </ul>
            </div>


          </div>

        </div>

      </header>

      <!-- ========== Left Sidebar Start ========== -->
      <div class="sidepbar-vflex">
        <div class="blue-siebar">
          <div>
            <div class="text-center light-logo"> <img src="images/light-logo.png" alt="Logo" class="img-fluid5 my-2" style="height:40px;"> </div>

            <div class="side-icon">
              <ul class="list-unstyled list-unstyled-home-payment">
                <li class="active-menu"> <a href="<?php echo $data['Host']; ?>/index<?php echo $data['ex'] ?>"><svg width="24" height="25" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3.67837 34.2852H13.292C13.9413 34.2852 14.4709 33.753 14.4709 33.1006V22.8485H21.4319V33.1006C21.4319 33.753 21.9615 34.2852 22.6108 34.2852H32.3188C32.9681 34.2852 33.4977 33.753 33.4977 33.1006L33.5 14.2721C33.5 13.8996 33.3227 13.5502 33.028 13.3234L18.7104 2.52115C18.2913 2.20649 17.7134 2.20649 17.2966 2.52115L2.97203 13.3234C2.6773 13.5479 2.5 13.8972 2.5 14.2721V33.0958C2.5 33.7529 3.02904 34.2852 3.67837 34.2852ZM4.85731 14.8644L18.003 4.94814L31.1416 14.8691V31.916H23.7915V21.6639C23.7915 21.0114 23.2619 20.4793 22.6126 20.4793H13.292C12.6426 20.4793 12.113 21.0115 12.113 21.6639V31.916H4.85731V14.8644Z" fill="white" />
                    </svg>
                    <span>Home</span></a> </li>

                <li> <a href="https://card.bofbank.com/" target="_blank"> <svg width="24" height="25" viewBox="0 0 42 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.34037 12.7268C1.34037 13.1008 1.04018 13.4043 0.670183 13.4043C0.300188 13.4043 0 13.1008 0 12.7268V3.44022C0 2.49639 0.383961 1.63367 1.00005 1.0109C1.61438 0.386377 2.46605 0 3.40328 0H38.595C39.5322 0 40.3839 0.386364 41 1.00914L41.0384 1.05148C41.6318 1.67073 42 2.51579 42 3.44025V24.5598C42 25.5072 41.6178 26.3681 41.0017 26.9909C40.3856 27.6136 39.5339 28 38.5967 28H3.40499C2.46776 28 1.61609 27.6136 1.00002 26.9909C0.383942 26.3681 0.00171438 25.5071 0.00171438 24.5598V18.5295C0.00171438 18.1555 0.301903 17.852 0.671897 17.852C1.04189 17.852 1.34208 18.1555 1.34208 18.5295V20.0979H40.6612V3.44011C40.6612 2.88085 40.4431 2.37099 40.087 1.99699L40.0556 1.967C39.6821 1.58945 39.1655 1.3548 38.5983 1.3548H3.40659C2.8394 1.3548 2.32452 1.58944 1.9493 1.967C1.57407 2.34277 1.34368 2.86499 1.34368 3.44011V12.7267L1.34037 12.7268ZM32.6173 11.0649H35.7449V7.90345H32.6173V11.0649ZM36.415 12.4198H31.9472C31.5772 12.4198 31.277 12.1164 31.277 11.7424V7.226C31.277 6.85198 31.5772 6.54854 31.9472 6.54854H36.415C36.785 6.54854 37.0852 6.85198 37.0852 7.226V11.7424C37.0852 12.1164 36.785 12.4198 36.415 12.4198ZM5.13807 7.90345C4.76807 7.90345 4.46788 7.60001 4.46788 7.226C4.46788 6.85198 4.76807 6.54854 5.13807 6.54854H15.9097C16.2797 6.54854 16.5799 6.85198 16.5799 7.226C16.5799 7.60001 16.2797 7.90345 15.9097 7.90345H5.13807ZM5.13807 12.4198C4.76807 12.4198 4.46788 12.1164 4.46788 11.7424C4.46788 11.3684 4.76807 11.0649 5.13807 11.0649H19.8821C20.2521 11.0649 20.5523 11.3684 20.5523 11.7424C20.5523 12.1164 20.2521 12.4198 19.8821 12.4198H5.13807ZM22.116 12.4198C21.746 12.4198 21.4458 12.1164 21.4458 11.7424C21.4458 11.3684 21.746 11.0649 22.116 11.0649H25.4669C25.8369 11.0649 26.1371 11.3684 26.1371 11.7424C26.1371 12.1164 25.8369 12.4198 25.4669 12.4198H22.116ZM1.34037 21.4526V24.5594C1.34037 25.1327 1.57249 25.6532 1.94599 26.0325C2.31948 26.41 2.83608 26.6447 3.40328 26.6447H38.595C39.1622 26.6447 39.6771 26.4101 40.0523 26.0325C40.4258 25.655 40.6579 25.1327 40.6579 24.5594V21.4526H1.33876H1.34037ZM1.34037 15.6766C1.34037 16.0506 1.04018 16.3541 0.670183 16.3541C0.300188 16.3541 0 16.0506 0 15.6766V15.5813C0 15.2073 0.300188 14.9039 0.670183 14.9039C1.04018 14.9039 1.34037 15.2073 1.34037 15.5813V15.6766Z" fill="white" />
                    </svg>
                    <span>Card</span>
                    <span>UnionPay</span>
                  </a> </li>

              </ul>

            </div>

          </div>
          <div class="end-icon-side">
            <ul class="list-unstyled">

              <li><a href="<?= $data['Host']; ?>/account-security<?= $data['ex'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" viewBox="0 0 25 27" fill="none">
                    <path d="M12.1601 9.99997C11.4678 9.99997 10.7912 10.2052 10.2156 10.5898C9.64002 10.9744 9.19141 11.521 8.92651 12.1606C8.6616 12.8001 8.59229 13.5038 8.72734 14.1828C8.86238 14.8617 9.19573 15.4854 9.68521 15.9748C10.1747 16.4643 10.7983 16.7977 11.4773 16.9327C12.1562 17.0678 12.8599 16.9985 13.4995 16.7335C14.139 16.4686 14.6856 16.02 15.0702 15.4445C15.4548 14.8689 15.6601 14.1922 15.6601 13.5C15.6601 12.5717 15.2913 11.6815 14.635 11.0251C13.9786 10.3687 13.0883 9.99997 12.1601 9.99997ZM12.1601 14.6666C11.9293 14.6666 11.7038 14.5982 11.5119 14.47C11.3201 14.3418 11.1705 14.1596 11.0822 13.9464C10.9939 13.7333 10.9708 13.4987 11.0158 13.2724C11.0609 13.046 11.172 12.8382 11.3351 12.675C11.4983 12.5118 11.7062 12.4007 11.9325 12.3557C12.1588 12.3107 12.3934 12.3338 12.6065 12.4221C12.8197 12.5104 13.0019 12.6599 13.1301 12.8518C13.2583 13.0437 13.3268 13.2692 13.3268 13.5C13.3268 13.8094 13.2038 14.1061 12.985 14.3249C12.7662 14.5437 12.4695 14.6666 12.1601 14.6666ZM22.4384 14.445C22.2482 14.2293 22.1443 13.9509 22.1468 13.6633V13.3366C22.1443 13.049 22.2482 12.7707 22.4384 12.555L23.1851 11.715C23.7574 11.0726 24.073 10.242 24.0718 9.38163C24.0661 8.7683 23.9056 8.16633 23.6051 7.63163L22.9518 6.46497C22.6444 5.93257 22.2022 5.49052 21.6697 5.18332C21.1372 4.87611 20.5332 4.71457 19.9184 4.71496C19.6833 4.71512 19.4489 4.73857 19.2184 4.78497L18.1218 5.00663H17.8768C17.6767 5.00353 17.4804 4.95145 17.3051 4.85497L17.0134 4.67997C16.7877 4.56982 16.6036 4.38979 16.4884 4.16663L16.1268 3.10496C15.8847 2.4204 15.4358 1.82805 14.8421 1.40999C14.2485 0.991919 13.5395 0.768832 12.8134 0.771631H11.5068C10.7863 0.765388 10.0814 0.981656 9.48841 1.39091C8.89541 1.80016 8.44317 2.38246 8.19342 3.0583L7.83175 4.16663C7.74121 4.43758 7.55441 4.6659 7.30675 4.8083L7.02675 4.9833C6.84663 5.07822 6.64696 5.13013 6.44342 5.13497H6.21008L5.16008 4.8433C4.92964 4.7969 4.69516 4.77345 4.46008 4.7733C3.83777 4.76019 3.22321 4.91328 2.67977 5.21679C2.13633 5.52029 1.68366 5.96324 1.36842 6.49997L0.715084 7.66663C0.348911 8.30352 0.19243 9.03949 0.267811 9.77026C0.343192 10.501 0.646611 11.1896 1.13508 11.7383L1.88175 12.5783C2.072 12.794 2.17587 13.0724 2.17342 13.36V13.6866C2.17587 13.9742 2.072 14.2526 1.88175 14.4683L1.13508 15.3083C0.5628 15.9507 0.247155 16.7813 0.248417 17.6416C0.254046 18.255 0.41457 18.8569 0.715084 19.3916L1.36842 20.5583C1.6758 21.0907 2.11798 21.5327 2.65048 21.84C3.18297 22.1472 3.78699 22.3087 4.40175 22.3083C4.63682 22.3081 4.8713 22.2847 5.10175 22.2383L6.19842 22.0166H6.43175C6.63183 22.0197 6.82811 22.0718 7.00342 22.1683L7.29508 22.3433C7.54274 22.4857 7.72955 22.714 7.82008 22.985L8.19342 24C8.43544 24.6845 8.88438 25.2769 9.47803 25.6949C10.0717 26.113 10.7807 26.3361 11.5068 26.3333H12.8134C13.5395 26.3361 14.2485 26.113 14.8421 25.6949C15.4358 25.2769 15.8847 24.6845 16.1268 24L16.4884 22.9383C16.579 22.6673 16.7658 22.439 17.0134 22.2966L17.2934 22.1216C17.4735 22.0267 17.6732 21.9748 17.8768 21.97H18.1101L19.2184 22.1916C19.4489 22.238 19.6833 22.2615 19.9184 22.2616C20.5332 22.262 21.1372 22.1005 21.6697 21.7933C22.2022 21.4861 22.6444 21.044 22.9518 20.5116L23.6051 19.345C23.9056 18.8103 24.0661 18.2083 24.0718 17.595C24.073 16.7346 23.7574 15.904 23.1851 15.2616L22.4384 14.445ZM20.7001 15.985L21.4468 16.825C21.637 17.0407 21.7409 17.319 21.7384 17.6066C21.7363 17.8121 21.6799 18.0133 21.5751 18.19L20.9218 19.3566C20.82 19.533 20.6738 19.6796 20.4978 19.7819C20.3218 19.8842 20.122 19.9387 19.9184 19.94H19.6851L18.5884 19.7183C17.747 19.5438 16.8708 19.685 16.1268 20.115L15.8468 20.2783C15.1038 20.7055 14.5434 21.3904 14.2718 22.2033L13.9218 23.2766C13.8435 23.5084 13.6944 23.7096 13.4955 23.852C13.2966 23.9943 13.058 24.0706 12.8134 24.07H11.5068C11.2622 24.0706 11.0236 23.9943 10.8247 23.852C10.6258 23.7096 10.4767 23.5084 10.3984 23.2766L10.0484 22.2033C9.77681 21.3904 9.2164 20.7055 8.47342 20.2783L8.18175 20.115C7.6529 19.8105 7.05364 19.6497 6.44342 19.6483C6.20448 19.6484 5.96613 19.6719 5.73175 19.7183V19.7183L4.63508 19.94H4.40175C4.19617 19.9408 3.99403 19.8873 3.81579 19.7848C3.63755 19.6824 3.48954 19.5347 3.38675 19.3566L2.74508 18.19C2.64023 18.0133 2.58388 17.8121 2.58175 17.6066C2.56625 17.325 2.65329 17.0473 2.82675 16.825L3.57342 15.985C4.1457 15.3426 4.46135 14.512 4.46008 13.6516V13.325C4.46135 12.4646 4.1457 11.634 3.57342 10.9916L2.82675 10.175C2.6365 9.95927 2.53263 9.6809 2.53508 9.3933C2.55524 9.19156 2.62761 8.99855 2.74508 8.8333L3.39842 7.66663C3.50021 7.4903 3.64639 7.34369 3.8224 7.24135C3.99842 7.13902 4.19815 7.08453 4.40175 7.0833H4.63508L5.73175 7.30497C5.96606 7.3519 6.20446 7.37535 6.44342 7.37497C7.05364 7.37361 7.6529 7.21273 8.18175 6.9083L8.47342 6.74497C9.20767 6.32918 9.767 5.66213 10.0484 4.86663L10.3984 3.7933C10.4767 3.56157 10.6258 3.36031 10.8247 3.21795C11.0236 3.07559 11.2622 2.99933 11.5068 2.99996H12.8134C13.058 2.99933 13.2966 3.07559 13.4955 3.21795C13.6944 3.36031 13.8435 3.56157 13.9218 3.7933L14.2718 4.86663C14.5434 5.67949 15.1038 6.36444 15.8468 6.79163L16.1384 6.95497C16.6673 7.2594 17.2665 7.42027 17.8768 7.42163C18.1157 7.42202 18.3541 7.39857 18.5884 7.35163L19.6851 7.12997H19.9184C20.124 7.12915 20.3261 7.18267 20.5044 7.28511C20.6826 7.38754 20.8306 7.53526 20.9334 7.7133L21.5751 8.87997C21.6799 9.05664 21.7363 9.25787 21.7384 9.4633C21.7409 9.7509 21.637 10.0293 21.4468 10.245L20.7001 11.085C20.1278 11.7273 19.8122 12.558 19.8134 13.4183V13.745C19.8122 14.6053 20.1278 15.4359 20.7001 16.0783" fill="white" fill-opacity="0.64" />
                  </svg></a> </li>

              <li><a href="<?= $data['Host']; ?>/login-history<?= $data['ex'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path d="M10.9928 7.83337C10.9928 7.52396 11.1157 7.22721 11.3345 7.00842C11.5533 6.78962 11.85 6.66671 12.1595 6.66671C12.3622 6.67114 12.5603 6.72835 12.7342 6.83269C12.9081 6.93703 13.0518 7.0849 13.1511 7.26171C13.263 7.43157 13.3238 7.62999 13.3261 7.83337C13.3261 8.14279 13.2032 8.43954 12.9844 8.65833C12.7656 8.87712 12.4689 9.00004 12.1595 9.00004C11.85 9.00004 11.5533 8.87712 11.3345 8.65833C11.1157 8.43954 10.9928 8.14279 10.9928 7.83337ZM23.8261 12.5C23.8261 14.8075 23.1419 17.0631 21.8599 18.9817C20.578 20.9003 18.7559 22.3956 16.6241 23.2786C14.4923 24.1617 12.1465 24.3927 9.88341 23.9425C7.6203 23.4924 5.5415 22.3812 3.90988 20.7496C2.27827 19.118 1.16713 17.0392 0.716967 14.7761C0.266806 12.513 0.497845 10.1672 1.38087 8.0354C2.26389 5.9036 3.75924 4.08151 5.67781 2.79956C7.59638 1.51761 9.85201 0.833374 12.1595 0.833374C13.6916 0.833374 15.2086 1.13514 16.6241 1.72145C18.0396 2.30775 19.3257 3.16711 20.409 4.25046C21.4924 5.33381 22.3518 6.61994 22.9381 8.0354C23.5244 9.45087 23.8261 10.968 23.8261 12.5ZM21.4928 12.5C21.4928 10.6541 20.9454 8.84958 19.9198 7.31472C18.8943 5.77986 17.4366 4.58358 15.7312 3.87717C14.0257 3.17075 12.1491 2.98592 10.3386 3.34605C8.52813 3.70617 6.86509 4.59509 5.5598 5.90038C4.25451 7.20567 3.3656 8.86871 3.00547 10.6792C2.64534 12.4897 2.83017 14.3663 3.53659 16.0718C4.24301 17.7772 5.43928 19.2349 6.97414 20.2604C8.509 21.286 10.3135 21.8334 12.1595 21.8334C14.6348 21.8334 17.0088 20.85 18.7591 19.0997C20.5095 17.3494 21.4928 14.9754 21.4928 12.5ZM13.3261 14.8334V11.3334C13.3261 11.024 13.2032 10.7272 12.9844 10.5084C12.7656 10.2896 12.4689 10.1667 12.1595 10.1667H10.9928C10.6834 10.1667 10.3866 10.2896 10.1678 10.5084C9.94905 10.7272 9.82613 11.024 9.82613 11.3334C9.82613 11.6428 9.94905 11.9395 10.1678 12.1583C10.3866 12.3771 10.6834 12.5 10.9928 12.5V16C10.9928 16.3095 11.1157 16.6062 11.3345 16.825C11.5533 17.0438 11.85 17.1667 12.1595 17.1667H13.3261C13.6355 17.1667 13.9323 17.0438 14.1511 16.825C14.3699 16.6062 14.4928 16.3095 14.4928 16C14.4928 15.6906 14.3699 15.3939 14.1511 15.1751C13.9323 14.9563 13.6355 14.8334 13.3261 14.8334Z" fill="white" fill-opacity="0.64" />
                  </svg></a></li>
            </ul>
          </div>

        </div>
        <div class="vertical-menu">

          <div data-simplebar class="h-100 sidebar-color111 ">

            <!--- Sidemenu -->

            <div id="sidebar-menu">

              <!-- Left Menu Start -->

              <style>
                <?php /*?>
.list-item-selected{background-color:#0066FF !important;}
.list-item:hover{background-color:#0066FF !important;}

<?php */ ?>

                /* #sidebar-menu ul li a i {color: black !important;} */
                .list-item-selected,
                .list-item:hover {
                  border-radius: 5px;
                  background: var(--gg, linear-gradient(156deg, rgba(255, 255, 255, 0.20) -4.88%, rgba(255, 255, 255, 0.00) 147.21%));
                  /* position: relative; */
                }

                /* .list-item-selected::before {
    content: '';
    position: absolute;
    height: 45px;
    border-left: 6px solid #fff;
    border-radius: 5px;
    left: -17px;
    top: 0px;
    z-index: -1;
} */
                .list-item-selected a {
                  color: #fff !important;
                }

                .metismenu li {
                  width: unset !important;
                }

                .btn-curious,
                .btn-curious:hover,
                .btn-curious:active {
                  border-radius: 10px;
                  background: #27AAE1 !important;
                  padding: 8px;
                  color: #F8F8F8 !important;
                  text-align: center;
                  font-size: 15px;
                  font-weight: 700;
                  margin-bottom: 20px;
                  border: none !important;
                }


                ul.side_menu_drop li.list-item55 a {
                  display: flex !important;
                  align-items: center;
                  justify-content: space-between;
                }

                ul.side_menu_drop2 li.list-item555 a {
                  display: flex !important;
                  align-items: center;
                  justify-content: space-between;
                }

                ul.metismenu.list-unstyled.side-menu li {
                  margin-bottom: 10px;
                }
              </style>
              <div class="text-center mb-3 px-2 border-bottom_blue d-flex">
                <button type="button" class="btn btn-sm btn-curious w-100" data-bs-toggle="modal" data-bs-target="#requestIBAN">Request IBAN</button>
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn-close"> <i class="fa-solid fa-arrow-left"></i> </button>
              </div>
              <ul class="metismenu list-unstyled side-menu my-4 border-bottom_blue">

                <li class="list-item <?php if ($current_file == 'index') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/index<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M5 0.5H3C2.20435 0.5 1.44129 0.816071 0.87868 1.37868C0.316071 1.94129 0 2.70435 0 3.5V5.5C0 6.29565 0.316071 7.05871 0.87868 7.62132C1.44129 8.18393 2.20435 8.5 3 8.5H5C5.79565 8.5 6.55871 8.18393 7.12132 7.62132C7.68393 7.05871 8 6.29565 8 5.5V3.5C8 2.70435 7.68393 1.94129 7.12132 1.37868C6.55871 0.816071 5.79565 0.5 5 0.5ZM6 5.5C6 5.76522 5.89464 6.01957 5.70711 6.20711C5.51957 6.39464 5.26522 6.5 5 6.5H3C2.73478 6.5 2.48043 6.39464 2.29289 6.20711C2.10536 6.01957 2 5.76522 2 5.5V3.5C2 3.23478 2.10536 2.98043 2.29289 2.79289C2.48043 2.60536 2.73478 2.5 3 2.5H5C5.26522 2.5 5.51957 2.60536 5.70711 2.79289C5.89464 2.98043 6 3.23478 6 3.5V5.5ZM5 10.5H3C2.20435 10.5 1.44129 10.8161 0.87868 11.3787C0.316071 11.9413 0 12.7044 0 13.5V15.5C0 16.2956 0.316071 17.0587 0.87868 17.6213C1.44129 18.1839 2.20435 18.5 3 18.5H5C5.79565 18.5 6.55871 18.1839 7.12132 17.6213C7.68393 17.0587 8 16.2956 8 15.5V13.5C8 12.7044 7.68393 11.9413 7.12132 11.3787C6.55871 10.8161 5.79565 10.5 5 10.5ZM6 15.5C6 15.7652 5.89464 16.0196 5.70711 16.2071C5.51957 16.3946 5.26522 16.5 5 16.5H3C2.73478 16.5 2.48043 16.3946 2.29289 16.2071C2.10536 16.0196 2 15.7652 2 15.5V13.5C2 13.2348 2.10536 12.9804 2.29289 12.7929C2.48043 12.6054 2.73478 12.5 3 12.5H5C5.26522 12.5 5.51957 12.6054 5.70711 12.7929C5.89464 12.9804 6 13.2348 6 13.5V15.5ZM15 0.5H13C12.2044 0.5 11.4413 0.816071 10.8787 1.37868C10.3161 1.94129 10 2.70435 10 3.5V5.5C10 6.29565 10.3161 7.05871 10.8787 7.62132C11.4413 8.18393 12.2044 8.5 13 8.5H15C15.7956 8.5 16.5587 8.18393 17.1213 7.62132C17.6839 7.05871 18 6.29565 18 5.5V3.5C18 2.70435 17.6839 1.94129 17.1213 1.37868C16.5587 0.816071 15.7956 0.5 15 0.5ZM16 5.5C16 5.76522 15.8946 6.01957 15.7071 6.20711C15.5196 6.39464 15.2652 6.5 15 6.5H13C12.7348 6.5 12.4804 6.39464 12.2929 6.20711C12.1054 6.01957 12 5.76522 12 5.5V3.5C12 3.23478 12.1054 2.98043 12.2929 2.79289C12.4804 2.60536 12.7348 2.5 13 2.5H15C15.2652 2.5 15.5196 2.60536 15.7071 2.79289C15.8946 2.98043 16 3.23478 16 3.5V5.5ZM15 10.5H13C12.2044 10.5 11.4413 10.8161 10.8787 11.3787C10.3161 11.9413 10 12.7044 10 13.5V15.5C10 16.2956 10.3161 17.0587 10.8787 17.6213C11.4413 18.1839 12.2044 18.5 13 18.5H15C15.7956 18.5 16.5587 18.1839 17.1213 17.6213C17.6839 17.0587 18 16.2956 18 15.5V13.5C18 12.7044 17.6839 11.9413 17.1213 11.3787C16.5587 10.8161 15.7956 10.5 15 10.5ZM16 15.5C16 15.7652 15.8946 16.0196 15.7071 16.2071C15.5196 16.3946 15.2652 16.5 15 16.5H13C12.7348 16.5 12.4804 16.3946 12.2929 16.2071C12.1054 16.0196 12 15.7652 12 15.5V13.5C12 13.2348 12.1054 12.9804 12.2929 12.7929C12.4804 12.6054 12.7348 12.5 13 12.5H15C15.2652 12.5 15.5196 12.6054 15.7071 12.7929C15.8946 12.9804 16 13.2348 16 13.5V15.5Z" fill="white" fill-opacity="0.64" />
                    </svg><span>Dashboard</span></a></li>

                <li class="list-item <?php if ($current_file == 'account-summary') echo 'list-item-selected'; ?> mb-2"><a href="<?php echo $data['Host']; ?>/account-summary<?php echo $data['ex'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M12 13C12.9889 13 13.9556 12.7068 14.7779 12.1573C15.6001 11.6079 16.241 10.827 16.6194 9.91342C16.9978 8.99979 17.0969 7.99446 16.9039 7.02455C16.711 6.05465 16.2348 5.16373 15.5355 4.46447C14.8363 3.76521 13.9454 3.289 12.9755 3.09608C12.0055 2.90315 11.0002 3.00217 10.0866 3.3806C9.17295 3.75904 8.39206 4.39991 7.84265 5.22215C7.29325 6.0444 7 7.0111 7 8C7 9.32609 7.52678 10.5979 8.46447 11.5355C9.40215 12.4732 10.6739 13 12 13ZM12 5C12.5933 5 13.1734 5.17595 13.6667 5.50559C14.1601 5.83524 14.5446 6.30377 14.7716 6.85195C14.9987 7.40013 15.0581 8.00333 14.9424 8.58527C14.8266 9.16722 14.5409 9.70177 14.1213 10.1213C13.7018 10.5409 13.1672 10.8266 12.5853 10.9424C12.0033 11.0581 11.4001 10.9987 10.852 10.7716C10.3038 10.5446 9.83524 10.1601 9.50559 9.66671C9.17595 9.17337 9 8.59335 9 8C9 7.20435 9.31607 6.44129 9.87868 5.87868C10.4413 5.31607 11.2044 5 12 5ZM19 18V20C19 20.2652 18.8946 20.5196 18.7071 20.7071C18.5196 20.8946 18.2652 21 18 21C17.7348 21 17.4804 20.8946 17.2929 20.7071C17.1054 20.5196 17 20.2652 17 20V18C17 17.7348 16.8946 17.4804 16.7071 17.2929C16.5196 17.1054 16.2652 17 16 17H8C7.73478 17 7.48043 17.1054 7.29289 17.2929C7.10536 17.4804 7 17.7348 7 18V20C7 20.2652 6.89464 20.5196 6.70711 20.7071C6.51957 20.8946 6.26522 21 6 21C5.73478 21 5.48043 20.8946 5.29289 20.7071C5.10536 20.5196 5 20.2652 5 20V18C5 17.2044 5.31607 16.4413 5.87868 15.8787C6.44129 15.3161 7.20435 15 8 15H16C16.7957 15 17.5587 15.3161 18.1213 15.8787C18.6839 16.4413 19 17.2044 19 18Z" fill="white" fill-opacity="0.64" />
                    </svg> <span>Profile</span></a></li>

              </ul>
              <?php if (isset($_SESSION['default_IBAN_issuer']) && $_SESSION['default_IBAN_issuer'] == 3) { ?>
                <ul class="metismenu list-unstyled side-menu m-2">

                  <li class="list-item <?php if ($current_file == 'add-money-tkb') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/create-payment-request<?php echo $data['ex'] ?>"> <i class="<?php echo $data['fwicon']['beneficiary']; ?> fa-fw"></i> <span>Request Money</span></a></li>

                  <li class="list-item <?php if ($current_file == 'fund-transfer') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/fund-transfer<?php echo $data['ex'] ?>"> <i class="<?php echo $data['fwicon']['arrow-right-arrow-left']; ?> fa-fw"></i> <span>Fund Transfer</span></a></li>

                  <?php /*?><li class="list-item <?php if($current_file=='internal-fund-transfer-tkb') echo 'list-item-selected';?>"><a href="<?php echo $data['Host'];?>/create-internal-transfer<?php echo $data['ex']?>"> <i class="<?php echo $data['fwicon']['arrow-right-arrow-left'];?> fa-fw"></i> <span>Internal Fund Transfer</span></a></li>

<li class="list-item <?php if($current_file=='external-fund-transfer-tkb') echo 'list-item-selected';?>"><a href="<?php echo $data['Host'];?>/create-external-transfer<?php echo $data['ex']?>"> <i class="<?php echo $data['fwicon']['arrow-right-arrow-left'];?> fa-fw"></i> <span>External Fund Transfer</span></a></li><?php */ ?>

                  <li class="list-item <?php if ($current_file == 'manage-beneficiary') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/manage-beneficiary<?php echo $data['ex'] ?>"> <i class="<?php echo $data['fwicon']['beneficiary']; ?> fa-fw"></i> <span>Manage Beneficiary</span></a></li>

                  <li class="list-item <?php if ($current_file == 'account-statement-tkb') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/account-statement-tkb<?php echo $data['ex'] ?>"> <i class="<?php echo $data['fwicon']['mystatement']; ?> fa-fw"></i> <span>Account Statement</span></a></li>

                </ul>

              <?php } else { ?>

                <ul class="metismenu list-unstyled side-menu side_menu_drop m-2">
                  <li class="list-item55"><a href="javascript:void(0)"><strong>Payment</strong><i class="fa-solid fa-angle-down"></i></a></li>
                  <li class="list-item list-item1 <?php if ($current_file == 'add-money') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/add-money<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M9.59775 5.90232H10.8742V7.28938C10.8742 7.3671 10.9026 7.44163 10.9531 7.49659C11.0037 7.55154 11.0723 7.58242 11.1438 7.58242C11.2153 7.58242 11.2839 7.55154 11.3345 7.49659C11.3851 7.44163 11.4135 7.3671 11.4135 7.28938V5.90232H12.6539C12.7255 5.90232 12.794 5.87145 12.8446 5.81649C12.8952 5.76153 12.9236 5.687 12.9236 5.60928C12.9236 5.53156 12.8952 5.45703 12.8446 5.40207C12.794 5.34711 12.7255 5.31624 12.6539 5.31624H11.4135V3.96825C11.4135 3.89054 11.3851 3.816 11.3345 3.76104C11.2839 3.70609 11.2153 3.67521 11.1438 3.67521C11.0723 3.67521 11.0037 3.70609 10.9531 3.76104C10.9026 3.816 10.8742 3.89054 10.8742 3.96825V5.31624H9.59775C9.52623 5.31624 9.45764 5.34711 9.40707 5.40207C9.3565 5.45703 9.32809 5.53156 9.32809 5.60928C9.32809 5.687 9.3565 5.76153 9.40707 5.81649C9.45764 5.87145 9.52623 5.90232 9.59775 5.90232ZM17.6517 10.044H16.8427V7.99267C16.8423 7.60421 16.7001 7.23179 16.4473 6.9571C16.1946 6.68242 15.8519 6.52791 15.4944 6.52747H14.3617C14.4902 5.99297 14.5042 5.43357 14.4026 4.89226C14.3011 4.35096 14.0867 3.84215 13.776 3.40494C13.4652 2.96773 13.0664 2.61375 12.6101 2.37019C12.1538 2.12664 11.6522 2 11.1438 2C10.6355 2 10.1339 2.12664 9.67756 2.37019C9.22126 2.61375 8.82242 2.96773 8.51167 3.40494C8.20092 3.84215 7.98654 4.35096 7.885 4.89226C7.78345 5.43357 7.79745 5.99297 7.92592 6.52747H4.88764C4.38701 6.52747 3.90688 6.74359 3.55288 7.12828C3.19888 7.51297 3 8.03472 3 8.57875V19.3626C3.00073 20.0619 3.25666 20.7322 3.71164 21.2267C4.16663 21.7211 4.78352 21.9992 5.42697 22H17.6517C18.0092 21.9996 18.3519 21.8451 18.6046 21.5704C18.8574 21.2957 18.9996 20.9233 19 20.5348V11.5092C18.9996 11.1207 18.8574 10.7483 18.6046 10.4736C18.3519 10.1989 18.0092 10.0444 17.6517 10.044ZM11.1438 2.5812C11.5957 2.58184 12.0406 2.70174 12.4404 2.93057C12.8402 3.1594 13.1829 3.49032 13.439 3.89488C13.6951 4.29944 13.8569 4.76553 13.9106 5.25309C13.9643 5.74064 13.9082 6.23507 13.7471 6.69386C13.7405 6.70886 13.735 6.72445 13.7308 6.74046C13.4852 7.4049 13.03 7.95266 12.4467 8.28571H9.84091C9.25762 7.95266 8.80243 7.4049 8.55683 6.74046C8.55263 6.72445 8.54716 6.70886 8.5405 6.69386C8.37947 6.23507 8.32338 5.74064 8.37706 5.25309C8.43074 4.76553 8.59258 4.29944 8.84866 3.89488C9.10475 3.49032 9.44742 3.1594 9.84721 2.93057C10.247 2.70174 10.692 2.58184 11.1438 2.5812ZM3.93425 7.5427C4.05916 7.40621 4.20774 7.298 4.37139 7.22434C4.53504 7.15068 4.71051 7.11302 4.88764 7.11355H8.11728C8.30404 7.55876 8.57274 7.95767 8.9068 8.28571H7.04494C6.97342 8.28571 6.90483 8.31659 6.85426 8.37154C6.80369 8.4265 6.77528 8.50104 6.77528 8.57875C6.77528 8.65647 6.80369 8.73101 6.85426 8.78597C6.90483 8.84092 6.97342 8.8718 7.04494 8.8718H12.5124L12.5132 8.87185L12.5141 8.8718H15.2067C15.2783 8.8718 15.3469 8.84092 15.3974 8.78597C15.448 8.73101 15.4764 8.65647 15.4764 8.57875C15.4764 8.50104 15.448 8.4265 15.3974 8.37154C15.3469 8.31659 15.2783 8.28571 15.2067 8.28571H13.3808C13.7149 7.95767 13.9836 7.55876 14.1704 7.11355H15.4944C15.7089 7.11381 15.9145 7.20652 16.0662 7.37133C16.2178 7.53614 16.3031 7.7596 16.3034 7.99267V10.044H4.88764C4.62097 10.044 4.36028 9.95803 4.13855 9.79703C3.91682 9.63603 3.74401 9.40719 3.64196 9.13946C3.53991 8.87173 3.51321 8.57712 3.56524 8.2929C3.61726 8.00868 3.74568 7.74761 3.93425 7.5427ZM18.4607 17.4676H15.5124C15.1595 17.4676 14.8212 17.3153 14.5717 17.0442C14.3222 16.7731 14.182 16.4054 14.182 16.022C14.182 15.6386 14.3222 15.2709 14.5717 14.9997C14.8212 14.7286 15.1595 14.5763 15.5124 14.5763H18.4607V17.4676ZM18.4607 13.9902H15.5124C15.0165 13.9902 14.5409 14.2043 14.1903 14.5853C13.8397 14.9663 13.6427 15.4831 13.6427 16.022C13.6427 16.5608 13.8397 17.0776 14.1903 17.4586C14.5409 17.8397 15.0165 18.0537 15.5124 18.0537H18.4607V20.5348C18.4604 20.7679 18.3751 20.9913 18.2235 21.1561C18.0718 21.321 17.8662 21.4137 17.6517 21.4139H5.42697C4.92651 21.4133 4.44671 21.197 4.09283 20.8124C3.73895 20.4279 3.53989 19.9065 3.53933 19.3626V10.0124C3.71473 10.208 3.9244 10.3634 4.15598 10.4695C4.38755 10.5755 4.63633 10.6301 4.88764 10.63H17.6517C17.8662 10.6303 18.0718 10.723 18.2235 10.8878C18.3751 11.0526 18.4604 11.2761 18.4607 11.5092V13.9902ZM15.2607 16.022C15.2607 16.0799 15.2765 16.1366 15.3061 16.1848C15.3358 16.233 15.3779 16.2705 15.4271 16.2927C15.4764 16.3149 15.5306 16.3207 15.5829 16.3094C15.6353 16.2981 15.6833 16.2702 15.721 16.2292C15.7587 16.1882 15.7844 16.136 15.7948 16.0791C15.8052 16.0223 15.7999 15.9634 15.7795 15.9098C15.7591 15.8563 15.7245 15.8105 15.6802 15.7783C15.6358 15.7461 15.5837 15.7289 15.5303 15.7289C15.4588 15.7289 15.3902 15.7598 15.3397 15.8148C15.2891 15.8697 15.2607 15.9443 15.2607 16.022Z" fill="#C8C8C8" />
                      </svg> <span>Add Money</span></a>
                  </li>


                  <li class="list-item list-item1 <?php if ($current_file == 'transfer') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/transfer<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M13.2605 7.92902L14.9982 9.66667H8.85714V10.4762H14.9982L13.2605 12.2138L13.8329 12.7862L16.5476 10.0714L13.8329 7.35669L13.2605 7.92902ZM11.7403 12.7862L11.1679 12.2138L8.45238 14.9286L11.1679 17.6433L11.7403 17.071L10.0022 15.3333H16.1429V14.5238H10.0022L11.7403 12.7862ZM12.5 4C7.81286 4 4 7.81326 4 12.5C4 17.1867 7.81286 21 12.5 21C17.1871 21 21 17.1867 21 12.5C21 7.81326 17.1871 4 12.5 4ZM12.5 20.1905C8.25931 20.1905 4.80952 16.7407 4.80952 12.5C4.80952 8.25931 8.25931 4.80952 12.5 4.80952C16.7407 4.80952 20.1905 8.25931 20.1905 12.5C20.1905 16.7407 16.7407 20.1905 12.5 20.1905Z" fill="#C8C8C8" />
                      </svg> <span>Transfers</span></a></li>

                  <li class="list-item list-item1 <?php if ($current_file == 'money-exchange') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/money-exchange<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M12.7617 20.6181C11.168 20.6199 9.60625 20.1723 8.25562 19.327C7.18958 18.6569 6.28374 17.7599 5.60221 16.7002L4.18379 17.0935L4.18468 17.0944C4.07433 17.1247 3.95688 17.0944 3.87589 17.0143C3.79403 16.9342 3.76199 16.8168 3.79047 16.7064L4.99621 12.0411C5.02469 11.9307 5.11011 11.8444 5.21956 11.8133C5.32902 11.783 5.44736 11.8133 5.52835 11.8934L8.96676 15.2703C9.04774 15.3504 9.07977 15.4669 9.0513 15.5773C9.02282 15.6867 8.93829 15.7739 8.82884 15.8042L7.73255 16.1085C8.94895 17.6444 10.8017 18.5396 12.7619 18.5378C12.9372 18.5378 13.0805 18.681 13.0805 18.8572V20.3014V20.3005C13.0796 20.4767 12.937 20.6181 12.7617 20.6181ZM5.74709 16.0097C5.85921 16.0097 5.96332 16.0685 6.02115 16.1637C6.66184 17.227 7.54368 18.1258 8.59461 18.7852C9.75229 19.5095 11.0781 19.9198 12.4424 19.9731V19.1678C10.2275 19.0735 8.18616 17.9381 6.93873 16.105C6.88089 16.0205 6.86754 15.9128 6.90314 15.8158C6.93784 15.7197 7.01793 15.6459 7.1167 15.6183L8.12579 15.338L5.47579 12.7361L4.5468 16.3319L5.66265 16.0222C5.69024 16.0142 5.71861 16.0097 5.74709 16.0097Z" fill="white" fill-opacity="0.64" />
                        <path d="M6.54003 5.7586H3.85176C3.67557 5.7586 3.5332 5.61534 3.5332 5.43916C3.5332 5.26297 3.67558 5.12061 3.85176 5.12061H6.54003C6.71622 5.12061 6.85858 5.26298 6.85858 5.43916C6.85858 5.61535 6.71621 5.7586 6.54003 5.7586Z" fill="white" fill-opacity="0.64" />
                        <path d="M6.54003 6.94318H3.85176C3.67557 6.94318 3.5332 6.79991 3.5332 6.62373C3.5332 6.44754 3.67558 6.30518 3.85176 6.30518H6.54003C6.71622 6.30518 6.85858 6.44755 6.85858 6.62373C6.85858 6.79992 6.71621 6.94318 6.54003 6.94318Z" fill="white" fill-opacity="0.64" />
                        <path d="M6.55006 8.51404C5.77768 8.51404 5.0489 8.15544 4.57817 7.54234C4.10834 6.92924 3.94995 6.13282 4.14927 5.38625C4.34949 4.64057 4.88518 4.02925 5.59883 3.73382C6.31248 3.43838 7.12313 3.49178 7.7923 3.87797C7.86971 3.9189 7.92666 3.98831 7.95069 4.07196C7.97471 4.1556 7.96403 4.24548 7.92043 4.32021C7.87683 4.39585 7.80475 4.45013 7.72022 4.4706C7.63568 4.49106 7.5467 4.47683 7.47374 4.42966C6.90246 4.10042 6.19858 4.10042 5.6273 4.43055C5.05603 4.76068 4.70364 5.37023 4.70364 6.0296C4.70364 6.68896 5.05603 7.29851 5.6273 7.62864C6.19858 7.95877 6.90246 7.95877 7.47374 7.62953C7.5467 7.58326 7.63569 7.56991 7.71933 7.59037C7.80386 7.61173 7.87505 7.66601 7.91865 7.74076C7.96137 7.8155 7.97293 7.90449 7.94891 7.98724C7.92488 8.07088 7.86882 8.14029 7.7923 8.18122C7.41501 8.39923 6.98606 8.51404 6.55006 8.51404Z" fill="white" fill-opacity="0.64" />
                        <path d="M6.03183 10.0618C3.80901 10.0618 2 8.25368 2 6.03001C2 3.80634 3.80816 2 6.03183 2C8.2555 2 10.0637 3.80816 10.0637 6.03183C10.0637 8.2555 8.25373 10.0618 6.03183 10.0618ZM6.03183 2.63693C4.15959 2.63693 2.63716 4.15945 2.63716 6.03161C2.63716 7.90376 4.15968 9.42537 6.03092 9.42537C7.90317 9.42537 9.42469 7.90285 9.42469 6.03161C9.42558 4.15936 7.90216 2.63693 6.03161 2.63693H6.03183Z" fill="white" fill-opacity="0.64" />
                        <path d="M18.6949 12.1974C18.6113 12.1983 18.5312 12.1654 18.4716 12.1067L15.0331 8.72974C14.9522 8.64966 14.9201 8.53309 14.9486 8.42274C14.9771 8.31328 15.0616 8.22608 15.1711 8.19583L16.2674 7.89151C15.05 6.35563 13.1973 5.46134 11.238 5.46316C11.0627 5.46316 10.9194 5.32078 10.9194 5.1446V3.7004C10.9194 3.52421 11.0627 3.38184 11.238 3.38184C12.8317 3.38006 14.3935 3.82765 15.7441 4.67301C16.8101 5.34306 17.716 6.24003 18.3975 7.29977L19.8159 6.90646L19.815 6.90557C19.9254 6.87531 20.0428 6.90557 20.1238 6.98565C20.2057 7.06574 20.2377 7.1832 20.2093 7.29355L19.0035 11.9589C18.967 12.0995 18.84 12.1974 18.6949 12.1974ZM15.8741 8.66196L18.5241 11.2639L19.4531 7.66807L18.3372 7.97774C18.1993 8.016 18.0524 7.95816 17.9786 7.83536C17.3379 6.77199 16.4561 5.87325 15.4051 5.21384C14.2475 4.4895 12.9217 4.08017 11.5574 4.0268V4.83389C13.7722 4.92733 15.8136 6.06276 17.061 7.89575C17.1189 7.98029 17.1322 8.08796 17.0966 8.18494C17.0619 8.28194 16.9818 8.3549 16.883 8.38249L15.8741 8.66196Z" fill="white" fill-opacity="0.64" />
                        <path d="M17.9679 20.0239C17.3432 20.0239 16.7844 19.708 16.5779 19.239H16.5788C16.5076 19.078 16.5806 18.8902 16.7417 18.819C16.9027 18.7478 17.0914 18.8208 17.1617 18.9818C17.2667 19.2203 17.5986 19.3867 17.9688 19.3867C18.4244 19.3867 18.807 19.1358 18.807 18.8377C18.807 18.552 18.4386 18.3002 18.0017 18.2895H17.9679C17.5906 18.2895 17.232 18.1756 16.9579 17.971C16.6616 17.7485 16.4907 17.4317 16.4907 17.1025C16.4907 16.7724 16.6607 16.4556 16.957 16.2331C17.2302 16.0284 17.5888 15.9146 17.967 15.9146C18.6344 15.9146 19.2199 16.274 19.3925 16.7884L19.3943 16.7866C19.4503 16.9539 19.3605 17.1354 19.1932 17.1915C19.0259 17.2475 18.8444 17.1576 18.7883 16.9904C18.7047 16.7394 18.3523 16.5517 17.9679 16.5517C17.5132 16.5517 17.1296 16.8026 17.1296 17.1007C17.1296 17.3997 17.514 17.6497 17.9679 17.6497C17.9857 17.6497 18.0035 17.6497 18.0204 17.6506C18.8177 17.6738 19.4441 18.1934 19.4441 18.8368C19.4441 19.1669 19.2742 19.4837 18.9778 19.7053C18.7047 19.9108 18.3461 20.0239 17.9679 20.0239Z" fill="white" fill-opacity="0.64" />
                        <path d="M17.968 20.6036C17.7918 20.6036 17.6494 20.4603 17.6494 20.2842V19.7058C17.6494 19.5296 17.7918 19.3872 17.968 19.3872C18.1442 19.3872 18.2874 19.5296 18.2874 19.7058V20.2842C18.2874 20.3687 18.2536 20.4506 18.194 20.5102C18.1335 20.5698 18.0525 20.6036 17.968 20.6036Z" fill="white" fill-opacity="0.64" />
                        <path d="M17.968 16.5514C17.7918 16.5514 17.6494 16.409 17.6494 16.2328V15.6544C17.6494 15.4782 17.7918 15.335 17.968 15.335C18.1442 15.335 18.2874 15.4782 18.2874 15.6544V16.2328C18.2874 16.3173 18.2536 16.3983 18.194 16.4579C18.1335 16.5185 18.0525 16.5514 17.968 16.5514Z" fill="white" fill-opacity="0.64" />
                        <path d="M17.9684 22.0002C15.7455 22.0002 13.9365 20.192 13.9365 17.9684C13.9365 15.7447 15.7447 13.9365 17.9684 13.9365C20.192 13.9365 22.0002 15.7447 22.000ul22.0002 20.192 20.192 22.0002 17.9684 22.0002ZM17.9684 14.5753C16.097 14.5753 14.5746 16.0978 14.5746 17.969C14.5746 19.8413 16.0971 21.3628 17.9684 21.3628C19.8406 21.3628 21.3621 19.8403 21.3621 17.969C21.363 16.0977 19.8405 14.5753 17.9684 14.5753Z" fill="white" fill-opacity="0.64" />
                      </svg> <span>Money Exchange</span></a></li>
                </ul>

                <ul class="metismenu list-unstyled side-menu side_menu_drop m-2">
                  <li class="list-item555"><a href="javascript:void(0)"><strong>Crypto</strong><i class="fa-solid fa-angle-down"></i></a></li>

                  <li class="list-item list-item2 <?php if ($current_file == 'crypto-exchange') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/crypto-exchange<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M13 10.35C12.4681 9.81903 11.7514 9.51444 11 9.5H10.94H9.94001H9.06001C8.82678 9.49099 8.60547 9.39461 8.44001 9.23C8.36161 9.15499 8.29909 9.065 8.25615 8.96537C8.2132 8.86574 8.19071 8.75849 8.19001 8.65V8.56C8.23023 8.26312 8.38004 7.99202 8.61001 7.8C9.01042 7.50171 9.5011 7.34992 10 7.37C10.1432 7.35972 10.2869 7.35972 10.43 7.37C10.99 7.44374 11.5138 7.68815 11.93 8.07C12.0285 8.15733 12.1432 8.2244 12.2676 8.2674C12.3921 8.31039 12.5237 8.32845 12.6551 8.32056C12.7865 8.31266 12.9151 8.27897 13.0334 8.22139C13.1518 8.16382 13.2577 8.08349 13.345 7.985C13.4323 7.88651 13.4994 7.77178 13.5424 7.64737C13.5854 7.52295 13.6035 7.39129 13.5956 7.2599C13.5877 7.1285 13.554 6.99995 13.4964 6.88158C13.4388 6.7632 13.3585 6.65733 13.26 6.57C12.6129 6.02232 11.8338 5.65345 11 5.5V4.5C11 4.23478 10.8946 3.98043 10.7071 3.79289C10.5196 3.60536 10.2652 3.5 10 3.5C9.73479 3.5 9.48044 3.60536 9.2929 3.79289C9.10536 3.98043 9.00001 4.23478 9.00001 4.5V5.5C8.38356 5.62118 7.80652 5.89253 7.32 6.29C6.70036 6.81808 6.30375 7.56127 6.21001 8.37C6.20484 8.46326 6.20484 8.55674 6.21001 8.65C6.21434 9.40155 6.5164 10.1207 7.05001 10.65C7.56944 11.1693 8.26603 11.4729 9.00001 11.5H9.06001H10.06H10.94C11.1705 11.5125 11.3895 11.6044 11.56 11.76C11.7171 11.9165 11.8068 12.1283 11.81 12.35V12.43C11.7703 12.7299 11.6206 13.0043 11.39 13.2C10.9896 13.4983 10.4989 13.6501 10 13.63C9.85686 13.6403 9.71315 13.6403 9.57001 13.63C9.01262 13.5474 8.49138 13.3041 8.07001 12.93C7.97362 12.8344 7.85879 12.7595 7.7325 12.7097C7.60621 12.6599 7.47112 12.6364 7.33544 12.6405C7.19977 12.6447 7.06635 12.6764 6.94333 12.7337C6.82031 12.7911 6.71025 12.8729 6.61986 12.9742C6.52947 13.0754 6.46064 13.194 6.41757 13.3228C6.37449 13.4515 6.35808 13.5876 6.36932 13.7229C6.38056 13.8582 6.41922 13.9897 6.48295 14.1096C6.54668 14.2294 6.63414 14.335 6.74001 14.42C7.38395 14.9745 8.16407 15.3473 9.00001 15.5V16.5C9.00001 16.7652 9.10536 17.0196 9.2929 17.2071C9.48044 17.3946 9.73479 17.5 10 17.5C10.2652 17.5 10.5196 17.3946 10.7071 17.2071C10.8946 17.0196 11 16.7652 11 16.5V15.5C11.6171 15.3751 12.1941 15.1004 12.68 14.7C13.3037 14.1752 13.7012 13.4303 13.79 12.62C13.795 12.5267 13.795 12.4333 13.79 12.34C13.7964 11.599 13.5129 10.8849 13 10.35ZM20 10.5C20 12.4778 19.4135 14.4112 18.3147 16.0557C17.2159 17.7002 15.6541 18.9819 13.8268 19.7388C11.9996 20.4957 9.98891 20.6937 8.0491 20.3079C6.10929 19.922 4.32746 18.9696 2.92894 17.5711C1.53041 16.1725 0.578004 14.3907 0.192152 12.4509C-0.193701 10.5111 0.00433284 8.50043 0.761209 6.67317C1.51809 4.8459 2.79981 3.28412 4.4443 2.1853C6.08879 1.08649 8.02219 0.5 10 0.5C11.3132 0.5 12.6136 0.758658 13.8268 1.2612C15.0401 1.76375 16.1425 2.50035 17.0711 3.42893C17.9997 4.35752 18.7363 5.45991 19.2388 6.67317C19.7414 7.88642 20 9.18678 20 10.5ZM18 10.5C17.9986 8.64924 17.3554 6.85623 16.1802 5.42646C15.0051 3.99669 13.3705 3.01862 11.555 2.65887C9.73955 2.29913 7.85551 2.57998 6.2239 3.45356C4.59228 4.32715 3.31403 5.73943 2.60692 7.44979C1.89981 9.16014 1.80759 11.0628 2.34598 12.8335C2.88436 14.6042 4.02004 16.1335 5.55953 17.1608C7.09901 18.1881 8.94705 18.6498 10.7888 18.4673C12.6305 18.2848 14.352 17.4694 15.66 16.16C16.4027 15.4165 16.9916 14.534 17.3931 13.5628C17.7946 12.5916 18.0008 11.5509 18 10.5Z" fill="white" fill-opacity="0.64" />
                      </svg> <span>Crypto Exchange</span></a>
                  </li>
                  <li class="list-item list-item2 mtb-2">
                    <a href="https://boftrades.com/" target="_blank">
                      <svg width="24" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.04687 14.5312H2.10937C1.92289 14.5312 1.74405 14.4572 1.61219 14.3253C1.48033 14.1934 1.40625 14.0146 1.40625 13.8281V9.60937C1.40625 9.42289 1.48033 9.24405 1.61219 9.11219C1.74405 8.98033 1.92289 8.90625 2.10937 8.90625H3.04687C3.23335 8.90625 3.4122 8.98033 3.54406 9.11219C3.67592 9.24405 3.75 9.42289 3.75 9.60937V13.8281C3.75 14.0146 3.67592 14.1934 3.54406 14.3253C3.4122 14.4572 3.23335 14.5312 3.04687 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                        <path d="M9.60937 14.5312H8.67187C8.48539 14.5312 8.30655 14.4572 8.17469 14.3253C8.04283 14.1934 7.96875 14.0146 7.96875 13.8281V6.79687C7.96875 6.61039 8.04283 6.43155 8.17469 6.29969C8.30655 6.16783 8.48539 6.09375 8.67187 6.09375H9.60937C9.79585 6.09375 9.9747 6.16783 10.1066 6.29969C10.2384 6.43155 10.3125 6.61039 10.3125 6.79687V13.8281C10.3125 14.0146 10.2384 14.1934 10.1066 14.3253C9.9747 14.4572 9.79585 14.5312 9.60937 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                        <path d="M12.8906 14.5312H11.9531C11.7666 14.5312 11.5878 14.4572 11.4559 14.3253C11.3241 14.1934 11.25 14.0146 11.25 13.8281V3.51562C11.25 3.32914 11.3241 3.1503 11.4559 3.01844C11.5878 2.88658 11.7666 2.8125 11.9531 2.8125H12.8906C13.0771 2.8125 13.2559 2.88658 13.3878 3.01844C13.5197 3.1503 13.5937 3.32914 13.5937 3.51562V13.8281C13.5937 14.0146 13.5197 14.1934 13.3878 14.3253C13.2559 14.4572 13.0771 14.5312 12.8906 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                        <path d="M6.32812 14.5312H5.39062C5.20414 14.5312 5.0253 14.4572 4.89344 14.3253C4.76158 14.1934 4.6875 14.0146 4.6875 13.8281V1.17187C4.6875 0.985395 4.76158 0.806552 4.89344 0.674691C5.0253 0.542829 5.20414 0.46875 5.39062 0.46875H6.32812C6.5146 0.46875 6.69345 0.542829 6.82531 0.674691C6.95717 0.806552 7.03125 0.985395 7.03125 1.17187V13.8281C7.03125 14.0146 6.95717 14.1934 6.82531 14.3253C6.69345 14.4572 6.5146 14.5312 6.32812 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                      </svg>
                      <span>Trade Crypto</span>
                    </a>
                  </li>
                  <li class="list-item list-item2 mtb-2">
                    <a href="https://boftrades.com/login" target="_blank">
                      <svg width="24" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.9375 11.0156C0.9375 11.4507 1.11035 11.868 1.41803 12.1757C1.7257 12.4834 2.143 12.6562 2.57812 12.6562H12.4219C12.857 12.6562 13.2743 12.4834 13.582 12.1757C13.8896 11.868 14.0625 11.4507 14.0625 11.0156V6.50391H0.9375V11.0156ZM2.87109 8.78906C2.87109 8.55596 2.96369 8.33241 3.12852 8.16758C3.29335 8.00276 3.5169 7.91016 3.75 7.91016H5.15625C5.38935 7.91016 5.6129 8.00276 5.77773 8.16758C5.94256 8.33241 6.03515 8.55596 6.03515 8.78906V9.375C6.03515 9.6081 5.94256 9.83165 5.77773 9.99648C5.6129 10.1613 5.38935 10.2539 5.15625 10.2539H3.75C3.5169 10.2539 3.29335 10.1613 3.12852 9.99648C2.96369 9.83165 2.87109 9.6081 2.87109 9.375V8.78906Z" fill="white" fill-opacity="0.64" />
                        <path d="M12.4219 2.34375H2.57812C2.143 2.34375 1.7257 2.5166 1.41803 2.82428C1.11035 3.13195 0.9375 3.54925 0.9375 3.98437V4.74609H14.0625V3.98437C14.0625 3.54925 13.8896 3.13195 13.582 2.82428C13.2743 2.5166 12.857 2.34375 12.4219 2.34375V2.34375Z" fill="white" fill-opacity="0.64" />
                      </svg>
                      <span>Crypto Wallet</span>
                    </a>
                  </li>
                </ul>
                <ul class="metismenu list-unstyled side-menu m-2 border-bottom_blue">
                  <li class="list-item <?php if ($current_file == 'schedule') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/schedule<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M17 0.5H3C2.20435 0.5 1.44129 0.816071 0.87868 1.37868C0.316071 1.94129 0 2.70435 0 3.5V13.5C0 14.2957 0.316071 15.0587 0.87868 15.6213C1.44129 16.1839 2.20435 16.5 3 16.5H17C17.7957 16.5 18.5587 16.1839 19.1213 15.6213C19.6839 15.0587 20 14.2957 20 13.5V3.5C20 2.70435 19.6839 1.94129 19.1213 1.37868C18.5587 0.816071 17.7957 0.5 17 0.5ZM3 2.5H17C17.2652 2.5 17.5196 2.60536 17.7071 2.79289C17.8946 2.98043 18 3.23478 18 3.5V4.5H2V3.5C2 3.23478 2.10536 2.98043 2.29289 2.79289C2.48043 2.60536 2.73478 2.5 3 2.5ZM18 13.5C18 13.7652 17.8946 14.0196 17.7071 14.2071C17.5196 14.3946 17.2652 14.5 17 14.5H3C2.73478 14.5 2.48043 14.3946 2.29289 14.2071C2.10536 14.0196 2 13.7652 2 13.5V6.5H18V13.5ZM4 11.5C4 11.2348 4.10536 10.9804 4.29289 10.7929C4.48043 10.6054 4.73478 10.5 5 10.5H11C11.2652 10.5 11.5196 10.6054 11.7071 10.7929C11.8946 10.9804 12 11.2348 12 11.5C12 11.7652 11.8946 12.0196 11.7071 12.2071C11.5196 12.3946 11.2652 12.5 11 12.5H5C4.73478 12.5 4.48043 12.3946 4.29289 12.2071C4.10536 12.0196 4 11.7652 4 11.5Z" fill="white" fill-opacity="0.64" />
                      </svg> <span>Schedule</span></a>
                  </li>

                  <?php /*?><li class="list-item <?php if($current_file=='request-money') echo 'list-item-selected';?>"><a href="<?php echo $data['Host'];?>/request-money<?php echo $data['ex']?>"> <i class="<?php echo $data['fwicon']['requestfund'];?> fa-fw"></i> <span>Request Money</span></a></li><?php */ ?>

                  <!-- <li class="list-item <?php if ($current_file == 'crypto-exchange') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/crypto-exchange<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M13 10.35C12.4681 9.81903 11.7514 9.51444 11 9.5H10.94H9.94001H9.06001C8.82678 9.49099 8.60547 9.39461 8.44001 9.23C8.36161 9.15499 8.29909 9.065 8.25615 8.96537C8.2132 8.86574 8.19071 8.75849 8.19001 8.65V8.56C8.23023 8.26312 8.38004 7.99202 8.61001 7.8C9.01042 7.50171 9.5011 7.34992 10 7.37C10.1432 7.35972 10.2869 7.35972 10.43 7.37C10.99 7.44374 11.5138 7.68815 11.93 8.07C12.0285 8.15733 12.1432 8.2244 12.2676 8.2674C12.3921 8.31039 12.5237 8.32845 12.6551 8.32056C12.7865 8.31266 12.9151 8.27897 13.0334 8.22139C13.1518 8.16382 13.2577 8.08349 13.345 7.985C13.4323 7.88651 13.4994 7.77178 13.5424 7.64737C13.5854 7.52295 13.6035 7.39129 13.5956 7.2599C13.5877 7.1285 13.554 6.99995 13.4964 6.88158C13.4388 6.7632 13.3585 6.65733 13.26 6.57C12.6129 6.02232 11.8338 5.65345 11 5.5V4.5C11 4.23478 10.8946 3.98043 10.7071 3.79289C10.5196 3.60536 10.2652 3.5 10 3.5C9.73479 3.5 9.48044 3.60536 9.2929 3.79289C9.10536 3.98043 9.00001 4.23478 9.00001 4.5V5.5C8.38356 5.62118 7.80652 5.89253 7.32 6.29C6.70036 6.81808 6.30375 7.56127 6.21001 8.37C6.20484 8.46326 6.20484 8.55674 6.21001 8.65C6.21434 9.40155 6.5164 10.1207 7.05001 10.65C7.56944 11.1693 8.26603 11.4729 9.00001 11.5H9.06001H10.06H10.94C11.1705 11.5125 11.3895 11.6044 11.56 11.76C11.7171 11.9165 11.8068 12.1283 11.81 12.35V12.43C11.7703 12.7299 11.6206 13.0043 11.39 13.2C10.9896 13.4983 10.4989 13.6501 10 13.63C9.85686 13.6403 9.71315 13.6403 9.57001 13.63C9.01262 13.5474 8.49138 13.3041 8.07001 12.93C7.97362 12.8344 7.85879 12.7595 7.7325 12.7097C7.60621 12.6599 7.47112 12.6364 7.33544 12.6405C7.19977 12.6447 7.06635 12.6764 6.94333 12.7337C6.82031 12.7911 6.71025 12.8729 6.61986 12.9742C6.52947 13.0754 6.46064 13.194 6.41757 13.3228C6.37449 13.4515 6.35808 13.5876 6.36932 13.7229C6.38056 13.8582 6.41922 13.9897 6.48295 14.1096C6.54668 14.2294 6.63414 14.335 6.74001 14.42C7.38395 14.9745 8.16407 15.3473 9.00001 15.5V16.5C9.00001 16.7652 9.10536 17.0196 9.2929 17.2071C9.48044 17.3946 9.73479 17.5 10 17.5C10.2652 17.5 10.5196 17.3946 10.7071 17.2071C10.8946 17.0196 11 16.7652 11 16.5V15.5C11.6171 15.3751 12.1941 15.1004 12.68 14.7C13.3037 14.1752 13.7012 13.4303 13.79 12.62C13.795 12.5267 13.795 12.4333 13.79 12.34C13.7964 11.599 13.5129 10.8849 13 10.35ZM20 10.5C20 12.4778 19.4135 14.4112 18.3147 16.0557C17.2159 17.7002 15.6541 18.9819 13.8268 19.7388C11.9996 20.4957 9.98891 20.6937 8.0491 20.3079C6.10929 19.922 4.32746 18.9696 2.92894 17.5711C1.53041 16.1725 0.578004 14.3907 0.192152 12.4509C-0.193701 10.5111 0.00433284 8.50043 0.761209 6.67317C1.51809 4.8459 2.79981 3.28412 4.4443 2.1853C6.08879 1.08649 8.02219 0.5 10 0.5C11.3132 0.5 12.6136 0.758658 13.8268 1.2612C15.0401 1.76375 16.1425 2.50035 17.0711 3.42893C17.9997 4.35752 18.7363 5.45991 19.2388 6.67317C19.7414 7.88642 20 9.18678 20 10.5ZM18 10.5C17.9986 8.64924 17.3554 6.85623 16.1802 5.42646C15.0051 3.99669 13.3705 3.01862 11.555 2.65887C9.73955 2.29913 7.85551 2.57998 6.2239 3.45356C4.59228 4.32715 3.31403 5.73943 2.60692 7.44979C1.89981 9.16014 1.80759 11.0628 2.34598 12.8335C2.88436 14.6042 4.02004 16.1335 5.55953 17.1608C7.09901 18.1881 8.94705 18.6498 10.7888 18.4673C12.6305 18.2848 14.352 17.4694 15.66 16.16C16.4027 15.4165 16.9916 14.534 17.3931 13.5628C17.7946 12.5916 18.0008 11.5509 18 10.5Z" fill="white" fill-opacity="0.64" />
                      </svg> <span>Crypto Exchange</span></a>
                  </li> -->

                  <li class="list-item <?php if ($current_file == 'member-transactions') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/member-transactions<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M15.5998 5.1001L12.5998 8.1001C12.5228 8.18669 12.429 8.25663 12.324 8.30564C12.2191 8.35464 12.1052 8.38168 11.9894 8.38509C11.8736 8.3885 11.7584 8.3682 11.6507 8.32546C11.5431 8.28271 11.4453 8.21841 11.3634 8.1365C11.2815 8.05459 11.2172 7.95681 11.1744 7.84915C11.1317 7.74149 11.1114 7.62623 11.1148 7.51045C11.1182 7.39466 11.1452 7.2808 11.1942 7.17584C11.2433 7.07088 11.3132 6.97705 11.3998 6.9001L12.7998 5.5001H1.99978C1.73456 5.5001 1.48021 5.39474 1.29267 5.20721C1.10513 5.01967 0.999776 4.76532 0.999776 4.5001C0.999776 4.23489 1.10513 3.98053 1.29267 3.793C1.48021 3.60546 1.73456 3.5001 1.99978 3.5001H12.7998L11.3998 2.1001C11.3132 2.02315 11.2433 1.92932 11.1942 1.82436C11.1452 1.71941 11.1182 1.60554 11.1148 1.48976C11.1114 1.37397 11.1317 1.25871 11.1744 1.15106C11.2172 1.0434 11.2815 0.945613 11.3634 0.863706C11.4453 0.781798 11.5431 0.717496 11.6507 0.674747C11.7584 0.631999 11.8736 0.611706 11.9894 0.615114C12.1052 0.618523 12.2191 0.64556 12.324 0.694568C12.429 0.743575 12.5228 0.813518 12.5998 0.900102L15.5998 3.9001C15.7585 4.05942 15.8477 4.27518 15.8477 4.5001C15.8477 4.72503 15.7585 4.94078 15.5998 5.1001ZM13.9998 11.5001H3.19978L4.59978 10.1001C4.74378 9.93807 4.82043 9.72713 4.81405 9.51045C4.80767 9.29376 4.71875 9.0877 4.56546 8.93442C4.41218 8.78113 4.20612 8.6922 3.98943 8.68583C3.77275 8.67945 3.56181 8.7561 3.39978 8.9001L0.399776 11.9001C0.241006 12.0594 0.151855 12.2752 0.151855 12.5001C0.151855 12.725 0.241006 12.9408 0.399776 13.1001L3.39978 16.1001C3.47672 16.1867 3.57056 16.2566 3.67551 16.3056C3.78047 16.3546 3.89434 16.3817 4.01012 16.3851C4.12591 16.3885 4.24117 16.3682 4.34882 16.3255C4.45648 16.2827 4.55427 16.2184 4.63617 16.1365C4.71808 16.0546 4.78238 15.9568 4.82513 15.8491C4.86788 15.7415 4.88817 15.6262 4.88476 15.5104C4.88135 15.3947 4.85432 15.2808 4.80531 15.1758C4.7563 15.0709 4.68636 14.977 4.59978 14.9001L3.19978 13.5001H13.9998C14.265 13.5001 14.5193 13.3947 14.7069 13.2072C14.8944 13.0197 14.9998 12.7653 14.9998 12.5001C14.9998 12.2349 14.8944 11.9805 14.7069 11.793C14.5193 11.6055 14.265 11.5001 13.9998 11.5001Z" fill="white" fill-opacity="0.64" />
                      </svg> <span>Transactions</span></a>
                  </li>

                  <li class="list-item <?php if ($current_file == 'member-statement') echo 'list-item-selected'; ?>"><a href="<?php echo $data['Host']; ?>/member-statement<?php echo $data['ex'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M18 16.5C18 16.7652 17.8946 17.0196 17.7071 17.2071C17.5196 17.3946 17.2652 17.5 17 17.5H1C0.734784 17.5 0.48043 17.3946 0.292893 17.2071C0.105357 17.0196 0 16.7652 0 16.5C0 16.2348 0.105357 15.9804 0.292893 15.7929C0.48043 15.6054 0.734784 15.5 1 15.5H17C17.2652 15.5 17.5196 15.6054 17.7071 15.7929C17.8946 15.9804 18 16.2348 18 16.5ZM3 13.5C3.26522 13.5 3.51957 13.3946 3.70711 13.2071C3.89464 13.0196 4 12.7652 4 12.5V5.5C4 5.23478 3.89464 4.98043 3.70711 4.79289C3.51957 4.60536 3.26522 4.5 3 4.5C2.73478 4.5 2.48043 4.60536 2.29289 4.79289C2.10536 4.98043 2 5.23478 2 5.5V12.5C2 12.7652 2.10536 13.0196 2.29289 13.2071C2.48043 13.3946 2.73478 13.5 3 13.5ZM7 13.5C7.26522 13.5 7.51957 13.3946 7.70711 13.2071C7.89464 13.0196 8 12.7652 8 12.5V1.5C8 1.23478 7.89464 0.98043 7.70711 0.792893C7.51957 0.605357 7.26522 0.5 7 0.5C6.73478 0.5 6.48043 0.605357 6.29289 0.792893C6.10536 0.98043 6 1.23478 6 1.5V12.5C6 12.7652 6.10536 13.0196 6.29289 13.2071C6.48043 13.3946 6.73478 13.5 7 13.5ZM15 13.5C15.2652 13.5 15.5196 13.3946 15.7071 13.2071C15.8946 13.0196 16 12.7652 16 12.5V4.5C16 4.23478 15.8946 3.98043 15.7071 3.79289C15.5196 3.60536 15.2652 3.5 15 3.5C14.7348 3.5 14.4804 3.60536 14.2929 3.79289C14.1054 3.98043 14 4.23478 14 4.5V12.5C14 12.7652 14.1054 13.0196 14.2929 13.2071C14.4804 13.3946 14.7348 13.5 15 13.5ZM11 13.5C11.2652 13.5 11.5196 13.3946 11.7071 13.2071C11.8946 13.0196 12 12.7652 12 12.5V9.5C12 9.23478 11.8946 8.98043 11.7071 8.79289C11.5196 8.60536 11.2652 8.5 11 8.5C10.7348 8.5 10.4804 8.60536 10.2929 8.79289C10.1054 8.98043 10 9.23478 10 9.5V12.5C10 12.7652 10.1054 13.0196 10.2929 13.2071C10.4804 13.3946 10.7348 13.5 11 13.5Z" fill="white" fill-opacity="0.64" />
                      </svg> <span>Statements</span></a>
                  </li>
                </ul>
              <? } ?>
              <ul class="metismenu list-unstyled side-menu m-2">
                <!-- <li class="list-item mtb-2">
                  <a href="https://boftrades.com/" target="_blank">
                    <svg width="24" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3.04687 14.5312H2.10937C1.92289 14.5312 1.74405 14.4572 1.61219 14.3253C1.48033 14.1934 1.40625 14.0146 1.40625 13.8281V9.60937C1.40625 9.42289 1.48033 9.24405 1.61219 9.11219C1.74405 8.98033 1.92289 8.90625 2.10937 8.90625H3.04687C3.23335 8.90625 3.4122 8.98033 3.54406 9.11219C3.67592 9.24405 3.75 9.42289 3.75 9.60937V13.8281C3.75 14.0146 3.67592 14.1934 3.54406 14.3253C3.4122 14.4572 3.23335 14.5312 3.04687 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                      <path d="M9.60937 14.5312H8.67187C8.48539 14.5312 8.30655 14.4572 8.17469 14.3253C8.04283 14.1934 7.96875 14.0146 7.96875 13.8281V6.79687C7.96875 6.61039 8.04283 6.43155 8.17469 6.29969C8.30655 6.16783 8.48539 6.09375 8.67187 6.09375H9.60937C9.79585 6.09375 9.9747 6.16783 10.1066 6.29969C10.2384 6.43155 10.3125 6.61039 10.3125 6.79687V13.8281C10.3125 14.0146 10.2384 14.1934 10.1066 14.3253C9.9747 14.4572 9.79585 14.5312 9.60937 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                      <path d="M12.8906 14.5312H11.9531C11.7666 14.5312 11.5878 14.4572 11.4559 14.3253C11.3241 14.1934 11.25 14.0146 11.25 13.8281V3.51562C11.25 3.32914 11.3241 3.1503 11.4559 3.01844C11.5878 2.88658 11.7666 2.8125 11.9531 2.8125H12.8906C13.0771 2.8125 13.2559 2.88658 13.3878 3.01844C13.5197 3.1503 13.5937 3.32914 13.5937 3.51562V13.8281C13.5937 14.0146 13.5197 14.1934 13.3878 14.3253C13.2559 14.4572 13.0771 14.5312 12.8906 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                      <path d="M6.32812 14.5312H5.39062C5.20414 14.5312 5.0253 14.4572 4.89344 14.3253C4.76158 14.1934 4.6875 14.0146 4.6875 13.8281V1.17187C4.6875 0.985395 4.76158 0.806552 4.89344 0.674691C5.0253 0.542829 5.20414 0.46875 5.39062 0.46875H6.32812C6.5146 0.46875 6.69345 0.542829 6.82531 0.674691C6.95717 0.806552 7.03125 0.985395 7.03125 1.17187V13.8281C7.03125 14.0146 6.95717 14.1934 6.82531 14.3253C6.69345 14.4572 6.5146 14.5312 6.32812 14.5312V14.5312Z" fill="white" fill-opacity="0.64" />
                    </svg>
                    <span>Trade Crypto</span>
                  </a>
                </li> -->

                <!-- <li class="list-item mtb-2">
                  <a href="https://boftrades.com/login" target="_blank">
                    <svg width="24" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.9375 11.0156C0.9375 11.4507 1.11035 11.868 1.41803 12.1757C1.7257 12.4834 2.143 12.6562 2.57812 12.6562H12.4219C12.857 12.6562 13.2743 12.4834 13.582 12.1757C13.8896 11.868 14.0625 11.4507 14.0625 11.0156V6.50391H0.9375V11.0156ZM2.87109 8.78906C2.87109 8.55596 2.96369 8.33241 3.12852 8.16758C3.29335 8.00276 3.5169 7.91016 3.75 7.91016H5.15625C5.38935 7.91016 5.6129 8.00276 5.77773 8.16758C5.94256 8.33241 6.03515 8.55596 6.03515 8.78906V9.375C6.03515 9.6081 5.94256 9.83165 5.77773 9.99648C5.6129 10.1613 5.38935 10.2539 5.15625 10.2539H3.75C3.5169 10.2539 3.29335 10.1613 3.12852 9.99648C2.96369 9.83165 2.87109 9.6081 2.87109 9.375V8.78906Z" fill="white" fill-opacity="0.64" />
                      <path d="M12.4219 2.34375H2.57812C2.143 2.34375 1.7257 2.5166 1.41803 2.82428C1.11035 3.13195 0.9375 3.54925 0.9375 3.98437V4.74609H14.0625V3.98437C14.0625 3.54925 13.8896 3.13195 13.582 2.82428C13.2743 2.5166 12.857 2.34375 12.4219 2.34375V2.34375Z" fill="white" fill-opacity="0.64" />
                    </svg>
                    <span>Crypto Wallet</span>
                  </a>
                </li> -->

                <li class="list-item <?php if ($current_file == 'manage-beneficiary') echo 'list-item-selected'; ?>">
                  <a href="<?php echo $data['Host']; ?>/manage-beneficiary<?php echo $data['ex'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M7 10.5C7.98891 10.5 8.95561 10.2068 9.77785 9.65735C10.6001 9.10794 11.241 8.32705 11.6194 7.41342C11.9978 6.49979 12.0969 5.49446 11.9039 4.52455C11.711 3.55465 11.2348 2.66373 10.5355 1.96447C9.83627 1.26521 8.94536 0.789002 7.97545 0.596076C7.00555 0.40315 6.00021 0.502166 5.08658 0.880605C4.17295 1.25904 3.39206 1.89991 2.84265 2.72215C2.29325 3.5444 2 4.5111 2 5.5C2 6.82609 2.52678 8.09785 3.46447 9.03554C4.40215 9.97322 5.67392 10.5 7 10.5ZM7 2.5C7.59334 2.5 8.17336 2.67595 8.66671 3.00559C9.16006 3.33524 9.54458 3.80377 9.77164 4.35195C9.9987 4.90013 10.0581 5.50333 9.94236 6.08527C9.8266 6.66722 9.54088 7.20177 9.12132 7.62132C8.70176 8.04088 8.16722 8.3266 7.58527 8.44236C7.00333 8.55811 6.40013 8.4987 5.85195 8.27164C5.30377 8.04458 4.83524 7.66006 4.50559 7.16671C4.17595 6.67337 4 6.09335 4 5.5C4 4.70435 4.31607 3.94129 4.87868 3.37868C5.44129 2.81607 6.20435 2.5 7 2.5ZM14 15.5V17.5C14 17.7652 13.8946 18.0196 13.7071 18.2071C13.5196 18.3946 13.2652 18.5 13 18.5C12.7348 18.5 12.4804 18.3946 12.2929 18.2071C12.1054 18.0196 12 17.7652 12 17.5V15.5C12 15.2348 11.8946 14.9804 11.7071 14.7929C11.5196 14.6054 11.2652 14.5 11 14.5H3C2.73478 14.5 2.48043 14.6054 2.29289 14.7929C2.10536 14.9804 2 15.2348 2 15.5V17.5C2 17.7652 1.89464 18.0196 1.70711 18.2071C1.51957 18.3946 1.26522 18.5 1 18.5C0.734784 18.5 0.48043 18.3946 0.292893 18.2071C0.105357 18.0196 0 17.7652 0 17.5V15.5C0 14.7044 0.316071 13.9413 0.87868 13.3787C1.44129 12.8161 2.20435 12.5 3 12.5H11C11.7957 12.5 12.5587 12.8161 13.1213 13.3787C13.6839 13.9413 14 14.7044 14 15.5Z" fill="white" fill-opacity="0.64" />
                    </svg>
                    <span>Manage Beneficiary</span>
                  </a>
                </li>

                <li class="list-item <?php if ($current_file == 'reference-latter') echo 'list-item-selected'; ?> mt b-2">
                  <a href="<?php echo $data['Host']; ?>/reference-latter<?php echo $data['ex'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 16 20" fill="none">
                      <path d="M13 5.5H12V4.5C12 3.43913 11.5786 2.42172 10.8284 1.67157C10.0783 0.921427 9.06087 0.5 8 0.5C6.93913 0.5 5.92172 0.921427 5.17157 1.67157C4.42143 2.42172 4 3.43913 4 4.5V5.5H3C2.20435 5.5 1.44129 5.81607 0.87868 6.37868C0.316071 6.94129 0 7.70435 0 8.5V16.5C0 17.2956 0.316071 18.0587 0.87868 18.6213C1.44129 19.1839 2.20435 19.5 3 19.5H13C13.7956 19.5 14.5587 19.1839 15.1213 18.6213C15.6839 18.0587 16 17.2956 16 16.5V8.5C16 7.70435 15.6839 6.94129 15.1213 6.37868C14.5587 5.81607 13.7956 5.5 13 5.5ZM6 4.5C6 3.96957 6.21071 3.46086 6.58579 3.08579C6.96086 2.71071 7.46957 2.5 8 2.5C8.53043 2.5 9.03914 2.71071 9.41421 3.08579C9.78929 3.46086 10 3.96957 10 4.5V5.5H6V4.5ZM14 16.5C14 16.7652 13.8946 17.0196 13.7071 17.2071C13.5196 17.3946 13.2652 17.5 13 17.5H3C2.73478 17.5 2.48043 17.3946 2.29289 17.2071C2.10536 17.0196 2 16.7652 2 16.5V8.5C2 8.23478 2.10536 7.98043 2.29289 7.79289C2.48043 7.60536 2.73478 7.5 3 7.5H13C13.2652 7.5 13.5196 7.60536 13.7071 7.79289C13.8946 7.98043 14 8.23478 14 8.5V16.5ZM9.5 11.98C9.49927 12.2334 9.43476 12.4826 9.31243 12.7045C9.1901 12.9265 9.01388 13.1141 8.8 13.25V13.98C8.8 14.1922 8.71571 14.3957 8.56569 14.5457C8.41566 14.6957 8.21217 14.78 8 14.78C7.78783 14.78 7.58434 14.6957 7.43431 14.5457C7.28429 14.3957 7.2 14.1922 7.2 13.98V13.25C6.98612 13.1141 6.8099 12.9265 6.68757 12.7045C6.56524 12.4826 6.50073 12.2334 6.5 11.98C6.5 11.5822 6.65804 11.2006 6.93934 10.9193C7.22064 10.638 7.60218 10.48 8 10.48C8.39782 10.48 8.77936 10.638 9.06066 10.9193C9.34196 11.2006 9.5 11.5822 9.5 11.98Z" fill="white" fill-opacity="0.64" />
                    </svg>
                    <span>Reference Letter</span>
                  </a>
                </li>

              </ul>

              <ul class="metismenu list-unstyled side-menu m-2">
                <li class="list-item <?php if ($current_file == 'add-money') echo 'list-item-selected'; ?>">
                  <a href="assets/files/20240612_BOFAssetsLimited-Parent_Positions.csv" download="20240612_BOFAssetsLimited-Parent_Positions.csv" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M13.2605 7.92902L14.9982 9.66667H8.85714V10.4762H14.9982L13.2605 12.2138L13.8329 12.7862L16.5476 10.0714L13.8329 7.35669L13.2605 7.92902ZM11.7403 12.7862L11.1679 12.2138L8.45238 14.9286L11.1679 17.6433L11.7403 17.071L10.0022 15.3333H16.1429V14.5238H10.0022L11.7403 12.7862ZM12.5 4C7.81286 4 4 7.81326 4 12.5C4 17.1867 7.81286 21 12.5 21C17.1871 21 21 17.1867 21 12.5C21 7.81326 17.1871 4 12.5 4ZM12.5 20.1905C8.25931 20.1905 4.80952 16.7407 4.80952 12.5C4.80952 8.25931 8.25931 4.80952 12.5 4.80952C16.7407 4.80952 20.1905 8.25931 20.1905 12.5C20.1905 16.7407 16.7407 20.1905 12.5 20.1905Z" fill="#C8C8C8" />
                    </svg>
                    <span>Settlement</span>
                  </a>
                </li>
                <li class="list-item <?php if ($current_file == 'transfer') echo 'list-item-selected'; ?>">
                  <a href="assets/files/20240612_BOFAssetsLimited-Parent_TradeActivity.csv" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M13.2605 7.92902L14.9982 9.66667H8.85714V10.4762H14.9982L13.2605 12.2138L13.8329 12.7862L16.5476 10.0714L13.8329 7.35669L13.2605 7.92902ZM11.7403 12.7862L11.1679 12.2138L8.45238 14.9286L11.1679 17.6433L11.7403 17.071L10.0022 15.3333H16.1429V14.5238H10.0022L11.7403 12.7862ZM12.5 4C7.81286 4 4 7.81326 4 12.5C4 17.1867 7.81286 21 12.5 21C17.1871 21 21 17.1867 21 12.5C21 7.81326 17.1871 4 12.5 4ZM12.5 20.1905C8.25931 20.1905 4.80952 16.7407 4.80952 12.5C4.80952 8.25931 8.25931 4.80952 12.5 4.80952C16.7407 4.80952 20.1905 8.25931 20.1905 12.5C20.1905 16.7407 16.7407 20.1905 12.5 20.1905Z" fill="#C8C8C8" />
                    </svg>
                    <span>Trade Activity</span>
                  </a>
                </li>
                <li class="list-item <?php if ($current_file == 'transfer') echo 'list-item-selected'; ?>">
                  <a href="assets/files/20240612_BOFAssetsLimited-Parent_CashBalances.pdf" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M13.2605 7.92902L14.9982 9.66667H8.85714V10.4762H14.9982L13.2605 12.2138L13.8329 12.7862L16.5476 10.0714L13.8329 7.35669L13.2605 7.92902ZM11.7403 12.7862L11.1679 12.2138L8.45238 14.9286L11.1679 17.6433L11.7403 17.071L10.0022 15.3333H16.1429V14.5238H10.0022L11.7403 12.7862ZM12.5 4C7.81286 4 4 7.81326 4 12.5C4 17.1867 7.81286 21 12.5 21C17.1871 21 21 17.1867 21 12.5C21 7.81326 17.1871 4 12.5 4ZM12.5 20.1905C8.25931 20.1905 4.80952 16.7407 4.80952 12.5C4.80952 8.25931 8.25931 4.80952 12.5 4.80952C16.7407 4.80952 20.1905 8.25931 20.1905 12.5C20.1905 16.7407 16.7407 20.1905 12.5 20.1905Z" fill="#C8C8C8" />
                    </svg> <span>Balances cash</span>
                  </a>
                </li>
                <li class="list-item <?php if ($current_file == 'transfer') echo 'list-item-selected'; ?>">
                  <a href="assets/files/BOF_Assets_Limited_SSI.csv" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M13.2605 7.92902L14.9982 9.66667H8.85714V10.4762H14.9982L13.2605 12.2138L13.8329 12.7862L16.5476 10.0714L13.8329 7.35669L13.2605 7.92902ZM11.7403 12.7862L11.1679 12.2138L8.45238 14.9286L11.1679 17.6433L11.7403 17.071L10.0022 15.3333H16.1429V14.5238H10.0022L11.7403 12.7862ZM12.5 4C7.81286 4 4 7.81326 4 12.5C4 17.1867 7.81286 21 12.5 21C17.1871 21 21 17.1867 21 12.5C21 7.81326 17.1871 4 12.5 4ZM12.5 20.1905C8.25931 20.1905 4.80952 16.7407 4.80952 12.5C4.80952 8.25931 8.25931 4.80952 12.5 4.80952C16.7407 4.80952 20.1905 8.25931 20.1905 12.5C20.1905 16.7407 16.7407 20.1905 12.5 20.1905Z" fill="#C8C8C8" />
                    </svg> <span>Limitted SSI</span>
                  </a>
                </li>
              </ul>

              <div>

              </div>

            </div>
          </div>
          <!-- Sidebar -->

        </div>

      </div>

      <script src="//code.tidio.co/u6uy2x9nd40ksjzmogxd05gozoy3zkor.js" async></script>

      <script src="<?php echo $data['Host']; ?>/assets/libs/metismenu/metisMenu.min.js"></script>

      <script src="<?php echo $data['Host']; ?>/assets/js/app.js"></script>

      <script>
        $(document).ready(function() {
          // Hide content when the "Hide Content" button is clicked
          $('ul.side_menu_drop li.list-item55').click(function() {
            // console.log('bhafrs');
            $('ul.side_menu_drop li.list-item1 ').slideToggle(200);
          });

          $('ul.list-unstyled-home-payment li').click(function(e) {

            // #page-topbar
            // e.preventDefault();
            if ($(this).hasClass('active-menu')) {
              $(this).removeClass('active-menu');
              // console.log("Removed active-menu")
            } else {
              $('ul.list-unstyled-home-payment li').removeClass('active-menu');
              $(this).addClass('active-menu');
              // console.log("Added active-menu")
            }
          })
        });

        $(document).ready(function() {
          // Hide content when the "Hide Content" button is clicked
          $('ul.side_menu_drop li.list-item555').click(function() {
            // console.log('bhafrs');
            $('ul.side_menu_drop li.list-item2 ').slideToggle(200);
          });

          $('ul.list-unstyled-home-payment li').click(function(e) {

            // #page-topbar
            // e.preventDefault();
            if ($(this).hasClass('active-menu')) {
              $(this).removeClass('active-menu');
              // console.log("Removed active-menu")
            } else {
              $('ul.list-unstyled-home-payment li').removeClass('active-menu');
              $(this).addClass('active-menu');
              // console.log("Added active-menu")
            }
          })
        });

        // <?php echo $data['Host']; ?>/index<?php echo $data['ex'] ?>
        // <?php echo $data['Host']; ?>/add-money<?php echo $data['ex'] ?>

        $(document).ready(function() {
          $("#vertical-menu-btn-close").click(function() {
            $("body").removeClass('sidebar-enable');
          });
        });
      </script>


      <script>
        $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye-slash fa-eye");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "text") {
            input.attr("type", "password");
          } else {
            input.attr("type", "text");
          }
        });
      </script>

      <script>
        $(document).ready(function() {
          $(window).scroll(function() {
            if ($(this).scrollTop() > 100) { // Change 100 to the height you want to trigger the effect
              $('.user-side').addClass('is-sticky');
            } else {
              $('.user-side').removeClass('is-sticky');
            }
          });
        });
      </script>
    <?php } ?>