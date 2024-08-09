<!doctype html>

<head>

  <meta charset="utf-8" />

  <title><?= $data['PageName']; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta content="ebank <?= $data['PageName']; ?>" name="description" />

  <meta content="ebank <?= $data['PageName']; ?>" name="author" />

  <!-- App favicon -->

  <link rel="shortcut icon" href="<?= $_SESSION['host_favicon']; ?>">



  <!-- Bootstrap Css -->

  <script src="<?= $data['Host']; ?>/common/js/jquery-3.6.4.min.js"></script>

  <link href="<?= $data['Host']; ?>/common/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?= $data['Host']; ?>/common/fontawesome/css/all.min.css" rel="stylesheet">

  <script src="<?= $data['Host']; ?>/common/js/bootstrap.bundle.min.js"></script>

  <link href="<?= $data['Host']; ?>/common/css/template.css" rel="stylesheet">

  <script src="<?= $data['Host']; ?>/common/js/template.js"></script>

  <link href="<?= $data['Host']; ?>/common/css/template-admin.css" rel="stylesheet">

  <!-- slick css -->

  <!--<link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />

<link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />-->

  <!-- jvectormap -->

  <link href="<?= $data['Host']; ?>/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

  <!-- Icons Css -->

  <link href="<?= $data['Host']; ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

  <!-- App Css-->

  <link href="<?= $data['Host']; ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />



  <!-- auto logout script -->

  <!--<script src="assets/js_autolog/script.js"></script>-->



  <!-- /* transaction  */ -->



</head>

<?

//echo $data['PageFile'];



//print_r($_SESSION);

$header_title_search = array("sign-in", "reset-password-request", "reset-password");

