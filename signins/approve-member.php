<?php

include "../common.php";

include "controller/blade.approve-member.php";

?>

<style>
  .dropbtn {



    background-color: #4CAF50;



    color: white;



    padding: 16px;



    font-size: 16px;



    border: none;



    cursor: pointer;



  }







  .dropdown {



    position: relative;



    display: inline-block;



  }







  .dropdown-content {



    display: none;



    position: absolute;



    background-color: #f9f9f9;



    min-width: 160px;



    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);



    z-index: 1;



  }







  .dropdown-content a {



    color: black;



    padding: 12px 16px;



    text-decoration: none;



    display: block;



  }







  .dropdown-content a:hover {
    background-color: #f1f1f1
  }







  .dropdown:hover .dropdown-content {



    display: block;



  }







  .dropdown:hover .dropbtn {



    background-color: #3e8e41;



  }

  * {

    margin: 0;

    padding: 0
  }



  html {

    height: 100%
  }



  #grad1 {

    /*background-color: : #9C27B0;

    background-image: linear-gradient(120deg, #FF4081, #81D4FA)*/

  }



  #msform {

    text-align: center;

    position: relative;

    margin-top: 20px
  }



  #msform fieldset .form-card {

    background: white;

    border: 0 none;

    border-radius: 0px;

    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);

    padding: 20px 40px 30px 40px;

    box-sizing: border-box;

    width: 94%;

    margin: 0 3% 20px 3%;

    position: relative
  }



  #msform fieldset {

    background: white;

    border: 0 none;

    border-radius: 0.5rem;

    box-sizing: border-box;

    width: 100%;

    margin: 0;

    padding-bottom: 20px;

    position: relative
  }



  #msform fieldset:not(:first-of-type) {

    display: none
  }



  #msform fieldset .form-card {

    text-align: left;

    color: #9E9E9E
  }



  /*#msform input,

#msform select,

#msform textarea {

    padding: 0px 8px 4px 8px;

    border: none;

    border-bottom: 1px solid #ccc;

    border-radius: 0px;

    margin-bottom: 25px;

    margin-top: 2px;

    width: 100%;

    box-sizing: border-box;

    font-family: montserrat;

    color: #2C3E50;

    font-size: 16px;

    letter-spacing: 1px

}



#msform input:focus,

#msform select:focus,

#msform textarea:focus {

    -moz-box-shadow: none !important;

    -webkit-box-shadow: none !important;

    box-shadow: none !important;

    border: none;

    font-weight: bold;

    border-bottom: 2px solid skyblue;

    outline-width: 0

}*/



  #msform .action-button {

    width: 100px;

    background: skyblue;

    font-weight: bold;

    color: white;

    border: 0 none;

    border-radius: 0px;

    cursor: pointer;

    padding: 10px 5px;

    margin: 10px 5px
  }



  #msform .action-button:hover,

  #msform .action-button:focus {

    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
  }



  #msform .action-button-previous {

    width: 100px;

    background: #616161;

    font-weight: bold;

    color: white;

    border: 0 none;

    border-radius: 0px;

    cursor: pointer;

    padding: 10px 5px;

    margin: 10px 5px
  }



  #msform .action-button-previous:hover,

  #msform .action-button-previous:focus {

    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
  }



  select.list-dt {

    border: none;

    outline: 0;

    border-bottom: 1px solid #ccc;

    padding: 2px 5px 3px 5px;

    margin: 2px
  }



  select.list-dt:focus {

    border-bottom: 2px solid skyblue
  }



  .card {

    z-index: 0;

    border: none;

    border-radius: 0.5rem;

    position: relative
  }



  .fs-title {

    font-size: 25px;

    color: #2C3E50;

    margin-bottom: 10px;

    font-weight: bold;

    text-align: left
  }



  #progressbar {

    margin-bottom: 30px;

    overflow: hidden;

    color: lightgrey
  }



  #progressbar .active {

    color: #000000
  }



  #progressbar li {

    list-style-type: none;

    font-size: 12px;

    width: 25%;

    float: left;

    position: relative
  }



  #progressbar #account:before {

    font-family: FontAwesome;

    content: "\f1ad"

  }



  #progressbar #personal:before {

    font-family: FontAwesome;

    content: "\f19c"

  }



  #progressbar #payment:before {

    font-family: FontAwesome;

    content: "\f09d"

  }



  #progressbar #confirm:before {

    font-family: FontAwesome;

    content: "\f00c"

  }



  #progressbar li:before {

    width: 50px;

    height: 50px;

    line-height: 45px;

    display: block;

    font-size: 18px;

    color: #ffffff;

    background: lightgray;

    border-radius: 50%;

    margin: 0 auto 10px auto;

    padding: 2px
  }



  #progressbar li:after {

    content: '';

    width: 100%;

    height: 2px;

    background: lightgray;

    position: absolute;

    left: 0;

    top: 25px;

    z-index: -1
  }



  #progressbar li.active:before,

  #progressbar li.active:after {

    background: skyblue
  }



  .radio-group {

    position: relative;

    margin-bottom: 25px
  }



  .radio {

    display: inline-block;

    width: 204;

    height: 104;

    border-radius: 0;

    background: lightblue;

    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);

    box-sizing: border-box;

    cursor: pointer;

    margin: 8px 2px
  }







  .fit-image {

    width: 100%;

    object-fit: cover
  }
</style>



<!-- ============================================================== -->

<!-- Start right Content here -->

<!-- ============================================================== -->

<div class="main-content admin">

  <div class="page-content">

    <!-- MultiStep Form -->

    <div class="container-fluid" id="grad1">

      <div class="row justify-content-center mt-0">

        <div class="col-sm-12 text-center">

          <?php if (isset($_SESSION['regmsg']) && $_SESSION['regmsg']) { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">

              <strong>Success ! </strong> <?= $_SESSION['regmsg']; ?>

              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

          <?php unset($_SESSION['regmsg']);
          } ?>

          <div class="card">

            <h2 class="mt-3"><strong>Member Activation</strong></h2>

            <p>Fill all form field to go to next step</p>

            <div class="row text-left px-2">

              <div class="col-sm-2"><strong>

                  <?= $rs['first_name']; ?>

                  <?= $rs['last_name']; ?>

                </strong></div>

              <div class="col-sm-2"><strong>

                  <?= $rs['mobile']; ?>

                </strong></div>

              <div class="col-sm-2"><strong>

                  <?= $rs['email']; ?>

                </strong></div>

              <div class="col-sm-6"><strong>

                  <?= $rs['address_line1']; ?>

                  ,

                  <?= $rs['city']; ?>

                  ,

                  <?= $rs['state']; ?>

                  -

                  <?= $rs['pincode']; ?> <?= date("F d, Y", strtotime($rs['add_date'])); ?>

                </strong></div>

            </div>

            <div class="row">

              <div class="col-md-12 mx-0">

                <form id="msform" method="post">

                  <input type="hidden" name="client_id" value="<?= $client_id; ?>">

                  <input type="hidden" name="memberfullname" value="<?= $rs['full_name']; ?>">

                  <input type="hidden" name="memberemail" value="<?= $rs['email']; ?>">

                  <!-- progressbar -->

                  <ul id="progressbar">

                    <li class="active" id="account"><strong>Company Details</strong></li>

                    <li id="personal"><strong>Assign Bank / Account / Currency</strong></li>

                    <li id="payment"><strong>Fee Engine / Transaction Fee</strong></li>

                    <li id="confirm"><strong>Finish</strong></li>

                  </ul>

                  <!-- fieldsets -->

                  <fieldset>

                    <div class="form-card">

                      <h2 class="fs-title">Company Datails</h2>

                      <input type="text" name="company_name" id="company_name" placeholder="Company Name" title="Company Name" class="form-control  my-2" value="<?= $rs['company_name']; ?>" required />

                      <input type="text" name="company_registration_no" id="company_registration_no" placeholder="Company Registration Number" title="Company Registration Number" class="form-control  my-2" value="<?= $rs['company_registration_no']; ?>" required />

                      <input type="date" name="date_of_incorporation" id="date_of_incorporation" placeholder="Date of Incorporation" title="Date of Incorporation" class="form-control  my-2" value="<?= $rs['date_of_incorporation']; ?>" required />

                      <input type="text" name="country_of_incorporation" id="country_of_incorporation" placeholder="Country of Incorporation" title="Country of Incorporation" class="form-control  my-2" value="<?= $rs['country_of_incorporation']; ?>" required />

                      <input type="text" name="city_of_incorporation" id="city_of_incorporation" placeholder="City of Incorporation" title="City of Incorporation" class="form-control  my-2" value="<?= $rs['city_of_incorporation']; ?>" required />

                      <input type="text" name="company_address" id="company_address" placeholder="Company Address" title="Company Address" class="form-control  my-2" value="<?= $rs['company_address']; ?>" required />

                    </div>

                    <input id="step1" type="button" name="next" class="next action-button bg-primary rounded" value="Next Step 2" />

                  </fieldset>

                  <fieldset>

                    <div class="form-card">

                      <h2 class="fs-title">Assign Bank / Account / Currency</h2>

                      <select name="assign_bank" id="assign_bank" class="form-control my-2" title="Assign Bank" required>

                        <option value="">Assign Common Bank</option>

                        <?php

                        $sellist = db_rows("SELECT * FROM tbl_common_bank_account WHERE bank_status='Active' order by bank_name");

                        foreach ($sellist as $key => $rslist) {

                        ?>

                          <option value="<?= $rslist['bank_id']; ?>">

                            <?= $rslist['bank_name']; ?>

                            -

                            <?= $rslist['bank_account_number']; ?>

                            -

                            <?= $rslist['bank_supported_currency']; ?>

                            -

                            <?= $rslist['bank_address']; ?>

                          </option>

                        <? } ?>

                      </select>

                      <select name="assign_currency" id="assign_currency" class="form-control my-2" title="Assign Currency" required>

                        <option value="">Assign Currency</option>

                        <?php

                        $query_curr = db_rows("SELECT * FROM tbl_currency WHERE currency_status='Active'");

                        foreach ($query_curr as $key => $curr) {

                        ?>

                          <option value="<?= $curr['currency_code']; ?>">

                            <?= $curr['currency_code']; ?>

                            -

                            <?= $curr['currency_territory']; ?>

                          </option>

                        <? } ?>

                      </select>

                      <input type="text" name="assign_account" id="assign_account" placeholder="Assign Account Number" class="form-control  my-2" required />

                    </div>

                    <input type="button" name="previous" class="previous action-button-previous  rounded" value="Previous" />

                    <input type="button" name="next" class="next action-button bg-primary  rounded" value="Next Step 3" />

                  </fieldset>

                  <fieldset>

                    <div class="form-card">

                      <h2 class="fs-title">Fee Engine / Transaction Fee</h2>

                      <div class="row border py-2 my-2">



                        <div class="col-sm-4">

                          <label> Setup Fee One Time </label>

                          <input type="number" id="setup_fee_one_time" name="setup_fee_one_time" placeholder="Setup Fee One Time" class="form-control my-2" title="Setup Fee One Time" value="500" required />

                        </div>

                        <div class="col-sm-4">

                          <label> Yearly Fee </label>

                          <input type="number" name="yearly_fee" id="yearly_fee" placeholder="Yearly Fee" class="form-control my-2" title="Yearly Fee" value="0" required />

                        </div>



                        <div class="col-sm-4">

                          <label> Monthly Fee </label>

                          <input type="number" name="monthly_fee" id="monthly_fee" placeholder="Monthly Fee" class="form-control my-2" title="Monthly Fee" value="0" required />

                        </div>



                      </div>

                      <h2 class="fs-title">Transaction Fee</h2>

                      <div class="row border py-2">

                        <div class="col-sm-12 ">

                          <label> Credit Transaction Fee </label>

                        </div>

                        <div class="col-sm-6">

                          <input type="number" name="credit_mdr_fee" id="credit_mdr_fee" placeholder="Credit MDR Transaction Fee in %" class="form-control my-2" title="Credit MDR Transaction Fee in %" value="2" required />

                        </div>

                        <div class="col-sm-6">

                          <input type="number" name="credit_min_fee" id="credit_min_fee" placeholder="Credit Minimum Transaction Fee" class="form-control my-2" title="Credit Minimum Transaction Fee" value="20" required />

                        </div>

                      </div>

                      <div class="row border py-2 mt-2">

                        <div class="col-sm-12 ">

                          <label> Debit Transaction Fee </label>

                        </div>

                        <div class="col-sm-6">

                          <input type="number" name="debit_mdr_fee" id="debit_mdr_fee" placeholder="Debit MDR Transaction Fee in %" class="form-control my-2" title="Debit MDR Transaction Fee in %" value="2" required />

                        </div>

                        <div class="col-sm-6">

                          <input type="number" name="debit_min_fee" id="debit_min_fee" placeholder="Debit Minimum Transaction Fee" class="form-control my-2" title="Debit Minimum Transaction Fee" value="25" required />

                        </div>

                      </div>

                    </div>

                    <input type="button" name="previous" class="previous action-button-previous  rounded" value="Previous" />

                    <input type="button" name="make_payment" class="next action-button bg-primary  rounded" value="Confirm" />

                  </fieldset>

                  <fieldset>

                    <div class="form-card">

                      <h2 class="fs-title text-center" id="sent"></h2>

                      <br>

                      <br>

                      <div class="row justify-content-center">

                        <div class="col-3 text-center"> <i id="statusid" class="spinner-border text-primary fa-4x" role="status"></i> </div>

                      </div>

                      <br>

                      <br>

                      <div class="row justify-content-center">

                        <div class="col-7 text-center">

                          <h5 id="sent2"></h5>

                        </div>

                      </div>

                    </div>

                  </fieldset>

                </form>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!-- container-fluid -->

  </div>

  <!-- End Page-content -->