if (in_array($data['PageFile'], $header_title_search)) {
?>
  <style>
    body,
    html {
      height: 100%;
    }

    .bg {
      /* The image used */
      background-image: url(<?= $data['Host']; ?>/images/signup-bg.png);
      /* Full height */
      height: 100%;
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>

  <body data-topbar="dark" data-layout="horizontal" class="h-100 bg">

  <? } else { ?>


    <style>
      /* #page-topbar, .page-topbar, .navbar-header{ background-color:<?= $_SESSION['host_header_bg_color']; ?> !important; } */
      /* .sidebar-color { background-color:<?= $_SESSION['host_sidebar_bg_color']; ?> !important; color:<?= $_SESSION['host_sidebar_text_color']; ?> !important; } */
      /* #sidebar-menu ul li a { color:unset !important; } */

      #sidebar-menu ul li.active,
      #sidebar-menu ul li:hover {
        border-radius: 5px;
        background: var(--gg, linear-gradient(156deg, rgba(255, 255, 255, 0.20) -4.88%, rgba(255, 255, 255, 0.00) 147.21%));
      }

      #sidebar-menu ul li.active .text-warning {
        color: #2f49d1 !important;
      }

      .menu-active {
        background-color: #ccc !important;
        color: #000000 !important;
      }

      .text-logo {
        color: unset !important;
      }

      .dropdown-toggle::after {
        display: none !important
      }

      button#vertical-menu-btn-close {
        position: absolute;
        right: 8px;
        top: -15px;
        padding: 0;
      }

      @media screen and (min-width: 993px) {

        #vertical-menu-btn,
        #vertical-menu-btn-close {
          display: none;
        }
      }
    </style>



    <body data-topbar="dark" data-layout="horizontal" class="h-100">

    <? } ?>

    <!-- Begin page -->

    <div id="layout-wrapper">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- auto logout script -->

      <script src="<?= $data['Host']; ?>/assets/libs/simplebar/simplebar.min.js"></script>



      <? if (isset($data['noheader']) && $data['noheader'] == 0) { ?>





        <header id="page-topbar" class="admin-side">

          <div class="navbar-header">

            <div class="d-flex">

              <!-- LOGO -->



              <button type="button" class="btn btn-sm px-2 font-size-24 header-item waves-effect" id="vertical-menu-btn"> <i class="<?= $data['fwicon']['toggle-sidebar']; ?> "></i> </button>

              <!-- <div class="navbar-brand-box"> <span class="logo-lg"><img src="<?= $_SESSION['host_logo']; ?>" alt="Logo" class="img-fluid mt-1"  style="max-height:100px;"> </span>  </div> -->
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
            <!-- <div class="d-flex text-center"></div> -->

            <div class="d-flex">



              <div class="dropdown-center mx-2 mb-1">

                <button class="dropdown-toggle btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                  <?php echo ucwords($_SESSION["s_admin_username"]); ?>

                </button>



              </div>

              <div class="dropdown-profile">
                <button class="btn text-start " data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32" fill="none">
                    <path d="M8.87455 0.202881H5.40598C4.0261 0.202881 2.70273 0.751038 1.72701 1.72676C0.751282 2.70249 0.203125 4.02585 0.203125 5.40574V8.87431C0.203125 10.2542 0.751282 11.5776 1.72701 12.5533C2.70273 13.529 4.0261 14.0772 5.40598 14.0772H8.87455C10.2544 14.0772 11.5778 13.529 12.5535 12.5533C13.5293 11.5776 14.0774 10.2542 14.0774 8.87431V5.40574C14.0774 4.02585 13.5293 2.70249 12.5535 1.72676C11.5778 0.751038 10.2544 0.202881 8.87455 0.202881ZM10.6088 8.87431C10.6088 9.33427 10.4261 9.77539 10.1009 10.1006C9.77564 10.4259 9.33451 10.6086 8.87455 10.6086H5.40598C4.94602 10.6086 4.5049 10.4259 4.17966 10.1006C3.85442 9.77539 3.6717 9.33427 3.6717 8.87431V5.40574C3.6717 4.94578 3.85442 4.50465 4.17966 4.17941C4.5049 3.85417 4.94602 3.67145 5.40598 3.67145H8.87455C9.33451 3.67145 9.77564 3.85417 10.1009 4.17941C10.4261 4.50465 10.6088 4.94578 10.6088 5.40574V8.87431ZM8.87455 17.5457H5.40598C4.0261 17.5457 2.70273 18.0939 1.72701 19.0696C0.751282 20.0453 0.203125 21.3687 0.203125 22.7486V26.2172C0.203125 27.597 0.751282 28.9204 1.72701 29.8961C2.70273 30.8719 4.0261 31.42 5.40598 31.42H8.87455C10.2544 31.42 11.5778 30.8719 12.5535 29.8961C13.5293 28.9204 14.0774 27.597 14.0774 26.2172V22.7486C14.0774 21.3687 13.5293 20.0453 12.5535 19.0696C11.5778 18.0939 10.2544 17.5457 8.87455 17.5457ZM10.6088 26.2172C10.6088 26.6771 10.4261 27.1183 10.1009 27.4435C9.77564 27.7687 9.33451 27.9515 8.87455 27.9515H5.40598C4.94602 27.9515 4.5049 27.7687 4.17966 27.4435C3.85442 27.1183 3.6717 26.6771 3.6717 26.2172V22.7486C3.6717 22.2886 3.85442 21.8475 4.17966 21.5223C4.5049 21.197 4.94602 21.0143 5.40598 21.0143H8.87455C9.33451 21.0143 9.77564 21.197 10.1009 21.5223C10.4261 21.8475 10.6088 22.2886 10.6088 22.7486V26.2172ZM26.2174 17.5457H22.7488C21.369 17.5457 20.0456 18.0939 19.0699 19.0696C18.0941 20.0453 17.546 21.3687 17.546 22.7486V26.2172C17.546 27.597 18.0941 28.9204 19.0699 29.8961C20.0456 30.8719 21.369 31.42 22.7488 31.42H26.2174C27.5973 31.42 28.9207 30.8719 29.8964 29.8961C30.8721 28.9204 31.4203 27.597 31.4203 26.2172V22.7486C31.4203 21.3687 30.8721 20.0453 29.8964 19.0696C28.9207 18.0939 27.5973 17.5457 26.2174 17.5457ZM27.9517 26.2172C27.9517 26.6771 27.769 27.1183 27.4437 27.4435C27.1185 27.7687 26.6774 27.9515 26.2174 27.9515H22.7488C22.2889 27.9515 21.8478 27.7687 21.5225 27.4435C21.1973 27.1183 21.0146 26.6771 21.0146 26.2172V22.7486C21.0146 22.2886 21.1973 21.8475 21.5225 21.5223C21.8478 21.197 22.2889 21.0143 22.7488 21.0143H26.2174C26.6774 21.0143 27.1185 21.197 27.4437 21.5223C27.769 21.8475 27.9517 22.2886 27.9517 22.7486V26.2172ZM17.546 3.67145C17.546 3.21149 17.7287 2.77037 18.0539 2.44513C18.3792 2.11989 18.8203 1.93717 19.2803 1.93717H29.686C30.1459 1.93717 30.5871 2.11989 30.9123 2.44513C31.2376 2.77037 31.4203 3.21149 31.4203 3.67145C31.4203 4.13141 31.2376 4.57254 30.9123 4.89778C30.5871 5.22302 30.1459 5.40574 29.686 5.40574H19.2803C18.8203 5.40574 18.3792 5.22302 18.0539 4.89778C17.7287 4.57254 17.546 4.13141 17.546 3.67145ZM31.4203 10.6086C31.4203 11.0686 31.2376 11.5097 30.9123 11.8349C30.5871 12.1602 30.1459 12.3429 29.686 12.3429H19.2803C18.8203 12.3429 18.3792 12.1602 18.0539 11.8349C17.7287 11.5097 17.546 11.0686 17.546 10.6086C17.546 10.1486 17.7287 9.70751 18.0539 9.38227C18.3792 9.05703 18.8203 8.87431 19.2803 8.87431H29.686C30.1459 8.87431 30.5871 9.05703 30.9123 9.38227C31.2376 9.70751 31.4203 10.1486 31.4203 10.6086Z" fill="white" />
                  </svg>
                </button>


                <ul class="dropdown-menu bg-success-subtle px-2" style="max-width:300px !important;">

                  <li class="text-start text-white mx-0 botder bg-danger rounded p-2"><?php echo ucwords($_SESSION["ses_full_name"]); ?> [<?php echo ucwords($_SESSION["admin-info"]["admin_type"]); ?>]</li>

                  <li class="<?php if ($data['PageFile'] == 'profile') {
                                echo 'active';
                              } ?>"><a class="dropdown-item" href="<?= $data['Admins']; ?>/profile<?= $data['ex'] ?>" title="My Profile"><i class="<?= $data['fwicon']['profile']; ?> fa-fw"></i> My Profile</a></li>



                  <li class="<?php if ($data['PageFile'] == 'change-password') {
                                echo 'active';
                              } ?>"><a class="dropdown-item" href="<?= $data['Admins']; ?>/change-password<?= $data['ex'] ?>" title="Reset Password"><i class="<?= $data['fwicon']['security']; ?> fa-fw"></i> Reset Password</a></li>

                  <li class="<?php if ($data['PageFile'] == 'login_history') {
                                echo 'active';
                              } ?>"><a class="dropdown-item" href="<?= $data['Admins']; ?>/login_history<?= $data['ex'] ?>" title="Login History"><i class="<?= $data['fwicon']['history']; ?> fa-fw"></i> Login History</a></li>

                  <li><a class="dropdown-item" href="<?= $data['Admins']; ?>/sign-in<?= $data['ex'] ?>?Act=Out" title="Logout"><i class="<?= $data['fwicon']['signout']; ?> fa-fw"></i> Sign Out</a></li>

                </ul>

              </div>

            </div>

          </div>

        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="sidepbar-vflex">
          <div class="blue-siebar">
            <div class="text-center light-logo"> <img src="images/light-logo.png" alt="Logo" class="img-fluid5 my-2" style="height:40px;"> </div>

            <div class="end-icon-side">
              <ul class="list-unstyled">
                <li><a href="<?= $data['Admins']; ?>/profile<?= $data['ex'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" viewBox="0 0 25 27" fill="none">
                      <path d="M12.1601 9.99997C11.4678 9.99997 10.7912 10.2052 10.2156 10.5898C9.64002 10.9744 9.19141 11.521 8.92651 12.1606C8.6616 12.8001 8.59229 13.5038 8.72734 14.1828C8.86238 14.8617 9.19573 15.4854 9.68521 15.9748C10.1747 16.4643 10.7983 16.7977 11.4773 16.9327C12.1562 17.0678 12.8599 16.9985 13.4995 16.7335C14.139 16.4686 14.6856 16.02 15.0702 15.4445C15.4548 14.8689 15.6601 14.1922 15.6601 13.5C15.6601 12.5717 15.2913 11.6815 14.635 11.0251C13.9786 10.3687 13.0883 9.99997 12.1601 9.99997ZM12.1601 14.6666C11.9293 14.6666 11.7038 14.5982 11.5119 14.47C11.3201 14.3418 11.1705 14.1596 11.0822 13.9464C10.9939 13.7333 10.9708 13.4987 11.0158 13.2724C11.0609 13.046 11.172 12.8382 11.3351 12.675C11.4983 12.5118 11.7062 12.4007 11.9325 12.3557C12.1588 12.3107 12.3934 12.3338 12.6065 12.4221C12.8197 12.5104 13.0019 12.6599 13.1301 12.8518C13.2583 13.0437 13.3268 13.2692 13.3268 13.5C13.3268 13.8094 13.2038 14.1061 12.985 14.3249C12.7662 14.5437 12.4695 14.6666 12.1601 14.6666ZM22.4384 14.445C22.2482 14.2293 22.1443 13.9509 22.1468 13.6633V13.3366C22.1443 13.049 22.2482 12.7707 22.4384 12.555L23.1851 11.715C23.7574 11.0726 24.073 10.242 24.0718 9.38163C24.0661 8.7683 23.9056 8.16633 23.6051 7.63163L22.9518 6.46497C22.6444 5.93257 22.2022 5.49052 21.6697 5.18332C21.1372 4.87611 20.5332 4.71457 19.9184 4.71496C19.6833 4.71512 19.4489 4.73857 19.2184 4.78497L18.1218 5.00663H17.8768C17.6767 5.00353 17.4804 4.95145 17.3051 4.85497L17.0134 4.67997C16.7877 4.56982 16.6036 4.38979 16.4884 4.16663L16.1268 3.10496C15.8847 2.4204 15.4358 1.82805 14.8421 1.40999C14.2485 0.991919 13.5395 0.768832 12.8134 0.771631H11.5068C10.7863 0.765388 10.0814 0.981656 9.48841 1.39091C8.89541 1.80016 8.44317 2.38246 8.19342 3.0583L7.83175 4.16663C7.74121 4.43758 7.55441 4.6659 7.30675 4.8083L7.02675 4.9833C6.84663 5.07822 6.64696 5.13013 6.44342 5.13497H6.21008L5.16008 4.8433C4.92964 4.7969 4.69516 4.77345 4.46008 4.7733C3.83777 4.76019 3.22321 4.91328 2.67977 5.21679C2.13633 5.52029 1.68366 5.96324 1.36842 6.49997L0.715084 7.66663C0.348911 8.30352 0.19243 9.03949 0.267811 9.77026C0.343192 10.501 0.646611 11.1896 1.13508 11.7383L1.88175 12.5783C2.072 12.794 2.17587 13.0724 2.17342 13.36V13.6866C2.17587 13.9742 2.072 14.2526 1.88175 14.4683L1.13508 15.3083C0.5628 15.9507 0.247155 16.7813 0.248417 17.6416C0.254046 18.255 0.41457 18.8569 0.715084 19.3916L1.36842 20.5583C1.6758 21.0907 2.11798 21.5327 2.65048 21.84C3.18297 22.1472 3.78699 22.3087 4.40175 22.3083C4.63682 22.3081 4.8713 22.2847 5.10175 22.2383L6.19842 22.0166H6.43175C6.63183 22.0197 6.82811 22.0718 7.00342 22.1683L7.29508 22.3433C7.54274 22.4857 7.72955 22.714 7.82008 22.985L8.19342 24C8.43544 24.6845 8.88438 25.2769 9.47803 25.6949C10.0717 26.113 10.7807 26.3361 11.5068 26.3333H12.8134C13.5395 26.3361 14.2485 26.113 14.8421 25.6949C15.4358 25.2769 15.8847 24.6845 16.1268 24L16.4884 22.9383C16.579 22.6673 16.7658 22.439 17.0134 22.2966L17.2934 22.1216C17.4735 22.0267 17.6732 21.9748 17.8768 21.97H18.1101L19.2184 22.1916C19.4489 22.238 19.6833 22.2615 19.9184 22.2616C20.5332 22.262 21.1372 22.1005 21.6697 21.7933C22.2022 21.4861 22.6444 21.044 22.9518 20.5116L23.6051 19.345C23.9056 18.8103 24.0661 18.2083 24.0718 17.595C24.073 16.7346 23.7574 15.904 23.1851 15.2616L22.4384 14.445ZM20.7001 15.985L21.4468 16.825C21.637 17.0407 21.7409 17.319 21.7384 17.6066C21.7363 17.8121 21.6799 18.0133 21.5751 18.19L20.9218 19.3566C20.82 19.533 20.6738 19.6796 20.4978 19.7819C20.3218 19.8842 20.122 19.9387 19.9184 19.94H19.6851L18.5884 19.7183C17.747 19.5438 16.8708 19.685 16.1268 20.115L15.8468 20.2783C15.1038 20.7055 14.5434 21.3904 14.2718 22.2033L13.9218 23.2766C13.8435 23.5084 13.6944 23.7096 13.4955 23.852C13.2966 23.9943 13.058 24.0706 12.8134 24.07H11.5068C11.2622 24.0706 11.0236 23.9943 10.8247 23.852C10.6258 23.7096 10.4767 23.5084 10.3984 23.2766L10.0484 22.2033C9.77681 21.3904 9.2164 20.7055 8.47342 20.2783L8.18175 20.115C7.6529 19.8105 7.05364 19.6497 6.44342 19.6483C6.20448 19.6484 5.96613 19.6719 5.73175 19.7183V19.7183L4.63508 19.94H4.40175C4.19617 19.9408 3.99403 19.8873 3.81579 19.7848C3.63755 19.6824 3.48954 19.5347 3.38675 19.3566L2.74508 18.19C2.64023 18.0133 2.58388 17.8121 2.58175 17.6066C2.56625 17.325 2.65329 17.0473 2.82675 16.825L3.57342 15.985C4.1457 15.3426 4.46135 14.512 4.46008 13.6516V13.325C4.46135 12.4646 4.1457 11.634 3.57342 10.9916L2.82675 10.175C2.6365 9.95927 2.53263 9.6809 2.53508 9.3933C2.55524 9.19156 2.62761 8.99855 2.74508 8.8333L3.39842 7.66663C3.50021 7.4903 3.64639 7.34369 3.8224 7.24135C3.99842 7.13902 4.19815 7.08453 4.40175 7.0833H4.63508L5.73175 7.30497C5.96606 7.3519 6.20446 7.37535 6.44342 7.37497C7.05364 7.37361 7.6529 7.21273 8.18175 6.9083L8.47342 6.74497C9.20767 6.32918 9.767 5.66213 10.0484 4.86663L10.3984 3.7933C10.4767 3.56157 10.6258 3.36031 10.8247 3.21795C11.0236 3.07559 11.2622 2.99933 11.5068 2.99996H12.8134C13.058 2.99933 13.2966 3.07559 13.4955 3.21795C13.6944 3.36031 13.8435 3.56157 13.9218 3.7933L14.2718 4.86663C14.5434 5.67949 15.1038 6.36444 15.8468 6.79163L16.1384 6.95497C16.6673 7.2594 17.2665 7.42027 17.8768 7.42163C18.1157 7.42202 18.3541 7.39857 18.5884 7.35163L19.6851 7.12997H19.9184C20.124 7.12915 20.3261 7.18267 20.5044 7.28511C20.6826 7.38754 20.8306 7.53526 20.9334 7.7133L21.5751 8.87997C21.6799 9.05664 21.7363 9.25787 21.7384 9.4633C21.7409 9.7509 21.637 10.0293 21.4468 10.245L20.7001 11.085C20.1278 11.7273 19.8122 12.558 19.8134 13.4183V13.745C19.8122 14.6053 20.1278 15.4359 20.7001 16.0783" fill="white" fill-opacity="0.64" />
                    </svg></a></li>

                <li><a href="<?= $data['Admins']; ?>/login_history<?= $data['ex'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M10.9928 7.83337C10.9928 7.52396 11.1157 7.22721 11.3345 7.00842C11.5533 6.78962 11.85 6.66671 12.1595 6.66671C12.3622 6.67114 12.5603 6.72835 12.7342 6.83269C12.9081 6.93703 13.0518 7.0849 13.1511 7.26171C13.263 7.43157 13.3238 7.62999 13.3261 7.83337C13.3261 8.14279 13.2032 8.43954 12.9844 8.65833C12.7656 8.87712 12.4689 9.00004 12.1595 9.00004C11.85 9.00004 11.5533 8.87712 11.3345 8.65833C11.1157 8.43954 10.9928 8.14279 10.9928 7.83337ZM23.8261 12.5C23.8261 14.8075 23.1419 17.0631 21.8599 18.9817C20.578 20.9003 18.7559 22.3956 16.6241 23.2786C14.4923 24.1617 12.1465 24.3927 9.88341 23.9425C7.6203 23.4924 5.5415 22.3812 3.90988 20.7496C2.27827 19.118 1.16713 17.0392 0.716967 14.7761C0.266806 12.513 0.497845 10.1672 1.38087 8.0354C2.26389 5.9036 3.75924 4.08151 5.67781 2.79956C7.59638 1.51761 9.85201 0.833374 12.1595 0.833374C13.6916 0.833374 15.2086 1.13514 16.6241 1.72145C18.0396 2.30775 19.3257 3.16711 20.409 4.25046C21.4924 5.33381 22.3518 6.61994 22.9381 8.0354C23.5244 9.45087 23.8261 10.968 23.8261 12.5ZM21.4928 12.5C21.4928 10.6541 20.9454 8.84958 19.9198 7.31472C18.8943 5.77986 17.4366 4.58358 15.7312 3.87717C14.0257 3.17075 12.1491 2.98592 10.3386 3.34605C8.52813 3.70617 6.86509 4.59509 5.5598 5.90038C4.25451 7.20567 3.3656 8.86871 3.00547 10.6792C2.64534 12.4897 2.83017 14.3663 3.53659 16.0718C4.24301 17.7772 5.43928 19.2349 6.97414 20.2604C8.509 21.286 10.3135 21.8334 12.1595 21.8334C14.6348 21.8334 17.0088 20.85 18.7591 19.0997C20.5095 17.3494 21.4928 14.9754 21.4928 12.5ZM13.3261 14.8334V11.3334C13.3261 11.024 13.2032 10.7272 12.9844 10.5084C12.7656 10.2896 12.4689 10.1667 12.1595 10.1667H10.9928C10.6834 10.1667 10.3866 10.2896 10.1678 10.5084C9.94905 10.7272 9.82613 11.024 9.82613 11.3334C9.82613 11.6428 9.94905 11.9395 10.1678 12.1583C10.3866 12.3771 10.6834 12.5 10.9928 12.5V16C10.9928 16.3095 11.1157 16.6062 11.3345 16.825C11.5533 17.0438 11.85 17.1667 12.1595 17.1667H13.3261C13.6355 17.1667 13.9323 17.0438 14.1511 16.825C14.3699 16.6062 14.4928 16.3095 14.4928 16C14.4928 15.6906 14.3699 15.3939 14.1511 15.1751C13.9323 14.9563 13.6355 14.8334 13.3261 14.8334Z" fill="white" fill-opacity="0.64" />
                    </svg></a></li>
              </ul>
            </div>
          </div>

          <div class="vertical-menu">

            <div data-simplebar class="h-100 sidebar-color">

              <!--- Sidemenu -->

              <div id="sidebar-menu">

                <!-- Left Menu Start -->

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn-close"> <i class="fa-solid fa-arrow-left"></i> </button>
                <ul class="metismenu list-unstyled" id="side-menu">

                  <!--<li class="menu-title">Menu</li>-->

                  <li class="<?php if ($data['PageFile'] == 'index') {
                                echo 'active';
                              } ?>"> <a href="<?= $data['Admins']; ?>/index<?= $data['ex'] ?>" class="waves-effect" title="Dashboard"><i class="<?= $data['fwicon']['home']; ?> fa-fw text-warning"></i> <span>Dashboard</span> </a> </li>

                  <li class="<?php if ($data['PageFile'] == 'transaction') {
                                echo 'active';
                              } ?>"> <a href="<?= $data['Admins']; ?>/transaction<?= $data['ex'] ?>" class=" waves-effect" title="All Transactions"><i class="<?= $data['fwicon']['transaction']; ?> fa-fw text-warning"></i> <span>All Transactions</span> </a> </li>


                  <li class="<?php if ($data['PageFile'] == 'success-transaction') {
                                echo 'active';
                              } ?>"> <a href="<?= $data['Admins']; ?>/success-transaction<?= $data['ex'] ?>" class="waves-effect" title="Success Transactions"><i class="<?= $data['fwicon']['transaction']; ?> fa-fw text-warning"></i> <span>Success Transactions</span> </a></li>

                  <li class="<?php if ($data['PageFile'] == 'view_requests') {
                                echo 'active';
                              } ?>"> <a href="<?= $data['Admins']; ?>/view_requests<?= $data['ex'] ?>" class="waves-effect" title="Pending Requests"><i class="<?= $data['fwicon']['transaction']; ?> fa-fw text-warning"></i> <span>Pending Requests</span> </a> </li>

                  <li class="<?php if ($data['PageFile'] == 'manage-member') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/manage-member<?= $data['ex'] ?>" class="waves-effect" title="Manage Member"><i class="<?= $data['fwicon']['profile']; ?> fa-fw text-warning"></i> <span>Manage Member</span></a></li>

                  <li class="<?php if ($data['PageFile'] == 'approve') {
                                echo 'active';
                              } ?>"> <a href="<?= $data['Admins']; ?>/approve<?= $data['ex'] ?>" class="waves-effect" title="Pending Member"><i class="<?= $data['fwicon']['profile']; ?> fa-fw text-warning"></i> <span>Pending Member</span></a></li>

                  <li class="<?php if ($data['PageFile'] == 'iban-user-accoun-details') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/iban-user-accoun-details<?= $data['ex'] ?>" class="waves-effect" title="IBAN User Account Details"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>IBAN User A/c Details</span> </a> </li>

                  <li class="<?php if ($data['PageFile'] == 'iban-requested-by-client') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/iban-requested-by-client<?= $data['ex'] ?>" class="waves-effect" title="IBAN Requested By Client"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span> Client Requested IBAN</span> </a> </li>

                  <li class="<?php if ($data['PageFile'] == 'kyc-list') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/kyc-list<?= $data['ex'] ?>" class="waves-effect" title="kyc list"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>KYC Applicant List</span> </a> </li>


                  <?php /*?><li class="<?php if($data['PageFile']=='manage-crypto-exchange-rate'){ echo 'active';} ?>"> <a href="<?=$data['Admins'];?>/manage-crypto-exchange-rate<?=$data['ex']?>" class="waves-effect" title="Crypto Exchange Rate"><i class="<?=$data['fwicon']['bitcoin'];?> fa-fw"></i> <span>Crypto Exchange Rate</span> </a> </li><?php */ ?>


                  <?php /*?><li class="<?php if($data['PageFile']=='generate-fees'){ echo 'active';} ?>"> <a href="<?=$data['Admins'];?>/generate-fees<?=$data['ex']?>" class="waves-effect" title="Generate Fee"><i class="<?=$data['fwicon']['fees'];?> fa-fw"></i> <span>Generate Fee</span> </a> </li><?php */ ?>


                  <? if ($_SESSION["admin-info"]["admin_type"] == "Super") { ?>

                    <li class="<?php if ($data['PageFile'] == 'iban-issuer') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/iban-issuer<?= $data['ex'] ?>" class="waves-effect" title="IBAN Issuer"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>IBAN Issuer</span> </a> </li>
                    <li class="<?php if ($data['PageFile'] == 'kyc-provider') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/kyc-provider<?= $data['ex'] ?>" class="waves-effect" title="KYC Provider"><i class="<?= $data['fwicon']['user-shield']; ?> fa-fw text-warning"></i> <span>KYC Provider</span> </a> </li>

                    <li class="<?php if ($data['PageFile'] == 'payment-gateway') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/payment-gateway<?= $data['ex'] ?>" class="waves-effect" title="Payment Gateway"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>Payment Gateway</span> </a> </li>

                    <li class="<?php if ($data['PageFile'] == 'trasnfer-reason') echo 'active'; ?>"> <a href="<?= $data['Admins']; ?>/trasnfer-reason<?= $data['ex'] ?>" class="waves-effect" title="Transfer Reason"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>Transfer Reason</span> </a> </li>


                    <li class="<?php if ($data['PageFile'] == 'common-bank-account') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/common-bank-account<?= $data['ex'] ?>" class="waves-effect" title="Common Bank Account"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>Common Bank Account</span> </a> </li>

                    <li class="<?php if ($data['PageFile'] == 'admin-bank-account') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/admin-bank-account<?= $data['ex'] ?>" class="waves-effect" title="Admin Bank Account"><i class="<?= $data['fwicon']['bank']; ?> fa-fw text-warning"></i> <span>Admin Bank Account</span> </a> </li>


                    <li class="<?php if ($data['PageFile'] == 'manage-currency') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/manage-currency<?= $data['ex'] ?>" class="waves-effect" title="Currency Manager"><i class="<?= $data['fwicon']['rupee']; ?> fa-fw text-warning"></i> <span>Currency Manager</span> </a> </li>

                    <li class="<?php if ($data['PageFile'] == 'manage-host') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/manage-host<?= $data['ex'] ?>" class="waves-effect" title="Host Manager"> <i class="<?= $data['fwicon']['setting']; ?> fa-fw text-warning"></i> <span>Host Manager</span></a></li>

                    <li class="<?php if ($data['PageFile'] == 'social-media-account') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/social-media-account<?= $data['ex'] ?>" class="waves-effect" title="Social Media Account"> <i class="<?= $data['fwicon']['setting']; ?> fa-fw text-warning"></i> <span>Social Media Account</span></a></li>

                    <li class="<?php if ($data['PageFile'] == 'manage-admin') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/manage-admin<?= $data['ex'] ?>" class="waves-effect" title="Admin Manager"> <i class="<?= $data['fwicon']['users']; ?> fa-fw text-warning"></i> <span>Admin Manager</span></a></li>

                    <li class="<?php if ($data['PageFile'] == 'referance-letter') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/referance-letter<?= $data['ex'] ?>" class="waves-effect" title="Referance Letter"> <i class="<?= $data['fwicon']['letter']; ?> fa-fw text-warning"></i> <span>Referance Letter</span></a></li>

                    <li class="<?php if ($data['PageFile'] == 'mail-template') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/mail-template<?= $data['ex'] ?>" class="waves-effect" title="Email Template"> <i class="<?= $data['fwicon']['email-open']; ?> fa-fw text-warning"></i> <span>Email Template</span></a></li>

                    <li class="<?php if ($data['PageFile'] == 'useful-link') {
                                  echo 'active';
                                } ?>"> <a href="<?= $data['Admins']; ?>/useful-link<?= $data['ex'] ?>" class="waves-effect" title="Useful Link"> <i class="<?= $data['fwicon']['links']; ?> fa-fw text-warning"></i> <span>Useful Link</span></a></li>

                  <? } ?>

















                </ul>

              </div>

              <!-- Sidebar -->

            </div>

          </div>

        </div>
        <!-- Left Sidebar End -->



        <script src="<?= $data['Host']; ?>/assets/libs/metismenu/metisMenu.min.js"></script>

        <script src="<?= $data['Host']; ?>/assets/js/app.js"></script>


        <script>
          $(document).ready(function() {
            $("#vertical-menu-btn-close").click(function() {
              $("body").removeClass('sidebar-enable');
            });
          });
        </script>



        <script>
          $(document).ready(function() {
            $(window).scroll(function() {
              if ($(this).scrollTop() > 100) { // Change 100 to the height you want to trigger the effect
                $('.admin-side').addClass('is-sticky');
              } else {
                $('.admin-side').removeClass('is-sticky');
              }
            });
          });
        </script>
      <? } ?>