</div>

<!-- end main content-->

</div>



<script>
  $(document).ready(function() {



    var current_fs, next_fs, previous_fs; //fieldsets

    var opacity;



    $(".next").click(function() {



      //alert($(this).val());



      if ($(this).val() == "Next Step 2") {





        if ($('#company_name').val().length == 0) {

          $("#company_name").focus();

          alert("Company Name is Blank")

          return false;

        }

        if ($('#company_registration_no').val().length == 0) {

          alert("Company Registration No is Blank")

          $("#company_registration_no").focus();

          return false;

        }

        if ($('#date_of_incorporation').val().length == 0) {

          alert("Date Of Incorporation is Blank")

          return false;

        }

        if ($('#country_of_incorporation').val().length == 0) {

          alert("Country of Incorporation is Blank")

          return false;

        }

        if ($('#city_of_incorporation').val().length == 0) {

          alert("City of Incorporation is Blank")

          return false;

        }

        if ($('#company_address').val().length == 0) {

          alert("Company Address is Blank")

          return false;

        }

      }



      if ($(this).val() == "Next Step 3") {



        if ($('#assign_bank').val().length == 0) {

          alert("Please Select Assign Bank")

          return false;

        }



        if ($('#assign_currency').val().length == 0) {

          alert("Please Select Assign Currency")

          return false;

        }



        if ($('#assign_account').val().length == 0) {

          alert("Please Add Assign Account Number")

          return false;

        }



      }



      if ($(this).val() == "Confirm") {



        if ($('#setup_fee_one_time').val().length == 0) {

          alert("Please Enter Setup Fee One Time")

          return false;

        }



        if ($('#monthly_fee').val().length == 0) {

          alert("Please Enter Monthly Fee")

          return false;

        }



        if ($('#credit_mdr_fee').val().length == 0) {

          alert("Please Enter Credit MDR Fee")

          return false;

        }



        if ($('#credit_min_fee').val().length == 0) {

          alert("Please Enter Credit Minimum Fee")

          return false;

        }



        if ($('#debit_mdr_fee').val().length == 0) {

          alert("Please Enter Debit MDR Fee")

          return false;

        }



        if ($('#debit_min_fee').val().length == 0) {

          alert("Please Enter Debit Minimum Fee")

          return false;

        }

        ///////////////////// Submit Form////////////

        //alert("Submit Form 66");



        //alert($("#msform").serialize());

        $.post("post-approve-member", $("#msform").serialize())



          // Serialization looks good: name=textInNameInput&&telefon=textInPhoneInput etc

          .done(function(data) {

            //alert(data);

            if (data == 0) {

              //alert("Error - Data Not Submitted"); 

              $("#sent").text("Error");

              $("#sent2").text("Member Not Activated");

              $("#statusid").removeClass("spinner-border text-primary");

              $("#statusid").addClass("fas fa-times-circle text-danger");

            } else {

              //alert("Success - Data Submitted Successfully");

              $("#sent").text("Success");

              $("#sent2").text("Member Successfully Activated");

              $("#statusid").removeClass("spinner-border text-primary");

              $("#statusid").addClass("fas fa-check-circle text-success");



            }



          });





        ////////////////////////////////////////////



      }





      current_fs = $(this).parent();

      next_fs = $(this).parent().next();



      //Add Class Active

      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");



      //show the next fieldset

      next_fs.show();

      //hide the current fieldset with style

      current_fs.animate({
        opacity: 0
      }, {

        step: function(now) {

          // for making fielset appear animation

          opacity = 1 - now;



          current_fs.css({

            'display': 'none',

            'position': 'relative'

          });

          next_fs.css({
            'opacity': opacity
          });

        },

        duration: 600

      });

    });



    $(".previous").click(function() {



      current_fs = $(this).parent();

      previous_fs = $(this).parent().prev();



      //Remove class active

      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");



      //show the previous fieldset

      previous_fs.show();



      //hide the current fieldset with style

      current_fs.animate({
        opacity: 0
      }, {

        step: function(now) {

          // for making fielset appear animation

          opacity = 1 - now;



          current_fs.css({

            'display': 'none',

            'position': 'relative'

          });

          previous_fs.css({
            'opacity': opacity
          });

        },

        duration: 600

      });

    });



    $('.radio-group .radio').click(function() {

      $(this).parent().find('.radio').removeClass('selected');

      $(this).addClass('selected');

    });



    $(".submit").click(function() {

      return false;

    })



  });
</script>



</body>

</html>